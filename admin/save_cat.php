<?php

// підключаємо базу даних
include_once 'blocks/bd.php';
// перевіряємо наявність глобального масиву POST
if(isset($_POST['name_cat'])) $name_cat = $_POST['name_cat'];
if($name_cat == '') die('Вы не ввели в поле данные. Вернутся на <a href="add_cat.php">предыдущую страницу</a>'); 

// Робимо наш запит до bd безпечним

$name_cat = mysql_real_escape_string(trim(strip_tags($name_cat)));

$sql_cat = "INSERT INTO categories (name_cat) VALUES ('$name_cat')";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
if(isset($query_cat)) {echo '<h4>Запит до бази даних на додавання категорії пройшов успішно. Повернуться на <a href="add_cat.php">Попередню сторінку</a></h4>';}
else{
 echo 'Запит був невдалий';	
	
}






