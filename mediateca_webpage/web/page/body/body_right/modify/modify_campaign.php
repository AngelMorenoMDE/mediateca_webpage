

<?php

    $targetPeopleObj = new TargetPeople();
    $listTargetPeople = $targetPeopleObj->get_all();
    
    $advertiserObj = new Advertiser();
    $listAdvertiser = $advertiserObj->get_all();     
    
    $advAgencyObj = new AdvAgency();
    $listAdvAgency = $advAgencyObj->get_all();    
    $campaign = null;
    if (isset($_POST["id"]))
    {
        $campaign = new Campaign();
        $campaign->id($_POST["id"]);
        $campaign->get();
        
        $day_start = intval(date( "j", strtotime($campaign->date_start())));
        $month_start = intval(date( "m", strtotime($campaign->date_start())));
        $year_start = intval(date( "Y", strtotime($campaign->date_start())));
        
        $day_end = intval(date( "j", strtotime($campaign->date_end())));
        $month_end = intval(date( "m", strtotime($campaign->date_end())));
        $year_end = intval(date( "Y", strtotime($campaign->date_end())));        


    }
    
    ?>

    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Formulario para la modificación de Campaña Publicitaria</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Nombre de la Campaña</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="nameModifyCampaignForm" value="<?php echo $campaign->name(); ?>"> 
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Objetivo</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="targetModifyCampaignForm" value="<?php echo $campaign->target(); ?>">
                </div>
            </div>
            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Duración</span>
                    <span class="asterisk">*</span>
                </div>
                <span class="dateCampaign">Del</span>
                <select id="dayStartModifyCampaignForm" style="width:7%;">
                    <?php for($i=1; $i<=31; $i++) { 
                            echo "<option value='$i' ".(($i==$day_end) ? "selected" : "").">$i</option>";
                     } ?>                    
                </select>
                <select id="monthStartModifyCampaignForm" style="width:17%;">
                    <?php foreach (generateMonthsCampaign() as $month =>$monthName) {
                    
                        echo "<option value='$month' ".(($month==$month_start) ? "selected" : "").">$monthName</option>";
                    } ?>                     
                </select>
                <select id="yearStartModifyCampaignForm"  style="width:11%;">
                    <?php foreach (generateYearsCampaign() as $year) { 
                            echo "<option value='$year' ".(($year==$year_start) ? "selected" : "").">$year</option>";
                    } ?>                       
                </select>                
                <span class="dateCampaign">al</span>
                <select id="dayEndModifyCampaignForm" style="width:7%;">
                    <?php for($i=1; $i<=31; $i++)  { 
                            echo "<option value='$i' ".(($i==$day_start) ? "selected" : "").">$i</option>";
                     } ?>                   
                </select>
                <select id="monthEndModifyCampaignForm" style="width:17%;">
                    <?php foreach (generateMonthsCampaign() as $month =>$monthName) {
                    
                        echo "<option value='$month' ".(($month==$month_end) ? "selected" : "").">$monthName</option>";
                    } ?>                       
                </select>
                <select id="yearEndModifyCampaignForm" style="width:11%;">
                    <?php foreach (generateYearsCampaign() as $year) { 
                            echo "<option value='$year' ".(($year==$year_end) ? "selected" : "").">$year</option>";
                    } ?>                       
                </select>                
            </div>            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Público Objetivo</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select id="targetPeopleModifyCampaignForm">
                        <?php foreach ($listTargetPeople as $targetPeople) { ?>
                        <option value="<?php echo $targetPeople->id(); ?>" <?php echo ($targetPeople->id() == $campaign->target_people())? "selected":""; ?>><?php echo $targetPeople->name(); ?></option>
                        <?php } ?>                    
                    </select>
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Organismo Público</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select id="advertiserModifyCampaignForm">
                        <?php foreach ($listAdvertiser as $advertiser) { ?>
                        <option value="<?php echo $advertiser->id(); ?>" <?php echo ($advertiser->id() == $campaign->advertiser())? "selected":""; ?>><?php echo $advertiser->name(); ?></option>
                        <?php } ?>

                    </select>
                </div>                    
            </div>            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Ministerio</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select  id="advAgencyModifyCampaignForm">
                        <?php foreach ($listAdvAgency as $advAgency) { ?>
                        <option value="<?php echo $advAgency->id(); ?>" <?php echo ($advAgency->id() == $campaign->adv_agency())? "selected":""; ?>><?php echo $advAgency->name(); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Coste</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="costModifyCampaignForm" value="<?php echo $campaign->cost();?>">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Resumen</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <textarea id="summaryModifyCampaignForm"><?php echo $campaign->summary();?></textarea>
                </div>
            </div>          
            <div style="position: relative; float: left; width: 100%; height: 10px"></div>            
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Modificar Campaña Publicitaria" onclick="validateForm('modifyCampaignForm')">
                    <input type="submit" value="Cancelar" onclick="cancelForm('modifyCampaignForm')">
                </div>
            </div>
            <div style="position: relative; float: left; width: 100%; height: 10px"></div>
        </div>
    </div>