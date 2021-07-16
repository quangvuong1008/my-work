<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\FrontendNav;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\Widgets\SearchRecruitmentWidget;
use App\Helpers\Widgets\SearchJobWidget;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>
<?php
    $session = session();
    $user_id = $session->get(SESSION_USER_ID_KEY);
    $user_type = $session->get(SESSION_USER_TYPE_KEY);
    if($user_type == 'seeker'){
        echo FrontendNav::register($this);

    }else{
        echo FrontendNavTd::register($this);
        echo SearchRecruitmentWidget::register($this);
    }
?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
            <div class="main-colm">
                <div class="detail-01">
                    <div class="detail-01-ttl"><?= $model->title ?></div>
                    <?php
                    $user_rcm_id = $model->user_rcm_id;
                    $user_rcm_info = $model->user_recruitment_info($user_rcm_id);
                    $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                    ?>
                    <a class="detail-01-com d-none d-sm-block"
                       href=""><?= $user_rcm_info->company_name ?></a>
                    <div class="detail-01-date d-block d-sm-none">Mã: 20351555 | Lượt xem: 368<br>Ngày làm mới:
                        17/04/2021
                    </div>
                    <div class="">
                        <div class="cursor-pointer btn btn-pink-56 ex-submit d-block d-sm-none"><i
                                    class="far fa-paper-plane"></i> NỘP HỒ SƠ
                        </div>
                    </div>
                    <div class="row detail-01-row">
                        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 detail-01-left break-word" id="fn-col-left">
                            <div class="jsx-2246677448 detail-01-cnt">
                                <div class="jsx-2246677448 detail-01-table">
                                    <div class="jsx-2246677448 row detail-01-row-col">
                                        <div class="jsx-2246677448 col-12 col-sm-6 col-md-6 col-lg-6 detail-01-left detail-01-col">
                                            <div class="jsx-2246677448 detail-01-table-td ex-ml">
                                                <i class="fas fa-dollar-sign fix-icon-detail"></i>
                                                <label class="jsx-2246677448 detail-01-cnt-lb"> Mức lương:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->wage ?></div>
                                            </div>
                                            <div title="Hà Nội" class="jsx-2246677448 detail-01-table-td ex-addr">
                                                <i class="fas fa-map-marker-alt fix-icon-detail"></i>
                                                <label class="jsx-2246677448 detail-01-cnt-lb">Địa điểm:</label>
                                                <div class="jsx-2246677448 detail-01-info">
                                                    <a target="_blank" title="Hà Nội"
                                                       href="/tuyen-dung/dia-diem/73/ha-noi.html?province_ids[]=73"
                                                       class="jsx-2246677448 text-join text-main-important">Hà
                                                        Nội</a>
                                                </div>
                                            </div>
                                            <div class="jsx-2246677448 detail-01-table-td ex-cb">
                                                <i class="far fa-user fix-icon-detail"></i>
                                                <label class="jsx-2246677448 detail-01-cnt-lb">Cấp bậc:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->level ?></div>
                                            </div>
                                            <div class="jsx-2246677448 detail-01-table-td ex-ht">
                                                <i class="far fa-address-card fix-icon-detail"></i>
                                                <label
                                                        class="jsx-2246677448 detail-01-cnt-lb">Hình thức làm
                                                    việc:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->type_of_work ?></div>
                                            </div>
                                            <div class="jsx-2246677448 detail-01-table-td ex-sl">
                                                <i class="fas fa-user-friends fix-icon-detail"></i>
                                                <label class="jsx-2246677448 detail-01-cnt-lb">Số lượng cần
                                                    tuyển:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->number ?></div>
                                            </div>
                                        </div>
                                        <div class="jsx-2246677448 col-12 col-sm-6 col-md-6 col-lg-6 detail-01-right detail-01-col">
                                            <div class="jsx-2246677448 detail-01-table-td ex-han-nop">
                                                <i class="far fa-clock fix-icon-detail"></i>
                                                <label
                                                        class="jsx-2246677448 detail-01-cnt-lb">Hạn nộp hồ sơ:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?php echo date('d/m/Y', $model->the_deadline) ?></div>
                                            </div>
                                            <div title="IT phần mềm, Thiết kế đồ họa - Web, Thiết kế - Mỹ thuật"
                                                 class="jsx-2246677448 detail-01-table-td ex-nn">
                                                <i class="fas fa-align-left fix-icon-detail"></i>
                                                <label
                                                        class="jsx-2246677448 detail-01-cnt-lb mr-1">Ngành nghề:</label>
                                                <div class="jsx-2246677448 detail-01-info">
                                                    <a target="_blank" title="Thiết kế đồ họa - Web"
                                                       href="/tuyen-dung/219/thiet-ke-do-hoa-web.html?field_ids[]=219"
                                                       class="jsx-2246677448 text-join text-main-important"><?= $model->job_title() ?>
                                                        ,</a>
                                                    <a target="_blank" title="Thiết kế - Mỹ thuật"
                                                       href="/tuyen-dung/261/thiet-ke-my-thuat.html?field_ids[]=261"
                                                       class="jsx-2246677448 text-join text-main-important">Thiết
                                                        kế - Mỹ thuật</a>
                                                    <a target="_blank" title="IT phần mềm"
                                                       href="/tuyen-dung/218/it-phan-mem.html?field_ids[]=218"
                                                       class="jsx-2246677448 text-join text-main-important">IT
                                                        phần mềm</a>
                                                </div>
                                            </div>
                                            <div class="jsx-2246677448 detail-01-table-td ex-kn">
                                                <i class="fas fa-briefcase fix-icon-detail"></i>
                                                <label class="jsx-2246677448 detail-01-cnt-lb">Yêu cầu kinh
                                                    nghiệm:
                                                </label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->experience ?></div>
                                            </div>
                                            <div class="jsx-2246677448 detail-01-table-td ex-bc">
                                                <i class="fas fa-file-medical fix-icon-detail"></i>
                                                <label
                                                        class="jsx-2246677448 detail-01-cnt-lb">Yêu cầu bằng
                                                    cấp:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->degree ?></div>
                                            </div>
                                            <div class="jsx-2246677448 detail-01-table-td ex-gt">
                                                <i class="fas fa-transgender fix-icon-detail"></i>
                                                <label
                                                        class="jsx-2246677448 detail-01-cnt-lb">Yêu cầu giới
                                                    tính:</label>
                                                <div class="jsx-2246677448 detail-01-info"><?= $model->sex ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail-01-row-block">
                                <div class="detail-01-row-ttl">Mô tả công việc</div>
                                <div class="detail-01-row-cnt"><p><?= $model->intro ?></p>
                                </div>
                            </div>
                            <div class="detail-01-row-block">
                                <div class="detail-01-row-ttl">Quyền lợi được hưởng</div>
                                <div class="detail-01-row-cnt"><p><?= $model->interest ?></p></div>
                            </div>
                            <div class="detail-01-row-block">
                                <div class="detail-01-row-ttl">YÊU CẦU CÔNG VIỆC</div>
                                <div class="detail-01-row-cnt"><p><?= $model->job_requirements ?></p></div>
                            </div>
                            <div class="detail-01-row-block">
                                <div class="detail-01-row-ttl">YÊU CẦU HỒ SƠ</div>
                                <div class="detail-01-row-cnt"><p><?= $model->profile_requirement ?></p></div>
                            </div>
                            <div class="mt30">
                                <div class="cursor-pointer btn btn-pink-56 ex-submit"><i class="far fa-paper-plane"></i>
                                    NỘP HỒ SƠ
                                </div>
                            </div>
                            <div class="detail-01-row-btns container-fluid px-0">
                                <ul class="row">
                                    <li class="col-md-4 mb-1 order-md-last">
                                        <button class="btn btn-white-44 ex-icon-reply-b"><i
                                                    class="far fa-comment-dots"></i> Gửi tin nhắn
                                        </button>
                                    </li>
                                    <li class="col-6 col-md-4 mb-1">
                                        <button type="button" class="btn btn-white-44 px-1 ex-icon-like false"><i
                                                    class="far fa-heart" style="font-size: 18px;"></i> Lưu việc
                                            làm
                                        </button>
                                    </li>
                                    <li class="col-6 col-md-4 mb-1"><a
                                                href="https://www.facebook.com/sharer/sharer.php?u=https://mywork.com.vn/tuyen-dung/viec-lam/100061086/chuyen-vien-thiet-ke-do-hoa-da-phuong-tien.html?svs=mw.jobbox.trangchu_tuyengap"
                                                class="btn btn-white-44 ex-icon-share" target="_blank"><i
                                                    class="fas fa-share-alt"></i> Chia sẻ công việc</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 detail-01-right d-none d-sm-block">
                            <div class="detail-01-right-btns sticky-detail-0">
                                <div class="">
                                    <div class="cursor-pointer btn btn-pink-56 ex-submit"><i
                                                class="far fa-paper-plane"></i> NỘP HỒ SƠ
                                    </div>
                                </div>
                                <div class="mt15">
                                    <button type="button" class="btn btn-white-44 px-1 ex-icon-like false"><i
                                                class="far fa-heart" style="font-size: 18px;"></i> Lưu việc
                                        làm
                                    </button>
                                </div>
                                <div class="mt15">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://mywork.com.vn/tuyen-dung/viec-lam/100061086/chuyen-vien-thiet-ke-do-hoa-da-phuong-tien.html?svs=mw.jobbox.trangchu_tuyengap"
                                       class="btn btn-white-44 ex-icon-share" target="_blank"> <i
                                                class="fas fa-share-alt"></i> Chia sẻ công việc</a>
                                </div>
                                <div class="mt15">
                                    <div class="detail-01-right-com">
                                        <figure><img src="<?= $getUrl ?>" alt="logo"></figure>
                                        <div class="detail-01-right-link">
                                            <a title="<?= $user_rcm_info->company_name ?>"
                                               href="">Việc làm cùng công ty <i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="txc detail-01-right-com-txt mt15"> Mã: 20351555<br>Lượt xem: 368<br>Ngày
                                        làm mới: 17/04/2021
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="jsx-3495269652 contact-01">
                        <div class="jsx-3495269652 contact-01-ttl">THÔNG TIN LIÊN HỆ</div>
                        <div class="jsx-3495269652 contact-01-info">
                            <div class="jsx-3495269652 d-flex">
                                <div class="jsx-3495269652 w-40 w-max-content-pc"><b class="jsx-3495269652 mr-1 ">Người
                                        liên hệ:</b></div>
                                <div class="jsx-3495269652 w-60"><?= $model->contact_name ?></div>
                            </div>
                            <div class="jsx-3495269652 d-flex">
                                <div class="jsx-3495269652 w-40 w-max-content-pc"><b class="jsx-3495269652 mr-1 ">Địa
                                        chỉ email:</b></div>
                                <div class="jsx-3495269652 w-60"><?= $model->contact_email ?></div>
                            </div>
                            <div class="jsx-3495269652 d-flex-mb break-word"><span
                                        class="jsx-3495269652 w-40-mb w-max-content-pc"><b class="jsx-3495269652 mr-1">Địa chỉ công ty:</b></span><span
                                        class="jsx-3495269652 w-60-mb"><?= $model->contact_address ?></span>
                            </div>
                            <div class="jsx-3495269652 d-flex">
                                <div class="jsx-3495269652 w-40 w-max-content-pc"><b class="jsx-3495269652 mr-1">Hạn nộp
                                        hồ sơ:</b></div>
                                <div class="jsx-3495269652 w-60"><?php echo date('d/m/Y', $model->the_deadline) ?></div>
                            </div>
                            <div class="jsx-3495269652 d-flex">
                                <div class="jsx-3495269652 w-40 w-max-content-pc"><b class="jsx-3495269652 mr-1">Ngôn
                                        ngữ hồ sơ:</b></div>
                                <div class="jsx-3495269652 w-60"><?= $model->language ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="company-01">
                        <div class="company-01-row">
                            <figure class="company-01-fig"><img
                                        src="<?= $getUrl ?>"
                                        alt="logo"></figure>
                            <div class="company-01-info">
                                <a class="company-01-name" href="">
                                    <?= $user_rcm_info->company_name ?></a>
                                <p><b class="mr-1">Trụ sở:</b><?= $user_rcm_info->company_address ?></p>
                                <p><b class="mr-1">Quy mô công ty:
                                    </b><?= $user_rcm_info->scales ?></p>
                                <a class="company-01-more" href="">Xem
                                    chi tiết<span class="d-inline d-sm-none ml-1">Công ty</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fullbox-01 px-1 job-similar-list">
                <div class="fullbox-01-cont">
                    <div class="fullbox-01-ttl">Việc làm tương tự</div>
                    <div class="jobblock-01">
                        <div class="scroll-into-view"></div>
                        <ul class="row">
                            <?php if ($models): ?>
                                <?php foreach ($models as $md): ?>
                                    <?php
                                    $user_rcm_ids = $md->user_rcm_id;
                                    $user_rcm_infos = $md->user_recruitment_info($user_rcm_ids);
                                    $getUrls = base_url() . '/uploads/user_recruitment/' . $user_rcm_infos->avt;
                                    ?>
                                    <li class="col-12">
                                        <div class="jobblock-01-box">
                                            <div class="jobblock-01-row"><a
                                                        href="">
                                                    <figure><img src="<?= $getUrls ?>"
                                                                 alt="designer-executive"></figure>
                                                </a>
                                                <div class="jobblock-01-info d-flex box-job-similar">
                                                    <div class="jobblock-01-name">
                                                        <div class="jobblock-01-ttl text-ellipsis">
                                                            <a title="Designer Executive"
                                                               class="jobblock-01-ttl-pink text-ellipsis"
                                                               href="<?=$md->getUrl()?>">
                                                                <?=$md->title?>
                                                            </a></div>
                                                        <div class="jobblock-01-com">
                                                            <a class="text-ellipsis" title="<?=$user_rcm_infos->company_name?>" href="">
                                                                <?=$user_rcm_infos->company_name?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul class="row list-feat job-highlight pt-1 pt-md-4">
                                                        <li class="col-xs-6 col-md-6 ex-salary mt-0"><i
                                                                    class="fas fa-dollar-sign"></i> <?=$md->wage?>
                                                        </li>
                                                        <li class="col-xs-6 col-md-6 ex-date mt-0"><i
                                                                    class="far fa-clock"></i> <?php echo date('d/m/Y', $md->the_deadline)?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-1-ps d-none d-sm-block">
            <div class="right-boxes">
                <div class="jobsame-01 job-suggest">
                    <div class="jobsame-01-cap">Việc làm xem nhiều nhất</div>
                    <div class="jobsame-01-lst">
                        <ul class="jobsame-01-ul">
                            <li class="jobsame-01-li">
                                <div class="jobsame-01-box"><a class="jobsame-01-ttl"
                                                               href="/tuyen-dung/viec-lam/100062712/ha-noi-ky-su-xay-dung.html">[Hà
                                        Nội] Kỹ Sư Xây Dựng</a><a class="jobsame-01-com"
                                                                  href="/tuyen-dung/nha-tuyen-dung/20531026/cong-ty-cp-ebros-c-t-viet-nam.html">Công
                                        ty CP Ebros C&amp;T Việt Nam</a>
                                    <ul class="row jobsame-01-ft">
                                        <li class="col-12 col-xs-6 col-md-6">
                                            <div class="jobsame-01-info ex-ml"><i class="fas fa-dollar-sign"></i> 15-20
                                                triệu
                                            </div>
                                        </li>
                                        <li class="col-12 col-xs-6 col-md-6">
                                            <div class="jobsame-01-info ex-date"><i class="far fa-clock"></i> 29/04/2021
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
