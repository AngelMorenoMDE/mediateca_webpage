<?php

	require_once '../CONFIG/PATHS.php';
	SPED(MEDIATECA.CORE);
	SPED(SPEED.SPD.IU);

	require_once SPEED.SPD.WEB.Html;
	require_once SPEED.SPD.SYSTEM;
	SYSTEM::INIT_SESSION();
	SYSTEM::CHECK_SESSION();
	if (!SYSTEM::ADMIN_MODE())
	{
		SYSTEM::GO("campaigns.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
<body>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">MAPI</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li class="current_page_item"><a href="#" accesskey="1" title="">Inicio</a></li>
				<li><a href="#" accesskey="3" title="">Registro</a></li>
				<li><a href="#" accesskey="4" title="">Ayuda</a></li>
			</ul>
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span>Presencia en medios</span></h2>
			<p>				
				<?php 
					$c = new Campaign();
					$c->create_form();
				?>
			</p>

		</div>
	</div>
</div>
<?php require_once "foot.php"; ?>
</body>
</html>
