<?php
session_start();

require("configuration/config.php");
require("configuration/auth.php");

if (!User::isloggedin()) {
  header("Location: login.php");
}
if (!$_SESSION['is_logged_in']) {
  header('Location: login.php');
}
if ($_SESSION['has_applied_for_fastrack'] && $_SESSION['is_logged_in']) {
  header('Location: applied_form.php');
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

  <div class="background">

    <!-- application form -->
    <form method="post" id="form">

      <!-- college_logo -->
      <div id="college_logo">
        <img src="./images/trans_bms_info.png" alt="BMSCE">
      </div>

      <h1 class="_aplication_heading">FASTRACK EXAM APPLICTION</h1>

      <!-- sql query to get all the data of the student -->
      <?php
      $res = User::query_all($con, $_SESSION['usn']);
      ?>

      <!-- input fields -->
      <div class="inputs">

        <!-- first_part_of_form -->
        <div class="name_of_student">

          <label for="Student First Name" class="fname">Student Name</label>

          <input disabled type="text" name="Student_first_name" id="fname" placeholder="First Name" <?php echo 'value = "' . $res->student_first_name . '"'; ?>>

          <input disabled type="text" name="Student_middle_name" id="mname" placeholder="Middle Name" <?php echo 'value = "' . $res->student_middle_name . '"'; ?>>

          <input disabled type="text" name="Student_ast_name" id="lname" placeholder="Last Name" <?php echo 'value = "' . $res->student_last_name . '"'; ?>>

        </div>

        <!-- second_part_of_form -->
        <div class="second_part_of_form">

          <div class="_email">
            <label for="E-mail" class="E-mail" required>E-Mail Id</label>
            <input disabled type="email" id="E-mail" name="E-mail" size="22" placeholder="student@gmail.com" <?php echo 'value = "' . $res->student_email . '"'; ?>>
          </div>

          <div class="_usn">
            <label for="fname" class="usn">USN:</label>
            <input disabled type="text" id="usn" name="usn" placeholder="USN" pattern="[0-9]{1}[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" <?php echo 'value = "' . $res->usn . '"'; ?> />
          </div>

        </div>

        <!-- third_part_of_form -->
        <div class="third_part_of_form">

          <div class="_sem">

            <!--semester-->
            <label for="semester" class="sem">Semester</label>
            <input disabled type="number" name="semester" min="1" max="8" class="sem" <?php echo 'value = "' . $res->sem . '"'; ?>>
          </div>

          <!-- section -->
          <div class="_section">
            <!--SECTION-->
            <label for="section" class="section">
              Section
              <span style="color: red;">*</span>
            </label>
            <input type="text" name="section" id="section" size="5" placeholder="Section" required />
          </div>


          <!-- department -->
          <div class="_department">
            <!-- department -->
            <label for="dept" class="department">Department</label>
            <input disabled type="text" style="height: 30px; width: 60px; text-align:center;" name="dept" <?php echo 'value = "' . $res->department_name . '"'; ?>>
          </div>
        </div>

        <!-- fourth_part_of_form -->
        <div class="fourth_part_of_form">

          <!-- academic year -->
          <div class="_academic_year">
            <!--academic year-->
            <label for="academic_year" class="academic">
              Academic year
              <span style="color: red;">*</span>
            </label>
            <input type="number" name="academic_year" value="2019" required id="academic" min="2019" max="2022" style="height: 30px; width: 90px; text-align:center;">
          </div>

          <div class="_dob">
            <label for="dob" class="dob">DOB</label>
            <input disabled type="date" id="dob" placeholder="DD/MM/YYYY" <?php echo 'value = "' . $res->dob . '"'; ?>required>
          </div>
        </div>

        <!-- table of all the courses failed or eligible to apply for the exam -->
        <?php
        // get all the semesters and exam name detail of the student
        $parentres = User::query_semester($con, $_SESSION['usn']);

        // converting the key data pair array to single array which has sem as its key
        $outputsem = array_column($parentres, 'sem');

        // counting how many semester has it been
        $ittr = count($outputsem);

        // get data of all the subject failed by the student
        // if the result is null then the student hasn't failed any subject
        $data_needed = User::query_all_failed_sub_irrespective_of_sem($con, $_SESSION["usn"]);

        if ($data_needed == NULL) {
          header('Location: applied_form.php');
        }

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
        echo '</tbody>';
        echo '</table>';
        ?>

      </div>

      <?php

      if ($flag != 1) {
        echo '<h1>YOU HAVE NO BACKLOGS</h1>';
      } else {

        // submit button
        echo '<div class="_button">';
        echo '<input type="submit" name="submit" value="submit" class="button">';
        echo '</div>';

        // checks if the submit button has pressed
        // if yes it pushes the application data into the database
        if (isset($_POST['submit']) == "POST") {

          // get data of all the subject failed by the student
          $data_set = User::query_all_failed_sub_irrespective_of_sem($con, $_SESSION["usn"]);

          // separating course_id of all the subject failed by the student
          $course_id = array_column($data_set, 'course_id');

          // assigning usn to a variable
          $usn = $_SESSION['usn'];

          // count how many he failed
          $failed_sub_count = count($data_set);

          // insert all the data of the failed subject into database
          for ($i = 0; $i < $failed_sub_count; $i++) {
            $sql = "INSERT INTO `aplication`(`usn`, `exam_name`, `course_id`) VALUES ('$usn','fastrack','$course_id[$i]')";
            $query = $con->prepare($sql);
            $query->execute();
          }
          $_SESSION['has_applied_for_fastrack'] = true;
          header('Location: applied_form.php');
        }
      }
      ?>
    </form>

  </div>

  <div class="end"></div>

  <div class="end">
    <a href="https://bmsce.ac.in/home" target="_blank" class="official">Visit official website</a>
    <h2 class="ends">&copy;BMSCE 2021-22</h2>
  </div>

</body>

</html>