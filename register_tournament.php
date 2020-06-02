<?php
require_once __DIR__ . "/utils.php";

if (forwardAuth()) {
    redirect("usermenu.php");
} else {
    redirect("login.php");
}