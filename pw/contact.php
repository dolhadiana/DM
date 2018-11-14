<?php
session_start()
?>

<!DOCTYPE html>
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
		<form class="search-container" name="form1" action="http://localhost/pw/searchresults.php" method="post">
		   <input type="text" name="search" placeholder=" Search here ... "/>
			<button type="submit" name="Submit"><img src="images/searchicon.png"/></button>
		</form>
        </ul>
		</div>
    </nav>
	</div>
	<div id="contact">
    <h1>  &nbsp &nbsp CONTACT</h1>
	</div>
	<div id="info">
	<h1> &nbsp &nbsp &nbsp &nbsp Telefon </h1>
<br>
<h3>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  0800 89 7777 (apel gratuit)</h3>
<br>
<h1>&nbsp &nbsp &nbsp &nbsp Program de lucru</h1>
<br>
<h3> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Luni - Vineri: 08:00 - 21:00
<br>

&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Sambata - Duminica: 09:00 - 17:00
</h3>
	</div>
 
   <div id="Footer">
	
		</div>
		
</body>
</html>