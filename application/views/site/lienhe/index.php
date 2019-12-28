<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<div class="block container">
    <div class="row">
            <div class="block-page-common clearfix">
            	<div class="col-lg-12">
	                <div class="block-title">
	                    <h1 class="title-main margbot15"><?=lang('lienhe')?></h1>
	                </div>
                </div>
                <div class="block-content">
                	<div class="col-lg-5 col-md-5 col-sm-6 col-sx-12">
						<ul class="ttlienhe">
                            <?php if($infosetting->tenquocte || $infosetting->tenquocte_en):?>
                            <li>
                                <p>Tên công ty</p>
                                <span><?=$infosetting->tenquocte?></span>
                            </li>
                            <?php endif;?>
                            <?php if($infosetting->diachi || $infosetting->address):?>
							<li>
								<p><?=lang('diachi')?></p>
								<span><?=$infosetting->diachi?></span>
							</li>
                            <?php endif;?>
                            <?php if($infosetting->sdt || $infosetting->sdt_en):?>
							<li>
								<p><?=lang('phone')?></p>
								<span><?=$infosetting->sdt?></span>
							</li>
                            <?php endif;?>
                            <?php if($infosetting->website):?>
							<li>
								<p>Website</p>
								<span><?=$infosetting->website?></span>
							</li>
                            <?php endif;?>
                            <?php if($infosetting->email || $infosetting->email_en):?>
							<li>
								<p>Email</p>
								<span><?=$infosetting->email?></span>
							</li>
                            <?php endif;?>
						</ul>
                	</div>
					<div class="col-lg-7 col-md-7 col-sm-6 col-sx-12">
                    <form method="POST" action="#"  class="block-form form-lien-he">
                        <?php if( isset($message) && $message ): ?>
                            <div class="alert alert-success"><strong><?=$message?></strong></div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="text" placeholder="<?=lang('placeholder_name')?> (*)" name="hoten" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <?php if(form_error('hoten')):?>
                            <div class="col-xs-12">
                                <div class="alert alert-danger" role="alert"><?=form_error('hoten')?></div>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="text" placeholder="<?=lang('placeholder_address')?> (*)" name="diachi" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <?php if(form_error('diachi')):?>
                            <div class="col-xs-12">
                                <div class="alert alert-danger" role="alert"><?=form_error('diachi')?></div>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="tel" placeholder="<?=lang('dkyphone')?> (*)" name="phone" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <?php if(form_error('phone')):?>
                            <div class="col-xs-12">
                                <div class="alert alert-danger" role="alert"><?=form_error('phone')?></div>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <input type="email" placeholder="Email (*)" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <?php if(form_error('email')):?>
                            <div class="col-xs-12">
                                <div class="alert alert-danger" role="alert"><?=form_error('email')?></div>
                            </div>
                            <?php endif;?>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <textarea rows="7" placeholder="<?=lang('noidunglienhe')?>" name="ghichu" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <?php $sess_captcha = $this->session->userdata('captcha'); ?>
                                <div class="captchare">
                                    <span class="captcha"><?=$sess_captcha['word'];?></span>
                                    <input type="text" class="form-control ipcaptcha" name="captcha" placeholder="<?=lang('placeholder_captcha')?> (*)">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php if(form_error('captcha')):?>
                            <div class="col-sm-12 col-xs-12" style="text-align: center;">
                                <div class="alert alert-danger" role="alert"><?=form_error('captcha')?></div>
                            </div>
                        	<?php endif;?>
                        </div>
                        <div class="row">
                        	<div class="form-group col-xs-12 btntextr">
                                <button type="submit" class="btn btn-main btnbor"><?=lang('send')?></button>
                            </div>
                        </div>
                    </form>
                	</div>
                </div>
            </div><!-- /block-ct-news -->
    </div>
</div><!-- /block_big-title -->

<div class=" block-map">
    <div class="container">
        <object data="<?= $infosetting->map;?>"></object>
    </div>
</div>
