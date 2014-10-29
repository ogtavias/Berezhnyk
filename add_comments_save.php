<?php 
	require_once 'admin/blocks/bd.php';
	if(isset($_POST)){
	 $nic = $_POST['nic'] ;
	 $comment = $_POST['comment'];
	 $id_good = $_POST['id_good'];
	
	
	if(($nic=='')||($comment=='')){ die('<h4>Ви заповнили не всі поля. Поверніться на <a href="add_goods.php">попередню сторінку</a></h4>');}
	 
		/*Робимо запит безпечним*/
		$name_good = mysql_real_escape_string(trim(strip_tags($comment)));	
		$nic = mysql_real_escape_string(trim(strip_tags($nic)));	
				
		$sql_good = "INSERT INTO comments (id_good, nic, comment) VALUE ('$id_good', '$nic', '$comment')";
		$query_good = mysql_query($sql_good) or die(mysql_error());
		
		if($query_good) echo '<h4>Запит до бази даних на додавання товару пройшов успішно. Поверніться на <a href="add_goods.php">попередню сторінку</a></h4>';

	 
	 
 }

