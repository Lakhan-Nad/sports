<?php
session_start();
require __DIR__ . "database.php";
extract($_POST);
$question = trim($question);
$rs       = mysqli_query($conn, "delete from faq where question='$question'");
if (!$rs) {
    $_SESSION['message'] = "Unable to POST Answer: " . mysqli_error($conn);
    header("Location:" . "/answer_faq.php");
} else {
    $_SESSION['message'] = "Question Successfully Deleted";
    header("Location:" . "/answer_faq.php");
}
mysqli_close($conn);