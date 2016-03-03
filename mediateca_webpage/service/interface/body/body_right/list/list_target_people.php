
<?php     
    $targetPeopleObj = new TargetPeople();
    $listTargetPeople = $targetPeopleObj->get_all();
    ?>
    <div id="base_layout_body_right_content_title">
        <span>Listado de los Públicos Objetivos</span>
    </div>
    <div id="base_layout_body_right_content_table_header">
        <table class="tableHeader">
            <tr>

                <td style="width: 70%;">
                    <?php echo "Nombre"; ?>
                </td>
                <td style="width: 15%;">
                    <?php echo "Modificar"; ?>
                </td>
                <td style="width: 15%;">
                    <?php echo "Borrar"; ?>
                </td>                
            </tr>
        </table>    
    </div> 
    <div id="base_layout_body_right_content">
            <table class="tableBody">
                <?php foreach ($listTargetPeople as $targetPeople) { ?>
                    <tr>
                        <td style="width: 70%">
                            <?php echo $targetPeople->name(); ?>
                        </td>
                        <td style="width: 15%;">
                            <input type="submit" value="<?php echo "Modificar"; ?>" onclick="modifyObject('targetPeople', <?php echo $targetPeople->id(); ?>);">
                        </td>                        
                        <td style="width: 15%;">
                            <input type="submit" value="<?php echo "Borrar"; ?>" onclick="deleteObject('targetPeople', <?php echo $targetPeople->id(); ?>);">
                        </td>
                    </tr>                        
                <?php } ?>

            </table>
            <div style="height: 100px;"></div>
        </div>
    </div>