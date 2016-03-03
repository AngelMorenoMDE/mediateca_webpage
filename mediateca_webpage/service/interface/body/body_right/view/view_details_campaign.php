
<?php if (isset($_POST["id_campaign"]))
{
    Session::Set("id_campaign", $_POST["id_campaign"]);
        $campaignObj = new Campaign();
        $campaignObj->id($_POST["id_campaign"]);
        $campaignObj->get();
}
?>
    <div id="base_layout_body_right_content">
        <input type="submit" id="nameTargetPeople" value="Volver al Buscador de Campañas Publicitarias" onclick="go('campaignsSearcher');">
        <br><br>
        <span>Detalles de la campaña: <?php echo $campaignObj->name(); ?></span>
    </div>