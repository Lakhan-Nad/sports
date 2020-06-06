<?php

require_once __DIR__ . "/database.php";
require_once __DIR__ . "/configVars.php";

$db = new Database(...$DB_CONFIG);

function createTable()
{
    global $db;

    $create_statement = "CREATE TABLE IF NOT EXISTS sports(
    nameVal varchar(100),
    sportName varchar(100) PRIMARY KEY,
    startDate date,
    endDate date,
    venue varchar(100),
    imgPath varchar(100)
    )";

    $registrationsCreate = "CREATE TABLE IF NOT EXISTS registraitions(
        sport varchar(100),
        user varchar(100),
        PRIMARY KEY(sport,user)
        )";

    $db->fullExecute($create_statement);
    $db->fullExecute($registrationsCreate);
}

function addData(array $data)
{
    global $db;
    $insert = "INSERT INTO sports(sportName,nameVal,startDate,endDate,venue,imgPath) VALUES(:sportName,:nameVal,:startDate,:endDate,:venue,:imgPath)";
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

function findAllSport()
{
    global $db;
    $find = "SELECT * from sports";
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