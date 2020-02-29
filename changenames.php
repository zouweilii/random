<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Users &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
  <script src="/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
<div  class="row" style="margin:10px auto;">
 <div class="col-sm-3"></div>
 <div  class="col-sm-6"> 
  <?php
    $link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	$sql = "select * from db_selected";
	$result = mysqli_query($link, $sql);
	$rows= mysqli_fetch_assoc($result);
	$class=$rows['selectedclass'];
	$sql="select * from {$class}";
	$res=mysqli_query($link,$sql);
	echo '<table class="table table-striped table-bordered table-hover ">';
		echo '<th class="text-center">编号</th><th class="text-center">姓名</th><th class="text-center">操作</th>';
		while($rows = mysqli_fetch_assoc($res)){
			echo '<tr align="center">';
				echo '<td>'.$rows['id'].'</td>';
				echo '<td>'.$rows['name'].'</td>';
				echo '<td><a href="del.php?id='.$rows['id'].'" class="btn btn-danger btn-xs">删除</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '<div >';
	echo '<a href="add.php" style="display:block;width:4rem;margin:0 auto;margin-bottom:15px;" class="btn btn-default btn-xs ">添加</a>';
	echo '<a href="delclass.php?class={$class}" style="display:block;width:8rem;margin:0 auto;" class="btn btn-danger btn-xs">删除整个名单</a>';
	echo '<a href="index.php" style="display:block;width:8rem;margin:1rem  auto 0;" class="btn btn-primary btn-xs">返回主页</a>';
	echo '</div>';
	?>
  </div>
  <div class="col-sm-3"></div>
</div>