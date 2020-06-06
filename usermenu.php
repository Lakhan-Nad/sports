<?php
require_once __DIR__ . "/Users.php";
require_once __DIR__ . "/utils.php";

session_start();
$email = $_SESSION['email'];

$userData = User::retrieveByEmail($email);
$fullname = $userData["firstName"] . " " . $userData["lastName"];
$phone    = $userData["phone"];

?>
<!DOCTYPE html>
<html>

<head>
    <title><?=htmlentities($fullname)?> Menu </title>
    <link rel="stylesheet" type="text/css" href="./public/css/usermenu.css" />

</head>

<body>
    <div>
        <img src="tom.jpg">
        <div id="participantDescription">
            <h2><?=htmlentities($fullname)?></h2>
            <h2><?=htmlentities($email)?></h2>
            <h2 style="color: black;"><?=htmlentities($phone)?></h2>
        </div>
        <button id="logoutButton">
            <a href="logout.php">Logout</a>
        </button>
    </div>
    <div>
        <h1 style="text-align: center; padding-top: 50px; color: black; font-size: 50px;"><B>Registered Sports</B></h1>
        <img id="sportPhoto" src="cricket.jpg">
        <div id="details">
            <h2>Start Date: </h2>
            <h2>End Date: </h2>
            <h2>Venue: </h2>
        </div>
    </div>
</body>

</html>