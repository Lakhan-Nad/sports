<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location:" . "/usermenu.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login/Signup</title>
    <link rel="stylesheet" type="text/css" href="./public/css/t2CSS.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <span class="heading">SPORTS 2020</span>
    <div class="login-reg-panel">
        <div class="login-info-box">
            <h2>Have an account?</h2>
            <p>Login and register for sports now.</p>
            <label id="label-register" for="log-reg-show">Login</label>
            <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked" />
        </div>

        <div class="register-info-box">
            <h2>Don't have an account?</h2>
            <p>
                Register Now to participate in exciting sports and enhance your
                skills.
            </p>
            <label id="label-login" for="log-login-show">Register</label>
            <input type="radio" name="active-log-panel" id="log-login-show" />
        </div>

        <div class="white-panel">
            <div class="login-show">
                <h2>LOGIN</h2>
                <form method="POST" action="loginuser.php">
                    <input type="text" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="pass" id="loginpassword" />
                    <input type="button" onclick="passToText('loginpassword')" value="See/Hide Password" />
                    <input type="submit" value="Login" class="submitbutton" />
                </form>
            </div>
            <div class="register-show">
                <h2>REGISTER</h2>
                <form method="POST" action="postuser.php">
                    <input type="text" placeholder="FirstName" name="firstName" maxlength="30" />
                    <input type="text" placeholder="LastName" name="lastName" maxlength="30" />
                    <input type="text" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="pass" id="regpassword" />
                    <input type="button" onclick="passToText('regpassword')" value="See/Hide Password" />
                    <input type="text" placeholder="Mobile" name="phone" maxlength="10" />
                    <input type="submit" value="Register" class="submitbutton" />
                </form>
            </div>
        </div>
    </div>
    <span class="message">
        <?php
if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
    </span>
    <script type="text/javascript" src="./public/javascript/loginjs.js"></script>
</body>

</html>