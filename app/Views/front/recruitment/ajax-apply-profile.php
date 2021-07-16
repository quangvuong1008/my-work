<div class="title-nor d-mb" hidden id="countApplyProfileAjax"><?= $countCandidates ?></div>
<?php if ($user_profile_apply && !empty($user_profile_apply)) : ?>
    <?php foreach ($user_profile_apply as $key => $usPa) : ?>
        <div class="tablehs-01-row row">
            <div class="tablehs-01-row-td">
                <div class="tablehs-01-row-ttl d-flex align-items-start">
                    <label class="checkboxlb">
                        <div class="icheckbox_minimal-grey position-relative align-middle ">
                            <input type="checkbox" class="form-check-input checkbox_rows_apply" id="checkbox_rows_apply_<?= $usPa->id ?>" onclick="onclickCheckboxRowsAplly('checkbox_rows_apply_<?= $usPa->id ?>')" name=<?= $usPa->id ?>>
                            <label class="form-check-label" for="exampleCheck1"></label>
                        </div>
                    </label>
                    <div class="checkboxlb-black pl-2"><a target="_blank" rel="noreferrer" href="/trang-tuyen-dung/ho-so/<?= $usPa->id_user ?>/<?= $usPa->job_slug ?>.html" class="text-main text-main-hv text-main-visited"><span class="align-middle"><?= $usPa->job_title ?></span></a>
                        <p class="mb-1" style="font-weight: 700;"><?= $usPa->full_name ?></p>
                        <?php if ($usPa->is_censorship) : ?>
                            <p class="text-main-dark font400 mb-1 font-italic">
                                (Đã kiểm duyệt)</p>
                        <?php else : ?>
                            <p class="text-speci font400 mb-1 font-italic">(Chưa kiểm duyệt)</p>
                        <?php endif; ?>
                        <div class="jsx-835920710"><a class="fs-12 font400 color36 cursor-pointer text-main" onclick="showDialogUpdateNoteApply('<?= $usPa->id ?>', '<?= $usPa->note_apply ?>')"><i class="icon-ic-up-icon13 mr-1 align-middle"></i><span class="text-underline align-middle"><i class="far fa-file-alt" style="font-size: 12px; margin-right: 5px;"></i>Quản lý ghi chú</span></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tablehs-01-row-td"><a href="/tuyen-dung/viec-lam/<?= $usPa->id_news_rcm ?>/<?= $usPa->title_rcm ?>.html" target="_blank" class="jsx-835920710"><?= $usPa->title_rcm ?></a></div>
            <div class="tablehs-01-row-td"> <?php echo date('d-m-Y', $usPa->date_apply) ?></div>
            <?php for ($i = 1; $i <= 5; $i++) : ?>
                <div class="tablehs-01-row-td">
                    <label class="checkboxlb">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="checkbox_apply_<?= $usPa->id ?>_<?= $i ?>" <?php if ($i ==  $usPa->status_apply) echo "checked"; ?> onclick="ajaxUpdateStatusApply('<?= $usPa->id ?>', '<?= $usPa->status_apply ?>', '<?= $i ?>')">
                            <label class="form-check-label" for="exampleCheck1"></label>
                        </div>
                    </label>
                </div>
            <?php endfor; ?>
        </div>
    <?php endforeach; ?>
    <?php if ($totalPage > 1) : ?>
        <div class="page-01 pagination-not-bottom">
            <div class="page-01-block"><a onclick=movePageApplyProfile(<?php echo ($currenctPage - 1) ?>) class="btn btn-prev false <?= $currenctPage == 1 ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block"></i>Trang trước</span></a>
                <ul class="page-01-lst">
                    <?php if ($totalPage - $currenctPage > 3) : ?>
                        <?php if ($currenctPage <= 3) : ?>
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <li><a onclick=movePageApplyProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = $currenctPage - 2; $i <= $currenctPage + 2; $i++) : ?>
                                <li><a onclick=movePageApplyProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($currenctPage <= 3) : ?>
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li><a onclick=movePageApplyProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = $currenctPage - 2; $i <= $totalPage; $i++) : ?>
                                <li><a onclick=movePageApplyProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul><a onclick=movePageApplyProfile(<?php echo ($currenctPage + 1) ?>) class="btn btn-next false <?= $currenctPage == $totalPage ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block">Trang sau</span></a>
            </div>
        </div>
    <?php endif; ?>
<?php else : ?>
    <h5>Không kết quả nào được tìm thấy.</h5>
<?php endif; ?>