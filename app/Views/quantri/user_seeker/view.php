<?php

use App\Helpers\Html;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\FormRequestModel $model
 * @var \CodeIgniter\Validation\Validation $validator
 */
$this->title = 'Thông tin người tuyển dụng';
?>
<div class="row">
    <div class="col-lg-6 col-md-6 offset-lg-3 offset-md-3">
        <div class="card">
            <div class="card-header card-header-info flex-align">
                <div>
                    <h4 class="card-title"><?= $this->title ?></h4>
                </div>
                <a href="<?= route_to('admin_user_seeker') ?>" class="btn btn-round">Huỷ</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th class="row-actions">Họ tên</th>
                        <td><?= Html::decode($model->fullname) ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Email</th>
                        <td><?= Html::a($model->email, "mailto:{$model->email}") ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Số điện thoại</th>
                        <td><?= Html::decode($model->phone) ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Giới tính</th>
                        <td><?= Html::decode($model->sex) ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Hôn nhân</th>
                        <td><?= Html::decode($model->love) ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Địa chỉ</th>
                        <td><?= Html::decode($model->address) ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Ngày sinh</th>
                        <td><?= Html::decode($model->birthday) ?></td>
                    </tr>
                    <tr>
                        <th class="row-actions">Tình trạng</th>
                        <td>
                            <strong class="<?= $model->status ?   'text-danger':'text-success' ?>">
                                <?= $model->status  ? 'Đã duyệt' : 'Chưa duyệt' ?>
                            </strong>
                        </td>
                    </tr>

                    </tbody>
                </table>
                <div class="text-right">
                    <?= !$model->status ? Html::a('Duyệt ứng viên',
                        route_to('admin_user_seeker_update', $model->getPrimaryKey()),
                        [
                            'class' => 'btn btn-success btn-round',
                            'data-prompt' => 'Xác nhận duyệt ứng viên này?',
                            'data-method' => 'post'
                        ]
                    ) : null ?>
                </div>
            </div>
        </div>
    </div>
</div>