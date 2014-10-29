<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>
<?php include 'blocks/begintable.php';?>
<h3>Категорії</h3>
<?php
$sql_cat = "SELECT * FROM categories ORDER BY id_cat ASC";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
while($row_cat = mysql_fetch_assoc($query_cat)){
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
?>
<a class="button gray" style="width:200px" href="?id_cat=<?=$row_cat['id_cat']?>&name_cat=<?=$row_cat['name_cat']?>"><?= $str ?></a>
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
<h4>Вибрана категорія. <span style="color:#F00";><?=$str?></span></h4>
<h5>Товари з обраної категорії.</h5>
<?php
if(!$_GET['p']) $_GET['p'] =0;
$p = $_GET['p'];
$per_page = 5; 
$sql_num = "SELECT id_good FROM goods WHERE id_cat='$id_cat'";
$query_num = mysql_query($sql_num) or die(mysql_error());

$rows = mysql_num_rows($query_num);

$pages = ceil($rows/$per_page);

$sql_good="SELECT name_good FROM goods WHERE id_cat='$id_cat' ORDER BY id_good LIMIT ".$_GET['p'].",".$per_page;
$query_good = mysql_query($sql_good) or die(mysql_error());
while($row_good = mysql_fetch_assoc($query_good)){
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_good['name_good']);
	?>
		<p><?=$str?></p>
     <?php
		}
	
		for($i=0;$i<$pages;$i++){
		if ($i*$per_page==$p){
		echo '<a class="button white" href="?id_cat='.$id_cat.'&name_cat='.$name_cat.'&p='.($i*$per_page).'">'.($i+1).'</a>';
		}else{	
		echo '<a class="button black" href="?id_cat='.$id_cat.'&name_cat='.$name_cat.'&p='.($i*$per_page).'">'.($i+1).'</a>';	
		}
			
		}

}
?>
<?php include 'blocks/endtable.php';?>
<?php require 'blocks/footer.php';?>