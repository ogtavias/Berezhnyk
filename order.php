<?php
	 include_once 'admin/blocks/bd.php'; 
	 include 'blocks/header.php';
	 include 'blocks/begintable.php';
 ?>

	<form action="orders_save.php" method="post">
		<label>��������:</label><br/>
		<input name="cust" type="text" size="40"><br/>
		<label>Email ���������:</label><br/>
		<input name="email" type="text" size="40"><br/>
		<label>������� ��� ��'����:</label><br/>
		<input name="phone" type="text" size="40"><br/>
		<label>������ ��������:</label><br/>
		<textarea name="address" cols="40" rows="5"></textarea><br/>
		<input class="button black" name="submit" type="submit" value="�������� ����������">
	</form>
	<?php 
		include 'blocks/endtable.php';
		include 'blocks/footer.php';
	?>