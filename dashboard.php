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
<title>Dashboard - Beroepenevent</title>
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
<body class="no-hero opportunity-body lob-page">
    
<?php require('includes/header.php'); ?>
<!-- # -->

<div class="page-wrap">
    <div class="o-page">
        <div class="lob-page-header">
        
<!-- TEKST -->
            <div class="o-container">
                <h1 class="lob-header__title">Ontdek bij welke <span class="u-primary">organisatie</span> je<br>terecht kunt</h1>
                <p> </p>
            </div>

<!-- SELECTOR -->
            <form data-type="opportunity" class="c-filters c-filters--wide-dropdowns js-filters">
                <div class="o-page">
                    <div class="o-container">
                        <div class="c-filters-row">
                            <div class="c-filter-column c-filter-dropdown js-filter-dropdown">
                                <span class="c-filter-dropdown__trigger c-filter-dropdown__trigger--small js-filter-dropdown-trigger" data-original-text="Maak je keuze"></span>
                                <div class="c-filter-dropdown__inner js-filter-dropdown-content ">
                                    <span class="c-filter-dropdown__close js-filter-close"></span>
                                
                                    <label class="c-filter-radio">
                                        <input class="js-filter-radio js-filter-input-changer js-filter-input-changer-default" type="radio" name="sector" value="">
                                        <span>Toon alle</span>
                                    </label>
                                
<?php           
$sql = "SELECT distinct JobSector FROM jobs order by JobSector";
$result = $con->query($sql);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {

                                if(strlen(trim($row['JobSector'])) > 0){
                                    // $string has at least one non-space character
                                ?>
                                <label class="c-filter-radio">
                                    <input  class="js-filter-radio js-filter-input-changer" type="radio" name="sector" value="<?php echo $row['JobSector']?>">
                                    <span><?php echo $row['JobSector']?></span>
                                </label>
                                <?php 
                                } 
                            else
{

}
                            }
}
else
{

} 
?>                                
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

                    
<!-- ITEMS -->
<?php           
if(isset($_GET['sector']) && !empty($_GET['sector'])){
    //if ($_SERVER["sector"] == null) {
    // no data passed by get
    $sector = $_GET['sector'];
    $sql = "SELECT distinct JobOrganisation, JobSector, OrganisationURL FROM jobs where JobSector = '$sector' order by JobOrganisation";
    $sql2 = "SELECT  count(distinct JobOrganisation) as aantal FROM jobs where JobSector = '$sector'";     
}
else
{
    $sql = "SELECT distinct JobOrganisation, JobSector, OrganisationURL  FROM jobs order by JobOrganisation";
    $sql2 = "SELECT count(distinct JobOrganisation) as aantal FROM jobs";     
}


//echo "query = " .$sql;
$result = $con->query($sql);
$result2 = $con->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
      while($row = $result2->fetch_assoc()) {

      $count = $row['aantal'];  
}
}
?>

<!-- COUNTER -->
<section id="opportunities-holder" class="o-section-sub">
            <div class="">
                <div class="o-container">
                    <div class="c-opportunity__header">
                        <h2><span class="u-primary"><?php echo $count;?> organisaties</span> gevonden</h2>
                    </div>

<?php

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
?>

<a href="<?php echo $row['OrganisationURL']?>" class="c-opportunity" target="_blank" rel="noreferrer noopener nofollow">
            <h3 class="c-opportunity__title"><?php echo $row['JobOrganisation']?></h3>
            <div class="c-opportunity__props">
                <span class="c-opportunity__prop c-opportunity__prop--type"><?php echo $row['JobSector']?></span>
                
            </div>
            <span class="c-opportunity__external">
                <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g class="svg-color" id="Bekijk-op-funda" transform="translate(-180.000000, -16.000000)" fill="#00C866" fill-rule="nonzero"><path d="M196,32 L182,32 L182,18 L189,18 L189,16 L182,16 C180.89,16 180,16.9 180,18 L180,32 C180,33.1 180.89,34 182,34 L196,34 C197.1,34 198,33.1 198,32 L198,25 L196,25 L196,32 Z M191,16 L191,18 L194.59,18 L184.76,27.83 L186.17,29.24 L196,19.41 L196,23 L198,23 L198,16 L191,16 Z" id="Shape"></path></g></g></svg>
            </span>
        </a>
<?php
  }
} 
else 
{
  // echo "0 results";
} ?>
       

<!-- EINDE ITEMS -->
      
<!-- NAV LINKS -->
        <!-- <nav class="pagination-nav">
            <ul class="pagination">
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="/lob/bedrijven?page=2#artikelen">2</a></li>
                <li class="page-item"><a class="page-link" href="/lob/bedrijven?page=3#artikelen">3</a></li>
                <li class="page-item next"><a class="page-link" rel="next" href="/lob/bedrijven?page=2#artikelen"></a></li>
            </ul>
        </nav> -->


                </div>
            </div>
        </section>

    </div>


<!-- SCROLLER -->
<?php require('includes/scroller.php'); ?>




                                
                                    </div>
                <span class="c-slider-btn c-slider-btn--left js-slide-left is-disabled">
                    
<svg width="62px" height="62px" viewBox="0 0 62 62" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="arrow-right">
            <g id="Group-2" transform="translate(31.000000, 31.000000) scale(-1, 1) translate(-31.000000, -31.000000) ">
                <g id="Group" fill="#00C866">
                    <rect id="Rectangle-Copy" x="0" y="0" width="62" height="62" rx="31"></rect>
                </g>
                <g id="keyboard_arrow_right-24px" transform="translate(11.160000, 11.160000)">
                    <polygon id="Path" fill="#FFFFFF" fill-rule="nonzero" points="14.0601113 27.1545106 21.5566549 19.641599 14.0601113 12.1286874 16.3679992 9.8207995 26.1887987 19.641599 16.3679992 29.4623985"></polygon>
                    <polygon id="Path" points="0 0 39.283198 0 39.283198 39.283198 0 39.283198"></polygon>
                </g>
            </g>
        </g>
    </g>
</svg>
                </span>
                <span class="c-slider-btn c-slider-btn--right js-slide-right">
                    
<svg width="62px" height="62px" viewBox="0 0 62 62" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g id="Symbols" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="arrow-right">
            <g id="Group-2">
                <g id="Group" fill="#00C866">
                    <rect id="Rectangle-Copy" x="0" y="0" width="62" height="62" rx="31"></rect>
                </g>
                <g id="keyboard_arrow_right-24px" transform="translate(11.160000, 11.160000)">
                    <polygon id="Path" fill="#FFFFFF" fill-rule="nonzero" points="14.0601113 27.1545106 21.5566549 19.641599 14.0601113 12.1286874 16.3679992 9.8207995 26.1887987 19.641599 16.3679992 29.4623985"></polygon>
                    <polygon id="Path" points="0 0 39.283198 0 39.283198 39.283198 0 39.283198"></polygon>
                </g>
            </g>
        </g>
    </g>
</svg>
                </span>
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