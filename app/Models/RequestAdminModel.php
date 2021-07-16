<?php

namespace App\Models;

use App\Helpers\Validations\AppValidation;
use DateTime;

class RequestAdminModel extends BaseModel
{
    protected $table = 'request_admin';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'cat_id', 'request_by', 'description', 'created_at', 'updated_at'
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

    public function insert_rows($cat_id, $request_by, $description)
    {
        $description_html = (new AppValidation())->convert_strong_to_html($description);
        return $this->db->query('INSERT INTO `request_admin`(cat_id, request_by, description, created_at) 
            VALUE (?,?,?,?)', [$cat_id, $request_by, $description_html, strtotime((new DateTime())->format('Y-m-d h:i:s'))]);
    }
}
