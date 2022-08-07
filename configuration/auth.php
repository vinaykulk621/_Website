<?php
require("configuration/config.php");

class User
{
    // public variable for idk what need
    public $studentname, $emailid, $password, $usn;

    // function for checking the credential of the uer
    public static function login($con,  $usn, $email, $password)
    {
        // sql statement for retrieving data of the student
        $sql = "SELECT * 
        FROM student 
        WHERE usn=:usn";

        // prepare the sql statement
        $query = $con->prepare($sql);

        // binds the value of usn 
        $query->bindValue(':usn', $usn, PDO::PARAM_STR);

        // it tells php to return the data as an object of class user
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');

        // this statement return a boolean value
        $query->execute();

        // if the returned value is true i.e; there exist a row which has usn same as the usn entered by the user  
        if ($user = $query->fetch()) {

            // check the returned value from the database with the entered value
            if ($user->usn == $usn && $user->student_email == $email && $user->password == $password) {
                // if the user is authenticated then return true
                return true;
            }
        }

        // return false if any of the condition above fails to satisfy
        return false;
    }

    // function to retrieve all the info about
    public static function query_all($con, $usn)
    {
        if ($con) {
            $sql = "SELECT * FROM `student` WHERE usn=:usn";
            $query = $con->prepare($sql);
            $query->bindValue(':usn', $usn, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $query->execute();
        }
        if ($usr = $query->fetch()) {
            return $usr;
        }
    }

    // function to check if the user is logged in
    public static function isloggedin()
    {
        if (isset($_SESSION['is_logged_in'])  && $_SESSION['is_logged_in']) {
            return true;
        }
        return false;
    }
}
