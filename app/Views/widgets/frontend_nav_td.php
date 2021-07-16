<?php

use App\Helpers\Html;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\CategoryModel[] $items
 * @var \App\Models\ProjectCategoryModel[] $projects
 */
?>
<header>
    <nav class="navbar navbar-inverse main-nav fix-main-nav navBarHeader ">
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
                        <li><a href="/"><img class="img_logo hidden-xs" src="<?php echo base_url('/images/' . $settings['home_logo_link']) ?> " alt="">
                            </a>
                        </li>
                        <li><a href="/nha-tuyen-dung/trang-chu">Trang chủ</a></li>
                        <li><a href="/nha-tuyen-dung/dang-tin">Đăng tin tuyển dụng</a></li>
                        <li><a href="/nha-tuyen-dung/ung-vien">Lọc hồ sơ</a></li>
                        <?php if ($models) : ?>
                            <li class="d-none">
                                <div class="box-left-menu">
                                    <div class="list-func list-sub dropdown-menu-cus">
                                        <a href="#" class="dropdown-item">
                                            <div class="user-info-menu">
                                                <figure class="user-menu-img">
                                                    <img alt="avatar" src="<?= $models->getImage() ?>" width="40" height="40">
                                                </figure>
                                                <div class="info-menu">
                                                    <span class="user-info-menu-greeting">Xin chào</span>
                                                    <span class="user-info-menu-name"><?= $models->company_name ?></span>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item ex-ql-tk ex-active" href="/nha-tuyen-dung/tai-khoan">
                                            <span class="title fs-15-mb">Quản lý tài khoản</span>
                                        </a><a class="dropdown-item ex-qly-dvu " href="/nha-tuyen-dung/lich-su-dich-vu">
                                            <span class="title fs-15-mb"> Quản lý dịch vụ</span>
                                        </a><a class="dropdown-item ex-qly-tin " href="/nha-tuyen-dung/quan-ly-tin-dang">
                                            <span class="title fs-15-mb"> Quản lý tin tuyển dụng</span>
                                        </a><a class="dropdown-item ex-search " href="/nha-tuyen-dung/ung-vien">
                                            <span class="title fs-15-mb">Tìm kiếm ứng viên</span>
                                        </a><a class="dropdown-item ex-vl-dl " href="/nha-tuyen-dung/ho-so-da-luu">
                                            <span class="title fs-15-mb">Hồ sơ đã lưu</span>
                                        </a><a class="dropdown-item ex-preview " href="/nha-tuyen-dung/ho-so-da-xem">
                                            <span class="title fs-15-mb">Hồ sơ đã xem</span>
                                        </a><a class="dropdown-item ex-hs-ut " href="/nha-tuyen-dung/ho-so-da-ung-tuyen">
                                            <span class="title fs-15-mb">Hồ sơ đã ứng tuyển</span>
                                        </a>
                                        <!--<a class="dropdown-item ex-tb-vl " href="/nha-tuyen-dung/xem-thiet-lap-thong-tin-nhan-ho-so-bang-email">
                                            <span class="title fs-15-mb">Thiết lập thông báo hồ sơ</span>
                                        </a>-->
                                        <div>
                                            <a href="/nha-tuyen-dung/tin-nhan" class="dropdown-item menu-item ex-ql-tn">
                                                <span class="title fs-15-mb">Quản lý tin nhắn
                                                </span>
                                            </a>
                                        </div>
<!--                                        <a class="dropdown-item ex-gui-yc " href="/nha-tuyen-dung/gui-yeu-cau-den-ban-quan-tri"><span class="title fs-15-mb">Gửi yêu cầu</span></a>-->
                                        <a class="dropdown-item ex-logout " href="/nha-tuyen-dung/dang-xuat"><span class="title fs-15-mb">Đăng xuất</span></a>
                                    </div>
                                </div>


                            </li>
                        <?php endif; ?>
                    </ul>
                    <ul class="nav navbar-nav lst-right d-mb">
                        <?php if ($models) : ?>
                            <li class=" lst-right-li-a dropdown">

                                <a href="#" class="dropdown-toggle fix-user-menu-login" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <figure class="user-menu-img">
                                        <img alt="avatar" src="<?= $models->getImage() ?>" width="40" height="40">
                                    </figure>
                                    <span class="text-ellipsis w100"><?= $models->company_name ?></span>
                                    <span class="fix-caret caret"></span>
                                </a>
                                <ul class="dropdown-menu fix-dropdown-menu">
                                    <li>
                                        <div class="box-left-menu">
                                            <div class="list-func list-sub dropdown-menu-cus">
                                                <a class="dropdown-item ex-ql-tk ex-active" href="/nha-tuyen-dung/tai-khoan">
                                                    <span class="title fs-15-mb">Quản lý tài khoản</span>
                                                </a><a class="dropdown-item ex-qly-dvu " href="/nha-tuyen-dung/lich-su-dich-vu">
                                                    <span class="title fs-15-mb"> Quản lý dịch vụ</span>
                                                </a><a class="dropdown-item ex-qly-tin " href="/nha-tuyen-dung/quan-ly-tin-dang">
                                                    <span class="title fs-15-mb"> Quản lý tin tuyển dụng</span>
                                                </a><a class="dropdown-item ex-search " href="/nha-tuyen-dung/ung-vien">
                                                    <span class="title fs-15-mb">Tìm kiếm ứng viên</span>
                                                </a><a class="dropdown-item ex-vl-dl " href="/nha-tuyen-dung/ho-so-da-luu">
                                                    <span class="title fs-15-mb">Hồ sơ đã lưu</span>
                                                </a><a class="dropdown-item ex-preview " href="/nha-tuyen-dung/ho-so-da-xem">
                                                    <span class="title fs-15-mb">Hồ sơ đã xem</span>
                                                </a><a class="dropdown-item ex-hs-ut " href="/nha-tuyen-dung/ho-so-da-ung-tuyen">
                                                    <span class="title fs-15-mb">Hồ sơ đã ứng tuyển</span>
                                                </a><a class="dropdown-item ex-tb-vl " href="/nha-tuyen-dung/xem-thiet-lap-thong-tin-nhan-ho-so-bang-email">
                                                    <span class="title fs-15-mb">Thiết lập thông báo hồ sơ</span>
                                                </a>
                                                <div>
                                                    <a href="/nha-tuyen-dung/tin-nhan" class="dropdown-item menu-item ex-ql-tn">
                                                        <span class="title fs-15-mb">Quản lý tin nhắn
                                                        </span>
                                                    </a>
                                                </div>
                                                <a class="dropdown-item ex-gui-yc " href="/nha-tuyen-dung/gui-yeu-cau-den-ban-quan-tri"><span class="title fs-15-mb">Gửi yêu cầu</span></a>
                                                <a class="dropdown-item ex-logout " href="/nha-tuyen-dung/dang-xuat"><span class="title fs-15-mb">Đăng xuất</span></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="lst-right-li-a"><a rel=nofollow href="/dang-nhap">Ứng viên</a></li>

                        <?php else : ?>
                            <li class="lst-right-li-a lst-right-register lst-color"><a rel="nofollow" href="/auth/register">Tạo tài khoản</a></li>
                            <li class="lst-right-li-a lst-right-login lst-color"><a rel="nofollow" href="/auth/login ">Đăng nhập</a></li>
                            <li class="lst-right-li-a lst-color"><a rel="nofollow" href="/dang-nhap">Ứng viên</a></li>
                        <?php endif; ?>

                    </ul>
                </div>

            </div>
        </div>

    </nav>
</header>