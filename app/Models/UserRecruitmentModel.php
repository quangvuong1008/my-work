<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;
use App\Models\Interfaces\IdentityInterface;
use App\Models\NewsRecruitmentModel;

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
class UserRecruitmentModel extends BaseModel
{
    protected $table = 'user_recruitment';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'email', 'password', 'avt', 'company_name', 'company_address', 'company_website', 'intro', 'company_phone', 'province', 'scales', 'contact_name', 'contact_email', 'contact_address', 'contact_phone_number', 'contact_form', 'status', 'business_license_file', 'updated_at', 'created_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    /** @var AdministratorModel $_user */
    protected static $_user;


    public function getRules(string $scenario = null): array
    {
        return [];
    }

    public function getImage(): string
    {
        if (!$this->avt || empty($this->avt)) return '/images/empty.jpg';

        return base_url("uploads/user_recruitment/{$this->avt}");
    }

    public function getUrl(): string
    {
        return base_url('/tuyen-dung/nha-tuyen-dung/' . $this->id . '/' . StringHelper::rewrite($this->company_name));
    }

    // register
    public function insert_register($email, $password, $company_name, $province, $scales, $contact_name, $contact_email, $contact_phone_number, $created_at)
    {
        return $this->db->query('insert into `user_recruitment`(email,password,company_name,province,scales,contact_name,contact_email,contact_phone_number,created_at) 
                          value (?,?,?,?,?,?,?,?,?)', [$email, $password, $company_name, $province, $scales, $contact_name, $contact_email, $contact_phone_number, $created_at]);
    }

    public function select_register($email)
    {
        return $this->db->query('SELECT * FROM `user_recruitment` WHERE email= ? ', [$email])->getRow();
    }
    //update user cruitment
    public function update_change_recruitment($id, $avt, $company_address, $province, $company_phone, $intro, $company_website, $contact_name, $contact_email, $contact_address, $contact_phone_number, $contact_form, $updated_at)
    {
        return $this->db->query(
            'UPDATE `user_recruitment` SET avt = ?, company_address = ?,province = ?,company_phone = ?,intro = ?,
                                company_website = ?,contact_name = ?,contact_email = ?,contact_address = ?,contact_phone_number = ?,contact_form = ?,updated_at = ? WHERE id=?',
            [$avt, $company_address, $province, $company_phone, $intro, $company_website, $contact_name, $contact_email, $contact_address, $contact_phone_number, $contact_form, $updated_at, $id]
        );
    }

    //login
    public function select_login($email, $password)
    {
        return $this->db->query('SELECT * FROM `user_recruitment` WHERE (email=? AND password=? )', [$email, $password])->getRow();
    }

    //change password
    public function select_user_password($user_id)
    {
        return $this->db->query('SELECT password FROM `user_recruitment` WHERE  id = ?', [$user_id])->getRow();
    }

    public function update_user_password($password, $user_id)
    {
        return $this->db->query('UPDATE `user_recruitment` SET password=? WHERE id=?', [$password, $user_id]);
    }

    //insert_user_meta_data
    public function insert_user_meta_data($category, $user_type, $user_id)
    {
        return $this->db->query('INSERT INTO `user_meta_data`(category , user_type, user_id) 
        VALUE (?,?,?)', [$category, $user_type, $user_id]);
    }

    //insert_user_profile_saved
    public function insert_user_profile_saved($user_profile_id, $saved_by, $note, $cat_id)
    {
        if ($cat_id && $cat_id !== 'null') {
            return $this->db->query('INSERT INTO `user_profile_saved`(user_profile_id , saved_by, is_favorite, note, cat_id) 
            VALUE (?,?,?,?,?)', [$user_profile_id, $saved_by, 1, $note, $cat_id]);
        }
        return $this->db->query('INSERT INTO `user_profile_saved`(user_profile_id , saved_by, is_favorite, note) 
            VALUE (?,?,?,?)', [$user_profile_id, $saved_by, 1, $note]);
    }

    //get_user_profile_saved
    public function get_user_profile_saved($user_profile_id, $saved_by)
    {
        $get = $this->db->query('SELECT is_favorite FROM `user_profile_saved` WHERE (user_profile_id=? AND saved_by=? )', [$user_profile_id, $saved_by])->getRow();
        if ($get) {
            return true;
        }
        return false;
    }

    //delete_user_profile_saved
    public function update_user_profile_saved($user_profile_id, $saved_by, $note, $cat_id)
    {
        if ($cat_id && $cat_id !== 'null') {
            return $this->db->query('UPDATE `user_profile_saved` SET note=?,cat_id=? WHERE (user_profile_id=? AND saved_by=? )', [$note, $cat_id, $user_profile_id, $saved_by]);
        }
        return $this->db->query('UPDATE `user_profile_saved` SET note=? WHERE (user_profile_id=? AND saved_by=? )', [$note, $user_profile_id, $saved_by]);
    }

    //delete_user_profile_saved
    public function delete_user_profile_saved($user_profile_id, $saved_by)
    {
        $delete = $this->db->query('DELETE FROM `user_profile_saved` WHERE (user_profile_id=? AND saved_by=? )', [$user_profile_id, $saved_by]);
        if ($delete) {
            return true;
        }
        return false;
    }

    //get_user_profile_viewed
    public function get_user_profile_viewed($user_profile_id, $viewed_by)
    {
        $get = $this->db->query('SELECT is_viewed FROM `user_profile_viewed` WHERE (user_profile_id=? AND viewed_by=? )', [$user_profile_id, $viewed_by])->getRow();
        if ($get) {
            return true;
        }
        return false;
    }

    //update GPKD
    public function update_user_business_license($business_license_file, $id)
    {
        return $this->db->query('UPDATE `user_recruitment` SET business_license_file=? WHERE id=?', [$business_license_file, $id]);
    }

    //get avatar
    public function getAvt(): string
    {
        if (!$this->avt || empty($this->avt) || $this->avt === 'null') return '/images/account.png';

        return base_url("uploads/user_recruitment/{$this->avt}");
    }

    public function get_count_news(){
        $model_news = (new NewsRecruitmentModel())->where('user_rcm_id', $this->id)->findAll();
        if($model_news){
            return count($model_news);
        }
        return 0;
    }
}
