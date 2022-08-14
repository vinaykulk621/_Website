<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
    <link rel="stylesheet" href="./CSS/profile.css">
    <script src="validate.js">
        getCorrectGrade();
    </script>
    <title>BMSCE</title>
</head>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/home.css">
    <title>BMSCE</title>
</head>

<body>

    <!--header container-->
    <?php
    require_once("driver_code/html/header.php");
    ?>

    <body>
        <?php
        // get all the semester detail of the student
        $parentres = User::query_semester($con, $_SESSION['usn']);
        $key='sem';
        $key1='exam_name';
        $output = array_column($parentres, $key);
        $outputexam = array_column($parentres, $key);
        // var_dump($output);
        foreach ($output as $output => $pare) :
        ?>
            <h5 class="_heading">
                <!-- printing the semester -->
                <?php
                echo 'SEMESTER :' . $pare;
                ?>

                <!-- printing type of exam the result is for -->
                <!-- <?php

                ?> -->
            </h5>

            <table class="GeneratedTable">
                <thead>
                    <tr>
                        <th colspan="7">Student Name :

                            <!-- to display the name of the student -->
                            <?php
                            $res = User::query_all($con, $_SESSION['usn']);

                            echo
                            strtoupper($res->student_first_name) . ' ' .
                                strtoupper($res->student_middle_name) . '' .
                                strtoupper($res->student_last_name)
                            ?>

                            USN:

                            <!-- to display the usn of the student -->
                            <?php
                            echo $res->usn;
                            ?>

                        </th>
                    </tr>
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
                    $childres = User::query_all_registrd_courses($con, $_SESSION['usn'], $pare);

                    // to print all the data retrived
                    // each row entry is labled by  <tr>
                    // each column entry is labled by <td>
                    // each column data is accessed by the column name
                    foreach ($childres as $childres) {
                        echo '<tr>';


                        echo '<td>';
                        echo $childres['course_id'];
                        echo '</td>';


                        echo '<td>';
                        echo $childres['course_name'];
                        echo '</td>';


                        echo '<td>';
                        echo $childres['credit'];
                        echo '</td>';


                        echo '<td>';
                        echo $childres['cie'];
                        echo '</td>';


                        echo '<td>';
                        echo $childres['see'];
                        echo '</td>';


                        echo '<td>';
                        echo $childres['total_marks'];
                        echo '</td>';


                        echo '<td>';
                        echo $childres['grade'];
                        echo '</td>';


                        echo '</tr>';
                    }

                    ?>
                </tbody>
            </table>

        <?php
        endforeach;
        ?>
        <p>Note: This is a computer generated Statement of Marks for information of the candidate.</p>
    </body>

</html>