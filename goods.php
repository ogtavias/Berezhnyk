<?php session_start();
$session_id = session_id();
 ?>
<?php  include_once 'admin/blocks/bd.php'; ?>
<?php require 'blocks/sum.php';?>
<?php include 'blocks/header.php';?>
<p align="left">
<input class="button gray" type="button" onclick="history.back()" value="<== Назад">
</p>
<div> <!--корзина-->

<h4>Товарів в <a class="button gray" href="basket.php">корзині</a>: <span style="color:red;"><?= $count?> </span>   на суму: <span style="color:red;"><?= $sum ?></span> грн.</h4>
</div><!--корзина-->
<?php include 'blocks/begintable.php';?>
Про товар
<?php
if(isset($_GET)){
$id_good = $_GET['id_good'];
$id_cat = $_GET['id_cat'];
$p = $_GET['p'];

$sql_good ="SELECT * FROM goods WHERE id_good='$id_good' ORDER BY id_good ASC";
$query_good = mysql_query($sql_good) or die(mysql_error());
$row_good = mysql_fetch_row($query_good);
$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_good[2]);
echo '<h4 style="color:red;" align="center">'.$str.'</h4>';
$str = preg_replace('/([^\s]{20})[^\s]+/', '<span title="$0">$1...</span>', $row_good[3]);
?>
<a class="button blue" style="width:50px; height:25px;" href="add_basket.php?id_good=<?=$id_good?>&id_cat=<?=$id_cat?>&p=<?=$_GET['p']?>">в корзину</a>
<br/>
<?php
echo 'Ціна: '.$str.' грн.'.'<br/>';

?>

<div class="mypage" style="width:95%; background-color:#FDFDFD; font-family:'Times New Roman', Times, serif;">
<?php
echo $row_good[4];
echo ('</div>');
} else{
	header('Location: index.php');
}

?>
<div class="mypage" style="width:95%; background-color:#E9E9E9; font-family:'Times New Roman', Times, serif;">

<form id="form1" name="form1" action="add_comments_save.php"  method="post">
		<table>
		<tr>
		<td align="right">
        <label>Ваш нікнейм</label><br/>
		</td>
		<td align="left">
        <input name="nic" type="text"></textarea><br/>
		</td>
		</tr>
		<tr>
		<td align="right">
        <label>Ваше враження про товар</label>
		</td>
		<td align="left">
        <textarea name="comment" id="comment" cols="45" rows="5"><?=$row_good['info']?></textarea>
		</td>
		</tr>
        <input name="id_good" type="hidden" value="<?=$id_good?>">
		<tr>
		<td align="right">
        <input name="submit" type="submit" value="Надіслати"><br/>
		</td>
		</tr>
        </table>
        </form>
		</div>
<?php
$sql_comm ="SELECT * FROM comments WHERE id_good='$id_good' ORDER BY id_comm DESC";
$query_comm = mysql_query($sql_comm) or die(mysql_error());
while($row_comm = mysql_fetch_assoc($query_comm)){
	?>
	<div class="mypage" style="width:95%; background-color:#E9E9E9; font-family:'Times New Roman', Times, serif;">
	<?php
			$str = $row_comm['nic'];
			echo '<li style="list-style-type: none;">'.$str.'</a></li>';
			$str = $row_comm['comment'];
echo '<li class="mypage" style="list-style-type: none; width:95%; background-color:#FDFDFD;">'.$str.'</li>';
			
	?>
	</div>
	<?php
		}

require 'blocks/footer.php';
include 'blocks/endtable.php';?>