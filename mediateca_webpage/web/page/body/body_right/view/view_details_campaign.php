
<?php if (isset($_POST["id_campaign"]))
{
    Session::Set("id_campaign", $_POST["id_campaign"]);
        $campaignObj = new Campaign();
        $campaignObj->id($_POST["id_campaign"]);
        $campaignObj->get();
        
        $mediasCampaign = new MediaCampaign();
        $mediasCampaign->campaign($campaignObj->id());
        $medias = $mediasCampaign->get_all();
        
        $day_start = intval(date( "j", strtotime($campaignObj->date_start())));
        $month_start = intval(date( "m", strtotime($campaignObj->date_start())));
        $month_start_name = getNameMonthNumber($month_start);
        $year_start = intval(date( "Y", strtotime($campaignObj->date_start())));
        
        $day_end = intval(date( "j", strtotime($campaignObj->date_end())));
        $month_end = intval(date( "m", strtotime($campaignObj->date_end())));
        $month_end_name = getNameMonthNumber($month_end);
        $year_end = intval(date( "Y", strtotime($campaignObj->date_end())));                

        $targetPeopleObj = new TargetPeople();
        $targetPeopleObj->id($campaignObj->target_people());
        $targetPeopleObj->get();
        
        $advertiserObj = new Advertiser();
        $advertiserObj->id($campaignObj->advertiser());
        $advertiserObj->get();
        
        $advagencyObj = new AdvAgency();
        $advagencyObj->id($campaignObj->adv_agency());
        $advagencyObj->get();
        
}
?>    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Datos de la Campaña Publicitaria seleccionada</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b><?php echo $campaignObj->name()." (".$campaignObj->year().")"; ?></b></span>
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>
                        
                        <?php echo "Emisión de la campaña desde el <b>$day_start de $month_start_name de $year_start</b> al <b>$day_end de $month_end_name de $year_end</b>"; ?>
                 
                    </span>              
                </div>
            </div>   
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>                        
                        <?php echo "Dirigida al colectivo <b>".$targetPeopleObj->name()."</b>"; ?>                    
                    </span>              
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>                        
                        <?php echo "Diseñada y creada por la agencia de publicidad <b>".$campaignObj->advertising_agency()."</b>"; ?>                    
                    </span>              
                </div>
            </div>              
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>                        
                        <?php echo "Anunciada por <b>".$advertiserObj->name()."</b>"; ?>                    
                    </span>              
                </div>
            </div>     
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>                        
                        <?php echo "Promovida por <b>".$advagencyObj->name()."</b>"; ?>                    
                    </span>              
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                                            
                                <?php
        
                    for($i=0; $i<count($medias); $i++)
                    {
                        echo "<br>";
                        echo "<a target='_blank' href='../uploads/".$medias[$i]->file_name()."'>".$medias[$i]->file_name()."</a>";
                    }

                    ?>                   
                                 
                </div>
            </div>              
        </div>
    </div>
