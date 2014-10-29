<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>
<?php include 'blocks/begintable.php';?>
 <!--категорії-->
<h3>Категорії</h3>
<?php
include_once 'blocks/fun.lib.php';
getMenu();
?>
<?php include 'blocks/endtable.php';?>
<?php include 'blocks/footer.php';?>