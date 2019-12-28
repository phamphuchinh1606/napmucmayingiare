<?php 
	$title_fix = (isset($title) && $title)?$title:'';
	$description_fix = (isset($description) && $description)?$description:'';
	$keywords_fix = (isset($keywords) && $keywords)?$keywords:''; 
	$url_fix = (isset($url) && $url)?$url:'';
	$image_fix = (isset($image_seo) && $image_seo)?$image_seo:'';
?>
<meta charset="utf-8">
<meta name="robots" content="index,follow">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
<meta name="format-detection" content="telephone=no" />
<meta name="title" content="<?=$title_fix?>"/>
<meta name="description" content="<?=$description_fix?>"/>
<meta name="keywords" content="<?=$keywords_fix?>"/> 
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?=$title_fix?>" />
<meta property="og:description" content="<?=$description_fix?>"/>
<meta property="og:url" content="<?=$url_fix?>" />
<meta property="og:site_name" content="<?= base_url()?>" />
<meta property="og:image" content="<?=$image_fix?>" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="<?=$title_fix?>" />
<meta name="twitter:domain" content="<?= base_url()?>" />
<meta name="twitter:description" content="<?=$description_fix?>" />
<meta name="twitter:image" content="<?=$image_fix?>" />
<meta name="generator" content="Design by hoangsoft.vn">
<meta name="author" content="Design by hoangsoft.vn">
<title><?=$title_fix?></title>
<link href="<?= base_url()?>" rel="canonical"></link>
<!-- Favicons Icon -->
<link rel="icon" href="<?=base_url('uploads/images/logo-banner/'.$infosetting->favico)?>" type="image/x-icon" />
<link rel="shortcut icon" href="<?=base_url('uploads/images/logo-banner/'.$infosetting->favico)?>" type="image/x-icon" />

<link rel="stylesheet" type="text/css" href="<?=public_url('site/css/style.css')?>">
<link rel="stylesheet" href="<?=public_url('site/css/responsive.css')?>">
<link rel="stylesheet" href="<?=public_url('site/css/jquery.fancybox.min.css')?>">
<!-- ===== JS ===== -->
<script src="<?=public_url('site/js/jquery.min.js')?>"></script>
<!--[if IE 8 ]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><![endif]-->
<!--[if lt IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><![endif]-->
<!--[if IE 7 ]><script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><![endif]-->
<!-- <?=$infosetting->script;?> -->