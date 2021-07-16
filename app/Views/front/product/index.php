<?php

use App\Helpers\Html;
use App\Helpers\StringHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ProductCategoryModel $model
 * @var \App\Models\ProductModel[] $products
 * @var \CodeIgniter\Pager\Pager $pager
 */
$this->title = Html::decode($model->title);
?>
<div class="main-wrap">
    <div class="container">
        <div class="row hidden-xs">
            <div class="col-md-12">
                <ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li><a href="/" title="Trang Chủ">Trang Chủ</a></li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a
                                href="/cua-hang/" title="Cửa hàng" itemscope="" itemtype="http://schema.org/Thing"
                                itemprop="item"><span itemprop="name">Cửa hàng</span></a></li>
                    <li class="active"><a href="/cua-hang/tu-bep/" title="Tủ Bếp"><span>Tủ Bếp</span></a></li>
                </ol>
            </div>
        </div>
        <div class="row text-center"><h1><?= Html::decode($model->title) ?></h1></div>
        <?php if ($products && !empty($products)): ?>
            <div class="row">
                <?php foreach ($products as $product): ?>
                    <div class="col-md-3">
                        <div class="product-block text-center">
                            <a href="<?= $product->getUrl() ?>" title="<?= Html::decode($product->title) ?>">
                                <div class="img-wrap">
                                    <?= Html::img($product->getImage(), ['alt' => $product->title]) ?>
                                </div>
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
            <div class="text-center">
                <?= $pager->links() ?>
            </div>
        <?php else: ?>
            <div class="empty-block">
                <img src="/images/no-content.jpg" alt="No content"/>
                <h4>Không có sản phẩm nào thuộc danh mục này</h4>
            </div>
        <?php endif; ?>
        <div class="row">
            <article class="col-md-12"><?= $model->intro ?></article>
        </div>
    </div>
</div>