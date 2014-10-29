<?php

// Визначення кількості товару в корзині

$sql_basket = "SELECT count(*) FROM basket WHERE customer ='$session_id'";
$query_basket = mysql_query($sql_basket) or die(mysql_error());
$row_basket = mysql_fetch_row($query_basket);	
$count = $row_basket[0];

//  Визначаємо загальну вартість товарів

$sql_sum = "SELECT goods.price_good FROM goods, basket WHERE basket.customer = '$session_id' AND basket.id_good=goods.id_good";
$query_sum = mysql_query($sql_sum) or die(mysql_error());
$sum = 0;
while($row_sum = mysql_fetch_assoc($query_sum)){
		$sum += $row_sum['price_good'];	
	
}





















