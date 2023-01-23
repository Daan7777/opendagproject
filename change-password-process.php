<?php 


session_start();
if ($_SESSION['loggedin'] = false) {
    header('Location: /login');
    return;
}

if(!isset($_SESSION['userID']))
    {
        header('Location: /login');
     }

     require('includes/database-connection.php');


if ($_POST['UserID'] != $_SESSION['userID']) {
    $_SESSION['account-backend-error'] = 'users zijn niet gelijk';
    header('Location: /change-password');
return;
}

$password = $_POST['password'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$UserID = $_POST['UserID'];

echo "password is" .$password."<br>";
echo "hashed password is" .$hashed_password."<br>";
echo "user is" .$UserID."<br>";


$stmt = $con->prepare('UPDATE users SET password=? ,resettoken="1"  WHERE ID = ?');
$stmt->bind_param('si', $hashed_password, $_POST['UserID']);
$stmt->execute();
$stmt->close();

$log = "changed password";
$stmt = $con->prepare('INSERT INTO logs (LogName,UserID) VALUES (?,?)');
$stmt->bind_param('si',$log,$UserID);
$stmt->execute();
$stmt->close();


header('Location: /logout');


?>