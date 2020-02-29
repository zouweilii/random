<?php
    require_once '/config.php';
    $conn = mysqli_connect(XIU_DB_HOST,XIU_DB_USER,XIU_DB_PASS,XIU_DB_NAME);
    if(!$conn){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($conn,'utf8');
	$sql = "select * from db_selected";
	$result = mysqli_query($conn, $sql);
	$res = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($res);
	mysqli_close($link);
?>