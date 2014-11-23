<?php
if(!isset($_GET['user'])){
	echo "error";
	exit;
}
include("conn.php");
$user=$_GET['user'];
$start_time = date("Y-m").'-1';
$start_time = date("Y-m").'-31';
$sql="SELECT history, count(*) AS count FROM `history` GROUP BY history WHERE time BETWEEN $start_time AND $end_time";
$result=mysql_query($sql);
$output = array();
while($row = mysql_fetch_array(result)){
	$output[] = $row;
}
?>



<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
	<meta name="author" content="zvenshy@gmail.com">
	<title>统计</title>
	<link href="http://cdn.bootcss.com/bootstrap/2.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="row-fluid">
		<div class="span8 offset2">
			<legend>统计<small><a href="index.php">返回首页</a></small></a></legend>
		</div>
	</div>
	<div class="row-fluid">
		<div  class="span8 offset2">
			<h2 class="span3" id="personName"><?php echo date('Y-m'); ?></h2>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span10 offset1">
			<table class="table table-bordered span10 offset1">
				<thead>
					<th class="span1">校园传真</th>
					<th class="span1">日新提醒</th>
					<th class="span1">记者直击</th>
					<th class="span1">孔目湖讲坛</th>
					<th class="span1">日新时评</th>
					<th class="span1">日新言论</th>
					<th class="span1">日新访谈</th>
					<th class="span1">交大青年</th>
					<th class="span1">差稿</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo isset($output['校园传真']) ? $output['校园传真'] : 0;?></td>
						<td><?php echo isset($output['日新提醒']) ? $output['日新提醒'] : 0;?></td>
						<td><?php echo isset($output['记者直击']) ? $output['记者直击'] : 0;?></td>
						<td><?php echo isset($output['孔目湖讲坛']) ? $output['孔目湖讲坛'] : 0;?></td>
						<td><?php echo isset($output['日新时评']) ? $output['日新时评'] : 0;?></td>
						<td><?php echo isset($output['日新言论']) ? $output['日新言论'] : 0;?></td>
						<td><?php echo isset($output['日新访谈']) ? $output['日新访谈'] : 0;?></td>
						<td><?php echo isset($output['交大青年']) ? $output['交大青年'] : 0;?></td>
						<td><?php echo isset($output['差稿']) ? $output['差稿'] : 0;?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


	
	<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>