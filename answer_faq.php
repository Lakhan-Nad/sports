<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Answer FAQs</title>
    <!-- <link rel="stylesheet" type="text/css" href="./public/css/answer_faq.css" /> -->
    <style>
        body {
            background-color: #1a354b;
            margin:0px;
            padding:0px;
        }
        textarea{
            width:300px;
            height:100px;
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
        li{
            color:#f3bc46;
            font-size:20px;
        }
        h1{
            color:white;
        }
    </style>
</head>
<body>
    <?php
      include("database.php");
      echo "<h1>Unanswered Questions</h1>";
      $rs = mysqli_query($conn,"select * from faq where answer is null");
      if(!$rs or mysqli_num_rows($rs)==0){
        echo "<h3>"."NO QUESTIONS TO BE ANSWERED"."</h3>";
      }
      else{
          echo "<ol>";
        while($obj = mysqli_fetch_object($rs)){
          echo "<li>".$obj->question."</li>";
          echo "<br />";
          echo "<form method='POST' action='answerpost.php'>";
          echo "<input type='hidden' name='question' value='$obj->question' />";
          echo "<textarea name='answer'></textarea><br />";
          echo "<input type='submit' value='Submit' />";
          echo "</form>";
          echo "<form method='POST' action='deletequestion.php'>";
          echo "<input type='hidden' name='question' value='$obj->question' />";
          echo "<input type='submit' value='Delete This Question' />";
          echo "</form>";
        }
        echo "</ol>";
        mysqli_free_result($rs);
      }
      echo "<hr />";
      echo "<h1>Answered Questions</h1>";
      $ans = mysqli_query($conn,"select * from faq where answer is not null");
      if(!$ans or mysqli_num_rows($ans)==0){
        echo "<h3>"."NO QUESTIONS TO BE DELETED"."</h3>";
      }
      else{
          echo "<ul>";
        while($obj = mysqli_fetch_object($ans)){
          echo "<li>".$obj->question."</li>";
          echo "<form method='POST' action='deletequestion.php'>";
          echo "<input type='hidden' name='question' value='$obj->question' />";
          echo "<input type='submit' value='Delete This Question' />";
          echo "</form>";
          echo "<br /><br />";
        }
        echo "</ul>";
        mysqli_free_result($ans);
      }
    ?>
    <span class="message">
    <?php    
    if(isset($_SESSION['message'])){
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    }
    ?>
    </span>
</body>
</html>