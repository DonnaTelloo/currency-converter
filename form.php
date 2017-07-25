<?php 
	// echo $_SERVER['PHP_SELF'];
?>
		<form action="index.php" method="post">
		  <input type="search" name="data" value="" />
		  <input type="submit" value="Submit" />
		</form>

		<?php
		 error_reporting(0);
		if(isset($_POST))
		{
			$count = $_POST['data'];

		  // print_r($_POST);
		}else{
			echo "";
		}
		?>
