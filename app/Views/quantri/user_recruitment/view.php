<?php

use App\Helpers\Html;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\FormRequestModel $model
 * @var \CodeIgniter\Validation\Validation $validator
 */
$this->title = 'Thông tin nhà tuyển dụng';
?>
<div class="row">
    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
        <div class="card">
            <div class="card-header card-header-info flex-align">
                <div>
                    <h4 class="card-title"><?= $this->title ?></h4>
                </div>
                <a href="<?= route_to('admin_user_recruitment') ?>" class="btn btn-round">Huỷ</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="row-actions">Avatar</th>
                            <td>
                                <figure class="jsx-1710786971 user-box-fig mt15 m-mt10"><img src="<?= $model->getAvt() ?>" width="120" height="120" alt="avatar" class="jsx-1710786971"></figure>
                            </td>
                        </tr>
                        <tr>
                            <th class="row-actions">Email</th>
                            <td><?= Html::a($model->email, "mailto:{$model->email}") ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Tên công ty</th>
                            <td><?= Html::decode($model->company_name) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Quy mô</th>
                            <td><?= Html::decode($model->scales) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Người liên hệ</th>
                            <td><?= Html::decode($model->contact_name) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Email liên hệ</th>
                            <td><?= Html::a($model->contact_email, "mailto:{$model->contact_email}") ?></td>

                        </tr>
                        <tr>
                            <th class="row-actions">SĐT liên hệ</th>
                            <td><?= Html::decode($model->contact_phone_number) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Website</th>
                            <td><?= Html::a($model->company_website) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Tỉnh thành</th>
                            <td><?= Html::decode($model->province) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Địa chỉ</th>
                            <td><?= Html::decode($model->contact_address) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Hình thức liên lạc</th>
                            <td><?= Html::decode($model->contact_form) ?></td>
                        </tr>
                        <tr>
                            <th class="row-actions">Giới thiệu</th>
                            <td><?= Html::decode($model->intro) ?></td>
                        </tr>

                        <tr>
                            <th class="row-actions">Tình trạng</th>
                            <td>
                                <strong class="<?= $model->status ?   'text-danger' : 'text-success' ?>">
                                    <?= $model->status  ? 'Đã duyệt' : 'Chưa duyệt' ?>
                                </strong>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="text-right">
                    <?= !$model->status ? Html::a(
                        'Duyệt nhà tuyển dụng',
                        route_to('admin_user_recruitment_update', $model->getPrimaryKey()),
                        [
                            'class' => 'btn btn-success btn-round',
                            'data-prompt' => 'Xác nhận duyệt nhà tuyển dụng này?',
                            'data-method' => 'post'
                        ]
                    ) : null ?>
                </div>
            </div>
        </div>
    </div>
</div>