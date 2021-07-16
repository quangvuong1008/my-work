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

$list_level = EDUCATION_LEVEL;
$list_position = POSITION_WANTED;


$list_experience = EXPERIENCE;

$list_type_of_work = JOB_TYPE;
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
                        <form method="post" enctype="multipart/form-data" >
                            <div class="create-cnt pd-top0">
                                <div>
                                    <div id="box_dinh_kem" class="jsx-3675164889 create-cnt-box mg-top0">
                                        <div class="jsx-3675164889 create-cnt-ttl">Hồ sơ đính kèm<span
                                                    class="jsx-3675164889 create-cnt-ttl-sub ml-1">(Bắt buộc)</span>
                                        </div>
                                        <div class="jsx-3675164889 create-cnt-inputs">
                                            <div class="jsx-3675164889 row create-cnt-row">
                                                <div class="jsx-3675164889 create-cnt-row-left">
                                                    <div class="jsx-3675164889 create-cnt-row-ttl"><span
                                                                class="jsx-3675164889">Hồ sơ đính kèm</span><span
                                                                class="jsx-3675164889 txt-red ml-1">*</span></div>
                                                </div>
                                                <div class="jsx-3675164889 create-cnt-row-right">
                                                    <div class="jsx-3675164889 tabbox-01-group">
                                                        <div class="jsx-3675164889 tabbox-01-group-input"><label
                                                                    class="jsx-3675164889 btn btn-file m0">File hồ sơ đính kèm<input type="file" name="cv_files[]"  accept=".doc, .docx,.pdf"  class="input-file" multiple></label>
                                                            <div class="jsx-3675164889 file-type">(Hồ sơ định dạng doc, docx, pdf, dung lượng &lt;= 2 MB)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="create-cnt-box" id="box_tai_khoan">
                                        <div class="create-cnt-ttl">Thông tin cá nhân<span
                                                    class="create-cnt-ttl-sub ml-1">(Bắt buộc)</span>
                                            <button class="m-down-arrow d-inline-block d-sm-none"></button>
                                        </div>
                                        <div class="create-cnt-inputs collapse pt-3-mb show">
                                            <div class="">
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt-0-mb mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Họ tên</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="tabbox-01-group-input">
                                                                    <input type="text" class="form-control " name="full_name" required value="<?php if($model) echo $model->full_name; ?>"><i
                                                                            class="icon-x-red"></i><i
                                                                            class="icon-tick-green"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt-0-mb mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Ngày sinh</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="tabbox-01-group">
                                                                    <div class="tabbox-01-group ex-has-icon">
                                                                        <div class="tabbox-01-group-input">
                                                                            <div class="react-datepicker-wrapper">
                                                                                <div class="react-datepicker__input-container">
                                                                                    <input type="text" name="birthday"
                                                                                           id="seeker_birthday"
                                                                                           placeholder="Chọn ngày sinh"
                                                                                           class="form-control  " required
                                                                                           value="<?php if($model) echo $model->birthday; ?>"></div>
                                                                            </div>
                                                                            <i class="icon-x-red"></i><i
                                                                                    class="icon-tick-green"></i></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt-0-mb mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Số điện thoại</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="tabbox-01-group-input"><input type="text"
                                                                                                          class="form-control "
                                                                                                          id="mobile"
                                                                                                          name="phone_number" required
                                                                                                          value="<?php if($model) echo $model->phone_number; ?>"><i
                                                                            class="icon-x-red"></i><i
                                                                            class="icon-tick-green"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt-0-mb mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Địa chỉ hiện tại</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="tabbox-01-group-input"><input type="text"
                                                                                                          class="form-control "
                                                                                                          name="address" required
                                                                                                          value="<?php if($model) echo $model->address; ?>" ><i
                                                                            class="icon-x-red"></i><i
                                                                            class="icon-tick-green"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 d-flex align-items-flex-end row create-cnt-row mt-0">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Giới tính</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>

                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <select class="selectpicker form-control" required
                                                                        name="gender" id="gender">
                                                                    <?php $gender = $model? $model->gender: ''; ?>
                                                                    <option value="" <?php if (!$gender) echo 'selected' ?> ></option>
                                                                    <option value="male" <?php if ($gender == 'male') echo 'selected' ?>>
                                                                        Nam
                                                                    </option>
                                                                    <option value="female" <?php if ($gender == 'female') echo 'selected' ?>>
                                                                        Nữ
                                                                    </option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 d-flex align-items-flex-end row create-cnt-row mt15 mt-0-mb">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Tình trạng hôn nhân</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <select class="selectpicker form-control"
                                                                        name="married" id="married" required >
                                                                    <?php $love = $model? $model->married: ''; ?>

                                                                    <option value="" <?php if (!$love) echo 'selected' ?> ></option>
                                                                    <option value="Độc thân" <?php if ($love == 'Độc thân') echo 'selected' ?>>
                                                                        Độc thân
                                                                    </option>
                                                                    <option value="Đã lập gia đình" <?php if ($love == 'Đã lập gia đình') echo 'Đã lập gia đình' ?>>
                                                                        Đã lập gia đình
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <div class="create-cnt-box" id="box_tong_quan">
                                        <div class="create-cnt-ttl">Thông tin tổng quan<span
                                                    class="create-cnt-ttl-sub ml-1">(Bắt buộc)</span>
                                            <button class="m-down-arrow d-inline-block d-sm-none"
                                                    type="button"></button>
                                        </div>
                                        <div class="create-cnt-inputs collapse show">
                                            <div class="">

                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Vị trí/ việc làm cần ứng tuyển</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="tabbox-01-group-input"><input type="text"
                                                                                                          class="form-control "
                                                                                                          name="title" required  value="<?php if($model) echo $model->title ?>"><i
                                                                            class="icon-x-red"></i><i
                                                                            class="icon-tick-green"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Cấp bậc</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="form-group">
                                                                    <select class="selectpicker form-control" required
                                                                            name="position_wanted_id"
                                                                            data-live-search="true">
                                                                        <?php
                                                                        $value = '';
                                                                        if ($model) {
                                                                            $value = $model->position_wanted_id;
                                                                        }
                                                                        ?>
                                                                        <option value="" <?php if (!$value) echo 'selected' ?>>
                                                                            Chọn cấp bậc
                                                                        </option>
                                                                        <?php foreach ($list_position as $key => $position) {
                                                                            $selected = ($key == $value) ? 'selected' : '';
                                                                            echo '<option value="' . $key . '" ' . $selected . ' >' . $position . '</option>';
                                                                        } ?>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Chọn ngành nghề</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <?php
                                                                $value = '';
                                                                if ($model) {
                                                                    $value = $model->job_id;
                                                                }
                                                                ?>
                                                                <select class="selectpicker form-control" name="job_id" required
                                                                        data-live-search="true">
                                                                    <option value="" <?php if (!$value) echo 'selected' ?>>
                                                                        Tất cả ngành nghề
                                                                    </option>
                                                                    <?php
                                                                    if ($list_job) {
                                                                        foreach ($list_job as $job) {
                                                                            $selected = '';
                                                                            if ($value) {
                                                                                if ($job->id == $value) {
                                                                                    $selected = 'selected';
                                                                                }
                                                                            }

                                                                            echo ' <option value="' . $job->id . '"  ' . $selected . '>' . $job->title . '</option>';
                                                                        }
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Địa điểm mong muốn</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <?php
                                                                $value = '';
                                                                if ($model) {
                                                                    $value = $model->province_id;
                                                                }
                                                                ?>
                                                                <select class="selectpicker form-control" required
                                                                        name="province_id"
                                                                        data-live-search="true">
                                                                    <option value="" <?php if (!$value) echo 'selected' ?> >
                                                                        Tất cả nơi làm việc
                                                                    </option>
                                                                    <?php
                                                                    if ($list_province) {
                                                                        foreach ($list_province as $province) {
                                                                            $selected = '';
                                                                            if ($value) {
                                                                                if ($province->id == $value) {
                                                                                    $selected = 'selected';
                                                                                }
                                                                            }

                                                                            echo ' <option value="' . $province->id . '" ' . $selected . '>' . $province->_name . '</option>';
                                                                        }
                                                                    }
                                                                    ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Trình độ học vấn</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <select class="selectpicker form-control" required
                                                                        name="edu_level" id="level"
                                                                        data-live-search="true">
                                                                    <?php
                                                                    $value = '';
                                                                    if ($model) {
                                                                        $value = $model->edu_level;
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (!$value) echo 'selected' ?>>
                                                                        Chọn trình độ
                                                                    </option>
                                                                    <?php foreach ($list_level as $key => $level) {
                                                                        $selected = ($key == $value) ? 'selected' : '';
                                                                        echo '<option value="' . $key . '" ' . $selected . ' >' . $level . '</option>';
                                                                    } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Số năm kinh nghiệm</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <select class="selectpicker form-control" required
                                                                        name="experience" data-live-search="true">
                                                                    <?php
                                                                    $value = '';
                                                                    if ($model) {
                                                                        $value = $model->experience;
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (!$value) echo 'selected' ?>>
                                                                        Số năm kinh nghiệm
                                                                    </option>
                                                                    <?php foreach ($list_experience as $key => $exp) {
                                                                        $selected = ($exp == $value) ? 'selected' : '';
                                                                        echo '<option value="' . $exp . '" ' . $selected . ' >' . $exp . '</option>';
                                                                    } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Hình thức làm việc</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <select class="selectpicker form-control"
                                                                        name="job_type" data-live-search="true">
                                                                    <?php
                                                                    $value = '';
                                                                    if ($model) {
                                                                        $value = $model->job_type;
                                                                    }
                                                                    ?>
                                                                    <option value="" <?php if (!$value) echo 'selected' ?>>
                                                                        Chọn hình thức làm việc
                                                                    </option>
                                                                    <?php foreach ($list_type_of_work as $key => $job_type) {
                                                                        $selected = ($key == $value) ? 'selected' : '';
                                                                        echo '<option value="' . $key . '" ' . $selected . ' >' . $job_type . '</option>';
                                                                    } ?>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="jsx-3440181638 row create-cnt-row mt15">
                                                        <div class="jsx-3440181638 create-cnt-row-left">
                                                            <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                                <span class="jsx-3440181638">Mức lương mong muốn</span><span
                                                                        class="jsx-3440181638 txt-red ml-1">*</span>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                            <div class="jsx-3440181638 tabbox-01-group ">
                                                                <div class="tabbox-01-group-input"><input type="number" required
                                                                                                          class="form-control h44 "
                                                                                                          placeholder="Nhập số"
                                                                                                          name="salary"
                                                                                                          value="<?php if($model) echo $model->salary ?>">
                                                                    <p class="hidden error_submit tabbox-01-group-erro"></p>
                                                                    <i class="icon-x-red"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                        <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
                                            <div class="row create-cnt-row mt-3">
                                                <div class="create-cnt-row-left">
                                                    <div class="create-cnt-row-ttl"></div>
                                                </div>
                                                <div class="create-cnt-row-right">
                                                    <div class="tabbox-01-group">
                                                        <div class="tabbox-01-group-input">
                                                            <button class="btn btn-pink-46 w-auto-40 font17"
                                                                    type="submit">Lưu
                                                            </button>
                                                            <a href="/trang-ca-nhan/quan-ly-ho-so" class="btn btn-white-46 w-auto-40 font17 ml-md-3" style="width: 200px"
                                                                    type="button">Hủy
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>


