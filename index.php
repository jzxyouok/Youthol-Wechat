<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<title>图书借阅查询|山东理工大学</title>
	<style type="text/css">
                        .row{text-align: center; margin-top: 50px;}
                        h2{margin-bottom: 50px;}
                        label{line-height: 38px;}
                        .main{width:600px;margin:0 auto;}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
		<h2>我的图书馆</h2>
		<div class="col-sm-12">
			<form class="form-horizontal" method="post" action="app/book.php">
				<div class="form-group ">
					<label class="col-sm-2">学号：</label>
					<div class="col-sm-10">
					         <input type="text" class="form-control "  name="username" placeholder="学号" >
					</div>
					
				</div>
				<div class="form-group">
					<label class="col-sm-2">密码：</label>
					<div class="col-sm-10">
					         <input type="password"  class="form-control" name="password" placeholder="密码">
					</div>
				</div>

				<button class="btn btn-success" type="submit">进入我的图书馆</button>
			</form>
		</div>
	        </div>
	</div>
	
</body>
</html>