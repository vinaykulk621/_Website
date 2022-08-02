<!--retrieval of all students -->
<?php
if ($con) {
    $query = "SELECT * FROM `student`";
    $res = $con->query($query);
}
if ($res) {
    while ($array = $res->fetch(PDO::FETCH_OBJ)) {
        echo '
        <h1>' . $array->usn . '</h1>
        <h1>' . $array->student_email . '</h1>
        <h1>' . $array->student_name . '</h1>
        <h1>' . $array->branch_name . '</h1>
        ';
    }
} else {
    echo 'Data not found';
}
?>





<!-- retrieveal of some stufs -->
<?php
if ($con) {
    $query = "SELECT `usn`, `student_email`, `student_name`, `branch_name` FROM `student` WHERE `usn`='1BM20CS001'";
    $res = $con->query($query);
}
if ($res) {
    while ($array = $res->fetch(PDO::FETCH_OBJ)) {
        echo '
        <h1>' . $array->usn . '</h1>
        <h1>' . $array->student_email . '</h1>
        <h1>' . $array->student_name . '</h1>
        <h1>' . $array->branch_name . '</h1>
        ';
    }
} else {
    echo 'Data not found';
}
?>