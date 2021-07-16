<?php

namespace App\Controllers\Admin;


use App\Controllers\BaseController;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;
use App\Models\ObjectContentModel;
use App\Models\ProductColorPriceModel;
use App\Models\ProductGalleryModel;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;
use CodeIgniter\HTTP\Files\UploadedFile;
use CodeIgniter\HTTP\Request;

class Product extends BaseController
{
    /**
     * @return string
     */
    public function index()
    {
        $model = (new ProductModel())->orderBy('updated_at', 'DESC');

        // Filter By keyword
        if (($keyword = $this->request->getGet('keyword')) !== null) {
            $model->like('title', $keyword)
                ->orLike('slug', StringHelper::rewrite($keyword));

        }

        return $this->render('index', [
            'models' => $model->paginate(),
            'pager' => $model->pager
        ]);
    }

    /**
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function create()
    {
        /** @var ProductModel $model */
        $model = new ProductModel();


        if ($this->isPost() && $this->validate($model->getRules())) {
            $model->db->transStart();

            try {
                $pr = intval($_POST['price']);
                $dc = intval($_POST['discount']);
//                    var_dump($pr,$dc);die();
                if ($pr < $dc) {
                    SessionHelper::getInstance()->setFlash('ALERT', [
                        'type' => 'danger',
                        'message' => 'Giá bán không được nhỏ hơn giá khuyến mại'
                    ]);
                    return $this->response->redirect(route_to('admin_product_create'));
                }
                $model->loadAndSave($this->request, function (Request $request, array $data) use ($model) {
                    if (($image = $this->upload()) !== null) {
                        $data['image'] = $image;
                    }

                    return $data;
                });

                if (!$model) {
                    throw new \Exception('Đã có lỗi xảy ra, hãy thử lại');
                }

                $gallery = $this->uploadMultiple();
                if (!empty($gallery)) {
                    $model->saveGallery($gallery);
                }

                $model->db->transComplete();

                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'success',
                    'message' => 'Thêm mới thành công'
                ]);

                return $this->response->redirect(route_to('admin_product'));
            } catch (\Exception $ex) {
                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'danger',
                    'message' => $ex->getMessage()
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'validator' => $this->validator
        ]);
    }

    /**
     * @param $id
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function update($id)
    {
        /** @var ProductModel $model */
        $model = (new ProductModel())->find($id);


        if (!$model) {
            return $this->renderError();
        }


        if ($this->isPost() && $this->validate($model->getRules())) {
            $model->db->transStart();
            $pr = intval($_POST['price']);
            $dc = intval($_POST['discount']);

            if ($pr < $dc) {

                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'danger',
                    'message' => 'Giá gốc không được nhỏ hơn giá khuyến mại'
                ]);

                return $this->response->redirect(route_to('admin_product'));
            }
            try {
                $model = $model->loadAndSave($this->request, function (Request $request, array $data) {
                    if (($image = $this->upload()) !== null) {
                        $data['image'] = $image;
                    }

                    return $data;
                });

                if (!$model) {
                    throw new \Exception('Đã có lỗi xảy ra, hãy thử lại');
                }

                $gallery = $this->uploadMultiple();
                if (!empty($gallery)) {
                    $model->saveGallery($gallery);
                }

                $model->db->transComplete();

                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'info',
                    'message' => 'Cập nhật thành công'
                ]);

                return $this->response->redirect(route_to('admin_product'));
            } catch (\Exception $ex) {
                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'danger',
                    'message' => $ex->getMessage()
                ]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'validator' => $this->validator
        ]);
    }

    /**
     * @param $id
     * @return bool|mixed
     * @throws \Exception
     */
    public function removeContent($id)
    {
        if (!$this->request->isAJAX() || !$this->isPost()) return false;

        /** @var ObjectContentModel $model */
        $model = (new ObjectContentModel())->find($id);

        if (!$model) {
            throw new \Exception('Không tìm thấy nội dung');
        }

        return $model->delete($model->getPrimaryKey());
    }

    /**
     * @param $id
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function delete($id)
    {
        /** @var ProductModel $model */
        if (!$this->isPost() || !($model = (new ProductModel())->find($id))) {
            return $this->renderError();
        }

        SessionHelper::getInstance()->setFlash('ALERT', [
            'type' => 'warning',
            'message' => 'Xoá thành công'
        ]);
        $model->delete($model->getPrimaryKey());
        return $this->response->redirect(route_to('admin_product'));
    }

    /**
     * Upload file
     *
     * @return null|string
     */
    protected function upload()
    {
        if (($file = $this->request->getFile('image')) === null || $file->getError() || !$file->isValid()) {
            return null;
        }

        $uploadPath = ROOTPATH . PUBLISH_FOLDER . '/uploads/product';

        $fileName = $file->getFileNameStore();

        if (!$file->hasMoved() && $file->move($uploadPath, $fileName)) {
            return $fileName;
        }

        return null;
    }

    /**
     * Upload Gallery
     *
     * @return array
     */
    protected function uploadMultiple()
    {
        $files = $this->request->getFiles();

        $uploadPath = ROOTPATH . PUBLISH_FOLDER . '/uploads/product';

        $images = [];
        /** @var UploadedFile[] $gallery */
        if ($files && ($gallery = ArrayHelper::getValue($files, 'gallery')) !== null) {
            foreach ($gallery as $file) {
                if ($file->getError() || !$file->isValid()) continue;

                $fileName = $file->getFileNameStore();

                if (!$file->hasMoved() && $file->move($uploadPath, $fileName)) {
                    $images[] = ['image' => $fileName, 'ext' => $file->getExtension()];
                }

            }
        }

        return $images;
    }

    public function delete_img_product()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        (new ProductGalleryModel())->delete($id);
        echo json_encode(1);
    }

    //update meta posts
    public function meta($id)
    {
        if ($this->isPost() && ($data = $this->request->getPost()) !== null) {
            $update = (new ProductModel());
            $data = $this->request->getPost();
            $meta_title = $data['meta_title'];
            $meta_keywords = $data['meta_keywords'];
            $meta_description = $data['meta_description'];

            $post_meta = $update->update_meta($id, $meta_title, $meta_keywords, $meta_description);

            SessionHelper::getInstance()->setFlash('ALERT', [
                'type' => 'success',
                'message' => 'Cập nhật thành công'
            ]);

            return $this->response->redirect(route_to('admin_product'));
        } else {
            $data = (new ProductModel())->find($id);
            return $this->render('product/meta', [
                'model' => $data
            ]);
        }

    }

    public function upload_price_product()
    {
        $data = $this->request->getPost();
        $title = $data['title'];
        $price_origin = $data['price_origin'];
        $price_discount = $data['price_discount'];
        $product_id = $data['product_id'];


        $model_color_price = new ProductPriceModel();

        $model_color_price->insert_price($product_id,$title, $price_origin, $price_discount);

        echo json_encode($product_id);


    }

    public function select_price($product_id)
    {

        $select = new ProductPriceModel();
        $array_price = $select->select_title($product_id);

        echo json_encode($array_price);
        die();
    }

    public function delete_price($id)
    {
        $delete = new ProductPriceModel();
        $delete_price = $delete->delete_price($id);

        echo json_encode($delete_price);
        die();
    }

}