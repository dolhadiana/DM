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
		  <form class="search-container" name="form1" action="http://localhost/pw/searchresults.php" method="post">
		   <input type="text" name="search" placeholder=" Search here ... "/>
			<button type="submit" name="Submit"><img src="http://localhost/pw/images/searchicon.png"/></button>
		</form>
        </ul>
		</div>
	</nav>
	
	</div>
	<div id="Main">
	
	  
        <?php 
		
    if(isset($_POST['pag2']) | isset($_POST['next'])){
     $con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
	$query=mysqli_query($con,"SELECT * FROM shop WHERE pagina='2' AND nume='camasa'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$img=$row['img'];
				$nume=$row['nume'];
				$culoare=$row['culoare'];
				$id=$row['id'];
				$pret=$row['pret'];
				echo "<figure class='item' style=' vertical-align: top; display: inline-block; text-align: center;  padding:4%;'><a href='produs.php?varname=$id'><img src='.$img.' style='width: 380px; height: 600px;'/></a><figcaption class='caption' style='display: block;'><a href='produs.php?varname=$id'>$nume</a><p>$pret RON</p></figcaption></figure>";
				 
		    }
		}
    }
	else{
	if(!(isset($_POST['pag2'])) | (isset($_POST['prev'])) ){
    $con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
	$query=mysqli_query($con,"SELECT * FROM shop WHERE pagina='1' AND nume='camasa'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$img=$row['img'];
				$nume=$row['nume'];
				$culoare=$row['culoare'];
				$id=$row['id'];
				$pret=$row['pret'];
				echo "<figure class='item' style=' vertical-align: top; display: inline-block; text-align: center;  padding:4%;'><a href='produs.php?varname=$id'><img src='.$img.' style='width: 380px; height: 600px;'/></a><figcaption class='caption' style='display: block;'><a href='produs.php?varname=$id'>$nume</a><p>$pret RON</p></figcaption></figure>";
				 
		    }
		}
    }
    
	}
    ?>


   <form  class="pagination" method="post">
    <input type="submit" name="prev" value="<<">
    <input type="submit" name="pag1" value="1">
    <input type="submit" name="pag2" value="2" >
	<input type="submit" name="next" value=">>">
   </form>	
</div>

  
	
  </body>
</html>