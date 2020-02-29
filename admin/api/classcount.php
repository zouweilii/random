<?php

/**
 * 查询班级数
 */

require_once '../config.php';

$conn = mysqli_connect(XIU_DB_HOST, XIU_DB_USER, XIU_DB_PASS, XIU_DB_NAME);
if (!$conn) {
  exit('连接数据库失败');
}

$res = mysqli_query($conn, "select classname from db_class;");
if (!$res) {
  exit('查询失败');
}

$nums = mysqli_num_rows($res);

echo $nums;
