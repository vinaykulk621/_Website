<?php
//database connection

ob_start();

try {
    $con = new PDO("mysql:dbname=website;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $th) {
    exit("failed connection with database:" . $th->getMessage());
}
