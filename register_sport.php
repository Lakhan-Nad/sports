<?php
session_start();
require __DIR__ . "database.php";
extract($_POST);
if (isset($_SESSION['email'])) {
    // Perfrom The Necessary Db Operations
    $location = $sport . ".php";
    header("Location: " . $location);
} else {
    $_SESSION['message'] = "Login Or Signin First";
    header("Location: " . "/login.php");
}
mysqli_close($conn);