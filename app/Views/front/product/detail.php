<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;
use App\Helpers\Widgets\BreadcrumbsWidget;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ProductCategoryModel $category
 * @var \App\Models\ProductModel $model
 * @var \App\Models\ProductModel[] $products
 */
$this->title = Html::decode($model->title);
?>
<div class="main-wrap">
    <div class="container">
        <div class="row hidden-xs">
            <div class="col-md-12">
                <?= BreadcrumbsWidget::register($this, [
                    'links' => [
                        ['label' => $category->title, 'url' => $category->getUrl()],
                        $model->title,
                    ]
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <article>
                        <section class="row">
                            <figure class=col-md-6>
                                <?php if (($gallery = $model->getGallery()) !== null && !empty($gallery)): ?>
                                    <div class="scrollable gallery-wrap">
                                        <ul class="singer-carousel no-js">
                                            <?php foreach ($gallery as $image): ?>
                                                <li data-thumb="<?= $image->getImage() ?>"
                                                    data-src="<?= $image->getImage() ?>">
                                                    <div class="img-wrap">
                                                        <?= Html::img($image->getImage(), [
                                                            'alt' => $image->title ?: $model->title,
                                                        ]) ?>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </figure>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 class="product-page-title" itemprop="name">
                                            <b><?= Html::decode($model->title) ?></b>
                                        </h1>
                                    </div>
                                </div>
                                <h4 class="product-price">
                                    <div class="price"><?= $model->price ? StringHelper::formatPrice(
                                            $model->price, 'VNĐ') : 'Liên hệ' ?></div>
                                </h4>
                                <p itemprop="description"></p>
                                <p>Chất liệu: <?= $model->material ?: 'Đang cập nhật' ?></p>
                                <p>Bảo hành: <?= $model->guarantee ?: 'Đang cập nhật' ?></p>
                                <?php if (!empty($model->short_intro)): ?>
                                    <p><strong>Thông tin thêm...</strong></p>
                                    <p><?= Html::decode(nl2br($model->short_intro)) ?></p>
                                <?php endif ?>
                                <a href="<?= base_url('shopping-cart/add') ?>"
                                   class="btn btn-danger btn-custom-red add-to-cart-btn"
                                   data-id="<?= $model->getPrimaryKey() ?>">
                                    <i class="glyphicon glyphicon-shopping-cart"></i> Mua ngay
                                </a>
                                <a href="#content" class="btn btn-primary btn-custom-primary">Xem mô tả</a>
                                <br><br>
                                <p>
                                    <em>Giá sản phẩm tùy vào thời điểm và chất liệu sản phẩm. Vui lòng gọi</em>
                                    <strong><span style="color:#ff0000">______</span> </strong>
                                    <em>để biết giá chính xác nhất</em>
                                </p>
                                <br>
                            </div>
                        </section>
                        <section class="row">
                            <div class="col-md-12">
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active">
                                            <a href="#mota" aria-controls="mota" role="tab"
                                               data-toggle="tab">Mô tả sản phẩm</a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#danhgia" aria-controls="danhgia" role="tab"
                                               data-toggle="tab">Đánh giá</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="mota">
                                            <article id="intro"><?= Html::decode($model->intro) ?></article>
                                            <article id="content"><?= Html::decode($model->content) ?></article>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="danhgia">##</div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </article>
                </div>
                <?php if ($products && !empty($products)): ?>
                    <section>
                        <div class="row">
                            <div class="col-md-12 text-center"><h2 class="title-box2nd"><b>SẢN PHẨM LIÊN QUAN</b></h2>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($products as $product): ?>
                                <div class="col-md-3">
                                    <div class="product-block text-center">
                                        <a href="<?= $product->getUrl() ?>"
                                           title="<?= Html::decode($product->title) ?>">
                                            <span class="img-wrap">
                                                <?= Html::img($product->getImage(), ['alt' => $product->title]) ?>
                                            </span>
                                            <h3><?= Html::decode($product->title) ?></h3>
                                            <h4 class="product-price">
                                                <div class="price"><?= $product->price ? StringHelper::formatPrice(
                                                        $product->price, 'VNĐ') : 'Liên hệ' ?></div>
                                            </h4>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>