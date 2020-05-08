<?php
session_start();
include "database.php";
extract($_POST);
$answer   = trim($answer);
$question = trim($question);
$rs       = mysqli_query($conn, "update faq set answer='$answer' where question='$question'");
if (!$rs) {
    $_SESSION['message'] = "Unable to POST Answer: " . mysqli_error($conn);
    header("Location: /OSP%20Project/sports/answer_faq.php");
} else {
    $_SESSION['message'] = "Answer Successfully Updated";
    header("Location: /OSP%20Project/sports/answer_faq.php");
}
mysqli_close($conn);