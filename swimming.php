<?php

require_once __DIR__ . "/sportsData.php";
$sport        = "swimming";
$participants = findBySport($sport);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Swimming</title>
    <link rel="stylesheet" type="text/css" href="./public/css/sports.css" />
</head>

<body>
    <div class="head">
        <img src="./public/images/swimming.jpg" class="coverimg" alt="football" />

    </div>
    <div class="navdivs">
        <button class="navs selected" onclick="currentdisp(1)">About</button>
        <button class="navs" onclick="currentdisp(2)">Rules & Regulations</button>
        <button class="navs" onclick="currentdisp(3)">Participants</button>
    </div>
    <div class="items active">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                Swimming is an individual or team racing sport that requires the use of one's entire
                body to move through water. The sport takes place in pools or open water.Competitive
                swimming is one of the most popular Olympic sports,with varied distance events
                in butterfly, backstroke, breaststroke, freestyle, and individual medley. In addition
                to these individual events, four swimmers can take part in either a freestyle or medley
                relay. A medley relay consists of four swimmers who will each swim a different stroke,
                ordered as backstroke, breaststroke, butterfly and freestyle.Swimming each stroke
                requires a set of specific techniques; in competition, there are distinct regulations
                concerning the acceptable form for each individual stroke. There are also regulations
                on what types of swimsuits, caps, jewelry and injury tape that are allowed at competitions.
                Although it is possible for competitive swimmers to incur several injuries from the sport,
                such as tendinitis in the shoulders or knees, there are also multiple health benefits associated
                with the sport.

            </p>
        </div>
    </div>
    <div class="items">
        <div class="content">
            <p style="text-align: justify; padding:80px;">
                1.Freestyle swimmers use an alternating arm action, an alternating leg action,
                and breath to the side.<br><br>
                2.Freestyle swimmers use a forward start off of a starting block. They might do a
                few dolphin kicks or fish-kicks off the start before they surface and begin to swim.<br><br>
                3.Freestylers do a flip turn at each wall. They might do a few dolphin kicks or fish-kicks
                off of each wall before they surface and begin to swim.<br><br>
                4.Freestylers finish the race by touching the wall with some part of their body, usually one
                hand.<br><br>
                5.During a freestyle swim, the swimmer's head must break the surface of the water at or before
                15-meters from the start and from each turn.<br><br>

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