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

if (count($sportsData) == 0) {
    $head = "REGISTER YOUR FIRST SPORT";
} else {
    $head = "REGISTERED SPORTS";
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
        <img src="/public/images/demo.jpg" id="profile">
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
        <h1><?=htmlentities($head)?></h1>
        <?php
if (count($sportsData) > 0) {
    echo "<table>";
    foreach ($sportsData as $x) {
        echo "<tr>";
        echo "<td>";
        echo "<img id='sportPhoto' src=." . htmlentities($x["imgPath"]) . ">";
        echo "</td>";
        echo "<td>";
        echo "<h2>Name:" . htmlentities($x["nameVal"]) . "</h2>";
        echo "<h2>Start Date:" . htmlentities($x["startDate"]) . "</h2>";
        echo "<h2>End Date:" . htmlentities($x["endDate"]) . "</h2>";
        echo "<h2>Venue:" . htmlentities($x["venue"]) . "</h2>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
    </div>
</body>

</html>