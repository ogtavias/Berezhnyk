<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>

<?php include 'blocks/begintable.php';?>
<h3>������� ��������.</h3>
<?php
$sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
while($row_cat = mysql_fetch_assoc($query_cat)){
	$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
	?>
		<li style="list-style-type: none;"><a class="button green" style="width:200px" href="add_goods.php?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$str?></a></li>
     <?php
	
}
?>
<?php include 'blocks/table.php';?>


<?php
	if(isset($_GET['id_cat'])){
		$id_cat = $_GET['id_cat'];
		$name_cat = $_GET['name_cat'];	
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $name_cat);		
?>
<h3 style="color:#F00;"><?=$str?></h3>
		<form id="form1" name="form1" action="add_goods_save.php"  method="post">
		<table>
		<tr>
		<td align="right">
        <label>����� ������</label><br/>
		</td>
		<td align="left">
        <textarea name="name_good" cols="40" rows="5"><?=$row_good['name_good']?></textarea><br/>
		</td>
		</tr>
		<tr>
		<td align="right">
        <label>ֳ�� ������. ������ ������� ����� ������</label>
		</td>
		<td align="left">
        <input name="price_good" type="text" value="<?=$row_good['price_good']?>"> ���.<br/>
		</td>
		</tr>
        <input name="id_good" type="hidden" value="<?=$row_good['id_good']?>">
		<input name="id_cat" type="hidden" value="<?=$id_cat?>">
		<tr>
		<td align="right">
		���� ������
		</td>
		<td align="left">
		<textarea name="info" id="info" cols="45" rows="5"><?=$row_good['info']?></textarea>
		<script type="text/javascript">
		CKEDITOR.replace('info');
		</script>
        
        <input name="submit" type="submit" value="��������"><br/>
		</td>
		</tr>
        </table>
        </form>
<?php
	}
?>


<?php include 'blocks/endtable.php';?>

<?php require 'blocks/footer.php';?>