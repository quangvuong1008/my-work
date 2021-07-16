<?php

use App\Helpers\Html;
use App\Helpers\Widgets\MenuRecruitmentWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\SearchRecruitmentWidget;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>
<?= FrontendNavTd::register($this); ?>
<article>
    <section class="new-homepage">
        <div class="main-2-cols mt30 m-mt0 m-mb0">
            <?= SearchRecruitmentWidget::register($this, $province, $job); ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-1-ps d-none d-sm-block">
                        <?= MenuRecruitmentWidget::register($this); ?>
                        <div id="toast_change">
                            <div class="ct-toast  ct-toast-success" style="border-left: 3px solid rgb(110, 192, 95); opacity: 1;  width: 207px; height: 45px; justify-content: center; align-items: center; background-color: white; display: flex;">
                                <svg viewBox="0 0 426.667 426.667" width="18" height="18">
                                    <path d="M213.333 0C95.518 0 0 95.514 0 213.333s95.518 213.333 213.333 213.333c117.828 0 213.333-95.514 213.333-213.333S331.157 0 213.333 0zm-39.134 322.918l-93.935-93.931 31.309-31.309 62.626 62.622 140.894-140.898 31.309 31.309-172.203 172.207z" fill="#6ac259"></path>
                                </svg>
                                <div class="ct-text-group">
                                    <div class="ct-text">Thao tác thành công!</div>
                                </div>
                            </div>
                        </div>
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
                        <div class="main-colm d-pc">
                            <div class="title-nor">Hồ sơ đã lưu</div>
                            <div class="box-noti-01 font15 py-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-orange-46 ex-setting w-auto-40 font17 m-w100p m-p0" onclick="showDialogManageCategory()">
                                            <i class="fas fa-cog" style="font-size: 20px;"></i>
                                            Quản lý danh mục
                                        </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <div class="pt-3">Tổng hồ sơ đã lưu:<span class="text-speci font600 ml-1" id="countSavedProfile"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="main-colm mt-3">
                            <div class="">
                                <div class="row ">


                                    <div class="col-md-6 form-group ">
                                        <input type="search" class="form-control rounded" aria-label="Search" id="search-title" name="search-title" placeholder="Tiêu đề hồ sơ,..." aria-describedby="search-addon" />

                                    </div>

                                    <div class="col-md-6 form-group">
                                        <select class="form-control" name="select-category" id="select-category" data-live-search="true">
                                            <option value="null">Chọn danh mục</option>
                                            <?php if (isset($category) && !empty($category)) : ?>
                                                <?php foreach ($category as $cat) : ?>
                                                    <option value="<?= $cat->id ?>"><?= $cat->category ?></option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <input class="form-control form-control-lg datetimepicker" id="datetimepicker_from" type="text" placeholder="Từ ngày" aria-label=".form-control-lg example">

                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-control form-control-lg datetimepicker" id="datetimepicker_to" type="text" placeholder="Đến ngày" aria-label=".form-control-lg example">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <button class="div-btn btn btn-blue-46 font17" onclick="ajaxSaveProfileData()">Tìm kiếm</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-3 m-mt0" id="main-saved-profiled">

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
</article>
<!-- modal Quản lí danh mục -->
<div class="modal fade bd-example-modal-lg" id="modalManageCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div id="toast_change_modal_saved">
            <div class="ct-toast  ct-toast-success" style="border-left: 3px solid rgb(110, 192, 95); opacity: 1;  width: 207px; height: 45px; justify-content: center; align-items: center; background-color: white; display: flex;">
                <svg viewBox="0 0 426.667 426.667" width="18" height="18">
                    <path d="M213.333 0C95.518 0 0 95.514 0 213.333s95.518 213.333 213.333 213.333c117.828 0 213.333-95.514 213.333-213.333S331.157 0 213.333 0zm-39.134 322.918l-93.935-93.931 31.309-31.309 62.626 62.622 140.894-140.898 31.309 31.309-172.203 172.207z" fill="#6ac259"></path>
                </svg>
                <div class="ct-text-group">
                    <div class="ct-text">Thao tác thành công!</div>
                </div>
            </div>
        </div>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-black font600 fs-20" id="exampleModalLabel">DANH MỤC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" style="justify-content: flex-end; display: flex ;">
                    <button class="btn btn-orange-46 ex-setting w-auto-40 font17 m-w100p m-p0" style="background-color: #009ce0;" onclick="showAddCategory()"><i class="fas fa-plus" style="font-size: 18px; margin-right: 5px;"></i>Thêm danh mục mới</button>
                </div>
                <div class="jsx-3230954151 box-table">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th class="text-center">Danh mục</th>
                                <th class="text-center">Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($category) && !empty($category)) : ?>
                                <?php foreach ($category as $cat) : ?>
                                    <tr>
                                        <td>
                                            <input id="title_<?= $cat->id ?>" class="form-control" name="title" value="<?= $cat->category ?>" required style="background-color: #fff; display: none;"></input>
                                            <button id="label_<?= $cat->id ?>" class="form-control" style="background-color: #fff; border: 0px; text-align: left;"><?= $cat->category ?></button>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm mr-2" onclick="editManageCategory(<?= $cat->id ?>)">
                                                <i id="icon_<?= $cat->id ?>" class="far fa-edit"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="delte_manage_category(<?= $cat->id ?>)">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end modal Quản lí danh mục -->

<!-- modal add Category-->
<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url() . '/UserRecruitment/add_user_meta_data' ?>" method="post">
                <div class="modal-header">
                    <h5 class="text-black font600 fs-20" id="exampleModalLabel">DANH MỤC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class=""><span class="text-speci mr-1">*</span>Tên danh mục</label>
                    <div class="form-group"><input type="category" class="form-control" placeholder="Nhập tên danh mục" name="category" required></div>
                    <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal" onclick="showDialogManageCategory()">Trở lại</button>
                    <button type="submit" class="btn btn-orange-46 w-auto-40 font17">Thêm danh mục</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal add Category-->

<!-- modal  Quản lí ghi chú-->
<div class="modal fade" id="modalEditSavedProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-black font600 fs-20" id="exampleModalLabel">Quản lý ghi chú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Chọn danh mục</label>
                    <select class="form-control" name="cat_id" id="cat_id" data-live-search="true">
                        <option value="null">Chọn danh mục</option>
                        <?php foreach ($category as $cat) : ?>
                            <option value="<?= $cat->id ?>"><?= $cat->category ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Ghi chú</label>
                    <textarea class="form-control" id="note" name="note"></textarea>
                </div>
                <input type="hidden" id="user_profile_id_modal" name="user_profile_id">
                <input type="hidden" id="saved_by_modal" name="saved_by">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal">Trở lại</button>
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" onclick="ajaxUpdateFavourite()">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal export CSV -->
<div class="modal fade bd-example-modal-sm" id="modalExportCSVSaved" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 25px; color: red"></i>
                <h3 style="color: red;padding-left: 20px; position: relative;">Vui lòng chọn trang cần xuất file excel</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-box-txt">
                    <label class="radio-cus mr-3">
                        <input type="radio" name="radio" value="1" checked="">
                        <span class="checkmark mr-1">
                        </span>
                        <span>Trang hiện tại</span>
                    </label>
                    <label class="radio-cus">
                        <input type="radio" name="radio" value="2">
                        <span class="checkmark mr-1"></span>
                        <span>Tất cả các trang</span></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" onclick="ajaxSaveProfileData('download')">Xuất file</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal export CSV -->