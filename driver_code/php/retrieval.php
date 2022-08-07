<!--retrieval of all students -->
<?php
function query_all($con)
{
    if ($con) {
        $sql = "SELECT * FROM `student` WHERE usn=:usn";
        $query = $con->prepare($sql);
        $query->bindValue(':usn', User::$usn, PDO::PARAM_STR);
        $query->execute();
        $res = $query->execute();
    }
    if ($res) {
        return $array = $res->fetch(PDO::FETCH_ASSOC);
    }
}
?>





<!-- retrieveal of some stufs -->
<?php
function usn_query($con)
{
    if ($con) {
        $query = "SELECT `usn`,`student_name` FROM `student` WHERE `usn`='1BM20CS001'";
        $res = $con->query($query);
    }
    return $array = $res->fetch(PDO::FETCH_ASSOC);
}
?>