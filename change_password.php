<?php
session_start();       //needed here and in index.php file 

require("configuration/auth.php");
require("configuration/config.php");

// checks if the login button has pressed
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //checks if the credentials put by user is legitmate or not
    if (User::check_password($con, $_POST['usn'], $_POST['old_password'])) {

        // change the password
        User::change_password($con, $_POST['usn'], $_POST['new_password']);

        // tell the user that his password has been successfully changed
        echo '<script>alert(' . 'YOUR PASSWORD HAS BEEN CHANGED SUCCESSFULLY' . ');</script>';

        // head to the profile page
        header("Location: profile.php");
    } else {

        // alert if the credentials are wrong
        echo '<script> alert("COULD NOT CHANGE PASSWORD")</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
    <link rel="stylesheet" href="./CSS/login.css">
    <script src="validate.js"></script>
    <title>BMSCE</title>
</head>

<body>

    <!--____________________login box start-->
    <div class="login_box">


        <!--login form-->

        <!-- onsubmit="return validateForm()" -->
        <!-- no need of action attribute since we are processing the form in this page -->
        <form name="login" method="post">

            <!--BMS logo-->
            <div id="logo">
                <a href="https://www.BMSCE.ac.in/"><img src="./images/1200px-BMS_College_of_Engineering.svg.png" alt="BMSCE" style="height: 45PX; width: 45px;">
                </a>
                <p>BMSCE</p>
            </div>

            <!--USN label-->
            <label for="usn" class="usn">USN</label>
            <!--USN input-->
            <input id="usn" type="text" placeholder="1BM00XX001" name="usn" pattern="[0-9]{1}[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" autofocus>


            <!--Old Password label-->
            <label for="old_password" class="old_password">OLD PASSWORD</label>
            <!--Old Password input-->
            <input id="usn" type="password" placeholder="old password" name="old_password" autofocus>


            <!--new password lable-->
            <label for="new_password" class="old_password">NEW PASSWORD</label>
            <!--new password input-->
            <input id="email" type="password" placeholder="new password" name="new_password" size="20px" autofocus>


            <!-- back to login link -->
            <div class="last_part">
                <a href="./login.php" class="_facculty_login">Student Login</a>
                <a href="./facculty_login.php" class="_facculty_login">Facculty Login</a>
            </div>


            <!--submit button-->
            <input class="button" type="submit" value="Submit">


        </form>

        <!--login box end-->
    </div>

</body>

</html>