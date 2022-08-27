<?php
require_once("./configuration/auth.php");
?>


<div class="header">
    <!-- stylin' of the header -->
    <style>
        /* profile photo */
        #profile_photo {
            height: 60px;
            width: 60px;
            border-radius: 50%;
            padding: 5px 20px;
        }

        /* navigation bar */
        .navbar {
            border-top: 0px solid black;
            border-bottom: 1px black solid;
            box-shadow: 0px 8px 16px 0px rgb(0 0 0 / 20%),
                0px -1px 1px 0px rgb(88 81 81 / 41%);
            display: flex;
            align-items: center;
            justify-content: space-between;
            align-content: center;
            flex-wrap: wrap;
            flex-direction: row;
        }

        /* left_ones */
        .left_ones {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            margin: 0;
            align-content: center;
            flex-wrap: wrap;
            flex-direction: row;
        }

        /* navigation bar links */
        .navbar a {
            float: left;
            font-family: "IBM Plex Sans", sans-serif;
            font-size: 22px;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 14px 18px;
            text-decoration: none;
        }

        /* header sectoin */
        .header {
            background-color: #bdd4e7;
            background-image: linear-gradient(315deg, #bdd4e7 0%, #97aedd 74%);
        }

        /* first_row */
        .first_row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            flex-direction: row;
            align-items: center;
        }

        /* dropdown */
        .dropdown {
            float: left;
            font-family: "IBM Plex Sans", sans-serif;
            overflow: hidden;
        }

        /* dropdown carret*/
        .dropdown .dropbtn {
            font-size: 22px;
            border: none;
            box-shadow: 50px;
            font-family: "IBM Plex Sans", sans-serif;
            outline: none;
            color: rgb(0, 0, 0);
            padding: 14px 16px;
            background-color: inherit;
            margin: 0;
        }

        /* dropdown shit*/
        .dropdown-content a {
            float: none;
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-family: "IBM Plex Sans", sans-serif;
            font-size: 18px;
        }

        /* some navigation shit */
        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: black;
            border-radius: 50px, 50px, 0px, 0px;
            font-family: "IBM Plex Sans", sans-serif;
            transition: all 0.2s ease;
            color: red;
        }

        /* dropdown content bs */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgb(72, 67, 67);
            min-width: 160px;
            font-family: "IBM Plex Sans", sans-serif;
            z-index: 1;
        }

        /* dropdown content bs */
        .dropdown-content a:hover {
            background-color: black;
            font-size: 18px;
            transition: all 0.2s ease;
            font-family: "IBM Plex Sans", sans-serif;
        }

        /* dropdown content bs */
        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* home */
        .ho::after {
            content: "";
            background-color: rgb(28, 183, 240);
            width: 0px;
            height: 4px;
            border-radius: 4px;
            position: absolute;
            top: 111px;
            left: 50px;
            transform: translateX(-50%);
            transition: all 0.5s;
        }

        .ho:hover::after {
            width: 60px;
        }

        /* exams */
        .ji::after {
            content: "";
            background-color: rgb(28, 183, 240);
            width: 0px;
            height: 4px;
            border-radius: 4px;
            position: absolute;
            top: 111px;
            left: 264px;
            transform: translateX(-50%);
            transition: all 0.5s;
        }

        .ji:hover::after {
            width: 60px;
        }

        /* campus */
        .ni::after {
            content: "";
            background-color: rgb(28, 183, 240);
            width: 0px;
            height: 4px;
            border-radius: 4px;
            position: absolute;
            top: 111px;
            left: 155px;
            transform: translateX(-50%);
            transition: all 0.5s;
        }

        .ni:hover::after {
            width: 80px;
        }

        /* results */
        .oop::after {
            content: "";
            background-color: rgb(28, 183, 240);
            width: 0px;
            height: 4px;
            border-radius: 4px;
            position: absolute;
            top: 111px;
            left: 367px;
            transform: translateX(-50%);
            transition: all 0.5s;
        }

        .oop:hover::after {
            width: 75px;
        }
    </style>

    <div class="first_row">
        <!--bms logo-->
        <a href="./index.php">
            <img src="./images/trans_bms_info.png" alt="BMSCE" id="college_logo">
        </a>

        <!--top right profile photo-->
        <?php
        if (isset($_SESSION['usn'])) {
            echo '
            <a href="./profile.php">
            <img src="./images/trans_profile_img-removebg-preview.png" alt="PROFILE_PHOTO" id="profile_photo">
            </a>
            ';
        }
        else {
            echo '
            <a href="./facculty_profile.php">
            <img src="./images/trans_profile_img-removebg-preview.png" alt="PROFILE_PHOTO" id="profile_photo">
            </a>
            ';
        }
        ?>
    </div>

    <!--Navbar container-->
    <div class="navbar">

        <!-- left_side navigation tabs -->
        <div class="left_ones">

            <!--Navbar content-->
            <span class="ho"><a href="./index.php">Home</a></span>
            <span class="ni"><a href="./campus.php">Campus</a></span>

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
                    <span class="poo"><a href="./applicationform.php">FAST TRACK</a></span>
                    <!--dropdown content end-->
                </div>

                <!--dropdown container end-->
            </div>

            <span class="oop">
                <a href="./results.html">Results</a>
            </span>

        </div>

        <!-- right_side navigation tabs -->
        <div class="right_ones">

            <!-- shows the required button depending on the logged in or logged -->
            <?php
            if (User::isloggedin()) {
                echo '<a href="configuration/logout.php" style="float: right;">Logout</a>';
            } else {
                echo '<a href="./login.php" style="float: right;">Login</a>';
            }
            ?>

        </div>

        <!--Navbar container end-->
    </div>

    <!--header container end-->
</div>