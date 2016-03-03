<?php if (isset($_POST["go"]) && ($_POST["go"]=="createCampaign")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se visualiza el formulario que permite crear nuevas campañas publicitarias.
        <br>
        <br>
        Los campos marcados con un asterisco rojo <span class="asterisk">*</span> son campos obligatorios.
    </div>    
</div>

<?php } if (isset($_POST["go"]) && ($_POST["go"]=="createTargetPeople")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestran los detalles de la
        Campaña Publicitaria.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createAdvertiser")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestran los detalles de la
        Campaña Publicitaria.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createAdvAgency")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestran los detalles de la
        Campaña Publicitaria.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createUser")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestran el formulario que permite la creación de nuevos usuarios para el portal de Mediateca.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listTargetPeople")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Opciones     
    </div>
    <div id="base_layout_body_left_content_row">
        Si desea crear un nuevo Público Objetivo pulse el siguiente botón.<br>
        <input type="submit" name="createTargetPeople" value="Crear Nuevo" onclick="go('createTargetPeople')">
    </div>    
</div>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestra el listado de los Públicos Objetivos registrados en la base de datos de Mediateca.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listAdvertiser")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestra el listado de los Organismos Públicos registrados en la base de datos de Mediateca.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listAdvAgency")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestra el listado de los Ministerios registrados en la base de datos de Mediateca.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listTag")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestra el listado de las Etiquetas registradas en la base de datos de Mediateca.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="listUsers")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestra el listado de los Usuarios registrados en la base de datos de Mediateca.
    </div>    
</div>

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="campaignsSearcher")) { ?>

    <?php require_once "/menu/menu_search_campaign.php"; ?>

<?php } if (isset($_POST["go"]) && ($_POST["go"]=="detailsCampaign")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Acciones Disponibles      
    </div>
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_input" onclick="go('createMedia')">
            <span>Asociar Archivos Multimedia</span>
        </div>
        <div id="base_layout_body_left_content_row_input" onclick="go('createMediaFTP')">
            <span>Asociar Archivos Multimedia FTP</span>
        </div>        
        <div id="base_layout_body_left_content_row_input" onclick="go('modifyCampaign')">
            <span>Modificar Campaña</span>
        </div>     
        <div id="base_layout_body_left_content_row_input" onclick="go('deleteCampaign')">
            <span>Eliminar Campaña</span>
        </div>
    </div>    
</div>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho de la página se muestran los detalles de la
        Campaña Publicitaria.
    </div>    
</div>

<?php } if (isset($_POST["go"]) && ($_POST["go"]=="createMedia")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho se visualiza el formulario que permite subir nuevos
        archivos multimedia en la campaña que seleccione.        
    </div>    
</div>


<?php } if (isset($_POST["go"]) && ($_POST["go"]=="createMyUser")) { ?>
    
    <?php require_once "/menu/menu_create_new_user.php"; ?>

<?php } if (isset($_POST["go"]) && ($_POST["go"]=="viewMyProfile")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Acciones Disponibles      
    </div>
    <div id="base_layout_body_left_content_row">
        <input type="submit" value="Modificar Mi Perfil">
    </div>    
</div>

<?php } if (isset($_POST["go"]) && ($_POST["go"]=="viewLogin")) { ?>

    <?php require_once "/menu/menu_login.php"; ?>

<?php } ?>