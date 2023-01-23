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
<title>Dashboard - Matching</title>
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
                    
                    <a href="#alert-modal" class="c-btn c-btn--secondary c-btn--rounded c-btn--compact c-opportunity-save js-modal-trigger"><span class="c-btn__icon c-btn__icon--alt">
<svg width="16px" height="20px" viewBox="0 0 16 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g class="svg-color" id="Desktop-Alle-werkkansen" transform="translate(-1126.000000, -265.000000)" fill="#00C866" fill-rule="nonzero">
            <g id="Group-6" transform="translate(1104.000000, 251.000000)">
                <g id="notification_important-24px" transform="translate(18.000000, 12.000000)">
                    <path d="M18,16 L18,11 C18,7.93 16.36,5.36 13.5,4.68 L13.5,4 C13.5,3.17 12.83,2.5 12,2.5 C11.17,2.5 10.5,3.17 10.5,4 L10.5,4.68 C7.63,5.36 6,7.92 6,11 L6,16 L4,18 L4,19 L20,19 L20,18 L18,16 Z M13,16 L11,16 L11,14 L13,14 L13,16 Z M13,12 L11,12 L11,8 L13,8 L13,12 Z M12,22 C13.1,22 14,21.1 14,20 L10,20 C10,21.1 10.89,22 12,22 Z" id="Shape"></path>
                </g>
            </g>
        </g>
    </g>
</svg></span>TEST MODAL</a>
                    
                    
                    
                    
                    
                    <form name="fos_user_registration_form" method="post" action="/registreren" class="fos_user_registration_register" novalidate="novalidate">
                        <div  class="c-form-row">
                            <label for="fos_user_registration_form_zipcode" class="c-form__label">
                                <div>Opmerking:</div>
                            </label>
                            <div style="width:200px; height:150px; border:1px solid #eee;box-shadow:inset 0 3px 5px 0 rgb(0 0 0 / 18%);font-family: L10;" class="c-form-row__input" id="source" contenteditable=""> 
                                <span type="text" id="fos_user_registration_form_zipcode" name="fos_user_registration_form[zipcode]" required="required"> </span>
                            </div>

                        </div>
                        <!--   
                        <div  class="c-form-row">
                            <label for="fos_user_registration_form_sector" class="c-form__label">
                                <div>Sector</div>
                            </label>
                            <div class="c-form-row__input">
                                <select id="fos_user_registration_form_sector" name="fos_user_registration_form[sector]" required="required">
                                    <option value="" selected="selected">Maak een keuze</option>
                                    <option value="agri-food">Agri &amp; food</option>
                                    <option value="bouw-infrastructuur">Bouw &amp; infrastructuur</option>
                                    <option value="dienstverlening-administratie">Dienstverlening &amp; administratie</option>
                                    <option value="handel-verkoop">Handel &amp; verkoop</option>
                                    <option value="horeca-vrije-tijd">Horeca</option>
                                    <option value="ict">ICT</option>
                                    <option value="marketing-communicatie">Marketing &amp; communicatie</option>
                                    <option value="onderwijs">Onderwijs</option><option value="onderzoek">Onderzoek</option>
                                    <option value="overig">Sport &amp; Overig</option>
                                    <option value="semi-overheid">(Semi-)overheid</option>
                                    <option value="techniek">Techniek</option>
                                    <option value="transport-scheepvaart-logistiek">Transport, scheepvaart &amp; logistiek</option>
                                    <option value="veiligheid">Veiligheid</option>
                                    <option value="zorg-welzijn">Zorg &amp; welzijn</option>
                                </select>
                            </div>
                        </div>
                        <div  class="c-form-row">
                            <label for="fos_user_registration_form_title" class="c-form__label">
                                <div>Organisatienaam</div>
                            </label>
                            <div class="c-form-row__input">
                                <input type="text" id="fos_user_registration_form_title" name="fos_user_registration_form[title]" required="required" />
                            </div>
                        </div>
                                                               
                        <div  class="c-form-row">
                            <label for="fos_user_registration_form_phone" class="c-form__label">
                                <div>Telefoonnummer</div>
                            </label>
                            <div class="c-form-row__input">
                                <input type="tel" id="fos_user_registration_form_phone" name="fos_user_registration_form[phone]" required="required" />
                            </div>
                        </div>
                        <div  class="c-form-row">
                            <label for="fos_user_registration_form_email" class="c-form__label">
                                <div>E-mailadres</div>
                            </label>
                            <div class="c-form-row__input">
                                <input type="email" id="fos_user_registration_form_email" name="fos_user_registration_form[email]" required="required" />
                            </div>
                        </div>

                        <div class="c-form-row c-form-row--indented c-form-row--no-border">
                            <input type="checkbox" id="fos_user_registration_form_gdpr" name="fos_user_registration_form[gdpr]" required="required" value="1" />
                            <label for="fos_user_registration_form_gdpr"><span>Ik ga akkoord met de <a href="/privacyverklaring" target="_blank">aanmeldvoorwaarden</a>.</span>
                            </label>
                            <ul class="c-form-row__errors" style="position: relative; left: 0; margin-bottom: 4px;"></ul>
                        </div> 
                        -->

                        <div class="c-form-row c-form-row--indented">
                            <input type="submit" value="Informatie opslaan" class="c-btn c-btn--primary c-btn--rounded c-btn--compact" />

                        </div>
                        <input type="hidden" id="fos_user_registration_form_company" name="fos_user_registration_form[company]" />    
                        <input type="text" id="fos_user_registration_form_ga_jij_op_kop" name="fos_user_registration_form[ga_jij_op_kop]" autocomplete="nope" tabindex="-1" aria-hidden="true" style="position: fixed; left: -100%; top: -100%;"  />
                                   </div>
                </div>
            </div>
        </div>
    </div>

                   
        
