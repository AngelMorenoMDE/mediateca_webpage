<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Formulario para recuperación de la contraseña de usuario</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Email con el que se registró en MAPI:</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="emailRecoverMyPasswordForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Recuperar Contraseña" onclick="validateForm('recoverMyPasswordForm');">
                    <input type="submit" value="Cancelar" onclick="cancelForm('recoverMyPasswordForm');">
                </div>
            </div>
        </div>
    </div>  