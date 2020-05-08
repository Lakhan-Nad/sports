<?php
session_start();
include "database.php";
extract($_POST);
$question = trim($question);
$rs       = mysqli_query($conn, "delete from faq where question='$question'");
if (!$rs) {
    $_SESSION['message'] = "Unable to POST Answer: " . mysqli_error($conn);
    header("Location: /OSP%20Project/sports/answer_faq.php");
} else {
    $_SESSION['message'] = "Question Successfully Deleted";
    header("Location: /OSP%20Project/sports/answer_faq.php");
}
mysqli_close($conn);