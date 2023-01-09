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
?>                                
                                
                                <label class="c-filter-radio">
                                        <input  class="js-filter-radio js-filter-input-changer" type="radio" name="sector" value="<?php echo $row['JobSector']?>">
                                        <span><?php echo $row['JobSector']?></span>
                                    </label>
<?php }
}
else
{} ?>                                
                                
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
    $sql = "SELECT * FROM jobs where JobSector = '$sector' order by JobOrganisation";
    $sql2 = "SELECT count(*) as aantal FROM jobs where JobSector = '$sector'";     
}
else
{
    $sql = "SELECT * FROM jobs order by JobOrganisation";
    $sql2 = "SELECT count(*) as aantal FROM jobs";     
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
                <span class="c-opportunity__prop c-opportunity__prop--location"><?php echo $row['JobLocation']?></span>
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


    <div class="u-padding-top">
        <div class="lob-card-puller">
            <div class="lob-card-container u-relative">
                <h2 class="title-sub u-center"><span class="u-primary">Oriënteer</span> verder</h2>
                <div class="js-card-slider c-card-slider swiper-container" data-slide-count="3.3">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide lob-slide-alt">
                            <a href="#">
                                <div class="c-card c-slide-card lob-card">
                                    <div class="c-article-item__media"><img src="/media/flysystem/7639e839ee3b5a3b14a3f4ab7c1f670184349150_1661940210/fit_crop-50-50-fm_jpg-id_830-width_584-height_438.jpg" alt="" class="c-article-item__image"></div>
                                    <div class="lob-slide-icon">
                                        <?xml version="1.0" encoding="UTF-8"?><svg width="58px" height="58px" viewBox="0 0 90 90" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>Group 2</title>
                                            <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="OpKop-Bedrijvenspel" transform="translate(-553.000000, -2857.000000)">
                                                    <g id="Group-8" transform="translate(-787.000000, 2523.000000)">
                                                        <g id="Group-7" transform="translate(0.000000, 104.523438)">
                                                            <g id="Group" transform="translate(1281.000000, 0.476562)">
                                                                <g id="Group-2" transform="translate(59.000000, 229.000000)">
                                                                    <circle id="Oval" fill="#00C866" cx="45" cy="45" r="45"></circle>
                                                                    <g id="noun_peoples_2786444" transform="translate(24.000000, 29.250000)" fill="#FFFFFF" fill-rule="nonzero">
                                                                        <path d="M26.46,22.2644131 L26.46,14.3945641 C26.46,12.995246 25.3084907,11.88 23.9098539,11.88 L18.194372,11.88 C16.7957352,11.88 15.66,12.995246 15.66,14.3945641 L15.66,22.2644131 C15.66,23.5374769 16.6432522,24.5895957 17.8315677,24.7684559 L17.8315677,31.4809742 C17.8315677,32.5541354 18.4625316,33.48 19.2670107,33.48 L22.8214411,33.48 C23.6259202,33.48 24.2779163,32.5541354 24.2779163,31.4809742 L24.2779163,24.7684559 C25.4767478,24.5895957 26.46,23.5374769 26.46,22.2644131 Z" id="Path"></path>
                                                                        <circle id="Oval" cx="21.06" cy="7.83" r="3.24"></circle>
                                                                        <circle id="Oval" cx="36.45" cy="3.24" r="3.24"></circle>
                                                                        <circle id="Oval" cx="5.4" cy="3.24" r="3.24"></circle>
                                                                        <circle id="Oval" cx="28.62" cy="5.67" r="3.24"></circle>
                                                                        <path d="M39.3850479,7.29 L33.7324681,7.29 C33.2696534,7.29 32.8380397,7.39516066 32.4636278,7.62125609 C32.2348205,8.03138267 31.9384111,8.40996105 31.59,8.69389484 L31.6628023,8.69389484 C33.571263,8.69389484 35.1313126,10.2975949 35.1313126,12.2325511 L35.1313126,20.1038267 C35.1313126,21.3815287 34.4396906,22.533038 33.3268552,23.1429698 L33.3268552,26.9129796 C33.3268552,27.9856183 33.9976766,28.89 34.7933019,28.89 L38.3086137,28.89 C39.104239,28.89 39.7698602,27.9856183 39.7698602,26.9129796 L39.7698602,20.1932132 C40.9502977,20.0091821 41.85,18.9575755 41.85,17.6903895 L41.85,9.81911392 C41.8603267,8.42047712 40.7682919,7.29 39.3850479,7.29 Z" id="Path"></path>
                                                                        <path d="M34.02,19.8792184 L34.02,12.0060263 C34.02,10.6070489 32.9053461,9.45 31.526286,9.45 L25.8959879,9.45 C25.434573,9.45 25.0042648,9.59200146 24.6309853,9.81815194 C24.4028701,10.2283784 24.1073573,10.5754931 23.76,10.9226077 L23.8325821,10.9226077 C25.7352703,10.9226077 27.3165235,12.4793645 27.3165235,14.4147918 L27.3165235,22.2879839 C27.3165235,23.5659971 26.5544113,24.7177867 25.517524,25.3278671 L25.517524,29.0987947 C25.517524,30.1716947 26.1655786,31.05 26.9587974,31.05 L30.4634765,31.05 C31.2566953,31.05 31.8788277,30.1664354 31.8788277,29.0987947 L31.8788277,22.3826516 C33.0505104,22.2038349 34.02,21.1519722 34.02,19.8792184 Z" id="Path"></path>
                                                                        <circle id="Oval" cx="13.23" cy="5.67" r="3.24"></circle>
                                                                        <path d="M14.5470532,22.28585 L14.5470532,14.416001 C14.5470532,12.4801023 16.1107291,10.9229664 18.0172709,10.9229664 L18.09,10.9229664 C17.7419392,10.5705066 17.4510228,10.2285679 17.2224456,9.8182416 C16.8484101,9.59203604 16.4120354,9.45 15.9496861,9.45 L10.3079848,9.45 C8.92613165,9.45 7.83,10.6073307 7.83,12.0066488 L7.83,19.8817584 C7.83,21.1548222 8.72872405,22.2069411 9.90797468,22.3858013 L9.90797468,29.0983195 C9.90797468,30.1714808 10.5781215,31.05 11.3729468,31.05 L14.8847241,31.05 C15.6795494,31.05 16.3496962,30.1662202 16.3496962,29.0983195 L16.3496962,25.3264735 C15.2379797,24.7162445 14.5470532,23.5641744 14.5470532,22.28585 Z" id="Path"></path>
                                                                        <path d="M6.95675676,20.1100682 L6.95675676,12.2349586 C6.95675676,10.2990599 8.51675676,8.69457867 10.4562162,8.69457867 L10.53,8.69457867 C10.1927027,8.41576717 9.90283784,8.06330736 9.67621622,7.66876279 C9.28094595,7.41625426 8.81189189,7.29 8.31121622,7.29 L2.58243243,7.29 C1.18054054,7.29 0,8.42102776 0,9.82034584 L0,17.6954554 C0,18.9685192 0.985540541,20.0206381 2.17662162,20.1994983 L2.17662162,26.9120166 C2.17662162,27.9851778 2.85648649,28.89 3.66283784,28.89 L7.22554054,28.89 C8.03189189,28.89 8.71175676,27.9851778 8.71175676,26.9120166 L8.71175676,23.1138675 C7.6577027,22.5036386 6.95675676,21.3673502 6.95675676,20.1100682 Z" id="Path"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="lob-slide-content">
                                        <div class="lob-slider-label">
                                            Beroepenmagazine
                                        </div>
                                        <h3 class="lob-slider-title">Ontdek welk <span class="u-primary">beroep</span> bij jou past</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide lob-slide-alt">
                            <a href="#">
                                <div class="c-card c-slide-card lob-card">
                                    <div class="c-article-item__media"><img src="/media/flysystem/b9abe75feca1e4360514a997bbc731dcc6a71248_1643274769/fit_crop-50-50-fm_jpg-id_787-width_584-height_438.jpg" alt="" class="c-article-item__image"></div>
                                    <div class="lob-slide-icon">
                                        <?xml version="1.0" encoding="UTF-8"?>
                                            <svg width="58px" height="58px" viewBox="0 0 58 58" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>Beroepsevent in cirkel</title>
                                                <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="OpKop-knop1" transform="translate(-403.000000, -183.000000)">
                                                        <g id="Beroepsevent-in-cirkel" transform="translate(403.000000, 183.000000)">
                                                            <circle id="Oval-Copy" fill="#00C866" cx="29" cy="29" r="29"></circle>
                                                            <g id="Speech-Bubble-With-Text-Lines-Vector-SVG-Icon-(4)---SVG-Repo-39-Copy" transform="translate(10.955556, 14.822222)" fill="#FFFFFF" fill-rule="nonzero">
                                                                <g id="beroepsevent">
                                                                    <path d="M33.8532205,12.8772335 L33.8532205,13.2971953 C33.8532205,17.1190379 30.7203159,20.2284231 26.8693795,20.2284231 L16.7255996,20.2284231 L16.7255996,21.0929484 C16.7255996,22.9206534 18.2183938,24.4021189 20.059806,24.4021189 L28.5392693,24.4021189 L32.3788097,28.1510646 C32.515645,28.2845575 32.6972326,28.3555556 32.8818146,28.3555556 C32.9752287,28.3555556 33.0693081,28.3373107 33.1588126,28.3002431 C33.4253295,28.189288 33.5987651,27.9304753 33.5987651,27.6438412 L33.5987651,24.3956795 C35.3471792,24.2931451 36.7333333,22.8539482 36.7333333,21.0929484 L36.7333333,16.1550327 C36.7333333,14.4805515 35.479689,13.097245 33.8532205,12.8772335 Z" id="Path"></path>
                                                                    <path d="M31.9243834,13.1589968 L31.9243834,5.28010988 C31.9243834,2.36398803 29.5423678,0 26.6041935,0 L5.32018989,0 C2.38193248,0 0,2.36398803 0,5.28010988 L0,13.1589968 C0,15.9689517 2.21174097,18.2651614 5.00143433,18.4287872 L5.00143433,23.6113985 C5.00143433,24.0689233 5.2781827,24.4818679 5.70332874,24.6587026 C5.84623637,24.7182254 5.9962977,24.7469549 6.14527765,24.7469549 C6.43991027,24.7469549 6.72963511,24.6340184 6.94790613,24.4208591 L13.0743013,18.4391066 L26.6040272,18.4391066 C29.542451,18.4391892 31.9243834,16.0752012 31.9243834,13.1589968 Z" id="Path"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                    <div class="lob-slide-content">
                                        <div class="lob-slider-label">Beroepenevent</div>
                                        <h3 class="lob-slider-title"><span class="u-primary">Beroepenevent</span> Op Kop! 8 en 9 februari 2023</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <div class="swiper-slide lob-slide-alt">
                            <a href="#">
                                <div class="c-card c-slide-card lob-card">
                                    <div class="c-article-item__media"><img src="/media/flysystem/222fe2b55454a097f7b554cfd0aa727e2f902e08_1626084791/fit_crop-50-50-fm_jpg-id_613-width_584-height_438.jpg" alt="" class="c-article-item__image"></div>
                                    <div class="lob-slide-icon">
                                        <?xml version="1.0" encoding="UTF-8"?>
                                            <svg width="58px" height="58px" viewBox="0 0 58 58" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>Group 2</title>
                                                <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="OpKop-Bedrijvenspel" transform="translate(-100.000000, -183.000000)">
                                                        <g id="Group-2" transform="translate(100.000000, 183.000000)">
                                                            <circle id="Oval" fill="#00C866" cx="28.9999983" cy="28.9999983" r="28.9999983"></circle>
                                                            <path d="M22.5564484,14 C21.1503793,14 20,15.2 20,16.6667188 L20,41.3332812 C20,42.8 21.1503793,44 22.5564484,44 L34.4435516,44 C35.8496207,44 37,42.8 37,41.3332812 L37,16.6667188 C37,15.2 35.8496207,14 34.4435516,14 L22.5564484,14 Z M27.0752822,16.5682812 L29.9256166,16.5682812 C30.1130026,16.5682812 30.2648886,16.7923438 30.2648886,17.0684375 C30.2648886,17.3445312 30.1130026,17.5685937 29.9256166,17.5685937 L27.0752822,17.5685937 C26.8878962,17.5685937 26.7360102,17.3445312 26.7360102,17.0684375 C26.7360102,16.7923438 26.8878962,16.5682812 27.0752822,16.5682812 L27.0752822,16.5682812 Z M21.4042716,20.1335937 L35.5961777,20.1335937 L35.5961777,37.866875 L21.4042716,37.866875 L21.4042716,20.1335937 Z M28.5002247,39.2825 C28.5002247,39.2825 28.5002247,39.2825 28.5002247,39.2825 C29.3742433,39.2825 30.082895,40.0217187 30.082895,40.9334375 C30.082895,40.9334375 30.082895,40.9334375 30.082895,40.9334375 L30.082895,40.9334375 C30.082895,40.9334375 30.082895,40.9334375 30.082895,40.9334375 C30.082895,41.8451563 29.3742433,42.584375 28.5002247,42.584375 C28.5002247,42.584375 28.5002247,42.584375 28.5002247,42.584375 L28.5002247,42.584375 C28.5002247,42.584375 28.5002247,42.584375 28.5002247,42.584375 C27.626206,42.584375 26.9175544,41.8451563 26.9175544,40.9334375 C26.9175544,40.9334375 26.9175544,40.9334375 26.9175544,40.9334375 L26.9175544,40.9334375 C26.9175544,40.9334375 26.9175544,40.9334375 26.9175544,40.9334375 C26.9175544,40.0217187 27.626206,39.2825 28.5002247,39.2825 C28.5002247,39.2825 28.5002247,39.2825 28.5002247,39.2825 L28.5002247,39.2825 Z" id="Shape" fill="#FFFFFF" fill-rule="nonzero"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                    </div>
                                    <div class="lob-slide-content">
                                        <div class="lob-slider-label">Sector games</div>
                                        <h3 class="lob-slider-title">Speel vier verschillende <span class="u-primary">sector games</span></h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                            
                            <div class="swiper-slide lob-slide-alt">
                                <a href="#">
                                    <div class="c-card c-slide-card lob-card">
                                        <div class="c-article-item__media"><img src="/media/flysystem/a6281691cc578b2dcd6ffaa68b0e79f5112c424d_1626084852/fit_crop-50-50-fm_jpg-id_615-width_584-height_438.jpg" alt="" class="c-article-item__image"></div>
                                        <div class="lob-slide-icon">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                                <svg width="58px" height="58px" viewBox="0 0 58 58" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>Group 2</title>
                                                    <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="OpKop-Filmopdracht" transform="translate(-100.000000, -183.000000)">
                                                            <g id="Group" transform="translate(96.000000, 183.000000)">
                                                                <g id="Group-2" transform="translate(4.000000, 0.000000)">
                                                                    <circle id="Oval" fill="#00C866" cx="28.9999983" cy="28.9999983" r="28.9999983"></circle>
                                                                    <path d="M43.4293898,24.3759587 L18.995862,24.3759587 L21.0101159,23.8793176 L24.5250746,23.0158393 L27.6463123,22.2483031 L31.161271,21.3848248 L34.299627,20.6172885 L42.7047149,18.551713 C43.0102483,18.476704 43.1966411,18.1711331 43.1212603,17.8688315 L42.4365281,15.1316618 C42.273983,14.4381169 41.8493371,13.8323503 41.2496589,13.4385671 C41.2178583,13.4185948 41.1832477,13.4033807 41.1469491,13.393418 C40.4955008,13.0120977 39.7175392,12.9024668 38.9843365,13.0886609 L37.7803491,13.3821307 L34.6534053,14.132736 L31.1327405,15.0018579 L28.022915,15.7693941 L24.4851319,16.6328724 L23.4180909,16.8924803 L15.1670677,18.9185502 C14.4321473,19.0986037 13.7997255,19.5601971 13.4090831,20.2016718 C13.0184408,20.8431465 12.9016171,21.611891 13.0843406,22.3386014 L13.7576606,25.0080474 L13.7576606,40.1781756 C13.7576606,41.7366262 15.035015,43 16.6107115,43 L41.1469491,43 C42.7226456,43 44,41.7366262 44,40.1781756 L44,24.9403236 C44,24.6286335 43.7445291,24.3759587 43.4293898,24.3759587 Z M38.2938982,14.4092748 L39.2753477,14.1665979 C39.5469938,14.0996852 39.8310864,14.0996852 40.1027325,14.1665979 L37.3181548,18.7323098 L35.3609619,19.21202 L38.2938982,14.4092748 Z M31.6348774,16.0402893 L33.5920704,15.5605791 L30.6762523,20.3463934 L28.7190594,20.8261035 L31.6348774,16.0402893 Z M24.9872689,17.6713038 L26.9444618,17.1915937 L24.0286438,21.9774079 L22.0714509,22.4571181 L24.9872689,17.6713038 Z M15.4694911,20.0134181 L20.3253837,18.8226082 L17.4095657,23.6140661 L14.7448162,24.2574421 L14.174206,22.0677063 C14.065412,21.6293439 14.1438315,21.1660178 14.3910379,20.786598 C14.630245,20.3954404 15.0192124,20.1165764 15.4694911,20.0134181 Z M32.8559832,34.1846204 L25.4380509,38.1351747 C25.3556298,38.1791767 25.2635246,38.2024356 25.1698641,38.2028984 C24.8547248,38.2028984 24.5992539,37.9502237 24.5992539,37.6385336 L24.5992539,29.7374251 C24.5997871,29.53952 24.7050918,29.3563513 24.8767755,29.2546996 C25.0484592,29.1530478 25.2614334,29.1477676 25.4380509,29.240784 L32.8559832,33.1913382 C33.0405318,33.2898568 33.1555686,33.4805604 33.1555686,33.6879793 C33.1555686,33.8953983 33.0405318,34.0861019 32.8559832,34.1846204 Z" id="Shape" fill="#FFFFFF" fill-rule="nonzero"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="lob-slide-content">
                                                <div class="lob-slider-label">Filmopdracht</div>
                                                <h3 class="lob-slider-title">Maak een <span class="u-primary">promotiefilm</span> van een <span class="u-primary">beroep</span></h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>



                                <div class="swiper-slide lob-slide-alt">
                                <a href="#">
                                    <div class="c-card c-slide-card lob-card">
                                        <div class="c-article-item__media"><img src="/media/flysystem/a6281691cc578b2dcd6ffaa68b0e79f5112c424d_1626084852/fit_crop-50-50-fm_jpg-id_615-width_584-height_438.jpg" alt="" class="c-article-item__image"></div>
                                        <div class="lob-slide-icon">
                                            <?xml version="1.0" encoding="UTF-8"?>
                                                <svg width="58px" height="58px" viewBox="0 0 58 58" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>Group 2</title>
                                                    <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="OpKop-Filmopdracht" transform="translate(-100.000000, -183.000000)">
                                                            <g id="Group" transform="translate(96.000000, 183.000000)">
                                                                <g id="Group-2" transform="translate(4.000000, 0.000000)">
                                                                    <circle id="Oval" fill="#00C866" cx="28.9999983" cy="28.9999983" r="28.9999983"></circle>
                                                                    <path d="M43.4293898,24.3759587 L18.995862,24.3759587 L21.0101159,23.8793176 L24.5250746,23.0158393 L27.6463123,22.2483031 L31.161271,21.3848248 L34.299627,20.6172885 L42.7047149,18.551713 C43.0102483,18.476704 43.1966411,18.1711331 43.1212603,17.8688315 L42.4365281,15.1316618 C42.273983,14.4381169 41.8493371,13.8323503 41.2496589,13.4385671 C41.2178583,13.4185948 41.1832477,13.4033807 41.1469491,13.393418 C40.4955008,13.0120977 39.7175392,12.9024668 38.9843365,13.0886609 L37.7803491,13.3821307 L34.6534053,14.132736 L31.1327405,15.0018579 L28.022915,15.7693941 L24.4851319,16.6328724 L23.4180909,16.8924803 L15.1670677,18.9185502 C14.4321473,19.0986037 13.7997255,19.5601971 13.4090831,20.2016718 C13.0184408,20.8431465 12.9016171,21.611891 13.0843406,22.3386014 L13.7576606,25.0080474 L13.7576606,40.1781756 C13.7576606,41.7366262 15.035015,43 16.6107115,43 L41.1469491,43 C42.7226456,43 44,41.7366262 44,40.1781756 L44,24.9403236 C44,24.6286335 43.7445291,24.3759587 43.4293898,24.3759587 Z M38.2938982,14.4092748 L39.2753477,14.1665979 C39.5469938,14.0996852 39.8310864,14.0996852 40.1027325,14.1665979 L37.3181548,18.7323098 L35.3609619,19.21202 L38.2938982,14.4092748 Z M31.6348774,16.0402893 L33.5920704,15.5605791 L30.6762523,20.3463934 L28.7190594,20.8261035 L31.6348774,16.0402893 Z M24.9872689,17.6713038 L26.9444618,17.1915937 L24.0286438,21.9774079 L22.0714509,22.4571181 L24.9872689,17.6713038 Z M15.4694911,20.0134181 L20.3253837,18.8226082 L17.4095657,23.6140661 L14.7448162,24.2574421 L14.174206,22.0677063 C14.065412,21.6293439 14.1438315,21.1660178 14.3910379,20.786598 C14.630245,20.3954404 15.0192124,20.1165764 15.4694911,20.0134181 Z M32.8559832,34.1846204 L25.4380509,38.1351747 C25.3556298,38.1791767 25.2635246,38.2024356 25.1698641,38.2028984 C24.8547248,38.2028984 24.5992539,37.9502237 24.5992539,37.6385336 L24.5992539,29.7374251 C24.5997871,29.53952 24.7050918,29.3563513 24.8767755,29.2546996 C25.0484592,29.1530478 25.2614334,29.1477676 25.4380509,29.240784 L32.8559832,33.1913382 C33.0405318,33.2898568 33.1555686,33.4805604 33.1555686,33.6879793 C33.1555686,33.8953983 33.0405318,34.0861019 32.8559832,34.1846204 Z" id="Shape" fill="#FFFFFF" fill-rule="nonzero"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="lob-slide-content">
                                                <div class="lob-slider-label">Filmopdracht</div>
                                                <h3 class="lob-slider-title">Maak een <span class="u-primary">promotiefilm</span> van een <span class="u-primary">beroep</span></h3>
                                            </div>
                                        </div>
                                    </a>
                                </div>



<!-- EINDE SCROLLER -->




                                
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
