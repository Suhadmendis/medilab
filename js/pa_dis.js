function GetXmlHttpObject()
{
    var xmlHttp = null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}


function keyset(key, e)
{

    if (e.keyCode == 13) {
        document.getElementById(key).focus();
    }
}

function keychange(key)
{

    document.getElementById(key).focus();

}

function got_focus(key)
{
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key)
{
    document.getElementById(key).style.backgroundColor = "#000000";

}


function save_inv(inv_status)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('txtpercentage').value != "") {
        var url = "pa_disapp_data.php";
        url = url + "?Command=" + "save_item";

        url = url + "&txtrefno=" + document.getElementById('refno').value;
        url = url + "&txtdate=" + document.getElementById('txtdate').value;
        url = url + "&txtpercentage=" + document.getElementById('txtpercentage').value;




        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else {
        alert("Please Enter Percentage !!!");
    }

}


function salessaveresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        if (xmlHttp.responseText == "logout") {
            alert("Please Login Again !!!");
        } else if (xmlHttp.responseText == "no") {
            alert("Empty Items !!!");
        } else {
            document.getElementById('itemdetails').innerHTML =(xmlHttp.responseText);
            document.getElementById('txtdate').value="";
            document.getElementById('txtpercentage').value="";
        }
        

    }
}

function close_form() {
    self.close();
}




function del_item(cid)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    
        var url = "pa_disapp_data.php";
        url = url + "?Command=" + "del_item";
        url = url + "&txtrefno=" + document.getElementById('refno').value;
        url = url + "&id=" + cid;
       
        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
}