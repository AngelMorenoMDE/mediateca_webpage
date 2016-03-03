<?php
    
    $userRoleObj = new UserRole();
    $userRoles = $userRoleObj->get_all();
    
?>

    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Formulario para la creación de nuevos Usuarios</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Email: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="nameCreateUserForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Nombre real: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="nameRealCreateUserForm">
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
                    <span>Rol: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select name="rolCreateUserForm">
                        <?php foreach ($userRoles as $userRole) { ?>
                                <option value="<?php echo $userRole->id(); ?>"><?php echo $userRole->name(); ?></option>
                        <?php } ?>

                    </select>
                </div>
            </div>      
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Crear Usuario" onclick="validateForm('CreateUserForm');">
                    <input type="submit" value="Cancelar" onclick="cancelForm('createUserForm');">
                </div>
            </div>
        </div>
    </div>

