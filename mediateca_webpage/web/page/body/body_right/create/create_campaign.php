

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
                    <span>Nombre de la Campaña</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="nameCreateCampaignForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Objetivo</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="text" id="targetCreateCampaignForm">
                </div>
            </div>
            
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Duración</span>
                    <span class="asterisk">*</span>
                </div>
                <span class="dateCampaign">Del</span>
                <select id="dayStartCreateCampaignForm" style="width:7%;">
                    <?php for($i=1; $i<=31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>                    
                </select>
                <select id="monthStartCreateCampaignForm" style="width:17%;">
                    <?php foreach (generateMonthsCampaign() as $month =>$monthName) { ?>
                            <option value="<?php echo $month; ?>"><?php echo $monthName; ?></option>
                    <?php } ?>                     
                </select>
                <select id="yearStartCreateCampaignForm"  style="width:11%;">
                    <?php foreach (generateYearsCampaign() as $year) { ?>
                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                    <?php } ?>                       
                </select>                
                <span class="dateCampaign">al</span>
                <select id="dayEndCreateCampaignForm" style="width:7%;">
                    <?php for($i=1; $i<=31; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>                    
                </select>
                <select id="monthEndCreateCampaignForm" style="width:17%;">
                    <?php foreach (generateMonthsCampaign() as $month =>$monthName) { ?>
                            <option value="<?php echo $month; ?>"><?php echo $monthName; ?></option>
                    <?php } ?>                     
                </select>
                <select id="yearEndCreateCampaignForm" style="width:11%;">
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
                    <select id="targetPeopleCreateCampaignForm">
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
                    <select id="advertiserCreateCampaignForm">
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
                    <select  id="advAgencyCreateCampaignForm">
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
                    <input type="text" id="costCreateCampaignForm">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Resumen</span>
                    <span class="asterisk">*</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <textarea id="summaryCreateCampaignForm"></textarea>
                </div>
            </div>          
            <div style="position: relative; float: left; width: 100%; height: 10px"></div>            
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="submit" value="Crear Campaña Publicitaria" onclick="validateForm('createCampaignForm')">
                    <input type="submit" value="Cancelar" onclick="cancelForm('createCampaignForm')">
                </div>
            </div>
            <div style="position: relative; float: left; width: 100%; height: 10px"></div>
        </div>
    </div>