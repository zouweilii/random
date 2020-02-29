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
	if(!($_POST['names'])||!($_POST['class']))
	{
		echo "<script>alert('信息不全！请重新输入');window.location.href='index.php'</script>";
	}else{
		//echo $_POST['names'];
		//echo $_POST['class'];
		$arrays=explode("，", $_POST['names']);
		//var_dump ($arrays);
		$count=count($arrays);
		//echo $count;		
		//$regex ="/^[\u4e00-\u9fa5]{2,4}$/";
		$flag=true;
		//正则匹配，只要有一个不符合就会报错
		for ($i=0;$i<$count;$i++){
			if(!preg_match("/^[\x{4e00}-\x{9fa5}]{2,4}$/u",$arrays[$i])){
				$flag=false;
			};
		}		
		if($flag){
			$classname= $_POST['class'];
			$sql="insert into db_class(classname) values('{$classname}')";
			$res=mysqli_query($link,$sql);
			$sql = "create table {$classname}
					   (
						id int(4) primary key auto_increment,
						name varchar(10)
					   )";
					   echo $sql;
			$res=mysqli_query($link,$sql);
			for($i=0;$i<$count;$i++){
				$names=$arrays[$i];
				$sql="insert into {$classname}(name) values('{$names}')";
				$res=mysqli_query($link,$sql);
			}
			echo "<script>alert('名单输入完成');window.location.href='index.php';</script>";
		}else{
			echo "<script>alert('格式错误，请重新输入名单');window.location.href='index.php';</script>";
		}
	};
	mysqli_close($link);
?>	
