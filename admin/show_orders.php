<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>

<?php include 'blocks/header.php';?>

<?php
// �������� ��� � ������� ���������
	require_once 'blocks/bd.php';
	
		
	$sql_order = "SELECT * FROM orders ORDER BY id_order ASC";
	$query_order = mysql_query($sql_order) or die(mysql_error());
	$num_order = mysql_num_rows($query_order);
	
	$sql_first_row = "SELECT customer FROM orders";
	$query_first_order = mysql_query($sql_order) or die(mysql_error());
	$row_first_order =mysql_fetch_row($query_first_order);
	//print_r($row_first_order);
	//echo '<br/>';
	//echo '<br/>';
	//echo '<br/>';
	echo '<h4>������������� ���������: '.$customer  = $row_first_order[5].' | ��\'� ���������: '.$row_first_order[1] . ' | �������: '.$row_first_order[3].' | ������ ��������: '.$row_first_order[4].' | ���� ����������: '.date("d-m-Y H:i:s",$row_first_order[8]).' </h4>';
	
	echo '<br/>';
// ������ ����, �������� ���������
	for($i = 1;$i<=$num_order;$i++){
		
		$row_order = mysql_fetch_assoc($query_order);
		$id_good = $row_order['id_good'];
		$sql_good = "SELECT * FROM goods WHERE id_good = '$id_good'";
		
			$query_good= mysql_query($sql_good) or die(mysql_error());
			
// ������ ����, �������� ������			
			while($row_good = mysql_fetch_assoc($query_good)){
					echo $row_good['name_good']. ' - ֳ��: '. $row_good['price_good']. ' ���.';
					echo '<br/>';
					$sum += $row_good['price_good'];
					echo $sum.' ���.';
					echo '<br/>';
				
			}
			
		if($customer == $row_order['customer']) continue;
		echo '<h3>�������� ���� ����������: <span style="color:red;">' .$sum.'</span>'.'  ���. </h3>';
		$sum=0;
		echo '<hr align="left" color="#006600" width="300"/>';
		echo '<hr align="left" color="#006600" width="300"/>';
		echo '<hr align="left" color="#006600" width="300"/>';
		
		$customer = $row_order['customer'];
		echo '<h4>������������� ���������: '.$row_order['customer']. ' | ��\'� ���������: '. $row_order['name_order'].' | �������: '.$row_order['phone']. ' | ������ ��������: '.$row_order['address']. ' | ���� ����������: '.date("d-m-Y H:i:s",$row_order['datetime']).'</h4>';
		
		echo '<br/>';
		
		
	}
echo '<h3>�������� ���� ����������: <span style="color:red;">' .$sum.'</span>'.'  ���. </h3>';
	?>
        <hr width="300" align="left" color="#FF0000">
    <hr width="300" align="left" color="#FF0000">
    <hr width="300" align="left" color="#FF0000">
<?php require 'blocks/footer.php';?>