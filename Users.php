<?php

require_once __DIR__ . "/database.php";
require_once __DIR__ . "/configVars.php";

class User
{
    public static $db;
    protected static $insertStatement;
    public static function createUserDB()
    {
        $create_command = "CREATE TABLE IF NOT EXISTS user(
        email varchar(50) PRIMARY KEY,
        firstName varchar(30) NOT NULL,
        lastName varchar(30),
        pass varchar(256) NOT NULL,
        phone varchar(10),
        check (phone REGEXP '^[6789][0-9]{9}$')
        )";
        User::$db->fullExecute($create_command);
    }
    public static function prepare_insert()
    {
        User::createUserDB();
        $insert_statement = "INSERT INTO user(firstName,lastName,email,pass,phone) VALUES (:firstName,:lastName,:email,:pass,:phone)";
        $rs               = User::$db->prepareAndReturn($insert_statement);
        if ($rs) {
            User::$insertStatement = $rs;
        }
    }
    public static function insertData($userData)
    {
        $userData["pass"] = User::hashPass($userData["pass"]);
        $rs               = User::$insertStatement->execute($userData);
        return $rs;
    }
    protected static function hashPass(string $pass): string
    {
        $hashed = password_hash($pass, 1);
        return $hashed;
    }
    protected static function verifyPass(string $str, string $hashed): bool
    {
        return password_verify($str, $hashed);
    }
    public static function validate(array $userData)
    {
        return array("status" => true);
    }
    public static function retrieveByEmail(string $userEmail)
    {
        $userEmail = trim($userEmail);
        $userEmail = explode(";", $userEmail)[0];
        $query     = "SELECT * FROM user WHERE email='$userEmail'";
        $res       = User::$db->fullFetch($query);
        if (count($res)) {
            return $res[0];
        } else {
            return null;
        }
    }
    public static function alreadyExists($userEmail = null): bool
    {
        if (User::retrieveByEmail($userEmail) !== null) {
            return true;
        } else {
            return false;
        }
    }
    public static function verifyUser(string $userEmail, string $pass)
    {
        $userData = User::retrieveByEmail($userEmail);
        if ($userData === null) {
            return false;
        } else {
            return User::verifyPass($pass, $userData["pass"]);
        }
    }

}

User::$db = new Database(...$DB_CONFIG);
User::prepare_insert();