
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
  <script>NProgress.start()</script>

  <div class="main">
   <?php include "inc/navbar.php" ; ?>
    <div class="container-fluid">
      <div class="page-title">
        <h1>用户</h1>
      </div>
      <div class="row">
        <div class="col-md-4">
          <form class="form-horizontal" action="adduser.php" method="post" >
            <h2>添加新用户</h2>
			<div class="form-group">
			  <label class=" control-label">头像</label>
			  <div >
               <label class="form-image">
                 <input id="avatar" type="file">
                 <img src="/static/assets/img/default.png">
                 <input type="hidden" name="avatar">
                 <i class="mask fa fa-upload"></i>
               </label>
              </div>
            </div>
            <div class="form-group">
              <label for="email">邮箱</label>
              <input id="email" class="form-control" name="email" type="email" placeholder="邮箱">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/user/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="nickname">昵称</label>
              <input id="nickname" class="form-control" name="nickname" type="text" placeholder="昵称">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input id="password" class="form-control" name="password" type="text" placeholder="密码">
			  <span class="text-danger">*密码为6到16位数字<span>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit">添加</button>
            </div>
          </form>
        </div>
<?php
 require_once '../functions.php';
 //$current_user=xiu_get_current_user();
 $conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
    if(!$conn){
		exit("数据库连接失败！");
	}
	mysqli_set_charset($conn,'utf8');
	$sql="select * from users";
	$res=mysqli_query($conn,$sql);
	echo '<div class="col-md-8">';
	echo '<p class="text-danger">*注意：管理员不可删除</p>';
	echo '<table class="table table-striped table-bordered table-hover ">';
		echo '<th class="text-center" width="80">头像</th><th class="text-center">邮箱</th><th class="text-center">别名</th><th class="text-center">昵称</th><th class="text-center">操作</th>';
		while($rows = mysqli_fetch_assoc($res)){
			echo '<tr class="text-center">';
				echo '<td class="text-center"><img class="avatar" src="'.$rows['avatar'].'"></td>';
				echo '<td>'.$rows['email'].'</td>';
				echo '<td>'.$rows['slug'].'</td>';
				echo '<td>'.$rows['nickname'].'</td>';
				echo '<td class="text-center">
						<a ';
					echo $rows['slug'] === 'admin'?'':'href="deluser.php?id='.$rows['id'];
					echo '" class="btn btn-danger btn-xs" ';
					echo $rows['slug'] === 'admin' ? 'disabled pointer-events:none ' : '';
					echo '>删除</a></td>';
			echo '</tr>';
		}
	echo '</table>';
	echo '</div>';
?>
      </div>
    </div>
  </div>

   <?php $current_page="users" ;?>
   <?php include "inc/sidebar.php" ; ?>

  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script type="text/javascript">
    $('#avatar').on('change',function () {
      //当文件选择状态发送变化的时候会执行这个事件处理函数
      //判断是否选中了文件
      var $this=$(this)
      var files=$this.prop('files')
      if(!files.length) return
        //拿到我们要上传的文件
        var file = files[0]
        //FormData是HTML5中新增的一个成员，专门配合AJAX操作用于在客户端与服务端之间传递二进制数据
        var data = new FormData()
        data.append('avatar',file)
        var xhr =new XMLHttpRequest()
        xhr.open('POST','/admin/api/upload.php')
        xhr.send(data)//借助于FormData传递二进制
        xhr.onload = function () {
          $this.siblings('img').attr('src',this.responseText)
          $this.siblings('input').val(this.responseText)
        }
    })
  </script>
  <script>NProgress.done()</script>
</body>
</html>
