<?php
    $link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	$sql = "select * from db_selected";
	$result = mysqli_query($link, $sql);
	$rows= mysqli_fetch_assoc($result);
	$class=$rows['selectedclass'];
	$res=mysqli_query($link,"drop table ${class};");
	$res=mysqli_query($link,"delete from db_class where classname='{$class}'");
	echo "<script>alert('班级删除完成');window.location.href='index.php';</script>";
	mysqli_close($link);