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

function update_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

        
        document.getElementById('name').value="";
        document.getElementById('age').value="";
      document.getElementById('itemdetal').innerHTML="";
        document.getElementById('availab').innerHTML="";
        
    var url = "inq_data.php";
    url = url + "?Command=" + "search_inv";
    url = url + "&txtserino=" + document.getElementById('txtserino').value;
    url = url + "&txtdate=" + document.getElementById('txtdate').value;


    xmlHttp.onreadystatechange = showinvresult;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}



function showinvresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

   

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        document.form1.name.value = XMLAddress1[0].childNodes[0].nodeValue;

        

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("initial");
        document.form1.ini.value = XMLAddress1[0].childNodes[0].nodeValue;
 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sex");
        document.form1.sex.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("age");
        document.form1.age.value = XMLAddress1[0].childNodes[0].nodeValue;


     


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("itemdetal");
        document.getElementById('itemdetal').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
  

    


    }
}


function sel_one(cdata)
{
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 		
	
	var url="inq_data.php";
	url=url+"?Command="+"sel_one";
	url=url+"&cdata="+cdata;
	//alert(url);
	xmlHttp.onreadystatechange=sel_one_result;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	

}

function sel_one_result()
{
	
	var XMLAddress1;
	//alert(xmlHttp.responseText);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("rep_sel");	
		document.getElementById('availab').innerHTML= XMLAddress1[0].childNodes[0].nodeValue;
	}
	
}


function print_me() {
     xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "label_print.php";
    url = url + "?txtserino=" + document.getElementById('txtserino').value;
    url = url + "&txtdate=" + document.getElementById('txtdate').value;
    window.open(url, '_blank');

    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function close_form() {
    self.close();
}


function desel_one(cdata)
{
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 		
	
	var url="inq_data.php";
	url=url+"?Command="+"desel_one";
	url=url+"&cdata="+cdata;
	//alert(url);
	xmlHttp.onreadystatechange=desel_one_result;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	

}

function desel_one_result()
{
	
	var XMLAddress1;
	//alert(xmlHttp.responseText);
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("rep_sel");	
		document.getElementById('availab').innerHTML= XMLAddress1[0].childNodes[0].nodeValue;
	}
	
}


function  new_inv()
{
	
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 		
	
        document.getElementById('txtserino').value="";
        document.getElementById('name').value="";
        document.getElementById('age').value="";
        
        document.getElementById('itemdetal').innerHTML="";
        document.getElementById('availab').innerHTML="";
                
       document.getElementById('txtserino').select();
	

}
