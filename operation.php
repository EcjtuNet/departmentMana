<?php
   session_start ();
   if(!isset($_SESSION['un']))
	{
		echo "请登录!";
	}
	else
	{ 
	   if(isset($_POST['submit']))
	   {
		   $operation=$_POST['submit'];
	   }
	   if(isset($_POST['user']))
	   {
		   $user=$_POST['user'];
	   }
	   if(isset($_POST['value']))
	   {
		   $value=$_POST['value'];
	   }
	   if(isset($_POST['word']))
	   {
		   $word=$_POST['word'];
	   }
/* -------------------------------------------分割线-----------------------------------------------------------*/

	   //添加一个新用户
	   if($operation=='add')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $result= mysql_query($sql);
		   $row=mysql_fetch_array($result);
		   if($row)
			{
			   echo "用户名已存在";
		    }
           else
		   {
			   $add="INSERT INTO `message`(`id`, `user`, `uarrive`, `vacate`, `late`, `arrive`,`total`) VALUES ('','$user','0','0','0','0','0')";
			   mysql_query($add);
			   echo "OKadd";
		   }
	   }
 /* -------------------------------------------分割线-----------------------------------------------------------*/
	   //删除一个用户
	   elseif($operation=='del')
	   {
		   include("conn.php");
		   $del="DELETE  FROM `message` WHERE `user`='$user'";
		   mysql_query($del); 
		   echo "OKdel";
	   }
/* -------------------------------------------分割线-----------------------------------------------------------*/
       //更改积分
	   elseif($operation=='update')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $value=intval($value);
		   $cal=intval($row['total'])+$value;
		   $update="UPDATE `message` SET `total`='$cal' WHERE `user`='$user'";
		   mysql_query($update);
		   $sql="INSERT INTO `history`(`name`,`history`,`time`,`value`) VALUES ('$user','$word',now(),'$value')";
		   mysql_query($sql);
		   echo "OKupdate";
	   }
/* -------------------------------------------分割线-----------------------------------------------------------*/
	   //加减缺勤分
	   elseif($operation=='uarriveadd')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['uarrive'])+ 1;
		   $update="UPDATE `message` SET `uarrive`='$cal' WHERE `user`='$user'";
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['uarrive']);
	   }
	   elseif($operation=='uarrivedel')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['uarrive'])- 1;
		   $update="UPDATE `message` SET `uarrive`='$cal' WHERE `user`='$user'";
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['uarrive']);
	   }
/* -------------------------------------------分割线-----------------------------------------------------------*/
	   //加减请假分
	   elseif($operation=='vacateadd')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['vacate'])+ 1;
		   $update="UPDATE `message` SET `vacate`='$cal' WHERE `user`='$user'" ;
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['vacate']);
	   }
	   elseif($operation=='vacatedel')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['vacate'])- 1;
		   $update="UPDATE `message` SET `vacate`='$cal' WHERE `user`='$user'"  ;
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['vacate']);
	   }
 /* -------------------------------------------分割线-----------------------------------------------------------*/
	   //加减迟到分
	   elseif($operation=='lateadd')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['late'])+ 1;
		   $update="UPDATE `message` SET `late`='$cal' WHERE `user`='$user'" ;
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['late']);
	   }
	   elseif($operation=='latedel')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['late'])- 1;
		   $update="UPDATE `message` SET `late`='$cal' WHERE `user`='$user'" ;
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['late']);		   
	   }
/* -------------------------------------------分割线-----------------------------------------------------------*/
	   //加减考勤分
	   elseif($operation=='arriveadd')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['arrive'])+ 1;
		   $update="UPDATE `message` SET `arrive`='$cal' WHERE `user`='$user'";
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['arrive']);		   
	   }
	   elseif($operation=='arrivedel')
	   {
		   include("conn.php");
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   $cal=intval($row['arrive'])- 1;
		   $update="UPDATE `message` SET `arrive`='$cal' WHERE `user`='$user'";
		   mysql_query($update);
		   $sql="SELECT * FROM `message` WHERE `user`='$user'";
		   $query=mysql_query($sql);
		   $row=mysql_fetch_array($query);
		   echo json_encode($row['arrive']);	
		   
	   }
	   else
	   {
		   echo "error";
	   }
   }
?>