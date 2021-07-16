<?php namespace Config;

use App\Helpers\StringHelper;
use App\Models\AdministratorModel;
use App\Models\RouterUrlModel;
use CodeIgniter\Router\RouteCollection;

/**
 * --------------------------------------------------------------------
 * URI Routing
 * --------------------------------------------------------------------
 * This file lets you re-map URI requests to specific controller functions.
 *
 * Typically there is a one-to-one relationship between a URL string
 * and its corresponding controller class/method. The segments in a
 * URL normally follow this pattern:
 *
 *    example.com/class/method/id
 *
 * In some instances, however, you may want to remap this relationship
 * so that a different class/function is called than the one
 * corresponding to the URL.
 */

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 * The RouteCollection object allows you to modify the way that the
 * Router works, by acting as a holder for it's configuration settings.
 * The following methods can be called on the object to modify
 * the default operations.
 *
 *    $routes->defaultNamespace()
 *
 * Modifies the namespace that is added to a controller if it doesn't
 * already have one. By default this is the global namespace (\).
 *
 *    $routes->defaultController()
 *
 * Changes the name of the class used as a controller when the route
 * points to a folder instead of a class.
 *
 *    $routes->defaultMethod()
 *
 * Assigns the method inside the controller that is ran when the
 * Router is unable to determine the appropriate method to run.
 *
 *    $routes->setAutoRoute()
 *
 * Determines whether the Router will attempt to match URIs to
 * Controllers when no specific route has been defined. If false,
 * only routes that have been defined here will be available.
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Admin router
$routes->group(ADMIN_PATH, function (RouteCollection $routes) {
    $routes->add('/', 'App\Controllers\Admin\Home::index', ['as' => 'admin_home']);

    // Auth
    $routes->add('auth/initialize', 'App\Controllers\Admin\Auth::initialize', [
        'as' => 'admin_initialize'
    ]);
    $routes->add('auth/login', 'App\Controllers\Admin\Auth::login', [
        'as' => 'admin_login'
    ]);
    $routes->add('auth/logout', 'App\Controllers\Admin\Auth::logout', [
        'as' => 'admin_logout'
    ]);

    // Slider
    $routes->add('slider', 'App\Controllers\Admin\Slider::index', [
        'as' => 'admin_slider'
    ]);
    $routes->add('slider/create', 'App\Controllers\Admin\Slider::create', [
        'as' => 'admin_slider_create'
    ]);
    $routes->add('slider/update/(:num)', 'App\Controllers\Admin\Slider::update/$1', [
        'as' => 'admin_slider_update'
    ]);
    $routes->add('slider/delete/(:num)', 'App\Controllers\Admin\Slider::delete/$1', [
        'as' => 'admin_slider_delete'
    ]);

    // Content Category
    $routes->add('category', 'App\Controllers\Admin\Category::index', [
        'as' => 'admin_category'
    ]);
    $routes->add('category/create', 'App\Controllers\Admin\Category::create', [
        'as' => 'admin_category_create'
    ]);
    $routes->add('category/update/(:num)', 'App\Controllers\Admin\Category::update/$1', [
        'as' => 'admin_category_update'
    ]);
    $routes->add('category/delete/(:num)', 'App\Controllers\Admin\Category::delete/$1', [
        'as' => 'admin_category_delete'
    ]);

    // Project Category
    $routes->add('project-category', 'App\Controllers\Admin\ProjectCategory::index', [
        'as' => 'admin_project_category'
    ]);
    $routes->add('project-category/create', 'App\Controllers\Admin\ProjectCategory::create', [
        'as' => 'admin_project_category_create'
    ]);
    $routes->add('project-category/update/(:num)', 'App\Controllers\Admin\ProjectCategory::update/$1', [
        'as' => 'admin_project_category_update'
    ]);
    $routes->add('project-category/delete/(:num)', 'App\Controllers\Admin\ProjectCategory::delete/$1', [
        'as' => 'admin_project_category_delete'
    ]);

    // Project
    $routes->add('project', 'App\Controllers\Admin\Project::index', [
        'as' => 'admin_project'
    ]);
    $routes->add('project/create', 'App\Controllers\Admin\Project::create', [
        'as' => 'admin_project_create'
    ]);
    $routes->add('project/update/(:num)', 'App\Controllers\Admin\Project::update/$1', [
        'as' => 'admin_project_update'
    ]);
    $routes->add('project/delete/(:num)', 'App\Controllers\Admin\Project::delete/$1', [
        'as' => 'admin_project_delete'
    ]);

    // Fields of Operation

    $routes->add('fields-of-operation', 'App\Controllers\Admin\FieldsOfOperation::index', [
        'as' => 'admin_fields_of_operation'
    ]);
    $routes->add('fields-of-operation/create', 'App\Controllers\Admin\FieldsOfOperation::create', [
        'as' => 'admin_fields_of_operation_create'
    ]);
    $routes->add('fields-of-operation/update/(:num)', 'App\Controllers\Admin\FieldsOfOperation::update/$1', [
        'as' => 'admin_fields_of_operation_update'
    ]);
    $routes->add('fields-of-operation/delete/(:num)', 'App\Controllers\Admin\FieldsOfOperation::delete/$1', [
        'as' => 'admin_fields_of_operation_delete'
    ]);

    // job
    $routes->add('job', 'App\Controllers\Admin\Job::index', [
        'as' => 'admin_job'
    ]);
    $routes->add('job/create', 'App\Controllers\Admin\Job::create', [
        'as' => 'admin_job_create'
    ]);
    $routes->add('job/update/(:num)', 'App\Controllers\Admin\Job::update/$1', [
        'as' => 'admin_job_update'
    ]);
    $routes->add('job/delete/(:num)', 'App\Controllers\Admin\Job::delete/$1', [
        'as' => 'admin_job_delete'
    ]);

    // Product Category
    $routes->add('product-category', 'App\Controllers\Admin\ProductCategory::index', [
        'as' => 'admin_product_category'
    ]);
    $routes->add('product-category/create', 'App\Controllers\Admin\ProductCategory::create', [
        'as' => 'admin_product_category_create'
    ]);
    $routes->add('product-category/update/(:num)', 'App\Controllers\Admin\ProductCategory::update/$1', [
        'as' => 'admin_product_category_update'
    ]);
    $routes->add('product-category/delete/(:num)', 'App\Controllers\Admin\ProductCategory::delete/$1', [
        'as' => 'admin_product_category_delete'
    ]);

    // Product
    $routes->add('product', 'App\Controllers\Admin\Product::index', [
        'as' => 'admin_product'
    ]);
    $routes->add('product/create', 'App\Controllers\Admin\Product::create', [
        'as' => 'admin_product_create'
    ]);
    $routes->add('product/update/(:num)', 'App\Controllers\Admin\Product::update/$1', [
        'as' => 'admin_product_update'
    ]);
    $routes->add('product/delete/(:num)', 'App\Controllers\Admin\Product::delete/$1', [
        'as' => 'admin_product_delete'
    ]);

    // Content
    $routes->add('content', 'App\Controllers\Admin\Content::index', [
        'as' => 'admin_content'
    ]);
    $routes->add('content/create', 'App\Controllers\Admin\Content::create', [
        'as' => 'admin_content_create'
    ]);
    $routes->add('content/update/(:num)', 'App\Controllers\Admin\Content::update/$1', [
        'as' => 'admin_content_update'
    ]);
    $routes->add('content/delete/(:num)', 'App\Controllers\Admin\Content::delete/$1', [
        'as' => 'admin_content_delete'
    ]);
    $routes->add('content/meta/(:any)/(:num)', 'App\Controllers\Admin\Content::meta/$1/$2', [
        'as' => 'admin_content_meta'
    ]);

    // News
    $routes->add('news', 'App\Controllers\Admin\News::index', [
        'as' => 'admin_news'
    ]);
    $routes->add('news/create', 'App\Controllers\Admin\News::create', [
        'as' => 'admin_news_create'
    ]);
    $routes->add('news/update/(:num)', 'App\Controllers\Admin\News::update/$1', [
        'as' => 'admin_news_update'
    ]);
    $routes->add('news/delete/(:num)', 'App\Controllers\Admin\News::delete/$1', [
        'as' => 'admin_news_delete'
    ]);
    // User Recruitment
    $routes->add('user-recruitment', 'App\Controllers\Admin\UserRecruitment::index', [
        'as' => 'admin_user_recruitment'
    ]);
    $routes->add('user-recruitment/view/(:num)', 'App\Controllers\Admin\UserRecruitment::view/$1', [
        'as' => 'admin_user_recruitment_view'
    ]);
    $routes->add('user-recruitment/update/(:num)', 'App\Controllers\Admin\UserRecruitment::update/$1', [
        'as' => 'admin_user_recruitment_update'
    ]);
    $routes->add('user-recruitment/delete/(:num)', 'App\Controllers\Admin\UserRecruitment::delete/$1', [
        'as' => 'admin_user_recruitment_delete'
    ]);

    // User Seeker
    $routes->add('user-seeker', 'App\Controllers\Admin\UserSeeker::index', [
        'as' => 'admin_user_seeker'
    ]);
    $routes->add('user-seeker/view/(:num)', 'App\Controllers\Admin\UserSeeker::view/$1', [
        'as' => 'admin_user_seeker_view'
    ]);
    $routes->add('user-seeker/update/(:num)', 'App\Controllers\Admin\UserSeeker::update/$1', [
        'as' => 'admin_user_seeker_update'
    ]);
    $routes->add('user-seeker/delete/(:num)', 'App\Controllers\Admin\UserSeeker::delete/$1', [
        'as' => 'admin_user_seeker_delete'
    ]);

    // Testimonial
    $routes->add('testimonial', 'App\Controllers\Admin\Testimonial::index', [
        'as' => 'admin_testimonial'
    ]);
    $routes->add('testimonial/create', 'App\Controllers\Admin\Testimonial::create', [
        'as' => 'admin_testimonial_create'
    ]);
    $routes->add('testimonial/update/(:num)', 'App\Controllers\Admin\Testimonial::update/$1', [
        'as' => 'admin_testimonial_update'
    ]);
    $routes->add('testimonial/delete/(:num)', 'App\Controllers\Admin\Testimonial::delete/$1', [
        'as' => 'admin_testimonial_delete'
    ]);

    // Partner
    $routes->add('partner', 'App\Controllers\Admin\Partner::index', [
        'as' => 'admin_partner'
    ]);
    $routes->add('partner/create', 'App\Controllers\Admin\Partner::create', [
        'as' => 'admin_partner_create'
    ]);
    $routes->add('partner/update/(:num)', 'App\Controllers\Admin\Partner::update/$1', [
        'as' => 'admin_partner_update'
    ]);
    $routes->add('partner/delete/(:num)', 'App\Controllers\Admin\Partner::delete/$1', [
        'as' => 'admin_partner_delete'
    ]);

    // User Request
    $routes->add('user-request', 'App\Controllers\Admin\UserRequest::index', [
        'as' => 'admin_user_request'
    ]);
    $routes->add('user-request/view/(:num)', 'App\Controllers\Admin\UserRequest::view/$1', [
        'as' => 'admin_user_request_view'
    ]);
    $routes->add('user-request/update/(:num)', 'App\Controllers\Admin\UserRequest::update/$1', [
        'as' => 'admin_user_request_update'
    ]);
    $routes->add('user-request/delete/(:num)', 'App\Controllers\Admin\UserRequest::delete/$1', [
        'as' => 'admin_user_request_delete'
    ]);

    // Shopping Cart
    $routes->add('cart', 'App\Controllers\Admin\ShoppingCart::index', [
        'as' => 'admin_cart'
    ]);
    $routes->add('cart/view/(:num)', 'App\Controllers\Admin\ShoppingCart::view/$1', [
        'as' => 'admin_cart_view'
    ]);
    $routes->add('cart/update/(:num)', 'App\Controllers\Admin\ShoppingCart::update/$1', [
        'as' => 'admin_cart_update'
    ]);
    $routes->add('cart/delete/(:num)', 'App\Controllers\Admin\ShoppingCart::delete/$1', [
        'as' => 'admin_cart_delete'
    ]);

    //setting
    $routes->add('settings', 'App\Controllers\Admin\Settings::index', [
        'as' => 'admin_setting'
    ]);
    $routes->add('settings/update', 'App\Controllers\Admin\Settings::update', [
        'as' => 'admin_settings_update'
    ]);


    // Administrator
    $routes->add('administrator', 'App\Controllers\Admin\Administrator::index', [
        'as' => 'administrator'
    ]);
    $routes->add('administrator/create', 'App\Controllers\Admin\Administrator::create', [
        'as' => 'administrator_create'
    ]);
    $routes->add('administrator/update/(:num)', 'App\Controllers\Admin\Administrator::update/$1', [
        'as' => 'administrator_update'
    ]);
    $routes->add('administrator/delete/(:num)', 'App\Controllers\Admin\Administrator::delete/$1', [
        'as' => 'administrator_delete'
    ]);




});

