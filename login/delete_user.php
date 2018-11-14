<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - DELETE user</title>
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
		<h2>Admin - delete user</h2>
	</div>
	
	<form method="post" action="delete_user.php">

		<?php echo display_error(); ?>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<button   type="submit" class="btn"  name="delete_btn"> - Delete user</button>
		</div>
	</form>
</body>
</html>


<script>


</script>