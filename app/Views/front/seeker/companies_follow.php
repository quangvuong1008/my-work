<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\NewsWidget;
use App\Helpers\Widgets\FrontendNav;
use App\Models\SettingsModel;
use App\Helpers\SettingHelper;
use App\Helpers\Widgets\SeekerLeftMenu;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;

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
<?= FrontendNav::register($this); ?>
<form action="/tuyen-dung/">
    <div class="full-white-01">
        <div class="search-01-row row container pb-3">
            <div class="div-input">
                <?php $selected = '';
                if ($search_param['q']) {
                    $selected = $search_param['q'];
                } ?>
                <input type="text" class="form-control" name="q" value="<?php echo $selected; ?>" placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc...">
            </div>
            <div class="div-sl-tk ex-sl-nn">

                <select class="selectpicker form-control" name="job_id" id="job_id" data-live-search="true">
                    <option value="" <?php if (!$search_param['job_id']) echo 'selected' ?>>Tất cả ngành nghề</option>
                    <?php
                    if ($list_job) {
                        foreach ($list_job as $job) {
                            $selected = '';
                            if ($search_param['job_id']) {
                                if ($job->id == $search_param['job_id']) {
                                    $selected = 'selected';
                                }
                            }

                            echo ' <option value="' . $job->id . '"  ' . $selected . '>' . $job->title . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="div-sl-tk ex-sl-tt">

                <select class="selectpicker form-control" name="province_id" id="province_id" data-live-search="true">
                    <option value="" <?php if (!$search_param['province_id']) echo 'selected' ?>>Tất cả nơi làm việc
                    </option>
                    <?php
                    if ($list_province) {
                        foreach ($list_province as $province) {
                            $selected = '';
                            if ($search_param['province_id']) {
                                if ($province->id == $search_param['province_id']) {
                                    $selected = 'selected';
                                }
                            }

                            echo ' <option value="' . $province->id . '" ' . $selected . '>' . $province->_name . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="div-btn text-center">
                <button type="submit" class="btn btn-search mb-2">Tìm việc</button>
                <a class="pt-3 fs-14" href="/viec-lam/tim-kiem-nang-cao"><i class="icon-zoom_in text-speci fs-24 align-middle"></i><span class="text-speci font600">Tìm kiếm nâng cao</span></a>
            </div>
        </div>
    </div>
</form>
<article>
    <section id="main-content" class="new-homepage">
        <div class="main-2-cols mt30 m-mt0 m-mb0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-1-ps d-none d-sm-block">
                        <?= SeekerLeftMenu::register($this); ?>
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                        <?php
                        $message = SessionHelper::getInstance()->getFlash('REGISTER');
                        if (!empty($message) && isset($message['type'])) {
                            switch ($message['type']) {
                                case 'FRONT_ERROR':
                                    echo Html::tag(
                                        'div',
                                        ArrayHelper::getValue($message, 'message', 'Kiểm tra lại thông tin nhập vào'),
                                        ['class' => 'alert alert-danger']
                                    );
                                    break;
                                case 'FRONT_SUCCESS':
                                    echo Html::tag(
                                        'div',
                                        ArrayHelper::getValue($message, 'message', 'Đăng ký thành công'),
                                        ['class' => 'alert alert-success']
                                    );
                                    break;
                            }
                        } ?>
                        <div class="main-colm">
                            <div class="title-nor mb-0">Nhà tuyển dụng đang theo dõi</div>
                            <span>Theo dõi nhà tuyển dụng để nhận được thông báo việc làm mới nhanh chóng mà bạn quan tâm.</span>
                            <!--                            <div class="mt-1"><span>Bạn đang có<span class="total-new-job-today mx-1">0</span>tin tuyển dụng mới từ<span-->
                            <!--                                            class="total-new-job-today mx-1">1</span>Nhà tuyển dụng đang theo dõi.</span>-->
                            <!--                            </div>-->
                            <hr class="w-100">
                            <div class="row d-none d-sm-flex header-columns-page-follow-employers">
                                <div class="col-sm-1 col-checkbox-follow"><label class="checkbox-lb cursor-pointer">
                                        <div class="icheckbox_minimal-grey  "><input name="checkAll" type="checkbox" class="icheck checkbox-lb cursor-pointer">
                                            <ins class="iCheck-helper"></ins>
                                        </div>
                                    </label></div>
                                <div class="col-sm-5 col-title">Tên công ty</div>
                                <div class="col-sm-3 col-title text-center">Số tin đăng tuyển</div>
                                <div class="col-sm-3 pr-0 col-button-unfollow">
                                    <button onclick="delete_company_follow();" class="btn btn-unfollow color-5a5a5a">Hủy theo dõi</button>
                                </div>
                            </div>
                            <?php
                            if ($list_company_follow) {
                                foreach ($list_company_follow  as $follow_info) {
                                    $company_follow = $follow_info->get_company_follow();
                            ?>
                                    <div class="jobslist-01 row saved-job-lst d-none d-sm-flex">
                                        <div class="jobslist-01-cont ex-job-04">
                                            <ul class="jobslist-01-ul">
                                                <li class="mb-3 li-item-employer">
                                                    <div class="row">
                                                        <div class="col-md-1 col-1 col-checkbox-follow"><label class="checkbox-lb cursor-pointer">
                                                                <div class="icheckbox_minimal-grey "><input data-check_company_id="<?php echo $company_follow->id; ?>" name="20025163" type="checkbox" class="icheck checkbox-lb cursor-pointer" value="20025163">
                                                                    <ins class="iCheck-helper"></ins>
                                                                </div>
                                                            </label></div>
                                                        <div class="col-md-5 d-flex col-sm-5 col-11 col-info">
                                                            <div class="logo"><a title="<?php echo $company_follow->company_name; ?>" href="<?php echo $company_follow->getUrl(); ?>"><img src="<?php echo $company_follow->getImage(); ?>" alt="<?php echo $company_follow->company_name; ?>"></a></div>
                                                            <a title="<?php echo $company_follow->company_name; ?>" href="<?php echo $company_follow->getUrl(); ?>"><span class="company-name" title="<?php echo $company_follow->company_name; ?>"><?php echo $company_follow->company_name; ?></span></a>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-6 col-news"><span class="col-news__total-jobs fs-14"><a href="<?php echo $company_follow->getUrl(); ?>"><?php echo $company_follow->get_count_news(); ?> Tin đăng tuyển</a></span>
                                                            <!--                                                            <span-->
                                                            <!--                                                                    class="col-news__hot-jobs no-hot-job color-5a5a5a">0 tin mới</span>-->
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-6 col-time-follow pl-0">Theo dõi:
                                                            <?php echo date('d-m-Y H:i:s', $follow_info->created_at); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>

                        </div>

                        <div class="main-best-employers">
                            <div class="title-nor">Nhà tuyển dụng có thể bạn quan tâm</div>
                            <div class="row">
                                <?php if ($list_best_company) {
                                    foreach ($list_best_company as $best_company) {

                                ?>
                                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 item-best-employer">
                                            <div class="jsx-2625214718 wrapper-item-best-employer">
                                                <div class="jsx-2625214718 wrapper-item-best-employer__container-info">
                                                    <div class="jsx-2625214718 logo"><a title="<?php echo $best_company->company_name; ?>" class="jsx-2625214718" href="<?php echo $best_company->getUrl(); ?>"><img src="<?php echo $best_company->getImage(); ?>" alt="<?php echo $best_company->company_name; ?>" class="jsx-2625214718"></a></div>
                                                    <a title="<?php echo $best_company->company_name; ?>" class="jsx-2625214718" href="<?php echo $best_company->getUrl(); ?>"><span title="<?php echo $best_company->company_name; ?>" class="jsx-2625214718 company-name"><?php echo $best_company->company_name; ?></span></a>
                                                </div>
                                                <div class="jsx-2625214718 wrapper-item-best-employer__total-news"><a title="<?php echo $best_company->company_name; ?>" class="jsx-2625214718" href="<?php echo $best_company->getUrl(); ?>"><span class="jsx-2625214718 fs-13"><span class="jsx-2625214718 mr-1"><?php echo $best_company->get_count_news(); ?> </span> Tin đăng tuyển</span></a>
                                                </div>
                                                <div class="jsx-2625214718">
                                                    <button onclick="add_company_follow(<?php echo $best_company->id; ?>)" class="jsx-2625214718 btn btn-white-46 fs-15 w-100 color-main-header">
                                                        Thêm vào danh sách
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                <?php
                                    }
                                } ?>

                            </div>
                        </div>

                        <?php if ($list_news_suggest) : ?>
                            <div class="main-colm">
                                <div class="jsx-1510199531 ">
                                    <div class="jsx-1510199531 title-nor">Việc làm phù hợp</div>
                                    <div class="jsx-3797885135 jobslist-01 row">
                                        <div class="jsx-3797885135 jobslist-01-cont ex-job-04">
                                            <ul class="jobslist-01-ul">

                                                <?php foreach ($list_news_suggest as $rcm_n) : ?>
                                                    <?php $user_rcm_id = $rcm_n->user_rcm_id;
                                                    $user_rcm_info = $rcm_n->user_recruitment_info($user_rcm_id);
                                                    $province_info = $rcm_n->get_province_info($rcm_n->province);
                                                    $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                                                    $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                                                    ?>
                                                    <li class="jobslist-01-li">
                                                        <div class="jobslist-01-row fix-jobslist-01-row">
                                                            <div class="jobslist-01-row-left">
                                                                <div class="jobslist-01-row-ttl"><a title="<?= $rcm_n->title ?>" href="<?= $rcm_n->getUrl() ?>"><span class="align-middle"><?= $rcm_n->title ?></span></a>
                                                                </div>
                                                                <div class="jobslist-01-row-com"><a title="<?= $user_rcm_info->company_name ?>" href="<?= $getHref ?>"><?= $user_rcm_info->company_name ?></a>
                                                                </div>
                                                                <ul class="list-feat row">
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-salary">
                                                                        Lương:<span class="ml-1"><?= $rcm_n->wage ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-address" title="<?php echo $province_info->_name; ?>">Địa
                                                                        điểm:<span class="ml-1"><?php echo $province_info->_name; ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-date d-pc">
                                                                        Hạn nộp:<span class="ml-1"><?php echo date('d/m/Y', $rcm_n->the_deadline) ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-experi d-pc">
                                                                        Kinh nghiệm: <?= $rcm_n->experience ?>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="jobslist-01-row-right fix-jobslist-01-row-right">
                                                                <a class="jobslist-01-row-logo" href="<?= $getHref ?>">
                                                                    <figure><img alt="img" src="<?= $getUrl ?>">
                                                                    </figure>
                                                                </a>
                                                                <?php if ($user_type == 'seeker') : ?>
                                                                    <button class="btn btn-save-job fn-save-job " onclick="save_news_recruitment('<?php echo $rcm_n->id ?>','<?= $user_type ?>');">
                                                                        Lưu
                                                                    </button>
                                                                <?php else : ?>
                                                                    <button class="btn btn-save-job fn-save-job " onclick="moveToLoginSeeker()">
                                                                        Lưu
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                                <div class="text-center"><?= $pager->links() ?></div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</article>