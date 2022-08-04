<?php

require("configuration/auth.php");
require("configuration/config.php");

session_start();  //needed here and in index.php file 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (User::login($con, $_POST['email'], $_POST['username'], $_POST['usn'], $_POST['password'])) {
    $_SESSION['is_logged_in'] = true;
    header('Location: profile.php');
  } else {
    echo "ghandu";
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

<body class="bod" name="bod">

  <!--____________________login box start-->
  <div class="login_box">


    <!--login form-->
    <!-- action="profile.php"  onsubmit="return validateForm()"  -->
    <form name="login" method="post">

      <!--BMS logo-->
      <div id="logo">
        <a href="https://www.BMSCE.ac.in/"><img src="./images/1200px-BMS_College_of_Engineering.svg.png" alt="BMSCE" style="height: 45PX; width: 45px; float: left;">
        </a>
        <p>BMSCE</p>
      </div>


      <!--Email lable-->
      <label for="email" class="email">email-id</label>
      <!--Email input-->
      <input id="email" type="email" name="email" placeholder="Example@bmsce.ac.in" size="20px" autofocus>


      <!--username label-->
      <label for="username" class="username">username</label>
      <!--username input-->
      <input id="username" type="text" placeholder="Enter Username" size="20px" name="username">


      <!--USN label-->
      <label for="usn" class="usn">USN</label>
      <!--USN input-->
      <input id="usn" type="text" placeholder="1BM00XX001" name="usn" pattern="[0-9]{1}[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{3}">


      <!--password label-->
      <label for="password" class="password">password</label>
      <!--password input-->
      <input id="password" type="password" name="password" placeholder="Enter Password">


      <!--submit button-->
      <input class="button" type="submit">Submit</button>

    </form>

    <!--login box end-->
  </div>

</body>

</html>