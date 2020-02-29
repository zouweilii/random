<?php
require_once '../functions.php';
xiu_get_current_user();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Comments &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
  <script src="/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
 
 <script>NProgress.start()</script>
  <div class="main">
    <?php include "inc/navbar.php" ; ?>
    <h3>班级名单</h3>
	<div  class="rows">
	<?php
    $link=mysqli_connect('localhost','root','123456');
    if(!$link){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($link,'utf8');
	mysqli_select_db($link,'db_database');
	//先查出所有的学生名单表
	$classname = mysqli_query($link, "select * from db_class");
	//echo $classname;
	//再根据学生名单表循环显示各个班的名单
	while($rows = mysqli_fetch_assoc($classname)){
		$class=$rows['classname'];
		$stu=mysqli_query($link,"select * from {$class}");
		//echo '<div class="rows">';
		
		echo '<div class="col-sm-7">';
		echo '<h3>'.$class.'班</h3>';
		echo '<table class="table table-striped table-bordered table-hover ">';
		echo '<th class="text-center">编号</th><th class="text-center">姓名</th><th class="text-center">操作</th>';
		while($info = mysqli_fetch_assoc($stu)){
			echo '<tr align="center">';
				echo '<td>'.$info['id'].'</td>';
				echo '<td>'.$info['name'].'</td>';
				echo '<td><a href="delname.php?id='.$info['id'].'&class='.$class.'" class="btn btn-danger btn-xs">删除</a></td>';
			echo '</tr>';
		}
		echo '<tr><td colspan="3"><a href="addname.php?class='.$class.'" style="display:block;width:4rem;margin:0 auto;" class="btn btn-primary btn-xs">添加</a></td></tr>';	
		echo '<tr><td colspan="3"><a href="delclasses.php?class='.$class.'" style="display:block;width:8rem;margin:0 auto;" class="btn btn-danger btn-xs">删除整个名单</a></td></tr>';
		echo '</table>';
		echo '</div>';	
	}
	?>
	</div>
  </div>
 
  <?php $current_page="names" ;?>
  <?php include "inc/sidebar.php" ; ?>
 </div>
  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
