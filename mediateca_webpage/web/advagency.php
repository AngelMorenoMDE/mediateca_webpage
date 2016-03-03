<?php
        require_once "ini.php";

        System::checkSession();
        System::setBackPage("advagency.php");
        
        if (!System::isAdministratorLogged())
	{
            System::goToPage("campaigns.php");
	}
        
        
        
	$error_advagency_name = "";
        $error_delete = false;
	$advagency_name = new TextField("advagency_name");

    
        
	$validator_advagency_name = new Validator($advagency_name->getValue(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));
	
	
	
	if ((Request::Contains("advagency_save")) && ($error_advagency_name == ""))
	{
		$error_advagency_name = $validator_advagency_name->check();
		$advagency = new AdvAgency();
		$advagency->name(Request::Get("advagency_name"));
		if ($error_advagency_name == "") $advagency->save();
	}
	else
	{
		$error_advagency_name = "";
	}
        
        if (Request::Contains("advagency_delete"))
        {
            $campaign = new Campaign();
            $campaign->adv_agency(Request::Get("advagency_delete"));
            $count = count($campaign->get_all());
            
            $advagency = new AdvAgency();
            $advagency->id(Request::Get("advagency_delete"));
            $advagency->get();
            
            if ($count)
            {
                $error_delete = true;
            }
            else
            {
             
                $advagency->delete();
                $error_delete = false;
            }
        }
        
        
	
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    
<?php    require_once commons . "head.php"; ?>
    
<body>
    <?php if ($error_delete) { ?>
    <div id="menu-error">
        <div id="menu-error-body">
            
            <table class="menu-error-body-table" align="center">
                <tr>
                    <td><img src="images/alert32.png"></img></td>
                    <td><span>No se puede borrar el Anunciante <?php echo "\"".$advagency->name()."\""; ?> porque está asignado a una campaña.</span></td>
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
                    <h1>Anunciantes</h1>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span><?php echo "Listado de Anunciantes"?></span></h2>
			<hr>
			<p><?php echo "A continuación se muestra un listado con los anunciantes registrados en el sistema.";?></p>			
			<p>		
                            <div id="view2">
				<?php 
				
					$advagency = new AdvAgency();					
					$advagencys = $advagency->get_all();

                                        if (count($advagencys)==0)
                                        {
                                            echo Html::TABLE(Html::TR(Html::TD("No hay ningún Anunciante registrado")));
                                        }
                                        else
                                        {
                                            $table = Html::THEAD(Html::TR(Html::TD("Eliminar").Html::TD("Nombre del Anunciante")));
                                        
                                            for ($index = 0; $index < count($advagencys); $index++) 
                                            {
                                                $del_btn = Html::IMAGEACTION(Config::getDefaultPathWebImages()."delete.png", "advagency_delete", $advagencys[$index]->id());
                                                $table .= Html::TR(Html::TD($del_btn).Html::TD($advagencys[$index]->name()));
                                            }

                                            echo Html::FORM("form_delete_advagency", "advagency.php", "POST", Html::TABLE(Html::TBODY($table)));
                                        }
                                        

				?> 
                                </div>
			</p>

		</div>
		<div id="fbox2">
			<h2><span><?php echo "Crear Nuevo Anunciante";?></span></h2>
			<hr>
			<p><?php echo "En esta sección podrá agregar nuevos Anunciantes que más tarde podrá seleccionar cuando cree una nueva campaña."?></p>			
			<br>
			<p>				
				<?php 					
					
					$tr = Html::C5ROW("Nombre del Anunciante", $advagency_name->render(), $error_advagency_name);
					$tr .= Html::C5ROW("", Html::SUBMIT("advagency_save", "Crear nuevo Anunciante"), "");
					echo Html::FORM("advagency_form", "", Config::getFormMethod(), Html::TABLE($tr, "form"));

				?>
                           
			</p>

		</div>		
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
