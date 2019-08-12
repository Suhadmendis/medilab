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


function med_mast_ass(CODE, COUNTRY, Head, SH_CODE, REF_NO_C)
{
	
    document.getElementById('code').value=CODE;	
	document.getElementById('country').value=COUNTRY;	
	document.getElementById('country_head').value=Head;	
	document.getElementById('short').value=SH_CODE;	
	document.getElementById('reference').value=REF_NO_C;	
}

function save_inv()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    if (document.getElementById('code').value != "") {
        var url = "country_mast_data.php";
        url = url + "?Command=" + "save_item";
        url = url + "&code=" + document.getElementById('code').value;
        url = url + "&country=" + document.getElementById('country').value;
        url = url + "&country_head=" + document.getElementById('country_head').value;
        url = url + "&short=" + document.getElementById('short').value;
		url = url + "&reference=" + document.getElementById('reference').value;


        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else {
        alert("Please Click New !!!");
    }

}

function salessaveresult()
{


    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        if (xmlHttp.responseText == "logout") {
            alert("Please Login Again !!!");
        } else if (xmlHttp.responseText == "no") {
            alert("Not Saved");
        } else {
            alert(xmlHttp.responseText);
            location.reload(true);
        }
    }
}





function docno(arno)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "doctor_mast_data.php";
    url = url + "?Command=" + "pass_docno";
    url = url + "&code=" + arno;
    //alert(url);

    xmlHttp.onreadystatechange = result_pass_arnno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function result_pass_arnno()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("code");
        document.form1.code.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("name");
        document.form1.name.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("address");
        document.form1.address.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("charges");
        document.form1.com_rate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tele");
        document.form1.tele.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("fax");
        document.form1.fax.value = XMLAddress1[0].childNodes[0].nodeValue;
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doccharge");
        document.form1.doccharge.value = XMLAddress1[0].childNodes[0].nodeValue;
        
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("hoscharge");
        document.form1.hoscharge.value = XMLAddress1[0].childNodes[0].nodeValue;        
        
        
      

        
    }

}


function cancel_inv()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    //alert(inv_status);

    var url = "arn_data.php";
    url = url + "?Command=" + "cancel_inv";

    url = url + "&invno=" + document.getElementById('invno').value;
    url = url + "&orderno1=" + document.getElementById('orderno1').value;
    url = url + "&department=" + document.getElementById('department').value;

    xmlHttp.onreadystatechange = salescancelresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function salescancelresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert(xmlHttp.responseText);
        setTimeout("location.reload(true);", 500);
        if (xmlHttp.responseText == "exist") {
            alert("Already Exists");
        }

    }
}

function close_form()
{
    self.close();
}

function new_inv()
{


  /*  xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }*/


    document.getElementById('code').value = "";
    document.getElementById('country').value = "";
    document.getElementById('country_head').value = "";
	document.getElementById('short').value = "";
	document.getElementById('reference').value = "";
  

   /* var url = "medical_mast_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);*/

}

function assign_invno() {

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('code').value = xmlHttp.responseText;
    }


}

















 