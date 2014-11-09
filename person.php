<?php
if(!isset($_GET['user'])){
	echo "error";
	exit;
}
include("conn.php");
$user=$_GET['user'];
$sql="SELECT * FROM `message` WHERE `user`='$user'";
$query=mysql_query($sql);
$message=mysql_fetch_array($query);
$history="SELECT * FROM `history` WHERE `name`='$user'";
$sql=mysql_query($history);
?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
	<meta name="author" content="zvenshy@gmail.com">
	<title>新闻部门管理</title>
	<link href="http://cdn.bootcss.com/bootstrap/2.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="row-fluid">
		<div class="span8 offset2">
			<legend>新闻部门管理<small><a href="index.php">返回首页</a></small></a></legend>
		</div>
	</div>
	<div  class="row-fluid span10 offset1">
		<h2 class="span3 offset" id="personName"><?php echo $message['user'];?></h2>
		<div class="span3 offset2">
			<dl>
				<dt>旷到</dt>
				<dd><?php echo $message['uarrive'];?></dd>
				<dt>请假</dt>
				<dd><?php echo $message['vacate'];?></dd>
				<dt>迟到</dt>
				<dd><?php echo $message['late'];?></dd>
				<dt>到场</dt>
				<dd><?php echo $message['arrive'];?></dd>
			</dl>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span10 offset1">
			<table class="table table-bordered span10 offset1">
				<thead>
					<th class="span6">日期</th>
					<th class="span6">文体</th>
					<th class="span2">积分</th>
				</thead>
				<tbody>
					<?php
					while($history=mysql_fetch_array($sql)){
					?><tr>
						<td><?php echo $history['time'];?></td>
						<td><?php echo $history['history'];?></td>
						<td><?php echo $history['value'];?></td>
					</tr>
					<?php }?>
				</tbody>
			</table>
		</div>
	</div>


	
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>