
// Page Sections
NOTIFICATION = "#";
HEAD = "#";
BODY_LEFT = "#base_layout_body_left";
BODY_RIGHT = "#base_layout_body_right";
FOOTER = "#";


SERVICE = "../service/service.php";


function updateMenuUp(query)
{
    query += "&section=body";
}

function updateHead(query)
{
    query += "&section=head";    
}

function updateBodyLeft(query)
{
    query += "&sub_section=body_left";
    post(SERVICE, query, updateBodyLeftSection);
}

function updateBodyLeftSection(response)
{
    $(BODY_LEFT).html(response);
}

function updateBodyRight(query)
{
    query += "&sub_section=body_right";    
}
function updateBody(query)
{
    query += "&section=body";
    updateBodyLeft(query);
    updateBodyRight(query);
}

function updateIU(data)
{
    _query = "service=interface"+data;
    
    updateMenuUp(_query);
    updateHead(_query);
    updateBody(_query);
}