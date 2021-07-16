 <?php if (!$userProfile || empty($userProfile)) : ?>
     <div class="empty-block">
         <img src="/images/no-content.jpg" alt="No content" />
         <h4>Không có Ứng viên nào!</h4>
     </div>
 <?php else : ?>
     <div class="ttl-big-blue b-none text-main"><?= $countCandidates ?> hồ sơ được tìm thấy</div>
     <div class="tablehs-01">
         <div class="tablehs-01-box">
             <div class="tablehs-01-head row d-none d-sm-flex hidden-xs">
                 <div class="tablehs-01-head-th">Hồ sơ</div>
                 <div class="tablehs-01-head-th">Mức lương</div>
                 <div class="tablehs-01-head-th">Khu vực</div>
                 <div class="tablehs-01-head-th">Kinh nghiệm</div>
                 <div class="tablehs-01-head-th">Ngày cập nhật</div>
             </div>
             <?php if (!empty($userProfile)) : ?>
                 <?php foreach ($userProfile  as $key => $usP) :  ?>

                     <div class="tablehs-01-row row">
                         <div class="tablehs-01-row-td pb-2">
                             <div class="tablehs-01-row-ttl pl-0-mb">
                                 <button class="btn tablehs-01-btnsave fn-save-job" onclick="ajaxChangeFavourite('<?= $usP->id ?>', '<?= $user_recr_id ?>', '<?= $key ?>','<?= $user_type ?>')">
                                     <?php if ($userRecruitment->get_user_profile_saved($usP->id, $user_recr_id)) : ?>
                                         <i id="favourite_<?= $key ?>" class="fa fa-heart" style="font-size: 18px;color:#6282ae;"></i>
                                         <i id="not_favourite_<?= $key ?>" class="far fa-heart" style="font-size: 18px;display: none;"></i>
                                     <?php else : ?>
                                         <i id="favourite_<?= $key ?>" class="fa fa-heart" style="font-size: 18px;color:#6282ae;display: none;"></i>
                                         <i id="not_favourite_<?= $key ?>" class="far fa-heart" style="font-size: 18px;"></i>
                                     <?php endif; ?>
                                 </button>
                                 <div class="tablehs-01-row-job">
                                     <a target="_blank" class="text-ellipsis d-pc" href="/nha-tuyen-dung/ho-so/<?= $usP->id ?>/<?= $usP->slug ?>.html">
                                         <i class="fa fa-paperclip" style="font-size: 18px; opacity: 0.75;"></i>
                                         <span class="align-middle"><?= $usP->title_job ?></span>
                                     </a>
                                     <a target="_blank" class="text-ellipsis d-mb" href="/nha-tuyen-dung/ho-so/<?= $usP->id ?>/<?= $usP->slug ?>.html">
                                         <i class="fa fa-paperclip" style="font-size: 18px; opacity: 0.75;"></i>
                                         <span class="align-middle"><?= $usP->title_job ?></span>
                                     </a>
                                     <div class="info-user mt-2">
                                         <i class="far fa-user" style="font-size: 18px;"></i>
                                         <span class="font500 align-middle">
                                             <?= $usP->full_name ?>
                                             <?php if ($userRecruitment->get_user_profile_viewed($usP->id, $user_recr_id)) : ?>
                                                 <span style="padding-left: 2px;background-color: grey;color: #fff;border-radius: 3px;width: 39px;font-size: 10px;">Đã xem</span>
                                             <?php endif; ?>
                                         </span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tablehs-01-row-td ex-salary"><?= $usP->salary ?></div>
                         <div class="tablehs-01-row-td ex-area text-ellipsis"><?= $usP->_name ?></div>
                         <div class="tablehs-01-row-td ex-experi"><?= $usP->experience ?></div>
                         <div class="tablehs-01-row-td ex-date"><?php echo date('d-m-Y', $usP->salary_date) ?></div>
                     </div>

                 <?php endforeach; ?>
             <?php else : ?>
                 <p style="margin-top: 15px;">Không kết quả nào được tìm thấy.</p>
             <?php endif; ?>
         </div>
     </div>
 <?php endif; ?>
 <?php if ($totalPage > 1) : ?>
     <div class="page-01 pagination-not-bottom">
         <div class="page-01-block"><a onclick=movePageCandidate(<?php echo ($currenctPage - 1) ?>) class="btn btn-prev false <?= $currenctPage == 1 ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block">Trang trước</span></a>
             <ul class="page-01-lst">
                 <?php if ($totalPage - $currenctPage > 3) : ?>
                     <?php if ($currenctPage <= 3) : ?>
                         <?php for ($i = 1; $i <= 5; $i++) : ?>
                             <li><a onclick=movePageCandidate(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                         <?php endfor; ?>
                     <?php else : ?>
                         <?php for ($i = $currenctPage - 2; $i <= $currenctPage + 2; $i++) : ?>
                             <li><a onclick=movePageCandidate(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                         <?php endfor; ?>
                     <?php endif; ?>
                 <?php else : ?>
                     <?php if ($currenctPage <= 3) : ?>
                         <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                             <li><a onclick=movePageCandidate(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                         <?php endfor; ?>
                     <?php else : ?>
                         <?php for ($i = $currenctPage - 2; $i <= $totalPage; $i++) : ?>
                             <li><a onclick=movePageCandidate(<?php echo $i ?>) class="btn <?= $i == $currenctPage ? 'active' : 'false' ?>"><?= $i ?></a></li>
                         <?php endfor; ?>
                     <?php endif; ?>
                 <?php endif; ?>
             </ul><a onclick=movePageCandidate(<?php echo ($currenctPage + 1) ?>) class="btn btn-next false <?= $currenctPage == $totalPage ? 'disabled' : 'enable' ?>"><span class="d-none d-sm-inline-block">Trang sau</span></a>
         </div>
     </div>
 <?php endif; ?>