// nhà tuyển dụng
$routes->group(ADMIN_RECRUITMENT, function (RouteCollection $routes) {
    $routes->add('trang-chu', 'App\Controllers\Recruitment::index',['as'=>'rcm_index']);
    $routes->add('dang-nhap', 'App\Controllers\UserRecruitment::login', ['as' => 'login']);
    $routes->add('dang-ky', 'App\Controllers\UserRecruitment::register', ['as' => 'register']);
    $routes->add('dang-xuat', 'App\Controllers\UserRecruitment::logout', ['as' => 'logout']);
    $routes->add('thay-doi-mat-khau', 'App\Controllers\UserRecruitment::change_password', ['as' => 'change_password']);
    $routes->add('thay-doi-thong-tin', 'App\Controllers\UserRecruitment::change_information', ['as' => 'change_information']);
    $routes->add('dang-tin', 'App\Controllers\PostsRecruitment::posts', ['as' => 'posts']);
    $routes->add('sua-tin/(:num)', 'App\Controllers\PostsRecruitment::update/$1', ['as' => 'update_posts']);
    $routes->add('tai-khoan', 'App\Controllers\UserRecruitment::account', ['as' => 'account']);
    $routes->add('lich-su-dich-vu', 'App\Controllers\PostsRecruitment::service', ['as' => 'service']);
    $routes->add('quan-ly-tin-dang', 'App\Controllers\PostsRecruitment::rcm_manager', ['as' => 'rcm_manager']);
    $routes->add('xem-truoc-tin-dang/(:num)', 'App\Controllers\PostsRecruitment::view_post_rcm', ['as' => 'view_post_rcm']);
    $routes->add('ung-vien(:any)', 'App\Controllers\Recruitment::candidates', ['as' => 'candidates']);
    $routes->add('ho-so-da-luu(:any)', 'App\Controllers\PostsRecruitment::saved_profile', ['as' => 'saved_profile']);
    $routes->add('ho-so-da-xem(:any)', 'App\Controllers\PostsRecruitment::profile_viewed', ['as' => 'profile_viewed']);
    $routes->add('ho-so-da-ung-tuyen(:any)', 'App\Controllers\PostsRecruitment::applicable_profile', ['as' => 'applicable_profile']);
    $routes->add('xem-thiet-lap-thong-tin-nhan-ho-so-bang-email', 'App\Controllers\PostsRecruitment::notification_settings', ['as' => 'notification_settings']);
    $routes->add('gui-yeu-cau-den-ban-quan-tri', 'App\Controllers\PostsRecruitment::Send_request', ['as' => 'Send_request']);
    $routes->add('tin-nhan', 'App\Controllers\PostsRecruitment::message', ['as' => 'message']);
    $routes->add('tin-nhan-da-gui', 'App\Controllers\PostsRecruitment::Sent_message', ['as' => 'Sent_message']);
    $routes->add('ho-so/(:num)/(:any)', 'App\Controllers\Recruitment::candidate_file/$1', ['as' => 'candidate_file']);

});

