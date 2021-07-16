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
                        <?php if ($list_new_recruitment) : ?>
                            <div class="main-colm ">
                                <div class="title-nor">Việc làm đã ứng tuyển</div>

                                <div class="jsx-3797885135 jobslist-01 row">
                                    <div class="jsx-3797885135 jobslist-01-cont ex-job-04">
                                        <ul class="jobslist-01-ul">

                                            <?php foreach ($list_new_recruitment as $rcm_n) : ?>
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
                                                                <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-salary"><i class="fas fa-dollar-sign"></i> Lương:<span class="ml-1"><?= $rcm_n->wage ?></span>
                                                                </li>
                                                                <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-address" title="<?php echo $province_info->_name; ?>"><i class="fas fa-map-marker-alt"></i> Địa điểm:<span class="ml-1"><?php echo $province_info->_name; ?></span>
                                                                </li>
                                                                <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-date"><i class="fas fa-clock"></i> Hạn nộp:<span class="ml-1"><?php echo date('d/m/Y', $rcm_n->the_deadline) ?></span>
                                                                </li>
                                                                <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-experi"><i class="fas fa-signal"></i> Kinh nghiệm: <?= $rcm_n->experience ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="jobslist-01-row-right fix-jobslist-01-row-right">
                                                            <a class="jobslist-01-row-logo" href="<?= $getHref ?>">
                                                                <figure><img alt="img" src="<?= $getUrl ?>">
                                                                </figure>
                                                            </a>

                                                            <?php if ($user_type == 'seeker') : ?>
                                                                <button class="btn btn-save-job fn-save-job " onclick="save_news_recruitment('<?php echo $rcm_n->id ?>', '1');">
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

                                        </ul>
                                    </div>
                                </div>

                            </div>


                        <?php endif; ?>

                        <?php if ($list_news_suggest) : ?>
                            <div class="mt-3">
                                <div class="jsx-1510199531 main-colm">
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
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-salary"><i class="fas fa-dollar-sign"></i> Lương:<span class="ml-1"><?= $rcm_n->wage ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-address" title="<?php echo $province_info->_name; ?>"><i class="fas fa-map-marker-alt"></i> Địa điểm:<span class="ml-1"><?php echo $province_info->_name; ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-date"><i class="fas fa-clock"></i> Hạn nộp:<span class="ml-1"><?php echo date('d/m/Y', $rcm_n->the_deadline) ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-experi"><i class="fas fa-signal"></i> Kinh nghiệm: <?= $rcm_n->experience ?>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="jobslist-01-row-right fix-jobslist-01-row-right">
                                                                <a class="jobslist-01-row-logo" href="<?= $getHref ?>">
                                                                    <figure><img alt="img" src="<?= $getUrl ?>">
                                                                    </figure>
                                                                </a>

                                                                <?php if ($user_type == 'seeker') : ?>
                                                                    <button class="btn btn-save-job fn-save-job " onclick="save_news_recruitment('<?php echo $rcm_n->id ?>','1');">
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