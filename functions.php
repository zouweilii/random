<?php
require_once 'config.php';
/**
 * 
 *封装大家共用的函数
 * 
 */
session_start();
//获取当前登录用户信息，如果没有获取到则自动跳转到登录页面
//定义函数时，一定要注意函数名与内置函数冲突问题
//php判断函数是否定义的方法：function_exists('')
header('Content-Type: text/html; charset=utf-8');
function xiu_get_current_user () {
	if(empty($_SESSION['current_login_user'])){
		header('Location:/admin/login.php');
		exit();//没有必要再执行之后的代码
	}
	return $_SESSION['current_login_user'];
	
}
//通过一个数据库查询获取数据；获取多条数据   索引数组套关联数组
function xiu_fetch_all ($sql) {
	$conn = mysqli_connect(XIU_DB_HOST,XIU_DB_USER,XIU_DB_PASS,XIU_DB_NAME);
	if(! $conn){
		exit('连接失败');
	}
	mysqli_set_charset($conn,'utf8');
	$query = mysqli_query($conn,$sql);
	if(! $query){
		//查询失败
		return false;
	}
	while($row = mysqli_fetch_assoc($query)){
		$result[]= $row;
	}
	//关闭连接
	mysqli_free_result($query);
	mysqli_close($conn);
	return $result;

}
//获取单条数据 关联数组 
function xiu_fetch_one ($sql) {
	$res = xiu_fetch_all($sql);
	return isset($res[0]) ? $res[0] : null;
}