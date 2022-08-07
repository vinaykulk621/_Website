<?php
// session_start();

require("configuration/config.php");

class User
{
    public static $studentname, $emailid, $password, $usn;
    public static function query_all($con, $usn)
    {
        if ($con) {
            $sql = "SELECT * FROM `student` WHERE usn=:usn";
            $query = $con->prepare($sql);
            $query->bindValue(':usn', $usn, PDO::PARAM_STR);
            $query->setFetchMode(PDO::FETCH_CLASS, 'User');
            $query->execute();
        }
        if ($user = $query->fetch()) {
            $res = array("$user->usn", "$user->student_name", "$user->student_email",  "$user->branch_name");
            return $res;
        }
    }
    public static function isloggedin()
    {
        if (isset($_SESSION['is_logged_in'])  && $_SESSION['is_logged_in']) {
            return true;
        }
        return false;
    }

    public static function login($con,  $usn, $email, $password)
    {
        $sql = "SELECT * 
        FROM student 
        WHERE usn=:usn";

        $query = $con->prepare($sql);
        $query->bindValue(':usn', $usn, PDO::PARAM_STR);
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $query->execute();

        if ($user = $query->fetch()) {
            if ($user->usn == $GLOBALS['usn'] && $user->student_email == $email && $user->password == $password) {
                return true;
            }
        }
        return false;
    }
}
