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
    <?php
    $message = SessionHelper::getInstance()->getFlash('REGISTER');
    if (!empty($message) && isset($message['type'])) {
        switch ($message['type']) {
            case 'FRONT_ERROR_LOGIN':
                echo Html::tag('div',
                    ArrayHelper::getValue($message, 'message', 'Tài khoản mật khẩu không đúng hoặc chưa được xác nhận'),
                    ['class' => 'alert alert-danger']
                );
                break;
        }
    } ?>
    <div class="row">

        <div class="wrapper-fill">
            <article>
                <div class="tabs-toggle">
                    <ul class="nav nav-tabs" role="tablist">
                        <li id="dang_nhap" role="presentation" class="active">
                            <a style="text-align: center" href="#dangnhap" aria-controls="home" role="tab"
                               data-toggle="tab">Đăng Nhập</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="dangnhap">
                            <div class="tabbox-01 tab-pane fade in active show">
                                <div class="tabbox-01-cont">
                                    <div class="tabbox-01-form">
                                        <div class="tabbox-01-ttl">Người tìm việc đăng nhập</div>
                                        <div class="tabbox-01-block">
                                            <form  action="<?= base_url().'/UserSeeker/user_login'?>" method="post" class="form-hook">
                                                <div class="">
                                                    <div>
                                                        <div class="tabbox-01-group ">
                                                            <label for=""
                                                                   class="tabbox-01-group-lb"><span
                                                                    class="mr-1">Email</span><span
                                                                    class="tabbox-01-group-red mr-1">*</span>
                                                            </label>
                                                            <div class="tabbox-01-group-input">
                                                                <input type="email" class="form-control " name="email" required>
                                                                <i class="icon-x-red"></i><i class="icon-tick-green"></i>
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
                                                                <input type="password" class="form-control  "
                                                                       name="password" required>
                                                                <i class="icon-eye-hide-pass"></i><i
                                                                    class="icon-x-red"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <div class="fix-submit">
                                                        <button type="submit" class="btn btn-login">Đăng nhập</button>
                                                    </div>
                                                </div>
                                                <div class=""><p class="txt-bottom"><a
                                                            class="txt-green underline italic fs-15"
                                                            href="/nha-tuyen-dung/quen-mat-khau"><b>Quên mật
                                                                khẩu?</b></a></p></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-770-center-txt">
                                    <p class=""> Bạn chưa có tài khoản?
                                        <a class="active mx-1"
                                           href="/nha-tuyen-dung/dang-ky">Tạo
                                            tài khoản</a></p>
                                    <p><a class="hidden-xs" href="/nha-tuyen-dung/dang-nhap">Nhà tuyển dụng đăng nhập</a></p></div>
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
