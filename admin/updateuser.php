<?php
 require_once '../functions.php';
 $current_user = xiu_get_current_user();
 $email = $current_user['email'];
 $avatar = $_POST['avatar'];
 $slug = $_POST['slug'];
 $nickname = $_POST['nickname'];
 $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
if (!$conn) {
  exit('连接数据库失败');
}
mysqli_set_charset($conn,'utf8');
$res=mysqli_query($conn,"update users set slug='$slug',nickname='$nickname',avatar='$avatar' where email='$email';");
echo "<script>alert('修改完成！');window.location.href='index.php';</script>";
	