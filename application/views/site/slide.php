<style>
    .carousel-fade .carousel-inner .item {
        opacity: 0;
        -webkit-transition-property: opacity;
        -moz-transition-property: opacity;
        -o-transition-property: opacity;
        transition-property: opacity;
    }
    .carousel-fade .carousel-inner .active {
        opacity: 1;
    }
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
        left: 0;
        opacity: 0;
        z-index: 1;
    }
    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
        opacity: 1;
    }
    .carousel-fade .carousel-control {
        z-index: 2;
    }
    .fade-carousel {
        position: relative;
        height: 100vh;
    }
    .fade-carousel .carousel-inner .item {
        height: 100vh;
    }
    .fade-carousel .carousel-indicators > li {
        margin: 0 2px;
        background-color: #f39c12;
        border-color: #f39c12;
        opacity: .7;
    }
    .fade-carousel .carousel-indicators > li.active {
        width: 10px;
        height: 10px;
        opacity: 1;
    }

    /********************************/
    /*          Hero Headers        */
    /********************************/
    .hero {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 3;
        color: #fff;
        text-align: center;
        text-transform: uppercase;
        text-shadow: 1px 1px 0 rgba(0,0,0,.75);
        -webkit-transform: translate3d(-50%,-50%,0);
        -moz-transform: translate3d(-50%,-50%,0);
        -ms-transform: translate3d(-50%,-50%,0);
        -o-transform: translate3d(-50%,-50%,0);
        transform: translate3d(-50%,-50%,0);
    }
    .hero h1 {
        font-size: 6em;
        font-weight: bold;
        margin: 0;
        padding: 0;
    }

    .fade-carousel .carousel-inner .item .hero {
        opacity: 0;
        -webkit-transition: 2s all ease-in-out .1s;
        -moz-transition: 2s all ease-in-out .1s;
        -ms-transition: 2s all ease-in-out .1s;
        -o-transition: 2s all ease-in-out .1s;
        transition: 2s all ease-in-out .1s;
    }
    .fade-carousel .carousel-inner .item.active .hero {
        opacity: 1;
        -webkit-transition: 2s all ease-in-out .1s;
        -moz-transition: 2s all ease-in-out .1s;
        -ms-transition: 2s all ease-in-out .1s;
        -o-transition: 2s all ease-in-out .1s;
        transition: 2s all ease-in-out .1s;
    }

    /********************************/
    /*            Overlay           */
    /********************************/
    .overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 2;
        background-color: #080d15;
        opacity: .7;
    }

    /********************************/
    /*          Custom Buttons      */
    /********************************/
    .btn.btn-lg {padding: 10px 40px;}
    .btn.btn-hero,
    .btn.btn-hero:hover,
    .btn.btn-hero:focus {
        color: #f5f5f5;
        background-color: #1abc9c;
        border-color: #1abc9c;
        outline: none;
        margin: 20px auto;
    }

    /********************************/
    /*          Media Queries       */
    /********************************/
    @media screen and (min-width: 980px){
        .hero { width: 980px; }
    }
    @media screen and (max-width: 640px){
        .hero h1 { font-size: 4em; }
    }
</style>


<div class="block-title-cm block-title-slider-home">
  <div class="container">
    <div class="row">
        <!--  Menu Megamenu-->

      <div id="field_slideshow" class="slideshow col-xs-12 col-sm-12 col-md-12">
        <?php if(isset($slide_list) && $slide_list): ?>
        <div id="myCarousel" class="carousel slide hidden-xs carousel-fade" data-ride="carousel" data-interval="5000">
          <ol class="carousel-indicators">
            <?php foreach($slide_list as $key=>$slide):?>
            <li data-target="#myCarousel" data-slide-to="<?=$key?>" class="<?=($key == 0)?'active':''?>"></li>
            <?php endforeach;?>
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php foreach($slide_list as $key=>$slide):?>
            <div class="item <?=($key == 0)?'active':''?>">

              <a href="<?=($slide->link)?$slide->link:'#'?>">
                 <img src="<?=base_url('uploads/images/slide/'.$slide->image_link)?>" alt="<?=$slide->name?>">
              </a>

            </div>
            <?php endforeach;?>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
          </a>
        </div>
        <div id="myCarouselmobile" class="carousel slide hidden-lg hidden-md hidden-sm" data-ride="carousel" data-interval="7000">
          <ol class="carousel-indicators">
            <?php foreach($slide_list as $key=>$slide):?>
            <li data-target="#myCarouselmobile" data-slide-to="<?=$key?>" class="<?=($key == 0)?'active':''?>"></li>
            <?php endforeach;?>
          </ol>
          <div class="carousel-inner" role="listbox">
            <?php foreach($slide_list as $key=>$slide):?>
            <div class="item <?=($key == 0)?'active':''?>">

              <a href="<?=($slide->link)?$slide->link:'#'?>">
              <img src="<?=base_url('uploads/images/slide/'.$slide->image_link_mobile)?>" alt="<?=$slide->name?>">
              </a>
              
            </div>
            <?php endforeach;?>
          </div>
          <a class="left carousel-control" href="#myCarouselmobile" role="button" data-slide="prev">
            <span class="fa fa-angle-left" aria-hidden="true"></span>
          </a>
          <a class="right carousel-control" href="#myCarouselmobile" role="button" data-slide="next">
            <span class="fa fa-angle-right" aria-hidden="true"></span>
          </a>
        </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<style type="text/css">

</style>
<script type="text/javascript">
  $('#myCarousel').mouseenter(function(){
    $(".fa-angle-left").css({'opacity': '1', 'left': '10px'});
    $(".fa-angle-right").css({'opacity': '1', 'right': '10px'});
  });
</script>
