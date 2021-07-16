<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\NewsWidget;
use App\Helpers\Widgets\FrontendNavLogin;
use App\Models\SettingsModel;
use App\Helpers\SettingHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\SliderModel[] $sliders
 * @var \App\Models\ProjectCategoryModel[] $projectCategories
 * @var \App\Models\CategoryModel[] $categories
 * @var \App\Models\TestimonialModel[] $testimonials
 * @var \App\Models\PartnerModel[] $partners
 * @var \App\Models\NewsModel[] $newsItems
 */
$this->title = $title;
$this->meta_image_url = $meta_image_url;
$home_list_block_id = explode(',', $settings['home_list_block_id']);
?>
<?= FrontendNavLogin::register($this); ?>

<div class="wrapper-fill">
    <article>
        <div class="cont-970-dky">
            <div class="box-lst-01">
                <ul class="row">
                    <li class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="box-lst-01-box">
                            <figure><img alt="img" src="/images/ntv-dky.png"></figure>
                            <div class="box-lst-01-cont"><i class="icon-dky-01"></i>
                                <ul class="list-txt">
                                    <li><i class="fas fa-check"></i> Hàng trăm ngàn việc làm đang tuyển dụng</li>
                                    <li><i class="fas fa-check"></i> Tạo hồ sơ trực tuyến nhanh</li>
                                    <li><i class="fas fa-check"></i> Hàng ngàn nhà tuyển dụng tìm thấy bạn</li>
                                </ul>
                                <a class="btn btn-dky btn-ntv-dky" href="/dang-nhap">Người tìm việc đăng nhập</a></div>
                        </div>
                    </li>
                    <li class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="box-lst-01-box">
                            <figure><img alt="img" src="/images/ntd-dky.png"></figure>
                            <div class="box-lst-01-cont"><i class="icon-dky-02"></i>
                                <ul class="list-txt">
                                    <li><i class="fas fa-check"></i> Đăng tin tuyển dụng miễn phí</li>
                                    <li><i class="fas fa-check"></i> Lọc tìm hàng trăm ngàn hồ sơ ứng viên</li>
                                    <li><i class="fas fa-check"></i> Hệ thống quản lý tuyển dụng thông minh</li>
                                </ul>
                                <a class="btn btn-dky btn-ntd-dky" href="/nha-tuyen-dung/dang-nhap">Nhà tuyển dụng đăng
                                    nhập</a></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="txt-btm-01">
                <div class="txt-btm-01-dn">Bạn đã có tài khoản?<a class="mx-1" href="/auth/login">Đăng nhập</a></div>
                <div class="box-770-center-bottm px-3"><span>Bạn đang gặp khó khăn? Vui lòng liên hệ hotline</span><span
                        class="box-770-center-bottm-num mx-1">(024) 710 88988 | (028) 710 88988</span><span>để được hỗ trợ.</span>
                </div>
            </div>
        </div>
    </article>
</div>

