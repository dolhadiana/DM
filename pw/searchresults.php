<?php
session_start()
?>
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
			<a href="http://localhost/pw/main.php"><img class="icon" src="images/icon2.png"/></a>
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
	if(!empty($_POST['search'])) {
	$user=$_POST['search'];
    $con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
	$query=mysqli_query($con,"SELECT * FROM shop WHERE culoare='".$user."'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$id=$row['id'];
				$img=$row['img'];
				$nume=$row['nume'];
				$pret=$row['pret'];
				echo "<figure class='item' style=' vertical-align: top; display: inline-block; text-align: center;  padding:4%;'><a href='produs.php?varname=$id'><img src='.$img.' style='width: 380px; height: 600px;'/></a><figcaption class='caption' style='display: block;'><a href='produs.php?varname=$id'>$nume</a><p>$pret RON</p></figcaption></figure>";
			 
		    }
		}	
		else{
		     ?><br> <br><h1> &nbsp &nbsp &nbsp &nbsp  Nu am gasit nimic!!!</h1>
		   <?php
		}
	} else{
		?><br> <br><h1> &nbsp &nbsp &nbsp &nbsp  N-ai scris nimic!!!</h1>
		   <?php
	}
	
?>
</body>
</html>