
<?php

	//1.连接数据库
	$link=mysqli_connect('localhost','root','123456');
	//2.判断是否连接成功
    if(!$link){
		exit("数据库连接失败！");
	}
	//3.设置字符集
	mysqli_set_charset($link,'utf8');
	//4.选择数据库
	mysqli_select_db($link,'db_database');
	//$sql="insert into db_color(bgcolor) values('$_POST[bgcolor]');";
	
	if(!($_POST['bgcolor']))
	{
		echo "<script>alert('信息为空！请重新输入');window.location.href='index.php'</script>";
	}else{
		$flag=true;
		if(!preg_match("/^#([0-9a-fA-F]{6}|[0-9a-fA-F]{3})$/",$_POST['bgcolor'])){
				$flag=false;
			};
	
		if($flag){
			$res=mysqli_query($link,"delete from db_color;");
			$res=mysqli_query($link,"insert into db_color(bgcolor) values('$_POST[bgcolor]');");
			echo "<script>alert('背景颜色修改完成');window.location.href='index.php';</script>";
		}else{
			echo "<script>alert('格式错误，请重新输入颜色值');window.location.href='index.php';</script>";
		}
	};
	mysqli_close($link);
?>	
