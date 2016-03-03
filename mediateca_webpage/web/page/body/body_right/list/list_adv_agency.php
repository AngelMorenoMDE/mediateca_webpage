    <?php
    $advAgencyObj = new AdvAgency();
    $listAdvAgency = $advAgencyObj->get_all();
    ?>
    <div id="base_layout_body_right_content_title">
        <span>Listado de los Ministerios</span>
    </div>
    <div id="base_layout_body_right_content_table_header">
        <table class="tableHeader">
            <tr>
                <td style="width: 10%;"><?php echo "ID" ?></td>
                <td style="width: 75%;"><?php echo "Nombre"; ?></td>
                <td style="width: 15%;"><?php echo "Borrar"; ?></td>                
            </tr>
        </table>    
    </div>     
    <div id="base_layout_body_right_content">
            <table class="tableBody">
                <?php foreach ($listAdvAgency as $advAgency) { ?>
                    <tr>
                        <td style="width: 10%">
                            <?php echo $advAgency->id(); ?>
                        </td>
                        <td style="width: 75%">
                            <?php echo $advAgency->name(); ?>
                        </td>
                        <td style="width: 15%;">
                            <input type="submit" value="<?php echo "Borrar"; ?>" onclick="deleteObject('advAgency', <?php echo $advAgency->id(); ?>);">
                        </td>                         
                    </tr>                        
                <?php } ?>
                    
            </table>
            <div style="height: 100px;"></div>
        </div>
    </div>