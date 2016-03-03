    <?php
    $userRoleObj = new UserRole();
    $listUserRoles = $userRoleObj->get_all();
    $listUserRoles = toArrayAssoc($listUserRoles);
    
    $userObj = new User();
    $listUsers = $userObj->get_all();
    ?>
    <div id="base_layout_body_right_content_title">
        <span>Listado de los Usuarios del Sistema</span>
    </div>
    <div id="base_layout_body_right_content_table_header">
        <table class="tableHeader">
            <tr>
                <td style="width: 30%;"><?php echo "Nombre" ?></td>
                <td style="width: 35%;"><?php echo "Email"; ?></td>
                <td style="width: 20%;"><?php echo "Rol"; ?></td>
                <td style="width: 15%;"><?php echo "Borrar"; ?></td>
            </tr>
        </table>    
    </div>    
    <div id="base_layout_body_right_content">      
            <table  class="tableBody">
                <?php foreach ($listUsers as $user) { ?>
                    <tr>
                        <td style="width: 30%"><?php echo $user->name(); ?></td>
                        <td style="width: 35%"><?php echo $user->email(); ?></td>
                        <td style="width: 20%"><?php echo $listUserRoles[$user->rol()]; ?></td>
                        <td style="width: 15%;">
                            <input type="submit" value="<?php echo "Borrar"; ?>" onclick="deleteObject('user', <?php echo $user->id(); ?>);">
                        </td>                         
                    </tr>                        
                <?php } ?>

            </table>
            <div style="height: 100px;"></div>

    </div>