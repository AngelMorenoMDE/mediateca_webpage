<?php


?>     

            <div id="base_layout_head">
                
                <!-- Bandera de España Vertical -->
                <div id="base_layout_head_flag">
                    <div id="base_layout_head_flag_yellow"></div>
                </div>
                
                <!-- Logotipo y membrete -->
                <div id="base_layout_head_left">
                    <?php require_once "/logo/logo.php" ?>
                </div>
                <!-- Perfil del Usuario -->
                <div id="base_layout_head_right">
                    <?php require_once "/profile/profile.php"; ?>
                </div>
                
                
            </div>
            <div id="base_layout_head_menu_location">
                <?php require_once 'menu_location/menu_location.php'; ?>
            </div>