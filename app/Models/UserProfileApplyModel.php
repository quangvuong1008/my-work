<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;


class UserProfileApplyModel extends BaseModel
{
    protected $table = 'user_profile_apply';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'user_profile_id', 'recruitment_by', 'cat_id', 'created_at', 'apply_date', 'is_censorship', 'note', 'status'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated';
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

    public function update_note($id, $note)
    {
        return $this->db->query('UPDATE `user_profile_apply` SET note=? WHERE id=?', [$note, $id]);
    }

    public function delete_note($id)
    {
        return $this->db->query('UPDATE `user_profile_apply` SET note=NULL WHERE id=?', [$id]);
    }

    public function update_status($id, $status)
    {
        return $this->db->query('UPDATE `user_profile_apply` SET status=? WHERE id=?', [$status, $id]);
    }

    public function delete_status($id)
    {
        return $this->db->query('UPDATE `user_profile_apply` SET status=0 WHERE id=?', [$id]);
    }

    public function detele_rows($ids)
    {
        return $this->db->query('DELETE FROM `user_profile_apply` WHERE id IN ?', [$ids]);
    }
}
