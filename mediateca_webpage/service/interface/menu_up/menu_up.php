<?php 
if ((isset($_POST["section"])) && ($_POST["section"] == "menu_up")) 
{ 
    if (System::isSomeOneLogged())
    {

?>
                    <div id="base_layout_head_menu_up_option" onclick="showMenu(this, 'AdminPanel');">
                        Menú
                    </div>
                    <div id="base_layout_head_menu_up_option" onclick="showMenu(this, 'CreateObject');">
                        Nuevo
                    </div>
                    <div id="base_layout_head_menu_up_flags">
                        <img src="images/Spain.png">
                        <img src="images/UK.png">
                    </div>
<?php 
    }
    else
    {
?>
                    <div id="base_layout_head_menu_up_flags">
                        <img src="images/Spain.png">
                        <img src="images/UK.png">
                    </div>

<?php
    }
}
?>

