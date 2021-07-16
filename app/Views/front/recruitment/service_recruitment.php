<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\Widgets\MenuRecruitmentWidget;
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
                        <div class="main-colm m-mt10 mb15">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="fix-title-nor">Quản lý dịch vụ</div>
                                </div>
                                <div class="col-md-3 ml-auto"><a rel="noopener noreferrer"
                                                                 href="/quan-ly-dich-vu/danh-sach-ho-so-duoc-bao-hanh"
                                                                 target="_blank"
                                                                 class="btn btn-blue-46 ex-export w-100">Bảo hành gói
                                        lọc</a></div>
                                <div class="col-md-3 ml-auto pl-0"><a rel="noopener noreferrer" href="/bang-gia"
                                                                      target="_blank"
                                                                      class="btn btn-orange-46 ex-setting w-100">Đăng ký
                                        dịch vụ</a></div>
                            </div>
                            <div class="jsx-1636534922 job-manage-box-filter border-top border-bottom py-2">
                                <div class="jsx-1636534922 form-row">
                                    <div class="jsx-1636534922 col-md-4 col-xs-12">
                                        <div class="jsx-1636534922 form-control form-control-custom position-relative">
                                            <input type="text" placeholder="Nhập mã dịch vụ..."
                                                   class="jsx-1636534922 input-q" value="">
                                            <button class="jsx-1636534922 btn btn-q"><i
                                                        class="jsx-1636534922 icon-ic-search fs-20 align-middle"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="jsx-1636534922 col-md-4 col-xs-12">
                                        <select class="selectpicker form-control" name="scales"
                                                id="scales"
                                                data-live-search="true">
                                            <option value="">Tất cả ngành nghề</option>

                                            <option value="duoi_20_nguoi">Dưới 20 người</option>
                                            <option value="20_150_nguoi">20 - 150 người</option>
                                            <option value="150_300_nguoi">150 - 300 người</option>
                                            <option value="tren_300_nguoi">Trên 300 người</option>
                                        </select>
                                    </div>
                                    <div class="jsx-1636534922 col-md-4 col-xs-12">
                                        <select class="selectpicker form-control" name="scales"
                                                id="scales"
                                                data-live-search="true">
                                            <option value="">Tất cả nơi làm việc</option>

                                            <option value="duoi_20_nguoi">Dưới 20 người</option>
                                            <option value="20_150_nguoi">20 - 150 người</option>
                                            <option value="150_300_nguoi">150 - 300 người</option>
                                            <option value="tren_300_nguoi">Trên 300 người</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="fs-14 text-right py-3"><span>Số lần mua dịch vụ:<span
                                            class="text-speci font600 ml-1">1</span><span
                                            class="mx-1">|</span></span><span>Số gói đã mua:<span
                                            class="text-speci font600 ml-1">0</span><span
                                            class="mx-1">|</span></span><span>Gói chưa dùng:<span
                                            class="text-speci font600 ml-1">0</span><span
                                            class="mx-1">|</span></span><span>Gói đang dùng:<span
                                            class="text-speci font600 ml-1">0</span><span
                                            class="mx-1">|</span></span><span>Gói đang bảo lưu:<span
                                            class="text-speci font600 ml-1">0</span></span></div>
                            <div class="jsx-3417168051 mt-3 table-sale-order">
                                <table class="jsx-3417168051 table table-bordered">
                                    <thead class="jsx-3417168051">
                                    <tr class="jsx-3417168051">
                                        <th class="jsx-3417168051">Mã dịch vụ</th>
                                        <th class="jsx-3417168051">Tên gói</th>
                                        <th class="jsx-3417168051">Thời gian</th>
                                        <th class="jsx-3417168051">Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody class="jsx-3417168051">
                                    <tr class="jsx-1549892385">
                                        <td class="jsx-1549892385"><span class="jsx-1549892385 font600">200026206</span>
                                        </td>
                                        <td class="jsx-1549892385">Lọc hồ sơ mới<span class="jsx-1549892385 ml-1">(30 điểm)</span><span
                                                    class="jsx-1549892385 ml-1 text-speci-emp">(Gói tặng)</span></td>
                                        <td class="jsx-1549892385 text-center">2 tuần</td>
                                        <td class="jsx-1549892385">Đã hết hạn</td>
                                    </tr>
                                    <tr class="jsx-1549892385">
                                        <td class="jsx-1549892385"><span class="jsx-1549892385 font600">200026206</span>
                                        </td>
                                        <td class="jsx-1549892385">Trang ngành - Tuyển dụng nhanh</td>
                                        <td class="jsx-1549892385 text-center">2 tuần</td>
                                        <td class="jsx-1549892385">Đã hết hạn</td>
                                    </tr>
                                    <tr class="jsx-1549892385">
                                        <td class="jsx-1549892385"><span class="jsx-1549892385 font600">140096180</span>
                                        </td>
                                        <td class="jsx-1549892385">Icon Hot<span
                                                    class="jsx-1549892385 ml-1 text-speci-emp">(Gói tặng)</span></td>
                                        <td class="jsx-1549892385 text-center">2 tuần</td>
                                        <td class="jsx-1549892385">Đã hết hạn</td>
                                    </tr>
                                    <tr class="jsx-1549892385">
                                        <td class="jsx-1549892385"><span class="jsx-1549892385 font600">140096178</span>
                                        </td>
                                        <td class="jsx-1549892385">Trang ngành - Tuyển dụng tiêu điểm</td>
                                        <td class="jsx-1549892385 text-center">2 tuần</td>
                                        <td class="jsx-1549892385">Đã hết hạn</td>
                                    </tr>
                                    <tr class="jsx-1549892385">
                                        <td class="jsx-1549892385"><span class="jsx-1549892385 font600">140079910</span>
                                        </td>
                                        <td class="jsx-1549892385">Trang ngành - Tiêu điểm<span
                                                    class="jsx-1549892385 ml-1 text-speci-emp">(Gói tặng)</span></td>
                                        <td class="jsx-1549892385 text-center">2 tuần</td>
                                        <td class="jsx-1549892385">Đã hết hạn</td>
                                    </tr>
                                    <tr class="jsx-1549892385">
                                        <td class="jsx-1549892385"><span class="jsx-1549892385 font600">140079908</span>
                                        </td>
                                        <td class="jsx-1549892385">Trang ngành - Tuyển dụng nhanh</td>
                                        <td class="jsx-1549892385 text-center">2 tuần</td>
                                        <td class="jsx-1549892385">Đã hết hạn</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="jsx-3417168051 export-file mt25">
                                    <div class="export-file-left">
                                        <button class="btn btn-blue-46 ex-export w-100">Xuất file excel</button>
                                    </div>
                                    <div class="jsx-3417168051 export-file-right">
                                        <div class="jsx-3417168051 page-01 no-bor-top"></div>
                                    </div>
                                    <div class="jsx-3417168051 clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</article>

