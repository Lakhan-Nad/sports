<?php
session_start();
include("database.php");
extract($_POST);
if(isset($_SESSION['email'])){
    // Perfrom The Necessary Db Operations
    $location = "/OSP%20Project/sports/".$sport.".php";
    header("Location: $location");
}
else{
    $_SESSION['message'] = "Login Or Signin First";
    header("Location: /OSP%20Project/sports/login.php");
}
?>