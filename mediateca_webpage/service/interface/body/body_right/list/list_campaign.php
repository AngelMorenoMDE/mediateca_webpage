<?php 
    $columns = array();
    $campaignObj = new Campaign();
    $targetPeopleObj = new TargetPeople();
    $all_targetPeople = $targetPeopleObj->get_all();
    $targetPeoples = toArrayAssoc($all_targetPeople);
    
    $advAgencyObj = new AdvAgency();
    $all_AdvAgency = $advAgencyObj->get_all();
    $AdvAgencies = toArrayAssoc($all_AdvAgency);    
    
    if (isset($_POST["order"]))
    {
        $order = $_POST["order"];
        
        if ($order == "name_asc")
        {
            $campaignObj->order_by("name", DBOrder::$ASC);
        }
        if ($order == "name_desc")
        {
            $campaignObj->order_by("name", DBOrder::$DESC);
        }        
        if ($order == "year_asc")
        {
            $campaignObj->order_by("year", DBOrder::$ASC);
        }
        if ($order == "year_desc")
        {
            $campaignObj->order_by("year", DBOrder::$DESC);
        }        
    }
    
    if (isset($_POST["year"]))
    {
        $campaignObj->year(intval($_POST["year"]));
        $columns[]="year";
        
    }
    
    if (isset($_POST["target_people"]))
    {
        $campaignObj->target_people(intval($_POST["target_people"]));
        $columns[]="target_people";
    }    
    
    if (isset($_POST["advertiser"]))
    {
        $campaignObj->advertiser(intval($_POST["advertiser"]));
        $columns[]="advertiser";
    }    
    
    if (isset($_POST["adv_agency"]))
    {
        $campaignObj->adv_agency(intval($_POST["adv_agency"]));
        $columns[]="adv_agency";
    }     
    
    $all_campaigns = $campaignObj->find_by($columns);
    $num_results = count($all_campaigns);
    
?>
    <div id="base_layout_body_right_content_results">Se han encontrado <?php echo $num_results; ?> resultados</div>
    <?php if ($num_results>0) { ?>
        <div id="base_layout_body_right_content_table_header">

            <table class="tableHeader">
                <tr>
                    <td style="width: 32%;"><?php echo "Nombre de la Campaña" ?></td>
                    <td style="width: 8%;"><?php echo "Año"; ?></td>
                    <td style="width: 30%;"><?php echo "Público Objetivo"; ?></td>
                    <td style="width: 30%;"><?php echo "Ministerio" ?></td>
                </tr>
            </table>    

        </div>
    <?php } ?>    
    <div id="base_layout_body_right_content">

        <table class="tableBody">
            <?php
                    if ($num_results>0)
                    {
                        foreach ($all_campaigns as $campaign) { ?>        
                            <tr onclick="showDetailsCampaign('<?php echo $campaign->id(); ?>')">
                                <td style="width: 32%;"><?php echo $campaign->name(); ?></td>
                                <td style="width: 8%;"><?php echo $campaign->year(); ?></td>
                                <td style="width: 30%;"><?php echo $targetPeoples[$campaign->target_people()]; ?></td>
                                <td style="width: 30%;"><?php echo $AdvAgencies[$campaign->adv_agency()]; ?></td>
                            </tr>
                        <?php } ?>
                            <!--<tr>
                                <td colspan="4" style="background-color: red; color:white; font-weight: bold; vertical-align: top">FIN DE LA TABLA</td>
                            </tr>-->                            
            <?php   } else { ?>
                            <tr>
                                <td>Lo lamentamos. No se ha encontrado ningún resultado.</td>
                            </tr>
            <?php }?>
            
        </table>
        <div style="height: 100px;"></div>
    </div>
