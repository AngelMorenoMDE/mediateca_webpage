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
                    <span><b>Paso 1.</b> Correo electrónico válido</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="emailCreateMyUserForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Paso 2.</b> Nombre y Apellidos</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="realNameCreateMyUserForm">
                </div>
            </div> 
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Paso 3.</b> Contraseña de Usuario</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="password" id="passwordCreateMyUserForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Paso 4.</b> Confirme la contraseña</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="password" id="confirmPasswordCreateMyUserForm">
                </div>
            </div>            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Política de Privacidad</b></span>
                </div>                
                <div id="base_layout_body_right_content_form_row_field">
                    <textarea id="privacyPolicyCreateMyUserForm">
En cumplimiento de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, le informamos que los datos personales que suministre a través del portal www.mapi.gob.es, vía telefónica, o por correo electrónico serán tratados de forma confidencial y pasarán a formar parte de un fichero titularidad del Grupo de Investicación Kybele, Universidad Rey Juan Carlos que ha sido debidamente inscrito en la Agencia Española de Protección de Datos (www.agpd.es). Sus datos personales serán utilizados para atender su petición de información, la gestión y prestación de los servicios ofrecidos por www.mapi.gob.es, y para el envío de futuras comunicaciones que pudieran ser de su interés.

Asimismo, le informamos que puede ejercitar sus derechos de acceso, rectificación, cancelación y oposición con arreglo a lo previsto en la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, enviando una carta junto con la fotocopia de su DNI, a la siguiente dirección: Grupo de Investigación Kybele, Universidad Rey Juan Carlos, C/Tulipán, S/N, 28932, Móstoles (Madrid).

El Usuario garantiza que los datos personales facilitados son veraces y se hace responsable de comunicar cualquier modificación en los mismos. El Usuario será el único responsable de cualquier daño o perjuicio, directo o indirecto, que pudiera ocasionar a www.mapi.gob.es, a causa de la cumplimentación de los formularios con datos falsos, inexactos, incompletos o no actualizados. En el caso de que el Usuario incluya datos de carácter personal de terceros deberá, con carácter previo a su inclusión, informarles de lo establecido en la presente política de privacidad, siendo el único responsable de su inclusión.
                    </textarea>
                </div>                
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="checkbox" id="confirmPrivacyPolicyCreateMyUserForm"> <span>He leido, comprendo y Acepto la Política de Privacidad</span>
                    <span class="asterisk">*</span>
                </div>
            </div>     
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Registrarme" onclick="validateForm('registerMeForm');">
                    <input type="submit" value="Cancelar" onclick="cancelForm('registerMeForm');">
                </div>
            </div>
        </div>
    </div>
