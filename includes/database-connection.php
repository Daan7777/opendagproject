<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "beroepenevent";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

error_reporting(E_ALL ^ E_NOTICE);

?>