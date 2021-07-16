

<form action="/tuyen-dung/">
    <div class="full-white-01">
        <div class="search-01-row row container pb-3">
            <div class="div-input">
                <?php   $selected = '';
                if($search_param['q']){
                    $selected = $search_param['q'];
                } ?>
                <input type="text" class="form-control" name="q" value="<?php echo $selected; ?>"
                       placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc..."></div>
            <div class="div-sl-tk ex-sl-nn">

                <select class="selectpicker form-control" name="job_id" id="job_id" data-live-search="true" style="width: 240px;" value="<?= $job_navbar ?>">
                    <option value="">Tất cả ngành nghề</option>
                    <?php if ($job) : ?>
                        <?php foreach ($job as $j) : ?>
                            <option value="<?= $j->id ?>" <?php if ($j->id == $job_navbar) echo "selected" ?>><?= $j->title ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="div-sl-tk ex-sl-tt">

                <select class="selectpicker form-control" name="province_id" id="province_id" data-live-search="true" value="<?= $province_navbar ?>">
                    <option value="">Tất cả nơi làm việc</option>
                    <?php if ($province) : ?>
                        <?php foreach ($province as $prv) : ?>
                            <option value="<?= $prv->id ?>" <?php if ($prv->id == $province_navbar) echo "selected" ?>><?= $prv->_name ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="div-btn text-center">
                <button type="submit" class="btn btn-search mb-2">Tìm việc</button>
                <a class="pt-3 fs-14" href="/viec-lam/tim-kiem-nang-cao"><i
                            class="icon-zoom_in text-speci fs-24 align-middle"></i><span class="text-speci font600">Tìm kiếm nâng cao</span></a>
            </div>
        </div>
    </div>
</form>


