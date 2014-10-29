<?php 
	function getMenu(){
		$sql_cat = "SELECT name_cat FROM categories ORDER BY id_cat";
		$query_cat = mysql_query($sql_cat) or die(mysql_error());
		while($row_cat = mysql_fetch_assoc($query_cat)){
			$str = preg_replace('/([^\s]{25})[^\s]+/', '<span title="$0">$1...</span>', $row_cat['name_cat']);
			echo '<li style="list-style-type: none;"><a class="button gray" style="width:200px">'.$str.'</a></li>';
	
		}
		return 0;	
	}
?>

	
