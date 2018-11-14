<?php 
session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'store');

// variable declaration
$username = "";
$email    = "";
$errors   = array(); 

if (isset($_POST['delete_produs'])) {
	stergere();
}

function stergere(){

	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$id =e($_POST['id']);

	// form validation: ensure that the form is correctly filled
	if (empty($id)) { 
		array_push( $errors, "Id-ul nu poate fi gol"); 
	}else{
	$result =mysqli_query($db,"SELECT * FROM shop WHERE id='$id'");
    $numrows=mysqli_num_rows($result);
	if($numrows<=0){
	array_push($errors, "Id don't exists in the database!");}
    }
	if (count($errors) == 0) {    
    // sql to delete a record
    $row = mysqli_fetch_array($result);
    $id = $row['id'];

    $query="DELETE FROM shop WHERE id=$id";
	mysqli_query($db, $query);
	
	$_SESSION['success']  = "The product was deleted!!";
				header('location: home.php');
  
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
