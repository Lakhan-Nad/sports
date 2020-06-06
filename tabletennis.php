<?php

require_once __DIR__ . "/sportsData.php";
$sport        = "tabletennis";
$participants = findBySport($sport);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tabletennis</title>
    <link rel="stylesheet" type="text/css" href="./public/css/sports.css" />
</head>

<body>
    <div class="head">
        <img src="./public/images/tt.jpg" class="coverimg" alt="football" />

    </div>
    <div class="navdivs">
        <button class="navs selected" onclick="currentdisp(1)">About</button>
        <button class="navs" onclick="currentdisp(2)">Rules & Regulations</button>
        <button class="navs" onclick="currentdisp(3)">Participants</button>
    </div>
    <div class="items active">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                Table tennis, also known as ping-pong and whiff-whaff, is a sport in which two or four players
                hit a lightweight ball back and forth across a table using small rackets. The game takes place
                on a hard table divided by a net. Except for the initial serve, the rules are generally as
                follows: players must allow a ball played toward them to bounce one time on their side of
                the table, and must return it so that it bounces on the opposite side at least once. A point
                is scored when a player fails to return the ball within the rules. Play is fast and demands
                quick reactions. Spinning the ball alters its trajectory and limits an opponent's options,
                giving the hitter a great advantage.Table tennis is governed by the worldwide organization
                International Table Tennis Federation (ITTF), founded in 1926. ITTF currently includes 226
                member associations.The table tennis official rules are specified in the ITTF handbook.
                Table tennis has been an Olympic sport since 1988, with several event categories. From 1988
                until 2004, these were men's singles, women's singles, men's doubles and women's doubles.
                Since 2008, a team event has been played instead of the doubles


            </p>
        </div>
    </div>
    <div class="items">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                1.The ball must first bounce on your side and then in your opponents. <br><br>
                2.Your opponent must allow the ball to hit their side of the table before
                trying to return this.<br><br>
                3.The ball must pass cleanly over the net – if it ‘clips’ the net and goes
                over, it is a ‘let’ and the serve is retaken. If it hits the net and doesn’t
                go over, the point goes to the other player/team. There are no second serves.<br><br>
                4.Service must be diagonal, from the right half court to the opponent’s right half court.
            </p>
        </div>
    </div>
    <div class="items">
        <div class="content">
            <table id="t01">
                <tr>
                    <th>Email of Participant</th>
                </tr>
                <tr>
                    <?php
foreach ($participants as $x) {
    echo "<td>" . htmlentities($x["user"]) . "</td>";
}
?>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer"></div>
    <script type="text/javascript" src="./public/javascript/sports.js"></script>
</body>

</html>