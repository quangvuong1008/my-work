<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\NewsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Models\SettingsModel;
use App\Helpers\SettingHelper;
use App\Helpers\Widgets\NewsKingNghiemHay;

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
<?= FrontendNavTd::register($this); ?>
<div class="swiper-container swiper-main-container full-white-02 hidden-xs">
    <?php if ($sliders && !empty($sliders)) : ?>
        <div class=swiper-wrapper>
            <?php foreach ($sliders as $slider) : ?>
                <?= Html::beginTag('a', ['title' => $slider->title, 'href' => $slider->url, 'target' => '_blank', 'class' => 'swiper-slide']); ?>
                <?= Html::img($slider->getImage(), ['alt' => $slider->title, 'style' => ['width' => '100%', 'height' => '360px']]); ?>
                <?= Html::endTag('a'); ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class=swiper-pagination></div>
</div>

<div class="banner-01-login">
    <div class="jsx-1543968621 group-search">
        <div class="jsx-1543968621 search-01">
            <div class="jsx-1543968621 search-01-widget container">
                <div class="jsx-1543968621 search-01-content pb-3">
                    <form action="<?= base_url() . '/nha-tuyen-dung/ung-vien?page=1' ?>" method="post">
                        <div class="jsx-1543968621 search-01-bg fn-search-bg-tran">
                            <button type="button" class="jsx-1543968621 close bt-close-modal"></button>
                            <p class="jsx-1543968621 search-01-txt">Tìm kiếm<b class="jsx-1543968621 mx-1">194</b>việc
                                làm
                                mới trong<b class="jsx-1543968621 mx-1">4,583</b>việc đang tuyển dụng</p>
                            <div class="jsx-1543968621 search-01-row row">
                                <div class="div-input">
                                    <input type="text" class="form-control" name="search_navbar" id="search_navbar" placeholder="Tiêu đề hồ sơ, vị trí, địa điểm làm viêc,..." value="<?= $search_navbar ?>">
                                </div>
                                <div class="jsx-1543968621 div-sl-tk ex-sl-nn">
                                    <select class="selectpicker form-control home" name="job_navbar" id="job_navbar" data-live-search="true" max-height="200px" value="<?= $job_navbar ?>">
                                        <option value="">Tất cả ngành nghề</option>
                                        <?php if ($job) : ?>
                                            <?php foreach ($job as $j) : ?>
                                                <option value="<?= $j->id ?>" <?php if ($j->id == $job_navbar) echo "selected" ?>><?= $j->title ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="jsx-1543968621 div-sl-tk ex-sl-tt">
                                    <select class="selectpicker form-control home" name="province_navbar" id="province_navbar" data-live-search="true" value="<?= $province_navbar ?>">
                                        <option value="">Tất cả nơi làm việc</option>
                                        <?php if ($province) : ?>
                                            <?php foreach ($province as $prv) : ?>
                                                <option value="<?= $prv->id ?>" <?php if ($prv->id == $province_navbar) echo "selected" ?>><?= $prv->_name ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="jsx-1543968621 div-btn">
                                    <button type="submit" class="jsx-1543968621 btn btn-search mb-2">Tìm việc</button>
                                    <!-- <a class="jsx-1543968621 pt-3 fs-14 d-pc" href="/viec-lam/tim-kiem-nang-cao">
                                        <i class="fas fa-search-minus fs-24 text-speci"></i><span
                                                class="jsx-1543968621 text-speci font500">Tìm kiếm nâng cao</span></a> -->
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <div class="jsx-1543968621 clearfix"></div>
        <div class="jsx-1543968621 banner-01-btns mt20 m-mt15">
            <div class="jsx-1543968621 container">
                <div class="jsx-1543968621 row group-button-search-01">
                    <div class="jsx-1543968621 col-12 col-sm-6 col-md-6 col-lg-6 txr"><a class="jsx-1543968621 btn btn-blue-50 w285" href="/tao-ho-so-online">Bảng báo phí dịch
                            vụ</a>
                    </div>
                    <div class="jsx-1543968621 col-12 col-sm-6 col-md-6 col-lg-6"><a class="jsx-1543968621 btn btn-pink-50 w285" href="/nha-tuyen-dung/dang-tin">Đăng tin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Top Ngành Nghề Phổ Biến</div>
        <div class="swiper-container swiper-container-top-index hidden-xs">
            <div class="swiper-wrapper text-center">
                <?php if ($job) : ?>
                    <?php foreach ($job as $jb) : ?>
                        <div class="swiper-slide">
                            <div>
                                <div class="jsx-2151350205" tabindex="-1" style="width: 108%; display: inline-block;">
                                    <div class="jsx-2151350205 box_shadow_slider">
                                        <div class="jsx-2151350205 icon-top-field">
                                            <img src="/images/nganh_chung.png" alt="nganh chung">
                                        </div>
                                        <a class="jsx-2151350205 text-unset" href="<?= $jb->getUrl() ?>">
                                            <div class="jsx-2151350205 top-field-name">
                                                <p class="jsx-2151350205 text-main text-main-hv font500 mb-0"><?= $jb->title ?></p>
                                                <p class="jsx-2151350205 font-italic text_ellipsis fs-13">(3033 việc làm
                                                    đang
                                                    tuyển)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="swiper-container swiper-container-top-index-mobile visible-xs">
            <div class="swiper-wrapper text-center">
                <?php if ($job) : ?>
                    <?php foreach ($job as $jb) : ?>
                        <div class="swiper-slide">
                            <div class="col-xs-12">
                                <div class="jsx-2151350205" tabindex="-1" style="width: 100%; display: inline-block;">
                                    <div class="jsx-2151350205 box_shadow_slider">
                                        <div class="jsx-2151350205 icon-top-field">
                                            <img src="/images/nganh_chung.png" alt="nganh chung">
                                        </div>
                                        <a class="jsx-2151350205 text-unset" href="<?= $jb->getUrl() ?>">
                                            <div class="jsx-2151350205 top-field-name">
                                                <p class="jsx-2151350205 text-main text-main-hv font500 mb-0"><?= $jb->title ?></p>
                                                <p class="jsx-2151350205 font-italic text_ellipsis fs-13">(3033 việc làm
                                                    đang
                                                    tuyển)</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Việc làm tuyển gấp</div>
        <div class="jobblock-01">
            <ul class="row">
                <?php if ($new_rcm) : ?>
                    <?php foreach ($new_rcm as $nrcm) : ?>
                        <?php $user_rcm_id = $nrcm->user_rcm_id;
                        $user_rcm_info = $nrcm->user_recruitment_info($user_rcm_id);
                        $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                        $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                        //                    var_dump(base_url(). '/uploads/user_recruitment/'.$user_rcm_info->avt);die();

                        ?>
                        <li class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="jobblock-01-box">
                                <div class="jobblock-01-row"><a href="<?= $nrcm->getUrl() ?>">
                                        <figure>
                                            <img src="<?= $getUrl ?>" alt="truong-phong-kinh-doanh">
                                        </figure>
                                    </a>
                                    <div class="jobblock-01-ttl">
                                        <a title="<?= $nrcm->title ?>" class="jobblock-01-ttl-light text-ellipsis" href="<?= $nrcm->getUrl() ?>">
                                            <span class="align-middle"><?= $nrcm->title ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="jobblock-01-com">
                                        <a class="text-ellipsis" title="<?= $user_rcm_info->company_name ?>" href="<?= $getHref ?>"><?= $user_rcm_info->company_name ?>
                                        </a>
                                    </div>
                                    <ul class="row list-feat job-highlight">
                                        <li class="col-12 col-md-7 ex-salary mt-0"><i class="fas fa-dollar-sign"></i>
                                            <?= $nrcm->wage ?>
                                        </li>
                                        <li class="col-12 col-md-5 ex-address mt-0 text-ellipsis " title="TP.HCM"><i class="fas fa-map-marker-alt"></i> <?= $nrcm->select_province_recruitment() ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="txc box-btn-see-more d-pc mt-4 mb-3"><a target="_blank" class="btn fullbox-01-btn ex-plus w140" href="/tuyen-dung?product_id=14">Xem thêm +</a></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Việc làm hấp dẫn</div>
        <div class="jobblock-01">
            <ul class="row">
                <?php if ($rcm_interesting) : ?>
                    <?php foreach ($rcm_interesting as $rcm_int) : ?>
                        <?php $user_rcm_id = $rcm_int->user_rcm_id;
                        $user_rcm_info = $rcm_int->user_recruitment_info($user_rcm_id);
                        $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                        $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                        //                    var_dump(base_url(). '/uploads/user_recruitment/'.$user_rcm_info->avt);die();

                        ?>
                        <li class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="jobblock-01-box">
                                <div class="jobblock-01-row"><a href="<?= $rcm_int->getUrl() ?>">
                                        <figure>
                                            <img src="<?= $getUrl ?>" alt="truong-phong-kinh-doanh">
                                        </figure>
                                    </a>
                                    <div class="jobblock-01-ttl">
                                        <a title="<?= $rcm_int->title ?>" class="jobblock-01-ttl-light text-ellipsis" href="<?= $rcm_int->getUrl() ?>">
                                            <span class="align-middle"><?= $rcm_int->title ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="jobblock-01-com">
                                        <a class="text-ellipsis" title="<?= $user_rcm_info->company_name ?>" href="<?= $getHref ?>"><?= $user_rcm_info->company_name ?>
                                        </a>
                                    </div>
                                    <ul class="row list-feat job-highlight">
                                        <li class="col-12 col-md-7 ex-salary mt-0"><i class="fas fa-dollar-sign"></i>
                                            <?= $rcm_int->wage ?>
                                        </li>
                                        <li class="col-12 col-md-5 ex-address mt-0 text-ellipsis " title="TP.HCM"><i class="fas fa-map-marker-alt"></i> <?= $rcm_int->select_province_recruitment() ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="txc box-btn-see-more d-pc mt-4 mb-3"><a target="_blank" class="btn fullbox-01-btn ex-plus w140" href="/tuyen-dung?product_id=15">Xem thêm +</a></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Việc làm lương cao</div>
        <div class="jobblock-01">
            <ul class="row">
                <?php if ($rcm_high_salary) : ?>
                    <?php foreach ($rcm_high_salary as $rcm_hsr) : ?>
                        <?php $user_rcm_id = $rcm_hsr->user_rcm_id;
                        $user_rcm_info = $rcm_hsr->user_recruitment_info($user_rcm_id);
                        $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                        $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                        //                    var_dump(base_url(). '/uploads/user_recruitment/'.$user_rcm_info->avt);die();

                        ?>
                        <li class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="jobblock-01-box">
                                <div class="jobblock-01-row"><a href="<?= $rcm_hsr->getUrl() ?>">
                                        <figure>
                                            <img src="<?= $getUrl ?>" alt="truong-phong-kinh-doanh">
                                        </figure>
                                    </a>
                                    <div class="jobblock-01-ttl">
                                        <a title="<?= $rcm_hsr->title ?>" class="jobblock-01-ttl-light text-ellipsis" href="<?= $rcm_hsr->getUrl() ?>">
                                            <span class="align-middle"><?= $rcm_hsr->title ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="jobblock-01-com">
                                        <a class="text-ellipsis" title="<?= $user_rcm_info->company_name ?>" href="<?= $getHref ?>"><?= $user_rcm_info->company_name ?>
                                        </a>
                                    </div>
                                    <ul class="row list-feat job-highlight">
                                        <li class="col-12 col-md-7 ex-salary mt-0"><i class="fas fa-dollar-sign"></i>
                                            <?= $rcm_hsr->wage ?>
                                        </li>
                                        <li class="col-12 col-md-5 ex-address mt-0 text-ellipsis " title="TP.HCM"><i class="fas fa-map-marker-alt"></i> <?= $rcm_hsr->select_province_recruitment() ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="txc box-btn-see-more d-pc mt-4 mb-3"><a target="_blank" class="btn fullbox-01-btn ex-plus w140" href="/tuyen-dung?product_id=16">Xem thêm +</a></div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Hồ sơ ứng viên</div>
        <div class="jobblock-01">
            <ul class="row">
                <?php if ($user_profiles) : ?>
                    <?php foreach ($user_profiles as $profile) : ?>

                        <li class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="jobblock-01-box">
                                <div class="jobblock-01-row"><a href="<?= $profile->get_hoso_url() ?>">
                                        <figure>
                                            <img src="<?= $profile->getAvt() ?>" alt="<?= $profile->job_title() ?>">
                                        </figure>
                                    </a>
                                    <div class="jobblock-01-ttl">
                                        <a title="<?= $profile->job_title() ?>" class="jobblock-01-ttl-light text-ellipsis" href="<?= $profile->get_hoso_url() ?>">
                                            <span class="align-middle"><?= $profile->job_title() ?>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="jobblock-01-com">
                                        <a class="text-ellipsis" title="<?= $profile->full_name ?>" href="<?= $profile->get_hoso_url() ?>"><?= $profile->full_name ?>
                                        </a>
                                    </div>
                                    <ul class="row list-feat job-highlight">
                                        <li class="col-12 col-md-7 ex-salary mt-0"><i class="fas fa-vcard"></i>
                                            <?= $profile->get_edu_level() ?>
                                        </li>
                                        <li class="col-12 col-md-5 ex-address mt-0 text-ellipsis " title="TP.HCM"><i class="fas fa-map-marker-alt"></i> <?= $profile->get_province() ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
            <div class="txc box-btn-see-more d-pc mt-4 mb-3"><a target="_blank" class="btn fullbox-01-btn ex-plus w140" href="/nha-tuyen-dung/ung-vien">Xem thêm +</a></div>
        </div>
    </div>
