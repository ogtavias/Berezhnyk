<?php
// ���������� ����
session_start();
$session_id = session_id();
?>
<?php  include_once 'admin/blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>
<?php require 'blocks/sum.php';?>
<div> <!--�������-->

<h4>������ � ������: <span style="color:red;"><?= $count?> </span>   �� ����: <span style="color:red;"><?= $sum ?></span> ���.</h4>
</div><!--�������-->

<?php
if($count==0){
	echo '<h4>������� �������! ������� �� <a href="index.php">��������</a> ������</h4>';	
	
}else{
?>
	<table width="100%" border="1">
  <tr>
    <td>� �/�</td>
    <td>�����</td>
    <td>ֳ��, ���</td>
    <td>ʳ������</td>
    <td>��������</td>
  </tr>



<?php	
$sql_basket = "SELECT * FROM goods, basket WHERE customer='$session_id' AND goods.id_good = basket.id_good";
$query_basket = mysql_query($sql_basket) or die(mysql_error());
$i=0;
while($row_from_basket= mysql_fetch_assoc($query_basket)){
$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_from_basket['name_good']);
	?>
	<tr>
    	<td><?=++$i ?></td>
        <td><?=$str?></td>
        <td><?=$row_from_basket['price_good']?></td>
        <td><?=$row_from_basket['quantity']?></td>
        <td><a href="delete_from_basket.php?id_basket=<?=$row_from_basket['id_basket']?>">��������</a></td>
    
    </tr>
   
	
	
<?php
		}


?>
</table>
<h4><a href="order.php">�������� ����������</a></h4>
 <h4>������� �� <a href="index.php">��������</a></h4>
<?php } ?>
<?php require 'blocks/footer.php';?>








