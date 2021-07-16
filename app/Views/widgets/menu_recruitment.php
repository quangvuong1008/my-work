<div class="left-boxes">
    <div class="box-left-menu">
        <div class="list-func list-sub dropdown-menu-cus">
            <a class="dropdown-item ex-ql-tk ex-active" href="/nha-tuyen-dung/tai-khoan">
                <span class="title fs-15-mb">Quản lý tài khoản</span>
            </a>
<!--            <a class="dropdown-item ex-qly-dvu " href="/nha-tuyen-dung/lich-su-dich-vu">-->
<!--                <span class="title fs-15-mb"> Quản lý dịch vụ</span>-->
<!--            </a>-->
            <a class="dropdown-item ex-qly-tin " href="/nha-tuyen-dung/quan-ly-tin-dang">
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
<!--            <a class="dropdown-item ex-tb-vl " href="/nha-tuyen-dung/xem-thiet-lap-thong-tin-nhan-ho-so-bang-email">-->
<!--                <span class="title fs-15-mb">Thiết lập thông báo hồ sơ</span>-->
<!--            </a>-->

            <!-- <div class=" dropdown show">
                <a class="btn btn-secondary dropdown-toggle dropdown-item menu-item ex-ql-tn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="title">Quản lý tin nhắn</span>
                </a>

                <div class="dropdown-menu fix-dropdown-menu-messenger" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item " href="/nha-tuyen-dung/tin-nhan"><i class="far fa-circle fix-dropdown-item-messenger"></i> Hộp thư đến</a>
                    <a class="dropdown-item fix-dropdown-item-messenger" href="/nha-tuyen-dung/tin-nhan-da-gui"><i class="far fa-circle fix-dropdown-item-messenger"></i> Hộp thư đi</a>
                </div>
            </div> -->
            <button class="dropdown-btn dropdown-item">
                <a class="btn btn-secondary dropdown-toggle dropdown-item menu-item ex-ql-tn" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="title">Quản lý tin nhắn</span>
                </a>
            </button>
            <div class="dropdown-container">
                <a class="dropdown-item " href="/nha-tuyen-dung/tin-nhan"><i class="far fa-circle fix-dropdown-item-messenger"></i> Hộp thư đến</a>
                <a class="dropdown-item fix-dropdown-item-messenger" href="/nha-tuyen-dung/tin-nhan-da-gui"><i class="far fa-circle fix-dropdown-item-messenger"></i> Hộp thư đi</a>
            </div>
<!--            <a class="dropdown-item ex-gui-yc " href="/nha-tuyen-dung/gui-yeu-cau-den-ban-quan-tri"><span class="title fs-15-mb">Gửi yêu cầu</span></a>-->
        </div>
    </div>
    <div class="jobsame-01 mt30 m-mt10">
        <div class="jobsame-01-cap text-main-important">CHUYÊN VIÊN QUẢN LÝ TÀI KHOẢN</div>
        <?php if ($models) : ?>
            <div class="txc user-box p10-20">
                <figure class="user-box-fig mt15">
                    <img src="<?= $models->getImage() ?>" width="120" height="120">

                </figure>
                <div class="user-box-name mt25 bold"></div>
                <div class="user-box-info mt10">
                    <p class="text-ellipsis" >
                        <b>Email: </b><?= $models->contact_email ?>
                    </p>
                    <p><b>Hotline: </b><?= $models->contact_phone_number ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>