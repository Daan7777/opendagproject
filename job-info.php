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


?>

<!DOCTYPE html>
<html lang="NL">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head >
<meta charset="UTF-8">
<title>Dashboard - Job info</title>
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

<style>
#source {
  border: 1px solid #ccc;
  height: auto;
  margin-top: 10px;
  min-height: 10px;
  overflow: auto;
  padding: 5px;
  width: 106px;
  word-break: break-word;
}
    </style>
<script>
$('input[type="button"]').click(function() {
  $('input[type="text"]').val($('#source').html());  
});
</script>




</head>
<body class="no-hero">    
<?php require('includes/header.php'); ?>



<!-- A -->
<div class="page-wrap">
    <div class="o-section-sub">
        <div class="o-page o-shadow-hr">
            <div class="o-container">
                <div class="form-steps">
                    <div class="form-steps__sidebar">
                        <h2>Lorum ipsum lor ipsum <span class="u-primary">Lorum ipsum.</span></h2>
                        <ol class="form-steps__steps">
                            <li class="is-active">Vul het formulier in</li>
                            <li class="">Bevestig je e-mailadres</li>
                            <li class="">Wij controleren je aanmelding</li>
                            <li>Je ontvangt van ons een bevestiging</li>
                        </ol>
                    </div>
                    <div class="form-steps__step">
                    <h2 class="u-center">Informatie toevoegen</h2>   
                    
                    <form name="fos_user_registration_form" method="post" action="/registreren" class="fos_user_registration_register" novalidate="novalidate">
                        <div  class="c-form-row">
                            <label for="fos_user_registration_form_zipcode" class="c-form__label">
                                <div>Opmerking:</div>
                            </label>
                            <div style="width:200px; height:150px; border:1px solid #eee;box-shadow:inset 0 3px 5px 0 rgb(0 0 0 / 18%);font-family: L10;" class="c-form-row__input" id="source" contenteditable=""> 
                                <span type="text" id="fos_user_registration_form_zipcode" name="fos_user_registration_form[zipcode]" required="required"> </span>
                            </div>
              
              
              
              
                        </div>
                    

                        
                        <div class="c-form-row c-form-row--indented">
                            <input type="submit" value="Informatie opslaan" class="c-btn c-btn--primary c-btn--rounded c-btn--compact" />
                        </div>

                    
                   
 
</div>
                    
</div>
                        </div>
                        </div>
                        </div>

                   
        
<!-- B -->











<?php require('includes/footer.php'); ?>    
</div>
<script src="../../build/main.37bd3be40c1596c51a06.js"></script>
<?php
                    if (isset($_SESSION['account-backend-error'])) {
                        ?>

<div class="c-alert js-alert">
        <div class="c-alert__inner">
            <span class="c-alert__title"><?php echo $_SESSION['account-backend-error'];?></span>
        </div>
        <a href="javascript:;" class="c-alert__close js-alert-close">
    <svg width="18px" height="17px" viewBox="0 0 18 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g id="arrow-right" transform="translate(-12.000000, -16.000000)" fill="#00C866" fill-rule="nonzero">
                <g id="Group-2">
                    <g id="keyboard_arrow_right-24px" transform="translate(25.000000, 25.000000) scale(-1, 1) translate(-25.000000, -25.000000) translate(9.000000, 9.000000)">
                        <g id="Group-3" transform="translate(11.000000, 7.000000)">
                            <polygon id="Path" points="0.338799427 14.8987989 6.38439912 8.8399992 0.338799427 2.78119951 2.19999933 0.919999599 10.1199989 8.8399992 2.19999933 16.7599988"></polygon>
                            <polygon id="Path" transform="translate(12.229399, 8.839999) scale(-1, 1) translate(-12.229399, -8.839999) " points="7.33879943 14.8987989 13.3843991 8.8399992 7.33879943 2.78119951 9.19999933 0.919999599 17.1199989 8.8399992 9.19999933 16.7599988"></polygon>
                        </g>
                    </g>
                </g>
            </g>
        </g>
    </svg></a>
    </div>
                        <?php
                        unset($_SESSION['account-backend-error']);
                    }
                    ?>

</body>
</html>
