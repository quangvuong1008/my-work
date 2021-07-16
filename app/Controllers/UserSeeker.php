<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\FieldsOfOperationModel;
use App\Models\NewsModel;
use App\Models\ProvinceModel;
use App\Models\UserCompanyFollow;
use App\Models\UserModel;
use App\Models\UserNewsActivitiesModel;
use App\Models\UserRecruitmentFieldsModel;
use App\Models\UserRecruitmentModel;
use App\Models\VotesModel;
use App\Models\SettingsModel;
use App\Helpers\SessionHelper;
use CodeIgniter\Model;
use DateTime;
use App\Models\NewsRecruitmentModel;
use App\Models\JobModel;
use App\Models\UserProfileModel;
use App\Models\MessageModel;

class UserSeeker extends BaseController
{
    //login
    public function login_seeker()
    {


        return $this->render('seeker/login', [

            'models' => ''
        ]);
    }

    public function user_login()
    {

        $data = $this->request->getPost();
        $email = $data['email'];
        $password = md5($data['password']);

        $login = (new UserModel());
        $user = $login->select_login($email, $password);

        if ($user) {
            $session = session();
            $session->set(SESSION_USER_ID_KEY, $user->id);
            $session->set(SESSION_USER_TYPE_KEY, 'seeker');
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS_LOGIN',
                'message' => 'Đăng nhập thành công'
            ]);
            return $this->response->redirect(route_to('home_seeker'));
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR_LOGIN',
                'message' => 'Đăng nhập thất bại , tài khoản hoặc mật khẩu không đúng'
            ]);
        }
        return $this->response->redirect(route_to('login_seeker'));
    }

    //register
    public function register_seeker()
    {


        return $this->render('seeker/register', [
            'models' => ''
        ]);
    }

    public function add_register()
    {
        $data = $this->request->getPost();
        $email = $data['email'];
        $password = md5($data['password']);
        $fullname = $data['fullname'];
        $phone = $data['phone'];
        $g_recaptcha_response = $data['g-recaptcha-response'];

        $created_at = date_timestamp_get(new DateTime());

        if (!empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $save = new UserModel();
                $user_register = $save->select_register($email);
                if ($user_register <= 0) {
                    if ($save->insert_register($email, $password, $fullname, $phone, $created_at)) {
                        SessionHelper::getInstance()->setFlash('REGISTER', [
                            'type' => 'FRONT_SUCCESS',
                            'message' => 'Đăng ký thành công vui lòng chờ admin xét duyệt để được đăng bài'
                        ]);
                    }
                } else {
                    SessionHelper::getInstance()->setFlash('REGISTER', [
                        'type' => 'FRONT_ERROR',
                        'message' => 'Email đã tồn tại vui lòng kiểm tra lại'
                    ]);
                }
            } else {
                SessionHelper::getInstance()->setFlash('REGISTER', [
                    'type' => 'FRONT_ERROR',
                    'message' => 'Xác thực lỗi mã Captcha'
                ]);
            }
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR',
                'message' => 'Vui lòng xác thực mã Captcha'
            ]);
        }
        return $this->response->redirect(route_to('register_seeker'));
    }

    public function search_job()
    {

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();


        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();

        $model_rcm = (new NewsRecruitmentModel());
        $search_param = [];
        if ($_GET) {

            $q = $_GET['q'];
            if ($q) {
                $model_rcm = $model_rcm
                    ->like('title', $q);
                $search_param['q'] = $q;
            }

            $wage = $_GET['wage'];
            if ($wage) {
                $model_rcm = $model_rcm
                    ->where('wage', $wage);
                $search_param['wage'] = $wage;
            }

            $province_id = $_GET['province_id'];
            if ($province_id) {
                $model_rcm = $model_rcm
                    ->where('province', $province_id);
                $search_param['province_id'] = $province_id;
            }

            $province_ids = $_GET['province_ids'];
            if ($province_ids) {
                $arr_provinces = explode(',', $province_ids);
                $model_rcm = $model_rcm
                    ->whereIn('province', $arr_provinces);

                $search_param['province_ids'] = $arr_provinces;
            }


            $job_id = $_GET['job_id'];
            if ($job_id) {
                $model_rcm = $model_rcm
                    ->where('job_id', $job_id);
                $search_param['job_id'] = $job_id;
            }

            $job_ids = $_GET['job_ids'];
            if ($job_ids) {
                $arr_jobs = explode(',', $job_ids);
                $model_rcm = $model_rcm
                    ->whereIn('job_id', $arr_jobs);
                $search_param['job_ids'] = $arr_jobs;
            }

            $level_ids = $_GET['level_ids'];
            if ($level_ids) {
                $arr_levels = explode(',', $level_ids);
                $model_rcm = $model_rcm
                    ->whereIn('level', $arr_levels);
                $search_param['level_ids'] = $arr_levels;
            }

            $type_of_work_ids = $_GET['type_of_work_ids'];
            if ($type_of_work_ids) {
                $arr_type_of_work_ids = explode(',', $type_of_work_ids);
                $model_rcm = $model_rcm
                    ->whereIn('type_of_work', $arr_type_of_work_ids);
                $search_param['type_of_work_ids'] = $arr_type_of_work_ids;
            }

            $product_id = $_GET['product_id'];
            if ($product_id) {
                $model_rcm = $model_rcm
                    ->where('product_id', $product_id);
                $search_param['product_id'] = $product_id;
            }
        }
        $recruitment_new = $model_rcm
            ->orderBy('created_at', 'DESC');
        $session = session();
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        return $this->render('seeker/search_job', [
            //            'model' => $model,
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'recruitment_new' => $recruitment_new->paginate(10),
            'pager' => $recruitment_new->pager,
            'search_param' => $search_param,
            'user_type' => $user_type,
        ]);
    }

    public function company()
    {

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();


        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();

        $model_user_recruitment = (new UserRecruitmentModel())->orderBy('created_at', 'DESC');

        return $this->render('seeker/company', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'list_user_recruitment' => $model_user_recruitment->paginate(10),
            'pager' => $model_user_recruitment->pager,
        ]);
    }

    public function save_news_recruitment($news_recruitment_id)
    {

        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($user_id && $user_type == 'seeker') {
            $model_rcm = (new NewsRecruitmentModel());
            $model_rcm->save_news_recruitment($user_id, $news_recruitment_id);
            echo 1;
            return;
        } else {
            echo 0;
            return;
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove(SESSION_USER_ID_KEY);
        $session->remove(SESSION_USER_TYPE_KEY);
        return $this->response->redirect(route_to('home_index'));
    }

    public function update_info()
    {
        $session = session();

        $id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($this->isPost()) {
            $model = new UserModel();
            $user = $model->find($id);
            if ($user) {
                $data_post = $this->request->getPost();
                $file = $this->request->getFile('avt');
                $avt = $user->images;
                if ($file && $file->getSize()) {
                    $uploadPath = ROOTPATH . PUBLISH_FOLDER . '/uploads/user';
                    $avt = $file->getFileNameStore();
                    $file->move($uploadPath, $avt);
                }
                $model->update($id, [
                    'fullname' => $data_post['name'], 'images' => $avt, 'birthday' => $data_post['birthday'],
                    'address' => $data_post['address'], 'sex' => $data_post['sex'],
                    'love' => $data_post['love']
                ]);

                return $this->response->redirect(route_to('seeker_update_info'));
            }
        } else {
            $model_job = (new JobModel());
            $list_all_job = $model_job->where('is_lock', 0)
                ->orderBy('title', 'ASC')
                ->findAll();


            $model_provinces = (new ProvinceModel());
            $list_all_province = $model_provinces->orderBy('_name', 'ASC')
                ->findAll();

            $model_user = (new UserModel())->find($id);
            return $this->render('seeker/update_info', [
                'list_job' => $list_all_job,
                'list_province' => $list_all_province,
                'model' => $model_user,
            ]);
        }
    }

    public function change_password()
    {
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        $data = $this->request->getPost();
        $old_password = md5($data['old_password']);
        $password = md5($data['password']);

        $model = new UserModel();


        $user = $model->find($user_id);
        if ($user->password == $old_password) {
            $model->update($user_id, ['password' => $password]);
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS',
                'message' => 'Đổi mật khẩu thành công'
            ]);
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR',
                'message' => 'Mật khẩu cũ không trùng khớp'
            ]);
        }
        return $this->response->redirect(route_to('seeker_update_info'));
    }

    public function profile_manage()
    {
        $session = session();

        $id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();

        $model_user_profile = (new UserProfileModel());
        $list_user_profile = $model_user_profile->orderBy('id', 'ASC')
            ->where('user_id', $id)
            ->findAll();

        //            $model_user = (new UserModel())->find($id);
        return $this->render('seeker/profile_manage', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'list_user_profile' => $list_user_profile,
        ]);
    }
    public function delete_profile($id)
    {
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($user_id &&  $user_type == 'seeker') {

            $model = (new UserProfileModel());
            $model->delete($model->getPrimaryKey());

            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS',
                'message' => 'Đã xóa hồ sơ thành công'
            ]);
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR',
                'message' => 'Không thể xóa bản ghi này'
            ]);
        }
        return $this->response->redirect(route_to('seeker_profile_manage'));
    }

    public  function  create_cv($profile_id = 0)
    {
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($this->isPost()) {
            if ($profile_id) {
                $cv_files = $this->request->getFileMultiple('cv_files');

                $list_file = [];

                if (count($cv_files) > 0) {
                    foreach ($cv_files as $file) {

                        if ($file && $file->getSize()) {
                            $uploadPath = ROOTPATH . PUBLISH_FOLDER . '/uploads/user';
                            $avt = $file->getFileNameStore();
                            $file->move($uploadPath, $avt);
                            $list_file[] = $avt;
                        }
                    }
                }

                $data_post = $this->request->getPost();

                $model = (new UserProfileModel());
                $model->update($profile_id, [
                    'user_id' => $user_id,
                    'full_name' => $data_post['full_name'],
                    'birthday' => $data_post['birthday'],
                    'phone_number' => $data_post['phone_number'],
                    'address' => $data_post['address'],
                    'gender' => $data_post['gender'],
                    'married' => $data_post['married'],
                    'title' => $data_post['title'],
                    'position_wanted_id' => $data_post['position_wanted_id'],
                    'job_id' => $data_post['job_id'],
                    'province_id' => $data_post['province_id'],
                    'edu_level' => $data_post['edu_level'],
                    'job_type' => $data_post['job_type'],
                    'salary' => $data_post['salary']
                ]);

                foreach ($list_file as $file_path) {

                    $model->insert_files($user_id, $profile_id, $file_path);
                }
                SessionHelper::getInstance()->setFlash('REGISTER', [
                    'type' => 'FRONT_SUCCESS',
                    'message' => 'Sửa hồ sơ thành công'
                ]);
                return $this->response->redirect(route_to('seeker_edit_cv', $profile_id));
            } else {

                $cv_files = $this->request->getFileMultiple('cv_files');

                $list_file = [];

                if (count($cv_files) > 0) {
                    foreach ($cv_files as $file) {

                        if ($file && $file->getSize()) {
                            $uploadPath = ROOTPATH . PUBLISH_FOLDER . '/uploads/user';
                            $avt = $file->getFileNameStore();
                            $file->move($uploadPath, $avt);
                            $list_file[] = $avt;
                        }
                    }
                }


                $data_post = $this->request->getPost();
                $g_recaptcha_response = $data_post['g-recaptcha-response'];
                if (!empty($g_recaptcha_response)) {
                    $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
                    $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
                    $responseData = json_decode($verifyResponse);
                    if ($responseData->success) {
                        $model = (new UserProfileModel());
                        $profile_id = $model->insert([
                            'user_id' => $user_id,
                            'full_name' => $data_post['full_name'],
                            'birthday' => $data_post['birthday'],
                            'phone_number' => $data_post['phone_number'],
                            'address' => $data_post['address'],
                            'gender' => $data_post['gender'],
                            'married' => $data_post['married'],
                            'title' => $data_post['title'],
                            'position_wanted_id' => $data_post['position_wanted_id'],
                            'job_id' => $data_post['job_id'],
                            'province_id' => $data_post['province_id'],
                            'edu_level' => $data_post['edu_level'],
                            'job_type' => $data_post['job_type'],
                            'salary' => $data_post['salary']
                        ], true);

                        foreach ($list_file as $file_path) {
                            $model->insert_files($user_id, $profile_id, $file_path);
                        }
                        SessionHelper::getInstance()->setFlash('REGISTER', [
                            'type' => 'FRONT_SUCCESS',
                            'message' => 'Tạo hồ sơ thành công'
                        ]);
                        return $this->response->redirect(route_to('seeker_profile_manage'));
                    } else {
                        SessionHelper::getInstance()->setFlash('REGISTER', [
                            'type' => 'FRONT_ERROR',
                            'message' => 'Xác thực lỗi mã Captcha'
                        ]);
                    }
                } else {
                    SessionHelper::getInstance()->setFlash('REGISTER', [
                        'type' => 'FRONT_ERROR',
                        'message' => 'Vui lòng xác thực mã Captcha'
                    ]);
                }
            }
        }

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();

        $user_profile = (new UserProfileModel())->find($profile_id);

        //            $model_user = (new UserModel())->find($id);
        return $this->render('seeker/cv_online', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'model' => $user_profile
        ]);
    }
    public function edit_cv($profile_id = 0)
    {
        var_dump($profile_id);
        die;
    }
    public function jobs_apply()
    {
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();



        $list_news_apply = (new UserNewsActivitiesModel())->where('user_id', $user_id)
            ->where('is_apply', 1)
            ->orderBy('created_at', 'DESC')->findAll();


        $list_new_id = [];
        if ($list_news_apply) {
            foreach ($list_news_apply as $new_apply) {
                $list_new_id[] = $new_apply->news_id;
            }
        }
        $model_news_rcm = null;
        if (count($list_new_id)) {
            $model_news_rcm = (new NewsRecruitmentModel())->whereIn('id', $list_new_id)->orderBy('id', 'DESC')->findAll();
        }

        $model_news_suggest = null;
        $list_job_in_profile = (new UserProfileModel())->where('user_id', $user_id)->findAll();
        $list_job_id = [];
        foreach ($list_job_in_profile as $job) {
            $list_job_id[] = $job->job_id;
        }

        if (count($list_job_id)) {
            $model_news_suggest = (new NewsRecruitmentModel())->whereIn('job_id', $list_job_id)->orderBy('id', 'DESC');
        } else {
            $model_news_suggest = (new NewsRecruitmentModel())->orderBy('id', 'DESC');
        }

        return $this->render('seeker/jobs_apply', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'list_new_recruitment' => $model_news_rcm,
            'list_news_suggest' => $model_news_suggest->paginate(10),
            'pager' => $model_news_suggest->pager
        ]);
    }

    public function jobs_save()
    {
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();



        $list_news_saved = (new UserNewsActivitiesModel())->where('user_id', $user_id)
            ->where('is_save', 1)->findAll();


        $list_new_id = [];
        if ($list_news_saved) {
            foreach ($list_news_saved as $new_saved) {
                $list_new_id[] = $new_saved->news_id;
            }
        }
        $model_news_rcm = null;
        if (count($list_new_id)) {
            $model_news_rcm = (new NewsRecruitmentModel())->whereIn('id', $list_new_id)->orderBy('id', 'DESC')->findAll();
        }

        $model_news_suggest = null;
        $list_job_in_profile = (new UserProfileModel())->where('user_id', $user_id)->findAll();
        $list_job_id = [];
        foreach ($list_job_in_profile as $job) {
            $list_job_id[] = $job->job_id;
        }

        if (count($list_job_id)) {
            $model_news_suggest = (new NewsRecruitmentModel())->whereIn('job_id', $list_job_id)->orderBy('id', 'DESC');
        } else {
            $model_news_suggest = (new NewsRecruitmentModel())->orderBy('id', 'DESC');
        }

        return $this->render('seeker/jobs_saved', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'list_new_recruitment' => $model_news_rcm,
            'list_news_suggest' => $model_news_suggest->paginate(10),
            'pager' => $model_news_suggest->pager,
            'user_type' => $user_type,
        ]);
    }

    public function jobs_suggest()
    {
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();


        $model_news_suggest = null;
        $list_job_in_profile = (new UserProfileModel())->where('user_id', $user_id)->findAll();
        $list_job_id = [];
        foreach ($list_job_in_profile as $job) {
            $list_job_id[] = $job->job_id;
        }

        if (count($list_job_id)) {
            $model_news_suggest = (new NewsRecruitmentModel())->whereIn('job_id', $list_job_id)->orderBy('id', 'DESC');
        } else {
            $model_news_suggest = (new NewsRecruitmentModel())->orderBy('id', 'DESC');
        }

        return $this->render('seeker/jobs_suggest', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'list_news_suggest' => $model_news_suggest->paginate(10),
            'pager' => $model_news_suggest->pager,
            'user_type' => $user_type,
        ]);
    }

    public function detail_jobs($id)
    {
        $model = (new NewsRecruitmentModel())->find($id);

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();

        $children = (new NewsRecruitmentModel())
            ->where('job_id', $model->job_id)
            ->where('status', 0)
            ->orderBy('updated_at', 'DESC');

        $session = session();
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        return $this->render('seeker/detail_jobs', [
            'model' => $model,
            'models' => $children->paginate(10),
            'pager' => $children->pager,
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'user_type' => $user_type,

        ]);
    }

    public function ajaxSendMessToRecruitment()
    {
        $this->layout = null;

        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);

        $title_mess = $this->request->getPost('title_mess');
        $content_mess = $this->request->getPost('content_mess');
        $receiver_id = $this->request->getPost('receiver_id');
        $g_recaptcha_response = $this->request->getPost('g_recaptcha_response');

        if (!empty($title_mess) && !empty($content_mess) && !empty($receiver_id) && !empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $type = 1;
                $insert = (new MessageModel())->insert_rows($title_mess, $content_mess, $receiver_id, $user_id, $type);
                if ($insert) {
                    return '1';
                }
                return "Đã xảy ra lỗi";
            }
            return "Đã xảy ra lỗi";
        }
        return "Vui lòng điền đủ thông tin!";
    }

    public function message()
    {

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();
        return $this->render('seeker/message', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
        ]);
    }

    public function sent_message()
    {

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();

        return $this->render('seeker/sent_message', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
        ]);
    }

    public function ajaxMessSeekerSentData()
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
        $builder->where('type', 1);
        $builder->orderBy('date_send', 'DESC');

        //join table user
        $builder->join('(SELECT 
            user.id as id_user, 
            user.fullname
            from user) as T4', 'T4.id_user = message.id_send');

        $allRows = $builder->countAllResults(false);

        $messData = $builder->get()->getResult();

        return $this->render('seeker/ajax-message-sent', [
            'messData' => $messData,
            'countMess' => $allRows,
        ]);
    }

    public function ajaxMessSeekerReceiveData()
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
        $builder->where('type', 2);
        $builder->where('is_deleted', 0);
        $builder->orderBy('date_send', 'DESC');

        if ($status != '0') {
            $builder->where('status_mess', $status);
        }

        //join table user_recruitment
        $builder->join('(SELECT 
            user_recruitment.id as id_recruitment, 
            user_recruitment.company_name
            from user_recruitment) as T4', 'T4.id_recruitment = message.id_send');

        $allRows = $builder->countAllResults(false);

        $messData = $builder->get()->getResult();

        return $this->render('seeker/ajax-message-receive', [
            'messData' => $messData,
            'countMess' => $allRows,
            'tab' => $status
        ]);
    }

    public function ajaxMessSeekerDetailData()
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
            //join table user
            $builder->join('(SELECT 
                user.id as id_user, 
                user.fullname
                from user) as T3', 'T3.id_user = message.id_receive');

            //join table user_recruitment
            $builder->join('(SELECT 
                user_recruitment.id as id_recruitment, 
                user_recruitment.company_name
                from user_recruitment) as T4', 'T4.id_recruitment = message.id_send');
        }
        // hop thu di
        else {
            $builder->join('(SELECT 
                user.id as id_user, 
                user.fullname
                from user) as T3', 'T3.id_user = message.id_send');

            //join table user_recruitment
            $builder->join('(SELECT 
                user_recruitment.id as id_recruitment, 
                user_recruitment.company_name
                from user_recruitment) as T4', 'T4.id_recruitment = message.id_receive');
        }

        $messDetail = $builder->get()->getResult();

        return $this->render('seeker/ajax-message-receive-detail', [
            'messDetail' => $messDetail[0],
            'type' => $status,
        ]);
    }

    public function ajaxReceiveMessSeeker()
    {
        $this->layout = null;

        $title_mess = $this->request->getPost('title_mess');
        $content_mess = $this->request->getPost('content_mess');
        $receiver_id = $this->request->getPost('receiver_id');
        $sender_id = $this->request->getPost('sender_id');
        $g_recaptcha_response = $this->request->getPost('g_recaptcha_response');

        if (!empty($title_mess) && !empty($content_mess) && !empty($receiver_id) && !empty($sender_id) && !empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $type = 1;
                $insert = (new MessageModel())->insert_rows($title_mess, $content_mess, $receiver_id, $sender_id, $type);
                if ($insert) {
                    return '1';
                }
                return 'Đã có lỗi xảy ra';
            }
            return 'Đã có lỗi xảy ra';
        }
        return "Vui lòng điền đủ thông tin!";
    }

    public function companies_follow()
    {
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);

        $model_job = (new JobModel());
        $list_all_job = $model_job->where('is_lock', 0)
            ->orderBy('title', 'ASC')
            ->findAll();

        $model_provinces = (new ProvinceModel());
        $list_all_province = $model_provinces->orderBy('_name', 'ASC')
            ->findAll();


        $model_news_suggest = null;
        $list_job_in_profile = (new UserProfileModel())->where('user_id', $user_id)->findAll();
        $list_job_id = [];
        foreach ($list_job_in_profile as $job) {
            $list_job_id[] = $job->job_id;
        }

        if (count($list_job_id)) {
            $model_news_suggest = (new NewsRecruitmentModel())->whereIn('job_id', $list_job_id)->orderBy('id', 'DESC');
        } else {
            $model_news_suggest = (new NewsRecruitmentModel())->orderBy('id', 'DESC');
        }

        $model_user_company_follow = (new UserCompanyFollow())->where('user_id', $user_id)->findAll();
        //        $array_user_recruitment = [];
        //        if($model_user_company_follow ){
        //            foreach ($model_user_company_follow as $follow_company){
        //                $array_user_recruitment[] = (new UserRecruitmentModel())->find($follow_company->user_rcm_id);
        //            }
        //        }

        $model_user_recruitment_best = (new UserRecruitmentModel())->orderBy('id', 'RANDOM')->findAll(4);
        return $this->render('seeker/companies_follow', [
            'list_job' => $list_all_job,
            'list_province' => $list_all_province,
            'list_news_suggest' => $model_news_suggest->paginate(10),
            'pager' => $model_news_suggest->pager,
            'list_company_follow' => $model_user_company_follow,
            'list_best_company' => $model_user_recruitment_best,
            'user_type' => $user_type,
        ]);
    }
    public function delete_company_follow()
    {
        $data = $this->request->getPost();

        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($data['company_ids']) {
            $array_company_id = explode(',', $data['company_ids']);
            (new UserCompanyFollow())->where('user_id', $user_id)->whereIn('user_rcm_id', $array_company_id)->delete();
        }
    }

    public function add_company_follow()
    {
        $data = $this->request->getPost();

        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($data['company_id']) {
            (new UserCompanyFollow())->insert([
                'user_id' => $user_id,
                'user_rcm_id' => $data['company_id']
            ]);
        }
    }
    public function do_apply_job($news_job_id)
    {
        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        if ($user_type != 'seeker') {
            return redirect('login_seeker');
        }
        $time = date_timestamp_get(new DateTime());
        $model_news_activity = (new UserNewsActivitiesModel());
        $exits_activity = $model_news_activity->where('news_id', $news_job_id)->first();
        if (!$exits_activity) {
            $model_news_activity->insert([
                'user_id' => $user_id,
                'news_id' => $news_job_id,
                'is_apply' => 1,
                'date_apply' => $time
            ]);
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS',
                'message' => 'Nạp hồ sơ thành công'
            ]);
        } else {
            if (!$exits_activity->is_apply) {
                $model_news_activity->update($exits_activity->id, [
                    'is_apply' => 1,
                    'date_apply' => $time
                ]);
                SessionHelper::getInstance()->setFlash('REGISTER', [
                    'type' => 'FRONT_SUCCESS',
                    'message' => 'Nạp hồ sơ thành công'
                ]);
            } else {
                SessionHelper::getInstance()->setFlash('REGISTER', [
                    'type' => 'FRONT_SUCCESS',
                    'message' => 'Hồ sơ đã nạp trước đó'
                ]);
            }
        }
        return redirect('seeker_jobs_apply');
    }
}
