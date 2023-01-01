<?php
session_start();
?>

<!DOCTYPE html>
<html lang="NL">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head >

<meta charset="UTF-8">

<title>Login - Beroepenevent</title>
<meta name="twitter:image" content="../../media/meta/share.png" />
<meta name="description" content="Op Kop heeft een contextrijk LOB voor het Voortgezet Onderwijs ontwikkeld. Het Beroepenevent Op Kop is hier onderdeel van. Op het Beroepenevent maken 3e-jaars leerlingen kennis met verschillende beroepen in deze regio. Voor, tijdens en na het Beroepenevent zijn er verschillende opdrachten voor de le..." />
<meta name="robots" content="index, follow" />
<meta name="apple-mobile-web-app-title" content="Ontdek leren, werken en wonen in de Kop van Noord-Holland" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
<meta name="msapplication-TileColor" content="#FFFFFF" />
<meta name="theme-color" content="#FFFFFF" />
<meta name="twitter:title" content="Voor docenten" />
<meta name="twitter:description" content="Op Kop heeft een contextrijk LOB voor het Voortgezet Onderwijs ontwikkeld. Het Beroepenevent Op Kop is hier onderdeel van. Op het Beroepenevent maken 3e-jaars leerlingen kennis met verschillende beroepen in deze regio. Voor, tijdens en na het Beroepenevent zijn er verschillende opdrachten voor de le..." />
<meta property="og:site_name" content="Ontdek leren, werken en wonen in de Kop van Noord-Holland" />
<meta property="og:description" content="Op Kop heeft een contextrijk LOB voor het Voortgezet Onderwijs ontwikkeld. Het Beroepenevent Op Kop is hier onderdeel van. Op het Beroepenevent maken 3e-jaars leerlingen kennis met verschillende beroepen in deze regio. Voor, tijdens en na het Beroepenevent zijn er verschillende opdrachten voor de le..." />
<meta property="og:type" content="website" />
<meta property="og:title" content="Voor docenten" />
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
</head>
<body class="no-hero opportunity-body lob-page">
    
<?php require('includes/header.php'); ?>
<!-- # -->

<div class="page-wrap">
    <div class="o-section-sub">
        <div class="o-page">
            <div class="o-container">
                <h1 class="u-primary u-center title-huge">Inloggen</h1>
                <div class="default-form-wrapper">
                    <h2 class="c-form-subtitle u-center">Vul hier je gegevens in</h2> 
                    <div class="default-form">
                    <form action="/login-process" method="post">
                        <input type="hidden" name="_csrf_token" value="nylLYbUSeIBK3atSBcSqbXrVRHv6Srt7y1uBcrfAIZE" />
                        <div class="c-form-row">
                            <label for="username" class="c-form__label">Gebruikersnaam</label>
                            <div class="c-form-row__input">
                                <input type="text" id="email" name="email" value="" required="required" autocomplete="email" />
                            </div>
                        </div>

                        <div class="c-form-row">
                            <label for="password" class="c-form__label">Wachtwoord</label>
                            <div class="c-form-row__input">
                                <input type="password" id="password" name="password" required="required" autocomplete="password" />
                            </div>
                        </div>

                        <div class="c-form-row">
                            <a class="c-form-forgot-password c-form__label" href="/wachtwoord-vergeten/aanvragen">Wachtwoord vergeten?</a>
                            <input class="c-login-submit c-btn c-btn--primary c-btn--rounded c-btn--compact" type="submit" id="_submit" name="_submit" value="Inloggen" />
                        </div>

                    </form>
                    </div>            
                </div>
            </div>
        </div>
    </div>

 <?php require('includes/footer.php'); ?>

    
</div>
<script src="../../build/main.37bd3be40c1596c51a06.js"></script>


<?php
                    if (isset($_SESSION['account-backend-error'])) {
                        ?>
                    
                       <div role="alert" class="alert alert-danger" style="margin-top:10px;"><strong><?php echo $_SESSION['account-backend-error'];?></strong></div>

                        <?php
                        unset($_SESSION['account-backend-error']);
                    }
                    ?>


</body>
</html>
