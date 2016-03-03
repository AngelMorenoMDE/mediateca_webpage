<?php
    require_once "ini.php";
	SYSTEM::CHECK_SESSION();
	if (!SYSTEM::ADMIN_MODE())
	{
		SYSTEM::GO("campaigns.php");
	}
        
        if (array_key_exists("tag_delete", $_POST))
        {
            $tag = new Tags();
            $tag->id($_POST["tag_delete"]);
            
            $tagCampaign = new TagCampaign();
            $tagCampaign->id_tag($_POST["tag_delete"]);
            $tagCampaign->delete();
            $tag->delete();
        }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
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
                <h1>Etiquetas</h1>
            </div>

	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span><?php echo "Listado de Etiquetas";?></span></h2>
			<hr>
			<p><?php echo "A continuación se muestra un listado con las etiquetas que el sistema ha creado."; ?></p>
			<p>		
                            <div id='view2'>
				<?php 

					
					$tag = new Tags();	
                                        $tag->order_by("name", DBOrder::$ASC);
					$tags = $tag->get_all();

                                        $table = Html::THEAD(Html::TR(Html::TD("Eliminar").Html::TD("Nombre de Etiqueta")));

                                        
                                        for ($index = 0; $index < count($tags); $index++) 
                                        {
                                            $del_btn = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."delete.png", "tag_delete", $tags[$index]->id());
                                            $table .= Html::TR(Html::TD($del_btn).Html::TD($tags[$index]->name()));
                                        }
                                        
                                        echo Html::FORM("tags_form", "tags.php", "POST", Html::TABLE(Html::TBODY($table)));
                                                

				?>
                                </div>
			</p>

		</div>
	
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>