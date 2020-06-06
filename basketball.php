<?php

require_once __DIR__ . "/sportsData.php";
$sport        = "basketball";
$participants = findBySport($sport);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Basketball</title>
    <link rel="stylesheet" type="text/css" href="./public/css/sports.css" />
</head>

<body>
    <div class="head">
        <img src="./public/images/basketball.jpg" class="coverimg" alt="basketball" />
        <form action='register_sport.php' method='POST'>
            <input type='hidden' name='sport' value='basketball' />
            <input type='submit' value='REGISTER'>
        </form>
    </div>
    <div class="navdivs">
        <button class="navs selected" onclick="currentdisp(1)">About</button>
        <button class="navs" onclick="currentdisp(2)">Rules & Regulations</button>
        <button class="navs" onclick="currentdisp(3)">Participants</button>
    </div>
    <div class="items active">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                Basketball is a team sport in which two teams, most commonly of five players each,
                opposing one another on a rectangular court, compete with the primary objective of
                shooting a basketball (approximately 9.4 inches (24 cm) in diameter) through the
                defender's hoop (a basket 18 inches (46 cm) in diameter mounted 10 feet (3.048 m)
                high to a backboard at each end of the court) while preventing the opposing team from
                shooting through their own hoop. A field goal is worth two points, unless made from
                behind the three-point line, when it is worth three. After a foul, timed play stops
                and the player fouled or designated to shoot a technical foul is given one or more
                one-point free throws. The team with the most points at the end of the game wins, but
                if regulation play expires with the score tied, an additional period of play.
                Players advance the ball by bouncing it while walking or running (dribbling) or by
                passing it to a teammate, both of which require considerable skill. On offense, players
                may use a variety of shots—the lay-up, the jump shot, or a dunk; on defense, they may
                steal the ball from a dribbler, intercept passes, or block shots; either offense or
                defense may collect a rebound, that is, a missed shot that bounces from rim or backboard.
                It is a violation to lift or drag one's pivot foot without dribbling the ball, to carry
                it, or to hold the ball with both hands then resume dribbling.

            </p>
        </div>
    </div>
    <div class="items">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                1. The ball may be thrown in any direction with one or both hands.<br><br>
                2.The ball may be batted in any direction with one or both hands.<br><br>
                3. A player cannot run with the ball. The player must throw it from the spot on
                which he catches it, allowance to be made for a man who catches the ball when running
                at a good speed if he tries to stop.<br><br>
                4.The ball must be held in or between the hands; the arms or body must not be used for
                holding it.<br><br>
                5.No shouldering, holding, striking, pushing, or tripping in any way of an opponent.
                The first infringement of this rule by any person shall count as a foul; the second shall
                disqualify him until the next basket is made or, if there was evident intent to injure the
                person, for the whole of the game. No substitution shall be allowed.

            </p>
        </div>
    </div>
    <div class="items">
        <div class="content">
            <table id="t01">
                <tr>
                    <th>Email of Participant</th>
                </tr>
                <?php
foreach ($participants as $x) {
    echo "<tr><td>" . htmlentities($x["user"]) . "</td></tr>";
}
?>
            </table>
        </div>
    </div>
    <div class="footer"></div>
    <script type="text/javascript" src="./public/javascript/sports.js"></script>
</body>

</html>