</div>

<div class=container>

    <div class=row>
        <section class=col-md-12>
            <?= NewsKingNghiemHay::register($this) ?>
        </section>
    </div>
</div>

<section>
    <div class="container">
        <div class="row">
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <div class="col-md-4 col-lg-4 col-xs-4">
                    <button type="button" data-toggle="modal" data-target="#video-<?= $i ?>" data-src="<?php echo $settings['home_video_link_' . $i]; ?>" class="img-wrap anim player">
                        <img src="<?php echo SettingHelper::getSettingImage($settings['home_video_thumb_' . $i]); ?>" alt="">
                    </button>
                    <div class="modal fade video-modal" id="video-<?= $i ?>" tabindex="-1" role="dialog" aria-labelledby="video-<?= $i ?>">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                #Video <?= $i ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<div class="container">
    <?php if ($partners && !empty($partners)) : ?>
        <div class=row>
            <section class=col-md-12>
                <div class=row>
                    <div class="homepage-row-product-title text-center">
                        <h2><a>BÁO CHÍ NÓI GÌ VỀ CHÚNG TÔI</a></h2>
                    </div>
                </div>
                <div class="swiper-container swiper-partner-container hidden-xs">
                    <div class="swiper-wrapper">
                        <?php foreach ($partners as $partner) : ?>
                            <div class="swiper-slide">
                                <div class="text-center">
                                    <a rel="nofollow" href="<?= $partner->getUrl() ?>" target=_blank title="<?= Html::decode($partner->title) ?>">
                                        <?= Html::img($partner->getImage(), ['alt' => $partner->title, 'style' => ['height' => '80px']]) ?>
                                    </a>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="swiper-partner-container"></div>
                </div>
                <div class="swiper-container swiper-partner-container-mobile visible-xs">
                    <div class="swiper-wrapper">
                        <?php foreach ($partners as $partner) : ?>
                            <div class="swiper-slide">
                                <div class="text-center">
                                    <a rel="nofollow" href="<?= $partner->getUrl() ?>" target=_blank title="<?= Html::decode($partner->title) ?>">
                                        <?= Html::img($partner->getImage(), ['alt' => $partner->title, 'style' => ['width' => '80%']]) ?>
                                    </a>
                                </div>

                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="swiper-partner-container"></div>
                </div>
            </section>
        </div>
    <?php endif ?>
