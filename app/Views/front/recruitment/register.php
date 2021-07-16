<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavLogin;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>
<?= FrontendNavLogin::register($this); ?>
<div class="container">
    <div class="row">
        <div class="wrapper-fill">
            <?php
            $message = SessionHelper::getInstance()->getFlash('REGISTER');
            if (!empty($message) && isset($message['type'])) {
                switch ($message['type']) {
                    case 'FRONT_ERROR':
                        echo Html::tag('div',
                            ArrayHelper::getValue($message, 'message', 'Kiểm tra lại thông tin nhập vào'),
                            ['class' => 'alert alert-danger']
                        );
                        break;
                    case 'FRONT_SUCCESS':
                        echo Html::tag('div',
                            ArrayHelper::getValue($message, 'message', 'Đăng ký thành công'),
                            ['class' => 'alert alert-success']
                        );
                        break;
                }
            } ?>
            <article>
                <div class="tabs-toggle">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="dang_ky" role="presentation" class="active">
                            <a style="text-align: center" href="#dangky" aria-controls="profile" role="tab"
                               data-toggle="tab">Đăng Ký</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active " id="dangky">
                            <div class="tabbox-01 tab-pane fade in active show">
                                <div class="tabbox-01-cont">
                                    <div class="tabbox-01-form">
                                        <div class="tabbox-01-ttl">Nhà tuyển dụng đăng ký</div>
                                        <div class="tabbox-01-block">
                                            <form action="<?= base_url() . '/UserRecruitment/add_register' ?>" id="form"
                                                  method="post" class="data-form-register form-hook" enctype="multipart/form-data">
                                                <div class="">
                                                    <div>
                                                        <div class="tabbox-01-subttl">Thông tin đăng nhập</div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb"><span
                                                                        class="mr-1">Email đăng nhập</span><span
                                                                        class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="email" class="form-control " name="email" required="nhập email đăng nhập">
                                                                <i class="icon-x-red"></i><i
                                                                        class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ex-eye-hide-pass ">
                                                            <label for="" class="tabbox-01-group-lb"><span
                                                                        class="mr-1">Mật khẩu</span><span
                                                                        class="tabbox-01-group-red">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="password" class="form-control mb-2 "
                                                                       name="password">
                                                                <div class="fs-14-mb fs-12 mb-3 font-italic"><b
                                                                            class="mr-1">Lưu ý:</b><span>Mật khẩu tối thiểu 8 ký tự, có ít nhất 1 ký tự chữ và 1 ký tự số.</span>
                                                                </div>
                                                                <i class="icon-x-red"></i></div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-subttl">Thông tin công ty</div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb">
                                                                <span class="mr-1">Tên công ty</span>
                                                                <span class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text" class="form-control " name="company_name">
                                                                <i class="icon-x-red"></i>
                                                                <i class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb"><span
                                                                        class="mr-1">Tỉnh/thành phố</span><span
                                                                        class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="form-group">
                                                                <select class="selectpicker form-control"
                                                                        name="province"
                                                                        id="province"
                                                                        data-live-search="true">
                                                                    <?php if ($province): ?>
                                                                        <?php foreach ($province as $prvc): ?>
                                                                            </option>

                                                                            <option value="<?= $prvc->_name ?>" > <?= $prvc->_name ?></option>
                                                                        <?php endforeach; ?>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb">
                                                                <span class="mr-1">Quy mô</span>
                                                                <span class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="form-group">
                                                                <select class="selectpicker form-control" name="scales"
                                                                        id="scales"
                                                                        data-live-search="true">
                                                                    <option value="">Chọn quy mô</option>

                                                                    <option value="Dưới 20 người">Dưới 20 người</option>
                                                                    <option value="20 - 150 người">20 - 150 người</option>
                                                                    <option value="150 - 300 người">150 - 300 người</option>
                                                                    <option value="Trên 300 người">Trên 300 người</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb"><span
                                                                        class="mr-1">Tên người liên hệ</span><span
                                                                        class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text" class="form-control " name="contact_name">
                                                                <i class="icon-x-red"></i><i class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb"><span
                                                                        class="mr-1">Email liên hệ</span><span
                                                                        class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="email" class="form-control "
                                                                       name="contact_email" required>
                                                                <i class="icon-x-red"></i><i
                                                                        class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for="" class="tabbox-01-group-lb"><span
                                                                        class="mr-1">Số điện thoại liên hệ</span><span
                                                                        class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text" class="form-control " required
                                                                       id="contact_phone_number" name="contact_phone_number" value="">
                                                                <i class="icon-x-red"></i><i
                                                                        class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
                                                <div class="">
                                                    <div class="fix-submit">
                                                        <button type="submit" class="btn btn-login">Tạo tài khoản
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class=""><p class="txt-bottom">Bằng việc nhấn nút Tạo tài khoản,
                                                        bạn đã đồng ý với<a class="txt-green underline italic mx-1"
                                                                            href="/quy-dinh-bao-mat">Quy định bảo
                                                            mật</a>&amp;<a class="txt-green underline italic mx-1"
                                                                           href="/thoa-thuan-su-dung">Thỏa thuận sử
                                                            dụng</a>của MyWork</p></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-770-center-txt"><p class="">Bạn đã có tài khoản?
                                        <a class="active mx-1" href="/nha-tuyen-dung/dang-nhap">Đăng nhập</a></p>
                                    <p><a class="hidden-xs" href="/dang-ky">Người tìm việc đăng ký</a></p></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-770-center-bottm px-3">
                    <span>Bạn đang gặp khó khăn? Vui lòng liên hệ hotline</span><span
                            class="box-770-center-bottm-num mx-1 text-speci-emp">(024) 710 88688 | (028) 710 88688</span><span> để được hỗ trợ.</span>
                </div>
            </article>
        </div>
    </div>
</div>
