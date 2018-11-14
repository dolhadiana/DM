<?php 

session_start();
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'store');

// variable declaration
$errors   = array(); 

if (isset($_POST['mod'])) {
	adaugare();
}

if (isset($_POST['close'])) {
	close();
}
if (isset($_POST['cumpara'])) {
	cumpara();
}
if (isset($_POST['cum'])) {
	cumparatot();
}
if (isset($_POST['final'])) {
	finalizeaza();
}
function adaugare(){

	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$c =e($_POST['cantitate']);
    $id=e($_POST['id']);
	if (count($errors) == 0) {
		
	  	$sql = "UPDATE cos SET cantitate='$c' WHERE id=$id";
		mysqli_query($db, $sql);
				 
		}
		header('location: cos.php'); 

		
        
}
function cumpara(){

	global $db, $errors;
	$id=e($_POST['id']);
	$query=mysqli_query($db,"SELECT * FROM cos WHERE id='$id'");
	$numrows=mysqli_num_rows($query);
	if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				 $id=$row['id'];
			     $nume=$row['nume'];
				 $pret=$row['pret'];
				 $img=$row['img'];
				 $marime=$row['marime'];
			     $c=$row['cantitate'];
			
			if(isset($_SESSION['user'])){
				$email=$_SESSION['user']['username'];
				echo "dasda $email";
				$query = "INSERT INTO myaccount (email,nume,img, pret,marime,cantitate) 
					  VALUES('$email' ,'$nume','$img', '$pret', '$marime','$c')";
				mysqli_query($db, $query);
	       }

			if (count($errors) == 0) {
		
				$query="DELETE FROM cos WHERE id=$id";
					mysqli_query($db, $query);
				 
			}
		
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
				 if($marime=="Marimea S"){
					 $ms=$ms-$c;
				   $sql = "UPDATE shop SET marimes='$ms' WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
				 if($marime=="Marimea M"){
					 $mm=$mm-$c;
				   $sql = "UPDATE shop SET marimem='$mm' WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
				 if($marime=="Marimea L"){
					 $ml=$ml-$c;
				   $sql = "UPDATE shop SET marimel='$ml' WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
				 if($ms==0& $mm==0 & $ml==0){
		             $sql="DELETE FROM shop WHERE id=$id";
		            mysqli_query($db, $sql);
				 }	
			}
		}
	}
}
header('location: cos.php'); 
}
function close(){

	global $db, $errors;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
    $id=e($_POST['id']);
	if (count($errors) == 0) {
		
	  	$query="DELETE FROM cos WHERE id=$id";
					mysqli_query($db, $query);
				 
		}
		header('location: cos.php'); 

		
        
}
function cumparatot(){

    
	global $db, $errors;
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
		$query=mysqli_query($db,"SELECT * FROM cos");
	    $numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				 $id=$row['id'];
			     $nume=$row['nume'];
				 $pret=$row['pret'];
				 $img=$row['img'];
				 $marime=$row['marime'];
				 $c=$row['cantitate'];
				 if(isset($_SESSION['user'])){
      $email=$_SESSION['user']['username'];
				 $q = "INSERT INTO myaccount (email,nume,img, pret,marime,cantitate) 
					  VALUES('$email' ,'$nume','$img', '$pret', '$marime','$c')";
				mysqli_query($db, $q);
				$_SESSION['success']  = "New product was added!!";}
				$qy=mysqli_query($db,"SELECT * FROM shop WHERE img='$img'");
	    $numrows=mysqli_num_rows($qy);
		if($numrows!=0){
			while($row=mysqli_fetch_array($qy)){
				 $id=$row['id'];
			     $nume=$row['nume'];
				 $pret=$row['pret'];
				 $ms=$row['marimes'];
				 $mm=$row['marimem'];
				 $ml=$row['marimel'];
				 $culoare= $row['culoare'];
				 $pagina= $row['pagina'];
				 if($marime=="Marimea S"){
					 $ms=$ms-$c;
				   $sql = "UPDATE shop SET marimes='$ms' WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
				 if($marime=="Marimea M"){
					 $mm=$mm-$c;
				   $sql = "UPDATE shop SET marimem='$mm' WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
				 if($marime=="Marimea L"){
					 $ml=$ml-$c;
				   $sql = "UPDATE shop SET marimel='$ml' WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
				 if($ms==0& $mm==0 & $ml==0){
		             $sql="DELETE FROM shop WHERE id=$id";
		            mysqli_query($db, $sql);
				 }
					
				
			}
		}
				
			}
		}
        $query=mysqli_query($db,"SELECT * FROM cos");
	    $numrows=mysqli_num_rows($query);
		if($numrows!=0){
			while($row=mysqli_fetch_array($query)){
				 $id=$row['id'];
	     $q="DELETE FROM cos WHERE id=$id";
					mysqli_query($db, $q);
			}
		}
		
	header('location: cos.php'); 
}
function finalizeaza(){
	global $db, $errors;
    $add  =  e($_POST['adresa']);

	// form validation: ensure that the form is correctly filled
	if (empty($add)) { 
		array_push( $errors, "Adresa este necesara!"); 
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