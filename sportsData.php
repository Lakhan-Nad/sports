<?php

require_once __DIR__ . "/database.php";
require_once __DIR__ . "/configVars.php";

$db = new Database(...$DB_CONFIG);

function createTable()
{
    global $db;

    $create_statement = "CREATE TABLE IF NOT EXISTS sports(
    sportName varchar(100),
    startDate date,
    endDate date,
    venue varchar(100),
    imgPath varchar(100)
    )";

    $registrationsCreate = "CREATE TABLE IF NOT EXISTS registraitions(
        sport varchar(100),
        user varchar(100)
        )";

    $db->fullExecute($create_statement);
    $db->fullExecute($registrationsCreate);
}

function addData(array $data)
{
    global $db;
    $insert = "INSERT INTO sports(sportName,startDate,endDate,venue,imgPath) VALUES(:sportName,:startDate,:endDate,:venue,:imgPath)";
    $rs     = $db->prepareAndReturn($insert);
    $res    = $rs->execute($data);
    return $res;
}

function registerSport(string $sport, string $user)
{
    global $db;
    $data["sport"] = $sport;
    $data["user"]  = $user;
    $insert        = "INSERT INTO registraitions(sport,user) VALUES(:sport,:user)";
    $rs            = $db->prepareAndReturn($insert);
    $res           = $rs->execute($data);
    return $res;
}

function findSport(string $sport)
{
    global $db;
    $find = "SELECT * from sports WHERE sportName='$sport'";
    $rs   = $db->fullFetch($find);
    return $rs;
}

function findByUser(string $user)
{
    global $db;
    $find = "SELECT * from registraitions WHERE user='$user'";
    $rs   = $db->fullFetch($find);
    return $rs;
}

function findBySport(string $sport)
{
    global $db;
    $find = "SELECT * from registraitions WHERE sport='$sport'";
    $rs   = $db->fullFetch($find);
    return $rs;
}

function findBySportAndUser(string $sport, string $user)
{
    global $db;
    $find = "SELECT * from registraitions WHERE sport='$sport' AND user='$user'";
    $rs   = $db->fullFetch($find);
    return $rs;
}

$array = array(
    "sportName" => "swimming",
    "venue"     => "Swimming pool",
    "startDate" => "2020-06-12",
    "endDate"   => "2020-07-12",
    "imgPath"   => "/public/images/swimming.jpg",
);

addData($array);