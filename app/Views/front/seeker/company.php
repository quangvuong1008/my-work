<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\NewsWidget;
use App\Helpers\Widgets\FrontendNav;
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
<?= FrontendNav::register($this); ?>
<form action="/tuyen-dung/">
    <div class="full-white-01">
        <div class="search-01-row row container pb-3">
            <div class="div-input">
                <?php   $selected = '';
                if($search_param['q']){
                    $selected = $search_param['q'];
                } ?>
                <input type="text" class="form-control" name="q" value="<?php echo $selected; ?>"
                       placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc..."></div>
            <div class="div-sl-tk ex-sl-nn">

                <select class="selectpicker form-control" name="job_id"
                        id="job_id"
                        data-live-search="true">
                    <option value="" '<?php if(!$search_param['job_id']) echo 'selected' ?>'>Tất cả ngành nghề</option>
                    <?php
                    if ($list_job) {
                        foreach ($list_job as $job) {
                            $selected = '';
                            if($search_param['job_id']){
                                if($job->id == $search_param['job_id']){
                                    $selected = 'selected';
                                }
                            }

                            echo ' <option value="' . $job->id . '"  '.$selected.'>' . $job->title . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="div-sl-tk ex-sl-tt">

                <select class="selectpicker form-control" name="province_id"
                        id="province_id"
                        data-live-search="true">
                    <option value="" <?php if(!$search_param['province_id']) echo 'selected' ?> >Tất cả nơi làm việc</option>
                    <?php
                    if ($list_province) {
                        foreach ($list_province as $province) {
                            $selected = '';
                            if($search_param['province_id']){
                                if($province->id == $search_param['province_id']){
                                    $selected = 'selected';
                                }
                            }

                            echo ' <option value="' . $province->id . '" '.$selected.'>' . $province->_name . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="div-btn text-center">
                <button type="submit" class="btn btn-search mb-2">Tìm việc</button>
                <a class="pt-3 fs-14" href="/viec-lam/tim-kiem-nang-cao"><i
                            class="icon-zoom_in text-speci fs-24 align-middle"></i><span class="text-speci font600">Tìm kiếm nâng cao</span></a>
            </div>
        </div>
    </div>
</form>
<article>
    <section class="new-homepage mt-3">
        <div class="map-links container">
            <ul>
                <li><a>Trang chủ</a></li>
                <li><a href="#">Công ty</a></li>
            </ul>
        </div>
        <div class="main-2-cols">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                        <div class="main-colm">
                            <div class="ttl-big-blue"><h1 class="h1-none-size"><?php echo $list_user_recruitment ? $pager->getTotalCount(): 0 ; ?> Công ty đang tuyển dụng</h1></div>
                            <div class="company-lst ex-cty-lst">
                                <ul class="row">
                                    <?php if ($list_user_recruitment) {
                                        foreach ($list_user_recruitment as $user_rcm_info){
                                            $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                                            $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                                            ?>
                                            <li class="col-6 col-sm-6 col-md-3 col-lg-3"><a class="company-lst-link"
                                                                                            href="<?php echo $getHref; ?>">
                                                    <figure class="company-lst-fig"><img class="img-fluid"
                                                                                         src="<?php echo $getUrl; ?>"
                                                                                         alt="<?php echo $user_rcm_info->company_name; ?>">
                                                    </figure>
                                                    <span class="company-lst-name"><?php echo $user_rcm_info->company_name; ?></span></a>
                                            </li>
                                    <?php
                                        }
                                        ?>

                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                            <div class="text-center"><?= $pager->links() ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>


