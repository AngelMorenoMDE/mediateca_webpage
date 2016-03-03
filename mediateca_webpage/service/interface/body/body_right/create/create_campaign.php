

<?php    
    $targetPeopleObj = new TargetPeople();
    $listTargetPeople = $targetPeopleObj->get_all();
    
    $advertiserObj = new Advertiser();
    $listAdvertiser = $advertiserObj->get_all();     
    
    $advAgencyObj = new AdvAgency();
    $listAdvAgency = $advAgencyObj->get_all();    
    
    ?>

    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Formulario para la creación de una nueva Campaña Publicitaria</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Nombre</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="nameCampaignForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Objetivo</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="targetCampaignForm">
                </div>
            </div>
            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Duración</span>
                    <span class="asterisk">*</span>
                </div>
                <span class="dateCampaign">Del</span>
                <select id="dayStartCampaignForm" style="width:7%;">
                    <?php for($i=1; $i<=31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>                    
                </select>
                <select id="monthStartCampaignForm" style="width:17%;">
                    <?php foreach (generateMonthsCampaign() as $month =>$monthName) { ?>
                            <option value="<?php echo $month; ?>"><?php echo $monthName; ?></option>
                    <?php } ?>                     
                </select>
                <select id="yearStartCampaignForm"  style="width:11%;">
                    <?php foreach (generateYearsCampaign() as $year) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php } ?>                       
                </select>                
                <span class="dateCampaign">al</span>
                <select id="dayEndCampaignForm" style="width:7%;">
                    <?php for($i=1; $i<=31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>                    
                </select>
                <select id="monthEndCampaignForm" style="width:17%;">
                    <?php foreach (generateMonthsCampaign() as $month =>$monthName) { ?>
                            <option value="<?php echo $month; ?>"><?php echo $monthName; ?></option>
                    <?php } ?>                     
                </select>
                <select id="yearEndCampaignForm" style="width:11%;">
                    <?php foreach (generateYearsCampaign() as $year) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php } ?>                       
                </select>                
            </div>            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Público Objetivo</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select id="targetPeopleCampaignForm">
                        <?php foreach ($listTargetPeople as $targetPeople) { ?>
                                <option value="<?php echo $targetPeople->id(); ?>"><?php echo $targetPeople->name(); ?></option>
                        <?php } ?>                    
                    </select>
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Organismo Público</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select id="advertiserCampaignForm">
                        <?php foreach ($listAdvertiser as $advertiser) { ?>
                                <option value="<?php echo $advertiser->id(); ?>"><?php echo $advertiser->name(); ?></option>
                        <?php } ?>

                    </select>
                </div>                    
            </div>            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Ministerio</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select  id="advAgencyCampaignForm">
                        <?php foreach ($listAdvAgency as $advAgency) { ?>
                                <option value="<?php echo $advAgency->id(); ?>"><?php echo $advAgency->name(); ?></option>
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
                    <input type="text" id="costCampaignForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Resumen</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <textarea id="summaryCampaignForm"></textarea>
                </div>
            </div>          
            <div style="position: relative; float: left; width: 100%; height: 10px"></div>            
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Crear Campaña Publicitaria" onclick="validateCampaignForm()">
                    <input type="submit" value="Cancelar" onclick="cancelForm('createCampaignForm')">
                </div>
            </div>
            <div style="position: relative; float: left; width: 100%; height: 10px"></div>
        </div>
    </div>