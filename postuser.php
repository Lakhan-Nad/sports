<?php
session_start();
require __DIR__ . "database.php";
$create_user = "CREATE TABLE USER(
    email varchar(50) PRIMARY KEY,
    firstName varchar(30) NOT NULL,
    lastName varchar(30) NOT NULL,
    pass varchar(256) NOT NULL,
    phone varchar(10) NOT NULL,
    check(phone REGEXP '^[6789][0-9]{9}$')
    )";
if (mysqli_query($conn, $create_user)) {
    echo "Table Created Successfully";
} else {
    echo mysqli_error($conn) . "\n";
}
extract($_POST);
// form validation to be added
$rs = mysqli_query($conn, "select * from user where email='$email'");
if (mysqli_num_rows($rs) > 0) {
    unset($_SESSION['email']);
    $_SESSION['message'] = "User Already Exist";
    header("Location:" . __DIR__ . "/login.php");
    exit();
}
$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
echo ($pass_hash);
$query = "insert into user(firstName,lastName,email,pass,phone) values('$firstName','$lastName','$email','$pass_hash','$phone')";
$rs    = mysqli_query($conn, $query);
if ($rs) {
    $_SESSION['email'] = $email;
    header("Location:" . __DIR__ . "/usermenu.php");
} else {
    unset($_SESSION['email']);
    $_SESSION['message'] = "Unable to Register: " . mysqli_error($conn);
    header("Location: " . __DIR__ . "/login.php");
}
// mysqli_query($conn,"DELETE FROM USER");
// mysqli_query($conn,"DROP TABLE USER");
mysqli_close($conn);