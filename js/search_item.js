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

function update_list()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    //alert("ok");
    var url = "search_stk_data.php";
    url = url + "?Command=" + "search_item";
    if (document.getElementById('item_name').value != "") {
        url = url + "&mstatus=name";
    } else if (document.getElementById('itemno').value != "") {
        url = url + "&mstatus=itemno";
    } else if (document.getElementById('model').value != "") {
        url = url + "&mstatus=model";
    }

    url = url + "&item_name=" + document.getElementById('item_name').value;
    url = url + "&itemno=" + document.getElementById('itemno').value;
    url = url + "&model=" + document.getElementById('model').value;

    //alert(url);		
    xmlHttp.onreadystatechange = showinvresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showinvresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;
    }
}

function itemno_ind()
{
    clear_item_ind();

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_stk_data.php";
    url = url + "?Command=" + "pass_invno";
    url = url + "&itno=" + document.getElementById('txtSTK_NO').value;


    xmlHttp.onreadystatechange = passitemresult_ind;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
//		  alert(url);

}

function passitemresult_ind()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("STK_NO");
        document.getElementById('txtSTK_NO').value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("DESCRIPT");
        document.getElementById('txtDESCRIPTION').value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cost");
        document.getElementById('txtCOST').value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("SELLING");
        document.getElementById('txtSELLING').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("group");
        document.getElementById('txtgroup').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("unit");
        document.getElementById('txtunit').value = XMLAddress1[0].childNodes[0].nodeValue;


    }
}

function clear_item_ind()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    document.getElementById('txtDESCRIPTION').value = "";

    document.getElementById('txtCOST').value = "";

    document.getElementById('txtSELLING').value = "";



}

function itemno(itno)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "search_stk_data.php";
    url = url + "?Command=" + "pass_invno";
    url = url + "&itno=" + itno;

    xmlHttp.onreadystatechange = passitemresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
 
}


function passitemresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("STK_NO");
        opener.document.form1.txtSTK_NO.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("DESCRIPT");
        opener.document.form1.txtDESCRIPTION.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cost");
        opener.document.form1.txtCOST.value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("SELLING");
        opener.document.form1.txtSELLING.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("group");
        opener.document.form1.txtgroup.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("unit");
        opener.document.form1.txtunit.value = XMLAddress1[0].childNodes[0].nodeValue;


        self.close();


    }
}

function update_item_list()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_item_data.php";
    url = url + "?Command=" + "search_item_item_mast";
    url = url + "&itno=" + document.getElementById('itemno').value;
    url = url + "&itemname=" + document.getElementById('item_name').value;
    url = url + "&model=" + document.getElementById('model').value;

    url = url + "&checkbox=" + document.getElementById('checkbox').checked;

    if (document.getElementById('itemno').value != "") {
        url = url + "&mstatus=itno";
    } else if (document.getElementById('item_name').value != "") {
        url = url + "&mstatus=itemname";
    } else if (document.getElementById('model').value != "") {
        url = url + "&mstatus=model";
    }
    //alert(url);		
    xmlHttp.onreadystatechange = showitemresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showitemresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;
    }
}
