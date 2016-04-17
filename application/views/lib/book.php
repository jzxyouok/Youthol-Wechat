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
	<title>我的图书馆</title>
</head>
<body>
	<header class="index-header center">
		<h1>我的图书馆</h1>
		<h2>欢迎您，<?php echo $username;?></h2>
		<div class="button_sp_area">
		    <a href="<?php echo site_url(); ?>" class="weui_btn weui_btn_mini weui_btn_default">返回主页</a>
		    <a href="<?php echo site_url().'/lib/addemail/'.$sdutnum ?>" class="weui_btn weui_btn_mini weui_btn_primary">到期邮件通知</a>
        </div>	
	</header>

	<section class="container center">
		<table class="center">
			<thead>
				<tr>
					<th>图书编码</th>
					<th>续借</th>
					<th>书名</th>
					<th>作者</th>
					<th>借阅时间</th>
					<th>归还时间</th>
					<th>馆藏地</th>
				</tr>
			</thead>
			<tbody>
				<?php if(empty($bookArray)){?>
						<tr>
							<td colspan="7">客官，近期您没有借书记录欧！</td>
						</tr>
						<?php }else {
						for($i=1;$i<=$bookNum;$i++){?>
						<tr><td><?php echo substr($bookArray['0'][$i*8],52,-6)?></td><!--图书编码-->
							<td><?php echo $buttonArray['0'][$i-1];?></td><!-- 续借 substr($array['0'][$i-1],12)-->
							<td><?php echo substr($bookArray['0'][$i*8+1],111,-10);?></td><!-- 书名 -->
							<td><?php echo substr($bookArray['0'][$i*8+2],52,-6)?></td><!-- 作者 -->
							<td><?php echo substr($bookArray['0'][$i*8+3],52,-6) ?></td><!-- 借阅时间 -->
							<td><?php echo substr($bookArray['0'][$i*8+4],65,-13)?></td><!-- 归还时间 -->
							<td><?php echo substr($bookArray['0'][$i*8+5],52,-6)?></td><!-- 馆藏地 -->
						</tr>
						<?php }}?>
			</tbody>
		</table>
	</section>
	<script src="<?php echo base_url()."public/less/dist/less.min.js" ?>"></script>
	<script src="<?php echo base_url()."public/js/jquery.1.12.3.min.js" ?>"></script>
	<script>
	function getInLib(barcode)
	{ 
         var url = 'http://222.206.65.12/reader/ajax_renew.php?bar_code=' + barcode + '&time=' + new Date().getTime();
         return url;
		 
	}
</script>
</body>
</html>