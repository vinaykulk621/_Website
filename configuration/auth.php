<?php
require("configuration/config.php");

class User
{
    // public variable for idk what need
    // public $studentname, $emailid, $password, $usn;

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

    // function to retrieve all the course codes registered by the student
    public static function query_all_registrd_courses($con, $usn)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT c.course_name,e.course_id,c.credit,r.cie,r.see,r.total_marks,r.grade
            FROM enrolled e,course c,result r,student s
            WHERE e.usn='$usn' AND
            e.usn=r.usn AND
            e.course_id=c.course_id AND
            s.sem=c.sem";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }

    // function to retrieve the semester of the student 
    public static function query_semester($con, $usn)
    {
        if ($con) {
            $sql = " 
            SELECT DISTINCT r.sem
            FROM result r,student s
            WHERE e.usn='$usn'";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }

    // function to retrieve all the course names registered by the student
    public static function query_all_registrd_course_names($con, $usn)
    {
        if ($con) {
            $sql = "SELECT course.course_name
            FROM course,enrolled
            WHERE enrolled.usn='$usn' AND
            enrolled.course_id=course.course_id";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
            return $usr;
        }
    }


    // function to retrieve all the course names registered by the student
    public static function query_all_registrd_courses_credits($con, $usn)
    {
        if ($con) {
            $sql = "SELECT course.credit
            FROM course,enrolled
            WHERE enrolled.usn='$usn' AND
            enrolled.course_id=course.course_id";
            $query = $con->prepare($sql);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $query->execute();
        }
        if ($usr = $query->fetchAll()) {
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
