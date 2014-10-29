<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>
<?php include 'blocks/begintable.php';?>
<h3>Видалити вибрану категорію</h3>
<?php
$sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
while($row_cat = mysql_fetch_assoc($query_cat)){
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
	?>
		<li style="list-style-type: none;"><a class="button red" href="delete_cat_save.php?id_cat=<?=$row_cat['id_cat']?>" style="width:200px"><?=$str?></a></li>	
   <?php
	
}

?>
<!-- ввод кат-->
<?php include 'blocks/endtable.php';?>
<?php require 'blocks/footer.php';?>