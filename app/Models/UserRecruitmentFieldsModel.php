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
class UserRecruitmentFieldsModel extends BaseModel
{
    protected $table = 'user_recruitment_fields';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['user_recruiters_id', 'fields_of_operation_id'];

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
    public function insert_fields($user_recruitment_id,$fields_of_operation_id){
        return $this->db->query('INSERT INTO `user_recruitment_fields`(user_recruitment_id , fields_of_operation_id) 
                          VALUE (?,?)', [$user_recruitment_id,$fields_of_operation_id]);
    }

    public function select_fields($user_recruitment_id){
        return $this->db->query('SELECT * FROM fields_of_operation INNER JOIN user_recruitment_fields 
                            ON user_recruitment_fields.`fields_of_operation_id` = fields_of_operation.`id`
                            WHERE user_recruitment_fields.`user_recruitment_id`= ?', [$user_recruitment_id])->getResultArray();

    }
}