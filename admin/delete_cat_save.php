<?php

// підключаємо базу даних
include_once 'blocks/bd.php';
// перевіряємо наявність глобального масиву POST
if(isset($_POST['id_cat'])) $name_cat = $_POST['id_cat'];

if(isset($_GET['id_cat'])){
	$id_cat = $_GET['id_cat'];
	// перевіряємо наявність матеріалів в категорії
	$sql_cat ="SELECT id_good FROM goods WHERE id_cat = '$id_cat'"; 
	$query_cat = mysql_query($sql_cat) or die(mysql_error());
	$num_cat = mysql_num_rows($query_cat);
	if($num_cat>0) die('<h4>В категорії є товари. Видаліть товар, після чого можна видалити категорію. <a href="delete_cat.php">Повернутися</a>.</h4>');	
	$sql_del = "DELETE FROM categories WHERE id_cat='$id_cat'";
	$query_del = mysql_query($sql_del) or die(mysql_error());
	if($query_del) {
		echo 'Категорія видалена. <a href="delete_cat.php">Повернутися</a>';
     
	}
	else{ echo 'Запит на видалення категорії з бази даних не був успішний.';}

}
?>






