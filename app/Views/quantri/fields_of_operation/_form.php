<?php

use App\Helpers\Html;

/**
 * @var \App\Models\CategoryModel $model
 * @var \CodeIgniter\Validation\Validation $validator
 */
?>
<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="form-group">
            <label class="bmd-label-floating">Tiêu đề</label>
            <input type="text" name="title" autocomplete="off" class="form-control" autofocus
                   value="<?= $model->title ?>">
        </div>
        <div class="">
            <?php if ($validator): ?>
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 16px;">
                        <?php foreach ($validator->getErrors() as $error): ?>
                            <li><?= Html::decode($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="form-group">
                <label class="bmd-label-floating">Danh mục</label>
                <?= Html::hiddenInput('parent_id', $model->parent_id ?: 0) ?>
                <?= Html::dropDownList('parent_id', $model->parent_id, $model->getOperationOptions(), [
                    'class' => 'form-control',
                    'options' => [
//                    $model->getPrimaryKey() => ['disabled' => true],
                        $model->parent_id => ['disabled' => true],
                    ]
                ]) ?>
            </div>

            <div class="form-check">
                <?= Html::hiddenInput('is_lock', 0) ?>
                <label class="form-check-label">
                    <?= Html::checkbox('is_lock', $model->is_lock == 1, [
                        'value' => 1, 'class' => 'form-check-input'
                    ]) ?> Khoá
                    <span class="form-check-sign"><span class="check"></span></span>
                </label>
            </div>
        </div>
    </div>

</div>
