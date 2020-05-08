<?php
session_start();
if (isset($_SESSION['email'])) {
    header("Location: /OSP%20Project/sports/usermenu.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login/Signup</title>
    <!-- <link rel="stylesheet" type="text/css" href="./public/css/t2CSS.css" /> -->
    <style>
    body {
        font-family: sans-serif;
        background: rgba(0, 0, 0, 0.9);
        margin: 0px;
        padding: 0px;
    }

    a {
        text-decoration: none;
        color: #444444;
    }

    .login-reg-panel {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        width: 70%;
        right: 0;
        left: 0;
        margin: auto;
        height: 500px;
        background-color: rgba(236, 48, 20, 0.9);
    }

    .white-panel {
        background-color: rgba(255, 255, 255, 1);
        height: 600px;
        position: absolute;
        top: -50px;
        width: 50%;
        right: calc(50% - 50px);
        transition: 0.3s ease-in-out;
        z-index: 0;
        box-shadow: 0 0 15px 9px black;
    }

    .login-reg-panel input[type="radio"] {
        position: relative;
        display: none;
    }

    .login-reg-panel {
        color: #b8b8b8;
    }

    .login-reg-panel #label-login,
    .login-reg-panel #label-register {
        border: 1px solid #9e9e9e;
        padding: 5px 5px;
        width: 150px;
        display: block;
        text-align: center;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 18px;
    }

    .login-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        left: 0;
        position: absolute;
        text-align: left;
    }

    .register-info-box {
        width: 30%;
        padding: 0 50px;
        top: 20%;
        right: 0;
        position: absolute;
        text-align: left;
    }

    .right-log {
        right: 50px !important;
    }

    .login-show,
    .register-show {
        z-index: 1;
        display: none;
        opacity: 0;
        transition: 0.3s ease-in-out;
        color: #242424;
        text-align: left;
        padding: 50px;
    }

    .show-log-panel {
        display: block;
        opacity: 0.9;
    }

    .login-show input[type="text"],
    .login-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #b5b5b5;
        outline: none;
    }

    .login-show a {
        display: inline-block;
        padding: 10px 0;
    }

    .register-show input[type="text"],
    .register-show input[type="password"] {
        width: 100%;
        display: block;
        margin: 20px 0;
        padding: 15px;
        border: 1px solid #b5b5b5;
        outline: none;
    }

    .submitbutton {
        max-width: 150px;
        width: 100%;
        background: #444444;
        color: #f9f9f9;
        border: none;
        padding: 10px;
        text-transform: uppercase;
        border-radius: 2px;
        float: right;
        cursor: pointer;
    }

    .message {
        width: 100%;
        position: absolute;
        bottom: 10px;
        display: block;
        text-align: center;
        font-size: 20px;
        font-weight: 5px;
        color: white;
        margin: 0px;
    }

    .heading {
        width: 100%;
        position: absolute;
        top: 10px;
        display: block;
        text-align: center;
        font-size: 40px;
        font-weight: 5px;
        color: white;
        margin: 0px;
        text-decoration: underline;
    }
    </style>
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