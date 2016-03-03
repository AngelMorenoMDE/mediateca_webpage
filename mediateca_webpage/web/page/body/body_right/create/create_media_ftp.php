<?php    
        $campaignObj = new Campaign();
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
                    <span>Seleccione la campaña a la cual desea agregar nuevos archivos multimedia</span>
                </div>
                <select id="campaignMedia"  style="width:90%">
                    <?php foreach ($listCampaigns as $campaign) { ?>
                            <option value="<?php echo $campaign->id(); ?>"><?php echo $campaign->name(); ?></option>
                    <?php } ?>
                    
                </select>
            </div>

            <div id="base_layout_body_right_content_form_row" name="listMediaFiles">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Seleccione los archivos multimedia que desea asignar a la campaña seleccionada: </span>
                </div>
                <div id="base_layout_body_right_content_form_row_file_list">
                    <table class="tableFTPMedia">
                        <thead>
                        <tr>
                            <th>Asignar</th>
                            <th>Fichero encontrado</th>
                        </tr>
                        </thead>
                    
                    <?php 
                    
                        $directorio = opendir(Config::getPathFtpServerUploads()); //ruta actual
                        
                        while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                        {
                            if (!is_dir($archivo))//verificamos si es o no un directorio
                            {
                                if (strlen($archivo) > 50)
                                {
                                    
                                }
                                
                    ?>
                        <tbody>
                        <tr>
                            <td style="width: 10%;">
                               <input type="checkbox" name="checkboxUploadMediaFTPForm[]" value="<?php echo $archivo; ?>">
                            </td>
                            <td style="width: 90%;">
                                <table class="tableFTPMediaInternal">
                                    <tr><td style="width: 20%;">Fichero FTP</td><td><b><?php echo $archivo; ?></b></td></tr>
                                    <tr><td style="width: 20%;">Nombre Virtual</td><td><input type="text" name="virtualNameUploadMediaFTPForm[]" style="width: 90%"></td></tr>
                                    <tr><td style="width: 20%;">Tipo</td><td><select name="typeAdviceUploadMediaFTPForm[]" style="width: 45%;">
                                    <?php foreach ($listMediaSupport as $mediaSupport) { ?>
                                            <option value="<?php echo $mediaSupport->id(); ?>"><?php echo $mediaSupport->name(); ?></option>
                                    <?php } ?>                    
                                </select></td></tr>    
                                </table>
                                
                                
                            </td>
                        </tr>
                        </tbody>
                    <?php
                            }
                        }
                    ?>                    
                        </table>
                </div>
            </div>
            <!--<div id="base_layout_body_right_content_form_row">
                <div id="base_layout_body_right_content_form_row_title_field">
                    <span>Nombre real: </span>
                </div>
                <input type="text" id="nameRealUser">
            </div>-->            
             
            <div id="base_layout_body_right_content_form_row">
                <input type="submit" value="Asignar Archivos FTP" onclick="createAssociationMediaFTP()">
                <input type="submit" value="Cancelar" onclick="cancelForm('uploadFileMediaForm');">
            </div>
        </div>
    </div>
