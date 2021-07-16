<?php

namespace App\Models;


use App\Helpers\StringHelper;
use App\Models\Interfaces\ContentInterface;
use App\Models\Interfaces\ImageAssetInterface;
use App\Models\Interfaces\UrlInterface;

/**
 * Class ProjectCategoryModel
 * @package App\Models
 *
 * @property string $title
 * @property string $slug
 * @property int $category_id
 * @property string $intro
 * @property string $short_intro
 * @property string $content
 * @property string $image
 * @property string $material
 * @property string $guarantee
 * @property int $price
 * @property int $discount
 * @property int $is_lock
 */
class ProductModel extends BaseModel implements ImageAssetInterface, UrlInterface
{
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'title', 'slug', 'image', 'intro', 'short_intro', 'content', 'category_id', 'price', 'discount', 'is_lock',
        'material', 'guarantee'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    protected $beforeInsert = ['updateSlug', 'authorLog'];
    protected $beforeUpdate = ['updateSlug', 'authorLog'];


//    protected $frontendRouter = 'Product::detail';
//    protected $afterInsert = ['instanceUrl'];
//    protected $afterUpdate = ['instanceUrl'];
//    protected $afterDelete = ['removeUrl'];

    /**
     * @param array $data
     * @return array
     */
    public function updateSlug(array $data): array
    {
        if (!isset($data['data']['slug']) || empty($data['data']['slug'])) {
            // Create 'slug' if not exists
            $data['data']['slug'] = $data['data']['title'];
        }
        $data['data']['slug'] = StringHelper::rewrite($data['data']['slug']);
        return $data;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        if (!$this->image || empty($this->image)) return '/images/empty.jpg';

        return base_url("uploads/product/{$this->image}");
    }

    /**
     * @return mixed
     */
    public function getCategoryOptions()
    {
        return (new ProductCategoryModel())->getCategoryOptions();
    }

    /**
     * @param string|null $scenario
     * @return array
     */
    public function getRules(string $scenario = null): array
    {
        return [
            'title' => 'required|min_length[3]|max_length[255]',
            'slug' => 'max_length[255]',
            'category_id' => 'required|integer',
        ];
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return base_url($this->id . '/' . $this->title);
    }

    /**
     * @param array $gallery
     * @throws \ReflectionException
     */
    public function saveGallery(array $gallery)
    {
        if (!($pk = $this->getPrimaryKey())) return;

        foreach ($gallery as $image) {
            $model = new ProductGalleryModel();
            $image['product_id'] = $pk;
            if (!$model->save($image)) continue;
        }
    }

    /**
     * @return ProductGalleryModel[]|null
     */
    public function getGallery()
    {
        if (!($pk = $this->getPrimaryKey())) return null;

        return (new ProductGalleryModel())->where('product_id', $pk)->findAll();
    }

    public function get_list_product($category_id)
    {
        return $this->where('category_id', $category_id)->findAll();
    }

    public function update_meta($id, $meta_title, $meta_keywords, $meta_description)
    {
        return $this->db->query('UPDATE `product` SET meta_title= ? , meta_keywords = ? , meta_description = ? WHERE id = ?', [
            $meta_title, $meta_keywords, $meta_description, $id
        ]);
    }

    public function select_price_product($id)
    {
        return $this->db->query('SELECT * FROM product_price WHERE product_id = ?', [$id])->getResultArray();
    }

    public function select_product_discount_widget()
    {
        return $this->db->query('SELECT DISTINCT prd.`id`, prd.title , prd.slug, prd.image ,prd.`updated_at`,
        (SELECT price_discount FROM product_color_price WHERE product_id = prd.`id` LIMIT 1) AS price_discount
            FROM product prd 
            INNER JOIN product_color_price prd_cl_pr ON prd.`id` = prd_cl_pr.`product_id`
        WHERE prd_cl_pr.`price_discount` > 0 and prd.`is_lock` = 0 ORDER BY prd.`updated_at` DESC LIMIT 5')->getResultArray();
    }

    public function color_price_info()
    {
        $color_price_info = $this->db->query('SELECT * FROM `product_color_price` WHERE product_id= ? order by id  limit 1', [$this->getPrimaryKey()])->getRow();
        if ($color_price_info) {
            return $color_price_info;
        }
        return null;
    }
}