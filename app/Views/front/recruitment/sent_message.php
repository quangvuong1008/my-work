<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\MenuRecruitmentWidget;
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
                        <div class="tabs-toggle tabs-employer" >
                            <ul class="nav nav-tabs" style="display: flex;">
                                <li><a class="" href="/nha-tuyen-dung/tin-nhan">Hộp thư đến</a></li>
                                <li><a class="active" href="/nha-tuyen-dung/tin-nhan-da-gui">Hộp thư đi</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tabbox-01 tab-pane fade in active show">
                                    <div class="main-colm message-page" id="message-sent-page">
                                        <div class="title-nor d-pc">Hộp thư đi</div>
                                        <ul class="nav nav-tabs message-page__tab" role="tablist" style="display: flex;">
                                            <li id="0" role="presentation" class="active">
                                                <a class="d-flex align-items-center" style="text-align: center; font-size: 15px;font-weight: 700;font-size: 13px;" href="#hopthudi" aria-controls="profile" role="tab" data-toggle="tab" onclick="ajaxMessSentData()"  id="tab_mess_sent_0">Tất cả </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active " id="hopthudi">
                                                <div class="tab-pane fade in active show mt-3">
                                                    <div class="tablehs-01 mx-0" id="message_sent_0">

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
<div class="modal fade bd-example-modal-lg" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="background-color: #fff;">
        <div class="modal-content" id="body_message_receive_detail">

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
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" style="width: 185px;" onclick="ajaxDeleteMess(1)">Xóa</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal delete  mess-rows  -->