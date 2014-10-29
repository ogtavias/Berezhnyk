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
	<!--категорії--> 
<?php include 'blocks/table.php';?>
		<form action="save_cat.php"  method="post">
		<label>Нова категорія</label><br/>
		<input name="name_cat" type="text" size="40">
		<input name="submit" type="submit" value="Додати категорію">

		</form>
	<!-- ввід кат-->
<?php include 'blocks/endtable.php';?>	
<?php include 'blocks/footer.php';?>