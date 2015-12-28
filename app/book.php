<?php
/**
 * User: Vic程小猿
 * Date: 2015/10/27
 * Time: 23:36
 */

include ('function.php');
error_reporting(0);

$username = $_POST['username'];
$password = $_POST['password'];


$cookie_jar = dirname(__FILE__)."/cookie";
$urlLogin = "http://222.206.65.12/reader/redr_verify.php";
$post = "number=$username&passwd=$password&select=cert_no&returnUrl=";
$check=login_post($urlLogin,$cookie_jar,$post);


$urlBook = "http://222.206.65.12/reader/book_lst.php";
$html = get_content($urlBook,$cookie_jar);

$creg = "/logout/";
$preg = "/<td.*/";
$reg = "/<div\sid=\"\w\"><input.*\/>/";
preg_match_all($creg, $html, $carr);
preg_match_all($preg, $html, $arr);
preg_match_all($reg, $html, $array);

if(empty($carr[0][0])||$carr[0][0]==null)
{?>
	<script type="text/javascript">
         alert("密码错误！");
         location.href="../index.php";
	</script>

<?php 
}


$nameReg = '/height="11" \/>.*logout/';
preg_match_all($nameReg, $html, $nameArr);

echo substr($nameArr[0][0],14,-37);

$numReg = '/<p>.*<b/';
preg_match_all($numReg, $html, $numArr);

$bookNum = substr($numArr[0][0],45,-25);


/*
$code       = $arr['0']['0'];
$tilte      = $arr['0']['1'];
$author     = $arr['0']['2'];
$borrowTime = $arr['0']['3'];
$returnTime = $arr['0']['4'];
$place      = $arr['0']['5'];	
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
    <!--<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css">
    <script type="text/javascript" src="../public/js/prototype.js"></script>
	<title>图书借阅查询|山东理工大学</title>
	<style type="text/css">
        .row{text-align: center; margin-top: 50px;}
        h2{margin-bottom: 50px;}
        label{line-height: 38px;}
        .main{width:600px;margin:0 auto;}
        table td{text-align:center;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2>图书借阅</h2>
			<div class="col-md-12">
				<div class="table-responsive">
					<table  class="table table-bordered">
						<thead>
						<tr><td>图书编码</td><td>续借</td><td>书名</td><td>作者</td><td>借阅时间</td><td>归还时间</td><td>馆藏地</td></tr>
						<?php if(empty($arr[0][0])){?>
						<tr>
							<td colspan="7">客官，近期您没有借书记录欧！</td>
						</tr>
						<?php }else {
						for($i=1;$i<=$bookNum;$i++){?>
						<tr><?php echo $arr['0'][$i*8];?></td><td><?php echo $array['0'][$i];?></td><?php echo $arr['0'][$i*8+1];?></td><?php echo $arr['0'][$i*8+2];?></td><?php echo $arr['0'][$i*8+$i+2];?></td><?php echo $arr['0'][$i*8+$i+3];?></td><?php echo $arr['0'][$i*8+$i+4];?></td></tr>
						<?php }}?>
						</thead>
						<tbody>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
<!--
	function getInLib(barcode,num)
	{ 
		 Element.hide(num);
		 new Ajax.Updater( barcode,'http://222.206.65.12/reader/ajax_renew.php?bar_code=' + barcode + "&time=" + new Date().getTime());
	}
-->
</script>

</body>
</html>



