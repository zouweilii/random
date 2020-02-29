<?php
$link = mysqli_connect("localhost", "root",  "123456");
if(!$link){
		exit("数据库连接失败！");
	}
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,'db_database');
$sql = "select classname from db_class";
$result = mysqli_query($link, $sql);
$classes = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($classes);

mysqli_close($link);
?>