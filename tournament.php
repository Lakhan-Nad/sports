<?php
require_once __DIR__ . "/sportsData.php";
session_start();
$sports = findAllSport();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tournament</title>
    <link rel="stylesheet" type="text/css" href="./public/css/tCSS.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <!-- Slideshow container -->
    <div class="slideshow-container">
        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 7</div>
            <img src="./public/images/photo11.jpg" />
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 7</div>
            <img src="./public/images/photo22.jpg" />
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 7</div>
            <img src="./public/images/photo33.jpg" />
        </div>
        <div class="mySlides fade">
            <div class="numbertext">4 / 7</div>
            <img src="./public/images/photo44.jpg" />
        </div>
        <div class="mySlides fade">
            <div class="numbertext">5 / 7</div>
            <img src="./public/images/photo55.jpg" />
        </div>
        <div class="mySlides fade">
            <div class="numbertext">6 / 7</div>
            <img src="./public/images/photo66.jpg" />
        </div>
        <div class="mySlides fade">
            <div class="numbertext">7 / 7</div>
            <img src="./public/images/photo77.jpg" />
        </div>
        <div class="blurshow">
            <div class="content">
                <h1>TOURNAMENTS</h1>
                <p>
                    We have lots of sports categories available. You can apply for
                    multiple sports and register them. Create an account or Login to
                    view for various tournaments.
                </p>
                <br />
                <a href="register_tournament.php">REGISTER</a>
            </div>
            <div class="content2">
                <p>
                    S <br />
                    P <br />
                    O <br />
                    R <br />
                    T <br />
                    S <br />
                    <br />
                    2 <br />
                    0 <br />
                    2 <br />
                    0
                </p>
            </div>
        </div>
    </div>

    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
    <div class="tournaments">
        <?php if (count($sports) == 0) {
    echo "<h1>No Sports Available</h1>";

} else {
    foreach ($sports as $sport) {
        echo "<div class='flip-card'>";
        echo "<div class='flip-card-inner'>";
        echo "<div class='flip-card-front'>";
        echo "<img src=." . $sport["imgPath"] . " alt='Avatar' />";
        echo "</div>";
        echo "<div class='flip-card-back'>";
        echo "<h1>" . $sport["nameVal"] . "</h1>";
        echo "<p>Start Date: " . $sport["startDate"] . "</p>";
        echo "<p>End Date: " . $sport["endDate"] . "</p>";
        echo "<p>Venue: " . $sport["venue"] . "</p>";
        echo "<br />";
        echo "<a href=" . $sport["sportName"] . ".php" . ">View Details</a>";
        echo "<br /><br />";
        echo "<form action='register_sport.php' method='POST'>";
        echo "<input type='hidden' name='sport' value=" . $sport["sportName"] . " />";
        echo "<button type='submit'>Register Now</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}?>
    </div>
    <script src="./public/javascript/myScript.js"></script>
</body>

</html>