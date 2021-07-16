<div class="tablehs-01-box">
    <div class="title-nor d-mb" hidden id="countMessSent_0"> (<?= $countMess ?>)</div>
    <div class="tablehs-01-head row d-none d-sm-flex hidden-xs">
        <div class="tablehs-01-head-th message-page__col-information text-left pl-0">Thông tin</div>
        <div class="tablehs-01-head-th message-page__col-created">Thời gian gửi</div>
        <div class="tablehs-01-head-th message-page__col-action pr-0" style="padding-left: 20px;">Hành động</div>
    </div>
    <?php if ($messData && !empty($messData)) : ?>
        <?php foreach ($messData as $key => $md) : ?>
            <div class="tablehs-01-row message-page__item row align-items-center mx-1 mx-md-0">
                <div class="tablehs-01-row-td d-flex align-items-center message-page__col-information" onclick="showModalMess('<?= $md->id ?>', -1)">
                    <div class="d-none d-md-block col-md-2 box-avatar hidden-xs"><img alt="avatar" src="/images/male_avatar.jpg" class="img-fluid">
                    </div>
                    <div class="col-12 px-1 px-md-3 col-md-10 message-page__col-information-title" style="padding-left: 1rem!important; padding-right: 1rem!important;">
                        <a class="d-flex-mess align-items-center">
                            <span class="text-ellipsis"><?= $md->header ?></span>
                        </a>
                        <div class="info-user mt-1"><i class="far fa-user" style="font-size: 13px; margin-right: 3px;"></i><span class="font500 align-middle">Gửi bởi: <?= $md->company_name ?></span></div>
                    </div>
                </div>
                <div class=" tablehs-01-row-td message-page__col-created pl-0-mb" onclick="showModalMess('<?= $md->id ?>', -1)">
                    <div class="d-flex align-items-start col-xs-12 fix-flex-time"><i class="far fa-clock mr-1" style="font-size: 13px; margin-top: 3px;"> </i>
                        <div class="text-left fix-flex-time"><span class="mr-1"><?php echo date('H:i:s', $md->date_send) ?></span><br class="d-mb-none"><span> <?php echo date('d-m-Y', $md->date_send) ?></span></div>
                    </div>
                </div>
                <div class="tablehs-01-row-td message-page__col-action align-items-center d-none d-md-flex hidden-xs">
                    <button class="btn btn-info mr-2" type="button" onclick="showModalMess('<?= $md->id ?>',  -1)"><i class="far fa-eye"></i>
                    </button>
                    <button class="btn btn-danger" type="button" onclick="showModalDeteleMess('<?= $md->id ?>')"><i class="far fa-trash-alt"></i></button>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>