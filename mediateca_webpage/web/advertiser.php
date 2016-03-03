<?php

        require_once "ini.php";
        System::checkSession();
	System::setBackPage("advertiser.php");
        
	if (!System::isAdministratorLogged())
	{
		System::goToPage("campaigns.php");
	}
        
        $error_delete = false;
	$error_advertiser_name = "";
	$advertiser_name = new TextField("advertiser_name");
	$validator_advertiser_name = new Validator($advertiser_name->value(), array(Validator::$NOT_EMPTY, Validator::$ONLY_ALPHANUMERIC));
	
	
	
	if (Request::Contains("advertiser_save") && ($error_advertiser_name == ""))
	{
		$error_advertiser_name = $validator_advertiser_name->check();
		$advertiser = new Advertiser();
		$advertiser->name(Request::Get("advertiser_name"));
		if ($error_advertiser_name == "") $advertiser->save();
	}
	else
	{
		$error_advertiser_name = "";
	}
        
        if (Request::Contains("advertiser_delete"))
        {
            $campaign = new Campaign();
            $campaign->advertiser(Request::Get("advertiser_delete"));
            $count = count($campaign->get_all());
            
            $advertiser = new Advertiser();
            $advertiser->id(Request::Get("advertiser_delete"));   
            $advertiser->get();
            
            if ($count)
            {
                $error_delete = true;
            }
            else
            {             
                $advertiser->delete();
                $error_delete = false;
            }

        }
        
        $sidebar = new MediatecaBar("sidebar"); 
        
        $htmlListAdvertisers = "";
        $advertiser = new Advertiser();					
        $advertisers = $advertiser->get_all();

        if (count($advertisers)==0)
        {
            $htmlListAdvertisers = Html::TABLE(Html::TR(Html::TD("No hay Organismos registrados")));
        }
        else
        {
            $htmlListAdvertisers = Html::THEAD(Html::TR(Html::TD("Eliminar").Html::TD("Nombre del Organismo")));

            for ($index = 0; $index < count($advertisers); $index++) 
            {
                $del_btn = Html::IMAGEACTION(Config::getDefaultPathWebImages()."delete.png", "advertiser_delete", $advertisers[$index]->id());
                $htmlListAdvertisers .= Html::TR(Html::TD($del_btn).Html::TD($advertisers[$index]->name()));
            }

            $htmlListAdvertisers = Html::FORM("form_delete_advertiser", "advertiser.php", Config::getFormMethod(), Html::TABLE(Html::TBODY($htmlListAdvertisers)));
        }        
        
        $htmlAddAdvertiser = "";
        $htmlAddAdvertiser = Html::C5ROW("Nombre del Organismo Público", $advertiser_name->render(), $error_advertiser_name);
        $htmlAddAdvertiser .= Html::C5ROW("", Html::SUBMIT("advertiser_save", "Crear nuevo organismo público"), "");
        $htmlAddAdvertiser = Html::FORM("advertiser_form", "", Config::getFormMethod(), Html::TABLE($htmlAddAdvertiser, "form"));        
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
    <?php if ($error_delete) { ?>
    <div id="menu-error">
        <div id="menu-error-body">
            
            <table class="menu-error-body-table" align="center">
                <tr>
                    <td><img src="images/alert32.png"></img></td>
                    <td><span>No se puede borrar el Organismo <?php echo "\"".$advertiser->name()."\""; ?> porque está asignado a una campaña.</span></td>
                    <td><img src="images/alert32.png"></img></td>
                </tr>
            </table>
            
        </div>
    </div> 
    <?php } ?>    
<body>
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
                    <h1>Organismos Públicos</h1>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span><?php echo "Listado de Organismos Públicos"?></span></h2>
			<hr>
			<p><?php echo "A continuación se muestra un listado de los Organismos Públicos registrados en el sistema.";?></p>			
			<p>				
                            <div id="view2">
				<?php echo $htmlListAdvertisers; ?>
                            </div>
			</p>

		</div>
		<div id="fbox2">
			<h2><span><?php echo "Agregar Nuevo Organismo Público";?></span></h2>
			<hr>
			<p><?php echo "En esta sección podrá agregar nuevos Organismos Públicos que más tarde podrá seleccionar cuando cree una nueva campaña.";?></p>			
			<br>
			<p>				
				<?php echo $htmlAddAdvertiser; ?>
			</p>

		</div>		
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
