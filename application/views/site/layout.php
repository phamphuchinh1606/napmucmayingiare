<!--DOCTYPE html-->
<!--[if lt IE 7 ]><html lang="vi" class="no-js ie-old"><![endif]-->
<!--[if IE 7 ]><html lang="vi" class="no-js ie-old"><![endif]-->
<!--[if IE 8 ]><html lang="vi" class="no-js ie-old"><![endif]-->
<!--[if gt IE 8 ]><html lang="vi" class="no-js ie-old"><![endif]-->
<html <?php if($this->ngonngu != 'en'):?> lang="vi" <?php endif;?><?php if($this->ngonngu == 'en'):?> lang="en" <?php endif;?>>
<head>
    <?php $this->load->view('site/head', $this->data); ?>
</head>
<body>

    <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js#xfbml=1&version=v2.12&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



	<script>
		window.twttr = (function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0],
		    t = window.twttr || {};
		  if (d.getElementById(id)) return t;
		  js = d.createElement(s);
		  js.id = id;
		  js.src = "https://platform.twitter.com/widgets.js";
		  fjs.parentNode.insertBefore(js, fjs);
		  t._e = [];
		  t.ready = function(f) {
		    t._e.push(f);
		  };
		  return t;
		}(document, "script", "twitter-wjs"));
	</script>

    <?php $this->load->view('site/header', $this->data); ?>
    <?php $this->load->view('site/menu', $this->data); ?>
    <div class="wrapper">
    <?php $this->load->view($temp, $this->data); ?>
	</div>
    <?php $this->load->view('site/footer', $this->data); ?>
	<?php $this->load->view('site/script'); ?>
	<!-- Thong bao loi ie8 -->
	<div class="loiie">
		<h2>Bạn có biết rằng trình duyệt của bạn đã lỗi thời?</h2>
		<p>Trình duyệt của bạn đã lỗi thời, và có thể không tương thích tốt với website, chắc chắn rằng trải nghiệm của bạn trên website sẽ bị hạn chế. Bên dưới là danh sách những trình duyệt phổ biến hiện nay.</p><br>
		<p>Click vào biểu tượng để tải trình duyệt bạn muốn.</p><br>
		<ul class="ulloiie" style="display: inline-block;">
			<li><a href="https://www.google.com/chrome/"><img src="<?=public_url('site/images/Chrome.png')?>"></a></li>
			<li><a href="https://www.mozilla.org/firefox/"><img src="<?=public_url('site/images/Firefox.png')?>"></a></li>
			<li><a href="https//www.microsoft.com/windows/Internet-explorer/"><img src="<?=public_url('site/images/Explorer.png')?>"></a></li>
			<li><a href="https//www.opera.com/download/"><img src="<?=public_url('site/images/Opera-icon.png')?>"></a></li>
			<li><a href="https//www.apple.com/safari/download/"><img src="<?=public_url('site/images/Safari.png')?>"></a></li>
		</ul>
	</div>
</body>
</html>