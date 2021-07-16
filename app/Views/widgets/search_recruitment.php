<form action="<?= base_url() . '/nha-tuyen-dung/ung-vien?page=1' ?>" method="post">
    <div class="full-white-01 mt80  ex-ntd-page">
        <div class="search-01-row row container">
            <div class="div-input">
                <input type="text" class="form-control" name="search_navbar" id="search_navbar" placeholder="Tiêu đề hồ sơ, vị trí, địa điểm làm viêc,..." value="<?= $search_navbar ?>">
            </div>
            <div class="div-sl-tk ex-sl-nn">
                <select class="selectpicker form-control" name="job_navbar" id="job_navbar" data-live-search="true" style="height: 200px;" value="<?= $job_navbar ?>">
                    <option value="">Tất cả ngành nghề</option>
                    <?php if ($job) : ?>
                        <?php foreach ($job as $j) : ?>
                            <option value="<?= $j->id ?>" <?php if ($j->id == $job_navbar) echo "selected" ?>><?= $j->title ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="div-sl-tk ex-sl-tt">
                <select class="selectpicker form-control" name="province_navbar" id="province_navbar" data-live-search="true" value="<?= $province_navbar ?>">
                    <option value="">Tất cả nơi làm việc</option>
                    <?php if ($province) : ?>
                        <?php foreach ($province as $prv) : ?>
                            <option value="<?= $prv->id ?>" <?php if ($prv->id == $province_navbar) echo "selected" ?>><?= $prv->_name ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="div-btn">
                <button type="submit" id="submit_navbar" class="btn btn-search">Tìm hồ sơ</button>
            </div>
        </div>
    </div>
</form>