<meta charset="UTF-8">
<?php
   session_start();
   error_reporting(0);
   if(!isset($_SESSION['un']))
	{
		echo "请登录!";
	}
	else
	{ 
	   if(isset($_POST['submit'])){
		   $operation = $_POST['submit'];
	   }
	   if(isset($_POST['user'])){
		   $user = $_POST['user'];
	   }
	   if(isset($_POST['value'])){
		   $value = $_POST['value'];
	   }
	   if(isset($_POST['word'])){
		   $word = $_POST['word'];
	   }
	   if(isset($_POST['statistic'])){
	   	   $statistic = $_POST['statistic'];	
	   }
/* -------------------------------------------分割线-----------------------------*/
	   function add($type, $num, $operation, $user){
           include("conn.php");
		   mysql_query("BEGIN");
		   //操作message表
		   $query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
		   $row=mysql_fetch_array($query);
		   $cal=floatval($row[$type]) + 1;
		   $mul=floatval($row['total']) - $num;
		   $res1=mysql_query("UPDATE `message` SET `$type`='$cal',`total`='$mul' WHERE `user`='$user'");
		   //操作statistic表
           $res2=mysql_query("INSERT INTO `statistic` (`id`,`name`,`operation`,`time`) VALUES ('','$user','$operation',unix_timestamp())");
		   //事务判断
		   if($res1&&$res2)
		   {
			   	mysql_query("COMMIT");
			   	$query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
			   	$row=mysql_fetch_array($query);
	            echo json_encode($row[$type]);
		   }
		   else
		   {
                mysql_query("ROLLBACK");
                echo "try agian!";
		   }
		   mysql_query("END");
		}
	   function del($type,$num,$operation,$user){
           include("conn.php");
		   mysql_query("BEGIN");
		   //操作message表
		   $query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
		   $row=mysql_fetch_array($query);
		   $cal=floatval($row[$type]) - 1;
		   $mul=floatval($row['total']) + $num;
		   $res1=mysql_query("UPDATE `message` SET `$type`='$cal',`total`='$mul' WHERE `user`='$user'");
		   //操作statistic表
           $res2=mysql_query("INSERT INTO `statistic`(`id`, `name`, `operation`,`time`) VALUES ('','$user','$operation',unix_timestamp())");
		   //事务判断
		   if($res1 && $res2)
		   {
			   	mysql_query("COMMIT");
			   	$query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
			   	$row=mysql_fetch_array($query);
	            echo json_encode($row[$type]);
		   }
		   else
		   {
                mysql_query("ROLLBACK");
                echo "try agian!";
		   }
		   mysql_query("END");
		}
/* -------------------------------------------分割线-----------------------------*/
	   //添加一个新用户
	    if($operation =='add'){
		   include("conn.php");
		   $result= mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
		   $row=mysql_fetch_array($result);
		   if($row){
			   echo "用户名已存在";
		   }
           else{
			   mysql_query("INSERT INTO `message`(`id`, `user`, `uarrive`, `vacate`, `late`,`accident`,`total`) VALUES ('','$user','0','0','0','0','0')");
		       echo "okadd";
	       }
	    }
/* -------------------------------------------分割线-----------------------------*/
	  //删除一个用户
	   elseif($operation=='del'){
		   include("conn.php");
		   $del="DELETE  FROM `message` WHERE `user`='$user'";
		   mysql_query($del); 
		   echo "OKdel";
	   }
/* -------------------------------------------分割线-----------------------------*/
       //更改工作点
	   elseif($operation=='update'){
		   include("conn.php");
		   mysql_query("BEGIN");
		   //操作message表
		   $query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
		   $row=mysql_fetch_array($query);
		   $value=floatval($value);
		   $cal1=floatval($row['total'])+$value;
		   $res1=mysql_query("UPDATE `message` SET `total`='$cal1' WHERE `user`='$user'");
		   //操作history表
		   $un=$_SESSION['un'];
		   $res2=mysql_query("INSERT INTO `history`(`name`,`history`,`time`,`value`,`editor`) VALUES ('$user','$word',unix_timestamp(),'$value','$un')");
		   //事务判断
		   if($res1 && $res2){
			   	  mysql_query("COMMIT");
			   	  echo "OKupdate";
		   }
		   else{
               mysql_query("ROLLBACK");
               echo "try agian!";
		   }
		   mysql_query("END");
	   }
/* -------------------------------------------分割线-----------------------------*/
	   //调整工作点
	   elseif($operation=='updateadd'){
	   	    include("conn.php");
	   	    mysql_query("BEGIN");
			//操作message表
			$query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
			$row=mysql_fetch_array($query);
			$cal=floatval($row['total'])+ 0.1;
			$res=mysql_query("UPDATE `message` SET `total`='$cal' WHERE `user`='$user'");
		    //操作statistic表
		    $statistic=mysql_query("INSERT INTO `statistic`(`id`,`name`,`operation`,`time`) VALUES ('','$user','8',unix_timestamp())");
		    if($res && $statistic){
		        mysql_query("COMMIT");
			    $query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
			    $row=mysql_fetch_array($query);
			    echo json_encode($row['total']);
		    }
		    else{
			    mysql_query("ROLLBACK");
			    echo "try again!";
		    }
		    mysql_query("END");
	   }
	   elseif($operation=='updatedel'){
	   	    include("conn.php");
	   	    mysql_query("BEGIN");
	   	    //操作message表
			$query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
			$row=mysql_fetch_array($query);
			$cal=floatval($row['total'])- 0.1;
		    $res=mysql_query("UPDATE `message` SET `total`='$cal' WHERE `user`='$user'");
		    //操作statistic表
		    $statistic=mysql_query("INSERT INTO `statistic`(`id`,`name`,`operation`,`time`) VALUES ('','$user','9',unix_timestamp())");
		    if($res && $statistic){
		        mysql_query("COMMIT");
			    $query=mysql_query("SELECT * FROM `message` WHERE `user`='$user'");
			    $row=mysql_fetch_array($query);
			    echo json_encode($row['total']);
		    }
		    else{
			    mysql_query("ROLLBACK");
			    echo "try again!";
		    }
		    mysql_query("END");
	   }
/* -------------------------------------------分割线-----------------------------*/
	   //加减旷到分
	   elseif($operation=='uarriveadd'){
		 	  add($type='uarrive',$num=2,$operation="0",$user=$_POST['user']); 
	    }
	   elseif($operation=='uarrivedel'){
			  del($type='uarrive',$num=2,$operation="1",$user=$_POST['user']);
	   }
/* -------------------------------------------分割线-----------------------------*/
	   //加减请假分
	   elseif($operation=='vacateadd'){
		      add($type='vacate',$num=1,$operation="2",$user=$_POST['user']);
	   }
	   elseif($operation=='vacatedel'){
		      del($type='vacate',$num=1,$operation="3",$user=$_POST['user']);
	   }
/* -------------------------------------------分割线-----------------------------*/
	   //加减迟到分
	   elseif($operation=='lateadd'){
		   add($type='late', $num=0.5,$operation="4", $user=$_POST['user']);
	   }
	   elseif($operation=='latedel'){
		   del($type='late', $num=1, $operation="5", $user=$_POST['user']);
	   }
/* -------------------------------------------分割线-----------------------------*/
       //加减新闻事故
       elseif ($operation=='accidentadd'){
       	    add($type='accident', $num=0, $operation="6", $user=$_POST['user']);
       }
       elseif($operation=='accidentdel'){
		    del($type='accident', $num=0, $operation="7", $user=$_POST['user']);
	   }
/* -------------------------------------------分割线-----------------------------*/
	   else{
		   echo "error";
	   }
   }
?>