<?php

use App\Helpers\Html;
use App\Helpers\Widgets\BreadcrumbsWidget;
use App\Helpers\Widgets\FrontendNavTd;
use App\Helpers\ArrayHelper;
use App\Helpers\SessionHelper;
use App\Helpers\Widgets\SearchRecruitmentWidget;

/**
 * @var \App\Libraries\BaseView $this
 * @var \App\Models\ContentModel $model
 */
?>

<?= FrontendNavTd::register($this); ?>
<div class="wrapper-fill">
    <article>
        <section id="main-content" class="employer-detail-page">
            <div class="jsx-2841670120 company-02 box-info-employer">
                <figure class="jsx-2841670120 company-02-fig ">
                    <img src="/images/bg-price.jpeg" alt="img-cover" class="jsx-2841670120">
                </figure>
                <div class="jsx-2841670120 company-02-info">
                    <div class="jsx-2841670120 container">
                        <div class="jsx-2841670120 company-02-box break-word">
                            <figure class="jsx-2841670120 company-02-box-fig"><img src="https://cdn.mywork.com.vn/images/default/2021/04/15/images/161845871425.png" alt="logo" class="jsx-2841670120"></figure>
                            <div class="jsx-2841670120 company-02-box-ttl"><?= $model->company_name ?>
                            </div>
                            <div class="jsx-2841670120 company-02-box-row">
                                <ul class="jsx-2841670120 list-feat company-info feat-info m-reset-ul mb-2 mb-md-0">
                                    <li class="jsx-2841670120 ex-address mr30 m-mr0"><span class="jsx-2841670120 ml-1"><i class="fas fa-map-marker-alt"></i> Địa chỉ: <?= $model->company_address ?></span>
                                    </li>
                                    <li class="jsx-2841670120 ex-sl mr30 m-mr0"><span class="jsx-2841670120 ml-1"><i class="fas fa-user-friends"></i> Quy mô: <?= $model->scales ?></span>
                                    </li>
                                </ul>
                                <div class="jsx-2841670120 mt-2">
                                    <span class="jsx-2841670120">
                                        <?= $model->intro ?>
                                    </span>
                                    <span class="jsx-2841670120 moreellipses">...</span>
                                    <div class="jsx-2841670120 text-right mt-20"><a href="#" class="jsx-2841670120 text-main cursor-pointer">Xem
                                            thêm<i class="jsx-2841670120 spr-icon-more-b ml-1"></i></a></div>
                                </div>
                                <div class="jsx-2841670120 company-02-box-social">
                                    <div class="jsx-2841670120 d-flex flex-column"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= $model->getUrl() ?>" class="btn btn-white-44 ex-icon-share" target="_blank"><i class="fas fa-share-alt"></i> Chia sẻ việc
                                            làm</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fullbox-01 m-pb0 m-pt10 box-job-of-employer">
                <div class="container fullbox-01-cont">
                    <div class="fullbox-01-ttl d-none d-sm-block">Vị trí đang tuyển dụng</div>
                    <div class="content-970">
                        <div class="scroll-into-view"></div>
                        <div class="jobslist-01 row saved-job-lst">
                            <div class="jobslist-01-cont">
                                <ul class="jobslist-01-ul ex-ntd-lst ex-notop">
                                    <?php if ($post_recruitment) : ?>
                                        <?php foreach ($post_recruitment as $post_rcm) :
                                            $province_info = $post_rcm->get_province_info($post_rcm->province);
                                        ?>
                                            <li class="jobslist-01-li">
                                                <div class="jobslist-01-row">
                                                    <div class="jobslist-01-row-left">
                                                        <div class="jobslist-01-row-ttl"><a href="<?= $post_rcm->getUrl() ?>"><?= $post_rcm->title ?></a></div>
                                                        <ul class="list-feat row">
                                                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ex-salary">
                                                                <i class="fas fa-dollar-sign"></i> Lương: <?= $post_rcm->wage ?>
                                                            </li>
                                                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ex-address">
                                                                <i class="fas fa-map-marker-alt"></i> Địa điểm: <?php echo $province_info->_name; ?>
                                                            </li>
                                                            <li class="col-xs-12 col-sm-4 col-md-4 col-lg-4 ex-date d-pc">
                                                                <i class="far fa-clock"></i> Hạn nộp: <?php echo date('d/m/Y', $post_rcm->the_deadline) ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="jobslist-01-row-right">
                                                        <?php if ($user_type == 'seeker') : ?>
                                                            <button class="btn btn-save-job fn-save-job " onclick="save_news_recruitment('<?php echo $post_rcm->id ?>','<?= $user_type ?>');"><span class="d-none d-sm-inline-block"><i class="far fa-heart" style="font-size: 18px;"></i> Lưu</span></button>
                                                        <?php else : ?>
                                                            <button class="btn btn-save-job fn-save-job " onclick="moveToLoginSeeker()"><span class="d-none d-sm-inline-block"><i class="far fa-heart" style="font-size: 18px;"></i> Lưu</span></button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-links container">
                <ul itemtype="https://schema.org/BreadcrumbList" itemscope="">
                    <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item" class="active" href="/"><span itemprop="name">Trang chủ</span></a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement"><a itemprop="item" class="active" href="/tuyen-dung"><span itemprop="name">Tuyển dụng</span></a>
                        <meta itemprop="position" content="2">
                    </li>
                    <li aria-current="page"><a>Công Ty Cp Đầu Tư Xây Dựng Hạ Tầng Và Giao Thông (Intracom)</a></li>
                </ul>
            </div>
            <div class="maps-box">
                <iframe title="google_map" width="100%" height="400" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAzzdmVQBufeKFfrSfZKTCjDdZ3rw3RTLY
        &amp;q=T%E1%BA%A7ng%2024%20t%C3%B2a%20nh%C3%A0%20Intracom%202%2C%20%C4%90%C6%B0%E1%BB%9Dng%20C%E1%BA%A7u%20Di%E1%BB%85n%2C%20Ph%C6%B0%E1%BB%9Dng%20Ph%C3%BAc%20Di%E1%BB%85n%2C%20H%C3%A0%20N%E1%BB%99i%2C%20Vi%E1%BB%87t%20Nam" allowfullscreen=""></iframe>
            </div>
            <div class="clearfix"></div>
        </section>
    </article>
</div>