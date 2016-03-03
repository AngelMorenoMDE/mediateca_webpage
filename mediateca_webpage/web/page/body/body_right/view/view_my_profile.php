<?php 

    $user = Session::Get(Config::getSessionUserKey());
    print_r($user->email());
?>
<div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">            
            <div id="base_layout_body_right_content_form_row_title">
                <span>Mi Perfil de Usuario</span>
            </div>
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row_title_field">
                <span style='width:20%; margin-right: 2%'>Nombre Real:</span>
                <span><?php echo $user->name(); ?></span>
                <br>
                <span style='width:20%; margin-right: 2%'>Email:</span>
                <span><?php echo $user->email(); ?></span>
            </div>            
        </div>
    </div>
