<?php

use App\Helpers\Html;
use App\Helpers\Widgets\MenuRecruitmentWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\SearchRecruitmentWidget;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\Widgets\NewsRightBoxWidget;

$this->title = $title;
$this->meta_image_url = $meta_image_url;
$home_list_block_id = explode(',', $settings['home_list_block_id']);
?>
<?= FrontendNavTd::register($this); ?>
<?= SearchRecruitmentWidget::register($this); ?>
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
<div class="wrapper-fill">
    <article>
        <section class="new-homepage">
            <div class="map-links container">
                <ul itemtype="https://schema.org/BreadcrumbList" itemscope="">
                    <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item" class="active" href="/nha-tuyen-dung"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item" class="active" href="/nha-tuyen-dung/ung-vien"><span itemprop="name">Danh sách ứng viên</span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li aria-current="page"><a><?= $userProfile->job_title() ?></a></li>
                </ul>
            </div>

            <div class="main-2-cols">

                <div class="container">
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
                    <div class="main-colm">
                        <div class="detail-01">
                            <div class="row detail-01-row mt30 ex-reverse-col m-mt0">
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class=" detail-01-ttl bold m-mt20"><?= $userProfile->job_title() ?></div>
                                    <div class="">
                                        <ul class=" list-feat row m-mb15 lst-in-preview">
                                            <li class=" ex-seen-big mr30 m-m0">
                                                <div style="display: flex;flex-wrap: wrap;">
                                                    <div>
                                                        <i class="far fa-eye" style="font-size: 13px; color: #616161;"></i>
                                                        Lượt xem: <?= $userProfile->views ?>
                                                    </div>
                                                    <div style="margin-left: 40px;">
                                                        <i class="fa fa-undo" style="font-size: 13px;color: #616161"></i>
                                                        Làm mới: <?php echo date('d-m-Y', $userProfile->salary_date) ?>
                                                    </div>

                                                </div>

                                            </li>
                                        </ul>
                                        <div class=" clearfix"></div>
                                    </div>
                                    <div class=" detail-01-row-btns m-mt10">
                                        <ul class=" row list-actions">
                                            <li class=" col col-sm-3 col-md-3 col-lg-3">
                                                <?php if ($userRecruitment->get_user_profile_saved($userProfile->user_id, $user_recr_id)) : ?>
                                                    <button id="favourite" class="btn btn-white-44 ex-icon-like false" onclick="ajaxDeleteFavourite('<?= $user_type ?>', '<?= $userProfile->user_id ?>', '<?= $user_recr_id ?>')">
                                                        <i class="fa fa-heart" style="font-size: 18px;color:#6282ae;"></i>
                                                        Lưu hồ sơ
                                                    </button>
                                                    <button id="not_favourite" class=" btn btn-white-44 ex-icon-like false" style="display: none;" onclick="showDialogSaveCandidated('<?= $user_type ?>')">
                                                        <i class="far fa-heart" style="font-size: 18px;"></i>
                                                        Lưu hồ sơ
                                                    </button>
                                                <?php else : ?>
                                                    <button id="favourite" class="btn btn-white-44 ex-icon-like false" style="display: none;" onclick="ajaxDeleteFavourite('<?= $user_type ?>', '<?= $userProfile->user_id ?>', '<?= $user_recr_id ?>')">
                                                        <i class="fa fa-heart" style="font-size: 18px;color:#6282ae;"></i>
                                                        Lưu hồ sơ
                                                    </button>
                                                    <button id="not_favourite" class=" btn btn-white-44 ex-icon-like false" onclick="showDialogSaveCandidated('<?= $user_type ?>')">
                                                        <i class="far fa-heart" style="font-size: 18px;"></i>
                                                        Lưu hồ sơ
                                                    </button>
                                                <?php endif; ?>
                                            </li>
<!--                                            <li class=" col-xs-12 col-sm-3 col-md-3 col-lg-3 d-none d-sm-block">-->
<!--                                                <button class=" btn btn-white-44 ex-icon-print">-->
<!--                                                    <i class=" fa fa-print" style="font-size: 20px;"></i>-->
<!--                                                    Lưu PDF-->
<!--                                                </button>-->
<!--                                            </li>-->
                                            <li class=" col-xs-12 col-sm-3 col-md-3 col-lg-3 d-none d-sm-block">
                                                <button class=" btn btn-white-44 ex-icon-print" onclick="showModalSendMessAtCandidateDetail('<?= $user_type ?>')">
                                                    <i class="far fa-comment-dots" style="font-size: 20px;"></i>
                                                    Gửi tin nhắn
                                                </button>
                                            </li>
