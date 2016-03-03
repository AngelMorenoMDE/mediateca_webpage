<?php
    require_once "ini.php";
    SYSTEM::CHECK_SESSION();
    SYSTEM::SET_BACK("targetpeople.php");
    
    if (!SYSTEM::ADMIN_MODE())
    {
        SYSTEM::GO("campaigns.php");
    }
    
    $error_delete = false;
    $count = 0;
    $error_targetpeople_name = "";
    $targetpeople_name = new TextField("targetpeople_name");	
    $validator_campaign_code = new Validator($targetpeople_name->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));

	
	
	if ((array_key_exists("targetpeople_save", $_POST)) && ($error_targetpeople_name == ""))
	{
		$error_targetpeople_name = $validator_campaign_code->check();
		$targetpeople = new TargetPeople();
		$targetpeople->name($_POST["targetpeople_name"]);
		if ($error_targetpeople_name == "") 
                    $targetpeople->save();
	}
	else
	{
		$error_targetpeople_name = "";
	}
        
        if (array_key_exists("targetpeople_delete", $_POST))
        {
            $error_delete = true;
            
            $campaign = new Campaign();
            $campaign->target_people($_POST["targetpeople_delete"]);
            $count = count($campaign->get_all());

            $target_people = new TargetPeople();
            $target_people->id($_POST["targetpeople_delete"]);
            $target_people->get();
            
            if ($count)
            {
                $error_delete = true;
            }
            else
            {
                $target_people->delete();
                $error_delete = false;
            }

        }
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
<body>
    <?php if ($error_delete) { ?>
    <div id="menu-error">
        <div id="menu-error-body">
            
            <table class="menu-error-body-table" align="center">
                <tr>
                    <td><img src="images/alert32.png"></img></td>
                    <td><span>No se puede borrar el público objetivo <?php echo "\"".$target_people->name()."\""; ?> porque está asignado a una campaña.</span></td>
                    <td><img src="images/alert32.png"></img></td>
                </tr>
            </table>
            
        </div>
    </div> 
    <?php } ?>
    <div id="menu-user">
        <div id="menu-user-wellcome">
            <span>Bienvenido, <?php echo SYSTEM::GET_REGISTER_USER()->name()."<a href='./exit.php'>SALIR</a>"; ?></span>
        </div>
    </div>  
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
            <div id="menu">
                <h1>Público Objetivo</h1>
            </div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span><?php echo "Listado de Público Objetivo"; ?></span></h2>
			<hr>
			<p><?php echo "A continuación se muestra un listado con los Públicos Objetivo a los cuales van dirigidas las campañas de publicidad"; ?></p>
			<p>		
                            <div id='view2'>
				<?php 
				
					$target_people = new TargetPeople();					
					$tags = $target_people->get_all();
                                                
                                        $table = Html::THEAD(Html::TR(Html::TD("Eliminar").Html::TD("Público Objetivo")));

                                        
                                        for ($index = 0; $index < count($tags); $index++) 
                                        {
                                            $del_btn = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."delete.png", "targetpeople_delete", $tags[$index]->id());
                                            $table .= Html::TR(Html::TD($del_btn).Html::TD($tags[$index]->name()));
                                        }
                                        
                                        echo Html::FORM("tags_form", "targetpeople.php", "POST", Html::TABLE(Html::TBODY($table)));
				?>
                                </div>
			</p>

		</div>
		<div id="fbox2">
			<h2><span><?php echo "Agregar Nuevo Público Objetivo";?></span></h2>
			<hr>
			<p><?php echo "En esta sección podrá agregar nuevos Públicos Objetivo que más tarde podrá seleccionar cuando cree una nueva campaña."; ?></p>			
			<br>
			<p>				
				<?php 					
					
					$tr = Html::C5ROW("Nombre del Público Objetivo", $targetpeople_name->render(), $error_targetpeople_name);
					$tr .= Html::C5ROW("", Html::SUBMIT("targetpeople_save", "Crear nuevo Público Objetivo"), "");
					echo Html::FORM("campaign_form", "", "POST", Html::TABLE($tr, "form"));

				?>
			</p>

		</div>		
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
