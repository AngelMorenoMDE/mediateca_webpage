<?php

require_once speed . iu . menu . sidebar;
require_once speed . iu . widgets . imagelinkbutton;
require_once speed . web. html;

class MediatecaBar extends SideBar
{
	public function __construct($name)
	{
		$this->name($name);
	}
	
	private function generate_user_menu()
	{
		$this->items(array());
	
                if ($this->get_actual_page() == "full_details.php")
                {
                    $this->add_item(new ImageLinkButton("back.png", "campaigns.php", "search_campaign", "Volver al Buscador"));
                }
                

		
		if(($this->get_actual_page() != "campaigns.php") && ($this->get_actual_page() != "full_details.php"))
		{
			$this->add_item(new ImageLinkButton("star.png", "campaigns.php", "show_campaign", "Ver Campañas"));
		}
		
//		if($this->get_actual_page() != "adscampaign.php")
//		{
//			$this->add_item(new ImageLinkButton("radio.png", "adscampaign.php", "show_ads_campaign", "Anuncios en Medios"));
//		}
		
//		if($this->get_actual_page() != "help.php")
//			$this->add_item(new ImageLinkButton("help.png", "help.php", "help", "Ayuda"));
			
		if($this->get_actual_page() == "help.php")
		{
			if(array_key_exists("back", $_SESSION))
				$this->add_item(new ImageLinkButton("back.png", $_SESSION["back"], "back", "Volver Atrás"));
		}
                $this->add_item(new ImageLinkButton("media.png", "upload_media.php", "media", "Archivos Multimedia"));
		$this->add_item(new ImageLinkButton("exit.png", "exit.php", "exit", "Salir"));		
	}
	
	private function generate_admin_menu()
	{
		$this->items(array());
                /*if ($this->get_actual_page() == "full_details.php")
                {
                    $this->add_item(new ImageLinkButton("back.png", "campaigns.php", "search_campaign", "Volver al Buscador"));
                }    */         

                    $this->add_item(new ImageLinkButton("search.gif", "campaigns.php", "campaigns", "Buscador de Campañas"));
                    $this->add_item(new ImageLinkButton("new_campaign.png", "new_campaign.php", "create_campaign", "Crear Campaña"));
                    $this->add_item(new ImageLinkButton("targetpeople.png", "targetpeople.php", "target_people", "Público Objetivo"));
                    $this->add_item(new ImageLinkButton("advertiser.png", "advertiser.php", "advertiser", "Organismos Públicos"));
                    $this->add_item(new ImageLinkButton("advagency.png", "advagency.php", "adv_agency", "Anunciantes"));
                    $this->add_item(new ImageLinkButton("tags.png", "tags.php", "tag", "Etiquetas"));
                    $this->add_item(new ImageLinkButton("users.png", "users.php", "users", "Gestor de Usuarios"));
                    $this->add_item(new ImageLinkButton("media.png", "upload_media.php", "media", "Archivos Multimedia"));
                    $this->add_item(new ImageLinkButton("autocharge.png", "remote_uploads.php", "autocharge", "Autocarga FTP"));
                    $this->add_item(new ImageLinkButton("statistics.gif", "statistics.php", "statistics", "Estadísticas"));                 
	}


	
	public function render()
	{	
		
//		$this->generate_user_menu();
//		echo "<h2><span>"."Menú Principal"."</span></h2>";
//		echo "<ul class='style2'>";
//		echo "<li>";
//		echo Html::FORM($this->name()."_user", $this->get_actual_page(), "POST", $this->generate());
//		echo "</li>";
//		echo "<li></li>";
//		echo "</ul>";
		
		if (SYSTEM::ADMIN_MODE())
		{
			$this->generate_admin_menu();
			echo "<h2><span>"."Menú Administración"."</span></h2>";
			echo "<ul class='style2'>";
			echo "<li>";
			echo Html::FORM($this->name()."_admin", $this->get_actual_page(), "POST", $this->generate());
			echo "</li>";
			echo "<li></li>";
			echo "</ul>";
		}
	}
}