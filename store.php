<?php


// #### THIS NEEDS TO BE THE USERID FROM THE SESSION !!! #####
    $user= 22;
// #### THIS NEEDS TO BE THE USERID FROM THE SESSION !!! #####
  
  
  
    //Stores the filename as YEARMONTHDAYHOURMINUTESSECONDS to make it unique per user.
    $imagename = date("Ymdhis").".jpg";
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['pic1']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['pic1']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['pic1']['tmp_name'];

    //The path you wish to upload the image to
    $imagePath = "uploads/".$user."/";

    echo "pad is " .$imagePath;

    if (!is_dir($imagePath))
    {
       mkdir($imagePath, 0777, true);
   }




    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }

?>