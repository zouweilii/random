<?php
 $class = $_GET['class'];
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
   
    <h3>添加名单</h3>
  
	<div style="margin-top:15px;" class="rows">
	<?php
	echo '<div class="rows">';
		echo'<span class="text-danger ml-3">*姓名必须以中文，分开</span>';
		echo'<form action="doaddname.php?class='.$class.'"  method="POST"  class="input-group mt-3 ml-3">';	
			echo'<input  id="name" class="form-control" style="width:300px"  name="name"  type="text" placeholder="姓名">';
			echo'<input type="submit" class="btn btn-primary " value="添加"  />';
		echo'</form>';
		echo'</div>';
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
