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
 * @property int $productId
 * @property string $title
 * @property string $image
 * @property string $ext
 */
class ProductPriceModel extends BaseModel implements ImageAssetInterface
{
    protected $table = 'product_price';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['product_id', 'title', 'price_origin', 'price_discount'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    /**
     * @return string
     */
    public function getImage(): string
    {
        if (!$this->image || empty($this->image)) return '/images/empty.jpg';

        return base_url("uploads/category/{$this->image}");
    }


    /**
     * @param string|null $scenario
     * @return array
     */
    public function getRules(string $scenario = null): array
    {
        return [

        ];
    }

    public function insert_price( $product_id, $title, $price_origin, $price_discount)
    {
        return $this->db->query('insert into `product_price`(product_id,title,price_origin,price_discount)
                          values(?,?,?,?)', [ $product_id, $title, $price_origin, $price_discount]);
    }

    public function select_title($product_id)
    {
        $title_db = $this->db->query('SELECT * FROM product_price WHERE product_id=?', [$product_id])->getResultArray();

        return $title_db;
    }

    public function delete_price($id)
    {
        $this->db->query('DELETE FROM `product_price` WHERE id=?', [$id]);

    }
    public function select_price($id){
        $price_db = $this->db->query('SELECT * FROM `product_price` WHERE id= ?',[$id])->getResultArray();
        return $price_db ;
    }

    public function getColorUrl(): string
    {
        return base_url($this->title);
    }
}