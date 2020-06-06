<?php

require_once __DIR__ . "/sportsData.php";
$sport        = "hockey";
$participants = findBySport($sport);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hockey</title>
    <link rel="stylesheet" type="text/css" href="./public/css/sports.css" />
</head>

<body>
    <div class="head">
        <img src="./public/images/hockey.jpg" class="coverimg" alt="hockey" />

    </div>
    <div class="navdivs">
        <button class="navs selected" onclick="currentdisp(1)">About</button>
        <button class="navs" onclick="currentdisp(2)">Rules & Regulations</button>
        <button class="navs" onclick="currentdisp(3)">Participants</button>
    </div>
    <div class="items active">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                Hockey is a very famous sport and is known as the National Games of India. It is very helpful for
                us to play it regularly. It helps us to improve the body's stamina by providing good health.
                The person who plays this game needs to keep more effort and perseverance. It is a game played in
                the field and is usually preferred by the Indian youth. This is not very easy though, regular
                practice of this game can help a lot in becoming a winner.There are 11-11 players in both teams
                (forward 5), two are completely backwards (full back),3 short back (Half Full Back) and a round-keeper
                It is played in 35 minutes with two intervals of 5 or 10 minutes. This is a more interesting and fun
                game, which encourages viewers to easily see it.he game can be played on grass, watered turf, artificial
                turf or synthetic field, as well as an indoor boarded surface. Each team plays with ten field players
                and a goalkeeper. Players commonly use sticks made out of wood, carbon fibre, fibre glass or a
                combination
                of carbon fibre and fibre glass in different quantities (with the higher carbon fibre stick being more
                expensive and less likely to break) to hit a round, hard, plastic hockey ball. Whoever scores the most
                goals by the end of the match wins. If the score is tied at the end of the game, either a draw is
                declared
                or the game goes into extra time or a penalty shootout, depending on the competition's format. There are
                many variations to overtime play that depend on the league and tournament play.
            </p>
        </div>
    </div>
    <div class="items">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                1. Hockey players can only hit the ball with the flat side of their stick.
                <br><br>
                2.Hockey players (other than the goalkeeper) are not allowed to use their feet,
                or any other parts of the body, to control the ball at any time.
                <br><br>
                3.A goal can only be scored either from a field goal, a penalty corner, or from
                a penalty stroke. A field goal is a goal scored from open play, and can only be
                scored from inside the ‘striking circle’, in front of the opponent's goal. If the
                hockey ball is hit from outside the circle and goes into the goal, it does not
                count as a goal.
                <br><br>
                4.Hockey players may not trip, push, charge, interfere with, or physically handle an opponent
                in any way. Hockey is a non-contact sport and all fouls result in a free hit or a ‘penalty corner’
                for the non-offending team depending on where the infringement took place and the severity of the
                foul.<br>




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