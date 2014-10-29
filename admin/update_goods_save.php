<?php  include_once 'blocks/bd.php'; 

	if(isset($_POST['id_good'])){
		//print_r($_POST);
		$id_cat= $_POST['id_cat'];
		$name_good = $_POST['name_good'];
		$price_good = $_POST['price_good'];
		$id_good = $_POST['id_good'];
		$info = $_POST['info'];
		
		if($id_cat== '' || $name_good=='' || $price_good=='' || $info=='') die('<h4>Ви не заповнили всі поля. Поверніться на <a href="update_goods.php">попередню сторінку</a>.</h4>');
		// робимо запит безпечним
		$name_good = mysql_real_escape_string(trim(strip_tags($name_good)));	 
		if(is_numeric($price_good)==false) die('<h4>Ви ввели ціну в невірному форматі. Поверніться на <a href="add_goods.php">попередню сторінку</a></h4> ');
		$sql_up ="UPDATE goods SET id_cat ='$id_cat', name_good ='$name_good', price_good = '$price_good', info = '$info' WHERE id_good = '$id_good'";
		$query_up = mysql_query($sql_up) or die(mysql_error());	
		if($query_up) echo '<h4>Запит на редагування тоавару успішно виконаний. Повернутись на <a href="update_goods.php">попередню сторінку</h4></a>.';
		
		
		
		
		
		
		
		
		
	}









?>