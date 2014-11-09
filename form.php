<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
	<meta name="author" content="zvenshy@gmail.com">
	<title>新闻部门管理</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="row-fluid">
		<div class="span10 offset1">
			<legend>新闻部门管理</legend>
		</div>
	</div>
	<div class="row-fluid"><div class="wrap"><div class="alert">正在处理...</div></div></div>
	<div class="row-fluid">
		<form id="update"  class="span10 offset1">
			<div class="input-prepend article">
				<span class="add-on span3">文体</span>
				<select name="word" id="article">
					<option value="校园传真">校园传真</option>
					<option value="日新提醒">日新提醒</option>
					<option value="记者直击">记者直击</option>
					<option value="孔目湖讲坛">孔目湖讲坛</option>
					<option value="日新时评">日新时评</option>
					<option value="日新言论">日新言论</option>
					<option value="日新访谈">日新访谈</option>
					<option value="交大青年">交大青年</option>
					<option value="差稿">差稿</option>
				</select>	
			</div>
			<div class="input-prepend value">
				<span class="add-on span3">分值</span>
				<input type="number" name="value" id="value" placeholder="Number">
			</div>
			<div class="input-prepend username">
				<span class="add-on span3">姓名</span>
				<input type="text" name="user" id="password" placeholder="Name">
			</div>
			<div id="articleBtn" class="form-actions">
				<button type="submit" class="btn btn-primary">上传</button>
			</div>
		</form>		
	</div>


	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>