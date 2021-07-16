<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\FieldsOfOperationModel;
use App\Models\NewsModel;
use App\Models\ProvinceModel;
use App\Models\UserRecruitmentFieldsModel;
use App\Models\UserRecruitmentModel;
use App\Models\VotesModel;
use App\Models\SettingsModel;
use App\Helpers\SessionHelper;
use CodeIgniter\Model;
use App\Models\JobModel;
use DateTime;

class UserRecruitment extends BaseController
{
    //login
    public function login()
    {


        return $this->render('recruitment/login', [

            'models' => ''
        ]);
    }

    public function user_login()
    {

        $data = $this->request->getPost();
        $email = $data['email'];
        $password = md5($data['password']);

        $login = (new UserRecruitmentModel());
        $user = $login->select_login($email, $password);

        if ($user) {
            $session = session();
            $session->set(SESSION_USER_ID_KEY, $user->id);
            $session->set(SESSION_USER_TYPE_KEY, 'recruitment');

            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS_LOGIN',
                'message' => 'Đăng nhập thành công'
            ]);
            return $this->response->redirect(route_to('rcm_index'));
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR_LOGIN',
                'message' => 'Đăng nhập thất bại , tài khoản hoặc mật khẩu không đúng'
            ]);
        }
        return $this->response->redirect(route_to('login'));
    }

    //register
    public function register()
    {

        $province = (new ProvinceModel())->findAll();

        return $this->render('recruitment/register', [
            'province' => $province,
            'models' => ''
        ]);
    }

    public function add_register()
    {
        $data = $this->request->getPost();
        $email = $data['email'];
        $password = md5($data['password']);
        $company_name = $data['company_name'];
        $province = $data['province'];
        $scales = $data['scales'];
        $contact_name = $data['contact_name'];
        $contact_email = $data['contact_email'];
        $contact_phone_number = $data['contact_phone_number'];
        $created_at = date_timestamp_get(new DateTime());
        $g_recaptcha_response = $data['g-recaptcha-response'];

        if (!empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $save = new UserRecruitmentModel();
                $user_register = $save->select_register($email);
                if ($user_register <= 0) {
                    if ($save->insert_register($email, $password, $company_name, $province, $scales, $contact_name, $contact_email, $contact_phone_number, $created_at)) {
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
        return $this->response->redirect(route_to('register'));
    }

    // logout
    public function logout()
    {
        $logout_user = new UserRecruitmentModel();
        $session = session();
        $session->remove(SESSION_USER_ID_KEY);
        $session->remove(SESSION_USER_TYPE_KEY);
        return $this->response->redirect(route_to('home_index'));
    }

    // quan ly tai khoan
    public function account()
    {

        $model = new UserRecruitmentModel();

        $session = session();

        $user_id = $session->get(SESSION_USER_ID_KEY);
        if ($user_id) {
            $models = $model->find($user_id);
        }
        $province = (new ProvinceModel())->findAll();

        $fields_operation = (new FieldsOfOperationModel())
            ->addQuery('where', ['is_lock', 0])
            ->getFieldsRecursive(0, 0, 2);

        $fields_rcm_info = (new UserRecruitmentFieldsModel)
            ->select_fields($user_id);

        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();

        return $this->render('recruitment/account', [
            'models' => $models,
            'province' => $province,
            'fields_operation' => $fields_operation,
            'fields_rcm_info' => $fields_rcm_info,
            'job' => $job
        ]);
    }

    //đổi mật khẩu
    public function change_password()
    {
        $session = session();
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $data = $this->request->getPost();
        $old_password = md5($data['old_password']);

        $password = md5($data['password']);
        $save = new UserRecruitmentModel();
        $select = $save->select_user_password($user_id);
        $password_db = '';
        foreach ($select as $sl) {
            $password_db = $sl;
        }
        if ($password_db == $old_password) {
            $save->update_user_password($password, $user_id);
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS',
                'message' => 'Đổi mật khẩu thành công'
            ]);
        } else {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR',
                'message' => 'Mật khẩu không trùng khớp'
            ]);
        }
        return $this->response->redirect(route_to('account'));
    }

    //Thay doi thong tin
    public function change_information()
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
        $data = $this->request->getPost();
        //        $file = $data['avt'];
        $company_address = $data['company_address'];
        $province = $data['province'];
        $fields = $data['fields'];
        $company_phone = $data['company_phone'];
        $intro = $data['intro'];
        $company_website = $data['company_website'];
        $contact_name = $data['contact_name'];
        $contact_email = $data['contact_email'];
        $contact_address = $data['contact_address'];
        $contact_phone_number = $data['contact_phone_number'];
        $contact_form = $data['contact_form'];
        $updated_at = date_timestamp_get(new DateTime());


        $file = $this->request->getFile('avt');

        if ($file == '') {
            $avt = $models->avt;
        } else {
            $uploadPath = ROOTPATH . PUBLISH_FOLDER . '/uploads/user_recruitment';
            $avt = $file->getFileNameStore();
            $file->move($uploadPath, $avt);
        }

        $recruitment_fields = (new UserRecruitmentFieldsModel());
        foreach ($fields as $fds) {
            $save_fields = $recruitment_fields->insert_fields($id, $fds);
        }
        $save = $user_recruitment->update_change_recruitment(
            $id,
            $avt,
            $company_address,
            $province,
            $company_phone,
            $intro,
            $company_website,
            $contact_name,
            $contact_email,
            $contact_address,
            $contact_phone_number,
            $contact_form,
            $updated_at
        );

        //        var_dump('thanhf coong ');die();

        if (!$save) {
            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_ERROR',
                'message' => 'Thay đổi thông tin thất bại'
            ]);
        } else {

            SessionHelper::getInstance()->setFlash('REGISTER', [
                'type' => 'FRONT_SUCCESS',
                'message' => 'Thay đổi thông tin thành công'
            ]);
        }
        return $this->response->redirect(route_to('account'));
    }

    public function delete_fields_product()
    {
        $data = $this->request->getPost();
        $id = $data['id'];

        (new UserRecruitmentFieldsModel())->delete($id);

        echo json_encode(1);
    }

    //add category add_user_meta_data
    public function add_user_meta_data()
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $session = session();

        $data = $this->request->getPost();
        $category = $data['category'];
        $user_id = $session->get(SESSION_USER_ID_KEY);
        $g_recaptcha_response = $data['g-recaptcha-response'];

        if (!empty($g_recaptcha_response)) {
            $secret = '6LeDB4AbAAAAAP6hjvfRdQNAoAfjJNREPmLhccdm';
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $g_recaptcha_response);
            $responseData = json_decode($verifyResponse);
            if ($responseData->success) {
                $userRecr = (new UserRecruitmentModel());
                $insert =  $userRecr->insert_user_meta_data($category, 2, $user_id);
                if ($insert) {
                    SessionHelper::getInstance()->setFlash('REGISTER', [
                        'type' => 'FRONT_SUCCESS',
                        'message' => 'Tạo mới thành công!'
                    ]);
                } else {
                    SessionHelper::getInstance()->setFlash('REGISTER', [
                        'type' => 'FRONT_ERROR',
                        'message' => 'Đã có lỗi xảy ra!'
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
                'message' => 'Vui lòng xác thực mã Captcha!'
            ]);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    //add candidate_save
    public function save_candidate()
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $session = session();

        $data = $this->request->getPost();
        $cat_id = $data['cat_id'];
        $note = $data['note'];
        $user_profile_id =  $data['user_profile_id'];
        $user_recr_id = $session->get(SESSION_USER_ID_KEY);
        $userRecr = (new UserRecruitmentModel());
        $insert =  $userRecr->insert_user_profile_saved($user_profile_id, $user_recr_id, $note, $cat_id);
        if ($insert) {
            return "Thao tác thành công";
        }
        return $this->render('errors/html/error_exception');
    }

    //update candidate_save
    public function update_candidate_saved()
    {
        $data = $this->request->getPost();

        $cat_id = $data['cat_id'];
        $note = $data['note'];
        $user_profile_id =  $data['user_profile_id'];
        $saved_by =  $data['saved_by'];
        $userRecr = (new UserRecruitmentModel());
        $update =  $userRecr->update_user_profile_saved($user_profile_id, $saved_by, $note, $cat_id);
        if ($update) {
            return 'Thao tác thành công!';
        }
        return $this->render('errors/html/error_exception');
    }

    //delete candidate_save
    public function delete_candidate_saved()
    {
        if (!$this->check_users_recruitment_login()) {
            return null;
        }
        $data = $this->request->getPost();
        $user_profile_id = $data['user_profile_id'];
        $saved_by = $data['saved_by'];

        $userRecr = (new UserRecruitmentModel());
        $delete =  $userRecr->delete_user_profile_saved($user_profile_id, $saved_by);
        if ($delete) {
            return "Thao tác thành công";
        }
        return $this->render('errors/html/error_exception');
    }

    //upload file GPKD
    public function ajaxUploadGPKD()
    {
        $this->layout = null;
        if (isset($_POST) && !empty($_FILES['file'])) {
            $ext = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
            $target_file = $ext[0] . "_" . time() . "." . end($ext);
            $ext = $ext[(count($ext) - 1)]; //lấy ra đuôi file
            if ($ext === 'doc' || $ext === 'docx' || $ext === 'pdf') {
                if ($_FILES["file"]["size"] > 10000000) {
                    return "dung lượng vượt quá 10MB";
                }
                // move file to upload folder
                if (move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $target_file)) {
                    $model = new UserRecruitmentModel();
                    $session = session();
                    $user_id = $session->get(SESSION_USER_ID_KEY);
                    $save = $model->update_user_business_license($target_file, $user_id);
                    if ($save) {

                        return 'Upload thành công file: ' . $_FILES['file']['name'];
                    }

                    return 'Đã xảy ra lỗi khi lưu!';
                }

                return 'Đã xảy ra lỗi!';
            }

            return 'Chỉ được upload file: doc, docx, pdf';
        }

        return '';
    }
}
