<?php

         
    $conex = mysqli_connect("localhost", "root", "d4fn3d4t4b4s3", "mediateca");
    if (!$conex)
    {
        echo mysqli_error($conex);
        die();
    }                
?>
