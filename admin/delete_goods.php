<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>

<?php include 'blocks/begintable.php';?>
<h3>Категорії</h3>
<?php
$sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
while($row_cat = mysql_fetch_assoc($query_cat)){
$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
	?>
		<li style="list-style-type: none; padding:1px;"><a class="button gray" style="width:200px" href="?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?=$str;?></a>	</li>
        
     <?php
	
}

?>


</div><!--категорії--> 
<?php include 'blocks/table.php';?>
<?php
if(isset($_GET['id_cat'])){
$id_cat = $_GET['id_cat'];
$name_cat = $_GET['name_cat'];
?>
<h4>Вибрана категорія. <span style="color:#F00";><?=$name_cat?></span></h4>
<h5>Товари за вибраною категорією.</h5>
<?php
$sql_good="SELECT * FROM goods WHERE id_cat='$id_cat'";
$query_good = mysql_query($sql_good) or die(mysql_error());
while($row_good = mysql_fetch_assoc($query_good)){
$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_good['name_good']);
	?>
		<p><a href="delete_goods_save.php?id_good=<?=$row_good['id_good']?>"><?=$str;?></a>	</p>
        
     <?php
	
		}
}

?>
	

<?php include 'blocks/endtable.php';?>




</div>

<?php require 'blocks/footer.php';?>