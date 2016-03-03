<?php
    $advertiserObj = new Advertiser();
    $listAdvertiser = $advertiserObj->get_all();
    ?>
    <div id="base_layout_body_right_content_title">
        <span>Listado de los Organismos Públicos</span>
    </div>
    <div id="base_layout_body_right_content_table_header">
        <table class="tableHeader">
            <tr>
                <td style="width: 10%;">
                    <?php echo "ID" ?>
                </td>
                <td style="width: 75%;">
                    <?php echo "Nombre"; ?>
                </td>
                <td style="width: 15%;">
                    <?php echo "Borrar"; ?>
                </td>                
            </tr>
        </table>    
    </div>     
    <div id="base_layout_body_right_content">
            <table class="tableBody">
                <?php foreach ($listAdvertiser as $advertiser) { ?>
                    <tr>
                        <td style="width: 10%">
                            <?php echo $advertiser->id(); ?>
                        </td>
                        <td style="width: 75%">
                            <?php echo $advertiser->name(); ?>
                        </td>
                        <td style="width: 15%;">
                            <input type="submit" value="<?php echo "Borrar"; ?>" onclick="deleteObject('advertiser', <?php echo $advertiser->id(); ?>);">
                        </td>                        
                    </tr>                        
                <?php } ?>

            </table>
            <div style="height: 100px;"></div>
    </div>
