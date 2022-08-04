<?php

require_once("configuration/config.php");
require_once("configuration/auth.php");
require_once("driver_code/php/retrieval.php");

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
    <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
    <link rel="stylesheet" href="./CSS/profile.css">
    <title>BMSCE</title>
</head>

<body>

    <!--header container-->
    <?php require('driver_code/html/header.html'); ?>


    <div class="pallets">
        <!-- student info pallet -->
        <div id="profile_pallet" name="profile_pallet">

            <!-- // -->
            <!-- Place for image of the student -->
            <!-- // -->
            <!-- <?php
                    //         if (!profile) {
                    //             echo '';
                    //         } else {
                    //             //show profile
                    //         }
                    // 
                    ?> -->
            <!-- // -->
            <!-- Place for name of the student -->
            <!-- // -->
            <!-- <div id="name"></div> -->



            <div class="profile_image_container">
                <div class="profile_image">
                    <img src="./images/trans_profile_img-removebg-preview.png" alt="PROFILE_PHOTO" id="in_pallet_profile">
                </div>
            </div>

            <div class="name">
                <?php
                $res = usn_query($con);
                echo '<p class="name_">' . strtoupper($res['student_name']) . '</p>' . '<p class="usn_">' . $res['usn'] . '</p>';
                ?>
            </div>

        </div>


        <!-- results pallete-->
        <a href="./result.html" class="links_in_pallets">
            <div id="result" name="result">
                <h1 class="result_heading">YOUR RESULTS</h1>
                <img src="./images/results.png" alt="RESULTS" class="results_logo">
            </div>
        </a>


        <!-- Application form -->
        <a href="./form1.html" class="links_in_pallets">
            <div id="appl_form" name="appl_form">
                <h1>EXAM APPLICATION</h1>
                <img src="./images/application.png" alt="APPLICATION_FORM" class="application_logo">
            </div>
        </a>
    </div>

</body>

</html>