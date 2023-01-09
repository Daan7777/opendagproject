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


         
     if(isset($_GET['JobID']) && !empty($_GET['JobID'])){
         //if ($_SERVER["sector"] == null) {
         // no data passed by get
        $userID = $_SESSION['userID'];
        $job = $_GET['JobID'];
        $sql = "SELECT * FROM jobs where JobID = $job";
     }
     else
     {
        $_SESSION['account-backend-error'] = "Dit beroep is niet bekend";
        header('Location: /matching?error');
     }
     
     
     //echo "query = " .$sql;
     $result = $con->query($sql);
     
     if ($result->num_rows > 0) {
         // output data of each row
           while($row = $result->fetch_assoc()) {
     
           echo $row['JobName'];  

           $sql2 = "INSERT INTO `matches` ( `UserID`, `JobID`) VALUES ('$userID', '$job') ";
           $result2 = $con->query($sql2);
           header('Location: /matching?succes');
        }
    }
else 

{
    $_SESSION['account-backend-error'] = "Dit beroep is niet bekend";
    header('Location: /matching?error2');
}
     ?>
                                  
     

<!DOCTYPE html>
<html lang="NL">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head >
<meta charset="UTF-8">
<title>Add Job - Beroepenevent</title>
<meta name="twitter:image" content="../../media/meta/share.png" />
<meta name="description" content="Op Kop heeft een contextrijk LOB voor het Voortgezet Onderwijs ontwikkeld. Het Beroepenevent Op Kop is hier onderdeel van. Op het Beroepenevent maken 3e-jaars leerlingen kennis met verschillende beroepen in deze regio. Voor, tijdens en na het Beroepenevent zijn er verschillende opdrachten voor de le..." />
<meta name="robots" content="index, follow" />
<meta name="apple-mobile-web-app-title" content="Ontdek leren, werken en wonen in de Kop van Noord-Holland" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="theme-color" content="#FFFFFF" />
<meta content="width=device-width, initial-scale=1, minimum-scale=1" name="viewport">
<meta http-equiv="x-ua-compatible" content="IE=edge" />
<link rel="apple-touch-icon" sizes="180x180" href="../../media/meta/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../media/meta/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../media/meta/favicon-16x16.png">
<link rel="manifest" href="https://opkop.nl/media/meta/site.webmanifest">
<link rel="mask-icon" href="https://opkop.nl/media/meta/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<link href="../../build/main.37bd3be40c1596c51a06.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/2385044ba8.js" crossorigin="anonymous"></script>
</head>
                                
                                
                             

</body>
</html>
