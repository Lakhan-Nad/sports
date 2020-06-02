<?php
require_once __DIR__ . "/utils.php";

function logout()
{
    session_start();
    unset($_SESSION['email']);
}

logout();
redirect("login.php");