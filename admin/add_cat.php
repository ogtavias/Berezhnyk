<?php include_once 'blocks/auth.php';?>
<?php  include_once 'blocks/bd.php'; ?>
<?php include 'blocks/header.php';?>

<?php include 'blocks/begintable.php';?>
	 <!--�������-->
		<h3>�������</h3>
		<?php
			include_once 'blocks/fun.lib.php';
			getMenu();
		?>
	<!--�������--> 
<?php include 'blocks/table.php';?>
		<form action="save_cat.php"  method="post">
		<label>���� ��������</label><br/>
		<input name="name_cat" type="text" size="40">
		<input name="submit" type="submit" value="������ ��������">

		</form>
	<!-- ��� ���-->
<?php include 'blocks/endtable.php';?>	
<?php include 'blocks/footer.php';?>