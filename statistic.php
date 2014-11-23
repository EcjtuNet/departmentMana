<meta charset="UTF-8">
<?php
	include("conn.php");
    //查询各文章总数(直接输出在一张表中)
    $monthbegin=strtotime(date("Y-m-d H:i:s",mktime(0, 0 , 0,date("m"),1,date("Y")))); 
	$monthend=strtotime(date("Y-m-d H:i:s",mktime(23,59,59,date("m"),date("t"),date("Y"))));
    $historycount=mysql_query("SELECT `history`,COUNT(*) 
    	FROM `history`  
    	WHERE `time` BETWEEN '$monthbegin' AND '$monthend'
    	GROUP BY `name`"
    	);
    $history=mysql_fetch_array($historycount);
    echo var_dump(($history));
?>
<?php
    //查询各操作总数
    $count=array(
    	'0'=>1,'1'=>-1,'2'=>2,'3'=>-2,'4'=>0.5,'5'=>-0.5,'6'=>0,'7'=>0,'8'=>0.1,'9'=>-0.1
    	);
    $opcount=mysql_query("SELECT `name`, `operation`, COUNT( * )
		FROM `statistic`
		WHERE `time`
		BETWEEN '$monthbegin' AND '$monthend'
		GROUP BY `operation`");
    $num=mysql_fetch_array($opcount);
    echo var_dump($num);
 	//计算各用户文章总分
 	$valuesum=mysql_query("SELECT `name`, SUM(`value`)
 		FROM `history` 
 		WHERE `time`
		BETWEEN '$monthbegin' AND '$monthend'
 		GROUP BY `name`");
 	$total=mysql_fetch_array($valuesum);
 	echo var_dump($total);
 	//$value=$total -
?>
