<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: " . "/usermenu.php");
} else {
    header("Location: " . "/login.php");
}