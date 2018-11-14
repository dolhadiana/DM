<?php
session_start();
?>
<?php include('adaugareCos.php') ?>
<!DOCTYPE html>
<html>
<head>
<title>D&M</title>
<link rel="stylesheet" href="css/mainstyle.css"/>
</head>
<body>
    <div id="Header">
      
		<nav id="Favorite">
	<button id="btn"onclick="window.location.href='cos.php'" style="padding: 8px 6px;"><img src="images/shopping-bag.png"/></button>
	      <?php 
			if((isset($_SESSION['user']))){
				   if(($_SESSION['user']))
					   echo "<a href='http://localhost/login/index.php'>Deconectare</a>
				            <a href='http://localhost/pw/myaccount.php'>Contul meu</a>";
			}else
			echo "<a href='http://localhost/login/login.php'>Creare cont/Autentificare</a>";
			
		   ?>
		
		</nav>
      <header id="logo">
			<a href="main.php"><img class="icon" src="images/icon2.png"/></a>
	</header>
	<nav id="Menu">
		<div class="container">
		<ul>
          <li><a href="bluze.php">Bluze</a></li>
		  <li><a href="rochii.php">Rochii</a></li>
		  <li><a href="camasi.php">Camasi</a></li>
		  <li><a href="pantaloni.php">Pantaloni</a></li>
		  <form class="search-container" name="form1" action="searchresults.php" method="post">
		   <input type="text" name="search" placeholder=" Search here ... "/>
			<button type="submit" name="Submit"><img src="images/searchicon.png"/></button>
		</form>
        </ul>
		</div>
	</nav>
	
	</div>
	<div id="Main">
	
	 <?php
	 $var = $_GET['varname'];
	$con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
	$query=mysqli_query($con,"SELECT * FROM shop WHERE id='".$var."'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$img=$row['img'];
				$id=$row['id'];
				$nume=$row['nume'];
				$pret=$row['pret'];
				$ms=$row['marimes'];
				$mm=$row['marimem'];
				$ml=$row['marimel'];
			}
		}
				if($ms!=0 & $mm!=0 & $ml!=0){
	            echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea' style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret RON</li>
					<li style='font-size:40px; padding-top:30%;'>
					<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
						
							<option style='font-size:30px;'value='Marimea S'>Marimea S</option>
							<option style='font-size:30px;' value='Marimea M'>Marimea M</option>
							<option style='font-size:30px;' value='Marimea L'>Marimea L</option>				
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";
				}else{
				if($ms!=0 & $mm!=0){
	            echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea' style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret</li>
					<li style='font-size:40px; padding-top:30%;'>
						<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
						
							<option style='font-size:30px;'value='Marimea S'>Marimea S</option>
							<option style='font-size:30px;' value='Marimea M'>Marimea M</option>				
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";}
				if($ms!=0 & $ml!=0){
	           echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea' style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret RON</li>
					<li style='font-size:40px; padding-top:30%;'>
						<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
						
							<option style='font-size:30px;'value='Marimea S'>Marimea S</option>
							<option style='font-size:30px;' value='Marimea L'>Marimea L</option>				
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";}
				if($ml!=0 & $mm!=0){
	            echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea' style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret RON</li>
					<li style='font-size:40px; padding-top:30%;'>
						<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
					
							<option style='font-size:30px;' value='Marimea M'>Marimea M</option>
							<option style='font-size:30px;' value='Marimea L'>Marimea L</option>				
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";}
				if($ms!=0 & $mm==0 & $ml==0){
	           echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea' style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret RON</li>
					<li style='font-size:40px; padding-top:30%;'>
						<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
						
							<option style='font-size:30px;'value='Marimea S'>Marimea S</option>			
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";}
				if($mm!=0 & $ms==0 & $ml==0){
	           echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea'style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret RON</li>
					<li style='font-size:40px; padding-top:30%;'>
						<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
						
							<option style='font-size:30px;' value='Marimea M'>Marimea M</option>				
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";}
				if($ml!=0 & $mm==0 & $ms==0){
	           echo "
					
					<form method='post' action='adaugareCos.php'>
					 <input type='hidden' name='image' value='$img'>
					 <img src='.$img.' id='imagineaMea' style='width:25%; padding:4%;margin-left:200px;'/>
					<ul style='float:right; list-style: none; margin-right:300px; margin-top: 100px;'>
					<li style='font-size:40px;'	>Nume: $nume</li>
				    <li style='font-size:40px;'	>Pret: $pret RON</li>
					<li style='font-size:40px; padding-top:30%;'>
						<p>Alegeti marimea </p>
						<select name='marime'  id='marime' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px; backgroud-color:#fff;'>
							<option style='font-size:30px;' value='Marimea L'>Marimea L</option>				
					 </select>
					</li>
					<li style='padding-top:4%;'>
						<button type='submit' name='cosbutton' style='border-radius: 5px;border: 1px solid gray;height: 40px;width: 400px;background-color: #555555;'>
						<img src='images/shopping-bag.png'/></button>
		          </li>
					</form>
				";}
				}
			
		
	 ?>
	 
</div>			
 	<!-- The Modal -->
<div id="myModal" class="modal2">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal2-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('imagineaMea');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
  </body>
</html>