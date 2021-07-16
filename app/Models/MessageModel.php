<?php

namespace App\Models;

use App\Helpers\Validations\AppValidation;
use DateTime;

class MessageModel extends BaseModel
{
    protected $table = 'message';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'id_send', 'id_receive', 'type', 'header', 'content', 'status_mess', 'is_deleted', 'date_send', 'created_at', 'updated_at'
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

    public function update_status_mess($id, $status_mess)
    {
        return $this->db->query('UPDATE `message` SET status_mess=? WHERE id=?', [$status_mess, $id]);
    }

    public function detele_rows($id, $type_delete)
    {
        if ($type_delete == '1') {
            return $this->db->query('DELETE FROM `message` WHERE id=?', [$id]);
        } else {
            return $this->db->query('UPDATE `message` SET is_deleted=1 WHERE id=?', [$id]);
        }
    }

    public function insert_rows($title_mess, $content_mess, $receiver_id, $sender_id, $type)
    {
        $time = strtotime((new DateTime())->format('Y-m-d H:i:s'));
        $content_html = (new AppValidation())->convert_strong_to_html($content_mess);
        return $this->db->query('INSERT INTO `message`(id_send, id_receive, type, header, content, status_mess, date_send, created_at, updated_at) 
        VALUE (?,?,?,?,?,?,?,?,?)', [$sender_id, $receiver_id, $type, $title_mess, $content_html, 1, $time, $time, $time]);
    }
}
