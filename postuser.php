<?php
session_start();
extract($_POST);
// form validation to be added
include("database.php");
$rs=mysqli_query($conn,"select * from user where email='$email'");
if (mysqli_num_rows($rs)>0)
{
	unset($_SESSION['email']);
	$_SESSION['message'] = "User Already Exist";
	header("Location: /OSP%20Project/sports/login.php");
	exit();
}
$query="insert into user(firstName,lastName,email,pass,phone) values('$firstName','$lastName','$email','$pass','$phone')";
$rs=mysqli_query($conn,$query);
if($rs){
	$_SESSION['email'] = $email;
	header("Location: /OSP%20Project/sports/usermenu.php");
}
else{
	unset($_SESSION['email']);
	$_SESSION['message'] = "Unable to Register: ".mysqli_error($conn);
	header("Location: /OSP%20Project/sports/login.php");
}
?>