<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/configVars.php";

$db      = new Database(...$DB_CONFIG);
$message = "";

function createTable()
{
    global $createCheck;
    $createCheck = true;

    $create_faq = "CREATE TABLE IF NOT EXISTS faq(
        question varchar(200) PRIMARY KEY,
        answer varchar(200)
        )";
    $res = $db->fullExecute($create_faq);
}

$data;
$rs = $db->fullFetch("SELECT * FROM faq WHERE answer IS NOT NULL");
if (!$rs) {
    $data = array();
} else {
    $data = $rs;
}

if (isset($_POST["submitQuestion"])) {

    $data;
    $question = trim($_POST["question"]);

    if (strlen($question) == 0) {
        $message = "Unable to add Empty Question";
    } else {
        $rs = $db->fullFetch("SELECT * FROM faq WHERE question='$question'");

        if (count($rs) > 0) {
            $message = "Same Question Already Posted";
        } else {
            $rs = $db->fullExecute("INSERT INTO faq(question) VALUES('$question')");
            if ($rs) {
                $message = "Question Successfully Posted";
            } else {
                $message = "Unable to POST Question";
            }
        }
    }
}
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
if (count($data) == 0) {
    echo "<span class='question'>NO QUESTIONS ANSWERED YET</span>";
} else {
    foreach ($data as $qa) {
        echo "<span class='question'>" . $qa["question"] . "</span>";
        echo "<br />";
        echo "<span class='answer'>" . $qa["answer"] . "</span>";
        echo "<br />";
        echo "<br />";
        echo "<hr />";
    }
}?>
    </div>
    <br />
    <br />
    <br />
    <form method="POST">
        <textarea name="question" id="commentarea" placeholder="Add your question here.."></textarea>
        <input type="submit" name="submitQuestion" value="Submit">
    </form>
    <span class="message"><?=htmlentities($message)?></span>
</body>

</html>