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
      $rs = mysqli_query($conn,"select * from faq");
      if(!$rs or mysqli_num_rows($rs)==0){
        echo "<h3>"."NO QUESTIONS TO BE ANSWERED"."</h3>";
      }
      else{
          echo "<ol>";
        while($obj = mysqli_fetch_object($rs)){
          $value;
          $submitName;
          if(!$obj->answer){
            $value = "";
            $submitName = "Submit Answer";
          }
          else{
            $value = $obj->answer;
            $submitName = "Save Changes";
          }
          echo "<li>".$obj->question."</li>";
          echo "<br />";
          echo "<form method='POST' action='answerpost.php'>";
          echo "<input type='hidden' name='question' value='$obj->question' />";
          echo "<textarea name='answer'>$value</textarea><br />";
          echo "<input type='submit' value='$submitName' />";
          echo "</form>";
          echo "<form method='POST' action='deletequestion.php'>";
          echo "<input type='hidden' name='question' value='$obj->question' />";
          echo "<input type='submit' value='Delete This Question' />";
          echo "</form>";
          echo '<br />';
        }
        echo "</ol>";
        mysqli_free_result($rs);
        mysqli_close($conn);
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