</div>

<div class="container">
    <div class="row">
        <div class="jsx-3508488106 row box-hotline mt-3">
            <h2 class="jsx-3508488106 h2-title w-100 text-center text-uppercase">Hotline tư vấn</h2>
            <div class="jsx-3508488106 box-body mt-1 w-100">
                <div class="jsx-3508488106 mt-2">
                    <div class="jsx-3508488106 row px-2">
                        <div class="jsx-3508488106 col-md-12">
                            <h3 class="jsx-3508488106 mt-3 text-center font500 fs-20 text-uppercase text-ellipsis">
                                <div class="jsx-3508488106 row">
                                    <div class="jsx-3508488106 col-md-6 order-first text-right"><span class="jsx-3508488106 mr-5">Miền bắc:<span class="jsx-3508488106 text-speci mx-1"><?= $settings['home_goi_ngay'] ?></span></span>
                                    </div>
                                    <div class="jsx-3508488106 col-md-6 text-left"><span class="jsx-3508488106 ml-5">Miền nam:<span class="jsx-3508488106 text-speci mx-1"><?= $settings['home_hot_line'] ?></span></span>
                                    </div>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="job-lst">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Việc làm Theo ngành nghề</div>
        <ul class="row">
            <?php if ($job) : ?>
                <?php foreach ($job as $j) : ?>
                    <li class="col-12 col-sm-6 col-md-3"><a class="text-main" href="<?= $j->getUrl() ?>"><span><?= $j->title ?></span><span class="job-lst-num mx-1 text-main-important"></span></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="container">
    <div class="job-lst">
        <div class="jsx-2151350205 fullbox-01-ttl mb-2">Việc làm Theo tỉnh thành</div>
        <ul class="row">
            <?php if ($province) : ?>
                <?php foreach ($province as $prv) : ?>
                    <li class="col-12 col-sm-6 col-md-3 col-lg-3"><a class="text-main-important" href="<?= $prv->getUrl() ?>"><?= $prv->_name ?><span class="job-lst-num mx-1"></span></a></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
</div>