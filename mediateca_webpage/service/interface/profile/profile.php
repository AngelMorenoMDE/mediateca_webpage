<?php 
    if (System::isSomeOneLogged()) 
    {    
        $user = System::getUserLogged();
?>
    <div id="base_layout_head_right_profile">
        <div id="base_layout_head_right_profile_left">
            <img src="images/foto.jpg">
        </div>
        <div id="base_layout_head_right_profile_right">
            <div id="base_layout_head_right_profile_right_content">
                Bienvenido, <?php echo $user->name(); ?>.
            <br>
            <div id="base_layout_head_right_profile_right_content_profile" onclick="go('viewMyProfile')">Mi Perfil</div>
            <div id="base_layout_head_right_profile_right_content_profile" onclick="go('exit')">Cerrar Mi Sesión</div>
            </div>
        </div>
    </div>
<?php } ?>
