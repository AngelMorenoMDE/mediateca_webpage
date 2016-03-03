<?php

        if (isset($_FILES["files"]) && isset($_POST["fileNames"])&& isset($_POST["fileSizes"])) 
        {
            echo "\nVar: \"files\" inicializada";
            
            
            $files = $_FILES["files"];
            print_r($files);
            echo "\n Nº Files: ".count($files["name"]);
            $names = $_POST["fileNames"];
            $sizes = $_POST["fileSizes"];
            $virtualNames = $_POST["virtualNames"];
            print_r($virtualNames);
            for($i=0; $i<count($files["name"]); $i++)
            {
                echo "\nFile $i: ".$files["name"][$i];
                echo "\tVirtual Name: ".$virtualNames[$i];
                echo "\tSize: ".$sizes[$i];
            }

        }
        else
        {
            print_r($_FILES);
            //print_r($_POST);
        }
?>