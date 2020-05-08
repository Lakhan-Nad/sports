<?php
session_start();
?>
<html>

<head>
    <title>
        FAQ
    </title>
    <link rel="stylesheet" type="text/css" href="./public/css/faqcss.css" />
    <!-- <style>
    .faq {
        display: inline-block;
    }

    body {
        background-color: #1a354b;
        text-align: center;
        margin: 0px;
        padding: 0px;
    }

    #commentarea {
        margin: 0px;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        background-color: whitesmoke;
        font-weight: bold;
        font-size: 15px;
        height: 40px;
        width: 1080px;
        border-radius: 10px;
        outline: none;
    }

    button {
        width: 90px;
        height: 30px;
        font-weight: bold;
        background-color: dodgerblue;
        color: white;
        font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
            "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
        margin: 0px;
        position: relative;
        top: -14px;
        border-radius: 5px;
        outline: none;
    }

    form {
        margin-right: 20px;
        float: right;
        width: 1180px;
        text-align: center;
    }

    .faqs {
        margin-top: 20px;
        display: inline-block;
        width: 1180px;
        height: 600px;
        overflow-y: scroll;
    }

    .question {
        font-size: medium;
        font-family: Arial, Helvetica, sans-serif;
        float: left;
        max-width: 900px;
        color: #f3bc46;
        text-align: left;
    }

    .answer {
        font-size: medium;
        font-family: Cambria, Cochin, Georgia, Times, "Times New Roman", serif;
        float: right;
        max-width: 900px;
        color: white;
        text-align: right;
        margin-bottom: 20px;
    }

    .message {
        width: 100%;
        position: absolute;
        bottom: 20px;
        display: block;
        text-align: center;
        font-size: 20px;
        font-weight: 5px;
        color: white;
        margin: 0px;
    }
    </style> -->
</head>

<body>
    <div class="faq">
        <img src="./public/images/faqbg.jpg" alt="FAQ" width="300" height="500" />
    </div>
    <div class="faqs">
        <?php
include "database.php";
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