<?php  include_once 'blocks/bd.php';
if(isset($_POST['id_cat'])){
		$id_cat = $_POST['id_cat'];
		$name_cat = $_POST['name_cat'];
		
		// Робимо запит безпечним
		$name_cat = mysql_real_escape_string(trim(strip_tags($name_cat)));
		
		$sql_cat = "UPDATE categories SET name_cat = '$name_cat' WHERE id_cat='$id_cat'";
		$query_cat = mysql_query($sql_cat) or die(mysql_error());
		
		echo "<h4>Категорія перезаписана. Повернутися до <a href='update_cat.php'>попередньої сторінки</a>.</h4>";
		
		
		
		
		
		
	}