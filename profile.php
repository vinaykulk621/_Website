<?php
session_start();

require("configuration/config.php");
require("configuration/auth.php");

// checks if the user is logged in by checking the session variable 'is_logged_in' and heads to the login page if not logged in
if (!User::isloggedin()) {
    header("Location: login.php");
}

// check if student has already applied for the fastrack exam aplication
$_SESSION['has_applied_for_fastrack'] = User::query_if_application_submitted_for_fastrack($con, $_SESSION['usn']);
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

                // $res has an array of student data that gets data from query_all() method 
                // query_all takes two input
                // 1-->connection to database
                // 2-->the usn of the student wich is stoed in the session variable 'usn'
                // the contents of the array is accessed by the column name
                $res = User::query_all($con, $_SESSION['usn']);

                echo
                '<p class="name_">' .
                    strtoupper($res->student_first_name) . ' ' .
                    strtoupper($res->student_middle_name) . ' ' .
                    strtoupper($res->student_last_name) .
                    '</p>' .

                    '<p class="usn_">' .
                    $res->usn .
                    '</p>' .

                    '<p class="email_">' .
                    $res->student_email .
                    '</p>' .

                    '<p class="branch_">' .
                    strtoupper(User::get_dept_name($res->department_name)) .
                    '</p>' .

                    '<p class="sem_"> SEMESTER: ' .
                    $res->sem .
                    '</p>';
                ?>

            </div>

        </div>


        <!-- results pallete-->
        <a href="./result.php" class="links_in_pallets">
            <div id="result" name="result">
                <h1 class="result_heading">YOUR RESULTS</h1>
                <img src="./images/results.png" alt="RESULTS" class="results_logo">
            </div>
        </a>


        <!-- Application form -->
        <a href="./applicationform.php" class="links_in_pallets">
            <div id="appl_form" name="appl_form">
                <h1>EXAM APPLICATION</h1>
                <img src="./images/application.png" alt="APPLICATION_FORM" class="application_logo">
            </div>
        </a>
    </div>

</body>

</html>