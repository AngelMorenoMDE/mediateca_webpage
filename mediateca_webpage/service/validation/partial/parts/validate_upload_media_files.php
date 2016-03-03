<?php

        if (isset($_POST["files"]) && isset($_POST["sizes"])) 
        {
            echo "\nVar: \"files\" inicializada";
            
            echo "\n Nº Files: ".count($_POST["files"]);
            $files = $_POST["files"];
            $sizes = $_POST["sizes"];
            for($i=0; $i<count($_POST["files"]); $i++)
            {
                echo "\nFile $i: ".$files[$i];
                echo " Size: ".$sizes[$i];

            }

        }
?>
