<?php
session_start();       //needed here and in index.php file 

require("configuration/auth.php");
require("configuration/config.php");

if (User::isloggedin()) {
    header('Location: facculty_profile.php');
}


// checks if the login button has pressed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    //checks if the credentials put by user is legitmate or not
    if (User::facculty_login($con, $_POST['facculty_id'], $_POST['email'], $_POST['password'])) {
        
        // if the user input is legitmate the session variable 'is_logged_in' set to true
        $_SESSION['is_logged_in'] = true;

        
        // for access of all the information across all the pages we initialize the session variable with the fid of the user
        $_SESSION['fid'] = $_POST['facculty_id'];


        // head to the profile page
        header("Location: facculty_profile.php");
    } else {

        // alert if the credentials are wrong
        echo '<script> alert("wrong credentials") </script>';
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

            <!--Facculty ID label-->
            <label for="facculty_id" class="usn">FACCULTY ID</label>
            <!--USN input-->
            <input id="usn" type="text" placeholder="CSEXXX" name="facculty_id" pattern="[A-Z]{3}[0-9]{3}" autofocus>


            <!--Email lable-->
            <label for="email" class="email">email-id</label>
            <!--Email input-->
            <input id="email" type="email" name="email" placeholder="Example@bmsce.ac.in" size="20px" autofocus>


            <!--password label-->
            <label for="password" class="password">password</label>
            <!--password input-->
            <input id="password" type="password" name="password" placeholder="Enter Password" autofocus>



            <!-- facculty_login and change password place -->
            <div class="last_part">

                <!-- facculty login option -->
                <a href="./login.php" class="_facculty_login">Students Login</a>

            </div>


            <!--submit button-->
            <input class="button" type="submit" value="Submit">

        </form>

        <!--login box end-->
    </div>

</body>

</html>