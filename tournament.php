<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Tournament</title>
    <!-- <link rel="stylesheet" type="text/css" href="./public/css/tCSS.css" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
      /* Slideshow container */
.slideshow-container {
  position: relative;
  margin: 0px;
}

/* Hide the images by default */
.mySlides {
  display: none;
  width: 100%;
  margin: 0px;
  padding: 0px;
}
body {
  background: rgba(0, 0, 0, 0.9);
  margin: 0px;
  padding: 0px;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #ffffff;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 10px;
  width: 10px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active,
.dot:hover {
  background-color: #717171;
}

.mySlides > img {
  height: 730px;
  width: 100%;
  margin: 0px;
  padding: 0px;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {
    opacity: 0.4;
  }
  to {
    opacity: 1;
  }
}

@keyframes fade {
  from {
    opacity: 0.4;
  }
  to {
    opacity: 1;
  }
}

.tournaments {
  max-width: 1000px;
  margin: auto;
}

.blurshow {
  width: 100%;
  height: 730px;
  background: rgba(0, 0, 0, 0.8);
  z-index: 2;
  position: absolute;
  left: 0px;
  top: 0px;
}
/* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
.flip-card {
  padding-left: 40px;
  padding-right: 40px;
  padding-top: 30px;
  padding-bottom: 30px;
  float: left;
  background-color: transparent;
  width: 400px;
  height: 300px;
  perspective: 1000px; /* Remove this if you don't want the 3D effect */
}

/* This container is needed to position the front and back side */
.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.8s;
  transform-style: preserve-3d;
}

/* Do an horizontal flip when you move the mouse over the flip box container */
.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

/* Position the front and back side */
.flip-card-front,
.flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

/* Style the front side (fallback if image is missing) */
.flip-card-front {
  background-color: #bbb;
  color: black;
}

/* Style the back side */
.flip-card-back {
  background: rgba(0, 0, 0, 0.6);
  color: white;
  transform: rotateY(180deg);
}

.flip-card-front > img {
  width: 100%;
  height: 100%;
}

.flip-card-back > a {
  text-decoration: none;
  color: white;
  padding: 5px;
  border: 1px solid white;
  border-radius: 10%;
}

.flip-card-back > a:hover {
  background-color: white;
  color: darkblue;
}

.flip-card-back > form > button {
  background:none;
  color: white;
  padding: 5px;
  border: 1px solid white;
  border-radius: 10%;
}

.flip-card-back > form > button:hover {
  background-color: white;
  color: darkblue;
}

.content > h1 {
  font-family: Impact, Haettenschweiler, "Arial Narrow Bold", sans-serif;
  font-size: 50px;
  color: white;
}

.content > h1:hover {
  color: yellow;
}

.content {
  width: 500px;
  top: 10%;
  position: absolute;
  left: 100px;
}

.content > p {
  color: white;
  font-size: medium;
  margin: 10px;
}

.content > a {
  background-color: rgba(238, 20, 35, 0.5);
  color: white;
  padding: 10px;
  border-radius: 5px;
  text-decoration: none;
  font-size: 20px;
}

.content > a:hover {
  color: rgba(238, 20, 35, 1);
  background: rgba(255, 255, 255);
}

.content2 {
  position: absolute;
  left: 100%;
  margin-left: -80px;
}
.content2 > p {
  font-size: 50px;
  color: white;
}
    </style>
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
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="./public/images/cricket.jpg" alt="Avatar" />
          </div>
          <div class="flip-card-back">
            <h1>Cricket</h1>
            <p>Start Date: 04-02-2020</p>
            <p>End Date: 10-02-2020</p>
            <p>Venue: Outdoor Stadium</p>
            <br />
            <a href="cricket.php">View Details</a>
            <br /><br />
            <form action="register_sport.php" method="POST">
              <input type="hidden" name="sport" value="cricket" />
              <button type="submit">Register Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="./public/images/football.jpg" alt="Avatar" />
          </div>
          <div class="flip-card-back">
            <h1>Football</h1>
            <p>Start Date: 04-02-2020</p>
            <p>End Date: 10-02-2020</p>
            <p>Venue: Football Stadium</p>
            <br />
            <a href="football.php">View Details</a>
            <br /><br />
            <form action="register_sport.php" method="POST">
              <input type="hidden" name="sport" value="football" />
              <button type="submit">Register Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="./public/images/tt.jpg" alt="Avatar" />
          </div>
          <div class="flip-card-back">
            <h1>Table Tennis</h1>
            <p>Start Date: 04-02-2020</p>
            <p>End Date: 10-02-2020</p>
            <p>Venue: Indoor Gym</p>
            <br />
            <a href="tabletennis.php">View Details</a>
            <br /><br />
            <form action="register_sport.php" method="POST">
              <input type="hidden" name="sport" value="tabletennis" />
              <button type="submit">Register Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="./public/images/hockey.jpg" alt="Avatar" />
          </div>
          <div class="flip-card-back">
            <h1>Hockey</h1>
            <p>Start Date: 04-02-2020</p>
            <p>End Date: 10-02-2020</p>
            <p>Venue: Outdoor Stadium</p>
            <br />
            <a href="hockey.php">View Details</a>
            <br /><br />
            <form action="register_sport.php" method="POST">
              <input type="hidden" name="sport" value="hockey" />
              <button type="submit">Register Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="./public/images/basketball.jpg" alt="Avatar" />
          </div>
          <div class="flip-card-back">
            <h1>Basketball</h1>
            <p>Start Date: 04-02-2020</p>
            <p>End Date: 10-02-2020</p>
            <p>Venue: VIT Basketball Court</p>
            <br />
            <a href="basketball.php">View Details</a>
            <br /><br />
            <form action="register_sport.php" method="POST">
              <input type="hidden" name="sport" value="basketball" />
              <button type="submit">Register Now</button>
            </form>
          </div>
        </div>
      </div>
      <div class="flip-card">
        <div class="flip-card-inner">
          <div class="flip-card-front">
            <img src="./public/images/swimming.jpg" alt="Avatar" />
          </div>
          <div class="flip-card-back">
            <h1>Swimming</h1>
            <p>Start Date: 04-02-2020</p>
            <p>End Date: 10-02-2020</p>
            <p>Venue: Hostel Swimming Pool</p>
            <br />
            <a href="swimming.php">View Details</a>
            <br /><br />
            <form action="register_sport.php" method="POST">
              <input type="hidden" name="sport" value="swimming" />
              <button type="submit">Register Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="./public/javascript/myScript.js"></script>
  </body>
</html>
