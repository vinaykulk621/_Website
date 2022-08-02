<?php

require_once("configuration/config.php");
require_once("configuration/auth.php");

session_start();

if (!User::isloggedin()) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/images/1200px-BMS_College_of_Engineering.svg.png">
    <link rel="stylesheet" href="./CSS/profile.css">
    <title>BMSCE</title>
</head>

<body>

    <!--header container-->
    <?php require('driver_code/html/header.html'); ?>


    <!-- student info pallet -->
    <div id="profile_pallet" name="profile_pallet">

        <!-- Place for image of the student -->
        <img src="./images/trans_profile_img-removebg-preview.png" alt="PROFILE_PHOTO" id="in_pallet_profile">

        <!--Place for name of the student-->
        <div id="name"></div>

    </div>


    <!-- results pallete-->
    <a href="./result.html" style="color: black;">
        <div id="result" name="result">
            <h1>YOUR RESULTS</h1>
            <img src="./images/results.png" alt="RESULTS" class="results_logo">
        </div>
    </a>


    <!-- Application form -->
    <a href="./form1.html" style="color: black;">
        <div id="appl_form" name="appl_form">
            <h1>EXAM APPLICATION</h1>
            <img src="./images/application.png" alt="APPLICATION_FORM" class="application_logo">
        </div>
    </a>


    <!--Some bullshit-->
    <!-- <script>
        var nam = document.getElementsByClassName('username').value
        const result = document.getElementById('name')
        new URLSearchParams(window.location.search).forEach((value,
            name) => {
            result.append(`${value}`)
            result.append(document.createElement('br'))
        })
    </script> -->

</body>

</html>