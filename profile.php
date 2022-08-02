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
    <div class="header" id="header">

        <!--bms logo-->
        <a href="./index.html">
            <img src="./images/trans_bms_info.png" alt="BMSCE" id="college_logo">
        </a>

        <!--top right profile photo-->
        <a href="./profile.html">
            <img src="./images/trans_profile_img-removebg-preview.png" alt="PROFILE_PHOTO" id="profile_photo">
        </a>

        <!--Navbar container-->
        <div class="navbar">

            <!--Navbar content-->
            <span class="ho"><a href="./index.html">Home</a></span>
            <span class="ni"><a href="./campus.html">Campus</a></span>

            <!--dropdown container-->
            <div class="dropdown">

                <!--dropdown button-->
                <span class="ji">
                    <button class="dropbtn">
                        Exams
                        <i class="fa fa-caret-down"></i>
                    </button>
                </span>

                <!--dropdown content-->
                <div class="dropdown-content">
                    <span class="hoo"><a href="form1.html">REGULAR</a></li></span>
                    <span class="joo"><a href="form1.html">RE-REGISTER</a></li></span>
                    <span class="poo"><a href="form_fast.html">FAST TRACK</a></span>
                    <span class="ioo"><a href="https://gate.iitkgp.ac.in/" target="_blank">GATE</a></span>
                    <span class="loo">
                        <a href="https://iimcat.ac.in/per/g01/pub/756/ASM/WebPortal/1/index.html?756@@1@@1" target="_blank">CAT</a>
                    </span>

                    <!--dropdown content end-->
                </div>

                <!--dropdown container end-->
            </div>

            <span class="oop">
                <a href="./results.html">Results</a>
            </span>

            <!-- shows the required button depending on the logged in or logged -->
            <?php
            if (User::isloggedin()) {
                echo '<a href="configuration/logout.php" style="float: right;">Logout</a>';
            } else {
                echo '<a href="./login.php" style="float: right;">Login</a>';
            }
            ?>

            <!--Navbar container end-->
        </div>

        <!--header container end-->
    </div>


    student info pallet
    <div id="profile_pallet" name="profile_pallet">

    <!-- Place for image of the student -->
    <img src="./images/trans_profile_img-removebg-preview.png" alt="PROFILE_PHOTO" id="in_pallet_profile">

    <!--Place for name of the student-->
    <div id="name"></div>

    <!-- <?php
    if ($con) {
        $query = "SELECT `usn`, `student_email`, `student_name`, `branch_name` FROM `student` WHERE `usn`='1BM20CS001'";
        $res = $con->query($query);
    }
    if ($res) {
        while ($array = $res->fetch(PDO::FETCH_OBJ)) {
            echo '
        <h1>' . $array->usn . '</h1>
        <h1>' . $array->student_email . '</h1>
        <h1>' . $array->student_name . '</h1>
        <h1>' . $array->branch_name . '</h1>
        ';
        }
    } else {
        echo 'Data not found';
    }
    ?> -->


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