<!--                                            <li class=" col-xs-12 col-sm-3 col-md-3 col-lg-3 d-none d-sm-block">-->
<!--                                                <button class=" btn btn-white-44 ex-icon-print">-->
<!--                                                    <i class=" fa fa-edit" style="font-size: 20px;"></i>-->
<!--                                                    Yêu cầu bảo hành-->
<!--                                                </button>-->
<!--                                            </li>-->
                                        </ul>
                                    </div>
                                    <div class=" detail-01-cnt mt30">
                                        <div class=" detail-01-table">
                                            <div class=" row detail-01-row-col">
                                                <div class=" col-12 col-sm-6 col-md-6 col-lg-6 detail-01-left detail-01-col">
                                                    <div class=" detail-01-table-td ex-kn">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="fas fa-briefcase" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">CẤP BẬC:</label>
                                                        <div class=" detail-01-info">
                                                            <?= $position_wanted[$userProfile->position_wanted_id] ?>
                                                        </div>
                                                    </div>
                                                    <div class=" detail-01-table-td ex-experience">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="fa fa-signal" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">Kinh nghiệm:</label>
                                                        <div class=" detail-01-info">
                                                            <?= $userProfile->experience ?>
                                                        </div>
                                                    </div>
                                                    <div class=" detail-01-table-td ex-bc">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="fa fa-file-o" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">Trình độ học vấn:</label>
                                                        <div class=" detail-01-info"><?= $education_level[$userProfile->edu_level] ?></div>
                                                    </div>
                                                    <div class=" detail-01-table-td ex-ht">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="far fa-address-card" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">Hình thức làm việc:</label>
                                                        <div class=" detail-01-info"><?= $job_type[$userProfile->job_type] ?></div>
                                                    </div>
                                                </div>
                                                <div class=" col-12 col-sm-6 col-md-6 col-lg-6 detail-01-right detail-01-col">
                                                    <div class=" detail-01-table-td ex-addr">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="fas fa-map-marker-alt" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">Địa điểm mong muốn:</label>
                                                        <div class=" detail-01-info"><a target="_blank" href="/ung-vien/dia-diem/107/binh-dinh.html?order_resume=1&amp;province_ids[]=107" class=" text-join text-blue-bright"><?= $userProfile->getProvince() ?></a></div>
                                                    </div>
                                                    <div class=" detail-01-table-td ex-nn">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="fa fa-align-left" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">Ngành nghề mong muốn:</label>
                                                        <div class=" detail-01-info"><a target="_blank" href="/ung-vien/236/phien-dich-ngoai-ngu.html?field_ids[]=236&amp;order_resume=1" class=" text-join text-blue-bright"><?= $userProfile->job_title() ?></a><a target="_blank" href="/ung-vien/254/hanh-chinh-van-phong.html?field_ids[]=254&amp;order_resume=1" class=" text-join text-blue-bright">Hành chính - Văn phòng</a></div>
                                                    </div>
                                                    <div class=" detail-01-table-td ex-ml ex-border">
                                                        <div style="position: absolute;top: 10px;left: 0;">
                                                            <i class="fa fa-usd" style="font-size:25px;color: #616161"></i>
                                                        </div>
                                                        <label class=" detail-01-cnt-lb">Mức lương mong muốn:</label>
                                                        <div class=" detail-01-info"><?= $userProfile->salary ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt30 d-pc">
                                    <div class="d-mb mt30"></div>
                                    <div class="detail-01-row-attach">
                                        <div class="detail-01-row-attach-ttl text-uppercase">Hồ sơ đính kèm</div>
                                    </div>
                                    <div class="mt25">
                                        <p>Hồ sơ của ứng viên là file pdf đính kèm. Tính năng xem hồ sơ được đính kèm chỉ dành cho nhà tuyển dụng Lọc hồ sơ. Vui lòng tham gia<a class="text-main" target="_blank" rel="noreferrer" href="/bang-gia/bang-gia-dich-vu"><b class="mx-1">Chương trình lọc hồ sơ</b></a>để xem hồ sơ ứng tuyển.</p>
                                    </div>
                                </div>
                                <div class="jsx-1710786971 col-xs-12 col-sm-4 col-md-4 col-lg-4 ex-bor-bott">
                                    <div class="jsx-1710786971 jobsame-01">
                                        <div class="jsx-1710786971 jobsame-01-cap">
                                            <div class="jsx-1710786971 txc user-box">
                                                <figure class="jsx-1710786971 user-box-fig mt15 m-mt10"><img src="<?= $userProfile->getAvt() ?>" width="120" height="120" alt="avatar" class="jsx-1710786971"></figure>
                                                <div class="jsx-1710786971 user-box-name mt25"><?= $userProfile->full_name ?></div>
                                                <div class="jsx-1710786971 user-box-info mt20 text-left">
                                                    <p class="jsx-1710786971"><b class="jsx-1710786971">Ngày sinh:</b>
                                                        <span class="jsx-1710786971 ml-1">
                                                            <?php echo $userProfile->birthday;  ?>
                                                        </span>
                                                    </p>
                                                    <p class="jsx-1710786971"><b class="jsx-1710786971">Giới tính:</b><span class="jsx-1710786971 ml-1"><?= $userProfile->gender === 'male' ? 'Nam' : 'Nữ' ?></span></p>
                                                    <p class="jsx-1710786971"><b class="jsx-1710786971">Hôn nhân:</b><span class="jsx-1710786971 ml-1"><?= $userProfile->married ?></span></p>
                                                    <p class="jsx-1710786971"><b class="jsx-1710786971">Địa chỉ:</b><span class="jsx-1710786971 ml-1"><?= '22 Thành Công - Ba Đình - Hà Nội' ?></span></p>
                                                    <p class="jsx-1710786971 p-3 bg-no-filter"><span class="jsx-1710786971">Nhà tuyển dụng vui lòng tham gia</span><a href="/nha-tuyen-dung/ung-vien" target="_blank" class="jsx-1710786971 mx-1 text-main font500">Gói lọc hồ sơ</a><span class="jsx-1710786971">để xem thông tin ứng viên.</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 10px"></div>
                                    <?= NewsRightBoxWidget::register($this); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
