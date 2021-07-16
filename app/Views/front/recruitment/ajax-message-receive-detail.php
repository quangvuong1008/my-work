<div class="modal-header">
    <h6 class="text-black font600 fs-20" id="exampleModalLabel"><?= $messDetail->header ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
</div>
<div class="modal-body">
    <div class="rely-message__header d-flex">
        <div class="rely-message__header-left d-flex w-75">
            <div class="rely-message__header-left__avatar"><img alt="avatar" src="/images/male_avatar.jpg" class="img-fluid"></div>
            <div class="rely-message__header-left__info ml-2">
                <?php if ($type != '-1') : ?>
                    <p><b class="mr-1">Người gửi:</b><b><?= $messDetail->full_name ?></b></p>
                    <p class="mb-0"><b class="mr-1">Đến:</b><b><?= $messDetail->company_name ?></b></p>
                <?php else : ?>
                    <p><b class="mr-1">Người gửi:</b><b><?= $messDetail->company_name ?></b></p>
                    <p class="mb-0"><b class="mr-1">Đến:</b><b><?= $messDetail->full_name ?></b></p>
                <?php endif; ?>

            </div>
        </div>
        <div class="rely-message__header-right ml-auto">
            <div class="d-flex align-items-center"><i class="far fa-clock mr-1" style="font-size: 13px;"></i>
                <p class="mb-0"><?php echo date('d-m-Y', $messDetail->date_send) ?>
            </div>
        </div>
    </div>
    <div class="rely-message__content my-3 fs-15">
        <div id="content_mess_detail">
            <?= $messDetail->content ?>
        </div>
    </div>