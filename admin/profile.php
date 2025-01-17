 <?php 
 require_once '../functions.php';
 $current_user = xiu_get_current_user();
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Dashboard &laquo; Admin</title>
  <link rel="stylesheet" href="/static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="/static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="/static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="/static/assets/css/admin.css">
  <script src="/static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <?php include 'inc/navbar.php'; ?>

    <div class="container-fluid">
      <div class="page-title">
        <h1>我的个人资料</h1>
      </div>
      <form class="form-horizontal" action="updateuser.php" method="post" >
        <div class="form-group">
          <label class="col-sm-3 control-label">头像</label>
          <div class="col-sm-6">
            <label class="form-image">
              <input id="avatar" type="file">
              <img src="/static/assets/img/default.png">
			  <input type="hidden" name="avatar">
              <i class="mask fa fa-upload"></i>
            </label>
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-3 control-label">邮箱</label>
          <div class="col-sm-6">
            <input id="email" class="form-control" name="email" type="type" value="<?php echo $current_user['email'] ;?>" placeholder="邮箱" readonly>
            <p class="help-block">登录邮箱不允许修改</p>
          </div>
        </div>
        <div class="form-group">
          <label for="slug" class="col-sm-3 control-label">别名</label>
          <div class="col-sm-6">
            <input id="slug" class="form-control" name="slug" type="type" value="<?php echo $current_user['slug'] ;?>" placeholder="slug">
            <p class="help-block">https://zce.me/user/<strong><?php echo $current_user['slug'] ;?></strong></p>
          </div>
        </div>
        <div class="form-group">
          <label for="nickname" class="col-sm-3 control-label">昵称</label>
          <div class="col-sm-6">
            <input id="nickname" class="form-control" name="nickname" type="type" value="<?php echo $current_user['nickname'] ;?>" placeholder="昵称">
            <p class="help-block">限制在 2-16 个字符</p>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-primary">更新</button>
            <a class="btn btn-link" href="password-reset.php">修改密码</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php $current_page = 'profile'; ?>
  <?php include 'inc/sidebar.php'; ?>
	
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
