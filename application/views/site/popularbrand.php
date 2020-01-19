<section class="block-title-cm block-article">
    <?php if(isset($listdoitac) && $listdoitac):?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 block-article-list-image">
                <div class="naviacc"><h2>Đối Tác</h2><b></b></div>
                <div class="block-title-cm block-doitac">
                    <div class="doitac-1">
                        <div class="block-content product-list">
                            <ul class="owl-carousel owl-theme branch-carousel">
                                <?php foreach($listdoitac as $row):?>
                                    <li class="product-item">
                                        <a href="<?=$row->url?>" title="<?=$row->name?>">
                                            <img src="<?=base_url('uploads/images/doitac/'.$row->image_link)?>" class="img-1" alt="<?=$row->name?>">
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
</section>

<script type="text/javascript">
    $(document).ready(function() {

        $('.branch-carousel').owlCarousel({
            items: 8,
            margin: 0,
            addClassActive: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            loop: false,
            pagination: true,
            arrows: true,
            navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
            responsiveClass: true,
            responsive: {
                0: {
                    items: 3,
                    autoplayTimeout: 3500,
                    nav: true
                },
                600: {
                    items: 5,
                    autoplayTimeout: 3000,
                    nav: false
                },
                1000: {
                    items: 7,
                    nav: true,
                    loop: false
                },
                1300: {
                    items: 9,
                    nav: true,
                    loop: false
                },
                1600: {
                    items: 11,
                    nav: true,
                    loop: false
                }
            }
        });
    });
</script>
