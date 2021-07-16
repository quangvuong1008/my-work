<?php

use App\Helpers\Html;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\CategoryModel[] $items
 * @var \App\Models\ProjectCategoryModel[] $projects
 */
?>
<header>
    <nav class="navbar navbar-inverse  main-nav fix-main-nav navBarHeader ">
        <div class="container">
            <div class=navbar-header>
                <a href="/"><img class="visible-xs" src="<?php echo base_url('/images/' . $settings['home_logo_link']) ?> " alt=""></a>
                <button type="button" class="navbar-toggle" data-target="#nav" data-toggle="collapse" aria-expanded=false>
                    <span class=sr-only>Toggle navigation</span>
                    <span class=icon-bar></span>
                    <span class=icon-bar></span>
                    <span class=icon-bar></span>
                </button>
            </div>
            <div class="collapse navbar-collapse edit_potion_menu" id="nav">
                <div class="fix-menu-flex menu-01">
                    <ul class="nav navbar-nav lst-left">
                        <li class="d-pc"><a href="/"><img class="img_logo hidden-xs" src="<?php echo base_url('/images/' . $settings['home_logo_link']) ?> " alt="">
                            </a>
                        </li>
                        <li class="lst-color"><a href="/tuyen-dung">Việc làm</a></li>
                        <li class="lst-color"><a href="/cong-ty">Công ty</a></li>
                        <li class="lst-color"><a href="/trang-ca-nhan/tao-ho-so">Tạo CV</a></li>
                        <?php if ($model) : ?>
                            <li class="d-none">
                                <div class="box-left-menu">
                                    <div class="list-func list-sub dropdown-menu-cus">
                                        <a href="#" class="dropdown-item">
                                            <div class="user-info-menu">
                                                <figure class="user-menu-img">
                                                    <img alt="avatar" src="<?= $model->getImage() ?>" width="40" height="40">
                                                </figure>
                                                <div class="info-menu">
                                                    <span class="user-info-menu-greeting">Xin chào</span>
                                                    <span class="user-info-menu-name"><?= $model->fullname ?></span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item ex-ql-tk ex-active" href="/trang-ca-nhan/cap-nhat-thong-tin">
                                            <span class="title fs-15-mb">Quản lý tài khoản</span>
                                        </a>
                                        <a class="dropdown-item ex-qly-dvu " href="/trang-ca-nhan/quan-ly-ho-so">
                                            <span class="title fs-15-mb"> Quản lý hồ sơ</span>
                                        </a>
                                        <a class="dropdown-item ex-preview " href="/trang-ca-nhan/tao-ho-so">
                                            <span class="title fs-15-mb"> Tạo CV</span>
                                        </a>
                                        <a class="dropdown-item ex-gui-yc " href="/trang-ca-nhan/viec-lam-da-ung-tuyen">
                                            <span class="title fs-15-mb">Việc làm đã ứng tuyển</span>
                                        </a>
                                        <a class="dropdown-item ex-vl-dl " href="/trang-ca-nhan/viec-lam-da-luu">
                                            <span class="title fs-15-mb">Việc làm đã lưu</span>
                                        </a>
                                        <a class="dropdown-item ex-search " href="/trang-ca-nhan/theo-doi-nha-tuyen-dung">
                                            <span class="title fs-15-mb">Theo dõi nhà tuyển dụng</span>
                                        </a>
                                        <a class="dropdown-item ex-hs-ut " href="/trang-ca-nhan/viec-lam-phu-hop">
                                            <span class="title fs-15-mb">Việc làm phù hợp với bạn</span>
                                        </a>
                                        <a class="dropdown-item ex-tb-vl " href="/trang-ca-nhan/dang-ky-thong-bao-viec-lam-phu-hop">
                                            <span class="title fs-15-mb">Thông báo việc làm</span>
                                        </a>
                                        <a class="dropdown-item menu-item ex-ql-tn " href="/trang-ca-nhan/tin-nhan">
                                            <span class="title fs-15-mb">Quản lý tin nhắn</span>
                                        </a>
                                        <a class="dropdown-item ex-logout " href="/trang-ca-nhan/dang-xuat"><span class="title fs-15-mb">Đăng xuất</span></a>
                                    </div>
                                </div>
                            </li>
                        <?php else : ?>
                            <li class="lst-color d-none mt15"><a class="btn btn-pink-46 ex-register" href="/auth/register"><i class="fas fa-user-plus"></i>  Đăng ký</a></li>
                            <li class="lst-color d-none mt15"><a class="btn btn-blue-46 ex-login" href="/auth/login"><i class="fas fa-sign-in-alt"></i>  Đăng nhập</a></li>
                            <li class="lst-color d-none mt15"><a class="btn btn-white-o-46 ex-ntd-o" href="/nha-tuyen-dung/dang-nhap">Nhà tuyển dụng</a></li>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav navbar-nav lst-right d-mb">
                        <?php if ($model) : ?>
                            <li class="lst-right-li-a lst-color" style="margin-right: 20px"><a rel=nofollow href="/trang-ca-nhan/viec-lam-da-luu">Việc làm đă lưu</a></li>
                            <li class=" lst-right-li-a dropdown">

                                <a href="#" class="dropdown-toggle fix-user-menu-login" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <figure class="user-menu-img">
                                        <img alt="avatar" src="<?= $model->getImage() ?>" width="40" height="40">
                                    </figure>
                                    <span class="text-ellipsis w100"><?= $model->fullname ?></span>
                                    <span class="fix-caret caret"></span>
                                </a>
                                <ul class="dropdown-menu fix-dropdown-menu">
                                    <li>
                                        <div class="box-left-menu">
                                            <div class="list-func list-sub dropdown-menu-cus">
                                                <a class="dropdown-item ex-ql-tk ex-active" href="/trang-ca-nhan/cap-nhat-thong-tin">
                                                    <span class="title fs-15-mb">Quản lý tài khoản</span>
                                                </a>
                                                <a class="dropdown-item ex-qly-dvu " href="/trang-ca-nhan/quan-ly-ho-so">
                                                    <span class="title fs-15-mb"> Quản lý hồ sơ</span>
                                                </a>
                                                <a class="dropdown-item ex-preview " href="/trang-ca-nhan/tao-ho-so">
                                                    <span class="title fs-15-mb"> Tạo CV</span>
                                                </a>
                                                <a class="dropdown-item ex-gui-yc " href="/trang-ca-nhan/viec-lam-da-ung-tuyen">
                                                    <span class="title fs-15-mb">Việc làm đã ứng tuyển</span>
                                                </a>
                                                <a class="dropdown-item ex-vl-dl " href="/trang-ca-nhan/viec-lam-da-luu">
                                                    <span class="title fs-15-mb">Việc làm đã lưu</span>
                                                </a>
                                                <a class="dropdown-item ex-search " href="/trang-ca-nhan/theo-doi-nha-tuyen-dung">
                                                    <span class="title fs-15-mb">Theo dõi nhà tuyển dụng</span>
                                                </a>
                                                <a class="dropdown-item ex-hs-ut " href="/trang-ca-nhan/viec-lam-phu-hop">
                                                    <span class="title fs-15-mb">Việc làm phù hợp với bạn</span>
                                                </a>
                                                <a class="dropdown-item ex-tb-vl " href="/trang-ca-nhan/dang-ky-thong-bao-viec-lam-phu-hop">
                                                    <span class="title fs-15-mb">Thông báo việc làm</span>
                                                </a>
                                                <a class="dropdown-item menu-item ex-ql-tn " href="/trang-ca-nhan/tin-nhan">
                                                    <span class="title fs-15-mb">Quản lý tin nhắn</span>
                                                </a>
                                                <a class="dropdown-item ex-logout " href="/trang-ca-nhan/dang-xuat"><span class="title fs-15-mb">Đăng xuất</span></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="lst-right-li-a lst-color"><a rel=nofollow href="/nha-tuyen-dung/dang-nhap">Nhà tuyển dụng</a></li>

                        <?php else : ?>
                            <li class="lst-right-li-a lst-right-register lst-color"><a rel=nofollow href="/auth/register">Tạo tài khoản</a></li>
                            <li class="lst-right-li-a lst-right-login lst-color"><a rel=nofollow href="/auth/login ">Đăng nhập</a></li>
                            <li class="lst-right-li-a lst-color"><a rel=nofollow href="/nha-tuyen-dung/dang-nhap">Nhà tuyển dụng</a></li>
                        <?php endif; ?>

                    </ul>
                </div>

            </div>
        </div>

    </nav>
</header>