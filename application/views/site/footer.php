<footer class="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ft-info">
          <div class="ft-block">
            <?php if($infosetting->tieudefooter1):?>
            <strong class="strong"><span class="span"><?=$infosetting->tieudefooter1?></span></strong>
            <?php endif;?>
            <div class="ft-block">
              <?php if($infosetting->footer1):?>
                <div class="about-info"><?=$infosetting->footer1?></div>
              <?php endif;?>
              
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ft-info">
          <div class="ft-block">
            <?php if($infosetting->tieudefooter2):?>
            <strong class="strong"><span class="span"><?=$infosetting->tieudefooter2?></span></strong>
            <?php endif;?>
            <div class="ft-block-body">
              <?php if($infosetting->footer2):?>
                <div class="about-info"><?=$infosetting->footer2?></div>
              <?php endif;?>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ft-info">
          <div class="ft-block">
            <?php if($infosetting->tieudefooter3):?>
            <strong class="strong"><span class="span"><?=$infosetting->tieudefooter3?></span></strong>
            <?php endif;?>
            <div class="ft-block-body" style="margin-bottom: 15px;">
              <?php if($infosetting->facebook):?>
                <div class="block-face-footer">
                  <div class="fb-page" data-width="600" data-href="<?=$infosetting->facebook?>" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$infosetting->facebook?>" class="fb-xfbml-parse-ignore"><a href="<?=$infosetting->facebook?>"></a></blockquote></div>
                </div>
                <?php endif;?>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 ft-info">
          <?php if($infosetting->tieudefooter4):?>
            <strong class="strong"><span class="span"><?=$infosetting->tieudefooter4;?></span></strong>
            <?php endif;?>
            <div class="ft-block-body" >
              <?php if($count_user_online):?>
                <div class="about-info">Đang online: <?=$count_user_online?></div>
              <?php endif;?>
              <?php if($today_visitors):?>
                <div class="about-info">Truy cập trong ngày: <?=number_format($today_visitors)?></div>
              <?php endif;?> 
              
              <?php if($month_visitors):?>
                <div class="about-info">Truy cập trong tháng: <?=number_format($month_visitors)?></div>
              <?php endif;?>
              <?php if($all_visitors):?>
                <div class="about-info">Tổng truy cập: <?=number_format($all_visitors)?></div>
              <?php endif;?>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bot">
    <div class="container">
      <p class="text-center">© 2019 - Bản quyền thuộc về CTY TNHH THƯƠNG MẠI DỊCH VỤ KỸ THUẬT TIN HỌC VIỄN THÔNG</p>
      <div class="fbchatbox">
        <div class="fb-page fb-page1" data-href="<?=$infosetting->facebook?>" data-small-header="true" data-adapt-container-width="false" data-height="300" data-width="300" data-hide-cover="true" data-show-facepile="true" data-show-posts="false" data-tabs="messages"><div class="fb-xfbml-parse-ignore"></div></div>
        <span id="closefbchat" class="close_face">Tắt Chat</span>
      </div>
      <!-- dien thoai mobile-->
    </div>
  </div><!-- /footer-bot-->
  <div class="header-hotline-mobile t-c padding-bs-0 hidden-md hidden-lg">
  <a class="hotline btn-xs" href="tel:<?=$infosetting->sdt;?>"><i></i><b>Hotline</b></a>
  </div>
  <!-- back top -->
  <a id="backTOP" href="javascript:void(0)"></a>
  
  
  
<script>


</script>
  
</footer><!-- footer -->
