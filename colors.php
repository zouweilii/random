<?php
$link = mysqli_connect("localhost", "root",  "123456");
if(!$link){
		exit("数据库连接失败！");
	}
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,'db_database');
$sql = "select bgcolor from db_color";
$result = mysqli_query($link, $sql);
$colors = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($colors);

mysqli_close($link);
?>