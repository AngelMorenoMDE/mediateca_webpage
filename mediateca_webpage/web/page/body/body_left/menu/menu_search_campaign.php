<div id="base_layout_body_left_content">
    <div id="base_layout_body_left_content_title">
        Filtros de Búsqueda
        <input type="submit" value="-" onclick="hideLeftMenu()">
    </div>
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">         
            Título de la Campaña
        </div>
        <div id="base_layout_body_left_content_row_field"> 
            <input type="text" id="campaignTitle">
        </div>
    </div>
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">        
            Etiquetas (Separar por comas)
        </div>
        <div id="base_layout_body_left_content_row_field"> 
            <input type="text" id="campaignTitle">
        </div>              
    </div>
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">
            Ordenar por:
        </div>
        <div id="base_layout_body_left_content_row_field">          
            <select id="orderFilter" onchange="refreshCampaignsData(this);">
                <option value="-1">Sin Orden</option>
                <option value="name_asc">Nombre (A-Z)</option>
                <option value="name_desc">Nombre (Z-A)</option>
                <option value="year_asc">Año (Menor a mayor)</option>            
                <option value="year_desc">Año (Mayor a menor)</option>            
            </select>  
        </div>
    </div>    
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">         
            Año de Emisión
        </div>
        <div id="base_layout_body_left_content_row_field">        
            <select id="yearsCampaign" onchange="refreshCampaignsData(this)">
                <?php 
                    echo "<option value='-1'>Sin Selección</option>";
                    for($i=  intval(date("Y")); $i>2005; $i--)
                    {
                        echo "<option value=".$i.">".$i."</option>";
                    }

                ?>
            </select>
        </div>
    </div>
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">
            Público Objetivo
        </div>
        <div id="base_layout_body_left_content_row_field">
            <select id="targetPeopleSelect" onchange="refreshCampaignsData(this)"></select>                         
        </div>
    </div> 
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">
            Organismo Público
        </div>
        <div id="base_layout_body_left_content_row_field">
            <select id="advertiserSelect" onchange="refreshCampaignsData(this)"></select>         
        </div>
    </div>  
    <div id="base_layout_body_left_content_row">
        <div id="base_layout_body_left_content_row_title">        
            Ministerio
        </div>
        <div id="base_layout_body_left_content_row_field">
            <select id="advAgencySelect" onchange="refreshCampaignsData(this)"></select>
        </div>
    </div>                         
</div>
