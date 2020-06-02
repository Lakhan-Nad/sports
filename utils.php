<?php

$root = dirname(__FILE__);

function redirect($r)
{
    header("Location: " . $root . "/" . $r);
}

function forwardAuth()
{
    session_start();
    return isset($_SESSION["email"]);
}