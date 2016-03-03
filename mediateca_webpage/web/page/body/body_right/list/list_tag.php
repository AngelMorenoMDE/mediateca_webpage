    <?php
    $tagObj = new Tags();
    $listTags = $tagObj->get_all();
    ?>
    <div id="base_layout_body_right_content_title">
        <span>Listado de los Públicos Objetivos</span>
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
                <?php foreach ($listTags as $tag) { ?>
                    <tr>
                        <td style="width: 10%">
                            <?php echo $tag->id(); ?>
                        </td>
                        <td style="width: 75%">
                            <?php echo $tag->name(); ?>
                        </td>
                        <td style="width: 15%;">
                            <input type="submit" value="<?php echo "Borrar"; ?>" onclick="deleteObject('tag', <?php echo $tag->id(); ?>);">
                        </td>
                    </tr>                        
                <?php } ?>

            </table>
            <div style="height: 100px;"></div>
        </div>
    </div>