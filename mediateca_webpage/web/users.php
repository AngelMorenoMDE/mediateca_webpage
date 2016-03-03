<?php
    require_once "ini.php";
    System::checkSession();


	if (!System::isAdministratorLogged())
	{
            System::goToPage("campaigns.php");
	}
        
        $list_roles = new ListSelector("list_roles", new UserRole());
        $txt_email = new TextField("txt_email");
        $txt_password = new PasswordTextField("txt_password");
        $txt_name = new TextField("txt_name");
        
        $error_email = "";
        $error_pass = "";
        $error_name = "";
        $error_general = "";

        
        if (array_key_exists("new_user", $_POST))
        {
            $valid_name = new Validator($txt_name->value(), array(Validator::$ONLY_ALPHANUMERIC, Validator::$NOT_EMPTY));
            $error_name = $valid_name->check();
            
            $valid_email = new Validator($txt_email->value(), array(Validator::$ONLY_ALPHANUMERIC, Validator::$NOT_EMPTY));
            $error_email = $valid_email->check();

            $valid_pass = new Validator($txt_password->value(), array(Validator::$ONLY_ALPHANUMERIC, Validator::$NOT_EMPTY));
            $error_pass = $valid_pass->check();
            
            $error = ($error_email != "") || ($error_pass!="")|| ($error_name!="");
            
            if (!$error)
            {
                $new_user = new User();
                $new_user->email($txt_email->value());
                $new_user->password($txt_password->value());
                $new_user->name($txt_name->value());
                $new_user->rol($list_roles->selected());
                
                if ($new_user->exist()) $error_general="El usuario ya existe";
                else
                    $new_user->save();
            }
        }
        
        if (array_key_exists("user_delete", $_POST))
        {
            $user = new User();
            $user->id($_POST["user_delete"]);
            $user->delete();
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
			<h1>Gestor de Usuarios</h1>
		</div>            
	</div>
</div>
<div id="footer-wrapper">
	<div id="footer-content">
		<div id="fbox1">
			<?php $sidebar = new MediatecaBar("sidebar"); $sidebar->render(); ?>
		</div>
		<div id="fbox2">
			<h2><span><?php echo "Listado de usuarios registrados";?></span></h2>
			<hr>
			<p><?php echo "A continuación se muestra un listado con los usuarios registrados en la aplicación mediateca.";?></p>
			<p>
				<div id="view2">
				<?php 
				
					$user = new User();					
					$users = $user->get_all();

                                        if (count($users)==0)
                                        {
                                            echo Html::TABLE(Html::TR(Html::TD("No hay usuarios registrados")));
                                        }
                                        else
                                        {
                                            $table = Html::THEAD(Html::TR(Html::TD("Eliminar").Html::TD("Nombre de Usuario").Html::TD("Email")));
                                        
                                            for ($index = 0; $index < count($users); $index++) 
                                            {
                                                $del_btn = Html::IMAGEACTION(CONFIG::getDefaultPathWebImages()."delete.png", "user_delete", $users[$index]->id());
                                                $table .= Html::TR(Html::TD($del_btn).Html::TD($users[$index]->name()).Html::TD($users[$index]->email()));
                                            }

                                            echo Html::FORM("form_delete_user", "users.php", "POST", Html::TABLE(Html::TBODY($table)));
                                        }
                                        

				?>
				</div>
			</p>

		</div>            
            	<div id="fbox2">
			<h2><span><?php echo "Registrar nuevo usuario";?></span></h2>
			<hr>
			<p><?php echo "Rellene los siguientes campos del formulario para registrar un nuevo usuario.";?></p>
			<p>
				<div id="view4">
				<?php 
					
                                    $table = "";
                                    
                                    $table .= Html::C5ROW("Nombre", $txt_name->render(), $error_name);
                                    $table .= Html::C5ROW("Email", $txt_email->render(), $error_email);
                                    $table .= Html::C5ROW("Password", $txt_password->render(), $error_pass);
                                    $table .= Html::C5ROW("Rol", $list_roles->render(), "");
                                    $table .= Html::C5ROW("", Html::SUBMIT("new_user", "Registrar Usuario"), $error_general);
                                    
                                    echo Html::FORM("form_new_user", "users.php", "post", Html::TABLE($table));


				?>
				</div>
			</p>

		</div>
            

	
	</div>
</div>
<?php require_once commons . "foot.php"; ?>
</body>
</html>

