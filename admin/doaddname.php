<?php
	$class = $_GET['class'];	
	//echo $class;
   $link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	if(!($_POST['name']))
	{
		echo "<script>alert('信息为空！请重新输入');window.location.href='names.php';</script>";
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
			echo "<script>alert('名单添加完成');window.location.href='names.php';</script>";
		}else{
			echo "<script>alert('格式错误，请重新输入');window.location.href='names.php';</script>";
		}
	};
	