<?php session_start();
include_once 'blocks/bd.php';

if($_POST){
	$users_login = $_POST['users_login'];
	$users_password = $_POST['users_password'];
	
	// делаем запрос безопасным
	$users_login = mysql_real_escape_string(trim(strip_tags($users_login)));	
	$users_password = mysql_real_escape_string(trim(strip_tags($users_password)));	
	
	$sql_user ="SELECT count(*) FROM users WHERE users_login = '$users_login' AND users_password = '$users_password'";
	
	$query_up = mysql_query($sql_user) or die(mysql_error());	
	// проверяем наличие совпадений
	$num = mysql_fetch_row($query_up);
	if($num[0] == 0)  header('Location:login.php');	
	else{
		$_SESSION['users_login'] = $users_login;
		header('Location:index.php');	
		
	}
	
	
}
