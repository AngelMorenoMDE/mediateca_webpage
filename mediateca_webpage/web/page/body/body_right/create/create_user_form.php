<?php
    
    $userRoleObj = new UserRole();
    $userRoles = $userRoleObj->get_all();
    
?>

    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Creación de nuevos Usuarios</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Correo electrónico: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="emailCreateUserForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Nombre y Apellidos: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="realNameCreateUserForm">
                </div>
            </div> 
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Contraseña: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="password" id="passwordCreateUserForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Confirmación de contraseña: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="password" id="passwordConfirmCreateUserForm">
                </div>
            </div>             
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Rol de Usuario: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select id="userRolCreateUserForm">
                        <?php foreach ($userRoles as $userRole) { ?>
                                <option value="<?php echo $userRole->id(); ?>"><?php echo $userRole->name(); ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>      
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Crear Usuario" onclick="validateForm('createUserForm');">
                    <input type="submit" value="Cancelar" onclick="cancelForm('createUserForm');">
                </div>
            </div>
        </div>
    </div>

