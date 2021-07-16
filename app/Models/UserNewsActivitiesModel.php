<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;

use App\Models\Interfaces\IdentityInterface;

/**
 * Class AdministratorModel
 * @package App\Models
 *
 * @property int $id
 * @property string $account_name
 * @property string $password_hash
 * @property string $full_name
 * @property string $avt
 * @property int $type
 * @property int $is_lock
 *
 * @property int $login_after_init
 */

class UserNewsActivitiesModel extends BaseModel
{
    protected $table = 'user_news_activities';
    protected $primaryKey = 'id';


    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'user_id', 'news_id', 'is_save', 'is_apply', 'is_follow', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;





    public function getRules(string $scenario = null): array
    {


        return [];
    }

    public function update_note_apply($id, $note)
    {
        return $this->db->query('UPDATE `user_news_activities` SET note_apply=? WHERE id=?', [$note, $id]);
    }

    public function delete_note_apply($id)
    {
        return $this->db->query('UPDATE `user_news_activities` SET note_apply=NULL WHERE id=?', [$id]);
    }

    public function update_status_apply($id, $status)
    {
        return $this->db->query('UPDATE `user_news_activities` SET status_apply=? WHERE id=?', [$status, $id]);
    }

    public function delete_status_apply($id)
    {
        return $this->db->query('UPDATE `user_news_activities` SET status_apply=0 WHERE id=?', [$id]);
    }

    public function remove_apply($ids)
    {
        return $this->db->query('UPDATE `user_news_activities` SET is_apply=0 WHERE id IN ?', [$ids]);
    }
}
