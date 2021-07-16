<div class="mt-3" id="mt-3-viewed">
    <div class="py-2 text-right fs-16">Tổng số hồ sơ đã xem thông tin liên hệ:<span class="ml-1 text-speci font600"><?= $countCandidates ?></span></div>
    <div class=" tablehs-01">
        <div class=" tablehs-01-box">
            <div class=" tablehs-01-head row d-none d-sm-flex">
                <div class="jsx-464138338 tablehs-01-head-th pl-0">Hồ sơ</div>
                <div class="jsx-464138338 tablehs-01-head-th">Thông tin liên hệ</div>
                <div class="jsx-464138338 tablehs-01-head-th">Ngày xem</div>
                <div class="jsx-464138338 tablehs-01-head-th">IP xem hồ sơ</div>
                <div class="jsx-464138338 tablehs-01-head-th">Số điểm</div>
                <div class="jsx-464138338 tablehs-01-head-th">Số điểm BH</div>
            </div>
            <?php if (!empty($user_profile_viewed)) : ?>
                <?php foreach ($user_profile_viewed as $usPv) : ?>
                    <div class=" tablehs-01-row row">
                        <div class="jsx-2897715243 tablehs-01-row-td">
                            <div class=" tablehs-01-row-ttl pl-0">
                                <div class=" tablehs-01-row-job"><a href="/nha-tuyen-dung/ho-so/<?= $usPv->user_id ?>/<?= $usPv->slug ?>.html" target="_blank" rel="noreferrer noopenner" class=""><span class=" text"><?= $usPv->title ?? '' ?></span></a>
                                </div>
                                <div class=" tablehs-01-row-em"><a href="/nha-tuyen-dung/ho-so/<?= $usPv->user_id ?>/<?= $usPv->slug ?>.html" target="_blank" rel="noreferrer noopenner" class=""><?= $usPv->full_name ?? '' ?></a></div>
                            </div>
                        </div>
                        <div class="jsx-2897715243 tablehs-01-row-td text-left">
                            <div class=" text-ellipsis"><i class="fa fa-envelope-o style-icon"></i><span title="<?= $usPv->email ?>" class=""><?= $usPv->email ?? '' ?></span>
                            </div>
                            <div class=" text-ellipsis"><i class="fa fa-phone style-icon"></i><span class=""><?= $usPv->phone_number ?? '' ?></span></div>
                        </div>
                        <div class="jsx-2897715243 tablehs-01-row-td ex-date"><?php echo date('d-m-Y', $usPv->updated_at) ?></div>
                        <div class="jsx-2897715243 tablehs-01-row-td ex-area"><?= $usPv->ip_view ?? '' ?></div>
                        <div class="jsx-2897715243 tablehs-01-row-td ex-experi"><?= $usPv->scores ?? '' ?></div>
                        <div class="jsx-2897715243 tablehs-01-row-td ex-experi"><?= $usPv->scores_BH ?? '' ?></div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p style="margin-top: 15px;">Không kết quả nào được tìm thấy.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($totalPage > 1) : ?>
        <div class="page-01 pagination-not-bottom">
            <div class="page-01-block"><a onclick=movePageViewProfile(<?php echo ($currenctPage - 1) ?>) class="btn btn-prev false <?= $currenctPage == 1 ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block"></i>Trang trước</span></a>
                <ul class="page-01-lst">
                    <?php if ($totalPage - $currenctPage > 3) : ?>
                        <?php if ($currenctPage <= 3) : ?>
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <li><a onclick=movePageViewProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = $currenctPage - 2; $i <= $currenctPage + 2; $i++) : ?>
                                <li><a onclick=movePageViewProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <?php if ($currenctPage <= 3) : ?>
                            <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                                <li><a onclick=movePageViewProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php else : ?>
                            <?php for ($i = $currenctPage - 2; $i <= $totalPage; $i++) : ?>
                                <li><a onclick=movePageViewProfile(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul><a onclick=movePageViewProfile(<?php echo ($currenctPage + 1) ?>) class="btn btn-next false <?= $currenctPage == $totalPage ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block">Trang sau</span></a>
            </div>
        </div>
    <?php endif; ?>
</div>