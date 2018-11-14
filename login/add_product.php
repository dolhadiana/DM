<?php include('adaugareProdus.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD PRODUCT BY ADMIN</title>
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
		<h2>Admin - add product</h2>
	</div>
	
	<form method="post" action="add_product.php">
	   <?php echo display_error(); ?>
		<div class="input-group">
		  <label>Nume produs</label>
			<select name="nume" id="nume" >
				<option value=""></option>
				<option value="bluza">Bluza</option>
				<option value="camasa">Camasa</option>
				<option value="pantalon">Pantalon</option>
				<option value="rochie">Rochie</option>			
		    </select>
		</div>
		<div class="input-group">
			<label>Culoare</label>
			<select name="culoare" id="culoare" >
				<option value=""></option>
				<option value="rosu">Rosu</option>
				<option value="negru">Negru</option>
				<option value="albastru">Albastru</option>
				<option value="verde">Verde</option>
				<option value="galben">Galben</option>
				<option value="alb">Alb</option>
			</select>
		</div>
		<div class="input-group">
			<label>Imagine</label>
			<input type="text" name="img">
		</div>
		<div class="input-group">
			<label>Pret</label>
			<input type="text" name="pret">
		</div>
		<div class="input-group">
			<label>Cate produse de acest tip marimea S?</label>
			<input type="number" value='0' name="marimes" min="0" max="10">

		</div>
        
		<div class="input-group">
			<label>Cate produse de acest tip marimea M?</label>
			<input type="number" value='0' name="marimem" min="0" max="10">

		</div>
       <div class="input-group">
			<label>Cate produse de acest tip marimea L?</label>
			<input type="number" value='0' name="marimel" min="0" max="10">

		</div>

		<div class="input-group">
			<button type="submit" class="btn" name="add_product"> + Add product</button>
		</div>
	</form>
</body>
</html>