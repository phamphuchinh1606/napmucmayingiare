<!-- ===== JS Bootstrap ===== -->
<script src="<?=public_url('site/lib/bootstrap/bootstrap.min.js')?>"></script>
<!-- carousel -->
<script src="<?=public_url('site/lib/carousel/owl.carousel.min.js')?>"></script>
<!-- sticky -->
<script src="<?=public_url('site/lib/sticky/jquery.sticky.js')?>"></script>
<!-- Js Common -->
<script src="<?=public_url('site/js/common.js')?>"></script>
<!-- Js zoom -->
<script src="<?=public_url('site/lib/jquery.zoom.min.js')?>"></script>
<!-- Flexslider -->
<script src="<?=public_url('site/lib/flexslider/jquery.flexslider-min.js')?>"></script>
<!-- Js Fixheight -->
<script src="<?=public_url('site/js/fixheight.js')?>"></script>
<!-- Fancybox -->
<script src="<?=public_url('site/js/jquery.fancybox.min.js')?>"></script>

<!-- Fakecrop -->
<script src="<?=public_url('site/js/jquery.fakecrop.js')?>"></script>

<script src="<?=public_url('site/js/jquery.easing.1.3.js')?>"></script>
<script src="<?=public_url('site/js/jquery.popcircle.1.0.js')?>"></script>
<!-- Share icon -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- Gio hang ajax This is ajax add product-->
<script type="text/javascript">
$(document).ready(function(){
  $('.size-custom > .btn').on('click', function(event) {
    var val = $(this).val();
    $('#output-size').html(val);
  });

  $(".muanhanh").click(function(){
      var id = $(this).attr('data-id');
      var size = $('#output-size').text();
      $.ajax({
        type:"post",
        url:"<?=base_url('cart/addajax');?>",
        data:{idspajax:id, size:size},
        success:function(data){
          $('.Header-Order').html(data);
          alert('Sản phẩm đã được thêm vào giỏ hàng!');
        }
      });
  });
});
</script>



<!-- dang ky mail ajax -->
<script type="text/javascript">
$(document).ready(function(){
  $(".btn-nhanmail").click(function(){
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var namedangky = $( "input[name='name-nhanmail']" ).val();
      var phonedangky = $( "input[name='phone-nhanmail']" ).val();
      var emaildangky = $( "input[name='email-nhanmail']" ).val();
      var sanphamdangky = $( "input[name='sanpham-nhanmail']" ).val();
      if (!filter.test(emaildangky)) {
          alert('Địa chỉ email không hợp lệ - Example@gmail.com');
          emaildangky.focus;
          return false;
      }
      if(emaildangky === '' || phonedangky === '' || namedangky === ''){
        alert('Điền đầy đủ thông tin!');
        return false;
      }else{
        $.ajax({
          type:"post",
          url:"<?=base_url('lienhe/dknt');?>",
          data:{namedangky:namedangky, sanphamdangky:sanphamdangky, phonedangky:phonedangky, emaildangky:emaildangky},
          success:function(data){
            alert(data);
            $( "input[name='name-nhanmail']" ).val('');
            $( "input[name='phone-nhanmail']" ).val('');
            $( "input[name='email-nhanmail']" ).val('');
            $("#modal_nhankhuyenmai .close").click();
          }
        });
      }
  });
});
</script>


<script type="text/javascript">
  $(function() {
    $('.bangnhau1').matchHeight(false);
  });
  $(function() {
    $('.bangnhau2').matchHeight(false);
  });
</script>



<script type="text/javascript">
$(document).ready(function(){
  if($('html').hasClass('ie-old')) {
    // $('html .notie').css({'display':'none'});
      //cho hiện hộp đăng nhập trong 300ms
      $('.loiie').fadeIn(300);

      // thêm phần tử id="over" vào sau body
      $('body').append('<div id="over">');
      $('#over').fadeIn(300);
      return false;
  }
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  var titledau = $('.videofocus').first().attr('data-title');
  var srcdau = $('.videofocus').first().attr('data-src');
  $('.titleplaylist p.vdtitle').html(titledau);
  $("#content-video").attr('src',srcdau);
  $('.videofocus').click(function(){
    $('.videofocus').removeClass('active');
    $(this).addClass('active');
    // $(this).find('span').remove();
    // $(this).find('i').remove();
    // $(this).find('a').prepend("<i class='fa fa-caret-right'></i>");
    var title = $(this).attr('data-title');
    var sort = $(this).attr('data-sort');
    var src = $(this).attr('data-src');
    $('.titleplaylist p.vdtitle').html(title);
    $('.titleplaylist p i.vdtong').html(sort);
    $("#content-video").attr('src',src);
  });
});
</script>
<script>
window.images_size = {
  ratio_width : 2,
  ratio_height : 2,
};
</script>
<script type="text/javascript">
//   $('.product-item .product-img img').fakecrop({
//     fill: true,
//     widthSelectorParent: ".product-item .product-img",
//     ratioWrapper: window.images_size
//   });
  /*$('.box-item .box-item-inner .box-image img').fakecrop({
    fill: true,
  widthSelectorParent: ".box-item .box-item-inner .box-image",
    ratioWrapper: window.images_size
  });
  $('.block-col-main .thumb img').fakecrop({
  fill: true,
  widthSelectorParent: ".block-col-main .thumb a",
  ratioWrapper: window.images_size
});*/
</script>
<script type="text/javascript">
$(document).ready(function() {
$(".fancybox").fancybox({
  prevEffect		: 'none',
  nextEffect		: 'none',
  closeBtn		: false,
  helpers		: {
    title	: { type : 'inside' },
    buttons	: {}
  }
});

});
</script>
<script>

var nbOptions = 8;
var angleStart = -360;

// jquery rotate animation
function rotate(li,d) {
    $({d:angleStart}).animate({d:d}, {
        step: function(now) {
            $(li)
               .css({ transform: 'rotate('+now+'deg)' })
               .find('label')
                  .css({ transform: 'rotate('+(-now)+'deg)' });
        }, duration: 0
    });
}

// show / hide the options
function toggleOptions(s) {
    $(s).toggleClass('open');
    var li = $(s).find('li');
    var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
    for(var i=0; i<li.length; i++) {
        var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
        $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
    }
}

$('.block-popcircle-inner .selector button').click(function(e) {
    toggleOptions($(this).parent());
});

setTimeout(function() { toggleOptions('.block-popcircle-inner .selector'); }, 100);//@ sourceURL=pen.js
</script>
