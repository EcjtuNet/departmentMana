<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
	<meta name="author" content="zvenshy@gmail.com">
	<title>新闻管理部门</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.min.css">
</head>
<body>
	<div class="row-fluid">
		<div class="span10 offset1">
			<legend>新闻部门管理</legend>
			<?php
			session_start ();
		    if(!isset($_SESSION['un']))
			{
				echo '<div id="login"><a href="#loginModal" role="button" data-toggle="modal">登录</a></div>';
			}else{
				echo '<div id="login"><a href="form.php">管理</a></div>';
			}?>
		</div>
	</div>
	<div class="row-fluid"><div class="wrap"><div class="alert">正在处理...</div></div></div>
	<div id="loginModal" class="modal fade hide" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">			
				<div class="modal-body">
					<button class="close" data-dismiss="modal" aria-hidden="true">&times</button>
					<form action="login.php" method="POST">
						<div class="input-prepend username">
							<span class="add-on span3">用户名</span>
							<input type="text" id="username" name="username" placeholder="Username">	
						</div>
						<div class="input-prepend password">
							<span class="add-on span3">密码</span>
							<input type="text" id="password" name="password" placeholder="Password">
						</div>
						<div class="form-actions">
							<button type="submit" class="btn btn-primary">登录</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">退出</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row-fluid">
		<div id="score" class="span10 offset1">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="span2">成员</th>
						<th class="span2">旷到</th>
						<th class="span2">请假</th>
						<th class="span2">迟到</th>
						<th class="span2">新闻事故</th>
						<th class="span1">工作点</th>
					</tr>
				</thead>
				<tbody>
                    <tr>						
	                    <td><div class="checkdiv"></div></td>
						<td><a class="name" href="#">xxx</a></td>
						<td><span class="uarrive">+</span></td>
						<td><span class="vacate">+</span></td>
						<td><span class="late">+</span></td>
						<td><span class="arrive">+</span></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

    <div class="row-fluid">
		<div id="score" class="span10 offset1">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="span2">成员</th>
						<th class="span1">校园传真</th>
						<th class="span1">日新提醒</th>
						<th class="span1">记者直击</th>
						<th class="span1">孔目湖讲坛</th>
						<th class="span1">日新时评</th>
						<th class="span1">日新言论</th>
						<th class="span1">日新访谈</th>
						<th class="span1">交大青年</th>
						<th class="span1">差稿</th>
						<th class="span1">总计</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.min.js"></script>
</body>
</html>