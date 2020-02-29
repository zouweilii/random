<?php
 require_once '../config.php';
 $id = $_GET['id'];
 $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
if (!$conn) {
  exit('连接数据库失败');
}
mysqli_set_charset($conn,'utf8');
$sql="delete from users where id=$id";
$res=mysqli_query($conn,$sql);
echo "<script>alert('用户删除完成完成！');window.location.href='users.php';</script>";
	