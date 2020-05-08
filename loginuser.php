<?php
session_start();
extract($_POST);
require __DIR__ . "database.php";
$rs = mysqli_query($conn, "select * from user where email='$email'");
if ($rs) {
    if (mysqli_num_rows($rs) != 0) {
        $obj = mysqli_fetch_object($rs);
        if (password_verify($pass, $obj->pass)) {
            $_SESSION['email'] = $email;
            header("Location:" . "/usermenu.php");
        } else {
            unset($_SESSION['email']);
            $_SESSION['message'] = "Wrong Password";
            header("Location: " . "/login.php");
        }
        mysqli_free_result($rs);
    } else {
        unset($_SESSION['email']);
        $_SESSION['message'] = "User Not Found";
        header("Location:" . "/login.php");
    }
} else {
    unset($_SESSION['email']);
    $_SESSION['message'] = "Unable to Login: " . mysqli_error($conn);
    header("Location:" . "/login.php");
}
mysqli_close($conn);