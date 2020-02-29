<?php
require_once '/functions.php';
$settings = xiu_fetch_one('select * from setting;');

$link = mysqli_connect("localhost", "root",  "123456");
if(!$link){
		exit("数据库连接失败！");
	}
mysqli_set_charset($link,'utf8');
mysqli_select_db($link,'db_database');
$sql = "select * from db_selected";
$result = mysqli_query($link, $sql);
$rows= mysqli_fetch_assoc($result);
$class=$rows['selectedclass'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php echo $settings['title']?></title>
  <meta name="keywords" content="<?php echo $settings['keywords']?>">
  <meta name="Description" content="<?php echo $settings['description']?>">
  <link rel="stylesheet" href="./static/assets/css/bootstrap.min.css">
  <style>
	
    .name {
      width: 100px;
      height: 30px;
      float: left;
      background-color:white ;
      margin-left: 10px;
      margin-top: 20px;
      text-align: center;
      line-height: 30px;
    }

	

    #mask {
	  background: #000;
      filter: alpha(opacity=50); /* IE的透明度 */
      opacity: 0.5; /* 透明度 */
      display: none;
      position: absolute;
      top: 0px;
      left: 0px;
      width: 100%;
      height: 100%;
      z-index: 9; /* 此处的图层要大于页面 */
      display: none;
	}

  </style>
</head>
<body id="body">
<!--<div class="position-relative ">-->
<h1 class="text-center ">课堂随机点名系统</h1>

<!--    显示当前时间-->
<div class="clearfix">
      <span id="span"
            class="float-right position-relative mb-3 "
            style="top: 30px;right:100px ;">
      </span>
</div>

<!--    显示数组中的人名-->
<div class="box rounded "
     id="box">
</div>

<!--    开始点名按钮-->
<input type="button"
       value="点名"
       class=" bg-light rounded position-absolute "
       id="btn"
       style="width:100px; height:30px;right: 2rem;top: 2rem">

<!--  弹出提示框，显示选中的人名-->
<div class="toast position-absolute bg-light "
     id="myToast"
     style="z-index: 99; width:350px; height: 240px; top: 125px;left: 50%;margin-left: -175px;">
  <div class="toast-body text-center">
    <h1 id="sname"
        class=" d-block position-absolute text-center"
        style="height:40px;width:335px ;margin-left:-3px; margin-top: 55px;"></h1>
    <button class="close removeMask" data-dismiss="toast" ">&times;</button>
    <input type=“button” class="removeMask btn btn-outline-primary  position-absolute"
            data-dismiss="toast"
            style="width:150px;top:160px;left: 100px;cursor:pointer;" value="确定">
  </div>
</div>

<!--  遮罩-->
<div id="mask"></div>

<!--  输入名单 -->
<input type="button"
       value="输入名单"
       class=" bg-light rounded position-absolute "
       id="changebtn"
       data-toggle="modal" data-target="#myModal"
       style="width:130px; height:34px;left: 1rem;top: 2rem;z-index: 1;">	   
<!--  输入名单弹框-->	   
	<form  action="submit.php" method="post" id="submitnames" class="border border-secondary bg-white rounded  position-relative  pl-3 pr-3"
     style="width:420px; height:320px;left: 50%;transform:translateX(-50%);display:none;z-index:99; "  />
		<p class="position-absolute mt-3" >请输入学生名单</p><br/>
        <p class="text-danger mt-3  position-absolute" >(班级以字母简写加数字，姓名必须以中文 ， 分隔开)</p>
		<br>
		<hr/>
		<div class="position-absolute mb-1" style="left:30px">班级：</div>
		<input type="text" name="class" class="form-control position-absolute " style="left:78px;top:76px;width:312px;"><br/>
		<span class="position-absolute" style="left:30px;top:115px">名单：</span>
		<textarea  name="names" class="form-control position-absolute"  style="width:312px; height:120px;left:78px;top:135px" ></textarea>
		<span  id="closetext" class="font-weight-bold removeMask position-absolute" style="cursor:pointer;right:10px;top:10px;">&times;</span>
		<input type="submit" id="addon1"  class="btn btn-outline-primary position-absolute" style="right:30px;bottom:10px" value="确认"  />
	</form>

<!--  修改名单 -->
<a href="changenames.php"><input type="button"
       value="修改名单"
       class=" bg-light rounded position-absolute "
       style="width:130px; height:34px;left: 10rem;top: 2rem;z-index: 1;"></a>
	   
<!--  选择班级 -->	   	   
 <select class="custom-select position-absolute" autocomplete="off" id="classlist" style="width:120px;right: 9rem;top: 2rem;">
   <option value="choose" >选择班级</option>
 </select>

<!--  显示班级 -->	
 <div class="position-absolute" style="left:20px;top: 110px;" >
   <p>当前班级为：<?php echo $class ?></p>
 </div> 

<!--自定义背景颜色-->
	<form  action="changecolor.php" method="post"  class="input-group position-absolute mb-3"
     style="width:290px; height:30px;left: 50%;transform:translateX(-50%); top: 73px;"  />
		<input type="text"    id="bg"  name="bgcolor" class="form-control" placeholder="请输入rgb背景色(以'#'开头)" aria-label="Recipient's username"
         aria-describedby="addon2"  />
		<input type="submit" id="addon2"  class="btn btn-outline-secondary" value="确认"  />
	</form>


<script src="./static/assets/js/jquery-3.4.1.min.js"></script>
<script src="./static/assets/js/popper.min.js"></script>
<script src="./static/assets/js/bootstrap.min.js"></script>
<script src="./static/assets/js/index.js"></script>

</body>
</html>