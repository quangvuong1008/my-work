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
                        <div class="jsx-2478479757 ">
                            <div class="jsx-2478479757 create-cnt w-100">
                                <div class="jsx-2478479757 create-cnt-box mt-0">
                                    <div class="jsx-2478479757 create-cnt-ttl">Gửi yêu cầu đến ban quản trị</div>
                                    <div class="jsx-2478479757 create-cnt-inputs create-gui-yc">

                                        <div class="">
                                            <div>
                                                <div class="jsx-3440181638 row-nor create-cnt-row mt15">
                                                    <div class="jsx-3440181638 create-cnt-row-left">
                                                        <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                            <span class="jsx-3440181638">Loại yêu cầu</span><span class="jsx-3440181638 txt-red ml-1">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                        <div class="jsx-3440181638 tabbox-01-group ">
                                                            <select class="form-control" name="cat_send_request" id="cat_send_request" data-live-search="true" required>
                                                                <option value="0" disabled selected>Chọn loại yêu cầu</option>
                                                                <?php if (!empty($category)) : ?>
                                                                    <?php foreach ($category as $cat) : ?>
                                                                        <option value="<?= $cat->id ?>"><?= $cat->category ?></option>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div></div>
                                            <div>
                                                <div class="jsx-3440181638 row-nor create-cnt-row mt15">
                                                    <div class="jsx-3440181638 create-cnt-row-left">
                                                        <div class="jsx-3440181638 create-cnt-row-ttl undefined">
                                                            <span class="jsx-3440181638">Mô tả chi tiết</span><span class="jsx-3440181638 txt-red ml-1">*</span>
                                                        </div>
                                                    </div>
                                                    <div class="jsx-3440181638 create-cnt-row-right undefined">
                                                        <div class="jsx-3440181638 tabbox-01-group ">
                                                            <div class="tabbox-01-group-input"><textarea class="form-control  text-area" name="description_send_request" id="description_send_request" required></textarea><i class="icon-x-red"></i><i class="icon-tick-green"></i></div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="g-recaptcha" data-sitekey="6LeDB4AbAAAAAPcJOAKctU3vT5UPve4vyEJ1O8En"></div>
                                        <div class="form-group form-row justify-content-end group-btn-gui-yc">
                                            <div class="col-4 col-md-2">
                                                <button type="button" class="btn btn-white-46 ex-cancel mr-2 w-100 mt15" onclick="deleteSendRequest()">Hủy</button>
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <button type="submit" class="btn btn-orange-46 w-100 fs-17 mt15" onclick="ajaxSendrequest()">Gửi</button>
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