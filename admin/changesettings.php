<?php
  require_once '../config.php';
 $title = $_POST['title'];
 $keywords = $_POST['keywords'];
 $description = $_POST['description'];
 $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
if (!$conn) {
  exit('连接数据库失败');
}
mysqli_set_charset($conn,'utf8');
$res=mysqli_query($conn,"delete from setting");
$sql="insert into setting(title,keywords,description) values('$title','$keywords','$description')";
$res=mysqli_query($conn,$sql);
echo "<script>alert('设置修改完成！');window.location.href='settings.php';</script>";
	