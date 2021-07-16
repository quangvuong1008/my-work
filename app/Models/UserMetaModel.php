<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;


class UserMetaModel extends BaseModel
{
    protected $table = 'user_meta_data';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'category', 'slug', 'created_at', 'updated_at', 'user_type', 'user_id'
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

    public function updateCategory($id, $category)
    {
        return $this->db->query('UPDATE `user_meta_data` SET category=? WHERE id=?', [$category, $id]);
    }

    public function deleteCategory($id)
    {
        $deleteFK = $this->db->query('UPDATE `user_profile_saved` SET cat_id=NULL WHERE cat_id=?', [$id]);
        if ($deleteFK) {
            return $this->db->query('DELETE FROM `user_meta_data` WHERE id=?', [$id]);
        }
        return false;
    }
}
