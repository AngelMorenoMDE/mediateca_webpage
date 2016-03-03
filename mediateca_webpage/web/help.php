<?php
	require_once '..\\CONFIG\\PATHS.php';
	
	SPED(SPEED.SPD.IU);
	SPED(MEDIATECA.CORE);
	
	require_once SPEED.SPD.SYSTEM;	
	SYSTEM::INIT_SESSION();
	SYSTEM::CHECK_SESSION();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
<body>
    <div id="menu-user">
        <div id="menu-user-wellcome">
            <span>Bienvenido, <?php echo SYSTEM::GET_REGISTER_USER()->name(); ?></span>
        </div>
    </div>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="campaigns.php">mediateca</a></h1>
		</div>

	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span>FAQ - Ayuda de Mediateca</span></h2>
			<hr/>
			<p>				
				<?php 


				?>
			</p>

		</div>
	
	</div>
</div>
<?php require_once "foot.php"; ?>
</body>
</html>