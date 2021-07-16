<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\FieldsOfOperationModel;
use App\Models\JobModel;
use App\Models\NewsModel;
use App\Models\NewsRecruitmentModel;
use App\Models\ProductCategoryModel;
use App\Models\ProductModel;
use App\Models\ProductPriceModel;
use App\Models\ProvinceModel;
use App\Models\SliderModel;
use App\Models\UserRecruitmentFieldsModel;
use App\Models\UserRecruitmentModel;
use App\Models\VotesModel;
use App\Models\SettingsModel;
use App\Models\UserProfileModel;
use App\Helpers\SessionHelper;
use App\Models\UserMetaModel;
use App\Models\UserProfileViewedModel;
use DateTime;

class Recruitment extends BaseController
{
    public function index()
    {
        // Sliders
        $sliders = (new SliderModel())
            ->where('is_lock', 0)
            ->orderBy('order_no', SORT_ASC)
            ->findAll();
        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $recruitment = (new NewsRecruitmentModel());
        $new_rcm = $recruitment
            ->where('status', 0)
            ->where('product_id', 14)
            ->orderBy('updated_at', 'DESC')
            ->findAll(20);
        $rcm_interesting = $recruitment
            ->where('status', 0)
            ->where('product_id', 15)
            ->orderBy('updated_at', 'DESC')
            ->findAll(20);
        $rcm_high_salary = $recruitment
            ->where('status', 0)
            ->where('product_id', 16)
            ->orderBy('updated_at', 'DESC')
            ->findAll(20);

        $settings = new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if ($settings) {
            foreach ($settings as $setting) {
                $setting_array[$setting->key] = $setting->value;
            }
        }
        $province = (new ProvinceModel())->findAll();
        $user_profiles = (new UserProfileModel())->orderBy('id','RANDOM')->findAll(4);

        return $this->render('recruitment/index', [
            'sliders' => $sliders,
            'job' => $job,
            'new_rcm' => $new_rcm,
            'settings' => $setting_array,
            'rcm_interesting' => $rcm_interesting,
            'rcm_high_salary' => $rcm_high_salary,
            'province' => $province,
            'user_profiles' => $user_profiles,

        ]);
    }

    public function detail_posts($id)
    {
        $model = (new NewsRecruitmentModel())->find($id);

        $children = (new NewsRecruitmentModel())
            ->where('job_id', $model->job_id)
            ->where('status', 0)
            ->orderBy('updated_at', 'DESC');

        return $this->render('recruitment/detail_post', [
            'model' => $model,
            'models' => $children->paginate(10),
            'pager' => $children->pager,

        ]);
    }

    public function detail_users($id)
    {
        $model = (new UserRecruitmentModel())->find($id);

        $post_recruitment = (new NewsRecruitmentModel())
            ->where('status', 0)
            ->where('user_rcm_id', $id)
            ->orderBy('created_at', 'DESC');
        $session = session();
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        return $this->render('recruitment/detail_user', [
            'model' => $model,
            'post_recruitment' => $post_recruitment->paginate(10),
            'pager' => $post_recruitment->pager,
            'user_type' => $user_type,
        ]);
    }

    public function price()
    {

        $settings = new SettingsModel();
        $settings = $settings->findAll();
        $setting_array = [];
        if ($settings) {
            foreach ($settings as $setting) {
                $setting_array[$setting->key] = $setting->value;
            }
        }
        /// product_category

        $root_prd_cate = $setting_array['home_first_block_id'];
        $prod_category = (new ProductCategoryModel());
        $title_parent = $prod_category
            ->where('id', $root_prd_cate)
            ->findAll();
        $productCategories = $prod_category
            ->addQuery('where', ['is_lock', 0])
            ->getCategoryRecursive($root_prd_cate, 0, 2);

        for ($i = 0; $i < count($productCategories); $i++) {
            $all_child_cate_id = (new ProductCategoryModel())
                ->getCategoryIdRecursive($productCategories[$i]->id, 0, 3);
            var_dump($all_child_cate_id);
            $products = (new ProductModel())
                ->whereIn('category_id', $all_child_cate_id)
                ->where('is_lock', 0)
                ->orderBy('updated_at', 'DESC')->findAll(5);
            $productCategories[$i]->products = $products;
        }

        return $this->render('recruitment/price_list', [
            'productCategories' => $productCategories,
            'title_parent' => $title_parent,
            'settings' => $setting_array,

        ]);
    }

