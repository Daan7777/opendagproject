<?php 

// #### THIS NEEDS TO BE THE USERID FROM THE SESSION !!! #####
$user= 22;
// #### THIS NEEDS TO BE THE USERID FROM THE SESSION !!! #####
  
$directory = "uploads/".$user."/";

echo "pad is " .$directory."<br><br>";

$images = glob($directory . "/*.jpg");

foreach($images as $image)
{
    echo "<img src=".$image ." width='200px;'><br>";
    echo "<a href='image-delete?img=".$image."'>delete</a><br><br>";
}?>


