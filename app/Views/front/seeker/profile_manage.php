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
                <input type="text" class="form-control" name="q" value="<?php echo $selected; ?>"
                       placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc..."></div>
            <div class="div-sl-tk ex-sl-nn">

                <select class="selectpicker form-control" name="job_id"
                        id="job_id"
                        data-live-search="true">
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

                <select class="selectpicker form-control" name="province_id"
                        id="province_id"
                        data-live-search="true">
                    <option value="" <?php if (!$search_param['province_id']) echo 'selected' ?> >Tất cả nơi làm việc
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
                <a class="pt-3 fs-14" href="/viec-lam/tim-kiem-nang-cao"><i
                            class="icon-zoom_in text-speci fs-24 align-middle"></i><span class="text-speci font600">Tìm kiếm nâng cao</span></a>
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
                            <div class="title-nor">Quản lý hồ sơ</div>
                            <div class="box-noti-01">
                                <div class="box-noti-01-cnt"><p>Bạn được tạo tối đa 02 hồ sơ (01 hồ sơ trực tuyến và 01
                                        hồ sơ đính kèm file). Trong đó chỉ có 01 hồ sơ được<b class="mx-1">“cho phép tìm
                                            kiếm”</b>bởi Nhà tuyển dụng.</p>
                                    <p>Tất cả các Hồ sơ ở trạng thái “Đã duyệt” đều có thể sử dụng để “Nộp hồ sơ” trực
                                        tuyến.</p></div>
                            </div>
                            <div>
                                <?php if($list_user_profile) {
                                    foreach ($list_user_profile as $n => $user_profile){
                                        ?>
                                        <div class="boxhs-01">
                                            <div class="boxhs-01-ttl ex-edit ">
                                                <div class="cursor-pointer "><span class="cursor-pointer">HỒ SƠ <?php echo $n+1; ?>: <?php echo $user_profile->job_title()?></span>
                                                </div>
                                            </div>
                                            <div class="row boxhs-01-info">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><p><b>Mã hồ sơ:
                                                           <?php echo $user_profile->profile_code(); ?></b></p></div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><p><b>Loại hồ sơ: </b>Hồ sơ Online</p>

                                                    <p><b>Ngày tạo: </b><span><?php echo date('Y-m-d', $user_profile->created_at)?></span></p></div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4"><p><b>Tình trạng: </b><span
                                                            class=""><?php echo $user_profile->status_display()?></span></p>
                                                    <p><b>Lượt xem: </b><span><?php echo $user_profile->views?></span></p></div>
                                            </div>
                                            <div class="boxhs-01-checkbox mt-1"><label class="checkboxlb-black checkbox-resume">
                                                    <div class="icheckbox_minimal-grey position-relative align-middle checked">
                                                        <input type="checkbox" class="icheck">
                                                        <ins class="iCheck-helper"></ins>
                                                    </div>
                                                    <span class="align-middle">Cho phép nhà tuyển dụng tìm kiếm hồ sơ và liên hệ với bạn.</span></label>
                                            </div>
                                            <div class="boxhs-01-btns mt-1">
                                                <ul class="boxhs-01-btns-ul row">
                                                    <li><a class="btn btn-blue-46 ex-preview"
                                                          target="_blank"  href="/nha-tuyen-dung/ho-so/<?php echo $user_profile->id . '/' . StringHelper::rewrite($user_profile->title); ?>">Xem trước</a>
                                                    </li>
                                                    <li>
                                                        <a href="/trang-ca-nhan/sua-ho-so/<?php echo $user_profile->id; ?>" class="cursor-pointer btn btn-blue-46 ex-edit">Chỉnh sửa</a>
                                                    </li>
                                                    <li>
                                                        <a href="/trang-ca-nhan/xoa-ho-so/<?php echo $user_profile->id; ?>" class="btn btn-blue-46 ex-dele">Xóa hồ sơ</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }?>

                                <div class="box-no-hs">
                                    <div class="box-no-hs-row">
                                        <div class="box-no-hs-ttl">Bạn có thể tạo thêm hồ sơ </div>
                                        <div class="cursor-pointer ">
                                            <a href="/trang-ca-nhan/tao-ho-so" class="btn btn-blue-50 ex-attach text-uppercase">
                                                <span> Tạo hồ sơ online</span></a>
                                        </div>
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


