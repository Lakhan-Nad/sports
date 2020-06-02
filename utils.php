<?php

$root = dirname(__FILE__);

function redirect($r)
{
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: " . $r);
}

function forwardAuth()
{
    session_start();
    return isset($_SESSION["email"]);
}