$routes->group('trang-ca-nhan', function (RouteCollection $routes) {
    $routes->add('cap-nhat-thong-tin', 'App\Controllers\UserSeeker::update_info', ['as' => 'seeker_update_info']);
    $routes->add('quan-ly-ho-so', 'App\Controllers\UserSeeker::profile_manage', ['as' => 'seeker_profile_manage']);
    $routes->add('xoa-ho-so/(:num)', 'App\Controllers\UserSeeker::delete_profile/$1', ['as' => 'seeker_delete_profile']);
    $routes->add('tao-ho-so', 'App\Controllers\UserSeeker::create_cv', ['as' => 'seeker_create_cv']);
    $routes->add('sua-ho-so/(:num)', 'App\Controllers\UserSeeker::create_cv/$1', ['as' => 'seeker_edit_cv']);

    $routes->add('viec-lam-da-ung-tuyen', 'App\Controllers\UserSeeker::jobs_apply', ['as' => 'seeker_jobs_apply']);
    $routes->add('viec-lam-da-luu', 'App\Controllers\UserSeeker::jobs_save', ['as' => 'seeker_jobs_save']);
    $routes->add('theo-doi-nha-tuyen-dung', 'App\Controllers\UserSeeker::companies_follow', ['as' => 'seeker_companies_follow']);
    $routes->add('viec-lam-phu-hop', 'App\Controllers\UserSeeker::jobs_suggest', ['as' => 'seeker_jobs_suggest']);
    $routes->add('dang-ky-thong-bao-viec-lam-phu-hop', 'App\Controllers\UserSeeker::subscribe_jobs_suggest', ['as' => 'seeker_subscribe_jobs_suggest']);
    $routes->add('tin-nhan', 'App\Controllers\UserSeeker::message', ['as' => 'seeker_message']);
    $routes->add('tin-nhan-da-gui', 'App\Controllers\UserSeeker::sent_message', ['as' => 'seeker_sent_message']);
    $routes->add('dang-xuat', 'App\Controllers\UserSeeker::logout', ['as' => 'seeker_logout']);
});

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index',['as'=>'home_index']);

