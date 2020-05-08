<?php
session_start();
require __DIR__ . "database.php";
extract($_POST);
$question   = trim($question);
$create_faq = "CREATE TABLE FAQ(
    question varchar(200) PRIMARY KEY,
    answer varchar(200)
    )";
if (mysqli_query($conn, $create_faq)) {
    echo "Table Created Successfully";
} else {
    echo mysqli_error($conn) . "\n";
}
$rs = mysqli_query($conn, "select * from faq where question='$question'");
if (mysqli_num_rows($rs) > 0) {
    $_SESSION['message'] = "Same Question Already Posted";
    header("Location: " . "/faq.php");
} else {
    $query = "insert into faq(question) values('$question')";
    $rs    = mysqli_query($conn, $query);
    if ($rs) {
        $_SESSION['message'] = "Question Successfully Posted";
        header("Location:" . "/faq.php");
    } else {
        $_SESSION['message'] = "Unable to POST Question: " . mysqli_error($conn);
        header("Location:" . "/faq.php");
    }
}
// mysqli_query($conn,"DELETE FROM FAQ");
// mysqli_query($conn,"DROP TABLE FAQ");
mysqli_close($conn);