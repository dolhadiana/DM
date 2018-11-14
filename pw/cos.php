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
	$con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
	$query=mysqli_query($con,"SELECT * FROM cos");
	$numrows=mysqli_num_rows($query);
	$sum=0;
	$tot=0;
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$img=$row['img'];
				$id=$row['id'];
				$nume=$row['nume'];
				$pret=$row['pret'];
				$m=$row['marime'];
				$c=$row['cantitate'];
				$sum=$sum+$pret*$c;
				$sql=mysqli_query($con,"SELECT * FROM shop WHERE img='$img'");
	            $numrows=mysqli_num_rows($sql);
				if($numrows!=0){
					while($row=mysqli_fetch_array($sql)){
						$ms=$row['marimes'];
						$mm=$row['marimem'];
						$ml=$row['marimel'];
					}
				 if($m=="Marimea S"){
					 $ma=$ms;
				 }
				 if($m=="Marimea M"){
					$ma=$mm;
				 }
				 if($m=="Marimea L"){
					 $ma=$ml;
				 }
				}
                echo"
					<form method='post' action='update.php'  style='border-radius: 5px;border: 1px solid gray;height: 250px;width:50%;margin-left:150px;'>
					   <input type='hidden' name='id' value='$id'>
					   <img src='.$img.'style='height: 250px; width:25%;'/>
					   <ul style='float:right; list-style: none;'>
					  <li> <button type='submit' name='close' style=' float:right;background-color: black;border: none;color: white; width:20%;height:30px;'>Inchide</button></li>
					   <li style='font-size:20px; padding-top:10%; margin-right:400px;'>Nume: $nume</li>
				       <li style='font-size:20px;'>Pret: $pret RON</li>
					   <li style='font-size:20px;'> $m</li>
					   <li style='font-size:20px;'>
			          <input type='number' name='cantitate'  value='$c' min='0' max='$ma' style=' width:10%;'> 
					  <button type='submit' name='mod' style='background-color: black;border: none;color: white; width:38%;height:30px;'>Modifica</button></li>
					   <li style='padding-top:4%;'><button type='submit' name='cumpara'style='background-color: black;border: none;color: white; width:50%;height:30px;'>Cumpara</button></li>
					  </ul>
					  
					</form>
				";
				
			}
		     $tot=10+$sum;
		}
		
	?>
	<form method="post" action="update.php" style="border-radius: 5px;border: 1px solid gray;width:25%;height:450px; position: fixed; top:280;right: 100;">
	   <h2 style='text-align:center; padding-top:30%;'>TOTAL COS DE CUMPARATURI</h2>
	   <ul style='list-style: none; margin-top: 100px; margin-left:30px'>
   	    <li>VALOAREA COMENZII: <?php echo "$sum RON";?></li>
		<li>LIVRARE: 10 RON </li>
		<li>TOTAL: <?php echo "$tot RON";?></li>
		<li style=' padding-top:5%;'><button type='submit' name='cum' style='background-color: black;border: none;color: white; width:90%;height:30px;'>Cumpara</button></li>
					  
		</ul>
	</form>
</div>			
	
  </body>
</html>