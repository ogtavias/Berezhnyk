<?php session_start();
$session_id = session_id();
 ?>
<?php  include_once 'admin/blocks/bd.php'; ?>
<?php require 'blocks/sum.php';?>
<?php include 'blocks/header.php';?>

<div> <!--�������-->
<h4>������ � <a class="button gray" href="basket.php">������</a>: <span style="color:red;"><?= $count?> </span>   �� ����: <span style="color:red;"><?= $sum ?></span> ���.</h4>
</div><!--�������-->
<?php include 'blocks/begintable.php';?>
<?php
include_once 'blocks/menu.php';
include 'blocks/table.php';
include_once 'blocks/content.php';

require 'blocks/footer.php';
include 'blocks/endtable.php';?>