<?php 

	include_once '/admin/blocks/bd.php';
	if(isset($_POST)){
	$id_comm = $_POST['id_comm'];
	$nic = $_POST['nic'] ;
	$id_good = $_POST['id_good'];
	$comment = $_POST['comment'];
	
	if(($comment=='')||($nic=='')){ die('<h4>�� ��������� �� �� ����. ���������� �� ��������� �������</a></h4>');}
	 
		/*������ ����� ���������*/
		$name_good = mysql_real_escape_string(trim(strip_tags($comment)));	
		$nic = mysql_real_escape_string(trim(strip_tags($nic)));	
				
		$sql_good = "INSERT INTO comments (id_good, nic, comment) VALUE ('$id_good', '$nic', '$comment')";
		$query_good = mysql_query($sql_good) or die(mysql_error());
		
		if($query_good) echo '<h4>����� �� ���� ����� �� ��������� ������ ������� ������. ���������� �� ��������� �������</a></h4>';

	 
	 
 }

