<?php 
?>
<?php include('update.php') ?>
<html>
<head>
<title>D&M</title>
<link rel="stylesheet" href="css/mainstyle.css" />
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
 if(isset($_SESSION['user'])){
      $email=$_SESSION['user']['username'];
	  $con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
  $query=mysqli_query($con,"SELECT * FROM users WHERE username='$email'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$usern=$row['username'];
				$email=$row['email'];
				
			}
		}
 }
?>	  
	<form method="post" action="myaccount.php">
	
	<div class="input-group"  style='border-radius: 5px;border: 1px solid gray;height: 500px;width:35%;margin-left:150px;'>
	<h2 style='padding: 20px 10px;'>Date utilizator</h2>
		<ul style='float:right; list-style: none;padding: 100px 140px;'>
		<li style='font-size:20px;'><label>Username: <?php echo "$usern"; ?></label></li>
	   <li style='font-size:20px;'><label>Email: <?php echo "$email"; ?></label></li>
	   <?php echo display_error(); ?>
		<li style='font-size:20px;'><label>Adresa</label>
		<input type="text" name="adresa"></li>
		<li style='padding-top:5%;'><button id="btn" name="final" onclick="window.location.href='myaccount.php'" style='background-color: black;border: none;color: white; width:100%;height:30px;'>Finalizare comanda</button></li>
		</div>
	
	
</form>
       <?php
	   if(isset($_SESSION['user'])){
      $email=$_SESSION['user']['username'];
	$con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
	$query=mysqli_query($con,"SELECT * FROM myaccount WHERE email='$email'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			echo "<h1 style='padding-left:10%;'>Istoric cumparaturi</h1>";
			while($row=mysqli_fetch_array($query)){
				$img=$row['img'];
				$id=$row['id'];
				$nume=$row['nume'];
				$pret=$row['pret'];
				$m=$row['marime'];
				$c=$row['cantitate'];
                echo"
					<div  style='border-radius: 5px;border: 1px solid gray;height: 250px;width:70%;margin-left:150px;'>
					   <img src='.$img.'style='height: 250px; width:20%;'/>
					   <ul style='float:right; list-style: none;'>
					   <li style='font-size:20px; padding-top:10%; margin-right:400px;'>Nume: $nume</li>
				       <li style='font-size:20px;'>Pret: $pret RON</li>
					   <li style='font-size:20px;'> $m</li>
					   <li style='font-size:20px;'>Cantitate: $c</li>
					  </ul>
					  
					</div>
				";
				
			}
		}
	   }
		
	?>
	
  </div>
   <div id="Footer">
	
		</div>
		
<?php


// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location:localhost/pw/main.php");
}

?>


</body>
</html>