$routes->add('/cart', 'App\Controllers\ShoppingCart::index', ['as' => 'cart']);
$routes->add('/shopping-cart/add', 'App\Controllers\ShoppingCart::add', ['as' => 'cart_add']);
$routes->add('/shopping-cart/decrement', 'App\Controllers\ShoppingCart::decrement', ['as' => 'cart_decrement']);
$routes->add('/shopping-cart/remove', 'App\Controllers\ShoppingCart::remove', ['as' => 'cart_remove']);
$routes->add('/checkout', 'App\Controllers\ShoppingCart::checkout', ['as' => 'cart_checkout']);
$routes->add('/tim-kiem', 'App\Controllers\Home::search', ['as' => 'home_search']);
$routes->add('/lien-he', 'App\Controllers\Home::contact', ['as' => 'home_contact']);

$routes->add('/dang-ky-bao-gia', 'App\Controllers\Home::register', ['as' => 'home_register']);

//$routes->add('/mau-nha-dep', 'App\Controllers\Project::index', ['as' => 'project']);
$routes->add('/cua-hang', 'App\Controllers\Product::category', ['as' => 'product']);
$routes->add('/kinh-nghiem-hay', 'App\Controllers\News::index', ['as' => 'news']);
$routes->add('/auth/login', 'App\Controllers\Home::login', ['as' => 'login_home']);
$routes->add('/auth/register', 'App\Controllers\Home::register_home', ['as' => 'register_home']);

