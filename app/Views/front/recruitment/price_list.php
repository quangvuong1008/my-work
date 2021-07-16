<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavLogin;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
$home_list_block_id = explode(',', $settings['home_list_block_id']);
?>
<?= FrontendNavLogin::register($this); ?>
<div class="wrapper-fill">
    <article>
        <div class="container container-price-list">
            <div class="text-center">
                <div class="text-main my-5 text-uppercase mb-10 font-weight-bold mt-10 fs-24">Bảng giá gói dịch vụ tuyển
                    dụng
                </div>
            </div>
            <div class="jsx-637763917 main-box bg-white">
                <div id="published-recruitment"
                     class="jsx-637763917  d-flex align-items-center justify-content-between title title-box bg-main text-left text-white fs-17 font-weight-bold">
                    ĐĂNG TIN TUYỂN DỤNG<i class="jsx-637763917 fs-20 icon-chevron-down"></i></div>
                <?php
                if ($home_list_block_id && count($home_list_block_id) > 1):
                    foreach ($home_list_block_id as $block_id):
                        if ($productCategories && !empty($productCategories)): ?>
                            <div class="jsx-637763917 border content-post-basic mb-3 pb-3 none-show-box">
                                <?php foreach ($productCategories as $prd_category):
                                    if ($prd_category->id == $block_id) :
                                        ?>
                                        <div class="jsx-2786790309 bg-main text-white my-4 text-uppercase d-flex align-items-center justify-content-between title title-children text-left fs-14 font-weight-bold">
                                            <?= $prd_category->title ?><i
                                                    class="jsx-2786790309 icon-arrowBottom fs-20 icon-chevron-down"></i>
                                        </div>
                                        <div class="jsx-2786790309 mb-20 border content-post-basic block-show-info">
                                            <div class="jsx-1845280293">
                                                <div class="jsx-1845280293  body-content-detail fs-14">
                                                    <?php
                                                    if ($prd_category->products) {
                                                        foreach ($prd_category->products as $product):?>
                                                            <div class="jsx-1845280293 my-3 mb-20 title-children"><span
                                                                        class="jsx-1845280293 font-weight-bold fs-14 title text-black py-1 px-2"><?= $product->title ?></span>
                                                            </div>

                                                            <div class="jsx-1845280293 row">
                                                                <div class="jsx-1845280293 col-md-4">
                                                                    <ul class="jsx-1845280293">
                                                                        <li class="jsx-1845280293 li-desc mb-2">
                                                                            <p><?= $product->intro ?></p>
                                                                            <a target="_blank" href="/">Xem mô tả vị trí
                                                                                đăng tin</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="jsx-1845280293 col-md-2 input-price">
                                                                    <div class="jsx-1845280293 quantity"><input
                                                                                value="1"
                                                                                readonly=""
                                                                                class="jsx-1845280293"><span
                                                                                class="jsx-1845280293 unit-info">tin</span>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $prd_price = $product->select_price_product($product->id);
                                                                ?>


                                                                <div class="jsx-1845280293 col-md-2">
                                                                    <div class="jsx-1845280293 quantity">
                                                                        <select class="jsx-1845280293 input select-week w-100 fs-14 "
                                                                                onchange="price(this.value)">
                                                                            <?php if ($prd_price): ?>
                                                                                <?php foreach ($prd_price as $prd_pr): ?>
                                                                                    <option value="<?= $prd_pr['id'] ?>"
                                                                                            class="jsx-1845280293 btn_glr_price"><?= $prd_pr['title'] ?></option>
                                                                                <?php endforeach; ?>
                                                                            <?php endif; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="jsx-1845280293 d-flex align-item-end col-md-4">
                                                                    <div class="col-md-12" id="list_price">
                                                                        <div class="jsx-1845280293 text-right total-price col-md-6">

                                                                        </div>
                                                                        <div class="jsx-1845280293 parent-button-add col-md-6">
                                                                            <button class="jsx-1845280293 btn bg-main text-white fs-12 btn-add">
                                                                                Thêm
                                                                            </button>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        <?php endforeach;

                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                endforeach; ?>
                            </div>
                        <?php endif;
                    endforeach;
                endif;
                ?>
            </div>
            <div class="bg-white">
                <div class="border">
                    <div class="row my-3">
                        <div class="col-md-8 text-right"><span class="fs-20 text-black">Tổng cộng (Đã bao gồm 10% thuế VAT):</span><span
                                    class="fs-20 text-red mx-2">0 đ</span></div>
                        <div class="col-md-4 text-center"><a class="btn bg-main w-80 text-white text-uppercase">Đăng ký
                                ngay</a></div>
                    </div>
                </div>
            </div>
            <div class="jsx-637763917"></div>
        </div>
    </article>
</div>