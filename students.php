<?php
$link = mysqli_connect("localhost", "root",  "123456");
if(!$link){
		exit("数据库连接失败！");
	}
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,'db_database');
$sql = "select * from db_selected";
$result = mysqli_query($link, $sql);
$rows= mysqli_fetch_assoc($result);
$class=$rows['selectedclass'];
//echo $class;
$result = mysqli_query($link,"select name from {$class}");
$names = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($names);

mysqli_close($link);
?>