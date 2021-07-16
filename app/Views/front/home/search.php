<?php

use App\Helpers\Html;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\RouterUrlModel[] $models
 * @var \CodeIgniter\Pager\Pager $pager
 */
$this->title = 'Tìm kiếm';
?>
<div class="container">
    <?php if ($models && !empty($models)): ?>
        <div class="row">
            <?php foreach ($models as $model): ?>
                <div class="col-xs-12 col-md-3">
                    <a href="<?= $model->getUrl() ?>" class="product-box">
                        <div class="img-wrap">
                            <?= Html::img($model->getImage(), ['alt' => $model->original_title]) ?>
                        </div>
                        <p><?= Html::decode($model->original_title) ?></p>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center"><?= $pager->links() ?></div>
    <?php endif; ?>
</div>
