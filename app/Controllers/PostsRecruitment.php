<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Helpers\SessionHelper;
use App\Models\ExtraJobIdModel;
use App\Models\JobModel;
use App\Models\NewsRecruitmentModel;
use App\Models\ProvinceModel;
use App\Models\RecruitmentProvinceIdModel;
use App\Models\UserRecruitmentModel;
use App\Models\UserMetaModel;
use App\Models\UserNewsActivitiesModel;
use DateTime;
use App\Models\MessageModel;
use App\Models\RequestAdminModel;


class PostsRecruitment extends BaseController
{
    public function posts()
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $session = session();
        $id = $session->get(SESSION_USER_ID_KEY);
        $user_recruitment = (new UserRecruitmentModel());
        if ($id) {
            $models = $user_recruitment->find($id);
        }
        $province = (new ProvinceModel())->findAll();
        $job = (new JobModel())->findAll();

        return $this->render('recruitment/posts', [
            'models' => $models,
            'province' => $province,
            'job_model' => $job
        ]);
    }

    public function insert_new_recruitment()
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $session = session();
        $id = $session->get(SESSION_USER_ID_KEY);
        $user_recruitment = (new UserRecruitmentModel());
        if ($id) {
            $models = $user_recruitment->find($id);
        }
        $user_rcm_id = $models->id;

        $data = $this->request->getPost();
        $title = $data['title'];
        $number = $data['number'];
        $level = $data['level'];
        $type_of_work = $data['type_of_work'];
        $wage = $data['wage'];
        $bonus = $data['bonus'];
        //        $province = $data['province'];

        $job_id = $data['job_id'];
        $intro = $data['intro'];
        $interest = $data['interest'];
        $experience = $data['experience'];
        $degree = $data['degree'];
        $sex = $data['sex'];
        $the_deadline = null;
        if ($data['the_deadline']) {
            $the_deadline = date_timestamp_get(date_create_from_format('d/m/Y', $data['the_deadline']));
        }
        $language = $data['language'];
        $job_requirements = $data['job_requirements'];
        $profile_requirement = $data['profile_requirement'];
        $contact_name = $data['contact_name'];
        $contact_address = $data['contact_address'];
        $contact_phone_number = $data['contact_phone_number'];
        $contact_email = $data['contact_email'];
        $created_at = date_timestamp_get(new DateTime());


        $new_rcm = (new NewsRecruitmentModel());
        $save = $new_rcm->insert_new_recruitment(
            $user_rcm_id,
            $title,
            $number,
            $level,
            $type_of_work,
            $wage,
            $bonus,
            $job_id,
            $intro,
            $interest,
            $experience,
            $degree,
            $sex,
            $the_deadline,
            $language,
            $job_requirements,
            $profile_requirement,
            $contact_name,
            $contact_address,
            $contact_phone_number,
            $contact_email,
            $created_at
        );


        if (!$save) {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR_POST',
                'message' => 'Đăng tin thất bại'
            ]);
        } else {

            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS_POST',
                'message' => 'Đăng tin thành công'
            ]);
        }
        return $this->response->redirect(route_to('posts'));
    }

    //  update post
    public function update($id)
    {


        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $model = (new NewsRecruitmentModel())->find($id);
        $provinces = (new ProvinceModel())->findAll();
        $job = (new JobModel())->findAll();
        $province_rcm_info = (new RecruitmentProvinceIdModel())
            ->select_province($id);

        $job_rcm_info = (new ExtraJobIdModel())
            ->select_job($id);


        return $this->render('recruitment/posts', [
            'model' => $model,
            'province' => $provinces,
            'job_model' => $job,
            'province_rcm_info' => $province_rcm_info,
            'job_rcm_info' => $job_rcm_info
        ]);
    }

    public function update_new_recruitment($id)
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $model_new_recruitment = (new NewsRecruitmentModel())->find($id);
        //        $model_pro_id = $model_user_product ->id;
        if (!$model_new_recruitment) {
            return null;
        }
        $user_product_id = $model_new_recruitment->user_rcm_id;
        $session = session();
        $user_rcm_id = $session->get(SESSION_USER_ID_KEY);

        if ($user_rcm_id != $user_product_id) {
            return $this->response->redirect(route_to('login'));
        }
        $data = $this->request->getPost();
        $title = $data['title'];
        $number = $data['number'];
        $level = $data['level'];
        $type_of_work = $data['type_of_work'];
        $wage = $data['wage'];
        $bonus = $data['bonus'];
        $province = $data['province'];
        $job_id = $data['job_id'];
        $extra_job = $data['extra_job'];
        $intro = $data['intro'];
        $interest = $data['interest'];
        $experience = $data['experience'];
        $degree = $data['degree'];
        $sex = $data['sex'];
        $the_deadline = null;
        if ($data['the_deadline']) {
            $the_deadline = date_timestamp_get(date_create_from_format('d/m/Y', $data['the_deadline']));
        }
        $language = $data['language'];
        $job_requirements = $data['job_requirements'];
        $profile_requirement = $data['profile_requirement'];
        $contact_name = $data['contact_name'];
        $contact_address = $data['contact_address'];
        $contact_phone_number = $data['contact_phone_number'];
        $contact_email = $data['contact_email'];
        $updated_at = date_timestamp_get(new DateTime());


        $recruitment_province = (new RecruitmentProvinceIdModel());
        if ($province) {
            foreach ($province as $prv) {

                $save_province = $recruitment_province->insert_province($id, $prv);
            }
        }

        $recruitment_extra_job = (new ExtraJobIdModel());
        if ($extra_job) {
            foreach ($extra_job as $exj) {

                $save_job = $recruitment_extra_job->insert_job_id($id, $exj);
            }
        }

        $update_rcm = $model_new_recruitment->update_new_recruitment(
            $id,
            $user_rcm_id,
            $title,
            $number,
            $level,
            $type_of_work,
            $wage,
            $bonus,
            $job_id,
            $intro,
            $interest,
            $experience,
            $degree,
            $sex,
            $the_deadline,
            $language,
            $job_requirements,
            $profile_requirement,
            $contact_name,
            $contact_address,
            $contact_phone_number,
            $contact_email,
            $updated_at
        );
        if (!$update_rcm) {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR_POST',
                'message' => 'Sửa tin thất bại'
            ]);
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS_POST',
                'message' => 'Sửa tin thành công'
            ]);
        }

        return $this->response->redirect(route_to('posts'));
    }

    //service recruitment
    public function service()
    {
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/service_recruitment', [
            'model' => '',
            'job' => $job,
            'province' => $province
        ]);
    }
    // quan ly dang tin

    public function rcm_manager()
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $session = session();
        $id = $session->get(SESSION_USER_ID_KEY);
        $user_recruitment = (new UserRecruitmentModel());
        if ($id) {
            $models = $user_recruitment->find($id);
        }
        $user_rcm_id = $models->id;

        $rcm_post = (new NewsRecruitmentModel())
            ->where('user_rcm_id', $user_rcm_id)
            ->findAll();

        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/rcm_manager', [
            'rcm_post' => $rcm_post,
            'job' => $job,
            'province' => $province
        ]);
    }

    public function view_post_rcm($id)
    {

        return $this->render('recruitment/view_post_rcm', [
            '' => ''
        ]);
    }
    public function delete_province()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        (new RecruitmentProvinceIdModel())->delete($id);

        echo json_encode(1);
    }

    public function delete_job()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        (new ExtraJobIdModel())->delete($id);

        echo json_encode(1);
    }

    // tìm kiếm ứng viên
    public function candidates()
    {
        return $this->render('recruitment/candidates', [
            '' => ''
        ]);
    }

    //hồ sơ đã lưu
    public function saved_profile()
    {
        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        $category = (new UserMetaModel())
            ->where('user_id', $user_id)
            ->where('user_type', 2)
            ->findAll();
        return $this->render('recruitment/saved_profile', [
            'category' => $category ?? [],
            'job' => $job,
            'province' => $province
        ]);
    }

    // Hồ sơ đã xem
    public function profile_viewed()
    {
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/profile_viewed', [
            'job' => $job,
            'province' => $province,
        ]);
    }
    // Hồ sơ đã ứng tuyển
    public function applicable_profile()
    {
        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        $category = (new NewsRecruitmentModel())
            ->where('user_rcm_id',  $user_id)
            ->findAll();
        return $this->render('recruitment/applicable_profile', [
            'category' => $category,
            'education_level' => EDUCATION_LEVEL,
            'experience' => EXPERIENCE,
            'job' => $job,
            'province' => $province
        ]);
    }
    // thiết lập thông báo hồ sơ

    public function notification_settings()
    {
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/notification_settings', [
            'job' => $job,
            'province' => $province
        ]);
    }
    // gửi yêu cầu
    public function Send_request()
    {
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        $category = (new UserMetaModel())
            ->where('user_type', 1)
            ->findAll();

        return $this->render('recruitment/send_request', [
            'job' => $job,
            'province' => $province,
            'category' => $category
        ]);
    }
    // Tin nhắn
    public function message()
    {
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/message', [
            'job' =>  $job,
            'province' => $province
        ]);
    }

    //Tin nhắn đã gửi

    public function Sent_message()
    {
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/sent_message', [
            'job' =>  $job,
            'province' => $province
        ]);
    }

    //ajax update manage category
    public function ajaxUpdateCategory()
    {
        $this->layout = null;
        $id = $this->request->getPost('id');
        $title = $this->request->getPost('title');
        if ($id && $title) {
            $update = (new UserMetaModel())->updateCategory($id, $title);
            if ($update) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    //ajax delete manage category
    public function ajaxDeleteCategory()
    {
        $this->layout = null;
        $id = $this->request->getPost('id');
        if ($id) {
            $update = (new UserMetaModel())->deleteCategory($id);
            if ($update) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    //ajax getData saved_profile
    public function ajaxSaveProfile()
    {
        $this->layout = null;

        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('user_profile_saved');

        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        //getcategory
        $categories = (new UserMetaModel())
            ->where('user_id', $user_id)
            ->where('user_type', 2)
            ->findAll();

        //query
        $builder->where('saved_by', $user_id);

        $currenctPage = $_GET['page'] ?? 1;

        $cat_id = $this->request->getPost('cat_id');
        $search_title = $this->request->getPost('search_title');
        $date_from = $this->request->getPost('date_from');
        $date_to = $this->request->getPost('date_to');
        $type = $this->request->getPost('type');
        $download_type = $this->request->getPost('download_type') ?? 1;
        $pageSize = (int)$this->request->getPost('pageSize') ?? 10;

        $allRows = 0;
        $user_profile_saved = [];

        if ($cat_id && $cat_id != 'null') {
            //join table user_profile
            $builder->where('cat_id', $cat_id);

            $builder->join('(SELECT
            user_meta_data.id as id_meta, 
            user_meta_data.category  
            from user_meta_data) as user_meta_data', 'user_meta_data.id_meta = user_profile_saved.cat_id');
        } else {
            $builder->join('(SELECT
            user_meta_data.id as id_meta, 
            user_meta_data.category  
            from user_meta_data) as user_meta_data', 'user_meta_data.id_meta = user_profile_saved.cat_id', 'left');
        }

        if ($date_from && $date_to) {
            $from = $date_from . " 00:00:00";
            $to = $date_to . " 23:59:59";
            $builder->where('user_profile_saved.created_at >', strtotime($from));
            $builder->where('user_profile_saved.created_at <', strtotime($to));
        }

        //join table user_profile
        $builder->join('(SELECT 
        user_profile.user_id, 
        user_profile.full_name, 
        user_profile.job_id,
        user_profile.salary,
        user_profile.experience,
        user_profile.province_id
        from user_profile) as T2', 'T2.user_id = user_profile_saved.user_profile_id');
        //join table job
        $builder->join('(SELECT job.id, job.title, job.slug  from job) as T3', 'T3.id = T2.job_id');
        //join table provin
        $builder->join('(SELECT province.id as id_province, province._name as name_province from province) as T4', 'T4.id_province = T2.province_id');
        if ($search_title && $search_title != 'null') {
            $builder->like('title', $search_title);
        }

        $allRows = $builder->countAllResults(false);

        if ($type != 'download') {
            $user_profile_saved = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();
        } else {
            if ($download_type == 1) {
                $user_profile_saved = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();
            } else {
                $user_profile_saved = $builder->get()->getResult();
            }
            $this->exports_saved_data($user_profile_saved);
        }

        $totalPage = ceil($allRows / $pageSize);

        return $this->render('recruitment/ajax-saved-profile', [
            'user_profile_saved' => $user_profile_saved ?? [],
            'countCandidates' => $allRows,
            'currenctPage' => $currenctPage,
            'totalPage' => $totalPage,
            'cat_id' => $cat_id,
            'search_title' => $search_title,
            'categories' => $categories,
            'user_type' => $user_type,
        ]);
    }

    //ajax getData viewed_profile
    public function ajaxViewProfile()
    {
        $this->layout = null;

        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('user_profile_viewed');

        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);

        //query
        $builder->where('viewed_by', $user_id);

        $currenctPage = $_GET['page'] ?? 1;
        $search_title = $this->request->getPost('search_title');
        $date_from = $this->request->getPost('date_from');
        $date_to = $this->request->getPost('date_to');
        $type = $this->request->getPost('type');
        $pageSize = (int)$this->request->getPost('pageSize') ?? 10;
        $download_type = $this->request->getPost('download_type') ?? 1;

        $allRows = 0;
        $user_profile_viewed = [];

        if ($date_from && $date_to) {
            $from = $date_from . " 00:00:00";
            $to = $date_to . " 23:59:59";
            $builder->where('updated_at >', strtotime($from));
            $builder->where('updated_at <', strtotime($to));
        } else {
            $builder->orderBy('updated_at', 'DESC');
        }
        //join table user_profile
        $builder->join('(SELECT 
        user_profile.user_id, 
        user_profile.full_name, 
        user_profile.job_id,
        user_profile.email,
        user_profile.phone_number
        from user_profile) as T2', 'T2.user_id = user_profile_viewed.user_profile_id');
        //join table job
        $builder->join('(SELECT job.id, job.title, job.slug  from job) as T3', 'T3.id = T2.job_id');

        if ($search_title && $search_title != 'null') {
            $builder->like('title', $search_title);
        }
        $allRows = $builder->countAllResults(false);
        if ($type != 'download') {
            $user_profile_viewed = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();
        } else {
            if ($download_type == 1) {
                $user_profile_viewed = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();
            } else {
                $user_profile_viewed = $builder->get()->getResult();
            }
            $this->exports_viewed_data($user_profile_viewed);
        }

        $totalPage = ceil($allRows / $pageSize);

        return $this->render('recruitment/ajax-viewed-profile', [
            'user_profile_viewed' => $user_profile_viewed ?? [],
            'countCandidates' => $allRows,
            'currenctPage' => $currenctPage,
            'totalPage' => $totalPage,
            'search_title' => $search_title,
        ]);
    }

    //ajax getData apply
    public function ajaxApplyProfile()
    {
        $this->layout = null;

        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('user_news_activities');

        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);

        //query
        $builder->where('is_apply', 1);

        $currenctPage = $_GET['page'] ?? 1;

        $position_apply = $this->request->getPost('position_apply') ?? null;
        $position_apply_ids = $this->request->getPost('position_apply_ids') ?? null;
        $time_range = $this->request->getPost('time_range');
        $status_apply_ids =  $this->request->getPost('status_apply_ids') ?? []; // trang thai ho sp
        $salary_range_ids = $this->request->getPost('salary_range_ids') ?? []; // muc luong
        $education_level_ids = $this->request->getPost('education_level_ids') ?? []; // trinh do
        $experience_ids = $this->request->getPost('experience_ids') ?? []; // kinh nghiem
        $gender_ids = $this->request->getPost('gender_ids') ?? []; // gioi tinh
        $type = $this->request->getPost('type');
        $pageSize = (int)$this->request->getPost('pageSize') ?? 10;
        $download_type = $this->request->getPost('download_type') ?? 1;

        $allRows = 0;
        $user_profile_apply = [];

        //join table user_profile
        $builder->join('(SELECT 
        user_profile.user_id as id_user, 
        user_profile.full_name, 
        user_profile.job_id,
        user_profile.salary,
        user_profile.edu_level,
        user_profile.gender,
        user_profile.experience 
        from user_profile) as T2', 'T2.id_user = user_news_activities.user_id');
        //join table job
        $builder->join('(SELECT 
        job.id as id_job, 
        job.title as job_title, 
        job.slug as job_slug  
        from job) as T3', 'T3.id_job = T2.job_id');
        //join table news_recruitment
        $builder->join('(SELECT 
        news_recruitment.id as id_news_rcm, 
        news_recruitment.title as title_rcm
        from news_recruitment) as T4', 'T4.id_news_rcm = user_news_activities.news_id');

        if (!empty($position_apply) && $position_apply != 'null') {
            $builder->where('news_id', $position_apply);
        } else {
            $builder->whereIn('news_id', $position_apply_ids);
        }

        if ($status_apply_ids) {
            $builder->whereIn('status_apply', $status_apply_ids);
        }

        if ($education_level_ids && count($education_level_ids) > 0) {
            $builder->whereIn('edu_level', $education_level_ids);
        }

        if ($experience_ids && count($experience_ids) > 0) {
            $builder->whereIn('experience', $experience_ids);
        }

        if ($gender_ids && count($gender_ids) > 0) {
            $builder->whereIn('gender', $gender_ids);
        }

        switch ($time_range) {
            case '0':
                $builder->orderBy('date_apply', 'DESC');
                break;
            case '1':
                $sdate = (new DateTime())->modify('-3 days')->format('Y-m-d') . " 23:59:59";
                $builder->where('date_apply >', strtotime($sdate));
                break;
            case '2':
                $sdate = (new DateTime())->modify('-7 days')->format('Y-m-d') . " 23:59:59";
                $builder->where('date_apply >', strtotime($sdate));
                break;
            case '3':
                $sdate = (new DateTime())->modify('-30 days')->format('Y-m-d') . " 23:59:59";
                $builder->where('date_apply >', strtotime($sdate));
                break;
            case '4':
                $sdate = (new DateTime())->modify('-60 days')->format('Y-m-d') . " 23:59:59";
                $builder->where('date_apply >', strtotime($sdate));
                break;
            default:
                //nothing
        }

        if ($salary_range_ids && count($salary_range_ids) > 0) {
            $query = "";
            foreach ($salary_range_ids as $key => $value) {
                if ($value == '1') {
                    $query .= "(salary >= 1000000 AND salary < 3000000)";
                }
                if ($value == '2') {
                    $query .= "(salary >= 3000000 AND salary < 5000000)";
                }
                if ($value == '3') {
                    $query .= "(salary >= 5000000 AND salary < 7000000)";
                }
                if ($value == '4') {
                    $query .= "(salary >= 7000000 AND salary < 10000000)";
                }
                if ($value == '5') {
                    $query .= "(salary >= 10000000 AND salary < 12000000)";
                }
                if ($value == '6') {
                    $query .= "(salary >= 12000000 AND salary < 15000000)";
                }
                if ($value == '7') {
                    $query .= "(salary >= 15000000 AND salary < 20000000)";
                }
                if ($value == '8') {
                    $query .= "(salary >= 20000000 AND salary < 25000000)";
                }
                if ($value == '9') {
                    $query .= "(salary >= 25000000 AND salary < 30000000)";
                }
                if ($value == '10') {
                    $query .= "(salary >= 30000000)";
                }

                if ($key < count($salary_range_ids) - 1) {
                    $query .= " OR ";
                }
            }

            $builder->where($query);
        }

        $allRows = $builder->countAllResults(false);

        if ($type != 'download') {
            $user_profile_apply = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();
        } else {
            if ($download_type == 1) {
                $user_profile_apply = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();
            } else {
                $user_profile_apply = $builder->get()->getResult();
            }
            $this->exports_apply_data($user_profile_apply);
        }

        $totalPage = ceil($allRows / $pageSize);

        return $this->render('recruitment/ajax-apply-profile', [
            'user_profile_apply' => $user_profile_apply ?? [],
            'countCandidates' => $allRows,
            'currenctPage' => $currenctPage,
            'totalPage' => $totalPage,
        ]);
    }

    public function ajaxMessReceiveData()
    {
        $this->layout = null;

        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('message');

        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);

        $messData = [];
        $status = $this->request->getPost('status') ?? '0';

        //$builder->select('id', 'id_send', 'id_receive', 'header', 'date_send');

        $builder->where('id_receive', $user_id);
        $builder->where('type', 1);
        $builder->where('is_deleted', 0);
        $builder->orderBy('date_send', 'DESC');

        if ($status != '0') {
            $builder->where('status_mess', $status);
        }

        //join table user_profile
        $builder->join('(SELECT 
            user_profile.id as id_candidate, 
            user_profile.full_name,
            user_profile.job_id
            from user_profile) as T2', 'T2.id_candidate = message.id_send');

        //join table user_profile
        $builder->join('(SELECT 
            job.id as id_job, 
            job.slug
            from job) as T3', 'T3.id_job = T2.job_id');

        $allRows = $builder->countAllResults(false);

        $messData = $builder->get()->getResult();

        return $this->render('recruitment/ajax-message-receive', [
            'messData' => $messData,
            'countMess' => $allRows,
            'tab' => $status
        ]);
    }

    public function ajaxMessSentData()
    {
        $this->layout = null;

        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('message');

        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);

        $messData = [];

        $builder->where('id_send', $user_id);
        $builder->where('type', 2);
        $builder->orderBy('date_send', 'DESC');

        //join table user_recruitment
        $builder->join('(SELECT 
            user_recruitment.id as id_recruitment, 
            user_recruitment.company_name
            from user_recruitment) as T4', 'T4.id_recruitment = message.id_send');

        $allRows = $builder->countAllResults(false);

        $messData = $builder->get()->getResult();

        return $this->render('recruitment/ajax-message-sent', [
            'messData' => $messData,
            'countMess' => $allRows,
        ]);
    }

    public function ajaxMessDetailData()
    {
        $this->layout = null;

        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        if ($status == '1') {
            $update = (new MessageModel())->update_status_mess($id, 2);
            if (!$update) {
                return $this->render('errors/html/error_exception');
            }
        }

        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('message');

        $id = $this->request->getPost('id');

        $builder->where('id', $id);

        // hop thu den
        if ($status != '-1') {
            //join table user_profile
            $builder->join('(SELECT 
                user_profile.id as id_candidate, 
                user_profile.full_name,
                user_profile.job_id
                from user_profile) as T2', 'T2.id_candidate = message.id_send');

            //join table user_profile
            $builder->join('(SELECT 
                job.id as id_job, 
                job.slug
                from job) as T3', 'T3.id_job = T2.job_id');

            //join table user_recruitment
            $builder->join('(SELECT 
                user_recruitment.id as id_recruitment, 
                user_recruitment.company_name
                from user_recruitment) as T4', 'T4.id_recruitment = message.id_receive');
        }
        // hop thu di
        else {
            //join table user_profile
            $builder->join('(SELECT 
                user_profile.id as id_candidate, 
                user_profile.full_name,
                user_profile.job_id
                from user_profile) as T2', 'T2.id_candidate = message.id_receive');

            //join table user_profile
            $builder->join('(SELECT 
                job.id as id_job, 
                job.slug
                from job) as T3', 'T3.id_job = T2.job_id');

            //join table user_recruitment
            $builder->join('(SELECT 
                user_recruitment.id as id_recruitment, 
                user_recruitment.company_name
                from user_recruitment) as T4', 'T4.id_recruitment = message.id_send');
        }

        $messDetail = $builder->get()->getResult();

        return $this->render('recruitment/ajax-message-receive-detail', [
            'messDetail' => $messDetail[0],
            'type' => $status,
        ]);
    }

    public function exports_saved_data($dataExport)
    {
        $csv_list = [
            ['Hồ sơ', 'Danh mục', 'Ghi Chú', 'Ngày lưu'],
        ];
        foreach ($dataExport as $usPs) {
            array_push($csv_list, [$usPs->title ?? "", $usPs->category ?? "", $usPs->note ?? "", date_format(date_create($usPs->updated), "d/m/Y")]);
            array_push($csv_list, [$usPs->full_name ?? ""]);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=export.csv;');
        header('Content-Transfer-Encoding: binary');

        $file_name = time() . '_' . "ho-so.csv";
        $handle = fopen($file_name, 'wb');
        fprintf($handle, "\xEF\xBB\xBF");

        foreach ($csv_list as $data_array) {
            fputcsv($handle, $data_array);
        }
        fclose($handle);

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$file_name");

        readfile($file_name);
        exit;
    }

    public function exports_viewed_data($dataExport)
    {
        $csv_list = [
            ['Hồ sơ', 'Thông tin liên hệ', 'Ngày xem', 'IP xem hồ sơ', 'Số điểm', 'Số điểm BH'],
        ];
        foreach ($dataExport as $usPv) {
            array_push($csv_list, [$usPv->title ?? "", $usPv->email ?? "", date_format(date_create($usPv->updated), "d/m/Y"), $usPv->ip_view ?? "", $usPv->scores ?? "", $usPv->scores_BH ?? ""]);
            array_push($csv_list, [$usPv->full_name ?? "", $usPv->phone_number ?? ""]);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=export.csv;');
        header('Content-Transfer-Encoding: binary');

        $file_name = time() . '_' . "ho-so.csv";
        $handle = fopen($file_name, 'wb');
        fprintf($handle, "\xEF\xBB\xBF");

        foreach ($csv_list as $data_array) {
            fputcsv($handle, $data_array);
        }
        fclose($handle);

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$file_name");

        readfile($file_name);
        exit;
    }

    public function exports_apply_data($dataExport)
    {
        $csv_list = [
            ['Họ tên', 'Vị trí ứng tuyển', 'Ngày nộp', 'Đã liên hệ', 'Đã test', 'Đã phỏng vấn', 'Trúng tuyển', 'Không trúng'],
        ];
        foreach ($dataExport as $usPa) {
            array_push($csv_list, [
                $usPa->job_title ?? "", $usPa->meta_category ?? "", date_format(date_create($usPa->apply_date), "d/m/Y"),
                ($usPa->status == 1) ? "true" : "false",
                ($usPa->status == 2) ? "true" : "false",
                ($usPa->status == 3) ? "true" : "false",
                ($usPa->status == 4) ? "true" : "false",
                ($usPa->status == 5) ? "true" : "false"
            ]);
            array_push($csv_list, [$usPa->full_name  ?? ""]);
            array_push($csv_list, [!empty($usPa->is_censorship) ? "Đã kiểm duyệt"  : "Chưa kiểm duyệt"]);
        }
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Description: File Transfer');
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename=export.csv;');
        header('Content-Transfer-Encoding: binary');

        $file_name = time() . '_' . "ho-so.csv";
        $handle = fopen($file_name, 'wb');
        fprintf($handle, "\xEF\xBB\xBF");

        foreach ($csv_list as $data_array) {
            fputcsv($handle, $data_array);
        }
        fclose($handle);

        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=$file_name");

        readfile($file_name);
        exit;
    }

    function ajaxInsertOrUpdateNoteApplyUsP()
    {
        $this->layout = null;
        $id_userP_apply = $this->request->getPost('id_userP_apply');
        $note_apply = $this->request->getPost('note_apply');
        if ($id_userP_apply && $note_apply) {
            $update = (new UserNewsActivitiesModel())->update_note_apply($id_userP_apply, $note_apply);
            if ($update) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    function ajaxDeleteNoteApplyUsP()
    {
        $this->layout = null;
        $id_userP_apply = $this->request->getPost('id_userP_apply');

        if ($id_userP_apply) {
            $delete = (new UserNewsActivitiesModel())->delete_note_apply($id_userP_apply);
            if ($delete) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    function ajaxUpdateStatusApply()
    {
        $this->layout = null;
        $id_userP_apply = $this->request->getPost('id_userP_apply');
        $status_update = $this->request->getPost('status_update');

        if ($id_userP_apply) {
            $update = (new UserNewsActivitiesModel())->update_status_apply($id_userP_apply, $status_update);
            if ($update) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    function ajaxDeleteRowsApllyProfile()
    {
        $this->layout = null;
        $ids = $this->request->getPost('ids');

        if (count($ids) > 0) {
            $delete = (new UserNewsActivitiesModel())->remove_apply($ids);
            if ($delete) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    function ajaxDeleteMess()
    {
        $this->layout = null;
        $id = $this->request->getPost('id');
        $type_delete = $this->request->getPost('typeDelete') ?? 0;

        if ($id && !empty($id)) {
            $delete = (new MessageModel())->detele_rows($id, $type_delete);
            if ($delete) {
                return 'Thao tác thành công!';
            }
            return 'Đã xảy ra lỗi!';
        }
        return 'Đã xảy ra lỗi!';
    }

    function ajaxReceiveMess()
    {
        $this->layout = null;

        $title_mess = $this->request->getPost('title_mess');
        $content_mess = $this->request->getPost('content_mess');
        $receiver_id = $this->request->getPost('receiver_id');
        $sender_id = $this->request->getPost('sender_id');
        $g_recaptcha_response = $this->request->getPost('g_recaptcha_response');

        if (!empty($title_mess) && !empty($content_mess) && !empty($receiver_id) && !empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $type = 2;
                $insert = (new MessageModel())->insert_rows($title_mess, $content_mess, $receiver_id, $sender_id, $type);
                if ($insert) {
                    return '1';
                }
                return "Đã xảy ra lỗi";
            }
            return "Đã xảy ra lỗi";
        }
        return "Vui lòng điền đủ thông tin!";
    }

    function ajaxSendrequest()
    {
        $this->layout = null;
        //get user_recr_id
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);

        $cat_send_request = $this->request->getPost('cat_send_request');
        $description_send_request = $this->request->getPost('description_send_request');
        $g_recaptcha_response = $this->request->getPost('g_recaptcha_response');

        if (!empty($cat_send_request) && !empty($description_send_request) && !empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $insert = (new RequestAdminModel())->insert_rows($cat_send_request, $user_id, $description_send_request);
                if ($insert) {
                    return '1';
                }
                return "Đã xảy ra lỗi";
            }
            return "Lỗi xác thực Captcha";
        }
        return "Vui lòng điền đủ thông tin!";
    }
}
