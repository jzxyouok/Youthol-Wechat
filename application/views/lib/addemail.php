<!DOCTYPE html>
<html lang="en">
<head>
	<head>
	<meta charset="UTF-8">
	<meta name="keywords" contnt="">
	<meta name="description" content="">
	<meta name="author" content="hufangyun.com">
	<meta name="viewport" content="width=device-width" initial-scale="1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo base_url()."public/css/weui.min.css" ?>"/>
	<!--<link rel="stylesheet" href="<?php echo base_url()."public/css/style.css" ?>"/>-->
	<link rel="stylesheet/less" href="<?php echo base_url()."public/less/style.less" ?>" />
	<title>智慧校园|图书馆</title>
</head>
<body>
	<header class="index-header center">
		<h1>添加邮箱</h1>
	</header>
			
	<?php echo validation_errors(); ?>

    <?php echo form_open('lib/addemail/'.$sdutnum); ?>
		<div class="weui_cells weui_cells_form">
		    <div class="weui_cell">
		        <div class="weui_cell_hd">
		            <label class="weui_label">邮箱</label>
		        </div>
		        <div class="weui_cell_bd weui_cell_primary">
		            <input class="weui_input" type="email" name="email" placeholder="请输入您的常用邮箱">
		        </div>
		        <input type="hidden" name="sdutnum" value="<?php echo $sdutnum ?>">
		    </div>
		   </div>
		   <div class="weui_cells">
			    <div class="weui_cell">
			        <div class="weui_cell_bd weui_cell_primary">
			            <p>说明</p>
			        </div>
			        <div class="weui_cell_ft">
			            邮件提醒,避免借书超期！
			        </div>
			    </div>
			</div>
	  		<button type="submit" class="weui_btn weui_btn_primary">添加</button>
	<script src="<?php echo base_url()."public/less/dist/less.min.js" ?>"></script>
</body>
</html>