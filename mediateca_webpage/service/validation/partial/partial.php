<?php

        if ($debug) echo "\nType: Partial";
        if ((isset($_POST["form"])) && ($_POST["form"] == "uploadMediaForm")) 
        {
            if ($debug) echo "\nForm: uploadMediaForm";
            require_once "/parts/validate_upload_media_files.php";
        }
?>
