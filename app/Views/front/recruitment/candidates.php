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
$this->title = $title;
$this->meta_image_url = $meta_image_url;
$home_list_block_id = explode(',', $settings['home_list_block_id']);
?>
<?= FrontendNavTd::register($this); ?>
<article>
    <section class="new-homepage">
        <div class="main-2-cols mt30 m-mt0 m-mb0">
            <?= SearchRecruitmentWidget::register($this, $province, $job, $search_navbar, $province_navbar, $job_navbar); ?>
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
                        <div class="left-boxes">
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl">Mức lương<i class="icon-arrow-up"></i></div>
                                <div class="collapse show">
                                    <div class="tabbox-01-group">
                                        <div class="tabbox-01-group-input">
                                            <select class="select-andidates form-control" name="scales" id="salary_range" data-live-search="true">
                                                <option value="-1">Tất cả mức lương</option>
                                                <option value="0">1-3 triệu</option>
                                                <option value="1">3-5 triệu</option>
                                                <option value="2">5-7 triệu</option>
                                                <option value="3">7-10 triệu</option>
                                                <option value="4">trên 10 triệu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Tỉnh thành</span>
                                </div>
                                <div id="collapsCareer" class="collapse show">
                                    <div class="lst-checkbox">
                                        <ul>
                                            <?php if ($province) : ?>
                                                <?php foreach ($province as $prv) : ?>
                                                    <li>
                                                        <label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey-candidates province <?php if ($prv->id == $province_navbar) echo "checked" ?>" id="province"><input name="<?= $prv->id ?>" type="checkbox" class="icheck" <?php if ($prv->id == $province_navbar) echo "checked" ?>>
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            <?= $prv->_name ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Ngành nghề</span>
                                </div>
                                <div id="collapsCareer" class="collapse show">
                                    <div class="lst-checkbox">
                                        <ul>
                                            <?php if ($job) : ?>
                                                <?php foreach ($job as $j) : ?>
                                                    <li>
                                                        <label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey-candidates job <?php if ($j->id == $job_navbar) echo "checked" ?>" id="job"><input name="<?= $j->id ?>" type="checkbox" class="icheck" <?php if ($j->id == $job_navbar) echo "checked" ?>>
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            <?= $j->title ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Vị trí mong muốn</span>
                                </div>
                                <div id="collapsCareer" class="collapse show">
                                    <div class="lst-checkbox">
                                        <ul>
                                            <?php if ($position_wanted) : ?>
                                                <?php foreach ($position_wanted as $key => $value) : ?>
                                                    <li>
                                                        <label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey-candidates position_wanted" id="position_wanted"><input name="<?= $key ?>" type="checkbox" class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            <?= $value ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Trình độ học vấn</span>
                                </div>
                                <div id="collapsCareer" class="collapse show">
                                    <div class="lst-checkbox">
                                        <ul>
                                            <?php if ($education_level) : ?>
                                                <?php foreach ($education_level as $key => $value) : ?>
                                                    <li>
                                                        <label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey-candidates education_level" id="education_level"><input name="<?= $key ?>" type="checkbox" class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            <?= $value ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Kinh nghiệm</span>
                                </div>
                                <div id="collapsCareer" class="collapse show">
                                    <div class="lst-checkbox">
                                        <ul>
                                            <?php if ($experience) : ?>
                                                <?php foreach ($experience as $key => $value) : ?>
                                                    <li>
                                                        <label class="checkbox-lb cursor-pointer">
                                                            <div class="icheckbox_minimal-grey-candidates experience" id="experience"><input name="<?= $value ?>" type="checkbox" class="icheck">
                                                                <ins class="iCheck-helper"></ins>
                                                            </div>
                                                            <?= $value ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl d-flex justify-content-between align-items-center"><span>Giới tính</span>
                                </div>
                                <div id="collapsCareer" class="collapse show">
                                    <div class="lst-checkbox">
                                        <ul>
                                            <li><label class="checkbox-lb cursor-pointer">
                                                    <div class="icheckbox_minimal-grey-candidates gender"><input name="female" type="checkbox" class="icheck">
                                                        <ins class="iCheck-helper"></ins>
                                                    </div>
                                                    Nữ
                                                </label></li>
                                            <li><label class="checkbox-lb cursor-pointer">
                                                    <div class="icheckbox_minimal-grey-candidates gender"><input name="male" type="checkbox" class="icheck">
                                                        <ins class="iCheck-helper"></ins>
                                                    </div>
                                                    Nam
                                                </label></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="left-boxes-white">
                                <div class="left-boxes-ttl">Thời gian cập nhật<i class="icon-arrow-up"></i></div>
                                <div class="collapse show">
                                    <div class="tabbox-01-group">
                                        <div class="tabbox-01-group-input">
                                            <select class="select-andidates form-control" name="scales" id="time_range" data-live-search="true">
                                                <option value="-1">Tất cả thời gian</option>
                                                <option value="0">Mới nhất</option>
                                                <option value="1">1 tuần</option>
                                                <option value="2">1 tháng</option>
                                                <option value="3">Cũ nhất</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-filter-body col-12 col-sm-9 col-md-9 col-lg-9 col-3-ps m-pl0 m-pr0">
                        <div class="main-colm main-colm-candidates">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>