<?php
 require_once '../config.php';
 //$current_user = xiu_get_current_user();
 $email = $_POST['email'];
 $avatar = $_POST['avatar'];
 $slug = $_POST['slug'];
 $nickname = $_POST['nickname'];
 $password = $_POST['password'];
 $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
if (!$conn) {
  exit('连接数据库失败');
}
mysqli_set_charset($conn,'utf8');
$sql="insert into users(slug,email,password,nickname,avatar) values('$slug','$email','$password','$nickname','$avatar')";
$res=mysqli_query($conn,$sql);
echo "<script>alert('添加完成！');window.location.href='users.php';</script>";
	