<section class=col-md-12>
    <div class=tabProduct>
        <div class=row>
            <div class="homepage-row-product-title text-center">
                <h2>
                    <a href="/thi-cong-xay-dung" title="Thi công xây dựng">Thi công xây dựng</a>
                </h2>
            </div>
        </div>
        <div>
            <div class="hidden-xs">
                <?php use App\Helpers\Html;

                if ($models && !empty($models)): ?>
                    <ul class="nav nav-tabs nav-justified category-top-nav " role="tablist">
                        <?php foreach ($models as $n => $category) {
                            echo Html::tag('li', Html::a($category->title, "#cattop{$category->id}", [
                                'data' => ['toggle' => 'tab', 'index' => $category->id], 'role' => 'tab',
                                'aria-controls' => $category->id,
                                'class' => 'category-top-tab display-inline'
                            ]), ['role' => 'presentation', 'class' => $n === 0 ? 'active' : null]);
                        } ?>
                    </ul>
                    <div class="tab-content"></div>
                <?php endif; ?>
            </div>

            <div class="visible-xs">

                <div class="row">
                    <?php foreach ($models as $category): ?>
                        <div class="col-xs-6 col-md-4">
                            <a href="<?= $category->getUrl() ?>" class="thumbnail product-box"
                               title="<?= Html::decode($category->title) ?>">
                                    <span class="img-wrap">
                                        <?= Html::img($category->getImage(), ['alt' => $category->title]) ?>
                                    </span>
                                <div class="caption" style="text-align: center; height: 70px"><span style="line-height: 35px"><?= Html::decode($category->title) ?></span></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
</section>
