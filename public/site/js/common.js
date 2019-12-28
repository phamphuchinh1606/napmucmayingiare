/*
 * ---------------------------------------------------
 * 1. Slide Carousel
 * 2. Scroll to Top
 * 3. Sticky Menu
 * 4. Accordion has icon
 * 5. Hover tag a show ul page Product
 * 6. POPUP order a product - check on info Payment
 * 7. Scroll News Item Tablet & Mobile
 */

  (function($){
    "use strict";
  /* ==================================================== */

  /*
   * 1. Slide Carousel
  */
  $(document).ready(function() {
      
    $('.product-hot-carousel').owlCarousel({
        items: 5,
        margin: 0,
        addClassActive: false,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        loop: false,
        pagination: true,
        arrows: true,
        navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                autoplayTimeout:3500,
                nav:true
            },
            600:{
                items:2,
                autoplayTimeout:3000,
                nav:false
            },
            1000:{
                items:5,
                nav:true,
                loop:false
            }
        }
    });
    $('.product-carousel').owlCarousel({
        items: 4,
        margin: 0,
        loop: true,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        pagination: true,
        arrows: true,
        navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                autoplayTimeout:3500,
                nav:true
            },
            600:{
                items:2,
                autoplayTimeout:3000,
                nav:true
            },
            1000:{
                items:4,
                nav:true,
                loop:false
            }
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

  $('.edit').click(function(){
    $('#txtId').val($(this).data('text'));
    $('#txtContent').val($(this).html());
    $('#editContentModal').modal('show');
  });
  $('#btnSaveContent').click(function(){
    $.ajax({
      url : $('#route-save-content').val(),
      type : "POST",
      data : {
        id : $('#txtId').val(),
        content : $('#txtContent').val()
      },
      success:  function(){
        window.location.reload();
      }

    });
  });
  });
  jQuery('.fb-page1').toggleClass('hide');
    jQuery('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Chat với chúng tôi').css({'bottom':0});
  jQuery('#closefbchat').click(function(){
    jQuery('.fb-page1').toggleClass('hide');
    if(jQuery('.fb-page1').hasClass('hide')){
      jQuery('#closefbchat').html('<i class="fa fa-comments fa-2x"></i> Chat với chúng tôi').css({'bottom':0});
    }
    else{
      jQuery('#closefbchat').text('Tắt Chat').css({'bottom':299});
    }
  });
  $(document).on('keypress', '.txtSearch', function(e) {
        var obj = $(this);

        if (e.which == 13) {
            if ($.trim(obj.val()) == '') {
                return false;
            }
        }
    });
  
  $(document).on('keypress', '#txtNewsletter', function(e){
    if(e.keyCode==13){
        $('#btnNewsletter').click();
    }
  });
    
  $('#btnNewsletter').click(function() {
      var email = $.trim($('#txtNewsletter').val());        
      if(validateEmail(email)) {
          $.ajax({
            url: $('#route-newsletter').val(),
            method: "POST",
            data : {
              email: email,
            },
            success : function(data){
              if(+data){
                alert('Đăng ký nhận bản tin thành công.');
              }
              else {
                alert('Địa chỉ email đã được đăng ký trước đó.');
              }
              $('#txtNewsletter').val("");
            }
          });
      } else {
          alert('Vui lòng nhập địa chỉ email hợp lệ.')
      }
  });

    function validateEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
    
    
    var window_height = $(window).height();

    $(window).on('scroll load', function (event) {
        if ($(window).scrollTop() > window_height) {
            $("#header-full").addClass('header-fixed');
        }
        else {
            $("#header-full").removeClass('header-fixed');
            $("#header-full").removeClass('hide-menu');
        }
    });
    
    // Show menu when scroll up, hide menu when scroll down
    var lastScroll = 50;
    $(window).on('scroll load', function (event) {
        var st = $(this).scrollTop();
        if (st > lastScroll) {
            $('#header-full').addClass('hide-menu');
        }
        else if (st < lastScroll) {
            $('#header-full').removeClass('hide-menu');
        }

        if ($(window).scrollTop() <= 200 ){
            $('#header-full').removeClass('.header-fixed').removeClass('hide-menu');
        }
        else if ($(window).scrollTop() < window_height && $(window).scrollTop() > 0) {
            $('#header-full').addClass('hide-menu');
        }
        lastScroll = st;
    });
    
  /*
   * 2. Scroll to Top
  */
  $(window).scroll(function() {
    if ($(this).scrollTop() >= 200) {
      $('#return-to-top').addClass('td-scroll-up-visible');
    } else {
      $('#return-to-top').removeClass('td-scroll-up-visible');
    }
  });
  $('#return-to-top').click(function() {    
    $('body,html').animate({
      scrollTop : 0
    }, 'slow');
  });

  $('.open-close').on('click', function(e){
    e.preventDefault();
    var $this = $(this);
    $this.parents('.v-megamenu-container').find('.v-megamenu').stop().slideToggle();
    $(this).toggleClass('active')
    return false;
  });

  /*
   * 3. Sticky Menu
  */
  $('.fixed').sticky({ topSpacing: 0 });

  /*
   * 7. Main Menu
  */
  $(".nav-toogle").on( 'click', function() {
    $(this).toggleClass('has-open');
    $(".menu").toggleClass("has-open");
    $("body").toggleClass("menu-open");
  });
  $(document).ready(function(){
    $('.menu ul li.parent').append('<span class="plus"></span>');
    $('.menu ul li.parent .plus').click(function(){
      $(this).toggleClass('open').siblings('.submenu').slideToggle();
    });
  });

})(jQuery); // End of use strict
$(document).ready(function(){
   $('.btn-addcart-product').click(function(){
       var quantity = $('#quantity').val();
       var product_id = $(this).data('id');
        addToCart(product_id, quantity);
   });

 });
 $(document).on('click', '.del_item', function() {
    if(confirm('Quý khách chắc chắn muốn xóa sản phẩm này?')){
        var id = $(this).data('id');
        $(this).parents('.tr-wrap').remove();
        update_product_quantity(id, 0, 'ajax');      
    }
  });
 function addToCart(product_id, quantity) {
   $.ajax({
     url: $('#route-add-to-cart').val(),
     method: "GET",
     data : {
       id: product_id,
       quantity : quantity
     },
     success : function(data){
        location.href = $('#route-cart').val();
     }
   });
 } 
 function update_product_quantity(id, quantity, type) {
    $.ajax({
        url: $('#route-update-product').val(),
        method: "POST",
        data: {
            id: id,
            quantity: quantity
        },
        success: function(data) {
                      
        }
    });
}





