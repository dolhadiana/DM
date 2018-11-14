<?php 


// connect to database
$db = mysqli_connect('localhost', 'root', '', 'store');

// variable declaration
$errors   = array(); 

if (isset($_POST['cosbutton'])) {
	adaugare();
}

function adaugare(){

	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$marime =e($_POST['marime']);
    $img =e($_POST['image']);
	// form validation: ensure that the form is correctly filled
	if (empty($marime)) { 
		array_push( $errors, "Numele nu poate fi gol"); 
	}
	if (count($errors) == 0) {
		$query=mysqli_query($db,"SELECT * FROM shop WHERE img='$img'");
	    $numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				 $id=$row['id'];
			     $nume=$row['nume'];
				 $pret=$row['pret'];
				 $ms=$row['marimes'];
				 $mm=$row['marimem'];
				 $ml=$row['marimel'];
				 $culoare= $row['culoare'];
				 $pagina= $row['pagina'];
				 
					
				
			}
		}
          $query=mysqli_query($db,"SELECT * FROM cos WHERE img='$img' AND marime='$marime'");
	    $numrows=mysqli_num_rows($query);
		if($numrows>0){
			while($row=mysqli_fetch_array($query)){
				 $id=$row['id'];
				 $cantitate=$row['cantitate'];
			}
			 $cantitate=$cantitate+1;
	  	$sql = "UPDATE cos SET cantitate='$cantitate' WHERE id=$id";
		mysqli_query($db, $sql);}
		else{
	   $query = "INSERT INTO cos (img,nume, pret,marime,cantitate) 
					  VALUES('$img', '$nume', '$pret', '$marime','1')";
		 mysqli_query($db, $query);
			$_SESSION['success']  = "New product was added!!";
		}
		header('location:main.php'); 
	}
}
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));

}

function display_error() {
	global $errors;
	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	
