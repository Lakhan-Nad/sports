<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: /OSP%20Project/sports/usermenu.php");
} else {
    header("Location: /OSP%20Project/sports/login.php");
}