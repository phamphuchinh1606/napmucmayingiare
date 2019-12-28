<?=(isset($breadcrumb) && $breadcrumb)?$breadcrumb:''?>
<?php if(isset($catalog) && $catalog):?>
<?php if($catalog->module == 'list'):?>
<div class="block block-two-col container">
  <div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 block-col-main">
      <div class="block-page-common block-sales">
        <div class="block-title">
          <?php if($this->ngonngu != 'en'):?>
          <h1 class="title-main"><?=$catalog->name?></h1>
          <?php endif;?>
          <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
          <h1 class="title-main"><?=$catalog->name_en?></h1>
          <?php endif;?>
        </div>
        <div class="block-content">
        <?php if(isset($list) && $list):?>
        <?php foreach($list as $row):?>
          <?php if($this->ngonngu != 'en'):?>
          <div class="item">
            <div class="thumb">
              <a href="<?=site_url($row->url.'-t'.$row->id)?>">
                <img style="width: 100%" src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name?>">
              </a>
            </div>
            <div class="des">
              <a href="<?=site_url($row->url.'-t'.$row->id)?>"><?=$row->name?></a>
              <p class="date-post"><i class="fa fa-calendar"></i> <?=get_date($row->created, false)?></p>
              <p class="description"><?=$row->intro?></p>
            </div>
          </div><!-- /item -->
          <?php endif;?>
          <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
          <div class="item">
            <div class="thumb">
              <a href="<?=site_url('en/'.$row->url_en.'-t'.$row->id)?>">
                <img style="width: 100%" src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name_en?>">
              </a>
            </div>
            <div class="des">
              <a href="<?=site_url('en/'.$row->url_en.'-t'.$row->id)?>"><?=$row->name_en?></a>
              <p class="date-post"><i class="fa fa-calendar"></i> <?=get_date($row->created, false)?></p>
              <p class="description"><?=$row->intro_en?></p>
            </div>
          </div><!-- /item -->
          <?php endif;?>
        <?php endforeach;?>
        <?php endif;?>
        </div>
      </div>
      <nav class="block-pagination"><?=$phantrang?></nav>
    </div>
    <?php $this->load->view('site/menuright', $this->data); ?>
  </div>
</div>
<?php endif;?>
<?php if($catalog->module == 'gird'):?>
<div class="block-title-cm">
  <div class="container">
    <div class="block-title text-center">
      <?php if($this->ngonngu != 'en'):?>
      <h1><?=$catalog->name?></h1>
      <p class="desc"><?=$catalog->intro?></p>
      <?php endif;?>
      <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
      <h1><?=$catalog->name_en?></h1>
      <p class="desc"><?=$catalog->intro_en?></p>
      <?php endif;?>
    </div>
    <div class="block-giai-phap block-bg-image-and-three-col page row">
      <?php foreach($list as $row):?>
      <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 box-item">
	  <div class="box-item-inner">
        <?php if($this->ngonngu != 'en'):?>
		<div class="box-image">
    		<img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name?>">
    	</div>
		<div class="box-content">
			<h3><a href="<?=site_url($row->url.'-t'.$row->id)?>"><?=$row->name?></a></h3>
			<p><?=text_limit($row->intro,80)?></p>
			<div class="btntextr">
			<a class="btn btn-main btnbor" href="<?=site_url($row->url.'-t'.$row->id)?>" title="<?=$row->name?>">Xem chi tiết</a>
			</div>
    	</div>
        <?php endif;?>
        <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
			<div class="box-image">
				<img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name_en?>">
			</div>
			<div class="box-content">
				<h3><a href="<?=site_url('en/'.$row->url_en.'-t'.$row->id)?>"><?=$row->name_en?></a></h3>
				<p><?=text_limit($row->intro_en,80)?></p>
				<div class="btntextr">
				<a class="btn btn-main btnbor" href="<?=site_url('en/'.$row->url_en.'-t'.$row->id)?>" title="<?=$row->name_en?>">Xem chi tiết</a>
				</div>
			</div>
        <?php endif;?>
		</div>
      </div>
      <?php endforeach;?>
    </div>
    <nav class="block-pagination"><?=$phantrang?></nav>
  </div>
</div>
<?php endif;?>

<?php if($catalog->module == 'video'):?>
<div class="block-home-40 block-title-cm block">
    <div class="container">
    <div class="block-title text-center">
      <?php if($this->ngonngu != 'en'):?>
      <h1><?=$catalog->name?></h1>
      <?php endif;?>
      <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
      <h1><?=$catalog->name_en?></h1>
      <?php endif;?>
    </div>
      <div class="col-md-8 col-sm-12 col-xs-12">
        <div class="row">
          <div>
            <iframe id="content-video" width="100%" height="465" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-12 col-xs-12">
        <div class="row">
        <div class="titleplaylist">
            <p class="vdtitle"></p>
            <p class="vdtal"> <i class="vdtong">1</i><i>/<?=count($list)?> video</i></p>
        </div>
        <ul class="playlist">
          <?php foreach($list as $key=>$row):?>
          <?php if($this->ngonngu != 'en'):?>
          <li data-title="<?=$row->name?>" data-sort="<?=$key+1?>" data-src="<?=$row->linkvideo?>" class="videofocus <?=($key==0)?'active':''?>">
            <a href="javascript:;"> <span><?=$key+1?></span><img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name?>"><?=$row->name?>
            </a>
          </li>
          <?php endif;?>
          <?php if($this->ngonngu == 'en' && $infosetting->ngonngu == 1):?>
          <li data-title="<?=$row->name_en?>" data-sort="<?=$key+1?>" data-src="<?=$row->linkvideo?>" class="videofocus <?=($key==0)?'active':''?>">
            <a href="javascript:;"> <span><?=$key+1?></span><img src="<?=base_url('uploads/images/news/'.$row->image_link)?>" alt="<?=$row->name_en?>"><?=$row->name_en?>
            </a>
          </li>
          <?php endif;?>
          <?php endforeach;?>
        </ul>
        </div>
      </div>
    </div>
</div>
<?php endif;?>

<?php if($catalog->module == 'daily'):?>
<div class="block-home-40 block-title-cm">
  <div class="container">
    <div class="block-title text-center">
          <h1><?=$catalog->name?></h1>
          <div class="desc"><?=$catalog->intro?></div>
    </div>
  </div>
  <div class="tab-page">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <?php foreach($list as $key=>$row):?>
      <li class="nav-item <?=($key == 0)?'active':''?>">
        <a class="nav-link" data-toggle="tab" href="#tab<?=$key?>" role="tab" aria-controls="tab<?=$key?>" aria-selected="<?=($key == 0)?'true':'false'?>"><?=$row->name?></a>
      </li>
      <?php endforeach;?>
    </ul>
    <div class="tab-content" id="myTabContent">
      <?php foreach($list as $key=>$row):?>
      <div class="tab-pane fade <?=($key == 0)?'active in':''?>" id="tab<?=$key?>" role="tabpanel" >
        <iframe src="<?=$row->map?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>
<?php endif;?>

<?php endif;?>
