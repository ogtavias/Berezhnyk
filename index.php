<?php session_start();
$session_id = session_id();
 ?>
<?php  include_once 'admin/blocks/bd.php'; ?>
<?php require 'blocks/sum.php';?>
<?php include 'blocks/header.php';?>

<div> <!--корзина-->
<h4>Товарів в <a class="button gray" href="basket.php">корзині</a>: <span style="color:red;"><?= $count?> </span>   на суму: <span style="color:red;"><?= $sum ?></span> грн.</h4>
</div><!--корзина-->
<?php include 'blocks/begintable.php';?>
<?php
include_once 'blocks/menu.php';
include 'blocks/table.php';
include_once 'blocks/content.php';

require 'blocks/footer.php';
include 'blocks/endtable.php';?>