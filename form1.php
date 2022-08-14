<?php
session_start();
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
  require_once("driver_code/html/header.php");
  ?>

  <div class="background">

    <!-- application form -->
    <form method="post" id="form">

      <!-- college_logo -->
      <div id="college_logo">
        <img src="./images/trans_bms_info.png" alt="BMSCE">
      </div>

      <h5>STUDENT INFORMATION</h5>

      <!-- sql query to get all the data of the student -->
      <?php
      $res = User::query_all($con, $_SESSION['usn']);
      ?>

      <!-- input fields -->
      <div class="inputs">

        <!-- first_part_of_form -->
        <div class="name_of_student">

          <label for="Student First Name" class="fname">Student Name</label>

          <input type="text" name="Student_first_name" id="fname" placeholder="First Name" <?php echo 'value = "' . $res->student_first_name . '"'; ?> required>

          <input type="text" id="mname" name="Student_middle_name" placeholder="Middle Name" <?php echo 'value = "' . $res->student_middle_name . '"'; ?>>

          <input type="text" required id="lname" name="Student_ast_name" placeholder="Last Name" <?php echo 'value = "' . $res->student_last_name . '"'; ?>>

        </div>

        <!-- second_part_of_form -->
        <div class="second_part_of_form">

          <div class="_dob">
            <label for="dob" class="dob">DOB</label>
            <input type="date" id="dob" placeholder="DD/MM/YYYY" <?php echo 'value = "' . $res->dob . '"'; ?>required>
          </div>

          <div class="_email">
            <label for="E-mail" class="E-mail" required>E-Mail Id</label>
            <input type="email" id="E-mail" name="Student's E-mail" size="22" placeholder="student@gmail.com" <?php echo 'value = "' . $res->student_email . '"'; ?> required>
          </div>

          <div class="_sem">

            <!--semester-->
            <label for="semester" class="sem">Semester</label>
            <select name="sem" id="sem" style="height: 30px;" required>
              <option value="">
                <?php echo  $res->sem; ?>
              </option>
              <option value="">1</option>
              <option value="">2</option>
              <option value="">3</option>
              <option value="">4</option>
              <option value="">5</option>
              <option value="">6</option>
              <option value="">7</option>
              <option value="">9</option>
            </select>
          </div>

        </div>

        <!-- third_part_of_form -->
        <div class="third_part_of_form">

          <!-- department -->
          <div class="_department">
            <!-- department -->
            <label for="dept" class="department">Department</label>
            <select style="height: 30px; width: 100px;" name="dept" required>
              <option value="Department">
                <?php
                echo $res->department_name;
                ?>
              </option>
              <option value="AEROSPACE">AE</option>
              <option value="Mechanical">ME</option>
              <option value="computer science">CSE</option>
              <option value="Civil">CE</option>
              <option value="ELECTRICAL">EEE</option>
              <option value="INFORMATION">ISE</option>
              <option value="Electronics">ECE</option>
              <option value="Artificial intelligence">AI</option>
              <option value="machine learning">ML</option>
            </select>
          </div>

          <!-- section -->
          <div class="_section">
            <!--SECTION-->
            <label for="section" class="section">Section:</label>
            <input type="text" name="section" id="section" size="5" placeholder="Section" required />
          </div>

          <!-- academic year -->
          <div class="_academic_year">
            <!--academic year-->
            <label for="academic_year" class="academic">Academic year:</label>
            <input type="number" name="academic_year" value="2019" required id="academic" min="2019" max="2022" style="height: 30px; width: 90px;">
          </div>

        </div>


        <!-- table of all the courses failed or eligible to apply for the exam -->
        <?php
        $res = User::query_all_failed_sub($con, $_SESSION['usn']);
        $output = User::query_numder_of_failed_sub($con, $_SESSION['usn']);
        if (!empty($output)) {

          echo '<table class="GeneratedTable">';

          echo '<thead>';
          echo '<tr>';
          echo '<th>Course Code</th>';
          echo '<th>Course name</th>';
          echo '<th>Credits</th>';
          echo '</tr>';
          echo '</thead>';
          echo  '<tbody>';

          // counting the number of itterations 
          $itteration = count($output);

          // $course_id-->array of all enrolled courses
          $course_id = array_column($res, 'course_id');

          // $course_name-->array of all enrolled course name
          $course_name = array_column($res, 'course_name');

          // $credit-->array of all enrolled courses credits
          $credit = array_column($res, 'credit');

          for ($i = 0; $i < $itteration; $i++) {
            echo '<tr>';


            echo '<td>';
            echo $course_id[$i];
            echo '</td>';


            echo '<td>';
            echo $course_name[$i];
            echo '</td>';


            echo '<td>';
            echo $credit[$i];
            echo '</td>';

            echo '</tr>';
          }

          echo '<!-- submit button -->';
          echo '<div class="_button">';
          echo '<input type="submit" value="submit" class="button">';
          echo '</div>';
        } else {
          echo '<h1>YOU ARE NOT ELIGIBLE FOR ANY MAKEUP EXAM</h1>';
          // echo '<br>';
          // echo '<h1>OR</h1>';
          // echo '<br>';
          echo '<h1>YOU DO NOT HAVE ANY BACKLOGS</h1>';
        }
        ?>
        </tbody>
        </table>

      </div>

    </form>

  </div>

  <div class="end"></div>

  <div class="end">
    <a href="https://bmsce.ac.in/home" target="_blank" class="official">Visit official website</a>
    <h2 class="ends">&copy;BMSCE 2021-22</h2>
  </div>

</body>

</html>