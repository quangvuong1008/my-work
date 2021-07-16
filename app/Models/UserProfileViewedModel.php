<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;
use DateTime;

class UserProfileViewedModel extends BaseModel
{
    protected $table = 'user_profile_viewed';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'user_profile_id', 'viewed_by', 'created_at', 'updated_at', 'ip_view', 'scores', 'scores_BH', 'is_viewed'
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


    protected $afterInsert = ['instanceUrl'];
    protected $afterUpdate = ['instanceUrl'];
    protected $afterDelete = ['removeUrl'];


    public function getRules(string $scenario = null): array
    {

        return [];
    }

    public function insert_or_update_data($user_profile_id, $user_recr_id)
    {
        $get = $this->db->query('SELECT id FROM `user_profile_viewed` WHERE (user_profile_id=? AND viewed_by=? )', [$user_profile_id, $user_recr_id])->getRow();
        if ($get) {
            //update
            return $this->db->query('UPDATE `user_profile_viewed` SET updated_at=? WHERE id=?', [strtotime((new DateTime())->format('Y-m-d h:i:s')), $get->id]);
        } else {
            //insert
            return $this->db->query('INSERT INTO `user_profile_viewed`(user_profile_id, viewed_by, ip_view, scores, is_viewed) 
            VALUE (?,?,?,?,?)', [$user_profile_id, $user_recr_id, '1.53.112.205', 2, 1]);
        }
    }
}
