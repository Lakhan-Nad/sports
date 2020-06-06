<?php
require_once __DIR__ . "/sportsData.php";
require_once __DIR__ . "/utils.php";

if (!forwardAuth()) {
    redirect("login.php");
}

session_start();
$user  = $_SESSION["email"];
$sport = $_POST["sport"];

$exist = findBySportAndUser($sport, $user);

if (count($exist) == 0) {
    $s = registerSport($sport, $user);
}

redirect("usermenu.php");