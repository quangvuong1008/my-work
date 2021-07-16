<?php

use App\Helpers\Widgets\FrontendNav;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\NewsRightBoxWidget;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */

$this->title = $title;
$this->meta_image_url = $meta_image_url;
$home_list_block_id = explode(',', $settings['home_list_block_id']);
?>
<?php if (!empty($user_type) &&  $user_type !== 'seeker') : ?>
    <?= FrontendNavTd::register($this); ?>
<?php else : ?>
    <?= FrontendNav::register($this); ?>
<?php endif; ?>
<form action="/tuyen-dung/">
    <div class="full-white-01">
        <div class="search-01-row row container pb-3">
            <div class="div-input">
                <?php $selected = '';
                if ($search_param['q']) {
                    $selected = $search_param['q'];
                } ?>
                <input type="text" class="form-control" name="q" value="<?php echo $selected; ?>" placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc...">
            </div>
            <div class="div-sl-tk ex-sl-nn">

                <select class="selectpicker form-control" name="job_id" id="job_id" data-live-search="true">
                    <option value="" <?php if (!$search_param['job_id']) echo 'selected' ?>>Tất cả ngành nghề</option>
                    <?php
                    if ($list_job) {
                        foreach ($list_job as $job) {
                            $selected = '';
                            if ($search_param['job_id']) {
                                if ($job->id == $search_param['job_id']) {
                                    $selected = 'selected';
                                }
                            }

                            echo ' <option value="' . $job->id . '"  ' . $selected . '>' . $job->title . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="div-sl-tk ex-sl-tt">

                <select class="selectpicker form-control" name="province_id" id="province_id" data-live-search="true">
                    <option value="" <?php if (!$search_param['province_id']) echo 'selected' ?>>Tất cả nơi làm việc
                    </option>
                    <?php
                    if ($list_province) {
                        foreach ($list_province as $province) {
                            $selected = '';
                            if ($search_param['province_id']) {
                                if ($province->id == $search_param['province_id']) {
                                    $selected = 'selected';
                                }
                            }

                            echo ' <option value="' . $province->id . '" ' . $selected . '>' . $province->_name . '</option>';
                        }
                    }
                    ?>

                </select>
            </div>
            <div class="div-btn text-center">
                <button type="submit" class="btn btn-search mb-2">Tìm việc</button>
                <a class="pt-3 fs-14" href="/viec-lam/tim-kiem-nang-cao"><i class="icon-zoom_in text-speci fs-24 align-middle"></i><span class="text-speci font600">Tìm kiếm nâng cao</span></a>
            </div>
        </div>
    </div>
</form>
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
<article>
    <section class="new-homepage">
        <div class="main-2-cols  mt30 m-mt0 m-mb0">
            <div class="container">
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                    <div class="main-colm">
                        <div class="detail-01">
                            <div class="detail-01-ttl"><?= $model->title ?></div>
                            <?php
                            $user_rcm_id = $model->user_rcm_id;
                            $user_rcm_info = $model->user_recruitment_info($user_rcm_id);
                            $getUrl = base_url() . '/uploads/user_recruitment/' . $user_rcm_info->avt;
                            ?>
                            <a class="detail-01-com d-none d-sm-block" href=""><?= $user_rcm_info->company_name ?></a>
                            <div class="detail-01-date d-block d-sm-none">Mã: 20351555 | Lượt xem: 369<br>Ngày làm mới:
                                17/04/2021
                            </div>
                            <div class="">
                                <a class="cursor-pointer btn btn-pink-56 ex-submit d-block d-sm-none"><i class="far fa-paper-plane"></i> NỘP HỒ SƠ
                                </a>
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
                                                            <a target="_blank" title="Hà Nội" href="/tuyen-dung/dia-diem/73/ha-noi.html?province_ids[]=73" class="jsx-2246677448 text-join text-main-important">Hà
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
                                                        <label class="jsx-2246677448 detail-01-cnt-lb">Hình thức làm
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
                                                        <label class="jsx-2246677448 detail-01-cnt-lb">Hạn nộp hồ sơ:</label>
                                                        <div class="jsx-2246677448 detail-01-info"><?php echo date('d/m/Y', $model->the_deadline) ?></div>
                                                    </div>
                                                    <div title="IT phần mềm, Thiết kế đồ họa - Web, Thiết kế - Mỹ thuật" class="jsx-2246677448 detail-01-table-td ex-nn">
                                                        <i class="fas fa-align-left fix-icon-detail"></i>
                                                        <label class="jsx-2246677448 detail-01-cnt-lb mr-1">Ngành nghề:</label>
                                                        <div class="jsx-2246677448 detail-01-info">
                                                            <a target="_blank" title="Thiết kế đồ họa - Web" href="/tuyen-dung/219/thiet-ke-do-hoa-web.html?field_ids[]=219" class="jsx-2246677448 text-join text-main-important"><?= $model->job_title() ?>
                                                                ,</a>
                                                            <a target="_blank" title="Thiết kế - Mỹ thuật" href="/tuyen-dung/261/thiet-ke-my-thuat.html?field_ids[]=261" class="jsx-2246677448 text-join text-main-important">Thiết
                                                                kế - Mỹ thuật</a>
                                                            <a target="_blank" title="IT phần mềm" href="/tuyen-dung/218/it-phan-mem.html?field_ids[]=218" class="jsx-2246677448 text-join text-main-important">IT
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
                                                        <label class="jsx-2246677448 detail-01-cnt-lb">Yêu cầu bằng
                                                            cấp:</label>
                                                        <div class="jsx-2246677448 detail-01-info"><?= $model->degree ?></div>
                                                    </div>
                                                    <div class="jsx-2246677448 detail-01-table-td ex-gt">
                                                        <i class="fas fa-transgender fix-icon-detail"></i>
                                                        <label class="jsx-2246677448 detail-01-cnt-lb">Yêu cầu giới
                                                            tính:</label>
                                                        <div class="jsx-2246677448 detail-01-info"><?= $model->sex ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-01-row-block">
                                        <div class="detail-01-row-ttl">Mô tả công việc</div>
                                        <div class="detail-01-row-cnt">
                                            <p><?= $model->intro ?></p>
                                        </div>
                                    </div>
                                    <div class="detail-01-row-block">
                                        <div class="detail-01-row-ttl">Quyền lợi được hưởng</div>
                                        <div class="detail-01-row-cnt">
                                            <p><?= $model->interest ?></p>
                                        </div>
                                    </div>
                                    <div class="detail-01-row-block">
                                        <div class="detail-01-row-ttl">YÊU CẦU CÔNG VIỆC</div>
                                        <div class="detail-01-row-cnt">
                                            <p><?= $model->job_requirements ?></p>
                                        </div>
                                    </div>
                                    <div class="detail-01-row-block">
                                        <div class="detail-01-row-ttl">YÊU CẦU HỒ SƠ</div>
                                        <div class="detail-01-row-cnt">
                                            <p><?= $model->profile_requirement ?></p>
                                        </div>
                                    </div>
                                    <div class="mt30">
                                        <a href="/UserSeeker/do_apply_job/<?php echo $model->id; ?>" class="cursor-pointer btn btn-pink-56 ex-submit" href=""><i class="far fa-paper-plane"></i>
                                            NỘP HỒ SƠ
                                        </a>
                                    </div>
                                    <div class="detail-01-row-btns container-fluid px-0">
                                        <ul class="row">
                                            <li class="col-md-4 mb-1 order-md-last">
                                                <?php if ($user_type == 'seeker') : ?>
                                                    <button class="btn btn-white-44 ex-icon-reply-b" onclick="showModalSendMessAtCandidateDetail('<?= $user_type ?>')"><i class="far fa-comment-dots"></i> Gửi tin nhắn
                                                    </button>
                                                <?php else : ?>
                                                    <button class="btn btn-white-44 ex-icon-reply-b" onclick="moveToLoginSeeker()"><i class="far fa-comment-dots"></i> Gửi tin nhắn
                                                    </button>
                                                <?php endif; ?>
                                            </li>
                                            <li class="col-6 col-md-4 mb-1">
                                                <?php if ($user_type == 'seeker') : ?>
                                                    <a onclick="save_news_recruitment('<?php echo $model->id; ?>','<?= $user_type ?>');" type="button" class="btn btn-white-44 px-1 ex-icon-like false"><i class="far fa-heart" style="font-size: 18px;"></i> Lưu việc
                                                        làm
                                                    </a>
                                                <?php else : ?>
                                                    <a onclick="moveToLoginSeeker()" type="button" class="btn btn-white-44 px-1 ex-icon-like false"><i class="far fa-heart" style="font-size: 18px;"></i> Lưu việc
                                                        làm
                                                    </a>
                                                <?php endif; ?>
                                            </li>
                                            <li class="col-6 col-md-4 mb-1"><a href="https://www.facebook.com/sharer/sharer.php?u=https://mywork.com.vn/tuyen-dung/viec-lam/100061086/chuyen-vien-thiet-ke-do-hoa-da-phuong-tien.html?svs=mw.jobbox.trangchu_tuyengap" class="btn btn-white-44 ex-icon-share" target="_blank"><i class="fas fa-share-alt"></i> Chia sẻ công việc</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 detail-01-right d-none d-sm-block">
                                    <div class="detail-01-right-btns sticky-detail-0">
                                        <div class="">
                                            <a class="cursor-pointer btn btn-pink-56 ex-submit" href="/UserSeeker/do_apply_job/<?php echo $model->id; ?>"><i class="far fa-paper-plane"></i> NỘP HỒ SƠ
                                            </a>
                                        </div>
                                        <div class="mt15">
                                            <?php if ($user_type == 'seeker') : ?>
                                                <a onclick="save_news_recruitment('<?php echo $model->id; ?>','<?= $user_type ?>');" type="button" class="btn btn-white-44 px-1 ex-icon-like false"><i class="far fa-heart" style="font-size: 18px;"></i> Lưu việc
                                                    làm
                                                </a>
                                            <?php else : ?>
                                                <a onclick="moveToLoginSeeker()" type="button" class="btn btn-white-44 px-1 ex-icon-like false"><i class="far fa-heart" style="font-size: 18px;"></i> Lưu việc
                                                    làm
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mt15">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://mywork.com.vn/tuyen-dung/viec-lam/100061086/chuyen-vien-thiet-ke-do-hoa-da-phuong-tien.html?svs=mw.jobbox.trangchu_tuyengap" class="btn btn-white-44 ex-icon-share" target="_blank"> <i class="fas fa-share-alt"></i> Chia sẻ công việc</a>
                                        </div>
                                        <div class="mt15">
                                            <div class="detail-01-right-com">
                                                <figure><img src="<?= $getUrl ?>" alt="logo"></figure>
                                                <div class="detail-01-right-link">
                                                    <a title="<?= $user_rcm_info->company_name ?>" href="">Việc làm cùng công ty <i class="fas fa-arrow-right"></i></a>
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
                                    <div class="jsx-3495269652 d-flex-mb break-word"><span class="jsx-3495269652 w-40-mb w-max-content-pc"><b class="jsx-3495269652 mr-1">Địa chỉ công ty:</b></span><span class="jsx-3495269652 w-60-mb"><?= $model->contact_address ?></span>
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
                                    <figure class="company-01-fig"><img src="<?= $getUrl ?>" alt="logo"></figure>
                                    <div class="company-01-info">
                                        <a class="company-01-name" href="">
                                            <?= $user_rcm_info->company_name ?></a>
                                        <p><b class="mr-1">Trụ sở:</b><?= $user_rcm_info->company_address ?></p>
                                        <p><b class="mr-1">Quy mô công ty:
                                            </b><?= $user_rcm_info->scales ?></p>
                                        <a class="company-01-more" href="">Xem
                                            chi tiết<span class="d-inline d-sm-none ml-1">Công ty</span></a>
                                    </div>
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
                                    <?php if ($models) : ?>
                                        <?php foreach ($models as $md) : ?>
                                            <?php
                                            $user_rcm_ids = $md->user_rcm_id;
                                            $user_rcm_infos = $md->user_recruitment_info($user_rcm_ids);
                                            $getUrls = base_url() . '/uploads/user_recruitment/' . $user_rcm_infos->avt;
                                            ?>
                                            <li class="col-12">
                                                <div class="jobblock-01-box">
                                                    <div class="jobblock-01-row"><a href="">
                                                            <figure><img src="<?= $getUrls ?>" alt="designer-executive"></figure>
                                                        </a>
                                                        <div class="jobblock-01-info d-flex box-job-similar">
                                                            <div class="jobblock-01-name">
                                                                <div class="jobblock-01-ttl text-ellipsis">
                                                                    <a title="Designer Executive" class="jobblock-01-ttl-pink text-ellipsis" href="<?= $md->getUrl() ?>">
                                                                        <?= $md->title ?>
                                                                    </a>
                                                                </div>
                                                                <div class="jobblock-01-com">
                                                                    <a class="text-ellipsis" title="<?= $user_rcm_infos->company_name ?>" href="">
                                                                        <?= $user_rcm_infos->company_name ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <ul class="row list-feat job-highlight pt-1 pt-md-4">
                                                                <li class="col-xs-6 col-md-6 ex-salary mt-0"><i class="fas fa-dollar-sign"></i> <?= $md->wage ?>
                                                                </li>
                                                                <li class="col-xs-6 col-md-6 ex-date mt-0"><i class="far fa-clock"></i> <?php echo date('d/m/Y', $md->the_deadline) ?>
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
                    <?= NewsRightBoxWidget::register($this); ?>
                    <!--            <div class="right-boxes">-->
                    <!--                <div class="jobsame-01 job-suggest">-->
                    <!--                    <div class="jobsame-01-cap">Việc làm xem nhiều nhất</div>-->
                    <!--                    <div class="jobsame-01-lst">-->
                    <!--                        <ul class="jobsame-01-ul">-->
                    <!--                            <li class="jobsame-01-li">-->
                    <!--                                <div class="jobsame-01-box"><a class="jobsame-01-ttl" href="/tuyen-dung/viec-lam/100062712/ha-noi-ky-su-xay-dung.html">[Hà-->
                    <!--                                        Nội] Kỹ Sư Xây Dựng</a><a class="jobsame-01-com" href="/tuyen-dung/nha-tuyen-dung/20531026/cong-ty-cp-ebros-c-t-viet-nam.html">Công-->
                    <!--                                        ty CP Ebros C&amp;T Việt Nam</a>-->
                    <!--                                    <ul class="row jobsame-01-ft">-->
                    <!--                                        <li class="col-12 col-xs-6 col-md-6">-->
                    <!--                                            <div class="jobsame-01-info ex-ml"><i class="fas fa-dollar-sign"></i> 15-20-->
                    <!--                                                triệu-->
                    <!--                                            </div>-->
                    <!--                                        </li>-->
                    <!--                                        <li class="col-12 col-xs-6 col-md-6">-->
                    <!--                                            <div class="jobsame-01-info ex-date"><i class="far fa-clock"></i> 29/04/2021-->
                    <!--                                            </div>-->
                    <!--                                        </li>-->
                    <!--                                    </ul>-->
                    <!--                                </div>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </div>-->
                    <!--                </div>-->
                    <!--            </div>-->
                </div>
            </div>
        </div>
    </section>
</article>

<!-- modal send message -->
<div class="modal fade" id="modalSendMess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 5%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 style="font-size: 15px; font-weight: 700;" id="header_send_mess">Gửi tin nhắn cho <?= $user_rcm_info->company_name ?></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="tabbox-01-group "><label for="" class="tabbox-01-group-lb"><span class="mr-1">Tiêu đề</span><span class="tabbox-01-group-red mr-1">*</span></label>
                        <div class="tabbox-01-group-input"><input type="text" class="form-control " name="title_mess" id="title_mess" required><i class="icon-x-red"></i><i class="icon-tick-green"></i></div>
                        <div class="create-cnt-row-right"></div>
                    </div>
                </div>
                <div>
                    <div class="tabbox-01-group "><label for="" class="tabbox-01-group-lb"><span class="mr-1">Nội dung</span><span class="tabbox-01-group-red mr-1">*</span></label>
                        <div class="tabbox-01-group-input"><textarea class="form-control  text-area" name="content_mess" id="content_mess" required></textarea><i class="icon-x-red"></i><i class="icon-tick-green"></i></div>
                        <div class="create-cnt-row-right"></div>
                    </div>
                </div>
                <div><input type="hidden" name="receiver_id" id="receiver_id" value="<?= $user_rcm_info->id ?>"></div>
                <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-orange-46 w-auto-40 font17" style="width: 100%;" onclick="ajaxSendMessToRecruitment()">Gửi tin nhắn</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal send message -->