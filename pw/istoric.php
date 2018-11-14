<!DOCTYPE html>
<html>
<head>
</head>
<body>
				<?php
	  $con=mysqli_connect('localhost','root','');
	$db=mysqli_select_db($con,"store");
  $query=mysqli_query($con,"SELECT * FROM users WHERE user_type='user'");
	$numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				$usern=$row['username'];
				$email=$row['email'];
				
				$q=mysqli_query($con,"SELECT * FROM myaccount WHERE email='$usern'");
				$n=mysqli_num_rows($q);
				if($n!=0){
					echo "<h1  style='padding-left:10%;'>Istoricul cumparaturilor pentru $usern: </h1>";
					while($row=mysqli_fetch_array($q)){
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
		}
		
		
	?>
			</div>
		</div>
	</div>
</body>
</html>