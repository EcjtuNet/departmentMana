<?php
session_start();
?>
<?php
include("conn.php"); 
function redirect(){
	$url="index.php";
	echo "<script language='javascript' type='text/javascript'>";
	echo "window.location.href='$url'";
	echo "</script>";               //重新回到主页
}
if (isset ($_SESSION['un']))
{
	redirect();
}
else
{
	$un=$_POST['username'] ;    //获取参数
	$pw=$_POST['password'] ;//验证管理员名称和密码是否正确,这里采用直接验证,没有连接数据库	
	if ($un=="username" and $pw=="password")
	{
		$_SESSION['un']=$un;        //注册新的变量,保存当前会话的昵称
		$_SESSION['pw']=$pw;
		 //登录成功回到主页面
		echo "<script>alert('登陆成功');</script>";
		redirect();
	}
    else
	{
		echo "<script>alert('登陆信息不正确');</script>";
	}
}

?>