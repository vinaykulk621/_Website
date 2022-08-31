<?php
session_start();

require_once("configuration/config.php");
require_once("configuration/auth.php");

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

    <form method="post">
        <!-- result table -->
        <br><br><br><br>
        <table class="GeneratedTable">

            <!-- head of the table -->
            <thead>
                <!-- column headings -->
                <tr>
                    <th>USN</th>
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

                <!-- To generate dynamic course codes handled by the facculty-->
                <?php


                // query to retrieve all the courses handled by the current logged in facculty to which students has registered 
                $enrolled_stud = User::query_all_handling_courses($con, $_SESSION['fid']);


                // number of students enrolled in the course handled by a certain facculty
                $ittertation = count($enrolled_stud);


                // to print all the data retrived
                // each row entry is labled by  <tr>
                // each column entry is labled by <td>

                // $course_id-->array of all course id enrolled by the student
                $course_id = array_column($enrolled_stud, 'course_id');


                // $course_name-->array of all course names enrolled by the student
                $course_name = array_column($enrolled_stud, 'course_name');


                // $credit-->array of credits of coyurses enrolled by the student
                $credit = array_column($enrolled_stud, 'credit');


                // $cie-->array of cie mark of all student enrolled in the course
                $cie_db = array_column($enrolled_stud, 'cie');


                // $see-->array of see mark of all student enrolled in the course
                $see_db = array_column($enrolled_stud, 'see');


                // $total_marks-->array of the total marks of student enrolled in the course
                $total_marks_db = array_column($enrolled_stud, 'total_marks');


                // $usn-->array of usn of all students enrolled in the course
                $usn = array_column($enrolled_stud, 'usn');

                for ($j = 0; $j < $ittertation; $j++) {
                    echo '<tr>';

                    echo '<td class="_usn_">';
                    echo $usn[$j];
                    echo '</td>';


                    echo '<td class="_cid_">';
                    echo $course_id[$j];
                    echo '</td>';


                    echo '<td class="_cname_">';
                    echo $course_name[$j];
                    echo '</td>';


                    echo '<td class="_credits_">';
                    echo $credit[$j];
                    echo '</td>';


                    echo '<td class="_cie_">';
                ?>
                    <input type="text" value="<?php echo $cie_db[$j] ?>" name='new_cie_marks[]' class="new_cie_">
                    <?php
                    echo '</td>';


                    echo '<td class="_see_">';
                    ?>
                    <input type="text" value="<?php echo $see_db[$j] ?>" name='new_see_marks[]' class="new_see_">
                <?php
                    echo '</td>';


                    echo '<td class="_total_">';
                    echo $total_marks_db[$j];
                    echo '</td>';


                    echo '<td class="_grade_">';
                    echo User::calculate_grade($total_marks_db[$j]);
                    echo '</td>';


                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="_update">
            <input type="submit" value="update" class="update_button" name="update_button">
        </div>

        <?php
        if (isset($_POST['update_button']) == "POST") {
            for (
                $i = 0;
                $i < $ittertation;
                $i++
            ) {
                $cie = $_POST['new_cie_marks'][$i];
                $see = $_POST['new_see_marks'][$i];
                $sql = "
                UPDATE result 
                SET cie = '$cie', see = '$see' 
                WHERE usn='$usn[$i]' AND 
                course_id='$course_id[$i]'";
                $query = $con->prepare($sql);
                $query->execute();
            }
        }
        ?>
    </form>

</body>

</html>