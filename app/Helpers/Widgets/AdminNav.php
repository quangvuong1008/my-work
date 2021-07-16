<?php

namespace App\Helpers\Widgets;

use App\Helpers\Assets\MaterialDashboard;
use App\Libraries\BaseView;

class AdminNav extends BaseWidget
{
    private static $items = [
        'admin_home' => [
            'label' => 'Trang chủ', 'icon' => 'dashboard', 'ns' => null
        ],
        'admin_slider' => [
            'label' => 'Slider', 'icon' => 'queue_play_next', 'ns' => 'slider'
        ],
        'admin_category' => [
            'label' => 'Danh mục bài viết', 'icon' => 'chrome_reader_mode', 'ns' => 'category'
        ],
        'admin_fields_of_operation' => [
            'label' => 'Danh mục lĩnh vực', 'icon' => 'chrome_reader_mode', 'ns' => 'fields-of-operation'
        ],
        'admin_job' => [
            'label' => 'Danh mục ngành nghề', 'icon' => 'chrome_reader_mode', 'ns' => 'job'
        ],
//        'admin_project_category' => [
//            'label' => 'Danh mục dự án', 'icon' => 'share', 'ns' => 'project-category'
//        ],
//        'admin_project' => [
//            'label' => 'Dự án', 'icon' => 'business', 'ns' => 'project'
//        ],
        'admin_product_category' => [
            'label' => 'Danh mục sản phẩm', 'icon' => 'share', 'ns' => 'product-category'
        ],
        'admin_product' => [
            'label' => 'Sản phẩm', 'icon' => 'store_mall_direction', 'ns' => 'product'
        ],
        'admin_content' => [
            'label' => 'Nội dung', 'icon' => 'chrome_reader_mode', 'ns' => 'content'
        ],
        'admin_news' => [
            'label' => 'Tin tức', 'icon' => 'chrome_reader_mode', 'ns' => 'news'
        ],
        'admin_user_recruitment' => [
            'label' => 'Nhà tuyển dụng', 'icon' => 'work', 'ns' => 'user-recruitment'
        ],
        'admin_user_seeker' => [
            'label' => 'Ứng viên', 'icon' => 'record_voice_over', 'ns' => 'user-seeker'
        ],
        'admin_testimonial' => [
            'label' => 'Khách hàng nhận xét', 'icon' => 'people', 'ns' => 'testimonial'
        ],
        'admin_partner' => [
            'label' => 'Đối tác', 'icon' => 'extension', 'ns' => 'partner'
        ],
        'admin_user_request' => [
            'label' => 'Yêu cầu gọi lại', 'icon' => 'ring_volume', 'ns' => 'user-request'
        ],
//        'admin_cart' => [
//            'label' => 'Đơn hàng', 'icon' => 'shopping_cart', 'ns' => 'cart'
//        ],
        'admin_setting' => [
            'label' => 'Cấu hình chung', 'icon' => 'settings_applications', 'ns' => 'settings'
        ],
        'administrator' => [
            'label' => 'Quản trị viên', 'icon' => 'how_to_reg', 'ns' => 'administrator'
        ],

    ];

    public static function register(BaseView $view, array $data = []): string
    {
        $asset = MaterialDashboard::getAsset();

        return parent::render($view, 'admin_nav', array_merge($data, [
            'items' => static::$items,
            'asset' => $asset
        ]));
    }
}