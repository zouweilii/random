<?php
require_once '../functions.php';
require_once '/api/classcount.php';
require_once '/api/userscount.php';

// 判断用户是否登录一定是最先去做
xiu_get_current_user();

// 获取界面所需要的数据
// 重复的操作一定封装起来
$posts_count = xiu_fetch_one('select count(1) as num from posts;')['num'];

$categories_count = xiu_fetch_one('select count(1) as num from categories;')['num'];

$comments_count = xiu_fetch_one('select count(1) as num from comments;')['num'];

$classes_count = $nums;
$users_count = $users;

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
      <div class="jumbotron text-center">
        <h1>One Belt, One Road</h1>
        <p>Thoughts, stories and ideas.</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">内容统计：</h3>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><strong><?php echo $classes_count; ?></strong>个班级</li>
              <li class="list-group-item"><strong><?php echo $users_count; ?></strong>个用户</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $current_page = 'index'; ?>
  <?php include 'inc/sidebar.php'; ?>

  <script src="/static/assets/vendors/jquery/jquery.js"></script>
  <script src="/static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>
</body>
</html>
