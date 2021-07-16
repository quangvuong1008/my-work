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
            <div class="container">
                <div class="row">
                    <div class="d-filter-header col-12 col-sm-3 col-md-3 col-lg-3 col-1-ps">
                        <?= MenuRecruitmentWidget::register($this); ?>

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                        <div class="over-hidden resume-applied-page">
                            <div class="main-colm mh-auto border-none-mb">
                                <div class="title-nor">Hồ sơ đã ứng tuyển</div>
                                <div class="filter-01 border-none-mb">
                                    <div class="filter-01-sl">
                                        <div class="filter-01-txt">Hồ sơ ứng tuyển vị trí</div>
                                        <div class="filter-01-select">
                                            <div class="tabbox-01-group">
                                                <div class="tabbox-01-group-input">
                                                    <select class="form-control select-apply" name="select-position-apply" id="select_position_apply" data-live-search="true">
                                                        <option value="null">Chọn vị trí ứng tuyển</option>
                                                        <?php if ($category  && !empty($category)) : ?>
                                                            <?php foreach ($category as $cat) : ?>
                                                                <option value="<?= $cat->id ?>"><?= $cat->title ?></option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="filter-01-page mt20">
                                        <div class="row-nor">
                                            <div class="col-12 col-md-6">Có<b class="txt-orange mx-1" id="countApplyProfile"></b>hồ sơ ứng tuyển vị
                                                trí này
                                            </div>
                                            <div class="col-12 col-md-6 d-pc">
                                                <div class="sort-01 right100">
                                                    <select class="form-control heigt35 select-apply" name="select-time-range-apply" id="select-time-range-apply" data-live-search="true">
                                                        <option value="0">Chọn thời gian</option>
                                                        <option value="1">3 ngày</option>
                                                        <option value="2">1 tuần</option>
                                                        <option value="3">1 tháng</option>
                                                        <option value="4">2 tháng</option>
                                                    </select>
                                                </div>
                                                <div class=" filter-01-page-right tabbox-01-group d-none d-sm-block"><button class="btn-filter d-none d-sm-inline-block" id="filter-applicable">Bộ lọc <i class="fas fa-chevron-down"></i></button></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="list-filter mt-2 ex-open" hidden id="ex-open-applicable" style="display: none;">
                                    <div class="list-filter-row row">
                                        <div class="list-filter-col">
                                            <div class="list-filter-col-ttl">Trạng thái hồ sơ</div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle status-apply"><input type="checkbox" name="1" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Đã liên hệ</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle status-apply"><input type="checkbox" name="2" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Đã test</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle status-apply"><input type="checkbox" name="3" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Đã phỏng vấn</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle status-apply"><input type="checkbox" name="4" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Trúng tuyển</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle status-apply"><input type="checkbox" name="5" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Không trúng tuyển</label></div>
                                        </div>
                                        <div class="list-filter-col">
                                            <div class="list-filter-col-ttl">Mức lương</div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="1" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">1-3 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="2" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">3-5 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="3" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">5-7 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="4" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">7-10 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="5" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">10-12 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="6" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">12-15 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="7" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">15-20 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="8" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">20-25 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="9" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">25-30 triệu</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle salary-range-apply"><input type="checkbox" name="10" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">30 triệu trở lên</label></div>
                                        </div>
                                        <div class="list-filter-col">
                                            <div class="list-filter-col-ttl">Trình độ</div>
                                            <?php if ($education_level) : ?>
                                                <?php foreach ($education_level as $key => $value) : ?>
                                                    <div class="d-flex align-items-center">
                                                        <label class="checkboxlb">
                                                            <div class="icheckbox_minimal-grey-apply position-relative align-middle education-apply">
                                                                <input type="checkbox" name="<?= $key ?>" class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                        </label>
                                                        <label class="checkboxlb-black pl-2"><?= $value ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="list-filter-col">
                                            <div class="list-filter-col-ttl">Giới tính</div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle gender-apply"><input type="checkbox" name="female" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Nữ</label></div>
                                            <div class="d-flex align-items-center"><label class="checkboxlb">
                                                    <div class="icheckbox_minimal-grey-apply position-relative align-middle gender-apply"><input type="checkbox" name="male" class="icheck"><ins class="iCheck-helper"></ins></div>
                                                </label><label class="checkboxlb-black pl-2">Nam</label></div>
                                        </div>
                                        <div class="list-filter-col">
                                            <div class="list-filter-col-ttl">Kinh nghiệm</div>
                                            <?php if ($experience) : ?>
                                                <?php foreach ($experience as $key => $value) : ?>
                                                    <div class="d-flex align-items-center">
                                                        <label class="checkboxlb">
                                                            <div class="icheckbox_minimal-grey-apply position-relative align-middle experience-apply">
                                                                <input type="checkbox" name="<?= $value ?>" class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                        </label><label class="checkboxlb-black pl-2"> <?= $value ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-colm mt30 d-none d-sm-block">
                                <div class="export-file lst-btns mt-4">
                                    <div class="export-file-left">
                                        <button class="btn btn-blue-46 font400" onclick="showModalDeteleApplyProfile()"><i class="far fa-trash-alt" style="margin-right: 5px;"></i>Xóa</button>
                                        <!-- <button class="btn btn-blue-46 font400" onclick="showDialogExportCSV()"><i class="far fa-file-alt" style="font-size: 20px; margin-right: 5px;"></i>Xuất file excel</button> -->
                                    </div>
                                    <div class="export-file-right"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="tablehs-01 ex-tb-hs mt30" style=" margin-left: -30px;margin-right: -30px;">
                                    <div class="tablehs-01-box">
                                        <div class="tablehs-01-head row">
                                            <div class="tablehs-01-head-th d-flex align-items-center"><label class="checkboxlb mb-0">
                                                    <div class="icheckbox_minimal-grey position-relative align-middle ">
                                                        <input type="checkbox" class="form-check-input" id="checkbox_apply_all_rows">
                                                        <label class="form-check-label" for="exampleCheck1"></label>
                                                    </div>
                                                </label><label class="checkboxlb-black pl-2 fs-13">Họ tên</label></div>
                                            <div class="tablehs-01-head-th">Vị trí ứng tuyển</div>
                                            <div class="tablehs-01-head-th">Ngày nộp</div>
                                            <div class="tablehs-01-head-th">Đã liên hệ</div>
                                            <div class="tablehs-01-head-th">Đã test</div>
                                            <div class="tablehs-01-head-th">Đã phỏng vấn</div>
                                            <div class="tablehs-01-head-th">Trúng tuyển</div>
                                            <div class="tablehs-01-head-th">Không trúng</div>
                                        </div>
                                        <div id="main-row-apply-profile">
                                        </div>

                                    </div>
                                </div>
                                <div class="export-file lst-btns mt-4">
                                    <div class="export-file-left">
                                        <button class="btn btn-blue-46 font400" onclick="showModalDeteleApplyProfile()"><i class="far fa-trash-alt" style="margin-right: 5px;"></i>Xóa</button>
                                        <!-- <button class="btn btn-blue-46 font400" onclick="showDialogExportCSV()"><i class="far fa-file-alt" style="font-size: 20px; margin-right: 5px;"></i>Xuất file excel</button> -->
                                    </div>
                                    <div class="export-file-right"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- modal  Ghi chú -->
