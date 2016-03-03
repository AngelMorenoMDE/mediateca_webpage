<?php 
$action = "";
if (isset($_POST["action"]))
{
    $action = $_POST["action"];
}

$object = "";
if (isset($_POST["object"]))
{
    $object = $_POST["object"];
}

?>

<?php if ($action == "fail") { ?>

<?php } ?>
    

<?php if ($action=="delete") { ?>

    <?php if (Config::getDebugModeService()) echo "Action: Delete"; ?>


    <?php if(isset($_POST["obj"])) { ?>

        <div id="notification_area_red">
                    
        <?php if (isset($_POST["obj"]) && ($_POST["obj"]=="targetPeople")) { ?>         

                        <span>¿Está seguro de que desea eliminar el Público Objetivo Seleccionado?</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="SI" onclick="confirmDeletionObject(<?php echo "'".$_POST["obj"]."',".$_POST["id"]; ?>);">
                            <input type='submit' value="NO" onclick="cancelConfirm();">
                        </div>

        <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="advertiser")) { ?>

                        <span>¿Está seguro de que desea eliminar el Organismo Público Seleccionado?</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="SI" onclick="confirmDeletionObject(<?php echo "'".$_POST["obj"]."',".$_POST["id"]; ?>);">
                            <input type='submit' value="NO" onclick="cancelConfirm();">
                        </div>

        <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="advAgency")) { ?>

                        <span>¿Está seguro de que desea eliminar el Ministerio Seleccionado?</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="SI" onclick="confirmDeletionObject(<?php echo "'".$_POST["obj"]."',".$_POST["id"]; ?>);">
                            <input type='submit' value="NO" onclick="cancelConfirm();">
                        </div>                    

        <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="tag")) { ?>

                        <span>¿Está seguro de que desea eliminar la Etiqueta Seleccionada?</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="SI" onclick="confirmDeletionObject(<?php echo "'".$_POST["obj"]."',".$_POST["id"]; ?>);">
                            <input type='submit' value="NO" onclick="cancelConfirm();">
                        </div>                      

        <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="user")) { ?>

                        <span>¿Está seguro de que desea eliminar el Usuario Seleccionado?</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="SI" onclick="confirmDeletionObject(<?php echo "'".$_POST["obj"]."',".$_POST["id"]; ?>);">
                            <input type='submit' value="NO" onclick="cancelConfirm();">
                        </div>                    
        <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="campaign")) { ?>

                        <span>¿Está seguro de que desea eliminar la campaña publicitaria seleccionada?</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="SI" onclick="confirmDeletionObject(<?php echo "'".$_POST["obj"]."',".$_POST["id"]; ?>);">
                            <input type='submit' value="NO" onclick="cancelConfirm();">
                        </div>                    
        <?php } ?>                    
        </div>
    <?php } ?>


    <?php if (isset($_POST["form"]) && ($_POST["form"]=="deleteUserForm")) { ?>
        <?php if (Config::getDebugModeService()) echo "Form: deleteUserForm"; ?>
                        <span>Se ha borrado con éxito el usuario seleccionado</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="OK" onclick="go('listUsers');">
                        </div>     
    <?php } ?>


<?php } else if ($action == "create") { ?>  
                    <div id="notification_area_green">
    <?php if (isset($_POST["obj"]) && ($_POST["obj"]=="targetPeople")) { ?>

                        <span>Se ha creado con exito un nuevo Público Objetivo</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="Crear uno nuevo" onclick="go('createTargetPeople');">
                            <input type='submit' value="Volver al listado" onclick="go('listTargetPeople');">
                        </div>                    
                    
    <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="advertiser")) { ?>

                        <span>Se ha creado con exito un nuevo Organismo Público</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="Crear uno nuevo" onclick="go('createAdvertiser');">
                            <input type='submit' value="Volver al listado" onclick="go('listAdvertiser');">
                        </div>                    
    <?php } else if (isset($_POST["obj"]) && ($_POST["obj"]=="advAgency")) { ?>

                        <span>Se ha creado con exito un nuevo Ministerio</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="Crear uno nuevo" onclick="go('createAdvAgency');">
                            <input type='submit' value="Volver al listado" onclick="go('listAdvAgency');">
                        </div>    
    <?php } else if (isset($_POST["form"]) && ($_POST["form"]=="createUserForm")) { ?>

                        <span>Se ha creado con exito un nuevo Usuario</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="Crear un nuevo usuario" onclick="go('createUserForm');">
                            <input type='submit' value="Volver al listado" onclick="go('listUsers');">
                        </div>                         
    <?php } else if (isset($_POST["form"]) && ($_POST["form"]=="createCampaignForm")) { ?>

                        <span>Se ha creado con exito una nueva Campaña Publicitaria</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="Crear otra campaña" onclick="go('createCampaign');">
                            <input type='submit' value="Ver Listado de Campañas" onclick="go('campaignsSearcher');">
                        </div>  
    <?php } else if (isset($_POST["form"]) && ($_POST["form"]=="modifyCampaignForm")) { ?>

                        <span>Se ha modificado con éxito la Campaña Publicitaria</span>
                        <br>
                        <div id="notification_area_btns">
                            <input type='submit' value="Volver al Buscador" onclick="go('campaignsSearcher');">
                        </div>                          
    <?php } ?>                        
                        
                    </div>

<?php } ?>