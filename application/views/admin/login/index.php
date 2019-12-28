<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>hoangsoft.vn - Đăng nhập hệ thống</title>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> 
	<link rel="stylesheet" href="<?=public_url()?>admin/login/css/style.css">  
  </head>
<body>
<div class="pen-title"></div>
<!-- Form Module-->
<div class="module form-module"> 
  <div class="form" >    
    <h2 style="text-align:center">Đăng nhập hệ thống hoangsoft.vn</h2>
    <form method="POST" action="">
	    <input type="text" placeholder="Tên đăng nhập" name="username" />
	    <input type="password" placeholder="Mật khẩu" name="password" />
	    <?php if(form_error('login')):?>
	    <div class="error"><?=form_error('login');?></div>
		<?php endif;?>
		<input class="button" type="submit" value="ĐĂNG NHẬP">
    </form>
  </div>
</div>
</body>
</html>