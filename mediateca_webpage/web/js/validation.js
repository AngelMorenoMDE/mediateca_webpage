            function checkService()
            {
                var _testQuery = $("#testQueryJSON").val();
                post("search.php", _testQuery, updateDataResponseService);
            }
            
            function updateDataResponseService(data)
            {
                $("#responseDataService").html(data);
            }
            
            
            function updateMenuLocation(data)
            {
                post(MENU_LOCATION_SERVICE, data, updateMenuLocationContent);                  
            }
            
            function validateCampaignForm()
            {
                var _form = "CampaignForm";
                var _fields = ['name', 'target', 'dayStart', 'monthStart', 'yearStart', 
                               'dayEnd', 'monthEnd', 'yearEnd', 'targetPeople', 'advertiser', 
                               'advAgency', 'cost', 'summary'];
                
                var requestQuery = "action=validate_form&form="+_form;
                
                for(i=0; i<_fields.length; i++)
                {
                    var nameField = _fields[i]+_form;
                    var valueField = id(nameField).val();
                    
                    requestQuery += "&";
                    requestQuery += nameField+"="+valueField;                    
                }
                
                alert(requestQuery);
                
            }
            /*
            function formsService(query)
            {
                
            }
            
            function service(name)
            {
                return "service="+name;
            }


            
            function serialize(dataSerialization)
            {
                var data = jQuery.parseJSON( "'"+dataSerialization+"'");
                alert(data);
            }*/