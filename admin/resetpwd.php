<?php
 require_once '../functions.php';
 $current_user = xiu_get_current_user();
 $email = $current_user['email'];
 $password = $_POST['password'];
 $confirm = $_POST['confirm'];
 $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
if (!$conn) {
  exit('连接数据库失败');
}
mysqli_set_charset($conn,'utf8');

if(!($password)||!($confirm)){
		echo "<script>alert('请重新输入新密码');window.location.href='password-reset.php';</script>";
}else {
	  if(!preg_match("/^\d{6,16}$/",$password) || !preg_match("/^\d{6,16}$/",$confirm)){
		//正则匹配，只要有一个不符合就会报错
		echo "<script>alert('密码不符合要求，请重新输入新密码');window.location.href='password-reset.php';</script>";
	  }else{
		if(strcmp('$password','$confirm')){
		$res=mysqli_query($conn,"update users set password='$password' where email='$email';");
		echo "<script>alert('修改完成！');window.location.href='login.php';</script>";
		}else{
		echo "<script>alert('密码不一致');window.location.href='password-reset.php';</script>";	
		}
	  } 	
}
	
	
		
	


	
	
	
