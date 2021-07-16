<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\NewsWidget;
use App\Helpers\Widgets\FrontendNav;
use App\Models\SettingsModel;
use App\Helpers\SettingHelper;
use App\Helpers\Widgets\FrontendNavTd;

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
<?php if (!empty($user_type) &&  $user_type !== 'seeker') : ?>
    <?= FrontendNavTd::register($this); ?>
<?php else : ?>
    <?= FrontendNav::register($this); ?>
<?php endif; ?>
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
                    <option value="" <?php if (!$search_param['province_id']) echo 'selected' ?>>Tất cả nơi làm việc</option>
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
        <div class="map-links container">
            <ul itemtype="https://schema.org/BreadcrumbList" itemscope="">
                <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item" class="active" href="/"><span itemprop="name">Trang chủ</span></a>
                    <meta itemprop="position" content="1">
                </li>
                <li aria-current="page"><a>Tuyển dụng nhanh và uy tín | Tuyển dụng hiệu quả</a></li>
            </ul>
        </div>
        <div class="main-2-cols">
            <div class="container">
                <div class="">
                    <div class="row">
                        <div class="d-filter-header col-12 col-sm-3 col-md-3 col-lg-3 col-1-ps">
                            <div class="left-boxes">
                                <div class="left-boxes-white">
                                    <select class="selectpicker form-control filter_wage" name="wage" id="wage" data-live-search="true" onchange="build_query();">
                                        <option value="" selected>Tất cả các mức lương</option>
                                        <?php

                                        $list_salary_range = [
                                            '1-3 triệu',
                                            '3-5 triệu',
                                            '5-7 triệu',
                                            '7-10 triệu',
                                            '10-12 triệu',
                                            '12-15 triệu',
                                            '15-20 triệu',
                                            '20-25 triệu',
                                            '25-30 triệu',
                                            'Trên 30 triệu'
                                        ];

                                        if ($list_salary_range) {
                                            foreach ($list_salary_range as $salary) {
                                                $selected = '';
                                                if ($search_param['wage']) {
                                                    if ($salary == $search_param['wage']) {
                                                        $selected = 'selected';
                                                    }
                                                }

                                                echo ' <option value="' . $salary . '" ' . $selected . ' >' . $salary . '</option>';
                                            }
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="left-boxes-white">
                                    <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Tỉnh thành </span>
                                        <!--                                        <span class="cursor-pointer text-main font400 fs-14"><i>   Bỏ lọc (1)</i></span>-->
                                    </div>
                                    <div id="collapsCareer" class="collapse show">
                                        <div class="lst-checkbox">

                                            <ul>
                                                <?php if ($list_province) {
                                                    foreach ($list_province as $province) {
                                                        $selected = '';
                                                        if ($search_param['province_ids']) {
                                                            if (in_array($province->id, $search_param['province_ids'])) {
                                                                $selected = 'checked';
                                                            }
                                                        }

                                                        echo '<li><label class="checkbox-lb cursor-pointer">
                                                        <div class="icheckbox_minimal-grey "><input class="icheck filter_province" onchange="build_query()" data-type="province" data-province_id ="' . $province->id . '"  name="province"
                                                                                                    type="checkbox" ' . $selected . '
                                                                                                    >
                                                            <ins class="iCheck-helper"></ins>
                                                        </div>
                                                        ' . $province->_name . '</label></li>';
                                                    }
                                                } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-boxes-white">
                                    <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Ngành nghề</span>
                                    </div>
                                    <div id="collapsCareer" class="collapse show">
                                        <div class="lst-checkbox">
                                            <ul>
                                                <?php if ($list_job) {
                                                    foreach ($list_job as $job) {
                                                        $selected = '';
                                                        if ($search_param['job_ids']) {
                                                            if (in_array($job->id, $search_param['job_ids'])) {
                                                                $selected = 'checked';
                                                            }
                                                        }

                                                        echo '<li><label class="checkbox-lb cursor-pointer">
                                                        <div class="icheckbox_minimal-grey "><input data-type="job" onchange="build_query()" data-job_id ="' . $job->id . '"  name="job"
                                                                                                    type="checkbox" ' . $selected . '
                                                                                                    class="icheck filter_job">
                                                            <ins class="iCheck-helper"></ins>
                                                        </div>
                                                        ' . $job->title . '</label></li>';
                                                    }
                                                } ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-boxes-white">
                                    <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Cấp bậc</span>
                                    </div>
                                    <div id="collapsCareer" class="collapse show">
                                        <div class="lst-checkbox">
                                            <ul>
                                                <?php
                                                $list_level = [
                                                    'Mới tốt nghiệp / Thực tập sinh',
                                                    'Nhân viên',
                                                    'Trưởng nhóm',
                                                    'Trưởng phòng',
                                                    'Phó giám đốc',
                                                    'Giám đốc',
                                                    'Tổng giám đốc điều hành',
                                                    'Khác',
                                                ];

                                                if ($list_level) {
                                                    foreach ($list_level as $level) {
                                                        $selected = '';
                                                        if ($search_param['level_ids']) {
                                                            if (in_array($level, $search_param['level_ids'])) {
                                                                $selected = 'checked';
                                                            }
                                                        }

                                                        echo '<li><label class="checkbox-lb cursor-pointer">
                                                        <div class="icheckbox_minimal-grey "><input onchange="build_query()" data-type="level" data-level_id ="' . $level . '"  name="level"
                                                                                                    type="checkbox" ' . $selected . '
                                                                                                    class="icheck filter_level">
                                                            <ins class="iCheck-helper"></ins>
                                                        </div>
                                                        ' . $level . '</label></li>';
                                                    }
                                                }

                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="left-boxes-white">
                                    <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Loại hình công việc</span>
                                    </div>
                                    <div id="collapsCareer" class="collapse show">
                                        <div class="lst-checkbox">
                                            <ul>
                                                <?php
                                                $list_type_of_work = [
                                                    'Toàn thời gian cố định',
                                                    'Toàn thời gian tạm thời',
                                                    'Bán thời gian cố định',
                                                    'Bán thời gian tạm thời',
                                                    'Theo hợp đồng tư vấn',
                                                    'Thực tập',
                                                    'Khác',
                                                ];

                                                if ($list_type_of_work) {
                                                    foreach ($list_type_of_work as $type_of_work) {
                                                        $selected = '';
                                                        if ($search_param['type_of_work_ids']) {
                                                            if (in_array($type_of_work, $search_param['type_of_work_ids'])) {
                                                                $selected = 'checked';
                                                            }
                                                        }

                                                        echo '<li><label class="checkbox-lb cursor-pointer">
                                                        <div class="icheckbox_minimal-grey "><input onchange="build_query()"  data-type="type_of_work" data-type_of_work_id ="' . $type_of_work . '"  name="type_of_work"
                                                                                                    type="checkbox" ' . $selected . '
                                                                                                    class="icheck filter_type_of_work">
                                                            <ins class="iCheck-helper"></ins>
                                                        </div>
                                                        ' . $type_of_work . '</label></li>';
                                                    }
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-filter-body col-12 col-sm-9 col-md-9 col-lg-9 col-3-ps m-pl0 m-pr0">
                            <div class="main-colm pb-3-mb">
                                <div class="jsx-3797885135 ttl-big-blue">
                                    <h1 class="jsx-3797885135 h1-none-size">Tìm
                                        thấy <?php echo $recruitment_new ? $pager->getTotalCount() : 0; ?> việc làm phù
                                        hợp</h1>
                                </div>
                                <div class="jsx-3797885135 jobslist-01 row">
                                    <div class="jsx-3797885135 jobslist-01-cont ex-job-04">
                                        <ul class="jobslist-01-ul">
                                            <?php if ($recruitment_new) : ?>
                                                <?php foreach ($recruitment_new as $rcm_n) : ?>
                                                    <?php $user_rcm_id = $rcm_n->user_rcm_id;
                                                    $user_rcm_info = $rcm_n->user_recruitment_info($user_rcm_id);
                                                    $province_info = $rcm_n->get_province_info($rcm_n->province);
                                                    $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                                                    $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                                                    ?>
                                                    <li class="jobslist-01-li">
                                                        <div class="jobslist-01-row fix-jobslist-01-row">
                                                            <div class="jobslist-01-row-left">
                                                                <div class="jobslist-01-row-ttl"><a title="<?= $rcm_n->title ?>" href="<?= $rcm_n->getSeekerUrl() ?>"><span class="align-middle"><?= $rcm_n->title ?></span></a>
                                                                </div>
                                                                <div class="jobslist-01-row-com"><a title="<?= $user_rcm_info->company_name ?>" href="<?= $getHref ?>"><?= $user_rcm_info->company_name ?></a>
                                                                </div>
                                                                <ul class="list-feat row">
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-salary"><i class="fas fa-dollar-sign"></i> Lương:<span class="ml-1"><?= $rcm_n->wage ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-address" title="<?php echo $province_info->_name; ?>"><i class="fas fa-map-marker-alt"></i> Địa điểm:<span class="ml-1"><?php echo $province_info->_name; ?></span>
                                                                    </li>
                                                                    <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-date"><i class="fas fa-clock"></i> Hạn nộp:<span><?php echo date('d/m/Y', $rcm_n->the_deadline) ?></span>
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
                                                                    <button class="btn btn-save-job fn-save-job " onclick="save_news_recruitment('<?php echo $rcm_n->id ?>','<?= $user_type ?>');">Lưu
                                                                    </button>
                                                                <?php else : ?>
                                                                    <button class="btn btn-save-job fn-save-job " onclick="moveToLoginSeeker()">Lưu
                                                                    </button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                                <div class="text-center"><?= $pager->links() ?></div>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>