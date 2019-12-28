<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>



<div class="block block-two-col container">
    <div class="row">
        <div class="col-sm-4 col-xs-12">
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="block-page-common clearfix">
                <div class="block block-title">
                    <h1 class="title-main"><?=lang('dkytx')?></h1>
                </div>
                <form action="" method="post" class="formdangky">
                    <?php if( isset($message) && $message ): ?>
                        <div class="alert alert-success"><strong><?=$message?></strong></div>
                    <?php endif; ?>
                    <div class="form-group">
                        <p><?=lang('dkfullinfo')?></p>
                    </div>
                    <div class="form-group">
                        <input name="hoten" type="text" class="form-control" placeholder="(*) <?=lang('dkyhoten')?>">
                    </div>
                    <?php if(form_error('hoten')):?>
                        <div class="alert alert-danger" role="alert"><?=form_error('hoten')?></div>
                    <?php endif;?>
                    <div class="form-group">
                        <input name="didong" type="text" class="form-control" placeholder="(*) <?=lang('dkyphone')?>">
                    </div>
                    <?php if(form_error('didong')):?>
                        <div class="alert alert-danger" role="alert"><?=form_error('didong')?></div>
                    <?php endif;?>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="(*) Email">
                    </div>
                    <?php if(form_error('email')):?>
                        <div class="alert alert-danger" role="alert"><?=form_error('email')?></div>
                    <?php endif;?>
                    
                   
                    <div class="form-group">
                        <?php $sess_captcha = $this->session->userdata('captcha'); ?>
                        <div class="captchare">
                            <span class="captcha"><?=$sess_captcha['word'];?></span>
                            <input type="text" class="form-control ipcaptcha" name="captcha" placeholder="(*) <?=lang('placeholder_captcha')?>">
                        </div>
                    </div>
                    <?php if(form_error('captcha')):?>
                        <div class="alert alert-danger" role="alert"><?=form_error('captcha')?></div>
                    <?php endif;?>
                    
                    <button type="submit" class="btn dktaixe"><?=lang('dkbtn')?></button>
              </form>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
        </div>
    </div>
</div>
