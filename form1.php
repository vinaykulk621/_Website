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
  <title>BMSCE</title>
</head>

<body>


  <!--header container-->
  <?php
  require_once("driver_code/html/header.php");
  ?>

  <div class="background">
    <form method="post" action="accept.html" id="form">
      <img src="./images/trans_bms_info.png" alt="BMSCE" id="college_logo">
      <h5>STUDENT INFORMATION</h5>
      <?php
      $res = User::query_all($con, $_SESSION['usn']);
      // var_dump($res);
      ?>

      <div class="inputs">
        <label for="Student First Name" class="fname">Student Name</label">
          <input type="text" name="Student_first_name" id="fname" placeholder="First Name" required <?php
                                                                                                    echo 'value = "' . $res->student_first_name . '"';
                                                                                                    ?>>
          <input type="text" id="mname" name="Student_middle_name" placeholder="Middle Name" <?php
                                                                                              echo 'value = "' . $res->student_middle_name . '"';
                                                                                              ?>>
          <input type="text" required id="lname" name="Student_ast_name" placeholder="Last Name" <?php
                                                                                                  echo 'value = "' . $res->student_last_name . '"';
                                                                                                  ?>>

          <br>


          <label for="dob" class="dob">DOB</label>
          <input type="date" id="dob" placeholder="DD/MM/YYYY" <?php
                                                                echo 'value = "' . $res->dob . '"';
                                                                ?>required>

          <label for="E-mail" class="E-mail" required>E-Mail Id</label>
          <input type="email" id="E-mail" name="Student's E-mail" size="22" placeholder="student@gmail.com" <?php
                                                                                                            echo 'value = "' . $res->student_email . '"';
                                                                                                            ?> required>

          <label class="department" style="margin-left: 20px;">Department</label>
          <!--DEPARTMENT input-->
          <select style="height: 30px; width: 100px;" required>
            <option value="Department">Select</option>
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


          <!--SECTION label-->
          <label for="section" class="section">Section:</label>
          <!--SECTION input-->
          <input type="text" name="section" id="section" size="5" placeholder="Section" required />


          <!--academic year label-->
          <label for="academic year" class="academic" style="margin-left: 40px;">Academic year:</label>
          <!--academic year input-->
          <input type="number" value="2019" required name="acd year" id="academic" size="1" style="height: 30px; width: 90px;">

          <!--semester label-->
          <label for="semester" style="margin-left: 40px; font-size: 22px;">Semester</label>
          <!--semester input-->
          <select name="sem" id="sem" style="height: 30px;" required>
            <option value="">Select</option>
            <option value="">I</option>
            <option value="">II</option>
            <option value="">III</option>
            <option value="">IV</option>
            <option value="">V</option>
            <option value="">VI</option>
            <option value="">VII</option>
            <option value="">VIII</option>
          </select>



          <input type="submit" value="submit" class="button">
      </div>
    </form>
  </div>
  <div class="end">
  </div>
  <div class="end">
    <a href="https://bmsce.ac.in/home" target="_blank" class="official" type="submit">Visit official website</a>
    <h2 class="ends">&copy;BMSCE 2021-22</h2>
  </div>
</body>

</html>