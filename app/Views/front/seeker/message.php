<?php


use App\Helpers\Widgets\FrontendNav;
use App\Helpers\Widgets\SeekerLeftMenu;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
$this->title = $title;
$this->meta_image_url = $meta_image_url;
$home_list_block_id = explode(',', $settings['home_list_block_id']);
?>
<?= FrontendNav::register($this); ?>
<form action="/tuyen-dung">
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

<article>
    <section class="new-homepage">
        <div class="main-2-cols mt30 m-mt0 m-mb0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-1-ps d-none d-sm-block">
                        <?= SeekerLeftMenu::register($this); ?>
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
                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                        <div class="tabs-toggle tabs-employer">
                            <ul class="nav nav-tabs" style="display: flex;">
                                <li><a class="active" href="/trang-ca-nhan/tin-nhan">Hộp thư đến</a></li>
                                <li><a class="" href="/trang-ca-nhan/tin-nhan-da-gui">Hộp thư đi</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tabbox-01 tab-pane fade in active show">
                                    <div class="main-colm message-page" id="seeker_message_receive_page">
                                        <div class="title-nor d-pc">Hộp thư đến</div>
                                        <ul class="nav nav-tabs message-page__tab" role="tablist">
                                            <li id="0" role="presentation" class="active">
                                                <a class="d-flex align-items-center" style="text-align: center; font-size: 15px;font-weight: 700;font-size: 13px;" href="#tatca" aria-controls="profile" role="tab" data-toggle="tab" onclick="ajaxMessSeekerReceiveData(0)" id="seeker_tab_mess_receive_0">Tất cả </a>
                                            </li>
                                            <li id="1" role="presentation">
                                                <a class="d-flex align-items-center" style="text-align: center; font-size: 15px;font-weight: 700;font-size: 13px;" href="#chuadoc" aria-controls="profile" role="tab" data-toggle="tab" onclick="ajaxMessSeekerReceiveData(1)" id="seeker_tab_mess_receive_1">Chưa đọc </a>
                                            </li>
                                            <li id="2" role="presentation">
                                                <a class="d-flex align-items-center" style="text-align: center; font-size: 15px;font-weight: 700;font-size: 13px;" href="#dadoc" aria-controls="profile" role="tab" data-toggle="tab" onclick="ajaxMessSeekerReceiveData(2)" id="seeker_tab_mess_receive_2">Đã đọc </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active " id="tatca">
                                                <div class="tab-pane fade in active show mt-3">
                                                    <div class="tablehs-01 mx-0" id="seeker_message_receive_0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane  " id="chuadoc">
                                                <div class="tab-pane fade in active show mt-3">
                                                    <div class="tablehs-01 mx-0" id="seeker_message_receive_1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane  " id="dadoc">
                                                <div class="tab-pane fade in active show mt-3">
                                                    <div class="tablehs-01 mx-0" id="seeker_message_receive_2">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
<!-- model detail mess -->
<div class="modal fade bd-example-modal-lg" id="seeker_modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="background-color: #fff;">
        <div id="seeker_body_message_receive_detail">
        </div>
        <div style="padding: 15px;">
            <div>
                <h5 class="mt-4 fs-20" style="font-weight: 700;font-size: 20px;font-family: inherit;">Trả lời tin nhắn</h5>
                <div class="">
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
                    <input type="hidden" name="receiver_id" id="receiver_id">
                    <input type="hidden" name="sender_id" id="sender_id">
                </div>
                <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-blue-36 btn-reply-employer" onclick="ajaxReceiveMessSeeker()"><i class="far fa-edit"></i> Trả lời tin nhắn</button>
            </div>

        </div>
    </div>
</div>
<!-- end model detail mess -->

<!-- modal delete mess-rows -->
<div class="modal fade bd-example-modal-sm" id="modalDeleteMess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog" role="document" style="width: 500px; height: 200px;">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 20px; color: red"></i>
                <label style="color: red;padding-left: 15px; position: relative; font-size: 17px; font-weight: 700;">Bạn có chắc chắn muốn xoá?</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" id="id_mess" name="id_mess">
                    <label style="color: #212121;padding-left: 15px; position: relative; font-size: 17px; font-weight: 400;">Tin nhắn đã xóa không thể khôi phục.</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white-46 w-auto" style="width: 185px;" data-dismiss="modal">Không xóa</button>
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" style="width: 185px;" onclick="ajaxDeleteMess(0)">Xóa</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal delete  mess-rows  -->