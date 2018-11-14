<?php 

session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'store');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

if (isset($_POST['add_product'])) {
	adaugare();
}

function adaugare(){

	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name =e($_POST['nume']);
	$culoare= e($_POST['culoare']);
	$imagine=e($_POST['img']);
	$pret=e($_POST['pret']);
	$marimes = e($_POST['marimes']);
	$marimem = e($_POST['marimem']);
	$marimel= e($_POST['marimel']);

	// form validation: ensure that the form is correctly filled
	if (empty($name)) { 
		array_push( $errors, "Numele nu poate fi gol"); 
	}
	if (empty($culoare)) { 
		array_push($errors, "Trebuie aleasa o culoare"); 	
	}
	if (empty($pret)) { 
		array_push($errors, "Produsul trebuie sa aibe un pret"); 
	}
	if (empty($imagine)) { 
		array_push($errors, "Produsul trebuie sa aibe o imagine"); 
	}
    
	if (count($errors) == 0) {
		
	   $result =mysqli_query($db,"SELECT * FROM shop WHERE img='$imagine'");
       $numrows=mysqli_num_rows($result);
	   if($numrows>0){
		   $row = mysqli_fetch_array($result);
             $ml=$row["marimel"]+$marimel;
			  $ms=$row["marimes"]+$marimes;
			   $mm=$row["marimem"]+$marimem;
			   $i=$row["id"];
	      $sql = "UPDATE shop SET pret=$pret,marimes=$ms,marimel=$ml,marimem=$mm WHERE id=$i";
		            mysqli_query($db, $sql);
					$_SESSION['success']  = "The product was edited!!";
				header('location: home.php');
	   }
       else{
		$query = "INSERT INTO shop (nume,culoare,img, pret,marimes,marimel,marimem,pagina) 
					  VALUES('$name', '$culoare', '$imagine', '$pret','$marimes','$marimel','$marimem','1')";
		 mysqli_query($db, $query);
			$_SESSION['success']  = "New product was added!!";
				header('location: home.php');
	   }
	}
}
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));

}
function delete(){
	global $errors;
	$email= e($_POST['email']);

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'store');
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
   
$result =mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
$numrows=mysqli_num_rows($result);
	if (empty($email)) { 
		array_push($errors, "Email is required"); 	
	}
	else
	if($numrows<=0){
	array_push($errors, "Email don't exists in the database!");
    
	}

// sql to delete a record
$row = mysqli_fetch_array($result);
$id = $row['id'];

$query="DELETE FROM users WHERE id=$id";
if (mysqli_query($conn, $query)) {
    
} else {
    
}
mysqli_close($conn);
}
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}



// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location:localhost/pw/main.php");
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
