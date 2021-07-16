<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\MenuRecruitmentWidget;
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
                        <div class="main-colm my-3">
                            <div class="mb-3"><span>Quý khách đang sử dụng tài khoản</span><b class="ml-1 text-uppercase text-red">Miễn phí</b><span>.</span><span class="ml-1">Hiệu quả tuyển dụng thấp do bị hạn chế số lượng tin đăng - vị trí đăng tin kém nổi bật, khó tiếp cận Người tìm việc và bị giới hạn nhiều quyền lợi khác.</span>
                            </div>
                            <div><a class="btn btn-orange-46 font600 w-max-content" target="_blank" href="/bang-gia">Tìm
                                    hiểu và nâng cấp tài khoản &gt;&gt;</a></div>
                        </div>
                        <div class="main-colm">
                            <div class="title-nor">Thông tin tài khoản</div>
                            <?php if ($models) : ?>
                                <div class="accinfo-01">
                                    <div class="accinfo-01-box">
                                        <div class="accinfo-01-ttl">Thông tin đăng nhập</div>
                                        <div class="accinfo-01-txt"><span class="mr-1 float-left">Email đăng nhập:</span><span class="accinfo-01-txt-span "><?= $models->email ?></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="accinfo-01">
                                    <div class="accinfo-01-box false">
                                        <div class="accinfo-01-ttl">Mật khẩu</div>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-blue-46 btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_change_password">
                                            Thay đổi mật khẩu
                                        </button>
                                        <div class="modal fade" id="modal_change_password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalLabel">Thay đổi mật khẩu</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url() . '/UserRecruitment/change_password' ?>" method="POST" ">
                                                        <div class="">
                                                            <div>
                                                                <div class=" tabbox-01-group ex-eye-hide-pass "><label
                                                                            for="" class=" tabbox-01-group-lb"><span class="mr-1">Nhập mật khẩu hiện tại</span></label>
                                                            <div class="tabbox-01-group-input"><input type="password" class="form-control  " name="old_password"><i class="icon-x-red"></i></div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="tabbox-01-group ex-eye-hide-pass "><label for="" class="tabbox-01-group-lb"><span class="mr-1">Nhập mật khẩu mới</span></label>
                                                        <div class="tabbox-01-group-input"><input type="password" class="form-control  " name="password"><i class="icon-x-red"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-blue-46 btn btn-primary">
                                                    Thay
                                                    đổi mật khẩu
                                                </button>
                                            </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="accinfo-01">
                    <div class="accinfo-01-box">
                        <div class="accinfo-01-ttl">Cảnh bảo đăng nhập</div>
                        <div class="accinfo-01-txt">
                            <p>Mywork sẽ gửi email thông báo khi nhận thấy có
                                địa
                                chỉ IP, thiết bị lạ đăng nhập và sử dụng tài khoản của Quý khách.</p>
                            <div class="mt-2"><label class="radio-cus mr-3"><input type="radio" name="radio" value="1" checked=""><span class="checkmark mr-1"></span><span>Bật</span></label><label class="radio-cus"><input type="radio" name="radio" value="2"><span class="checkmark mr-1"></span><span>Tắt</span></label></div>
                        </div>
                    </div>
                </div>
                <div class="jsx-2246677448 personinf-01 false">
                    <div class="jsx-2246677448 title-nor mt30 m-mt0">Thông tin Cá nhân</div>
                    <figure class="personinf-01-fig"><img src="<?= $models->getImage() ?>" width="120" height="120" alt="avatar"></figure>
                    <div class="jsx-2246677448 personinf-01-info">
                        <div class="jsx-2246677448 personinf-01-name">
                            <?= $models->company_name ?>
                        </div>
                        <div class="jsx-2246677448 personinf-01-txt">
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Địa chỉ:</b><span class="jsx-2246677448 ml-1"><?= $models->company_address ? $models->company_address : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Tỉnh/Thành phố:</b><span class="jsx-2246677448 ml-1"><?= $models->province ? $models->province : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Quy mô công ty:</b><span class="jsx-2246677448 ml-1"><?= $models->scales ? $models->scales : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Lĩnh vực hoạt
                                    động:</b><span class="jsx-2246677448 ml-1">Chưa cập nhật</span>
                            <div class="jsx-2246677448"></div>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Điện thoại:</b><span class="jsx-2246677448 ml-1"><?= $models->company_phone ? $models->company_phone : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Website:</b><span class="jsx-2246677448 ml-1"><?= $models->company_website ? $models->company_website : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Giới thiệu:</b>
                            <div class="jsx-2246677448"><?= $models->intro ? $models->intro : 'Chưa cập nhật' ?>
                            </div>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Tên người liên
                                    hệ:</b><span class="jsx-2246677448 ml-1"><?= $models->contact_name ? $models->contact_name : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Email liên hệ:</b><span class="jsx-2246677448 ml-1"><?= $models->contact_email ? $models->contact_email : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Địa chỉ liên
                                    hệ:</b><span class="jsx-2246677448 ml-1"><?= $models->contact_address ? $models->contact_address : 'Chưa cập nhật' ?></span>
                            </p>
                            <p class="jsx-2246677448"><b class="jsx-2246677448">Điện thoại:</b><span class="jsx-2246677448 ml-1"><?= $models->contact_phone_number ? $models->contact_phone_number : 'Chưa cập nhật' ?></span>
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-blue-46 btn btn-primary btn-lg" data-toggle="modal" data-target="#change_user_information">
                        Thay đổi thông tin
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="change_user_information" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Thay đổi thông tin</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url() . '/nha-tuyen-dung/thay-doi-thong-tin' ?>" method="post" enctype="multipart/form-data">
                                        <div class="">
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb"><span class="mr-1">Ảnh đại diện</span><span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="jsx-1915949892 mt-3 "><label class="jsx-1915949892 btn btn-custom w200 align-middle m-0">Chọn
                                                            file ảnh
                                                            <input type="file" class="input-file" name="avt" />
                                                        </label><i class="jsx-1915949892 align-middle ml-3">(GPKD
                                                            định dạng doc,
                                                            docx,
                                                            pdf, dung lượng &lt;= 10MB)</i></div>
                                                </div>
                                                <figure class="personinf-01-fig"><img src="<?= $models->getImage() ?>" width="120" height="120" alt="avatar">
                                                </figure>

                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Tên công ty</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " name="company_name" disabled="" value="<?= $models->company_name ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Địa chỉ</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " name="company_address" value="<?= $models->company_address ? $models->company_address : '' ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Tỉnh/Thành phố</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" name="province" id="province" data-live-search="true">

                                                            <?php if ($province) : ?>
                                                                <?php foreach ($province as $prvc) : ?>
                                                                    </option>
                                                                    <?= $province_name = $models->province ?>
                                                                    <option value="<?= $prvc->_name ?>" <?php if ($prvc->_name == $province_name) {
                                                                                                            echo 'selected';
                                                                                                        } ?>> <?= $prvc->_name ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Quy mô công ty</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input mb-3">
                                                        <input type="text" class="form-control" disabled="" value="<?= $models->scales ?>"><i class="icon-x-red"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Lĩnh vực hoạt động</span>
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" name="fields[]" id="fields" data-live-search="true" multiple="multiple">
                                                            <?php if ($fields_operation && !empty($fields_operation)) : ?>
                                                                <?php foreach ($fields_operation as $n => $item) : ?>
                                                                    <optgroup label="<?= $item->title ?>">
                                                                        <?php if ($item->children) : ?>
                                                                            <?php foreach ($item->children as $child) : ?>
                                                                                <option value="<?= $child->id ?>">
                                                                                    <?= $child->title ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        <?php endif; ?>
                                                                    </optgroup>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="jsx-1217494624 fn-list-nganh-nghe nn-lst ">
                                                            <div class="jsx-1217494624 floatLeft w-100">
                                                                <?php if ($fields_rcm_info) : ?>
                                                                    <?php foreach ($fields_rcm_info as $fr_info) : ?>
                                                                        <div class="jsx-1217494624 fn-breaking-nganh nn-box mw-100 div_fields_upload_<?= $fr_info['id'] ?>">
                                                                            <span title="<?= $fr_info->title ?>" class="jsx-1217494624 title d-block"><?= $fr_info['title'] ?></span>
                                                                            </span>
                                                                            <a href="#" onclick="delete_insert_fields(<?= $fr_info['id'] ?>)" class="btn_delete_fields" data-url-post="<?= base_url() . '/UserRecruitment/delete_fields_product' ?>">X</a>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Điện thoại cố định</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " id="company_phone" name="company_phone" value="<?= $models->company_phone ? $models->company_phone : '' ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Sơ lược về công ty</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input"><textarea class="form-control  text-area" name="intro"> <?= $models->intro ? $models->intro : '' ?></textarea><i class="icon-x-red"></i><i class="icon-tick-green"></i></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Website</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " name="company_website" value="<?= $models->company_website ? $models->company_website : '' ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Tên người liên hệ</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " name="contact_name" value="<?= $models->contact_name ? $models->contact_name : '' ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Email liên hệ</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="email" class="form-control " name="contact_email" value="<?= $models->contact_email ? $models->contact_email : '' ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Địa chỉ liên hệ</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " name="contact_address" value="<?= $models->contact_address ? $models->contact_address : '' ?>">
                                                        <i class="icon-x-red"></i><i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Điện thoại</span>
                                                        <span class="tabbox-01-group-red mr-1">*</span>
                                                    </label>
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control " id="contact_phone_number" name="contact_phone_number" value="<?= $models->contact_phone_number ? $models->contact_phone_number : '' ?>">
                                                        <i class="icon-x-red"></i>
                                                        <i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="tabbox-01-group ">
                                                    <label for="" class="tabbox-01-group-lb">
                                                        <span class="mr-1">Hình thức liên hệ</span>
                                                    </label>
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control" name="contact_form" id="contact_form" data-live-search="true">
                                                            <?= $value = $models->contact_form ?>
                                                            <option value="Mọi hình thức" <?php
                                                                                            if ($value == 'Mọi hình thức') {
                                                                                                echo ' selected';
                                                                                            }
                                                                                            ?>>Mọi hình thức
                                                            </option>

                                                            <option value="Ưu tiên nạp hồ sơ trực tiếp" <?php
                                                                                                        if ($value == 'Ưu tiên nạp hồ sơ trực tiếp') {
                                                                                                            echo ' selected';
                                                                                                        }
                                                                                                        ?>>Ưu tiên nạp hồ sơ trực tiếp
                                                            </option>
                                                            <option value="Qua email" <?php
                                                                                        if ($value == 'Qua email') {
                                                                                            echo ' selected';
                                                                                        }
                                                                                        ?>>Qua email
                                                            </option>
                                                            <option value="Qua số điện thoại" <?php
                                                                                                if ($value == 'Qua số điện thoại') {
                                                                                                    echo ' selected';
                                                                                                }
                                                                                                ?>>Qua số điện thoại
                                                            </option>
                                                            <option value="Qua bưu điện" <?php
                                                                                            if ($value == 'Qua bưu điện') {
                                                                                                echo ' selected';
                                                                                            }
                                                                                            ?>>Qua bưu điện
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-blue-46 btn btn-primary">Thay đồi
                                                thông tin
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="jsx-1915949892 accinfo-01 mt-3">
                    <div class="jsx-1915949892 accinfo-01-box">
                        <div class="jsx-1915949892 title-nor  ">Giấy phép kinh doanh</div>
                        <div class="jsx-1915949892 accinfo-01-txt">
                            <div class="jsx-1915949892">Để chứng thực tài khoản của Quý khách trên
                                Mywork.com.vn, vui lòng đăng tải giấy phép đăng ký kinh doanh.
                            </div>
                            <div class="jsx-1915949892 py-3"><i class="jsx-1915949892 spr-icon-calen align-middle"></i><span class="jsx-1915949892 ml-1 text-main align-middle font500 cursor-pointer">Chi tiết giấy phép kinh doanh</span><span class="jsx-1915949892 ml-1 text-red align-middle">(Chờ duyệt)</span>
                            </div>
                            <div class="jsx-1915949892 mt-3 ">
                                <label class="jsx-1915949892 btn btn-custom w200 align-middle m-0 attack_file">Cập nhật GPKD
                                    <input type="file" class="input-file" id="GPKD" onchange="uploadGPKD()">
                                    </input>
                                </label>
                                <i class="jsx-1915949892 align-middle ml-3">(GPKD định dạng doc, docx, pdf, dung lượng &lt;= 10MB)</i>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>
        </div>
        </div>
        </div>
        </div>
    </section>
</article>