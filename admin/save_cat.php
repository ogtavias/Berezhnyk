<?php

// ��������� ���� �����
include_once 'blocks/bd.php';
// ���������� �������� ����������� ������ POST
if(isset($_POST['name_cat'])) $name_cat = $_POST['name_cat'];
if($name_cat == '') die('�� �� ����� � ���� ������. �������� �� <a href="add_cat.php">���������� ��������</a>'); 

// ������ ��� ����� �� bd ���������

$name_cat = mysql_real_escape_string(trim(strip_tags($name_cat)));

$sql_cat = "INSERT INTO categories (name_cat) VALUES ('$name_cat')";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
if(isset($query_cat)) {echo '<h4>����� �� ���� ����� �� ��������� ������� ������� ������. ����������� �� <a href="add_cat.php">��������� �������</a></h4>';}
else{
 echo '����� ��� ��������';	
	
}






