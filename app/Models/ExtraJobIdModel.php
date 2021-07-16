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
class ExtraJobIdModel extends BaseModel
{
    protected $table = 'extra_job_id';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['news_recruitment_id', 'job_id'];

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
    public function insert_job_id($news_recruitment_id,$job_id){
        return $this->db->query('INSERT INTO `extra_job_id`(news_recruitment_id , job_id) 
                          VALUE (?,?)', [$news_recruitment_id,$job_id]);
    }
    public function select_job($news_recruitment_id){
        return $this->db->query('SELECT * FROM job INNER JOIN extra_job_id 
                            ON extra_job_id.`job_id` = job.`id`
                            WHERE extra_job_id.`news_recruitment_id`=?', [$news_recruitment_id])->getResultArray();

    }
}