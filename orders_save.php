<?php
session_start();
$session_id = session_id();
include_once 'admin/blocks/bd.php';
if(isset($_POST)){
	//print_r($_POST);
	$cust = $_POST['cust'];

	$email = $_POST['email'];
	
	$phone = $_POST['phone'];

	$address = $_POST['address'];
	
if(($cust=='') || ($email=='') || ($phone=='') || ($address== '') ) die('<h4>�� �� ��������� �� ���� �����. ���������� �� <a href= "order.php">��������� �������</a>.</h4>');
//������ ����� ���������

$cust = mysql_real_escape_string(trim(strip_tags($cust)));
$email = mysql_real_escape_string(trim(strip_tags($email )));
$phone = mysql_real_escape_string(trim(strip_tags($phone)));
$address = mysql_real_escape_string(trim(strip_tags($address)));
	
$sql_from_basket = "SELECT * FROM basket WHERE customer = '$session_id'";

$query_from_basket = mysql_query($sql_from_basket) or die(mysql_error());	

while($row_from_basket = mysql_fetch_assoc($query_from_basket)){
	$customer = $row_from_basket['customer'];
	$id_good = $row_from_basket['id_good'];
	$quantity = $row_from_basket['quantity'];
	$datetime = $row_from_basket['datetime'];	
	
	$sql_order = "INSERT INTO orders (name_order, email, phone, address, customer, id_good, quantity, datetime) VALUES ('$cust', '$email', '$phone','$address', '$customer', $id_good, $quantity, $datetime) ";
	
mysql_query($sql_order) or die(mysql_error());		
	
}

$sql_del_basket = "DELETE FROM basket WHERE  customer = '$session_id'";
$query_del_basket = mysql_query($sql_del_basket) or die(mysql_error());
if($query_del_basket) echo "<h4>������ �� ���������� ����������. ������� �� <a href= 'index.php'>��������</a></h4>";










	
	
	
	
	
	
	
}
