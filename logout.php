<?php
session_start();
unset($_SESSION['email']);
$_SESSION['message'] = "Logout Successfull";
header("Location:" . "/login.php");