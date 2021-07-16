<?php

use App\Helpers\Html;
use App\Helpers\Widgets\MenuRecruitmentWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\SearchRecruitmentWidget;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>
<?= FrontendNavTd::register($this); ?>
<article>
    <section class="new-homepage">
        <div class="main-2-cols mt30 m-mt0 m-mb0">
           <?= SearchRecruitmentWidget::register($this, $province, $job); ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 col-1-ps d-none d-sm-block">
                        <?= MenuRecruitmentWidget::register($this); ?>

                    </div>
                    <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 col-3-ps">
                        <div class="main-colm my-3">
                            <div class="mb-3"><span>Quý khách đang sử dụng tài khoản</span><b
                                        class="ml-1 text-uppercase text-red">Miễn
                                    phí</b><span>.</span><span class="ml-1">Hiệu quả tuyển dụng thấp do bị hạn chế số lượng tin đăng - vị trí đăng tin kém nổi bật, khó tiếp cận Người tìm việc và bị giới hạn nhiều quyền lợi khác.</span>
                            </div>
                            <div><a class="btn btn-orange-46 font600 w-max-content" target="_blank" href="/bang-gia">Tìm
                                    hiểu và nâng cấp
                                    tài khoản &gt;&gt;</a></div>
                        </div>
                        <div class="main-colm box-top-job">
                            <div class="title-nor">Quản lý tin tuyển dụng</div>
                            <div class="box-noti-01 font15">
                                <div class="font15 box-noti-01-lst">
                                    <ul class="row p0">
                                        <li class="col-md-3 font600"><span>Tổng tin tuyển dụng:</span><span
                                                    class="text-red ml-1">6</span>
                                        </li>
                                        <li class="col-md-3 font600"><span>Tổng tin phí:</span><span
                                                    class="text-red ml-1">0</span></li>
                                        <li class="col-md-3 font600"><span>Tin không phí:</span><span
                                                    class="text-red ml-1">6</span></li>
                                        <li class="col-md-3 font600"><span>Tin tặng:</span><span
                                                    class="text-red ml-1">0</span></li>
                                    </ul>
                                </div>
                                <a class="btn btn-orange-46 ex-edit w-auto-40 font17 m-w100p m-p0 mt-2"
                                   href="/nha-tuyen-dung/dang-tin">Tạo
                                    tin tuyển dụng mới</a></div>
                        </div>
                        <div class="main-colm mt-3 pt-0-mb">
                            <div class="jsx-1989958923 d-md-flex justify-content-between job-manage-box-filter d-mb-none">
                                <div class="div-input fix-search-manager">
                                    <input type="text" class="form-control" name="q"
                                           placeholder="Tiêu đề công việc,...">
                                </div>
                                <div class="jsx-1989958923 w135 fix-search-manager">
                                    <select class="selectpicker form-control" name="scales"
                                            id="scales"
                                            data-live-search="true">
                                        <option value="">Trạng thái</option>

                                        <option value="duoi_20_nguoi">Dưới 20 người</option>
                                        <option value="20_150_nguoi">20 - 150 người</option>
                                        <option value="150_300_nguoi">150 - 300 người</option>
                                        <option value="tren_300_nguoi">Trên 300 người</option>
                                    </select>
                                </div>
                                <div class="jsx-1989958923 w135 fix-search-manager">
                                    <select class="selectpicker form-control" name="scales"
                                            id="scales"
                                            data-live-search="true">
                                        <option value="">Hạn nộp</option>

                                        <option value="duoi_20_nguoi">Dưới 20 người</option>
                                        <option value="20_150_nguoi">20 - 150 người</option>
                                        <option value="150_300_nguoi">150 - 300 người</option>
                                        <option value="tren_300_nguoi">Trên 300 người</option>
                                    </select>
                                </div>
                                <div class="jsx-1989958923 fix-search-manager">
                                    <button class="jsx-1989958923 btn btn-blue-46 ex-export">Xuất file Excel</button>
                                </div>
                            </div>
                            <div class="list-news">
                                <div class="jobslist-01 row">
                                    <div class="scroll-into-view"></div>
                                    <div class="jobslist-01-cont fix-jobslist-01-cont-manager">
                                        <?php if ($rcm_post): ?>
                                            <ul class="jobslist-01-ul">
                                                <?php foreach ($rcm_post as $rcmp): ?>
                                                    <li class="jsx-3108933668 jobslist-01-li">
                                                        <div class="jsx-3108933668 jobslist-01-row">
                                                            <div class="jsx-3108933668 jobslist-01-row-left">
                                                                <div class="jsx-3108933668 jobslist-01-row-ttl"><a
                                                                            class="jsx-3108933668 "
                                                                            href="/nha-tuyen-dung/xem-truoc-tin-dang?id=100038864"><?= $rcmp->title ?></a>
                                                                </div>
                                                                <ul class="jsx-3108933668 list-feat row">
                                                                    <li class="jsx-3108933668 col-6 col-sm-3 col-md-3 col-lg-3 pl-0">
                                                                        <i class="fas fa-check"></i><span
                                                                                class="jsx-3108933668 align-middle"> Lượt nộp: 2</span><a
                                                                                class="jsx-3108933668 txt-bluebright d-none d-sm-inline ml-1 font-italic align-middle"
                                                                                href="/nha-tuyen-dung/ho-so-da-ung-tuyen?job_id=100038864">Xem</a>
                                                                    </li>
                                                                    <li class="jsx-3108933668 col-6 col-sm-3 col-md-3 col-lg-3 pl-0">
                                                                        <i class="far fa-eye"></i>
                                                                        <span class="jsx-3108933668 align-middle"> Lượt xem: <?= $rcmp->view ?></span>
                                                                    </li>
                                                                    <li class="jsx-3108933668 col-6 col-sm-3 col-md-3 col-lg-3 pl-0">
                                                                        <i class="far fa-clock"></i>
                                                                        <span class="jsx-3108933668 d-pc align-middle mr-1">Hạn nộp:</span>
                                                                        <span class="jsx-3108933668 align-middle"><?php echo date('d/m/Y', $rcmp->the_deadline) ?></span>
                                                                    </li>
                                                                    <li class="jsx-3108933668 col-6 col-sm-3 col-md-3 col-lg-3 pl-0">
                                                                        <i class="far fa-hourglass"></i>
                                                                        <span class="jsx-3108933668 d-pc align-middle mr-1">Thao tác:</span>
                                                                        <span class="jsx-3108933668 align-middle">
                                                                             <?= Html::tag('i',
                                                                                 $rcmp->status == 0 ? '<i class="fas fa-comment-alt"></i>' : '<i class="fas fa-tasks"></i>',
                                                                                 ['class' => [
                                                                                     'material-icons inline-icon',
                                                                                     $rcmp->status == 0 ? 'text-danger' : 'text-success'
                                                                                 ]]
                                                                             ) ?>
                                                                        </span>
                                                                        <span class="jsx-3108933668 align-middle">
                                                                                  <a href="<?= base_url() . '/nha-tuyen-dung/sua-tin/' . $rcmp->id ?>"
                                                                                     class=" btn-just-icon"
                                                                                     data-method="post"
                                                                                     data-prompt="Bạn có chắc sẽ xoá đi mục này?">
                                                                                        <i class="fas fa-edit edit_user_post"
                                                                                           title="sửa"></i>
                                                                                  </a>
                                                                        </span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
