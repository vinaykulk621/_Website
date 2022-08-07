<?php
session_start();  //needed here and in index.php file 

require("configuration/auth.php");
require("configuration/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (User::login($con, $_POST['usn'], $_POST['email'], $_POST['password'])) {
    $_SESSION['is_logged_in'] = true;
    header("Location: profile.php");
  } else {
    echo '<script> alert("wrong credentials") </script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="./images/1200px-BMS_College_of_Engineering.svg.png">
  <link rel="stylesheet" href="./CSS/login.css">
  <script src="validate.js"></script>
  <title>BMSCE</title>
</head>

<body>

  <!--____________________login box start-->
  <div class="login_box">


    <!--login form-->
    <!-- onsubmit="return validateForm()" -->
    <form name="login" method="post">

      <!--BMS logo-->
      <div id="logo">
        <a href="https://www.BMSCE.ac.in/"><img src="./images/1200px-BMS_College_of_Engineering.svg.png" alt="BMSCE" style="height: 45PX; width: 45px;">
        </a>
        <p>BMSCE</p>
      </div>

      <!--USN label-->
      <label for="usn" class="usn">USN</label>
      <!--USN input-->
      <input id="usn" type="text" placeholder="1BM00XX001" name="usn" pattern="[0-9]{1}[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}" autofocus>


      <!--Email lable-->
      <label for="email" class="email">email-id</label>
      <!--Email input-->
      <input id="email" type="email" name="email" placeholder="Example@bmsce.ac.in" size="20px">


      <!--password label-->
      <label for="password" class="password">password</label>
      <!--password input-->
      <input id="password" type="password" name="password" placeholder="Enter Password">


      <!--submit button-->
      <input class="button" type="submit" value="Submit">

    </form>

    <!--login box end-->
  </div>

</body>

</html>