<?php
	$class=$_GET['selectededclass'];
	$link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	$res=mysqli_query($link,"delete from db_selected ");
	$res=mysqli_query($link,"insert into db_selected(selectedclass) values('{$class}')");
	echo "<script>window.location.href='index.php';</script>";
	mysqli_close($link);
	?>