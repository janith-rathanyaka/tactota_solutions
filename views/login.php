<?php require_once("../controller/authenitication.php");
 //session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Tactota Solutions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/x-icon" href="../public/images/logo.ico" />
<link href="../public/css/signup.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<div>
    <br/>
    <h1> Login/ SignIn</h1>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="main-container">
        <div class="sub-container">
            <div><img src="../public/images/logo.jpeg" alt="logo" class="verticle-center" width=400 height=auto/></div>
        </div>
        <div class="sub-container">
            <form action="../controller/authenitication.php?action=login" method="post">
                <label for='username' id='left-label'>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    &nbsp&nbspUsername *
                </label>
                <input id='username' class="text" type="text" name="username" required="">
                <label for='pswd1' id='left-label'>
                    <i class="fa fa-key" aria-hidden="true"></i>
                    &nbsp&nbspPassword *
                </label>
                <input id='pswd1' class="text" type="password" name="password" required="">
                <label for='forget' class="right"><a id='forget' href="forgetpassword.php">Forgot Password?</a></label>
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" >
                            <span>Remember me</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <input type="submit" value="LOGIN">
            </form>
            <label for='login' id='left-p'>Don't have an Account? <a id='login' href="register.php" style="font-size:1.3em;"> Register Now!</a></label>
        </div>
    </div>

    <div class="footer">
        <p>© Tactota Solutions All rights reserved </p>
    </div>
</div>
</body>

