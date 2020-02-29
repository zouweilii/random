 <?php 
 require_once '../functions.php';
 $curent_page = isset($current_page) ? $current_page : '' ;
 $current_user = xiu_get_current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title></title>
</head>
<body>
 <div class="aside">
    <div class="profile">
      <img class="avatar" src="<?php echo $current_user['avatar'] ;?>">
      <h3 class="name"><?php  echo $current_user['nickname'] ;?></h3>
    </div>
    <ul class="nav">
      <li <?php echo $current_page === 'index' ? 'class="active"' : ''; ?>>
        <a href="/admin/index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li <?php  echo $current_page === 'names' ? 'class="active"' : '';?> >
        <a href="/admin/names.php"><i class="fa fa-user-circle"></i>班级名单</a>
      </li>
      <li style="display:<?php echo $current_user['slug'] === 'admin' ? 'block' : 'none'; ?>;" <?php echo $current_page === 'users' ? 'class="active"' : ''; ?>>
        <a href="/admin/users.php"><i class="fa fa-users"></i>用户</a>
      </li>
       <li <?php echo $current_page === 'settings' ? 'class="active"' : ''; ?>>
        <a href="/admin/settings.php"><i class="fa fa-cogs"></i>网站设置</a>
      </li>
    </ul>
  </div>
 </body>
</html>