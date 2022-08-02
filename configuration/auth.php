<?php
require("configuration/config.php");


/**
 * User
 *
 * A person or entity that can log in to the site
 */
class User
{
    /**
     * Unique identifier
     * @var integer
     */
    public $id;

    /**
     * Unique username
     * @var string
     */
    public $username;

    /**
     * Password
     * @var string
     */
    public $password;

    /**
     * Authenticate a user by username and password
     *
     * @param object $conn Connection to the database
     * @param string $username Username
     * @param string $password Password
     *
     * @return boolean True if the credentials are correct, null otherwise
     */
    // public static function authenticate($conn, $username, $password)
    // {
    //     $sql = "SELECT *
    //             FROM user
    //             WHERE username = :username";

    //     $stmt = $conn->prepare($sql);
    //     $stmt->bindValue(':username', $username, PDO::PARAM_STR);

    //     $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

    //     $stmt->execute();

    //     if ($user = $stmt->fetch()) {
    //         return $user->password == $password;
    //     }
    // }

    public static function login($con, $email, $name, $usn, $pass)
    {
        $sql = "SELECT * 
        FROM student 
        WHERE usn=:usn";

        $query = $con->prepare($sql);
        $query->bindValue(':usn', $usn, PDO::PARAM_STR);
        $query->setFetchMode(PDO::FETCH_CLASS, 'User');
        $query->execute();

        if ($user = $query->fetch()) {
            if ($user->usn == $usn && $user->student_name == $name && $user->student_email == $email && $user->password == $pass) {
                return true;
            }
        }
        return false;
    }


    public static function isloggedin()
    {
        if (isset($_SESSION['is_logged_in'])  && $_SESSION['is_logged_in']) {
            return true;
        }
        return false;
    }
}
