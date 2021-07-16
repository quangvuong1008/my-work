<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Helpers\ArrayHelper;
use App\Helpers\Json;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;
use App\Models\FieldsOfOperationModel;
use App\Models\ObjectContentModel;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\Request;

class FieldsOfOperation extends BaseController
{
    /**
     * @return string
     */
    public function index()
    {
        $model = new FieldsOfOperationModel();

        // Filter By keyword
        if (($keyword = $this->request->getGet('keyword')) !== null) {
            $model->addQuery('like', ['title', $keyword])
                ->addQuery('orLike', ['title', StringHelper::rewrite($keyword)]);
        }

        return $this->render('index', [
            'models' => $model->getFieldsRecursive(),
//            'pager' => $model->pager
        ]);
    }

    /**
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function create()
    {
        /** @var FieldsOfOperationModel $model */
        $model = new FieldsOfOperationModel();


        if ($this->isPost() && $this->validate($model->getRules())) {
            try {
                $model = $model->loadAndSave($this->request, function ($request, $data) {
                    return $data;
                });


                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'success',
                    'message' => 'Thêm mới thành công'
                ]);

                return $this->response->redirect(route_to('admin_fields_of_operation'));
            } catch (\Exception $ex) {
                $model->db->transRollback();
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
     * @param int $id
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function update(int $id)
    {
        /** @var FieldsOfOperationModel $model */
        $model = (new FieldsOfOperationModel())->find($id);

        if (!$model) {
            return $this->renderError();
        }


        if ($this->isPost() && $this->validate($model->getRules())) {
            try {
                $model = $model->loadAndSave($this->request, function ($request, $data) {
                        return $data ;
                });


                SessionHelper::getInstance()->setFlash('ALERT', [
                    'type' => 'info',
                    'message' => 'Cập nhật thành công'
                ]);

                return $this->response->redirect(route_to('admin_fields_of_operation'));

            } catch (\Exception $ex) {
                $model->db->transRollback();
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
     * @return \CodeIgniter\HTTP\Response|string
     */
    public function delete($id)
    {
        /** @var FieldsOfOperationModel $model */
        if (!$this->isPost() || !($model = (new FieldsOfOperationModel())->find($id))) {
            return $this->renderError();
        }

        SessionHelper::getInstance()->setFlash('ALERT', [
            'type' => 'warning',
            'message' => 'Xoá thành công'
        ]);
        $model->delete($model->getPrimaryKey());
        return $this->response->redirect(route_to('admin_fields_of_operation'));
    }

}