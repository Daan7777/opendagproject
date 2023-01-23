<?php 


    $imgpath = $_GET['img'];
    unlink( $imgpath );
    //the above function will delete the required image from your folder.
    header('Location: /images');
?>