$routes->add('/bang-gia/bang-gia-dich-vu', 'App\Controllers\Recruitment::price', ['as' => 'price_list']);

//$routes->add('/vote-category', 'App\Controllers\Category::insert_votes_rate_category', ['as' => 'insert_votes_rate_category']);
//$routes->add('/vote-category', 'App\Controllers\Category::insert_votes_rate_category', ['as' => 'insert_votes_rate_category']);
$routes->add('dang-ky', 'App\Controllers\UserSeeker::register_seeker', ['as' => 'register_seeker']);
$routes->add('dang-nhap', 'App\Controllers\UserSeeker::login_seeker', ['as' => 'login_seeker']);
$routes->add('trang-chu', 'App\Controllers\Seeker::home_seeker', ['as' => 'home_seeker']);

$request = Services::request();
$slug = $request->uri->getSegment(1);
if ($slug && $slug !== ADMIN_PATH) {
    if (($config = RouterUrlModel::findBySlug($slug)) !== null) {
        $routes->add('/(:any)', 'App\Controllers\\' . $config->frontend_router . '/' . $config->object_id);
    } else {
//        $routes->add('/(:any)', 'App\Controllers\Error::code404');
    }
}
$routes->add('/tuyen-dung/viec-lam/(:num)/([a-z0-9A-Z\-]+)', 'App\Controllers\UserSeeker::detail_jobs/$1',['as' => 'detail_recruitment']);
$routes->add('/tuyen-dung/nha-tuyen-dung/(:num)/([a-z0-9A-Z\-]+)', 'App\Controllers\Recruitment::detail_users/$1',['as' => 'detail_user_recruitment']);
$routes->add('/tuyen-dung/(:num)/([a-z0-9A-Z\-]+)', 'App\Controllers\UserSeeker::detail_jobs/$1',['as' => 'detail_job']);
$routes->add('/tuyen-dung/dia-diem/(:num)/([a-z0-9A-Z\-]+)', 'App\Controllers\Recruitment::detail_place/$1',['as' => 'detail_place']);

$routes->add('/tuyen-dung/', 'App\Controllers\UserSeeker::search_job',['as' => 'search_job']);
$routes->add('/cong-ty/', 'App\Controllers\UserSeeker::company',['as' => 'company']);
$routes->add('/tuyen-dung/chi-tiet-viec-lam/(:num)/([a-z0-9A-Z\-]+)', 'App\Controllers\UserSeeker::detail_jobs/$1',['as' => 'seeker_detail_jobs']);

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
