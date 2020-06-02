<?php
session_start();
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's Page</title>
</head>

<body>
    <h1>Welcome, <?=htmlentities($email)?></h1>
    <a href="logout.php">LOGOUT</a>
</body>

</html>