<!-- B -->


<!-- MODAL -->

<div class="js-modal" id="alert-modal">
    <div class="c-modal__inner c-modal__inner--alert js-alert-content">
        <span class="c-modal__title">Bewaar de zoekopdracht<br>met een Kans Alarm</span>
        <div class="c-modal__info">
            Je ontvangt van ons een e-mail wanneer er nieuwe kansen beschikbaar zijn binnen jouw zoekopdracht.
        </div>
        <div class="c-modal__section">
                            
    <form name="search_alert" method="post" action="/zoekalarm/leren" class="js-alert-form">
            <div  class="c-form-row">
        <label for="search_alert_email" class="c-form__label">
            <div>Email</div>
                                </label><div class="c-form-row__input"><input type="email" id="search_alert_email" name="search_alert[email]" required="required" /></div>
    </div>
        <div class="c-form-row c-form-row--indented c-form-row--no-border">
                        <input type="checkbox" id="search_alert_gdpr" name="search_alert[gdpr]" required="required" value="1" />
            
            <label for="search_alert_gdpr"><span>Ik ga akkoord met de <a href="/privacyverklaring" target="_blank">privacyverklaring</a>.</span></label>
        </div>
        <div><button type="submit" id="search_alert_submit" name="search_alert[submit]" class="c-btn c-btn--primary c-btn--rounded c-btn--compact c-btn--centered">Kans Alarm instellen</button></div>
    <input type="hidden" id="search_alert_filters" name="search_alert[filters]" value="{&quot;learnType&quot;:null,&quot;sector&quot;:{&quot;agri-food&quot;:1}}" /><input type="hidden" id="search_alert_type" name="search_alert[type]" value="learn" />    <input type="text" id="search_alert_ga_jij_op_kop" name="search_alert[ga_jij_op_kop]" autocomplete="nope" tabindex="-1" aria-hidden="true" style="position: fixed; left: -100%; top: -100%;"  />

<input type="hidden" id="search_alert__token" name="search_alert[_token]" value="yFH6DXilzVRfunlOWNpXAEDC8QTQISAXDEYyBZ3NpwU" /></form>

                        
        </div>
    </div>
</div>
<!-- EINDE MODAL -->


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
