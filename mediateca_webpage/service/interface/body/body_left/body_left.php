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

<?php } else if (isset($_POST["go"]) && ($_POST["go"]=="createUserForm")) { ?>
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
        Si desea crear un nuevo Público Objetivo pulse el siguiente botón.<br><br>
        <div id="base_layout_body_left_content_row_link" onclick="go('createTargetPeople')">
            Crear Público Objetivo
        </div>        
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
        Opciones     
    </div>
    <div id="base_layout_body_left_content_row">
        Si desea crear un nuevo Público Objetivo pulse el siguiente botón.<br><br>
        <div id="base_layout_body_left_content_row_link" onclick="go('createAdvertiser')">
            Crear Nuevo Organismo Público
        </div>        
    </div>    
</div>
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
        Opciones     
    </div>
    <div id="base_layout_body_left_content_row">
        Si desea crear un nuevo Público Objetivo pulse el siguiente botón.<br><br>
        <div id="base_layout_body_left_content_row_link" onclick="go('createAdvAgency')">
            Crear Nuevo Ministerio
        </div>        
    </div>    
</div>
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
        Opciones     
    </div>
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_link" onclick="go('createUserForm')">
            Crear Nuevo Usuario
        </div>        
    </div>    
</div>
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
        
        <div id="base_layout_body_left_content_row_input" onclick="modifyObject('campaign', <?php echo $_POST["id_campaign"]; ?>)">
            <span>Modificar Campaña</span>
        </div>     
        <?php 
        if (isset($_POST["id_campaign"]))
        {
            $id_campaign =$_POST["id_campaign"];
        }
        else
            $id_campaign = -1;
        ?>
        <div id="base_layout_body_left_content_row_input" onclick="deleteObject('campaign', <?php echo $id_campaign; ?>)">
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
<?php } if (isset($_POST["go"]) && ($_POST["go"]=="recoverMyPassword")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho se visualiza el formulario que le permitirá recuperar
        el acceso a su cuenta.
    </div>    
</div>
<?php } if (isset($_POST["go"]) && ($_POST["go"]=="viewLogin")) { ?>

    <?php require_once "/menu/menu_login.php"; ?>
<?php } if (isset($_POST["go"]) && ($_POST["go"]=="createMediaFTP")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho se visualiza la lista de los ficheros que han sido subidos vía FTP al servidor.
        <br><br>
        Para asignar los ficheros a la campaña seleccionada, realice los siguientes pasos:
        <br><br>
         1. Seleccione la campaña a la cual desea asociar los ficheros FTP listados.<br><br>         
         2. Marque las casillas de los ficheros que desea vincular.<br><br>
         3. Indique el nombre virtual que desea asociar al fichero FTP.<br><br>
         4. Indique el tipo de publicidad que representa cada fichero FTP.
    </div>    
</div>
<?php } if (isset($_POST["go"]) && ($_POST["go"]=="modifyCampaign")) { ?>
<div id="base_layout_body_left_content">
     <div id="base_layout_body_left_content_title">
        Ayuda ( ? )       
    </div>
    <div id="base_layout_body_left_content_row">
        En el lado derecho se visualiza el formulario que le permitirá modificar
        los datos de la Campaña Publicitaria seleccionada en el buscador.
        <br>
        <br>
        Los campos marcados con un asterisco rojo <span class="asterisk">*</span> son campos obligatorios.
    </div>    
</div>
<?php } ?>