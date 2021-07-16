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

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                        <div class="main-colm m-pb20">
                            <div class="scroll-into-view"></div>
                            <div class="fs-24 fs-20-mb font600 mb-3">Thiết lập thông báo hồ sơ</div>
                            <a class="btn btn-orange-46 font400 mb-3 w-auto"
                               href="/nha-tuyen-dung/thiet-lap-thong-tin-nhan-ho-so-bang-email"><i
                                        class="icon-ic-plus mr-2 align-middle"></i><span
                                        class="align-middle">Đăng ký</span></a>
                            <div class="jsx-366590114 item-marketing py-3">
                                <div class="jsx-366590114 font15">
                                    <ul class="jsx-366590114 row lst-ft-dky">
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114 d-inline-block mr-1">Email
                                                nhận thông báo:</b><span class="jsx-366590114 text-speci font600">denguyen.pav@gmail.com</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Trạng thái:</b><span
                                                    class="jsx-366590114 ml-1 text-speci font600">Đã xác thực</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Tần suất thông
                                                báo:</b><span class="jsx-366590114 ml-1">Hằng ngày</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Vị trí:</b><span
                                                    class="jsx-366590114 ml-1">Nhân Viên Content Marketing Online - Hóc Môn</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Ngành
                                                nghề: </b><span class="jsx-366590114 ml-1">IT phần cứng/mạng</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Địa điểm:</b><span
                                                    class="jsx-366590114 ml-1">TP.HCM</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Giới tính:</b><span
                                                    class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Trình độ học
                                                vấn:</b><span class="jsx-366590114 ml-1">Trung cấp</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Kinh
                                                nghiệm:</b><span class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Mức lương:</b><span
                                                    class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                    </ul>
                                </div>
                                <div class="jsx-366590114 form-row">
                                    <div class="jsx-366590114 col-6 col-md-3 mt10"><a
                                                class="jsx-366590114 btn btn-blue-46 ex-edit p30 font400 w-100"
                                                href="/nha-tuyen-dung/cap-nhat-ho-so-phu-hop.html?id=20023961"><i class="far fa-edit"></i> Chỉnh
                                            sửa</a></div>
                                    <div class="jsx-366590114 col-6 col-md-2 mt10">
                                        <button class="jsx-366590114 btn btn-blue-46 ex-dele p30 font400 w-100"><i class="far fa-trash-alt"></i> Xóa
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="jsx-366590114 item-marketing py-3">
                                <div class="jsx-366590114 font15">
                                    <ul class="jsx-366590114 row lst-ft-dky">
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114 d-inline-block mr-1">Email
                                                nhận thông báo:</b><span class="jsx-366590114 text-speci font600">denguyen.pav@gmail.com</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Trạng thái:</b><span
                                                    class="jsx-366590114 ml-1 text-speci font600">Đã xác thực</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Tần suất thông
                                                báo:</b><span class="jsx-366590114 ml-1">Hằng ngày</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Vị trí:</b><span
                                                    class="jsx-366590114 ml-1">Nhân Viên SEO Website</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Ngành
                                                nghề: </b><span class="jsx-366590114 ml-1">Biên tập/ Báo chí/ Truyền hình</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Địa điểm:</b><span
                                                    class="jsx-366590114 ml-1">TP.HCM</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Giới tính:</b><span
                                                    class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Trình độ học
                                                vấn:</b><span class="jsx-366590114 ml-1">Trung cấp</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Kinh
                                                nghiệm:</b><span class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Mức lương:</b><span
                                                    class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                    </ul>
                                </div>
                                <div class="jsx-366590114 form-row">
                                    <div class="jsx-366590114 col-6 col-md-3 mt10"><a
                                                class="jsx-366590114 btn btn-blue-46 ex-edit p30 font400 w-100"
                                                href="/nha-tuyen-dung/cap-nhat-ho-so-phu-hop.html?id=20010279"><i class="far fa-edit"></i> Chỉnh
                                            sửa</a></div>
                                    <div class="jsx-366590114 col-6 col-md-2 mt10">
                                        <button class="jsx-366590114 btn btn-blue-46 ex-dele p30 font400 w-100"><i class="far fa-trash-alt"></i> Xóa
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="jsx-366590114 item-marketing py-3">
                                <div class="jsx-366590114 font15">
                                    <ul class="jsx-366590114 row lst-ft-dky">
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114 d-inline-block mr-1">Email
                                                nhận thông báo:</b><span class="jsx-366590114 text-speci font600">denguyen.pav@gmail.com</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Trạng thái:</b><span
                                                    class="jsx-366590114 ml-1 text-speci font600">Đã xác thực</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Tần suất thông
                                                báo:</b><span class="jsx-366590114 ml-1">Hằng ngày</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Vị trí:</b><span
                                                    class="jsx-366590114 ml-1">Nhân Viên Content Marketing Online</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Ngành
                                                nghề: </b><span class="jsx-366590114 ml-1">Biên tập/ Báo chí/ Truyền hình</span>
                                        </li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Địa điểm:</b><span
                                                    class="jsx-366590114 ml-1">TP.HCM</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Giới tính:</b><span
                                                    class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Trình độ học
                                                vấn:</b><span class="jsx-366590114 ml-1">Trung cấp</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Kinh
                                                nghiệm:</b><span class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                        <li class="jsx-366590114 col-md-6"><b class="jsx-366590114">Mức lương:</b><span
                                                    class="jsx-366590114 ml-1">Chưa cập nhật</span></li>
                                    </ul>
                                </div>
                                <div class="jsx-366590114 form-row">
                                    <div class="jsx-366590114 col-6 col-md-3 mt10"><a
                                                class="jsx-366590114 btn btn-blue-46 ex-edit p30 font400 w-100"
                                                href="/nha-tuyen-dung/cap-nhat-ho-so-phu-hop.html?id=20010278"><i class="far fa-edit"></i> Chỉnh
                                            sửa</a></div>
                                    <div class="jsx-366590114 col-6 col-md-2 mt10">
                                        <button class="jsx-366590114 btn btn-blue-46 ex-dele p30 font400 w-100"><i class="far fa-trash-alt"></i> Xóa
                                        </button>
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
