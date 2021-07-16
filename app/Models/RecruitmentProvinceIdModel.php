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
class RecruitmentProvinceIdModel extends BaseModel
{
    protected $table = 'recruitment_province_id';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['recruitment_id', 'province_id'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    protected $beforeInsert = ['authorLog'];
    protected $beforeUpdate = ['authorLog'];

    /**
     * @return string
     */

    /**
     * @param string|null $scenario
     * @return array
     */
    public function getRules(string $scenario = null): array
    {
        return [
            'title' => 'min_length[3]|max_length[255]',
            'product_id' => 'required|integer',
            'image' => 'required|max_length[255]',
            'ext' => 'max_length[4]',
        ];
    }

    public function insert_province($recruitment_id,$province_id){
        return $this->db->query('INSERT INTO `recruitment_province_id`(recruitment_id , province_id) 
                          VALUE (?,?)', [$recruitment_id,$province_id]);
    }
    public function select_province($recruitment_id){
        return $this->db->query('SELECT * FROM province INNER JOIN recruitment_province_id 
                                ON recruitment_province_id.`province_id` = province.`id`
                                WHERE recruitment_province_id.`recruitment_id`= ?', [$recruitment_id])->getResultArray();

    }
}