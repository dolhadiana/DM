<?php include('stergereProdus.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>DELETE PRODUCT BY ADMIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - delete product</h2>
	</div>
	
	<form method="post" action="delete_product.php">
	  <?php echo display_error(); ?>
		<div class="input-group">
		  <label>Id produs</label>
			<input type="number" name="id"/>
		</div>
		

		<div class="input-group">
			<button type="submit" class="btn" name="delete_produs"> - DELETE product</button>
		</div>
	</form>
</body>
</html>