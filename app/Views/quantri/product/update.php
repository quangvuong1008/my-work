<?php
/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ProjectModel $model
 * @var \CodeIgniter\Validation\Validation $validator
 */
$this->title = 'Cập nhật Sản phẩm';
?>
<div class="card">
    <div class="card-header card-header-info flex-align">
        <div>
            <h4 class="card-title"><?= $this->title ?></h4>
        </div>
        <a href="<?= route_to('admin_product') ?>" data-method="get"
           data-prompt="Những thay đổi đều chưa được lưu. Bạn có muốn tiếp tục?" class="btn btn-round">Huỷ</a>
        <a href="<?= route_to('admin_product_delete', $model->getPrimaryKey()) ?>" data-method="post"
           data-prompt="Bạn có chắc sẽ xoá đi mục này?" class="btn btn-danger btn-round">Xoá</a>
    </div>
    <div class="card-body">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                   aria-controls="nav-home" aria-selected="true">Sản phẩm</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                   aria-controls="nav-profile" aria-selected="false" onclick="upload_price(<?= $model->getPrimaryKey() ?>,'<?= base_url() ?>')">Số tuần và giá</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                 aria-labelledby="nav-home-tab">
                <form action="<?= route_to('admin_product_update', $model->getPrimaryKey()) ?>" method="post"
                      enctype="multipart/form-data">

                    <?= $this->import('_form', ['model' => $model, 'validator' => $validator]) ?>

                    <div class="card-bottom-actions">
                        <div class="flex-row" id="add-holder"></div>
                        <button class="btn btn-info btn-round" type="submit">Cập nhật</button>
                    </div>
                </form>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                 aria-labelledby="nav-profile-tab" >
                <?= $this->import('_form_price',['model' => $model])?>
            </div>
        </div>
    </div>