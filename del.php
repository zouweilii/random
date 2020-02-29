<?php
	//第一步：获取你要删除的数据的id
	$id = $_GET['id'];	
	//1.连接数据库
    $link=mysqli_connect('localhost','root','123456');
	//2.判断是否连接成功
    if(!$link){
		exit("数据库连接失败！");
	}
	//3.设置字符集
	mysqli_set_charset($link,'utf8');
	//4.选择数据库
	mysqli_select_db($link,'db_database');
	//5.准备sql语句
	$sql = "select * from db_selected";
	$result = mysqli_query($link, $sql);
	$rows= mysqli_fetch_assoc($result);
	$class=$rows['selectedclass'];
	$sql="delete from {$class} where id=$id";
	//6.发送sql语句
	$boolean=mysqli_query($link,$sql);
	//var_dump($boolean);
	if($boolean && mysqli_affected_rows($link)){
		echo "<script>alert('删除成功！');window.location.href='changenames.php';</script>";
	}else{
		echo "<script>alert('删除失败！');window.location.href='index.php';</script>";
	}	
	
	mysqli_close($link);