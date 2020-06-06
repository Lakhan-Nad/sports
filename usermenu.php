<?php
require_once __DIR__ . "/Users.php";
require_once __DIR__ . "/utils.php";
require_once __DIR__ . "/sportsData.php";

session_start();
$email = $_SESSION['email'];

$userData = User::retrieveByEmail($email);
$fullname = $userData["firstName"] . " " . $userData["lastName"];
$phone    = $userData["phone"];

$sports = findByUser($email);

$sportsData = array();

// print_r($sports);

foreach ($sports as $x) {
    // print_r($x);
    $data         = findSport($x["sport"])[0];
    $sportsData[] = $data;
}

// print_r($sportsData);

?>
<!DOCTYPE html>
<html>

<head>
    <title><?=htmlentities($fullname)?> Menu </title>
    <link rel="stylesheet" type="text/css" href="./public/css/usermenu.css" />

</head>

<body>
    <div>
        <img src="/public/images/demo.jpg">
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
        <?php
foreach ($sportsData as $x) {
    echo "<img id='sportPhoto' src=." . htmlentities($x["imgPath"]) . ">";
    echo "<div id='details'>";
    echo "<h2>Name:" . htmlentities($x["sportName"]) . "</h2>";
    echo "<h2>Start Date:" . htmlentities($x["startDate"]) . "</h2>";
    echo "<h2>End Date:" . htmlentities($x["endDate"]) . "</h2>";
    echo "<h2>Venue:" . htmlentities($x["venue"]) . "</h2>";
    echo "</div>";
}
?>
    </div>
</body>

</html>