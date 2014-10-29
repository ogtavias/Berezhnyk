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
$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
	?>
		<li style="list-style-type: none; padding:1px;"><a class="button gray" style="width:200px" href="?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$str?></a>	</li>
        
     <?php
	
}

?>

<?php include 'blocks/table.php';?>

<?php
if(isset($_GET['id_cat'])){
$id_cat = $_GET['id_cat'];
$name_cat = $_GET['name_cat'];
?>

<?php
$sql_good="SELECT * FROM goods WHERE id_cat='$id_cat'";
$query_good = mysql_query($sql_good) or die(mysql_error());
while($row_good = mysql_fetch_assoc($query_good)){
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_good['name_good']);
	?>
		<p><a href="?id_good=<?=$row_good['id_good']?>"><?=$str;?></a></p>
        
     <?php
	
		}
}

	if(isset($_GET['id_good'])){
	$id_good = $_GET['id_good'];
	$sql_good="SELECT * FROM goods WHERE id_good='$id_good'";
	$query_good = mysql_query($sql_good) or die(mysql_error());	
	while($row_good = mysql_fetch_assoc($query_good)){		
		
?>
		<form id="form1" name="form1" action="update_goods_save.php"  method="post">
		<table>
		<tr>
		<td align="right">
        <label>Редагувати категорію</label><br/>
		</td>
		<td align="left">
        <select name="id_cat">
        <?php
		$sql_cat = "SELECT * FROM categories";
		$query_cat = mysql_query($sql_cat) or die(mysql_error());	
		while($row_cat= mysql_fetch_assoc($query_cat)){
			$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
			if($row_good['id_cat'] == $row_cat['id_cat']){
		?>
        	<option value="<?=$row_cat['id_cat']?>" selected><?=$str?></option>
        <?php
			}else{
		?>
        	<option value="<?=$row_cat['id_cat']?>" ><?=$str?></option>
        
        <?php
				
				
				
			}
		}
		?>
        
        </select><br/>
		</td>
		</tr>
		<tr>
		<td align="right">
        <label>Редагувати вибраний товар</label><br/>
		</td>
		<td align="left">
        <textarea name="name_good" cols="40" rows="5"><?=$row_good['name_good']?></textarea><br/>
		</td>
		</tr>
		<tr>
		<td align="right">
        <label>Редагувати ціну. Копійки вводити через крапку</label>
		</td>
		<td align="left">
        <input name="price_good" type="text" value="<?=$row_good['price_good']?>"> грн.<br/>
		</td>
		</tr>
        <input name="id_good" type="hidden" value="<?=$row_good['id_good']?>">
		<tr>
		<td align="right">
		Редагувати опис
		</td>
		<td align="left">
		<textarea name="info" id="info" cols="45" rows="5"><?=$row_good['info']?></textarea>
		<script type="text/javascript">
		CKEDITOR.replace('info');
		</script>
        
        <input name="submit" type="submit" value="Надіслати"><br/>
		</td>
		</tr>
        </table>
        </form>
		<?php
	}
}
?>
<?php include 'blocks/endtable.php';?>

<?php require 'blocks/footer.php';?>