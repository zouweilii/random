<?php
	$id = $_GET['id'];	
	$class = $_GET['class'];	
    $link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	$sql="delete from {$class} where id=$id";
	//6.发送sql语句
	$boolean=mysqli_query($link,$sql);
	//var_dump($boolean);
	if($boolean && mysqli_affected_rows($link)){
		echo "<script>window.location.href='names.php';</script>";
	}else{
		echo "<script>alert('删除失败！');window.location.href='names.php';</script>";
	}	
	
	mysqli_close($link);