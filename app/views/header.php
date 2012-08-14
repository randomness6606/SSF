<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $this->title; ?></title>
	<link rel='stylesheet' type='text/css' href='<?php echo URL; ?>app/media/css/global.css' />
	<!-- link rel='stylesheet' type='text/css' href='<?php //echo URL; ?>app/media/css/<?php //echo $this->page; ?>.css' /-->
	<script src='<?php echo URL; ?>app/media/js/jquery.js'></script>
	<!--script src='<?php //echo URL; ?>app/media/js/<?php //echo $this->page; ?>.js'></script-->
	<script src='<?php echo URL; ?>app/media/js/pjax.js'></script>
	<script src='<?php echo URL; ?>app/media/js/jquery.cookie.js'></script>
	<script src='<?php echo URL; ?>app/media/js/pjax_script.js'></script>
	<?php $this->js_tag(); ?>
</head>

<header><?php $this->a('', SITE_NAME, 'logo'); ?></header>

<section id='main'>


