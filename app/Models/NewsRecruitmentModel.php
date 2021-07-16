<?php

namespace App\Models;


use App\Helpers\StringHelper;
use App\Models\Interfaces\ContentInterface;
use App\Models\Interfaces\ImageAssetInterface;
use App\Models\Interfaces\UrlInterface;
use DateTime;

/**
 * Class ProjectCategoryModel
 * @package App\Models
 *
 * @property string $title
 * @property string $slug
 * @property int $category_id
 * @property string $intro
 * @property string $short_intro
 * @property string $content
 * @property string $image
 * @property string $material
 * @property string $guarantee
 * @property int $price
 * @property int $discount
 * @property int $is_lock
 */
class NewsRecruitmentModel extends BaseModel
{
    protected $table = 'news_recruitment';
    protected $primaryKey = 'id';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'user_rcm_id', 'product_id', 'title', 'number', 'level', 'type_of_work', 'wage', 'bonus', 'province', 'job_id', 'intro', 'interest', 'experience',
        'degree', 'sex', 'the_deadline', 'language', 'job_requirements', 'profile_requirement', 'contact_name', 'contact_address'
        , 'contact_phone_number', 'contact_email', 'status', 'view', 'created_at','updated_at'
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
        return [

        ];
    }

//        StringHelper::rewrite($data['data']['slug']
    public function getUrl(): string
    {
        return base_url('/tuyen-dung/viec-lam/' . $this->id . '/' . StringHelper::rewrite($this->title));
    }

    public function getSeekerUrl(): string
    {
        return base_url('/tuyen-dung/chi-tiet-viec-lam/' . $this->id . '/' . StringHelper::rewrite($this->title));
    }

//post new recruitment
    public function insert_new_recruitment($user_rcm_id, $title, $number, $level, $type_of_work, $wage, $bonus, $job_id, $intro, $interest, $experience,
                                           $degree, $sex, $the_deadline, $language, $job_requirements, $profile_requirement,
                                           $contact_name, $contact_address, $contact_phone_number, $contact_email, $created_at)
    {
        return $this->db->query('insert into `news_recruitment`(user_rcm_id,title,`number`,`level`,type_of_work,wage,bonus,job_id,intro,interest,experience,`degree`,
                                    sex,the_deadline,`language`,job_requirements,profile_requirement,contact_name,contact_address,contact_phone_number,contact_email,created_at) 
                                value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', [$user_rcm_id, $title, $number, $level, $type_of_work, $wage, $bonus, $job_id, $intro, $interest, $experience, $degree, $sex, $the_deadline, $language, $job_requirements, $profile_requirement,
            $contact_name, $contact_address, $contact_phone_number, $contact_email, $created_at]);
    }

//update new recruitment
    public function update_new_recruitment($id,$user_rcm_id, $title, $number, $level, $type_of_work, $wage, $bonus, $job_id, $intro, $interest, $experience,
                                           $degree, $sex, $the_deadline, $language, $job_requirements, $profile_requirement,
                                           $contact_name, $contact_address, $contact_phone_number, $contact_email, $updated_at)
    {
        return $this->db->query('UPDATE `news_recruitment` SET user_rcm_id = ?,title = ?,`number` = ?,`level` = ?,type_of_work = ?,
                                wage = ?,bonus = ?,job_id = ?,intro = ?,interest = ?,experience = ?,`degree` = ?,
                                sex = ?,the_deadline = ?,`language` = ?,job_requirements = ?,profile_requirement = ?,contact_name = ?,
                                contact_address = ?,contact_phone_number = ?,contact_email = ?,updated_at = ? WHERE id=?', [$user_rcm_id, $title, $number, $level, $type_of_work,
            $wage, $bonus, $job_id, $intro, $interest, $experience, $degree, $sex, $the_deadline, $language,
            $job_requirements, $profile_requirement, $contact_name, $contact_address, $contact_phone_number, $contact_email, $updated_at,$id]);
    }

    public function user_recruitment_info($user_rcm_id)
    {

        $user_recruitment_info = $this->db->query('SELECT * FROM `user_recruitment` WHERE id= ? ', [$user_rcm_id])->getRow();
        if ($user_recruitment_info) {
            return $user_recruitment_info;
        }
        return null;
    }

    public function job_title()
    {
        $job_title = $this->db->query('SELECT `title` FROM job WHERE id = ?', [$this->job_id])->getRow();
        if ($job_title) {
            return $job_title->title;
        }
        return '';
    }

    public function select_province_recruitment()
    {
        $province_db = $this->db->query('SELECT `_name` FROM province WHERE id = ?', [$this->province])->getRow();
        if ($province_db) {
            return $province_db->_name;
        }
        return '';
    }

    public function get_province_info($province_id)
    {

        $province = $this->db->query('SELECT * FROM `province` WHERE id= ? ', [$province_id])->getRow();
        if ($province) {
            return $province;
        }
        return null;
    }

    public function save_news_recruitment ($user_id, $news_recruitment_id){

        $time = date_timestamp_get(new DateTime());

        $activity = $this->db->query('SELECT * FROM `user_news_activities` WHERE news_id= ? and user_id = ?  ', [$news_recruitment_id, $user_id])->getRow();
        if ($activity) {
            $this->db->query('update user_news_activities set is_save = 1, updated_at = ?  WHERE news_id= ? and user_id = ?  ', [$time,$news_recruitment_id, $user_id]);
        }else{
            $this->db->query('insert into user_news_activities (user_id,news_id, is_save, created_at, updated_at)
                                values  (?,?,1,?,?) ', [ $user_id,$news_recruitment_id, $time, $time]);
        }
        return true;
    }

}