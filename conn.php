<?php
   $conn=mysql_connect("localhost", "department_mana", "department_mana") or die("数据库链接错误");
   mysql_select_db("department_mana", $conn);
   mysql_query("set names 'utf8'");
 ?>