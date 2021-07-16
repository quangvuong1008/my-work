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
                        <div class="main-colm">
                            <div class="title-nor">Hồ sơ đã xem thông tin liên hệ</div>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <input type="text" class="form-control" id="search-title-viewed" name="search-title-viewed" placeholder="Tiêu đề hồ sơ,..." >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <input class="form-control form-control-lg datetimepicker-viewed" id="datetimepicker_viewed_from" type="text" placeholder="Từ ngày" aria-label=".form-control-lg example">

                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input class="form-control form-control-lg datetimepicker-viewed" id="datetimepicker_viewed_to" type="text" placeholder="Đến ngày" aria-label=".form-control-lg example">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <button class="div-btn btn btn-blue-46 font17" onclick="ajaxViewProfileData()" >Tìm kiếm</button>
                                    </div>
                                </div>



                            </div>
                            <div class="mt-3" id="main-viewed-profiled">
                            </div>
                        </div>
                    </div>
                    <!-- modal export CSV -->
                    <div class="modal fade bd-example-modal-sm" id="modalExportCSVSaved" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <i class="fa fa-exclamation-circle" aria-hidden="true" style="font-size: 25px; color: red"></i>
                                    <h3 style="color: red;padding-left: 20px; position: relative;">Vui lòng chọn trang cần xuất file excel</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-box-txt">
                                        <label class="radio-cus mr-3">
                                            <input type="radio" name="radio" value="1" id="radio_checked_export" checked="">
                                            <span class="checkmark mr-1">
                                            </span>
                                            <span>Trang hiện tại</span>
                                        </label>
                                        <label class="radio-cus">
                                            <input type="radio" name="radio" value="2">
                                            <span class="checkmark mr-1"></span>
                                            <span>Tất cả các trang</span></label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal">Hủy</button>
                                    <button type="button" class="btn btn-orange-46 w-auto-40 font17" onclick="ajaxViewProfileData('download')">Xuất file</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end modal export CSV -->
                </div>
            </div>
        </div>
    </section>
</article>