<script>
setTimeout(function(){
   history.back();
}, 3000);
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    return;
}

session_start();
require('includes/database-connection.php');
$_SESSION['email'] = $_POST['email'];

if (!isset($_POST['email'], $_POST['password'])) {
    $_SESSION['account-backend-error'] = $trans['error-fill-all-fields'];;
    header('Location: /login');
    return;
}

if (strlen($_POST['email']) > 200 || strlen($_POST['password']) > 200) {
    $_SESSION['account-backend-error'] = 'yyy';
   header('Location: /login');
    return;
}

$email = null;
$password = null;
$firstname = null;
$lastname = null;
$class = null;
$ID = null; 



if ($stmt = $con->prepare('SELECT ID, Email, `Password`, middleName, FirstName, LastName FROM users WHERE email = ?')) {
    $stmt->bind_param('s', $_POST['email']);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {

        $stmt->bind_result($ID, $email, $password, $middlename, $firstname, $lastname);
        $stmt->fetch();

        echo "Wachtwoord is incorrect, probeer het opnieuw.";
    $_SESSION['password-error'] = "Wachtwoord is incorrect, probeer het opnieuw.";
    header("Refresh: 3; URL='javascript:history.back()'");
    return;
        if (password_verify($_POST['password'], $password)) {

            $_SESSION['loggedin'] = true;
            $_SESSION['userID'] = $ID;
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['middlename'] = $middlename;
            $_SESSION['lastname'] = $lastname;


            $log = "Login";
            $stmt = $con->prepare('INSERT INTO logs (LogName,UserID) VALUES (?,?)');
            $stmt->bind_param('si',$log,$ID);
            $stmt->execute();
            $stmt->close();
            
            $e_confimed = 0;
            if ($stmt = $con->prepare('SELECT `EmailConfimed` FROM users WHERE email = ?')) {
                $stmt->bind_param('s', $_POST['email']);
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows > 0){
                    $stmt->bind_result($e_confimed);
                    $stmt->fetch();
                    if($e_confimed == 0){
                     //   $_SESSION['account-backend-error'] = 'Account nog niet geactiveerd';
                     $_SESSION['account-backend-error'] = $trans['error-not-validated'];
                     
                     
                     header('Location: /change-password?status=no');
                        $stmt->close();
                        return;
                    }
                }

                
            }


            header('Location: /dashboard');
            }
        } else {
            $_SESSION['account-backend-error'] = "Er is iets mis gegaan";
            header('Location: /login?aaaa');
        }
        $stmt->close();
        return;
    } else {
        $_SESSION['account-backend-error'] = "Er is iets mis gegaan";
        header('Location: /login?bbbbb');
        $stmt->close();
        return;
    }

?>