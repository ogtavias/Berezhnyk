<?php 
	require_once 'blocks/bd.php';
	if(isset($_POST)){
	$name_good = $_POST['name_good'];
	$price_good = $_POST['price_good'] ;
	$id_cat = $_POST['id_cat'];
	$info = $_POST['info'];
	
	if(($name_good=='')||($price_good=='')){ die('<h4>�� ��������� �� �� ����. ���������� �� <a href="add_goods.php">��������� �������</a></h4>');}
	 
		/*������ ����� ���������*/
		$name_good = mysql_real_escape_string(trim(strip_tags($name_good)));	
		if(is_numeric($price_good)==false) die('<h4>�� ����� ���� � ������������� ������. ���������� �� <a href="add_goods.php">��������� �������</a></h4> ');
		
		$sql_good = "INSERT INTO goods (id_cat, name_good, price_good, info) VALUE ('$id_cat', '$name_good', '$price_good', '$info')";
		$query_good = mysql_query($sql_good) or die(mysql_error());
		
		if($query_good) echo '<h4>����� �� ���� ����� �� ��������� ������ ������� ������. ���������� �� <a href="add_goods.php">��������� �������</a></h4>';

	 
	 
 }

