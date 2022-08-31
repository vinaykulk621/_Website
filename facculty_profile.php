<?php
session_start();

require("configuration/config.php");
require("configuration/auth.php");

// checks if the user is logged in by checking the session variable 'is_logged_in' and heads to the login page if not logged in
if (!User::isloggedin()) {
    header("Location: facculty_login.php");
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
    <?php require('driver_code/header.php'); ?>

    <div class="pallets">
        <!-- student info pallet -->
        <div id="profile_pallet" name="profile_pallet">

            <!-- the pallet that shows the information of the student -->
            <div class="name">

                <?php

                $res = User::query_all_facculty($con, $_SESSION['fid']);

                // change ot to show teacher deatils
                echo
                '<p class="name_">' .
                    strtoupper($res->facculty_name) . ' ' .
                    '</p>' .

                    '<p class="email_">' .
                    $res->facculty_email .
                    '</p>' .

                    '<p class="branch_">' .
                    strtoupper(User::get_dept_name($res->department_name)) .
                    '</p>' .

                    '<p class="usn_">' .
                    $res->fid .
                    '</p>';
                ?>
            </div>
        </div>


        <!-- results pallete-->
        <?php
        if ($_SESSION['fid'] != 'COE001') {
            echo '
            <a href="./facculty_class.php" class="links_in_pallets">
                <div id="result" name="result">
                    <h1 class="result_heading">YOUR CLASSES</h1>
                    <img src="./images/results.png" alt="RESULTS" class="results_logo">
                </div>
            </a>
            ';
        }
        ?>


        <!-- shows all the failed students subject details -->
        <?php
        if ($_SESSION['fid'] == 'COE001') {
            echo '
            <a href="./all_application_forms.php" class="links_in_pallets">
            <div id="appl_form" name="appl_form">
                <h1>EXAM APPLICATIONS</h1>
                <img src="./images/application.png" alt="APPLICATION_FORM" class="application_logo">
            </div>
            </a>
        ';
        } ?>

    </div>

</body>

</html>