    public function select_price($product_id)
    {
        $select = new ProductPriceModel();
        $array_price = $select->select_price($product_id);

        echo json_encode($array_price);
        die();
    }

    public function detail_job($id)
    {

        $model = (new JobModel())->find($id);

        $model_rcm = (new NewsRecruitmentModel());
        $rcm_job = $model_rcm
            ->where('status', 0)
            ->where('job_id', $id)
            ->orderBy('updated_at', 'DESC')
            ->findAll();

        $recruitment_new = $model_rcm
            ->where('status', 0)
            ->orderBy('updated_at', 'DESC');

        return $this->render('recruitment/detail_job', [
            'model' => $model,
            'rcm_job' => $rcm_job,
            'recruitment_new' => $recruitment_new->paginate(10),
            'pager' => $recruitment_new->pager
        ]);
    }

    public function detail_place($id)
    {

        $model_rcm = (new NewsRecruitmentModel());
        $rcm_place = $model_rcm
            ->where('status', 0)
            ->where('province', $id)
            ->orderBy('updated_at', 'DESC');


        return $this->render('recruitment/detail_place', [
            'rcm_place' => $rcm_place->paginate(10),
            'pager' => $rcm_place->pager
        ]);
    }

    public function candidates()
    {
        $search_navbar = $this->request->getPost('search_navbar') ?? '';
        $job_navbar = $this->request->getPost('job_navbar') ?? '';
        $province_navbar = $this->request->getPost('province_navbar') ?? '';

        $job = (new JobModel())
            ->where('is_lock', 0)
            ->orderBy('updated_at', 'DESC')
            ->findAll();
        $province = (new ProvinceModel())->findAll();
        $userProfile = (new UserProfileModel())->findAll();
        $session = session();
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        return $this->render('recruitment/candidates', [
            'job' => $job,
            'province' => $province,
            'userProfile' => $userProfile,
            'position_wanted' => POSITION_WANTED,
            'education_level' => EDUCATION_LEVEL,
            'experience' => EXPERIENCE,
            'search_navbar' => $search_navbar,
            'job_navbar' => $job_navbar,
            'province_navbar' => $province_navbar,
            'user_type' => $user_type,
        ]);
    }

    public function candidate_file($id)
    {
        $userProfile = (new UserProfileModel())->find($id);
        //update views
        $save = $userProfile->update_views();
        if ($save) {
            //get user_recr_id
            $session = session();
            $user_recr_id = $session->get(SESSION_USER_ID_KEY);

            $userProfileViewed = (new UserProfileViewedModel());
            $change = $userProfileViewed->insert_or_update_data($id, $user_recr_id);

            if ($change) {
                $category = (new UserMetaModel())
                    ->where('user_id', $user_recr_id)
                    ->where('user_type', 2)
                    ->findAll();

                $userRecruitment = (new UserRecruitmentModel());
                $session = session();
                $user_recr_id = $session->get(SESSION_USER_ID_KEY);
                $user_type = $session->get(SESSION_USER_TYPE_KEY);

                return $this->render('recruitment/candidate_file', [
                    'userProfile' => $userProfile ?? [],
                    'category' => $category ?? [],
                    'userRecruitment' => $userRecruitment,
                    'user_recr_id' => $user_recr_id,
                    'position_wanted' => POSITION_WANTED,
                    'education_level' => EDUCATION_LEVEL,
                    'experience' => EXPERIENCE,
                    'job_type' => JOB_TYPE,
                    'user_type' => $user_type,
                ]);
            }

            return $this->render('errors/html/error_exception');
        }

        return $this->render('errors/html/error_exception');
    }

