<?php
session_start();
require('includes/database-connection.php');


if(!isset($_SESSION['userID']))
    {
        header('Location: /login');
     }

$ID = $_SESSION['userID'];
$log = "Logout";
$stmt = $con->prepare('INSERT INTO logs (LogName,UserID) VALUES (?,?)');
$stmt->bind_param('si',$log,$ID);
$stmt->execute();
$stmt->close();

session_destroy();
// Redirect to the login page:
header('Location: /');
?>