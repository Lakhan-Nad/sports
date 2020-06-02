<?php

require_once __DIR__ . "/Users.php";
require_once __DIR__ . "/utils.php";

if (forwardAuth()) {
    redirect("usermenu.php");
}

$message = "";

function newUser(array $userData)
{
    $validate = User::validate($userData);
    if ($validate["status"] !== true) {
        return $validate;
    }
    if (User::alreadyExists($userData["email"])) {
        return array("status" => false, "message" => "User with Same Email Already Exists");
    }
    if (User::insertData($userData)) {
        return array("status" => true, "message" => "User Created");
    } else {
        return array("status" => false, "message" => "User Not Created");
    }
}

if (isset($_POST["postUser"])) {

    unset($_POST["postUser"]);

    $data = newuser($_POST);

    if ($data["status"]) {
        session_start();
        $_SESSION["email"] = $_POST["email"];
        redirect("usermenu.php");
    } else {
        $message = $data["message"];
    }

} else if (isset($_POST["loginUser"])) {

    unset($_POST["loginUser"]);

    if (User::verifyUser($_POST["email"], $_POST["pass"])) {
        session_start();
        $_SESSION["email"] = $_POST["email"];
        redirect("usermenu.php");
    } else {
        if (User::alreadyExists($_POST["email"])) {
            $message = "Wrong Password";
        } else {
            $message = "User With Email Doesn't Exist";
        }
    }
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
                <form method="POST">
                    <input type="text" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="pass" id="loginpassword" />
                    <input type="button" onclick="passToText('loginpassword')" value="See/Hide Password" />
                    <input type="submit" name="loginUser" value="Login" class="submitbutton" />
                </form>
            </div>
            <div class="register-show">
                <h2>REGISTER</h2>
                <form method="POST">
                    <input type="text" placeholder="FirstName" name="firstName" maxlength="30" />
                    <input type="text" placeholder="LastName" name="lastName" maxlength="30" />
                    <input type="text" placeholder="Email" name="email" />
                    <input type="password" placeholder="Password" name="pass" id="regpassword" />
                    <input type="button" onclick="passToText('regpassword')" value="See/Hide Password" />
                    <input type="text" placeholder="Mobile" name="phone" maxlength="10" />
                    <input type="submit" name="postUser" value="Register" class="submitbutton" />
                </form>
            </div>
        </div>
    </div>
    <span class="message"><?=htmlentities($message)?></span>
    <script type="text/javascript" src="./public/javascript/loginjs.js"></script>
</body>

</html>