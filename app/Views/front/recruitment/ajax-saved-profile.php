<div class="mt-3" style="background-color: #fff; margin-top: 0px;">
    <div class="title-nor d-mb" hidden id="countSavedProfileAjax"><?= $countCandidates ?></div>
    <div class="title-nor d-mb">Hồ sơ đã lưu</div>
    <div class="tablehs-01">
        <div class="tablehs-01-box">
            <div class="tablehs-01-head row d-none d-sm-flex">
                <div class="tablehs-01-head-th">Hồ sơ</div>
                <div class="tablehs-01-head-th">Danh mục</div>
                <div class="tablehs-01-head-th">Ghi chú</div>
                <div class="tablehs-01-head-th">Ngày lưu</div>
                <div class="tablehs-01-head-th">Hành động</div>
            </div>
            <?php if (!empty($user_profile_saved)) : ?>
                <?php foreach ($user_profile_saved as $key => $usPs) : ?>
                    <div class="tablehs-01-row row" id="user_profile_saved_<?= $key ?>">
                        <div class="tablehs-01-row-td">
                            <div class="tablehs-01-row-ttl pl-0">
                                <button class="btn tablehs-01-btnsave fn-save-job ex-active d-mb" onclick="ajaxDeleteFavourite('<?= $user_type ?>', '<?= $usPs->user_profile_id ?>', '<?= $usPs->saved_by ?>','<?= $key ?>', 'remove')">
                                    <i id="favourite_<?= $key ?>" class="fa fa-heart" style="font-size: 18px;color:#6282ae;"></i>
                                </button>
                                <div class="tablehs-01-row-em">
                                    <div class="tablehs-01-row-job">
                                        <div class="d-pc">
                                            <a href="/nha-tuyen-dung/ho-so/<?= $usPs->user_id ?>/<?= $usPs->slug ?>.html" target="_blank" title="" class="jsx-4111241229"><?= $usPs->title ?? '' ?></a>
                                        </div>
                                        <div class="d-mb">
                                            <a href="/nha-tuyen-dung/ho-so/<?= $usPs->user_id ?>/<?= $usPs->slug ?>.html" target="_blank" title="" class="jsx-4111241229"><?= $usPs->title ?? '' ?></a>
                                        </div>
                                    </div>
                                    <a href="/nha-tuyen-dung/ho-so/<?= $usPs->user_id ?>/<?= $usPs->slug ?>.html" target="_blank" title="" class="jsx-4111241229"><?= $usPs->full_name ?? '' ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="tablehs-01-row-td ex-salary">
                            <span class="d-pc"><?= $usPs->category ?? '' ?></span>
                            <span class="d-mb"><?= $usPs->salary ?? '' ?></span>
                        </div>
                        <div class="tablehs-01-row-td ex-area text-left">
                            <span class="d-pc"><?= $usPs->note ?? '' ?></span>
                            <span class="d-mb"><?= $usPs->name_province ?? '' ?></span>
                        </div>
                        <div class="tablehs-01-row-td ex-experi">
                            <span class="d-pc">
                                <?php echo date('d-m-Y', $usPs->updated_at) ?>
                            </span>
                            <span class="d-mb">
                                <?= $usPs->experience ?? '' ?>
                            </span>
                        </div>
                        <div class="tablehs-01-row-td ex-date">
                            <button id="favourite" type="button" class="jsx-4111241229 btn btn-white-44 ex-icon-like ex-active mb-2" onclick="ajaxDeleteFavourite('<?= $user_type ?>', '<?= $usPs->user_profile_id ?>', '<?= $usPs->saved_by ?>','<?= $key ?>', 'remove')">
                                <i class="fa fa-heart" style="font-size: 18px;color:#6282ae;"></i>
                            </button>
                            <button type="button" class="jsx-4111241229 btn btn-white-44 ex-edit" onclick="showDialogSavedProfile('<?= $usPs->cat_id ?>', '<?= $usPs->note ?>', '<?= $usPs->user_profile_id ?>', '<?= $usPs->saved_by ?>')">
                                <i class="far fa-edit"></i>
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p style="margin-top: 15px;">Không kết quả nào được tìm thấy.</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="export-file mt25">
        <!--        <div class="export-file-left d-none d-sm-block">-->
        <!--            <button class="btn btn-blue-46 ex-export w-100 font400" onclick="showDialogExportCSV()"><i class="far fa-file-alt" style="font-size: 20px; margin-right: 5px;"></i>Xuất file excel</button>-->
        <!--        </div>-->
        <div class="export-file-right">
            <div class="page-01 no-bor-top"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <?php if ($totalPage > 1) : ?>
        <div class="page-01 pagination-not-bottom">
            <div class="page-01-block"><a onclick=movePageSaveProfile(<?php echo ($currenctPage - 1) ?>) class="btn btn-prev false <?= $currenctPage == 1 ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block"></i>Trang trước</span></a>
                <ul class="page-01-lst">
                    <?php if ($totalPage - $currenctPage > 3) : ?>
                        <?php if ($currenctPage <= 3) : ?>
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <li><a onclick=movePageSaveProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = $currenctPage - 2; $i <= $currenctPage + 2; $i++) : ?>
                                <li><a onclick=movePageSaveProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($currenctPage <= 3) : ?>
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li><a onclick=movePageSaveProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = $currenctPage - 2; $i <= $totalPage; $i++) : ?>
                                <li><a onclick=movePageSaveProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul><a onclick=movePageSaveProfile(<?php echo ($currenctPage + 1) ?>) class="btn btn-next false <?= $currenctPage == $totalPage ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block">Trang sau</span></a>
            </div>
        </div>
    <?php endif; ?>
</div>