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
class UserModel extends BaseModel
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'email', 'password', 'fullname', 'images', 'phone', 'sex', 'address','birthday', 'love', 'status', 'created_at', 'updated_at'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;



    /** @var AdministratorModel $_user */
    protected static $_user;


    public function getRules(string $scenario = null): array
    {
        return [

        ];
    }

    public function getImage(): string
    {
        if (!$this->images || empty($this->images)) return '/images/empty.jpg';

        return base_url("uploads/user/{$this->images}");
    }

    public function getUrl(): string
    {
        return base_url('/nha-tuyen-dung/ho-so/' . $this->id . '/' . StringHelper::rewrite($this->fullname));
    }

// register
    public function insert_register($email, $password, $fullname, $phone, $created_at)
    {
        return $this->db->query('insert into `user`(email,password,fullname,phone,created_at) 
                          value (?,?,?,?,?)', [$email, $password,$fullname, $phone, $created_at]);
    }

    public function select_register($email)
    {
        return $this->db->query('SELECT * FROM `user` WHERE email= ? ', [$email])->getRow();
    }

//update user cruitment
    public function update_change_recruitment($id, $avt, $company_address, $province, $company_phone, $intro, $company_website, $contact_name, $contact_email, $contact_address, $contact_phone_number, $contact_form, $updated_at)
    {
        return $this->db->query('UPDATE `user_recruitment` SET avt = ?, company_address = ?,province = ?,company_phone = ?,intro = ?,
                                company_website = ?,contact_name = ?,contact_email = ?,contact_address = ?,contact_phone_number = ?,contact_form = ?,updated_at = ? WHERE id=?',
            [$avt, $company_address, $province, $company_phone, $intro, $company_website, $contact_name, $contact_email, $contact_address, $contact_phone_number, $contact_form, $updated_at, $id]);
    }

//login
    public function select_login($email, $password)
    {
        return $this->db->query('SELECT * FROM `user` WHERE (email=? AND password=? )', [$email, $password])->getRow();
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
}