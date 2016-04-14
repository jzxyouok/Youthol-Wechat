<!DOCTYPE html>
<html lang="en">
<head>
	<head>
	<meta charset="UTF-8">
	<meta name="keywords" contnt="">
	<meta name="description" content="">
	<meta name="author" content="hufangyun.com">
	<meta name="viewport" content="width=device-width," initial-scale="1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo base_url()."public/css/weui.min.css" ?>"/>
	<!--<link rel="stylesheet" href="<?php echo base_url()."public/css/style.css" ?>"/>-->
	<link rel="stylesheet/less" href="<?php echo base_url()."public/less/style.less" ?>" />
	<title>登录失败</title>
</head>
<body>
	<header class="index-header center">
		<h1>登录图书馆</h1>
	</header>
	<?php echo validation_errors(); ?>

    <?php echo form_open('lib/login'); ?>
		<div class="weui_cells weui_cells_form">
		    <div class="weui_cell">
		        <div class="weui_cell_hd">
		            <label class="weui_label">学号</label>
		        </div>
		        <div class="weui_cell_bd weui_cell_primary">
		            <input class="weui_input" type="number" name="sdutnum" placeholder="请输入学号">
		        </div>
		    </div>
		    <div class="weui_cell">
		        <div class="weui_cell_hd">
		            <label class="weui_label">密码</label>
		        </div>
		        <div class="weui_cell_bd weui_cell_primary">
		            <input class="weui_input" type="password" name="password" placeholder="初始密码为">
		        </div>
		    </div>
		    <div class="weui_cell weui_cells_checkbox">
			    <label class="weui_cell weui_check_label" for="s11">
			        <div class="weui_cell_hd">
			            <input type="checkbox" class="weui_check" name="remember_pass" id="s11" checked="checked">
			            <i class="weui_icon_checked"></i>
			        </div>
			        <div class="weui_cell_bd weui_cell_primary">
			            <p>记住密码</p>
			        </div>
			    </label>
			</div>
	  		<button type="submit" class="weui_btn weui_btn_primary">登录</button>
		</div>
	<script src="<?php echo base_url()."public/less/dist/less.min.js" ?>"></script>
</body>
</html>