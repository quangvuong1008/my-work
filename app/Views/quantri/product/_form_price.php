<?php

use App\Helpers\Html;

/**
 * @var \App\Models\CategoryModel $model
 * @var \CodeIgniter\Validation\Validation $validator
 */
?>

<form method="post" enctype="multipart/form-data" id="form-price" name="">
    <input type="hidden" name="product_id" id="product_id" value="<?php echo $model->getPrimaryKey() ?>">


    <div class="form-group">
        <label class="bmd-label-floating">Số tuần</label>
        <input type="text" name="title" autocomplete="off" class="form-control" autofocus
               value="" id="title">
    </div>
    <div class="form-group">
        <label class="bmd-label-floating">Giá gốc</label>
        <input type="text" name="price_origin" autocomplete="off" class="form-control" autofocus
               value="" id="price_origin">
    </div>
    <div class="form-group">
        <label class="bmd-label-floating">Giá khuyến mại</label>
        <input type="text" name="price_discount" autocomplete="off" class="form-control" autofocus
               value="" id="price_discount">
    </div>
    <div class="modal-footer">
        <input type="submit" value="Thêm">
    </div>
</form>
<div class="img-color-product" style="max-height: 300px; overflow-y: scroll">
    <table class="table table-bordered" id="dataTable">
        <tr class="text-center">
            <th>Số tuần </th>
            <th>Giá gốc</th>
            <th>Giá khuyến mại</th>
            <th>xóa</th>
        </tr>

    </table>
</div>