<?php

    require_once "ini.php";


    if (System::isSomeOneLogged()) 
    {
            System::goToPage("campaigns.php");
    }

    // Interface definition

    $user_email = new TextField("user_email");
    $user_password = new PasswordTextField("user_pass", "");
    $errors = "";

    if (Post::Contains("loginBtnEvt"))
    {
            $userObj = new User();
            $userObj->email($user_email->value());
            $userObj->password($user_password->value());

            if ($userObj->exist())
            {
                    $userObj->get();

                    System::registerUser($userObj);
                    System::goToPage(Pages::Web_Campaigns());
            }
            else
            {

                    $errors = "Fallo de inicio de sessión";
            }
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <?php    require_once commons . "head.php"; ?>
    
<body>
<div id="menu-user">
    <div id="menu-user-wellcome">

    </div>
</div>
<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="index.php">MAPI</a></h1>
		</div>
		<div id="menu">
		</div>
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<h2><span><?php echo "Iniciar Sesión";?></span></h2>
			<ul class="style2">
				<li>
                                    
					<?php 
                                        
                                        echo Html::OPEN_FORM("form_login", "", "POST"); 
                                        
                                                echo Html::OPEN_TABLE();
						
                                                    echo Html::C3ROW("Email ", $user_email->render());
					
                                                    echo Html::C3ROW("Contraseña ", $user_password->render());
						
                                                    echo Html::C3ROW("", Html::SUBMIT("loginBtnEvt", "Iniciar Sesión"));
						
                                                    echo Html::C3ROW("", $errors);
						
                                                echo Html::CLOSE_TABLE();
                                                
					echo Html::CLOSE_FORM();	
					
						
					?>
				</li>
				 <li></li>
			</ul>
		</div>
		<div id="fbox2">
			<h2><span>¡Bienvenido!</span></h2>
			<hr>
			<p>MAPI es la Mediateca de la Publicidad Institucional en la que se recogen todas las campañas de publicidad <br/>difundidas por los Ministerios y Entidades Públicas dependientes.</p>
                        <br/>
                        <p>Este sistema de información recopila todas las Campañas de Publicidad Institucional de los Ministerios y de las <br/>Entidades Públicas desde la puesta en vigor de la Ley 29/2005, de 29 de diciembre, de publicidad y comunicación <br/>institucional (LPCI) con el objeto de facilitar el acceso a esta publicidad de interés público a toda la ciudadanía.</p>
                        <br/>
                        <p>
                            <table style="border-spacing: 0px; margin-left: 100px;">
                                <tr>
                                    <td colspan="3" style="text-align: center;"><b><u>Responsables del Proyecto</u></b></td>
                                </tr> 
                                <tr>
                                    <td colspan="3" style="text-align: center; height: 10px"></td>
                                </tr>                                 
                                <tr>
                                    <td style="padding-left: 5px; width: 200px; text-align: center;"><b>Esther Martinez Pastor</b></td>
                                    <td style="padding-right: 20px;"></td>
                                    <td style="padding-left: 5px; width: 200px; text-align: center;"><b>Juan Manuel Vara Mesa</b></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px; width: 200px; text-align: center;">Responsable de Publicidad</td>
                                    <td style="padding-right: 20px;"></td>
                                    <td style="padding-left: 5px; width: 200px; text-align: center;">Responsable de Informática</td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 5px; width: 200px; text-align: center;">esther.martinez.pastor@urjc.es</td>
                                    <td style="padding-right: 20px;"></td>
                                    <td style="padding-left: 5px; width: 200px; text-align: center;">juanmanuel.vara@urjc.es</td>
                                </tr>                             
                            </table>
                        </p>

                                

		</div>
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>
