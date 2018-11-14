<?php 
session_start();
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
		  
		<form class="search-container" name="form1" action="searchresults.php" method="post">
		   <input type="text" name="search" placeholder=" Search here ... "/>
			<button type="submit" name="Submit"><img src="images/searchicon.png"/></button>
		</form>
        </ul>
		</div>
    </nav>
	</div>
	<div id="Main">
       <div id="slider" >
<figure>
        <img src="images/slider/img1.jpg"/>
        <img src="images/slider/img2.jpg"/>
		<img src="images/slider/img3.jpg"/>
        <img src="images/slider/img4.jpg"/>
        <img src="images/slider/img5.jpg"/>
        <img src="images/slider/img6.jpg"/>
        <img src="images/slider/img7.jpg"/>
        <img src="images/slider/img1.jpg"/>
	
</figure>	
</div>
<div class="big_links" id="nouaColectie" onclick="window.location.href='rochii.php'"">
 <img src="images/nouaColectie/imgHome.jpg" />
 </div>
 

 
 <div class="big_links" id="camasi" onclick="camasi()" >
 <img src="images/camasi/home2.jpg" />
 </div> 
 
 <div class="big_links" id="pantaloni" onClick="pantaloni()">
  <img src="images/pantaloni/imgHome.jpg"/>
 </div> 
<div class="big_links" id="sales" >
 <img src="images/promotii/imgHome.jpg" />
 </div>
 <div class="big_links" id="bluze" onClick="bluze()">
 <img src="images/bluze/imgHome.jpg"/>
 
 </div>
 <div class="big_links" id="rochii" onclick="rochii()" >
 <img src="images/rochii/img3.jpg"/>
 
 </div>
  
  </div>
   <div id="Footer">
	<div class="columns" id="column1">
		<ul>
		  <li><a href="bluze.php">Bluze</a></li>
		  <li><a href="rochii.php">Rochii</a></li>
		  <li><a href="camasi.php">Camasi</a></li>
		 		 
		</ul>
		
		</div>
		<div class="columns" id="column2">
		  <li><a href="pantaloni.php">Pantaloni</a></li> 
		  <li><a href="contact.php">Contact</a></li>

		<ul>
		</div>
		<a href="http://localhost/pw/main.php"><img class="icon" src="images/icon2.png"/></a>
		</div>
		


<script>
			 function pantaloni(){
			 
			 location.href="pantaloni.php";

			 }
  
                </script>
				<script>
			 function bluze(){
			 
			 location.href="bluze.php";

			 }
			 </script>
			 <script>
			 function rochii(){
			 
			 location.href="rochii.php";

			 }
  
                </script>
				<script>
			 function camasi(){
			 
			 location.href="camasi.php";

			 }
			 </script>
			 <script>
			 function promotie(){
			 
			 location.href="promotii.php";

			 }
</script>
</body>
</html>