            var isLeftMenuHide = false;
            var panelOpened = "";
            var isOrderSelected = false;
            var isTagsSelected = false;
            var isCampaignTitleSearchSet = false;
            var campaignTitleSet = "";
            var isYearFilterSelected = false;
            var tagsSelected = "";
            var orderSelected;
            var yearSelected;
            var isTargetPeopleFilterSelected = false;
            var targetPeopleSelected;
            var isAdvertiserFilterSelected = false;
            var advertiserSelected;
            var isAdvAgencyFilterSelected = false;
            var advAgencySelected;
            
            function resetSearcher()
            {
                isLeftMenuHide = false;
                isOrderSelected = false;
                isTagsSelected = false;
                isCampaignTitleSearchSet = false;                
                isYearFilterSelected = false;
                isTargetPeopleFilterSelected = false;                
                isAdvertiserFilterSelected = false;                
                isAdvAgencyFilterSelected = false;
                campaignTitleSet = "";
                tagsSelected = "";
                orderSelected;
                yearSelected;                
                targetPeopleSelected;
                advertiserSelected;
                advAgencySelected;
            }
            
            var isNotificationAreaSuccessOpen = false;
            
            var BODY_RIGHT_SERVICE = "./page/body/body_right/body_right.php";
            var FOOTER_SERVICE = "./page/footer/footer.php";
            var BODY_LEFT_SERVICE = "./page/body/body_left/body_left.php";
            var NOTIFICATION_SERVICE = "./page/notification/notification.php";
            var MENU_LOCATION_SERVICE = "./page/head/menu_location/menu_location.php";
            
            var NOTIFICATION_AREA_ERROR = "#notification_area_errors";
            var NOTIFICATION_AREA_SUCCESS = "#notification_area_success";
            var DATA_SERVICE = "../service/service.php";
            
            var _ALLOW_HIDE_NOTIFICATION_AREA = true;
            
            var DEBUG_MSG = false;
            
            function initialize()
            {
                // Ocultamos el área de notificación
                $('#notification_area').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_waiting').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_waiting_upload_files').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_layout').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_layout_waiting').css({'display':'none', 'opacity':'0.0'});
                // Menus
                $('#base_layout_menu_administration').css({'display':'none', 'opacity':'0.0'});
                $('#base_layout_menu_create').css({'display':'none', 'opacity':'0.0'});
                $('#base_layout_menu_view').css({'display':'none', 'opacity':'0.0'});

                updateProfileSection();
                updateMenuUpSection();
                checkStatus();
            }
            
            function checkStatus()
            {
                post(DATA_SERVICE, "service=info&section=page&query=actual_page", checkStatusResponse);
            }
            
            function checkStatusResponse(response)
            {
                var response = jQuery.parseJSON(response);
                
                go(response.go);
            }
            
            function id(tag)
            {
                return $("#"+tag);
            }
            
            function post(url, data, fcallback)
            {
 
                $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(result){ fcallback(result); },
                dataType: "html"
                });
            }            
            
            function generateYearsCampaign()
            {
                var yearValues = "<option value='-1'>Sin Selección</option>";
                var date = new Date(); 
                for(i=date.getFullYear(); i>2005;i--)
                {
                    yearValues += "<option value='"+i+"'>"+i+"</option>";
                }
                $('#yearsCampaign').html(yearValues);   
            }
            
            function generateOptionsSelectFromArray(data)
            {
                var options = "";
                for(i=0; i<data.length; i++)
                {
                    options += "<option value='"+data[i]["id"]+"'>"+data[i]["name"]+"</option>";
                }
                return options;
            }
            
            function evalJSON(data)
            {
                return eval("(" + data + ")");
            }
            
            function setTargetPeopleData(result)
            {
                 $('#targetPeopleSelect').html(generateOptionsSelectFromArray(evalJSON(result)));                   
            }
            
            function setAdvertiserData(result)
            {
                
                 $('#advertiserSelect').html(generateOptionsSelectFromArray(evalJSON(result)));                   
            }
            
            function setAdvAgencyData(result)
            {
                
                 $('#advAgencySelect').html(generateOptionsSelectFromArray(evalJSON(result)));                   
            }            
            
            /*function getTargetPeopleFromServer()
            {
                $.ajax({
                type: "POST",
                url: "./service.php",
                data: "action=getTargetPeopleData",
                success: function(result){ setTargetPeopleData(result); },
                dataType: "html"
                });
            }
            
            function getAdvertiserFromServer()
            {
                $.ajax({
                type: "POST",
                url: "./service.php",
                data: "action=getAdvertiserData",
                success: function(result){ setAdvertiserData(result); },
                dataType: "html"
                });
            }
            
            function getAdvAgencyFromServer()
            {
                $.ajax({
                type: "POST",
                url: "./service.php",
                data: "action=getAdvAgencyData",
                success: function(result){ setAdvAgencyData(result); },
                dataType: "html"
                });
            }    */        
            

            
            function generateTagString(functionTagClick, tagName)
            {
                var str = "<div id='etiqueta'>";
                    str += "\t<div id='etiqueta_img'><img src='images/Etiqueta.png'></div>";
                    str += "\t<div id='etiqueta_span' onclick='"+functionTagClick+"'>"+tagName+"</div>";
                    str += "</div>";
               
               return str;
            }
            
            function hideLeftMenu()
            {
                if (!isLeftMenuHide)
                {
                    $("#base_layout_body_left").animate({width:"0%", "opacity":"0.0"},"fast", "swing");
                    $("#base_layout_body_right").animate({width:"98%"},"fast", "swing");
                    isLeftMenuHide = true; 
                    
                }
            }

            function showLeftMenu()
            {
                if(isLeftMenuHide)
                {
                    $("#base_layout_body_left").animate({width:"24%", "opacity":"1.0"},"fast", "swing");
                    $("#base_layout_body_right").animate({width:"73%"},"fast", "swing");
                    isLeftMenuHide = false;
                }
               hideNotificationArea();
            }

            function showNotificationArea()
            {
                $('#notification_area').css({'display':'block', 'opacity':'0.0'});
                $('#notification_area').animate({'display':'block', 'opacity':'1.0'}, 'fast', 'swing');                
                $('#notification_area_layout').css({'display':'block', 'opacity':'0.0'});
                $('#notification_area_layout').animate({'display':'block', 'opacity':'0.7'}, 'fast', 'swing');                
            }
            function showMenu(div, panel)
            {
                panelOpened = panel; 
                var left = div.offsetLeft+div.parentNode.offsetLeft+'px';
                if (panel === 'AdminPanel')
                {
                    // Set Css Properties
                    $('#notification_area_layout').css({'display':'block', 'opacity':'0.0'});
                    $('#base_layout_menu_administration').css({'display':'block', 'opacity':'0.0'});
                    $('#base_layout_menu_administration')[0].style.left = left;
                    // Animate Properties
                    $('#base_layout_menu_administration').animate({'display':'block', 'opacity':'1.0'}, 'fast', 'swing');
                    $('#notification_area_layout').animate({'opacity':'0.5'}, 'fast', 'swing');
                }
                if(panel === 'CreateObject')
                {
                    // Set Css Properties
                    $('#notification_area_layout').css({'display':'block', 'opacity':'0.0'});
                    $('#base_layout_menu_create').css({'display':'block', 'opacity':'0.0'});
                    $('#base_layout_menu_create')[0].style.left = left;
                    // Animate Properties
                    $('#base_layout_menu_create').animate({'display':'block', 'opacity':'1.0'}, 'fast', 'swing');
                    $('#notification_area_layout').animate({'display':'block', 'opacity':'0.5'}, 'fast', 'swing');
                }
                
                if (panel === 'View')
                {
                    // Set Css Properties
                    $('#notification_area_layout').css({'display':'block', 'opacity':'0.0'});
                    $('#base_layout_menu_view').css({'display':'block', 'opacity':'0.0'});
                    $('#base_layout_menu_view')[0].style.left = left;
                    // Animate Properties
                    $('#base_layout_menu_view').animate({'display':'block', 'opacity':'1.0'}, 'fast', 'swing');
                    $('#notification_area_layout').animate({'display':'block', 'opacity':'0.5'}, 'fast', 'swing');                    
                }
                
                
            }
            
            function hideNotificationArea()
            {
                if (_ALLOW_HIDE_NOTIFICATION_AREA)
                {
                    if(panelOpened === 'AdminPanel')
                    {
                        $('#base_layout_menu_administration').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#notification_area_layout').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#base_layout_menu_administration').css({'display':'none'});
                        $('#notification_area_layout').css({'display':'none'});                    
                    }
                    if(panelOpened === 'CreateObject')
                    {
                        $('#base_layout_menu_create').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#notification_area_layout').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#base_layout_menu_create').css({'display':'none' });
                        $('#notification_area_layout').css({'display':'none' });                    
                    }       
                    if(panelOpened === 'View')
                    {
                        $('#base_layout_menu_view').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#notification_area_layout').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#base_layout_menu_view').css({'display':'none' });
                        $('#notification_area_layout').css({'display':'none' });                    
                    }
                        $('#notification_area').animate({'opacity':'0.0'}, 'fast', 'swing');
                        $('#notification_area_layout').css({'display':'none'});                    
                }

            }
            
            function go(target)
            {
         
                if (isNotificationAreaSuccessOpen)
                {
                        closeNotificationAreaSuccess();
                }
                
                if (target === "createMyUser")
                {
                    updateMenuLocation("go=createMyUser"); 
                    updateBodyLeft("go=createMyUser");
                    updateBodyRight("go=createMyUser");   
                    
                }                
                if (target === "recoverMyPassword")
                {
                    updateMenuLocation("go=recoverMyPassword"); 
                    updateBodyLeft("go=recoverMyPassword");
                    updateBodyRight("go=recoverMyPassword");                    
                }                
                if (target === "viewMyProfile")
                {
                    updateMenuLocation("go=viewMyProfile"); 
                    updateBodyLeft("go=viewMyProfile");
                    updateBodyRight("go=viewMyProfile");                    
                }
                if (target === "viewLogin")
                {
                    updateMenuLocation("go=viewLogin"); 
                    updateBodyLeft("go=viewLogin");
                    updateBodyRight("go=viewLogin");                    
                }                
                if (target === "campaignsSearcher")
                {
                    resetSearcher();
                    updateMenuLocation("go=campaignsSearcher"); 
                    updateBodyLeft("go=campaignsSearcher");
                    updateBodyRight("go=campaignsSearcher"+getQuerySearch());
                    generateYearsCampaign();
                }
                if (target === "createCampaign")
                {
                    updateMenuLocation("go=createCampaign");                    
                    updateBodyLeft("go=createCampaign");                    
                    updateBodyRight("go=createCampaign");
                }
                if (target === "createMedia")
                {
                    updateMenuLocation("go=createMedia");                    
                    updateBodyLeft("go=createMedia");                    
                    updateBodyRight("go=createMedia");
                }
                if (target === "createMediaFTP")
                {
                    updateMenuLocation("go=createMediaFTP");                    
                    updateBodyLeft("go=createMediaFTP");                    
                    updateBodyRight("go=createMediaFTP");
                }                  
                if (target === "createTargetPeople")
                {
                    updateMenuLocation("go=createTargetPeople");                    
                    updateBodyLeft("go=createTargetPeople");                    
                    updateBodyRight("go=createTargetPeople");
                }
                if (target === "createAdvertiser")
                {
                    updateMenuLocation("go=createAdvertiser");                    
                    updateBodyLeft("go=createAdvertiser");                    
                    updateBodyRight("go=createAdvertiser");
                }
                if (target === "createAdvAgency")
                {
                    updateMenuLocation("go=createAdvAgency");                    
                    updateBodyLeft("go=createAdvAgency");                    
                    updateBodyRight("go=createAdvAgency");
                }
                if (target === "createUserForm")
                {
                    updateMenuLocation("go=createUserForm");                    
                    updateBodyLeft("go=createUserForm");                    
                    updateBodyRight("go=createUserForm");
                }                
                if (target === "createMediaCampaign")
                {
                    updateBodyLeft("go=createMediaCampaign");                    
                    updateBodyRight("go=createMediaCampaign");
                }                
                if (target === "listTargetPeople")
                {
                    updateMenuLocation("go=listTargetPeople");                    
                    updateBodyLeft("go=listTargetPeople");                    
                    updateBodyRight("go=listTargetPeople");
                }  
                if (target === "listAdvertiser")
                {
                    updateMenuLocation("go=listAdvertiser");                    
                    updateBodyLeft("go=listAdvertiser");                    
                    updateBodyRight("go=listAdvertiser");
                } 
                if (target === "listAdvAgency")
                {
                    updateMenuLocation("go=listAdvAgency");                    
                    updateBodyLeft("go=listAdvAgency");                    
                    updateBodyRight("go=listAdvAgency");
                }
                if (target === "listTag")
                {
                    updateMenuLocation("go=listTag");                    
                    updateBodyLeft("go=listTag");                    
                    updateBodyRight("go=listTag");
                }                
                if (target === "listUsers")
                {
                    updateMenuLocation("go=listUsers");
                    updateBodyLeft("go=listUsers");                    
                    updateBodyRight("go=listUsers");
                    
                }  
                
                if ((target === "Exit") || (target === "exit"))
                {
                    systemService("action=close_session");
                    window.location.href = "./exit2.php";
                }  
                else
                {
                    updateProfileSection();
                    updateMenuUpSection();  
                }

                _ALLOW_HIDE_NOTIFICATION_AREA = true;
                hideNotificationArea();
            }
            
            function updateMenuLocation(data)
            {
                post(MENU_LOCATION_SERVICE, data, updateMenuLocationContent);                  
            }
            function updateMenuLocationContent(data)
            {
                $("#base_layout_head_menu_location").html(data);                       
            }            
            
            function updateNotificationArea(data)
            {
                data = "service=interface&section=notification&" + data;
                post(DATA_SERVICE, data, updateNotificationAreaContent);                
            }
            function updateNotificationAreaContent(data)
            {
                $("#notification_area").html(data);                
                showNotificationArea();
            }                

            function updateBodyLeft(query)
            {
                query = "service=interface&section=body&sub_section=body_left&"+query;
                post(DATA_SERVICE, query, updateBodyLeftSection);
            }
            function updateBodyLeftSection(data)
            {
                $("#base_layout_body_left").html(data);                
            }             
            
            function updateBodyRight(data)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                $('#notification_area_waiting').css({'display':'block', 'opacity':'1.0'}); 
                $('#notification_area_layout_waiting').css({'display':'block', 'opacity':'0.5'}); 
                post(BODY_RIGHT_SERVICE, data, updateBodyRightContent);
            }
            
            function updateBodyRightContent(data)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = true;
                $("#base_layout_body_right").html(data);  
                $('#notification_area_layout_waiting').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_waiting').css({'display':'none', 'opacity':'0.0'}); 
            }
            
            function updateFooter(data)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                $('#notification_area_waiting').css({'display':'block', 'opacity':'1.0'}); 
                $('#notification_area_layout_waiting').css({'display':'block', 'opacity':'0.5'}); 
                post(FOOTER_SERVICE, data, updateFooterContent);
            }
            
            function updateFooterContent(data)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = true;
                $("#base_layout_footer").html(data);  
                $('#notification_area_layout_waiting').css({'display':'none', 'opacity':'0.0'});
                $('#notification_area_waiting').css({'display':'none', 'opacity':'0.0'}); 
            }            
            
            function getQuerySearch()
            {
                var dataQuery = "";
                
                if(isCampaignTitleSearchSet)
                {
                    dataQuery +="&title="+campaignTitleSet;
                }                
                
                if(isTagsSelected)
                {
                    dataQuery +="&tags="+tagsSelected;
                }
                
                if (isOrderSelected)
                {
                    dataQuery +="&order="+orderSelected;
                }
                
                if (isYearFilterSelected)
                {
                    dataQuery +="&year="+yearSelected;
                }
                if (isTargetPeopleFilterSelected)
                {
                    dataQuery +="&target_people="+targetPeopleSelected;
                }
                if (isAdvertiserFilterSelected)
                {
                    dataQuery +="&advertiser="+advertiserSelected;
                }
                if (isAdvAgencyFilterSelected)
                {
                    dataQuery +="&adv_agency="+advAgencySelected;
                }     
                return dataQuery;
                
            }            
            
            function refreshCampaignsData(input)
            {
                var id = input.id;
                if (id === 'campaignTitle')
                {
                    if (input.value !== "")
                    {
                        isCampaignTitleSearchSet = true;
                        campaignTitleSet = input.value;
                    }
                    else
                    {
                        isCampaignTitleSearchSet = false;
                    }
                }
                if (id==='campaignTags')
                {
                    if (input.value !== "")
                    {
                        isTagsSelected = true;
                        tagsSelected = input.value;
                    }
                    else
                    {
                        isTagsSelected = false;
                    }
                }
                if (id==='orderFilter')
                {
                    if (input.value !== "-1")
                    {
                        isOrderSelected = true;
                        orderSelected = input.value;
                    }
                    else
                    {
                        isOrderSelected = false;
                    }
                }
                
                if (id==='yearsCampaign')
                {
                    if (input.value !== "-1")
                    {
                        isYearFilterSelected = true;
                        yearSelected = input.value;
                    }
                    else
                    {
                        isYearFilterSelected = false;
                    }
                }
                if (id==='targetPeopleSelect')
                {
                    if (input.value !== "-1")
                    {
                        isTargetPeopleFilterSelected = true;
                        targetPeopleSelected = input.value;
                    }
                    else
                    {
                        isTargetPeopleFilterSelected = false;
                    }
                }
                if (id==='advertiserSelect')
                {
                    if (input.value !== "-1")
                    {
                        isAdvertiserFilterSelected = true;
                        advertiserSelected = input.value;
                    }
                    else
                    {
                        isAdvertiserFilterSelected = false;
                    }
                }
                if (id==='advAgencySelect')
                {
                    if (input.value !== "-1")
                    {
                        isAdvAgencyFilterSelected = true;
                        advAgencySelected = input.value;
                    }
                    else
                    {
                        isAdvAgencyFilterSelected = false;
                    }
                }                
                updateBodyRight("go=campaignsSearcher"+getQuerySearch());
            }
            
            function showDetailsCampaign(id)
            {
                updateMenuLocation("go=detailsCampaign");
                updateBodyLeft("go=detailsCampaign"+"&id_campaign="+id);
                updateBodyRight("go=detailsCampaign"+"&id_campaign="+id);                
                //alert("Mostrando los detalles de la campaña "+id);
            }
            
            function modifyObject(obj, id)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                updateNotificationArea("action=delete&obj="+obj+"&id="+id);
            }            
            
            function deleteObject(obj, id)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                updateNotificationArea("action=delete&obj="+obj+"&id="+id);
            }
            
            function createObject(obj)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                updateNotificationArea("action=create&obj="+obj);                
            }
            
            function confirmDeletionObject(obj, id)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = true;
                hideNotificationArea();
                if (DEBUG_MSG) window.alert("Se confirma la eliminación del objecto "+obj+" con id: "+id);
                
                if (obj === 'user')
                {
                    var query = "service=validation&type=full&form=deleteUserForm&id="+id;
                    post(DATA_SERVICE, query, responseConfirmDeletionObject);
                }
            }
            
            function responseConfirmDeletionObject(response)
            {
                var response = jQuery.parseJSON(response);
                var query = "service=interface&section=notification&action=delete&form=deleteUserForm";
                post(DATA_SERVICE, query, showMsgInfoFormOk);
            }
            
            function confirmCreationObject(obj, data)
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = true;
                hideNotificationArea();                
                window.alert("Se confirma la creación del objecto "+obj+" con los siguientes datos: "+id);
            }
            
            function cancelConfirm()
            {
                _ALLOW_HIDE_NOTIFICATION_AREA = true;
                hideNotificationArea();                
            }
            
            function generateDaysByDaySelected(daySelected)
            {
                _days = [];
                c = 0;
                for(i=daySelected; i<=31; i++)
                    {
                        _days[c] = i;
                        c++;
                    }
                    return _days;
            }
            
            function generateMontsByDaySelected(day)
            {
                if (day < 30)
                {
                    return {'1':'Enero', '2':'Febrero', '3':'Marzo', '4':'Abril', '5':'Mayo', '6':'Junio',
                            '7':'Julio', '8':'Agosto', '9':'Septiembre', '10':'Octubre', '11':'Noviembre', '12':'Diciembre'};
                }
                if (day > 30)
                {
                    return {'1':'Enero', '3':'Marzo', '5':'Mayo', '7':'Julio', '8':'Agosto', '10':'Octubre', '12':'Diciembre'};                    
                }
            }
            
            function generateMonthsByMonthStartSelected(monthSelected)
            {
                _months = {'1':'Enero', '2':'Febrero', '3':'Marzo', '4':'Abril', '5':'Mayo', '6':'Junio',
                            '7':'Julio', '8':'Agosto', '9':'Septiembre', '10':'Octubre', '11':'Noviembre', '12':'Diciembre'};
                _sublist = {};
                
                for (var key in _months) 
                {
                    if (monthSelected >= parseInt(key))
                    {
                        _sublist[key] = _months[key];
                    }
                }
                
                return _sublist;
            }
            
            function updateMonthStart(listMonts)
            {
                
            }
            
            function updateDateCampaing(field)
            {                
                if (field === 'dayStartCampaign')
                {
                    _dayStart = $('#'+field).val();
                }
                
                if (field === 'monthStartCampaign')
                {
                    _monthStart = $('#'+field).val();
                }                
            }
            function validateMediaFiles(input)
            {
                var _files = input.files;
                var _query = "action=form_validation&type=partial&form=uploadMediaForm";
                
                for(i=0; i<_files.length; i++)
                {
                    _query += "&files[]="+_files[i].name+"&sizes[]="+_files[i].size;
                }
                alert(_query);
                post(DATA_SERVICE, _query, processResponseValidateMediaFiles);
                showListMediaFiles(input);
            }
            function ajaxUploadFiles(data)
            {
                $.ajax({
                    url: DATA_SERVICE,
                    data: data,
                    cache: false,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data){
                      completeUploadMediaFiles(data);
                    }
                  });
            }
            function completeUploadMediaFiles(data)
            {
                alert(data);
                $('#notification_area_waiting_upload_files').css({'display':'none', 'opacity':'0.0'}); 
                $('#notification_area_layout_waiting').css({'display':'none', 'opacity':'0.0'});      
            }
            function uploadMediaFiles()
            {
                $('#notification_area_waiting_upload_files').css({'display':'block', 'opacity':'1.0'}); 
                $('#notification_area_layout_waiting').css({'display':'block', 'opacity':'0.5'});                 
                var input = $("#inputFileUploadMediaForm")[0];
                var _campaignSelected = $("#selectCampaignUploadMediaForm").val();
                var _formData = new FormData();
                var _virtualNames = $("input[name='fileVirtualNameUploadMediaForm[]']");
                _formData.append('action', 'form_validation');
                _formData.append('type', 'full');
                _formData.append('form', 'uploadMediaForm');
                var _files = input.files;
                
                for(i=0; i<_files.length; i++)
                {
                    _formData.append('virtualNames[]',_virtualNames[i].value);
                    _formData.append('files[]',_files[i]);
                    _formData.append('fileNames[]',_files[i].name);
                    _formData.append('fileSizes[]',_files[i].size);

                }
                ajaxUploadFiles(_formData);
            }            
            
            function processResponseValidateMediaFiles(data)
            {
                alert(data);
                
            }
            
            function showListMediaFiles(input)
            {
                var _divListMedia = "#base_layout_body_right_content_form_row_file_list";
                var _files = input.files;

                
                var html = "<table class='tableBody'>";
                html += "<tr>";
                    html += "<th>";
                        html += "Nombre Real";
                    html += "</th>";
                    html += "<th>";
                        html += "Nombre Virtual";
                    html += "</th>";                    
                    html += "<th>";
                        html += "Tipo de Publicidad";
                    html += "</th>";                               
                html += "</tr>";
                for(i=0; i<_files.length; i++)
                {
                    html += "<tr>";
                    html += "<td>";
                    html += _files[i].name;
                    html += "</td>";
                    html += "<td>";
                    html += "<input type='text' name='fileVirtualNameUploadMediaForm[]' style='width:90%'>";
                    html += "</td>";                      
                    html += "<td>";
                    html += "<select style='width:90%'>";
                    html += "<option value='Publicidad en Radio'>Publicidad en Radio</option>";
                    html +="</select>";
                    html += "</td>";                    
                    html += "</tr>";
                }
                html += "</table>";
                
                $(_divListMedia).html(html);
            }
            
            function cancelForm(formName)
            {
                if(formName === "registerMeForm")
                {
                    go("viewLogin");
                }                
                if(formName === "uploadFileMediaForm")
                {
                    go("campaignsSearcher");
                }
                if(formName === "createCampaignForm")
                {
                    go("campaignsSearcher");
                }                
                if (
                        (formName === "createUserForm") 
                        ||
                        (formName === "modifyCampaignForm")
                    )
                {
                    go("campaignsSearcher");
                }   
                if(formName === "recoverMyPasswordForm")
                {
                    go("viewLogin");
                }                
            }
            
            function createAssociationMediaFTP()
            {
                var _idcampiang = $("#campaignMedia").val();
                var _checkboxList = $("input[name='checkboxUploadMediaFTPForm[]']");
                
                var _virtualNameList = $("input[name='virtualNameUploadMediaFTPForm[]']");
                var _typeAdviceList = $("select[name='typeAdviceUploadMediaFTPForm[]']");
                
                var _query = "service=validation&type=full&form=uploadMediaFTPForm&id_campaign="+_idcampiang;
                
                for(i=0; i<_checkboxList.length; i++)
                {
                    if (_checkboxList[i].checked === true)
                    {
                        _query += "&checboxs[]="+_checkboxList[i].value;
                        _query += "&virtualName[]="+_virtualNameList[i].value;
                        _query += "&typeAdvice[]="+_typeAdviceList[i].value;
                    }
                }
                
                alert(_query);
            }
            
            function createQueryValidationForm(formName, fields)
            {
                var _query = "service=validation&type=full&form="+formName;
                
                for(i=0; i<fields.length; i++)
                {
                    var _fieldName = fields[i]+formName;
                    _query = "&";
                }
            }
            
            function fullValidationQuery(form, fields)
            {
                var _query ="service=validation&type=full&form="+form;
                
                for(i=0; i<fields.length; i++)
                {
                    var _name = fields[i];
                    var _value = $("#"+_name).val();
                    _query += "&" + _name + "=" + _value;
                }
                
                
                return _query;
            }
            function validateLoginResponse(response)
            {
                var responseObj = jQuery.parseJSON(response);
                
                if (responseObj.result === 'ok')
                {
                    go('campaignsSearcher');
                }
                else
                {
                    generateMsgErrorFormFail(responseObj);
                }
            }
            function validateRegisterMeResponse(response)
            {
                var responseObj = jQuery.parseJSON(response);
                
                if (responseObj.result === 'ok')
                {
                    go('campaignsSearcher');
                }
            }            
            function validateForm(form)
            {
                if (form === "loginForm")
                {
                    var _form = "loginForm";
                    var _fields = ['emailLoginForm', 'passwordLoginForm'];
                    post(DATA_SERVICE, fullValidationQuery(_form, _fields), validateLoginResponse);
                }

                if (form === "createUserForm")
                {
                    serializeForm('createUserForm');
                }
                
                if (form === "createTargetPeopleForm")
                {
                    serializeForm('createTargetPeopleForm');
                }  
                if (form === "createAdvertiserForm")
                {
                    serializeForm('createAdvertiserForm');
                }  
                if (form === "createAdvAgencyForm")
                {
                    serializeForm('createAdvAgencyForm');
                } 
                if (form === "createCampaignForm")
                {
                    serializeForm('createCampaignForm');
                } 
                if (form === "modifyCampaignForm")
                {
                    serializeForm('modifyCampaignForm');
                }
                
            }
            
            function service(name)
            {
                return "service="+name;
            }
            
            function serializationService()
            {
                return service('serialization') + "&";
            }
            
            function fullValidationService(form, data)
            {
                var _query = service('validation') + "&type=full&form=" + form + data;
                
                post(DATA_SERVICE, _query, responseValidation);
            }
            
            function serializeForm(form)
            {
                var _query = serializationService() + "form="+form;
                post(DATA_SERVICE,_query, validate);
            }       
            function serializeField(field)
            {
                if ((field.type === 'text') || (field.type === 'password'))
                {
                    var fieldName = field.name;
                    var fieldObj = $('#'+fieldName);
                    var value = fieldObj.val();
                    return field.name + "=" + value;
                }
                if (field.type === 'select')
                {
                    var fieldName = field.name;
                    var fieldObj = $('#'+fieldName);
                    var value = fieldObj.val();
                    return field.name + "=" + value;
                }                
            }
            function validate(dataValidation)
            {
                if (DEBUG_MSG) alert(dataValidation);
                var data = jQuery.parseJSON(dataValidation);
                                
                var _fields = data.fields;
                var _query = '';
                for(i=0; i<_fields.length; i++)
                {
                    _query +="&";
                    _query += serializeField(_fields[i]);
                }

                fullValidationService(data.form, _query);
            }
            
            function responseValidation(response)
            {
                if (DEBUG_MSG) alert(response);
                window.alert(response);
                var response = jQuery.parseJSON(response);
                
                if (response.result === 'ok')
                {
                    generateMsgInfoFormOk(response);
                }
                else
                {
                    generateMsgErrorFormFail(response);
                }
                        
                
            }
            
            function generateMsgErrorFormFail(response)
            {
                
                var divErrorNotification = $(NOTIFICATION_AREA_ERROR);
                var _errors = response.errors;
                var _html = "<p style='margin-left:15%; margin-right:15%'>Se han producido los siguientes errores: </p>";
                _html += "<ul style='text-align:left; margin-left:15%;margin-right:15%'>";
                for(i=0; i<_errors.length; i++)
                {
                    _html += "<li>"+_errors[i]+"</li>";
                }
                _html += "</ul>";
                _html += "<p style='text-align:center'><input type='submit' value='Entendido' onclick='closeNotificationAreaErrors()'></p>"
                divErrorNotification.html(_html);
                divErrorNotification.css({'display':'block'});
                $('#notification_area_layout').css({'display':'block', 'opacity':'0.0', 'blur':'5px'});
                $('#notification_area_layout').animate({'display':'block', 'opacity':'0.5'}, 'fast', 'swing');   
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                 
            }
            
            function generateMsgInfoFormOk(response)
            {
                post(DATA_SERVICE, "service=interface&section=notification&action=create&form="+response.form, showMsgInfoFormOk);
            }
            
            function showMsgInfoFormOk(html)
            {
                isNotificationAreaSuccessOpen = true;
                var divNotificationSuccess = $(NOTIFICATION_AREA_SUCCESS);              
                divNotificationSuccess.html(html);
                divNotificationSuccess.css({'display':'block'});                
                _ALLOW_HIDE_NOTIFICATION_AREA = false;
                $('#notification_area_layout').css({'display':'block', 'opacity':'0.0'});
                $('#notification_area_layout').animate({'display':'block', 'opacity':'0.5'}, 'fast', 'swing');                
            }
            
            function closeNotificationAreaSuccess()
            {
                var divNotification = $(NOTIFICATION_AREA_SUCCESS);
                divNotification.css({'display':'none'});
                
                $('#notification_area_layout').animate({'display':'none', 'opacity':'0.0'}, 'fast', 'swing'); 
                $('#notification_area_layout').css({'display':'none'});
                _ALLOW_HIDE_NOTIFICATION_AREA = true;                
            }
            
            function closeNotificationAreaErrors()
            {
                var divErrorNotification = $(NOTIFICATION_AREA_ERROR);
                divErrorNotification.css({'display':'none'});
                
                $('#notification_area_layout').animate({'display':'none', 'opacity':'0.0'}, 'fast', 'swing'); 
                $('#notification_area_layout').css({'display':'none'});
                _ALLOW_HIDE_NOTIFICATION_AREA = true;
            }
           
           /*
            function interafaceService()
            {
                return service('interface');
            }
           
            function section(name)
            {
                return "&section="+name;
            }
           
            function notificationQueryService(query)
            {
                return interfaceService() + section('notification') + query;
            }
            
            function showNotificationAreaLayout()
            {}
            
            function showNotificationAreaSuccess()
            {}
            
            function showNotificationAreaError()
            {}
            
            function hideNotificationAreaLayout()
            {}
            
            function hideNotificationAreaSuccess()
            {}
            
            function hideNotificationAreaError()
            {}
            
            function updateNotificationArea(response)
            {
                
            }*/
            
            
            function updateProfileSection()
            {
                var _id = "#base_layout_head_right_content";
                $(_id).html("");
                var _query = "service=interface&section=profile";
                post(DATA_SERVICE, _query, updateProfileSectionCallBack);
            }
            
            function updateProfileSectionCallBack(data)
            {
                var _id = "#base_layout_head_right_content";
                $(_id).html("");
                $(_id).html(data);
            }
            
            function updateMenuUpSection()
            {
                var _id = "#base_layout_head_menu_up";
                $(_id).html("");
                var _query = "service=interface&section=menu_up";
                post(DATA_SERVICE, _query, updateMenuUpSectionCallBack);
            }
            
            function updateMenuUpSectionCallBack(data)
            {
                var _id = "#base_layout_head_menu_up";
                $(_id).html("");
                $(_id).html(data);
            }            
            
            function systemService(query)
            {
                var _query = "service=system&"+query;
                post(DATA_SERVICE, _query, systemCallBack);
            }
            
            function systemCallBack(data)
            {
            }           
            
            function modifyObject(obj, id)
            {
               if (obj === "campaign")
               {
                    updateMenuLocation("go=modifyCampaign"); 
                    updateBodyLeft("go=modifyCampaign");
                    updateBodyRight("go=modifyCampaign&id="+id);                       
               }


            }