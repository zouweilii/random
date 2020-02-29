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
 <div  class="col-sm-6"> 
  <?php
   echo '<div class="rows">
		 <span class="text-danger ml-3">*姓名必须以中文，分开</span>
		 <form action="doadd.php" method="POST"  class="input-group mt-3 ml-3">	
            <input  id="name" class="form-control" style="width:300px"  name="name"  type="text" placeholder="姓名">
			<input type="submit" class="btn btn-primary " style="margin-top:-55px;margin-left:316px;" value="添加"  />
		 </form>  
		 <a href="index.php"  class="btn btn-primary ml-3">返回主页</a>
	</div>';
  ?>
  </div>
  <div class="col-sm-3"></div>
</div>