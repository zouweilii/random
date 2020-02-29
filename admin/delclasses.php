<?php
	$class = $_GET['class'];	
    $link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	$res=mysqli_query($link,"drop table ${class};");
	$res=mysqli_query($link,"delete from db_class where classname='{$class}'");
	echo "<script>alert('班级删除完成');window.location.href='names.php';</script>";
	mysqli_close($link);