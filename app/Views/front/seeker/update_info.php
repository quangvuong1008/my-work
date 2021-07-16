<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\NewsWidget;
use App\Helpers\Widgets\FrontendNav;
use App\Models\SettingsModel;
use App\Helpers\SettingHelper;
use App\Helpers\Widgets\SeekerLeftMenu;

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
                        <div class="main-colm">
                            <div class="title-nor">Thông tin tài khoản</div>
                            <div class="accinfo-01">
                                <div class="accinfo-01-box false">
                                    <div class="accinfo-01-ttl">Thông tin đăng nhập</div>
                                    <div class="accinfo-01-txt"><span
                                                class="mr-1 float-left">Email đăng nhập:</span><span
                                                class="accinfo-01-txt-span">
                                            <?php
                                            if ($model) {
                                                echo $model->email;
                                            }
                                            ?>
                                        </span>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="accinfo-01">
                                <div class="accinfo-01-box false">
                                    <div class="accinfo-01-ttl">Mật khẩu</div>
                                    <button class="btn btn-blue-46 fn-btn-edit w200" type="button" data-toggle="modal"
                                            data-target="#modal_change_password"><span>Thay đổi Mật khẩu</span>
                                    </button>

                                    <div class="modal fade" id="modal_change_password" tabindex="-1" role="dialog"
                                         aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Thay đổi mật khẩu</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= base_url() . '/UserSeeker/change_password' ?>"
                                                          method="POST">
                                                        <div class="">
                                                            <div>
                                                                <div class=" tabbox-01-group ex-eye-hide-pass "><label
                                                                            for="" class=" tabbox-01-group-lb"><span
                                                                                class="mr-1">Nhập mật khẩu hiện tại</span></label>
                                                                    <div class="tabbox-01-group-input"><input
                                                                                type="password" class="form-control  "
                                                                                name="old_password"><i
                                                                                class="icon-x-red"></i></div>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="tabbox-01-group ex-eye-hide-pass "><label
                                                                            for=""
                                                                            class="tabbox-01-group-lb"><span
                                                                                class="mr-1">Nhập mật khẩu mới</span></label>
                                                                    <div class="tabbox-01-group-input"><input
                                                                                type="password" class="form-control  "
                                                                                name="password"><i
                                                                                class="icon-x-red"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                    class="btn btn-blue-46 btn btn-primary">
                                                                Thay đổi mật khẩu
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="personinf-01 false">
                                <div class="title-nor mt10 m-mt0">Thông tin Cá nhân</div>
                                <?php
                                $full_name = $model->fullname;
                                $get_image = $model->getImage();
                                $birthday = $model->birthday;
                                $sex = $model->sex;
                                $love = $model->love;
                                $email = $model->email;
                                $address = $model->address;
                                ?>
                                <figure class="personinf-01-fig"><img src="<?php echo $get_image ?>" width="120"
                                                                      height="120" alt="avatar"></figure>
                                <div class="personinf-01-info mb-3">
                                    <div class="personinf-01-name"><?php echo $full_name; ?></div>
                                    <div class="personinf-01-txt"><p>
                                            <b>Ngày sinh:</b><span
                                                    class="ml-1"><?php echo $birthday; ?></span></p>
                                        <p><b>Giới tính:</b><span class="ml-1"><?php echo $sex; ?></span></p>
                                        <p><b>Địa chỉ:</b><span class="ml-1"><?php echo $address ?></span></p>
                                        <p><b>Email:</b><span class="ml-1"><?php echo $email; ?></span></p>
                                        <p><b>Tình trạng hôn nhân:</b><span class="ml-1"><?php echo $love; ?></span></p>
                                    </div>
                                </div>
                                <button class="btn btn-blue-46 fn-btn-edit w200" type="button" data-toggle="modal"
                                        data-target="#modal_change_info">
                                    <span>Thay đổi Thông tin</span></button>
                                <div class="modal fade modal-xl" id="modal_change_info" tabindex="-1" role="dialog"
                                     aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModalLabel">Thay đổi thông tin Cá
                                                    nhân</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= base_url() . '/UserSeeker/update_info' ?>"
                                                      method="POST" enctype="multipart/form-data">
                                                    <div class="">
                                                        <figure class="personinf-01-fig"><img
                                                                    src="<?php echo $get_image ?>" width="120"
                                                                    height="120" alt="avatar"><label
                                                                    class="personinf-01-lb"><i
                                                                        class="icon-ic-edit2"></i><input type="file"
                                                                                                         id="avt" name="avt"
                                                                                                         class="personinf-01-input"></label>
                                                        </figure>
                                                        <div class="personinf-01-edit">
                                                            <div class="">
                                                                <div>
                                                                    <div class="tabbox-01-group ">
                                                                        <label for="" class="tabbox-01-group-lb"><span
                                                                                    class="mr-1">Họ tên</span>
                                                                            <span class="tabbox-01-group-red mr-1">*</span></label>
                                                                        <div class="tabbox-01-group-input">
                                                                            <input
                                                                                    type="text"
                                                                                    class="form-control "
                                                                                    name="name"
                                                                                    value="<?php echo $full_name ?>"><i
                                                                                    class="icon-x-red"></i><i
                                                                                    class="icon-tick-green"></i>
                                                                        </div>
                                                                        <div class="create-cnt-row-right"></div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="tabbox-01-group ">
                                                                        <label for="" class="tabbox-01-group-lb"><span
                                                                                    class="mr-1">Ngày sinh</span><span
                                                                                    class="tabbox-01-group-red mr-1">*</span></label>
                                                                        <div class="tabbox-01-group">
                                                                            <div class="tabbox-01-group ex-has-icon">
                                                                                <div class="tabbox-01-group-input">
                                                                                    <div class="react-datepicker-wrapper">
                                                                                        <div class="react-datepicker__input-container">
                                                                                            <input id="seeker_birthday"
                                                                                                   type="text"
                                                                                                   name="birthday"
                                                                                                   placeholder="Chọn ngày sinh"
                                                                                                   class="form-control  "
                                                                                                   value="<?php echo $birthday ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <i class="icon-x-red"></i><i
                                                                                            class="icon-tick-green"></i>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="create-cnt-row-right"></div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="tabbox-01-group "><label for=""
                                                                                                         class="tabbox-01-group-lb"><span
                                                                                    class="mr-1">Địa chỉ hiện tại</span><span
                                                                                    class="tabbox-01-group-red mr-1">*</span></label>
                                                                        <div class="tabbox-01-group-input"><input
                                                                                    type="text"
                                                                                    class="form-control "
                                                                                    name="address"
                                                                                    value="<?php echo $address; ?>"><i
                                                                                    class="icon-x-red"></i><i
                                                                                    class="icon-tick-green"></i>
                                                                        </div>
                                                                        <div class="create-cnt-row-right"></div>
                                                                    </div>
                                                                </div>

                                                                <div class="">
                                                                    <div class=" tabbox-01-group ">
                                                                        <label for="" class="tabbox-01-group-lb">
                                                                            <span class="mr-1">Giới tính</span>
                                                                            <span class="tabbox-01-group-red mr-1">*</span>
                                                                        </label>
                                                                        <select class="selectpicker form-control"
                                                                                name="sex" id="sex">
                                                                            <option value="" <?php if (!$sex) echo 'selected' ?> ></option>
                                                                            <option value="Nam" <?php if ($sex == 'Nam') echo 'selected' ?>>
                                                                                Nam
                                                                            </option>
                                                                            <option value="Nữ" <?php if ($sex == 'Nữ') echo 'selected' ?>>
                                                                                Nữ
                                                                            </option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <div class="tabbox-01-group ">
                                                                        <label for="" class="tabbox-01-group-lb">
                                                                            <span class="mr-1">Tình trạng hôn nhân</span>
                                                                            <span class="tabbox-01-group-red mr-1">*</span>
                                                                        </label>
                                                                        <select class="selectpicker form-control"
                                                                                name="love" id="love">
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
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-blue-46 btn btn-primary">
                                                            Thay đổi
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

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


