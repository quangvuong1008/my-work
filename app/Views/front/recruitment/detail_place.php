<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\ArrayHelper;
use App\Helpers\StringHelper;
use App\Helpers\SessionHelper;
use App\Helpers\Widgets\SearchRecruitmentWidget;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>

<?= FrontendNavTd::register($this); ?>
<?= SearchRecruitmentWidget::register($this); ?>

<div class="wrapper-fill">
    <article>
        <section id="main-content" class="new-homepage">
            <div class="map-links container">
                <ul itemtype="https://schema.org/BreadcrumbList" itemscope="">
                    <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item"
                                                                                                         class="active"
                                                                                                         href="/"><span
                                itemprop="name">Việc làm</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item"
                                                                                                         class="active"
                                                                                                         href="/tuyen-dung"><span
                                itemprop="name">Tuyển dụng</span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li aria-current="page"><a>Việc làm Bảo hiểm/ Tư vấn bảo hiểm, tuyển dụng Bảo hiểm/ Tư vấn bảo
                            hiểm</a></li>
                </ul>
            </div>
            <div class="main-2-cols">
                <div class="container">
                    <div class="">
                        <div class="row">
                            <div class="d-filter-header col-12 col-sm-3 col-md-3 col-lg-3 col-1-ps">
                                <div class="left-boxes">
                                    <div class="left-boxes-white">
                                        <div class="left-boxes-ttl">Mức lương<i class="icon-arrow-up"></i></div>
                                        <div class="collapse show">
                                            <div class="tabbox-01-group">
                                                <div class="tabbox-01-group-input"><span
                                                        class="select2-container w-100 select2-container--default false "><span
                                                            class="select2-selection select2-selection--single"><span
                                                                class="select2-selection__rendered"><span
                                                                    class="select2-selection__placeholder">Tất cả mức lương</span></span><span
                                                                class="select2-selection__arrow"
                                                                role="presentation"><b
                                                                    role="presentation"></b></span></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left-boxes-white">
                                        <div class="left-boxes-ttl d-flex justify-content-between align-items-center">
                                            <span>Tỉnh thành</span></div>
                                        <div id="collapsCareer" class="collapse show">
                                            <div class="lst-checkbox">
                                                <ul>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="73"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hà Nội</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="122"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            TP.HCM</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="129"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            An Giang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="121"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bà Rịa - Vũng Tàu</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="76"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bắc Cạn</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="87"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bắc Giang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="134"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bạc Liêu</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="90"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bắc Ninh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="125"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bến Tre</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="119"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bình Dương</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="117"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bình Phước</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="111"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bình Thuận</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="107"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bình Định</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="135"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Cà Mau</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="131"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Cần Thơ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="75"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Cao Bằng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="113"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Gia Lai</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="74"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hà Giang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="95"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hà Nam</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="100"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hà Tĩnh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="91"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hải Dương</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="92"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hải Phòng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="132"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hậu Giang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="83"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hòa Bình</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="93"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hưng Yên</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="109"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Khánh Hòa</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="130"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kiên Giang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="112"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kon Tum</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="80"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Lai Châu</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="116"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Lâm Đồng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="85"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Lạng Sơn</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="78"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Lào Cai</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="123"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Long An</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="96"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nam Định</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="99"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nghệ An</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="97"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Ninh Bình</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="110"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Ninh Thuận</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="140"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nước ngoài</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="88"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Phú Thọ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="108"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Phú Yên</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="101"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quảng Bình</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="105"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quảng Nam</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="106"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quảng Ngãi</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="86"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quảng Ninh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="102"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quảng Trị</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="133"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Sóc Trăng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="81"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Sơn La</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="118"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tây Ninh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="94"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thái Bình</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="84"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thái Nguyên</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="98"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thanh Hóa</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="103"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thừa Thiên Huế</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="124"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tiền Giang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="136"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Toàn quốc</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="126"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Trà Vinh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="77"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tuyên Quang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="127"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Vĩnh Long</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="89"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Vĩnh Phúc</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="82"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Yên Bái</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="104"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Đà Nẵng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="114"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Đắk Lắk</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="115"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Đắk Nông</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="79"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Điện Biên</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="120"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Đồng Nai</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="128"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Đồng Tháp</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left-boxes-white">
                                        <div class="left-boxes-ttl d-flex justify-content-between align-items-center">
                                            <span>Ngành nghề</span><span class="cursor-pointer text-main font400 fs-14"><i>Bỏ lọc (1)</i></span>
                                        </div>
                                        <div id="collapsCareer" class="collapse show">
                                            <div class="lst-checkbox">
                                                <ul>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="181"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Chứng khoán - Vàng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="182"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tài chính - Tiền tệ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey checked"><input
                                                                    name="183" type="checkbox" class="icheck"
                                                                    checked="">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bảo hiểm/ Tư vấn bảo hiểm</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="184"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Đầu tư</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="185"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bất động sản</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="186"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kế toán - Kiểm toán</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="187"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Ngân hàng/ Tài Chính</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="188"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Xây dựng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="189"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kiến trúc - Thiết kế nội thất</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="191"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Khách sạn - Du lịch</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="192"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Du lịch</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="193"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Khách sạn - Nhà hàng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="194"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Sản xuất</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="195"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Công nghệ cao</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="196"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Công nghiệp</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="197"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Dệt may - Da giày</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="198"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            In ấn - Xuất bản</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="199"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Lao động phổ thông</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="200"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nông - Lâm - Ngư nghiệp</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="201"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Ô tô - Xe máy</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="202"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thủ công mỹ nghệ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="203"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Vật tư/Thiết bị/Mua hàng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="204"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Làm thêm</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="205"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Làm bán thời gian</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="206"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nhân viên trông quán internet</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="207"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Promotion Girl/ Boy (PG-PB)</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="208"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Sinh viên làm thêm</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="209"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thực tập</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="210"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kinh doanh - Thương mại</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="211"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bán hàng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="212"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nhân viên kinh doanh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="213"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quản trị kinh doanh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="214"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Xuất - Nhập khẩu</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="215"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Công nghệ thông tin</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="216"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Games</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="217"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            IT phần cứng/mạng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="218"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            IT phần mềm</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="219"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thiết kế đồ họa - Web</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="220"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thương mại điện tử</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="221"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Truyền thông - PR</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="222"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Biên tập/ Báo chí/ Truyền hình</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="223"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Marketing - PR</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="224"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tiếp thị - Quảng cáo</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="225"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tổ chức sự kiện - Quà tặng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="226"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Viễn thông</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="227"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bưu chính</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="228"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Điện tử viễn thông</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="229"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hàng tiêu dùng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="230"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hàng gia dụng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="231"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Mỹ phẩm - Trang sức</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="232"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thời trang</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="233"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thực phẩm - Đồ uống</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="234"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Dịch vụ - Hỗ trợ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="235"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bảo vệ/ An ninh/ Vệ sỹ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="236"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Phiên dịch/ Ngoại ngữ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="237"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Dịch vụ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="238"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Giáo dục - Đào tạo</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="239"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hàng hải</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="240"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hàng không</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="241"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Người giúp việc/ Phục vụ/ Tạp vụ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="242"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Pháp luật/ Pháp lý</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="243"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tư vấn/ Chăm sóc khách hàng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="244"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Vận tải - Lái xe/ Tài xế</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="245"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Y tế - Dược</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="246"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kỹ thuật - Công nghệ</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="247"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Cơ khí - Chế tạo</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="248"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Dầu khí - Hóa chất</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="249"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Điện - Điện tử - Điện lạnh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="250"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hóa học - Sinh học</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="251"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kỹ thuật</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="252"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Kỹ thuật ứng dụng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="253"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hành chính - Nhân sự</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="254"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hành chính - Văn phòng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="255"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nhân sự</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="256"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thư ký - Trợ lý</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="257"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Ngành nghề khác</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="258"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Hoạch định - Dự án</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="260"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nghệ thuật/ Điện ảnh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="261"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thiết kế - Mỹ thuật</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="262"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Quan hệ đối ngoại</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="263"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Xuất khẩu lao động</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="265"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Startup</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="266"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Freelance</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="267"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tính chất công việc</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="268"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            QA-QC/ Thẩm định/ Giám định</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="269"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Môi trường</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="270"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Phi chính phủ/ Phi lợi nhuận</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="271"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Lương cao</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="272"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Việc làm cấp cao</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="273"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Việc làm Tết</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="274"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Công chức / Viên chức</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="275"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Phát triển thị trường</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="276"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Giao nhận/ Vận chuyển/ Kho bãi</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="277"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Làm đẹp/ Thể lực/ Spa</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="278"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thể dục/ Thể thao</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="279"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Vận tải</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="280"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nghệ thuật/ Giải trí</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left-boxes-white">
                                        <div class="left-boxes-ttl d-flex justify-content-between align-items-center">
                                            <span>Cấp bậc</span></div>
                                        <div id="collapsCareer" class="collapse show">
                                            <div class="lst-checkbox">
                                                <ul>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="1"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Mới tốt nghiệp / Thực tập sinh</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="2"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Nhân viên</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="3"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Trưởng nhóm</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="4"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Trưởng phòng</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="5"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Phó giám đốc</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="6"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Giám đốc</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="7"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Tổng giám đốc điều hành</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="8"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Khác</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="left-boxes-white">
                                        <div class="left-boxes-ttl d-flex justify-content-between align-items-center">
                                            <span>Loại hình công việc</span></div>
                                        <div id="collapsCareer" class="collapse show">
                                            <div class="lst-checkbox">
                                                <ul>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="1"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Toàn thời gian cố định</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="2"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Toàn thời gian tạm thời</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="3"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bán thời gian cố định</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="4"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Bán thời gian tạm thời</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="5"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Theo hợp đồng tư vấn</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="6"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Thực tập</label></li>
                                                    <li><label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey "><input name="7"
                                                                                                        type="checkbox"
                                                                                                        class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            Khác</label></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-3-ps m-pl0 m-pr0">
                                <div class="main-colm mb-3">
                                    <div class="ttl-big-blue">Tìm thấy đang tuyển dụng</div>
                                    <?php if ($rcm_place): ?>
                                        <?php foreach ($rcm_place as $place): ?>
                                            <?php $user_rcm_id = $place->user_rcm_id;
                                            $user_rcm_info = $place->user_recruitment_info($user_rcm_id);
                                            $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                                            $getHref = base_url('/tuyen-dung/nha-tuyen-dung/' . $user_rcm_info->id . '/' . StringHelper::rewrite($user_rcm_info->company_name));
                                            ?>
                                            <div class="jobslist-01 row">
                                                <div class="jobslist-01-cont ex-job-04 w-100">
                                                    <ul class="jobslist-01-ul">
                                                        <li class="jobslist-01-li">
                                                            <div class="jobslist-01-row fix-jobslist-01-row">
                                                                <div class="jobslist-01-row-left">
                                                                    <div class="jobslist-01-row-ttl"><a
                                                                            title="<?= $place->title ?>"
                                                                            href="<?= $place->getUrl() ?>"><span
                                                                                class="align-middle"><?= $place->title ?></span></a>
                                                                    </div>
                                                                    <div class="jobslist-01-row-com"><a
                                                                            title="<?= $user_rcm_info->company_name ?>"
                                                                            href="<?= $getHref ?>"><?= $user_rcm_info->company_name ?></a>
                                                                    </div>
                                                                    <ul class="list-feat row">
                                                                        <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-salary">
                                                                            Lương:<span
                                                                                class="ml-1"><?= $place->wage ?></span>
                                                                        </li>
                                                                        <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-address"
                                                                            title="Hà Nội, Bắc Giang, Bắc Ninh">Địa
                                                                            điểm:<span
                                                                                class="ml-1">Hà Nội, Bắc Giang, Bắc Ninh</span>
                                                                        </li>
                                                                        <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-date d-pc">
                                                                            Hạn nộp:<span class="ml-1"><?php echo date('d/m/Y', $place->the_deadline) ?></span>
                                                                        </li>
                                                                        <li class="col-12 col-sm-6 col-md-6 col-lg-6 ex-experi d-pc">
                                                                            Kinh nghiệm: <?= $place->experience ?>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="jobslist-01-row-right fix-jobslist-01-row-right">
                                                                    <a
                                                                        class="jobslist-01-row-logo"
                                                                        href="<?= $getHref ?>">
                                                                        <figure><img alt="img"
                                                                                     src="<?= $getUrl ?>">
                                                                        </figure>
                                                                    </a>
                                                                    <button class="btn btn-save-job fn-save-job ">Lưu
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>