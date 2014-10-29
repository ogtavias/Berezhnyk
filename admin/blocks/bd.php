<?php 
	mysql_connect("localhost","root","ivanko") or die('Підключення до серверу MySql було невдалим :(');
	mysql_select_db('u348161876_bd') or die(mysql_error()); 
	mysql_query("SET NAMES 'cp1251';");
?>