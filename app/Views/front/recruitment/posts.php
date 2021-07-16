<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>

<?= FrontendNavTd::register($this); ?>
<div class="container">
    <div class="">
        <article>
            <section>
                <div class="create-header m-pb15 full-white-02">
                    <div class="box-770-center">
                        <div class="create-header-ttl">Tạo tin tuyển dụng</div>
                    </div>
                    <div class="create-header-items ex-4-menus ex-ntd false">
                        <div class="create-header-items-cnt">
                            <ul class="create-header-items-ul fix-row-crui ">
                                <li class="create-header-items-li fn-tuyen-dung">
                                    <button class="btn false undefined"><i
                                                class="create-header-items-ico ex-overall"></i><span>Thông tin công việc</span>
                                    </button>
                                </li>
                                <li class="create-header-items-li fn-ca-nhan">
                                    <button class="btn false undefined"><i
                                                class="create-header-items-ico ex-person"></i><span>Yêu cầu công việc</span>
                                    </button>
                                </li>
                                <li class="create-header-items-li fn-tong-quan">
                                    <button class="btn false undefined"><i
                                                class="create-header-items-ico ex-overall"></i><span>Thông tin liên hệ</span>
                                    </button>
                                </li>
                                <li class="create-header-items-li fn-hoan-thanh">
                                    <button class="btn"><i class="create-header-items-ico ex-complete"></i><span>Hoàn thành</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="create-cnt box-approval-rules">
                    <div class="main-colm my-3">
                        <div class="mb-3"><span>Quý khách đang sử dụng tài khoản</span><b
                                    class="ml-1 text-uppercase text-red">Miễn phí</b><span>.</span><span class="ml-1">Hiệu quả tuyển dụng thấp do bị hạn chế số lượng tin đăng - vị trí đăng tin kém nổi bật, khó tiếp cận Người tìm việc và bị giới hạn nhiều quyền lợi khác.</span>
                        </div>
                        <div><a class="btn btn-orange-46 font600 w-max-content" target="_blank" href="/bang-gia">Tìm
                                hiểu và nâng cấp tài khoản &gt;&gt;</a></div>
                    </div>
                    <div class="text-main font600 font-italic text-approval d-pc"><a target="_blank"
                                                                                     href="/quy-dinh-dang-tin-tuyen-dung">Quy
                            định duyệt tin trên Mywork »</a></div>

                    <?php
                    $message = SessionHelper::getInstance()->getFlash('REGISTER');
                    if (!empty($message) && isset($message['type'])) {
                        switch ($message['type']) {
                            case 'FRONT_ERROR_POST':
                                echo Html::tag('div',
                                    ArrayHelper::getValue($message, 'message', 'Kiểm tra lại thông tin nhập vào'),
                                    ['class' => 'alert alert-danger']
                                );
                                break;
                            case 'FRONT_SUCCESS_POST':
                                echo Html::tag('div',
                                    ArrayHelper::getValue($message, 'message', 'Đăng ký thành công'),
                                    ['class' => 'alert alert-success']
                                );
                                break;
                        }
                    } ?>

                    <form action="<?php
                    if (!$model) {
                        echo base_url() . '/PostsRecruitment/insert_new_recruitment';
                    } else {
                        echo base_url() . '/PostsRecruitment/update_new_recruitment/' . $model->id;
                    } ?> " method="post" class="form-hook form-scroll-margin" enctype="multipart/form-data">
                        <div class="create-cnt-box">
                            <div class="create-cnt-ttl">Thông tin công việc<span class="create-cnt-ttl-sub ml-1">(Bắt buộc)</span>
                            </div>
                            <div class="create-cnt-inputs">
                                <div class="">
                                    <div><input type="hidden" name="id"></div>
                                    <div><input type="hidden" name="gate_code" value="mw.default"></div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Chức danh</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text"
                                                               class="form-control "
                                                               placeholder="Ví dụ: Nhân viên kinh doanh, Nhân viên hành chính,..."
                                                               name="title" value="<?= $model->title ?>"><i
                                                                class="icon-x-red"></i><i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 font-italic text-secondary">
                                                    <div class="fs-12"><i class="mr-1 font500">Lưu ý:</i>
                                                        <span>Chức danh sẽ không được chỉnh sửa sau 72 giờ kiểm duyệt</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Số lượng cần tuyển</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input">
                                                        <input type="number" name="number" min="1"
                                                               class="form-control"
                                                               value="<?= $model->number ? $model->number : 1 ?>"><i
                                                                class="icon-x-red"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Cấp bậc</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="level"
                                                                id="level"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->level;
                                                            }
                                                            ?>
                                                            <option value="">Chọn cấp bậc</option>
                                                            <option value="Mới tốt nghiệp / Thực tập sinh"
                                                                <?php if ($value == 'Mới tốt nghiệp / Thực tập sinh')
                                                                    echo 'selected'
                                                                ?>
                                                            >Mới tốt
                                                                nghiệp / Thực tập sinh
                                                            </option>
                                                            <option value="Nhân viên"
                                                                <?php if ($value == 'Nhân viên')
                                                                    echo 'selected'
                                                                ?>
                                                            >Nhân viên
                                                            </option>
                                                            <option value="Trưởng nhóm"
                                                                <?php if ($value == 'Trưởng nhóm')
                                                                    echo 'selected'
                                                                ?>
                                                            >Trưởng nhóm
                                                            </option>
                                                            <option value="Trưởng phòng"
                                                                <?php if ($value == 'Trưởng phòng')
                                                                    echo 'selected'
                                                                ?>
                                                            >Trưởng phòng
                                                            </option>
                                                            <option value="Phó giám đốc"
                                                                <?php if ($value == 'Phó giám đốc')
                                                                    echo 'selected'
                                                                ?>
                                                            >Phó giám đốc
                                                            </option>
                                                            <option value="Giám đốc"
                                                                <?php if ($value == 'Giám đốc')
                                                                    echo 'selected'
                                                                ?>
                                                            >Giám đốc
                                                            </option>
                                                            <option value="Tổng giám đốc điều hành"
                                                                <?php if ($value == 'Tổng giám đốc điều hành')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tổng giám đốc điều
                                                                hành
                                                            </option>
                                                            <option value="Khác"
                                                                <?php if ($value == 'Khác')
                                                                    echo 'selected'
                                                                ?>
                                                            >Khác
                                                            </option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Loại hình làm việc</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="type_of_work"
                                                                id="type_of_work"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->type_of_work;
                                                            }
                                                            ?>
                                                            <option value="">Chọn hình thức làm việc</option>
                                                            <option value="Toàn thời gian cố định"
                                                                <?php if ($value == 'Toàn thời gian cố định')
                                                                    echo 'selected'
                                                                ?>
                                                            >Toàn thời gian cố
                                                                định
                                                            </option>
                                                            <option value="Toàn thời gian tạm thời"
                                                                <?php if ($value == 'Toàn thời gian tạm thời')
                                                                    echo 'selected'
                                                                ?>
                                                            >Toàn thời gian tạm
                                                                thời
                                                            </option>
                                                            <option value="Bán thời gian cố định"
                                                                <?php if ($value == 'Bán thời gian cố định')
                                                                    echo 'selected'
                                                                ?>
                                                            >Bán thời gian cố
                                                                định
                                                            </option>
                                                            <option value="Bán thời gian tạm thời"
                                                                <?php if ($value == 'Bán thời gian tạm thời')
                                                                    echo 'selected'
                                                                ?>
                                                            >Bán thời gian tạm
                                                                thời
                                                            </option>
                                                            <option value="Theo hợp đồng tư vấn"
                                                                <?php if ($value == 'Theo hợp đồng tư vấn')
                                                                    echo 'selected'
                                                                ?>
                                                            >Theo hợp đồng tư vấn
                                                            </option>
                                                            <option value="Thực tập"
                                                                <?php if ($value == 'Thực tập')
                                                                    echo 'selected'
                                                                ?>
                                                            >Thực tập
                                                            </option>
                                                            <option value="Khác"
                                                                <?php if ($value == 'Khác')
                                                                    echo 'selected'
                                                                ?>
                                                            >Khác
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Mức lương</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="wage"
                                                                id="wage"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->wage;
                                                            }
                                                            ?>
                                                            <option value="">Chọn mức lương</option>
                                                            <option value="1-3 triệu"
                                                                <?php if ($value == '1-3 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >1-3 triệu
                                                            </option>
                                                            <option value="3-5 triệu"
                                                                <?php if ($value == '3-5 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >3-5 triệu
                                                            </option>
                                                            <option value="5-7 triệu"
                                                                <?php if ($value == '5-7 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >5-7 triệu
                                                            </option>
                                                            <option value="7-10 triệu"
                                                                <?php if ($value == '7-10 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >7-10 triệu
                                                            </option>
                                                            <option value="10-12 triệu"
                                                                <?php if ($value == '10-12 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >10-12 triệu
                                                            </option>
                                                            <option value="12-15 triệu"
                                                                <?php if ($value == '12-15 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >12-15 triệu
                                                            </option>
                                                            <option value="15-20 triệu"
                                                                <?php if ($value == '15-20 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >15-20 triệu
                                                            </option>
                                                            <option value="20-25 triệu"
                                                                <?php if ($value == '20-25 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >20-25 triệu
                                                            </option>
                                                            <option value="25-30 triệu"
                                                                <?php if ($value == '25-30 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >25-30 triệu
                                                            </option>
                                                            <option value="Trên 30 triệu"
                                                                <?php if ($value == 'Trên 30 triệu')
                                                                    echo 'selected'
                                                                ?>
                                                            >Trên 30 triệu
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl"><span
                                                            class="jsx-3440181638">Hoa hồng (Nếu có)</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input">
                                                        <input type="text" class="form-control "
                                                               name="bonus" value=" <?= $model->bonus ?>"><i
                                                                class="icon-x-red"></i><i
                                                                class="icon-tick-green"></i></div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Địa điểm làm việc</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="province[]"
                                                                id="province"
                                                                data-live-search="true" multiple="multiple">
                                                            <option value=""> Chọn địa điểm làm việc</option>
                                                            <?php if ($province): ?>
                                                                <?php foreach ($province as $prvc): ?>

                                                                    <option value="<?= $prvc->id ?>">
                                                                        <?= $prvc->_name ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="jsx-1217494624 fn-list-nganh-nghe nn-lst ">
                                                            <div class="jsx-1217494624 floatLeft w-100">
                                                                <?php if ($province_rcm_info):?>
                                                                    <?php foreach ($province_rcm_info as $prv_rcm_info):?>
                                                                        <div class="jsx-1217494624 fn-breaking-nganh nn-box mw-100 div_province_upload_<?= $prv_rcm_info['id'] ?>">
                                                                                    <span title="<?=$prv_rcm_info['_name']?>"
                                                                                          class="jsx-1217494624 title d-block"><?=$prv_rcm_info['_name']?></span>
                                                                            </span>
                                                                            <a href="#"  onclick="delete_insert_province(<?=$prv_rcm_info['id']?>)" class="btn_delete_province"
                                                                               data-url-post ="<?= base_url() . '/PostsRecruitment/delete_province' ?>">X</a>
                                                                        </div>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 font-italic text-secondary">Bạn được phép
                                                    chọn 5 địa điểm
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Ngành hiển thị chính</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="job_id"
                                                                id="job_id"
                                                                data-live-search="true">
                                                            <option value="">Chọn ngành nghề</option>
                                                            <?php if ($job_model): ?>
                                                                <?php foreach ($job_model as $jmd): ?>
                                                                    <option value="<?= $jmd->id ?>"
                                                                        <?php if ($jmd->id == $model->job_id) {
                                                                            echo 'selected';
                                                                        }
                                                                        ?>
                                                                    ><?= $jmd->title ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Ngành hiển thị phụ</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="extra_job[]"
                                                                id="extra_job"
                                                                data-live-search="true" multiple="multiple">
                                                            <option value="">Chọn ngành nghề</option>
                                                            <?php if ($job_model): ?>
                                                                <?php foreach ($job_model as $jmd): ?>
                                                                    <option value="<?= $jmd->id ?>"><?= $jmd->title ?></option>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </select>
                                                        <div class="jsx-1217494624 fn-list-nganh-nghe nn-lst ">
                                                            <div class="jsx-1217494624 floatLeft w-100">
                                                                <?php if ($job_rcm_info):?>
                                                                    <?php foreach ($job_rcm_info as $job_rcm_info):?>
                                                                        <div class="jsx-1217494624 fn-breaking-nganh nn-box mw-100 div_job_upload_<?= $job_rcm_info['id'] ?>">
                                                                                    <span title="<?=$job_rcm_info['title']?>"
                                                                                          class="jsx-1217494624 title d-block"><?=$job_rcm_info['title']?></span>
                                                                            </span>
                                                                            <a href="#"  onclick="delete_insert_job(<?=$job_rcm_info['id']?>)" class="btn_delete_job"
                                                                               data-url-post ="<?= base_url() . '/PostsRecruitment/delete_job' ?>">X</a>
                                                                        </div>
                                                                    <?php endforeach;?>
                                                                <?php endif;?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 font-italic text-secondary">Bạn được phép
                                                    chọn tối đa 2 ngành phụ
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Mô tả công việc</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input">
                                                        <textarea
                                                                class="form-control  text-area"
                                                                placeholder="Nhập mô tả công việc"
                                                                name="intro"><?=$model->intro?> </textarea><i class="icon-x-red"></i><i
                                                                class="icon-tick-green"></i></div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Quyền lợi</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input"><textarea
                                                                class="form-control  text-area"
                                                                placeholder="Nhập quyền lợi"
                                                                name="interest"><?=$model->interest?> </textarea><i class="icon-x-red"></i><i
                                                                class="icon-tick-green"></i></div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="create-cnt-box">
                            <div class="create-cnt-ttl">Yêu cầu công việc<span class="create-cnt-ttl-sub ml-1">(Bắt buộc)</span>
                            </div>
                            <div class="create-cnt-inputs">
                                <div class="">
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Kinh nghiệm</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="experience"
                                                                id="experience"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->experience;
                                                            }
                                                            ?>
                                                            <option value="">Chọn kinh nghiệm</option>
                                                            <option value="Chưa có kinh nghiệm"
                                                                <?php if ($value == 'Chưa có kinh nghiệm')
                                                                    echo 'selected'
                                                                ?>
                                                            >Chưa có kinh nghiệm
                                                            </option>
                                                            <option value="Dưới 1 năm"
                                                                <?php if ($value == 'Dưới 1 năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >Dưới 1 năm</option>
                                                            <option value="1 Năm"
                                                                <?php if ($value == '1 Năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >1 Năm</option>
                                                            <option value="2 Năm"
                                                                <?php if ($value == '2 Năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >2 Năm</option>
                                                            <option value="3 Năm"
                                                                <?php if ($value == '3 Năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >3 Năm</option>
                                                            <option value="4 Năm"
                                                                <?php if ($value == '4 Năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >4 Năm</option>
                                                            <option value="5 Năm"
                                                                <?php if ($value == '5 Năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >5 Năm</option>
                                                            <option value="Hơn 5 năm"
                                                                <?php if ($value == 'Hơn 5 năm')
                                                                    echo 'selected'
                                                                ?>
                                                            >Hơn 5 năm</option>
                                                            <option value="Không yêu cầu"
                                                                <?php if ($value == 'Không yêu cầu')
                                                                    echo 'selected'
                                                                ?>
                                                            >Không yêu cầu</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Bằng cấp</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="degree"
                                                                id="degree"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->degree;
                                                            }
                                                            ?>
                                                            <option value="">Chọn trình độ</option>
                                                            <option value="Không yêu cầu"
                                                                <?php if ($value == 'Không yêu cầu')
                                                                    echo 'selected'
                                                                ?>
                                                            >Không yêu cầu</option>
                                                            <option value="Trên đại học"
                                                                <?php if ($value == 'Trên đại học')
                                                                    echo 'selected'
                                                                ?>
                                                            >Trên đại học</option>
                                                            <option value="Đại học"
                                                                <?php if ($value == 'Đại học')
                                                                    echo 'selected'
                                                                ?>
                                                            >Đại học</option>
                                                            <option value="Cao đẳng"
                                                                <?php if ($value == 'Cao đẳng')
                                                                    echo 'selected'
                                                                ?>
                                                            >Cao đẳng</option>
                                                            <option value="Trung cấp"
                                                                <?php if ($value == 'Trung cấp')
                                                                    echo 'selected'
                                                                ?>
                                                            >Trung cấp</option>
                                                            <option value="Trung học"
                                                                <?php if ($value == 'Trung học')
                                                                    echo 'selected'
                                                                ?>
                                                            >Trung học</option>
                                                            <option value="Lao động phổ thông"
                                                                <?php if ($value == 'Lao động phổ thông')
                                                                    echo 'selected'
                                                                ?>
                                                            >Lao động phổ thông
                                                            </option>
                                                            <option value="Khác"
                                                                <?php if ($value == 'Khác')
                                                                    echo 'selected'
                                                                ?>
                                                            >Khác</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Giới tính</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="sex"
                                                                id="sex"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->sex;
                                                            }
                                                            ?>
                                                            <option value="">Chọn giới tính</option>
                                                            <option value="Không yêu cầu"
                                                                <?php if ($value == 'Không yêu cầu')
                                                                    echo 'selected'
                                                                ?>
                                                            >Không yêu cầu</option>
                                                            <option value="Nam"
                                                                <?php if ($value == 'Nam')
                                                                    echo 'selected'
                                                                ?>
                                                            >Nam</option>
                                                            <option value="Nữ"
                                                                <?php if ($value == 'Nữ')
                                                                    echo 'selected'
                                                                ?>
                                                            >Nữ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Hạn nộp hồ sơ</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class='input-group date' id='start_date'>
                                                        <input type='text' name="the_deadline" required
                                                               value="<?php if ($model && $model->the_deadline) {
                                                                   echo date('d/m/Y', $model->the_deadline);
                                                               } ?>"
                                                               class="form-control"/>
                                                        <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Ngôn ngữ hồ sơ</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="form-group">
                                                        <select class="selectpicker form-control"
                                                                name="language"
                                                                id="language"
                                                                data-live-search="true">
                                                            <?php if ($model) {
                                                                $value = $model->language;
                                                            }
                                                            ?>
                                                            <option value="">Chọn ngôn ngữ</option>
                                                            <option value="Tiếng Việt"
                                                                <?php if ($value == 'Tiếng Việt')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tiếng Việt</option>
                                                            <option value="Tiếng Anh"
                                                                <?php if ($value == 'Tiếng Anh')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tiếng Anh</option>
                                                            <option value="Tiếng Trung"
                                                                <?php if ($value == 'Tiếng Trung')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tiếng Trung</option>
                                                            <option value="Tiếng Nhật"
                                                                <?php if ($value == 'Tiếng Nhật')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tiếng Nhật</option>
                                                            <option value="Tiếng Pháp"
                                                                <?php if ($value == 'Tiếng Pháp')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tiếng Pháp</option>
                                                            <option value="Tiếng Hàn"
                                                                <?php if ($value == 'Tiếng Hàn')
                                                                    echo 'selected'
                                                                ?>
                                                            >Tiếng Hàn</option>
                                                            <option value="Bất kỳ"
                                                                <?php if ($value == 'Bất kỳ')
                                                                    echo 'selected'
                                                                ?>
                                                            >Bất kỳ</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Yêu cầu công việc</span><span
                                                            class="jsx-3440181638 txt-red ml-1">*</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input"><textarea
                                                                class="form-control  text-area"
                                                                placeholder="Nhập yêu cầu công việc"
                                                                name="job_requirements"><?=$model->job_requirements?> </textarea><i
                                                                class="icon-x-red"></i><i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 font-italic text-secondary">
                                                    <div>
                                                        <div>Là những yêu cầu cần thiết với vị trí tuyển dụng</div>
                                                        <div>(Bằng cấp, trình độ, kỹ năng, kinh nghiệm v.v...)</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                            <div class="jsx-3440181638 create-cnt-row-left">
                                                <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                            class="jsx-3440181638">Yêu cầu hồ sơ</span></div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                <div class="jsx-3440181638 tabbox-01-group ">
                                                    <div class="tabbox-01-group-input"><textarea
                                                                class="form-control  text-area"
                                                                name="profile_requirement"><?=$model->profile_requirement?> </textarea><i
                                                                class="icon-x-red"></i><i class="icon-tick-green"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jsx-3440181638 create-cnt-row-left"></div>
                                            <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="create-cnt-box">
                            <div class="create-cnt-ttl">Thông tin liên hệ<span class="create-cnt-ttl-sub ml-1">(Bắt buộc)</span>
                            </div>
                            <div class="create-cnt-inputs collapse m-pt0 in show">
                                <div class="box-clone fn-box-lien-he">
                                        <div class="">
                                            <div>
                                                <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                                    <div class="jsx-3440181638 create-cnt-row-left">
                                                        <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                                    class="jsx-3440181638">Tên người liên hệ</span><span
                                                                    class="jsx-3440181638 txt-red ml-1">*</span></div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                        <div class="jsx-3440181638 tabbox-01-group ">
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text" class="form-control "
                                                                       name="contact_name"
                                                                       value="<?= $models->contact_name ? $models->contact_name : $model->contact_name ?>">
                                                                <i class="icon-x-red"></i>
                                                                <i class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                                    <div class="jsx-3440181638 create-cnt-row-left">
                                                        <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                                    class="jsx-3440181638">Địa chỉ liên hệ</span><span
                                                                    class="jsx-3440181638 txt-red ml-1">*</span></div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                        <div class="jsx-3440181638 tabbox-01-group ">
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text"
                                                                       class="form-control "
                                                                       name="contact_address"
                                                                       value="<?= $models->contact_address ? $models->contact_address : $model->contact_address ?>">
                                                                <i class="icon-x-red"></i>
                                                                <i class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                                    <div class="jsx-3440181638 create-cnt-row-left">
                                                        <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                                    class="jsx-3440181638">Số điện thoại liên hệ</span><span
                                                                    class="jsx-3440181638 txt-red ml-1">*</span></div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                        <div class="jsx-3440181638 tabbox-01-group ">
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text" class="form-control "
                                                                       id="contact_phone_number"
                                                                       name="contact_phone_number"
                                                                       value="<?= $models->contact_phone_number ? $models->contact_phone_number : $model->contact_phone_number ?>">
                                                                <i class="icon-x-red"></i>
                                                                <i class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="jsx-3440181638 fix-row-crui create-cnt-row mt15">
                                                    <div class="jsx-3440181638 create-cnt-row-left">
                                                        <div class="jsx-3440181638 create-cnt-row-ttl undefined"><span
                                                                    class="jsx-3440181638">Email liên hệ</span><span
                                                                    class="jsx-3440181638 txt-red ml-1">*</span></div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                        <div class="jsx-3440181638 tabbox-01-group ">
                                                            <div class="tabbox-01-group-input">
                                                                <input type="text" class="form-control "
                                                                       name="contact_email"
                                                                       value="<?= $models->contact_email ? $models->contact_email : $model->contact_email ?>">
                                                                <i class="icon-x-red"></i>
                                                                <i class="icon-tick-green"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-left"></div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined"></div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="list-btns mt25">
                            <ul class="list-btns-ul row">
                                <li class="col-12 mb25 m-mb10">
                                    <button type="submit" class="btn btn-orange-56 ex-upload">ĐĂNG TIN</button>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <div class="box-770-center-bottm px-3">
                        <span>Bạn đang gặp khó khăn? Vui lòng liên hệ hotline</span><span
                                class="box-770-center-bottm-num mx-1 text-speci-emp">(024) 710 88688 | (028) 710 88688</span><span>để được hỗ trợ.</span>
                    </div>
                </div>
            </section>
        </article>
    </div>
</div>