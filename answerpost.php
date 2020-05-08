<?php
session_start();
require __DIR__ . "database.php";
extract($_POST);
$answer   = trim($answer);
$question = trim($question);
$rs       = mysqli_query($conn, "update faq set answer='$answer' where question='$question'");
if (!$rs) {
    $_SESSION['message'] = "Unable to POST Answer: " . mysqli_error($conn);
    header("Location:" . "/answer_faq.php");
} else {
    $_SESSION['message'] = "Answer Successfully Updated";
    header("Location:" . "/answer_faq.php");
}
mysqli_close($conn);