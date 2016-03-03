<?php
    $campaignObj = new Campaign();
    $campaignObj->order_by("name", DBOrder::$ASC);
        $listCampaigns = $campaignObj->get_all();

        $mediaSupportObj = new MediaSupport();
        $listMediaSupport = $mediaSupportObj->get_all();
?>

    <div id="base_layout_body_right_content">      
        <div id="base_layout_body_right_content_form">
            <div id="base_layout_body_right_content_form_row_title">
                <span>Crear nuevo Archivo Multimedia</span>
            </div>                
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Paso 1. </b>Seleccione la campaña que desea modificar</span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <select id="selectCampaignUploadMediaForm"  style="width:90%">
                        <?php foreach ($listCampaigns as $campaign) { ?>
                                <option value="<?php echo $campaign->id(); ?>"><?php echo $campaign->name(); ?></option>
                        <?php } ?>
                    </select>
                </div>                    
            </div>
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Paso 2. </b>Seleccione los archivos multimedia que desea subir: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_field">
                    <input type="file" id="inputFileUploadMediaForm" multiple onchange="validateMediaFiles(this);">
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span><b>Paso 3. </b>En la siguiente lista de ficheros, indique 
                        el <b>Nombre Virtual</b> que desea que reciba el fichero a subir y el <b>Tipo de Publicidad</b> que representa. </span>
                </div>
            </div>
            <div id="base_layout_body_right_content_form_row_divisor"></div>            
            <div id="base_layout_body_right_content_form_row" name="listMediaFiles">
                <div id="base_layout_body_right_content_form_row_file_list">
                    
                </div>
            </div>
            <!--<div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Nombre real: </span>
                </div>
                <input type="text" id="nameRealUser">
            </div>-->            
             <div id="base_layout_body_right_content_form_row_divisor"></div>
            <div id="base_layout_body_right_content_form_row">
                <input type="submit" value="Subir Archivos" onclick="uploadMediaFiles();">
                <input type="submit" value="Cancelar" onclick="cancelForm('uploadFileMediaForm');">
            </div>
        </div>
    </div>

