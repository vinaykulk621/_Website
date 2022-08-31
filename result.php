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
    <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
    <link rel="stylesheet" href="./CSS/profile.css">
    <title>BMSCE</title>
</head>

<body>

    <!--header container-->
    <?php
    require_once("driver_code/header.php");
    ?>

    <body>
        <br><br>
        <?php

        // get all the semesters and exam name detail of the student
        $parentres = User::query_semester($con, $_SESSION['usn']);

        // converting the key data pair array to single array which has sem as its key
        $outputsem = array_column($parentres, 'sem');

        // converting the key data pair array to single array which has exam_name as its key
        $outputexam = array_column($parentres, 'exam_name');

        // loop to create all the tables of the result sheet
        // the loop itterates over how many semester the student has completed
        $ittrt = count($outputsem);
        for ($i = 0; $i < $ittrt; $i++) :
        ?>
            <!-- semester an exam name  -->

            <h5 class="_heading">

                <!-- printing the semester -->
                <?php
                echo 'SEMESTER-' . $outputsem[$i] . ' ';
                echo strtoupper($outputexam[$i]) . ' EXAM';

                ?>
            </h5>

            <!-- result table -->
            <table class="GeneratedTable">

                <!-- head of the table -->
                <thead>
                    <tr>
                        <th colspan="7" class="name_usn">

                            <!-- to display the name of the student -->
                            <?php
                            $res = User::query_all($con, $_SESSION['usn']);

                            echo strtoupper($res->student_first_name) . ' ' .
                                strtoupper($res->student_middle_name) . '' .
                                strtoupper($res->student_last_name)
                            ?>

                            <!-- to display the usn of the student -->
                            (
                            <?php
                            echo $res->usn;
                            ?>
                            )
                        </th>
                    </tr>

                    <!-- column headings -->
                    <tr>
                        <th>Course Code</th>
                        <th>Course name</th>
                        <th>Credits</th>
                        <th>CIE</th>
                        <th>SEE</th>
                        <th>Total Marks</th>
                        <th>Grade</th>
                    </tr>

                </thead>

                <tbody>

                    <!-- To generate dynamic course codes enrolled by the student-->
                    <?php

                    // retrieve all data regarding the result of the student
                    $childres = User::query_all_registrd_courses($con, $_SESSION['usn'], $outputsem[$i]);

                    // retrieve all the registered course data
                    $registrd_crs = User::query_all_registrd_course_names($con, $_SESSION['usn'], $outputsem[$i]);

                    // to print all the data retrived
                    // each row entry is labled by  <tr>
                    // each column entry is labled by <td>

                    // itterate variable holds the number of subjects the student has enrolled to
                    $ittertation = count($registrd_crs);


                    // $course_id-->array of all enrolled courses
                    $course_id = array_column($childres, 'course_id');

                    // $course_name-->array of all enrolled course name
                    $course_name = array_column($registrd_crs, 'course_name');


                    // $credit-->array of all enrolled courses credits
                    $credit = array_column($childres, 'credit');


                    // $cie-->array of all enrolled courses cie marks
                    $cie = array_column($childres, 'cie');


                    // $see-->array of all enrolled courses see marks
                    $see = array_column($childres, 'see');


                    // $total_marks-->array of all enrolled courses toatal marks
                    $total_marks = array_column($childres, 'total_marks');

                    for ($j = 0; $j < $ittertation; $j++) {
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
                        echo $cie[$j];
                        echo '</td>';


                        echo '<td style="text-align:center;">';
                        echo $see[$j];
                        echo '</td>';


                        echo '<td style="text-align:center;">';
                        echo $total_marks[$j];
                        echo '</td>';


                        echo '<td style="text-align:center;">';
                        echo User::calculate_grade($total_marks[$j]);
                        echo '</td>';


                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
            <br><br><br>
        <?php
        endfor;
        ?>
    </body>

</html>