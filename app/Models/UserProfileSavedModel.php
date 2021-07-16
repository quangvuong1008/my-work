<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;


class UserProfileSavedModel extends BaseModel
{
    protected $table = 'user_profile_saved';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'user_profile_id', 'saved_by', 'created_at', 'updated_at', 'is_favorite', 'note', 'cat_id'
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

    public function getJobTitle(): string
    {
        $job_id = $this->db->query('SELECT `job_id` FROM user_profile WHERE user_id = ?', [$this->user_profile_id])->getRow();
        if ($job_id) {
            $job_title = $this->db->query('SELECT `title` FROM job WHERE id = ?', [$job_id->job_id])->getRow();
            if ($job_title) {
                return $job_title->title;
            }
            return '';
        }
        return '';
    }

    public function getFullname(): string
    {
        $full_name = $this->db->query('SELECT `full_name` FROM user_profile WHERE user_id = ?', [$this->user_profile_id])->getRow();
        if ($full_name) {
            return $full_name->full_name;
        }
        return '';
    }

    public function getCategory(): string
    {
        if ($this->cat_id) {
            $title = $this->db->query('SELECT `title` FROM user_meta_data WHERE id = ?', [$this->cat_id])->getRow();
            if ($title) {
                return $title->title;
            }
        }
        return '';
    }
}
