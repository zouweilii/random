<?php
	//$name = $_POST['name'];
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
	//5.准备sql语句
	$sql = "select * from db_selected";
	$result = mysqli_query($link, $sql);
	$rows= mysqli_fetch_assoc($result);
	$class=$rows['selectedclass'];
	if(!($_POST['name']))
	{
		echo "<script>alert('信息为空！请重新输入');window.location.href='add.php';</script>";
	}else{
		$arrays=explode("，", $_POST['name']);
		$count=count($arrays);
		$flag=true;
		for ($i=0;$i<$count;$i++){
			if(!preg_match("/^[\x{4e00}-\x{9fa5}]{2,4}$/u",$arrays[$i])){
				$flag=false;
			};
		}		
		if($flag){
			for($i=0;$i<$count;$i++){
				$name=$arrays[$i];
				$sql="insert into {$class}(name) values('{$name}')";
				$res=mysqli_query($link,$sql);
			}
			echo "<script>alert('名单添加完成');window.location.href='changenames.php';</script>";
		}else{
			echo "<script>alert('格式错误，请重新输入');window.location.href='add.php';</script>";
		}
	};
	
	mysqli_close($link);