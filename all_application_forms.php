<?php
session_start();

require("configuration/config.php");
require("configuration/auth.php");

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
    <link rel="stylesheet" href="./CSS/home.css">
    <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
    <link rel="stylesheet" href="./CSS/form.css">
    <link rel="stylesheet" href="./CSS/profile.css">
    <title>BMSCE</title>
</head>

<body>
    <!--header container-->
    <?php
    require_once("driver_code/header.php");
    ?>

    <!-- table of all the students who have applied for fastrack exam -->
    <?php

    // sql query to get all the data of the student
    $res = User::query_all_failed_students($con);

    // number of failed student
    $itteration = count($res);

    echo '<h1 class="_aplication_heading">ALL FASTRACK EXAM APPLICTIONS</h1>';
    echo '<table class="GeneratedTable">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>USN</th>';
    echo '<th>Course Code</th>';
    echo '<th>Course name</th>';
    echo '<th>Credits</th>';
    echo '<th>semester</th>';
    echo '</tr>';
    echo '</thead>';
    echo  '<tbody>';

    for ($i = 0; $i < $itteration; $i++) {

        // $course_id-->array of all failed courses
        $course_id = array_column($res, 'course_id');

        // $course_name-->array of all failed course name
        $course_name = array_column($res, 'course_name');

        // $credit-->array of all failed courses credits
        $credit = array_column($res, 'credit');

        // $sem-->array of all failed semester
        $sem = array_column($res, 'sem');

        // $usn-->array of all failed students usn
        $usn = array_column($res, 'usn');

        echo '<tr>';

        echo '<td class="_usn_">';
        echo $usn[$i];
        echo '</td>';

        echo '<td class="_cid_">';
        echo $course_id[$i];
        echo '</td>';

        echo '<td class="_cname_">';
        echo $course_name[$i];
        echo '</td>';

        echo '<td class="_credits_">';
        echo $credit[$i];
        echo '</td>';

        echo '<td class="_sem_">';
        echo $sem[$i];
        echo '</td>';

        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    ?>
</body>

</html>