</div>
<div class="modal fade" id="modalSaveCandidate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-black font600 fs-20" id="exampleModalLabel">Lưu hồ sơ ứng viên</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <a class="text-unset cursor-pointer" onclick="showAddCategory()">
                        <span class="text-main align-middle">
                            <i class="fas fa-plus"></i>
                            Thêm
                        </span>
                    </a>
                </div>
                <div class="form-group">
                    <label for="cat_id" class="col-form-label">Chọn danh mục</label>
                    <select class="form-control" name="cat_id" id="cat_id">
                        <option selected value="null">Chọn danh mục</option>
                        <?php if (!empty($category)) : ?>
                            <?php foreach ($category as $cat) : ?>
                                <option value="<?= $cat->id ?>"><?= $cat->category ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Ghi chú</label>
                    <textarea class="form-control" id="note" name="note"></textarea>
                </div>
                <input type="hidden" id="user_profile_id" name="user_profile_id" value="<?= $userProfile->id ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal">Trở lại</button>
                <button type="submit" onclick="ajaxInsertFavourite()" class="btn btn-orange-46 w-auto-40 font17">Cập nhật</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url() . '/UserRecruitment/add_user_meta_data' ?>" method="post">
                <div class="modal-header">
                    <h5 class="text-black font600 fs-20" id="exampleModalLabel">Lưu hồ sơ ứng viên</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label class=""><span class="text-speci mr-1">*</span>Tên danh mục</label>
                    <div class="form-group"><input type="category" class="form-control" placeholder="Nhập tên danh mục" name="category" required></div>
                    <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal" onclick="showDialogSaveCandidated('<?= $user_type ?>')">Trở lại</button>
                    <button type="submit" class="btn btn-orange-46 w-auto-40 font17">Thêm danh mục</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal send message -->
<div class="modal fade" id="modalSendMess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 style="font-size: 15px; font-weight: 700;" id="header_send_mess">Gửi tin nhắn cho <?= $userProfile->full_name ?></h6>
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
                <div><input type="hidden" name="receiver_id" id="receiver_id" value="<?= $userProfile->user_id ?>"></div>
                <div><input type="hidden" name="sender_id" id="sender_id" value="<?= $user_recr_id ?>"></div>
                <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-orange-46 w-auto-40 font17" style="width: 100%;" onclick="ajaxReceiveMess()">Gửi tin nhắn</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal send message -->