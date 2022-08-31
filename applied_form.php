<?php
session_start();

require("configuration/config.php");
require("configuration/auth.php");

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

    <!-- table of all the courses failed or eligible to apply for the exam -->
    <?php
    // sql query to get all the data of the student
    $res = User::query_all($con, $_SESSION['usn']);

    // get all the semesters and exam name detail of the student
    $parentres = User::query_semester($con, $_SESSION['usn']);

    // converting the key data pair array to single array which has sem as its key
    $outputsem = array_column($parentres, 'sem');

    // counting how many semester has it been
    $ittr = count($outputsem);

    // get data of all the subject failed by the student
    // if the result is null then the student hasn't failed any subject
    $data_needed = User::query_all_failed_sub_irrespective_of_sem($con, $_SESSION["usn"]);
    if ($data_needed == NULL) { ?>
        <h1>HI <?php echo strtoupper($res->student_first_name); ?> DO NOT HAVE ANY BACKLOGS</h1>
    <?php
    } else {
        echo '<h1 class="_aplication_heading">FASTRACK EXAM APPLICTION SUCCESS</h1>';
        echo '<table class="GeneratedTable">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Course Code</th>';
        echo '<th>Course name</th>';
        echo '<th>Credits</th>';
        echo '<th>semester</th>';
        echo '</tr>';
        echo '</thead>';
        echo  '<tbody>';

        for ($i = 0; $i < $ittr; $i++) {
            // query number of failed subjects
            $itteration = User::query_course_id_of_failed_sub($con, $_SESSION['usn'], $outputsem[$i]);

            // counting how many courses the student has failed in
            $number_of_failed_sub = count($itteration);

            if ($number_of_failed_sub != 0) {
                // tell that there is atleast one subject in which student has failed with respect to the sem
                $flag = 1;

                for ($j = 0; $j < $number_of_failed_sub; $j++) {

                    // get all the failed subjects of the student
                    $res = User::query_all_failed_sub($con, $_SESSION['usn'], $outputsem[$i]);

                    // $course_id-->array of all enrolled courses
                    $course_id = array_column($res, 'course_id');

                    // $course_name-->array of all enrolled course name
                    $course_name = array_column($res, 'course_name');

                    // $credit-->array of all enrolled courses credits
                    $credit = array_column($res, 'credit');

                    // $credit-->array of all enrolled courses credits
                    $sem = array_column($res, 'sem');

                    echo '<tr>';

                    echo '<td style="text-align:center;">';
                    echo $course_id[$j];
                    echo '</td>';

                    echo '<td style="text-align:center;">';
                    echo $course_name[$j];
                    echo '</td>';

                    echo '<td style="text-align:center;">';
                    echo $credit[$j];
                    echo '</td>';

                    echo '<td style="text-align:center;">';
                    echo $sem[$j];
                    echo '</td>';

                    echo '</tr>';
                }
            }
        }
    }
    echo '</tbody>';
    echo '</table>';
    echo `
    <p style="display:flex;justify-content:center; font-size:20px; padding-top:20px;">The following exams schedule will be sent to your email and, you shall collect your hallticket from your department's office.</p>`;
    ?>
</body>

</html>