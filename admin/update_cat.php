<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>

<?php include 'blocks/begintable.php';?>
 <!--категорії-->
<h3>Категорії</h3>
<?php
$sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
while($row_cat = mysql_fetch_assoc($query_cat)){
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
	?>
		<li style="list-style-type: none;"><a class="button blue" style="width:200px;" href="?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$str?></a></li>	
   <?php
	
}

?>
</div><!--категорії--> 
<?php include 'blocks/table.php';?>

<?php
if(isset($_GET['id_cat'])){
	$id_cat = $_GET['id_cat'];
	$name_cat = $_GET['name_cat'];
	$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $name_cat);
	?>
    <h3><span style="color:#F00;"><?=$str?></span></h3>
<form action="update_cat_save.php"  method="post">
<label>Вибрана категорія</label><br/>
<input name="name_cat" type="text" size="40" value="<?=$name_cat?>">
<input name="id_cat" type="hidden" value="<?=$id_cat?>"><br/><br/>
<input name="submit" type="submit" value="Редагувати категорію">

</form>
<?php
}
?>
<?php include 'blocks/endtable.php';?>

<?php require 'blocks/footer.php';?>