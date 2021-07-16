<?php

namespace App\Models;

use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\StringHelper;
use DateTime;
use App\Models\UserModel;
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
class UserProfileModel extends BaseModel
{
    protected $table = 'user_profile';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id', 'user_id', 'full_name', 'birthday', 'avt', 'age', 'address', 'job_id', 'province_id', 'position_wanted_id', 'salary', 'salary_date',
        'edu_level', 'gender', 'phone_number', 'email', 'status', 'experience', 'job_type', 'married', 'views', 'created_at', 'updated_at', 'deleted_at', 'title'
    ];



    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $dateFormat = 'int';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    protected $beforeInsert = [];
    protected $beforeUpdate = [];
    protected $beforeDelete = ['remove_reference'];

    protected $afterInsert = [];
    protected $afterUpdate = [];
    protected $afterDelete = [];


    /** @var AdministratorModel $_user */
    protected static $_user_profile;

    public function getRules(string $scenario = null): array
    {
        return [];
    }

    public function getProvince(): string
    {
        $province = $this->db->query('SELECT `_name` FROM province WHERE id = ?', [$this->province_id])->getRow();
        if ($province) {
            return $province->_name;
        }
        return '';
    }

    public function job_title(): string
    {
        $job_title = $this->db->query('SELECT `title` FROM job WHERE id = ?', [$this->job_id])->getRow();
        if ($job_title) {
            return $job_title->title;
        }
        return '';
    }
    public function profile_code(): string
    {
        return 'NTV' . $this->id . $this->user_id;
    }
    public function status_display(): string
    {
        if ($this->status) return 'Duyệt';
        return 'Chưa Duyệt';
    }
    public function getAvt(): string
    {
//        if (!$this->avt || empty($this->avt) || $this->avt === 'null') return '/images/account.png';
//
//        return base_url("uploads/user/{$this->avt}");

        $user_model = (new UserModel())->where('id',$this->user_id)->first();
        if(!$user_model){
            return '/images/account.png';
        }else{
            return $user_model->getImage();

        }
    }

    public function update_views()
    {
        return $this->db->query(
            'UPDATE `user_profile` SET views = ? WHERE id = ?',
            [(int)$this->views + 1, $this->id]
        );
    }

    public function get_edu_level(){
        if(EDUCATION_LEVEL[$this->edu_level]){
            return EDUCATION_LEVEL[$this->edu_level];
        }
        return '';

    }


    /**
     * @return array
     */
    public function getCandidaties(string $query): array
    {
        if ($this->db->query($$quer)) {
            //var_dump($this->db->query("SELECT * FROM user_profile Where status = 1 AND id = 1")->getResultArray());
            return $this->db->query($query)->getResultArray();
        }
        return [];
    }

    public function remove_reference(){
        $this->db->query('delete from user_profile_saved where user_profile_id = ?',$this->primaryKey);
        $this->db->query('delete from user_profile_viewed where user_profile_id = ?',$this->primaryKey);
    }

    public function insert_files($user_id,$profile_id, $file_path){
        $time = date_timestamp_get(new DateTime());
        return $this->db->query('insert into `user_profile_files` (user_id, profile_id, file_path, updated_at, created_at) values (?, ?, ?, ?, ?)',
            [$user_id, $profile_id, $file_path,$time ,$time]);

    }
    public function get_hoso_url(): string
    {

        return base_url("nha-tuyen-dung/ho-so/". $this->id . "/" . StringHelper::rewrite($this->job_title()) .'.html');
    }

    public function get_province(){
        $province_md = (new ProvinceModel())->find($this->province_id);
        if($province_md){
            return $province_md->_name;
        }
        return  '';
    }
}
