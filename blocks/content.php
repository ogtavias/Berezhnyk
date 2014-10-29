

<?php
if($_GET['id_cat']){
$id_cat = $_GET['id_cat'];

$sql_cat ="SELECT name_cat FROM categories WHERE id_cat='$id_cat'";
$query_cat = mysql_query($sql_cat) or die(mysql_error());
$row_cat = mysql_fetch_row($query_cat);
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_cat[0]);
echo '<h4 style="color:red;">'.$str.'</h4>';
} else{
	echo '<h1>Ласкаво просимо в нашому інтернет магазині!!!</h1>';
}
echo '<table width="100%" style="padding-top:20px;">';
if(!$_GET['p']) $_GET['p'] =0;
$p = $_GET['p'];
$per_page = 10; // кількість виводимого товару нв сторінці
if($_GET['id_cat']){
	$sql_num = "SELECT id_good FROM goods WHERE id_cat='$id_cat'";
} else {
	$sql_num = "SELECT id_good FROM goods";
}
$query_num = mysql_query($sql_num) or die(mysql_error());
// загальна кількість товару
$rows = mysql_num_rows($query_num);
// кількість сторінок
$pages = ceil($rows/$per_page);
if($_GET['id_cat']){
	$sql_good="SELECT * FROM goods WHERE id_cat='$id_cat' ORDER BY id_good ASC LIMIT ".$_GET['p'].",".$per_page;

}else{
	$sql_good="SELECT * FROM goods ORDER BY id_good DESC LIMIT ".$_GET['p'].",".$per_page;
}
	$query_good = mysql_query($sql_good) or die(mysql_error());

while($row_good = mysql_fetch_assoc($query_good)){
	$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_good['name_good']);
	?>	
		<table>
		<tr><td style="width:500px;"><a href="goods.php?id_good=<?=$row_good['id_good']?>&id_cat=<?=$id_cat?>&p=<?=$p?>"><?=$str;?></a></td><td><?=$row_good['price_good']?> грн.</td><td><a class="button blue" style="width:50px; height:25px;" href="add_basket.php?id_good=<?=$row_good['id_good']?>&id_cat=<?=$id_cat ?>&p=<?=$_GET['p']?>">в корзину</a></td></tr>
		
        </table>
     <?php
	
		}
		echo '<table><tr><td style="width:500px;">&nbsp;</td></tr></table></table>';
		for($i=0;$i<$pages;$i++){
		if ($i*$per_page==$p){
		echo '<a class="button white" href="?id_cat='.$id_cat.'&p='.($i*$per_page).'">'.($i+1).'</a>';
		}else{	
		echo '<a class="button black" href="?id_cat='.$id_cat.'&p='.($i*$per_page).'">'.($i+1).'</a>';	
		}
			
		}
?>
