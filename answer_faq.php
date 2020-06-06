<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/configVars.php";
$db      = new Database(...$DB_CONFIG);
$message = "";
$data;
function dataFetch()
{
    global $data;
    global $db;

    $rs = $db->fullFetch("SELECT * FROM faq");

    if (!$rs) {
        $data = array();
    } else {
        foreach ($rs as $obj) {
            $obj["submitName"] = $obj["answer"] ? "Save Changes" : "Submit Answer";
            $obj["answer"]     = $obj["answer"] ?? "";
            $data[]            = $obj;
        }
    }
}

dataFetch();

if (isset($_POST["answerSubmit"])) {
    unset($_POST["answerSubmit"]);

    $question = trim($_POST["question"]);
    $answer   = trim($_POST["answer"]);
    $data;

    if (strlen($question) == 0 || strlen($answer) == 0) {
        $message = "Unable to add Empty Answer";
    } else {

        $rs = $db->fullExecute("UPDATE faq SET answer='$answer' WHERE question='$question'");

        if (!$rs) {
            $message = "Unable to POST Answer";
        } else {
            $message = "Answer Successfully Updated";
        }
        dataFetch();
    }
} else if (isset($_POST["delQuestion"])) {
    unset($_POST["delQuestion"]);

    $question = trim($_POST["question"]);
    $rs       = $db->fullExecute("DELETE FROM faq WHERE question='$question'");
    if (!$rs) {
        $message = "Unable to POST Answer";
    } else {
        $message = "Question Successfully Deleted";
    }
    dataFetch();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer FAQs</title>
    <link rel="stylesheet" type="text/css" href="./public/css/answer_faq.css" />
</head>

<body>
    <?php if (count($data) == 0) {echo "<h3>" . "NO QUESTIONS TO BE ANSWERED" . "</h3>";}?>
    <?php if (count($data) > 0) {
    echo "<ol>";
    foreach ($data as $obj) {
        echo "<li>" . $obj["question"] . "</li>";
        echo "<br />";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='question' value='" . htmlentities($obj['question']) . "' />";
        echo "<input type='text' name='answer' value='" . htmlentities($obj['answer']) . "'><br />";
        echo "<input type='submit' name='answerSubmit' value='" . $obj["submitName"] . "' />";
        echo "</form>";
        echo "<form method='POST'>";
        echo "<input type='hidden' name='question' value='" . $obj["question"] . "' />";
        echo "<input type='submit' name='delQuestion' value='Delete This Question' />";
        echo "</form>";
        echo '<br />';
    }
    echo "</ol>";
}?>
    <span class="message"><?=htmlentities($message)?></span>
</body>

</html>