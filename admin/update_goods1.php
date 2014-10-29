<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>
<div style="width:700px; margin:0 auto;">
<div style="width:290px; float:left;"> <!--товары-->
<h3>Выбрать категорию.</h3>
<?php
$sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
while($row_cat = mysql_fetch_assoc($query_cat)){
	?>
		<p><a href="update_goods.php?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$row_cat['name_cat']?></a></p>
     <?php
	
}

?>


</div><!--товары--> 


<div style="width:400px; float:right; "><!-- ввод товаров-->
<h4>Выбрать категорию для обновления товаров.</h4>
<?php
	if(isset($_GET['id_cat'])){
		$id_cat = $_GET['id_cat'];
		$name_cat = $_GET['name_cat'];	
		
?>
<h3 style="color:#F00;"><?=$name_cat; ?></h3>
<h4>Товары в данной категории.</h4>
<?php
$sql_good = "SELECT id_good, name_good FROM goods WHERE id_cat = '$id_cat ORDER BY id_good ASC '";
$query_good = mysql_query($sql_good) or die(mysql_error());
while($row_good = mysql_fetch_assoc($query_good)){

		echo '<p><a href="?id_cat='.$id_cat.'&id_good='.$row_good['id_good'].'">'.$row_good['name_good'].'</a></p>';	
	
}
	
	}
if(isset($_GET['id_good']))	{
	$id_good =$_GET['id_good'];
	$id_cat = $_GET['id_cat'];
	
	$sql_good = "SELECT * FROM goods WHERE id_good = '$id_good'";
$query_good = mysql_query($sql_good) or die(mysql_error());
while($row_good = mysql_fetch_assoc($query_good)){

?>

<form action="add_goods_save.php"  method="post">
<label>Изменить категорию товара.</label><br/>
<select name="id_cat">
<?php
	$sql_cat = "SELECT * FROM categories ";
	$query_cat = mysql_query($sql_cat) or die(mysql_error());
	while($row_cat = mysql_fetch_assoc($query_cat)){
		if($row_cat['id_cat']==$row_good['id_cat']){
?>
<option value="<?=$row_cat['id_cat']?> " selected><?=$row_cat['name_cat']?></option>
<?php
		}else{
			?>
		<option value="<?=$row_cat['id_cat']?>" ><?=$row_cat['name_cat']?></option>	
			<?php
		}
	}
	
?>
</select>
<label>Изменить данные по товару</label><br/>
<textarea name="name_good" cols="40" rows="5"><?=$row_good['name_good']?></textarea><br/>
<label>Цена товара. Копейки вводите через точку.</label><br/>
<input name="price_good" type="text" value="<?=$row_good['price_good']?>"> грн.<br/>
<input name="cat_id" type="hidden" value="<?=$id_cat ?>">
<input name="submit" type="submit" value="добавить товар">

</form>

<?php
}
}
?>


</div> <!-- ввод товаров-->




</div>

<?php require 'blocks/footer.php';?>