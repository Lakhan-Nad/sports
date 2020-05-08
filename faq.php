<?php
session_start();
?>
<html>

<head>
    <title>
        FAQ
    </title>
    <link rel="stylesheet" type="text/css" href="./public/css/faqcss.css" />
</head>

<body>
    <div class="faq">
        <img src="./public/images/faqbg.jpg" alt="FAQ" width="300" height="500" />
    </div>
    <div class="faqs">
        <?php
require "database.php";
$rs = mysqli_query($conn, "select * from faq where answer is not null");
if (!$rs or mysqli_num_rows($rs) == 0) {
    echo "<span class='question'>" . "NO QUESTIONS ANSWERED YET" . "</span>";
} else {
    while ($obj = mysqli_fetch_object($rs)) {
        echo "<span class='question'>" . $obj->question . "</span>";
        echo "<br />";
        echo "<span class='answer'>" . $obj->answer . "</span>";
        echo "<br />";
        echo "<br />";
        echo "<hr />";
    }
    mysqli_free_result($rs);
}
mysqli_close($conn);
?>
    </div>
    <br />
    <br />
    <br />
    <form method="POST" action="questionpost.php">
        <textarea name="question" id="commentarea" placeholder="Add your question here.."></textarea>
        <button type="submit">Submit</button>
    </form>
    <span class="message">
        <?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
    </span>
</body>

</html>