    public function ajaxCandidates()
    {
        $this->layout = null;
        //connnect query bulder
        $db  = \Config\Database::connect();
        $builder = $db->table('user_profile');

        //get params from clients
        $currenctPage = $_GET['page'] ?? 1;
        $province_ids = $this->request->getPost('province_ids') ?? [];
        $job_ids = $this->request->getPost('job_ids') ?? [];
        $position_wanted_ids = $this->request->getPost('position_wanted_ids') ?? [];
        $education_level_ids = $this->request->getPost('education_level_ids') ?? [];
        $experience_ids = $this->request->getPost('experience_ids') ?? [];
        $gender_ids = $this->request->getPost('gender_ids') ?? [];
        $pageSize = (int)$this->request->getPost('pageSize') ?? 10;
        $salary_range = $this->request->getPost('salary_range') ?? '-1';
        $time_range = $this->request->getPost('time_range') ?? '-1';
        $search_navbar = $this->request->getPost('search_navbar');

        $totalPage =  $currenctPage;
        $allRows = 0;
        $usP = [];

        //query fields
        $builder->where('status', 1);
        if ($province_ids && count($province_ids) > 0) {
            $builder->whereIn('province_id', $province_ids);
        }

        if ($job_ids && count($job_ids) > 0) {
            $builder->whereIn('job_id', $job_ids);
        }

        if ($position_wanted_ids && count($position_wanted_ids) > 0) {
            $builder->whereIn('position_wanted_id', $position_wanted_ids);
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
                $builder->orderBy('salary_date', 'DESC');
                break;
            case '1':
                $sdate = strtotime((new DateTime())->modify('-8 days')->format('Y-m-d') . " 23:59:59");
                $builder->where('salary_date >', $sdate);
                break;
            case '2':
                $sdate = strtotime((new DateTime())->modify('-30 days')->format('Y-m-d') . " 23:59:59");
                $builder->where('salary_date >', $sdate);
                break;
            case '3':
                $builder->orderBy('salary_date', 'ASC');
                break;
            default:
                //nothing
        }

        switch ($salary_range) {
            case '0':
                $query = "salary >= 1000000 AND salary < 3000000";
                $builder->where($query);
                break;
            case '1':
                $query = "salary >= 3000000 AND salary < 5000000";
                $builder->where($query);
                break;
            case '2':
                $query = "salary >= 5000000 AND salary < 7000000";
                $builder->where($query);
                break;
            case '3':
                $query = "salary >= 7000000 AND salary < 10000000";
                $builder->where($query);
                break;
            case '4':
                $query = "salary >= 10000000";
                $builder->where($query);
                break;
            default:
                //nothing
        }

        //join table user_profile
        $builder->join('(SELECT  province.id as id_province, province._name from province) as T2', 'T2.id_province = user_profile.province_id');
        //join table job
        $builder->join('(SELECT job.id as id_job, job.title as title_job, job.slug  from job) as T3', 'T3.id_job = user_profile.job_id');

        if ($search_navbar && $search_navbar != 'null') {
            $builder->like('title_job', $search_navbar);
        }

        $allRows = $builder->countAllResults(false);
        $usP = $builder->get($pageSize, ($currenctPage - 1) * $pageSize)->getResult();

        $totalPage = ceil($allRows/$pageSize);
        $userRecruitment = (new UserRecruitmentModel());
        $session = session();
        $user_recr_id = $session->get(SESSION_USER_ID_KEY);
        $user_type = $session->get(SESSION_USER_TYPE_KEY);
        return $this->render('recruitment/ajax-candidates', [
            'userProfile' => $usP ?? [],
            'countCandidates' => $allRows,
            'currenctPage' => $currenctPage,
            'totalPage' => $totalPage,
            'province_ids' => $province_ids,
            'job_ids' => $job_ids,
            'userRecruitment' => $userRecruitment,
            'user_recr_id' => $user_recr_id,
            'user_type' => $user_type,
        ]);
    }
}