<div class="modal fade bd-example-modal-sm" id="modalUpdateNoteApply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
    <div class="modal-dialog modal-sm" role="document" style="width: 500px;height: 300px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-black font600 fs-20" id="exampleModalLabel">Ghi chú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <textarea class="form-control" id="note_apply" name="note_apply"></textarea>
                </div>
                <input type="hidden" id="id_userP_apply" name="id_userP_apply">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal" id="button_back_apply">Trở lại</button>
                <button type="button" class="btn btn-white-46 w-auto" data-dismiss="modal" id="buton_delete_note_apply" onclick="ajaxDeleteNoteApply()">Xóa</button>
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" onclick="ajaxUpdateNoteApply()">Lưu</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal Ghi chú -->

<!-- modal delete ho so da ung tuyen -->
<div class="modal fade bd-example-modal-sm" id="modalDeleteApplyProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 10%;">
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
                    <label style="color: #212121;padding-left: 15px; position: relative; font-size: 17px; font-weight: 400;">Hồ sơ ứng tuyển đã xóa không thể khôi phục.</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white-46 w-auto" style="width: 185px;" data-dismiss="modal">Không xóa</button>
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" style="width: 185px;" onclick="ajaxDeleteApplyProfile()">Xóa</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal delete ho so da ung tuyen -->

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
                <button type="button" class="btn btn-orange-46 w-auto-40 font17" onclick="ajaxApplyProfileData('download')">Xuất file</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal export CSV -->