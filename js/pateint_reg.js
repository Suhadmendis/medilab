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




    if (document.getElementById('refno').value != "") {
        var url = "pateint_reg_data.php";
        url = url + "?Command=" + "save_item";

        url = url + "&entdate=" + document.getElementById('entdate').value;
        url = url + "&refno=" + document.getElementById('refno').value;


        url = url + "&ini=" + document.getElementById('ini').value;
        url = url + "&name=" + document.getElementById('name').value;
        url = url + "&add=" + document.getElementById('add').value;
        url = url + "&remark=" + document.getElementById('remark').value;
        url = url + "&age=" + document.getElementById('age').value;
        url = url + "&sex=" + document.getElementById('sex').value;

        url = url + "&tele=" + document.getElementById('tele').value;



        url = url + "&tmpno=" + document.getElementById('tmpno').value;


        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else {
        alert("Please Click New !!!");
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

            alert(xmlHttp.responseText);


            new_inv();
        }

    }
}





function del_item(no)
{
    var url = "pateint_reg_data.php";
    url = url + "?Command=" + "del_item";
    url = url + "&id=" + no;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;
    xmlHttp.onreadystatechange = showarmyresult_addtmp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}





function arnno_gin(arno, stname)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "pateint_reg_data.php";
    url = url + "?Command=" + "pass_arnno_gin";
    url = url + "&arnno=" + arno;
    url = url + "&stname=" + stname;
    //alert(url);

    xmlHttp.onreadystatechange = result_pass_arnno_gin;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function result_pass_arnno_gin()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

     

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        opener.document.form1.name.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tele");
        opener.document.form1.tele.value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paadd");
        opener.document.form1.add.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("initial");
        opener.document.form1.ini.value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sex");
        opener.document.form1.sex.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("age");
        opener.document.form1.age.value = XMLAddress1[0].childNodes[0].nodeValue;






        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        if (XMLAddress1[0].childNodes[0].nodeValue == "opd") {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("discount");
            opener.document.form1.disc.value = XMLAddress1[0].childNodes[0].nodeValue;
        }



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        if ((XMLAddress1[0].childNodes[0].nodeValue == "dapp") || (XMLAddress1[0].childNodes[0].nodeValue == "his")) {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tb");
            window.opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
            opener.document.form1.refno.value = XMLAddress1[0].childNodes[0].nodeValue;
        }
        
        
        
        

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        if (XMLAddress1[0].childNodes[0].nodeValue == "reg") {

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
            opener.document.form1.tmpno.value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("entdate");
            opener.document.form1.entdate.value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("remark");
            opener.document.form1.remark.value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
            opener.document.form1.refno.value = XMLAddress1[0].childNodes[0].nodeValue;

        }


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("stname");
        if ((XMLAddress1[0].childNodes[0].nodeValue != "reg") && (XMLAddress1[0].childNodes[0].nodeValue != "dapp") && (XMLAddress1[0].childNodes[0].nodeValue != "his") ) {
            
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
            opener.document.form1.fileno.value = XMLAddress1[0].childNodes[0].nodeValue;
        }

        self.close();


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

    var msg = confirm("Are you sure to DELETE ? ");
    if (msg == true) {

        var url = "pateint_reg_data.php";
        url = url + "?Command=" + "cancel_inv";

        url = url + "&invno=" + document.getElementById('refno').value;
        xmlHttp.onreadystatechange = salescancelresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    }
}

function salescancelresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert(xmlHttp.responseText);
        setTimeout("location.reload(true);", 500);

    }
}

function close_form()
{
    self.close();
}

function new_inv()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    document.getElementById('entdate').value = "";
    document.getElementById('refno').value = "";


    document.getElementById('ini').value = "";
    document.getElementById('name').value = "";
    document.getElementById('add').value = "";
    document.getElementById('tele').value = "";

    document.getElementById('remark').value = "";
    document.getElementById('age').value = "";
    document.getElementById('sex').value = "";


    var objbrand = document.getElementById("ini");
    objbrand.options[0].selected = true;




    var url = "pateint_reg_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}




function assign_invno() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
        document.getElementById('refno').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdate");
        document.getElementById('entdate').value = XMLAddress1[0].childNodes[0].nodeValue;







        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;


    }

}


function genderc() {
    var objbrand = document.getElementById("sex");
    objbrand.options[0].selected = true;
    if (document.getElementById('ini').value == "MS.") {
        objbrand.options[1].selected = true;
    } else if (document.getElementById('ini').value == "MRS.") {
        objbrand.options[1].selected = true;
    } else if (document.getElementById('ini').value == "MISS.") {
        objbrand.options[1].selected = true;
    } else if (document.getElementById('ini').value == "SIS.") {
        objbrand.options[1].selected = true;
    }
}

function print_inv()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "opd_print.php";
    url = url + "?refno=" + document.getElementById('tmpno').value;
    window.open(url, '_blank');


    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);



}




function update_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
 

    var url = "search_pareg_data.php";
    url = url + "?Command=" + "search_inv";

    if (document.getElementById('invno').value != "") {
        url = url + "&mstatus=invno";
    } else if (document.getElementById('customername').value != "") {
        url = url + "&mstatus=customername";
    } else if (document.getElementById('invdate').value != "") {
        url = url + "&mstatus=tele";
    }

    url = url + "&invno=" + document.getElementById('invno').value;
    url = url + "&customername=" + document.getElementById('customername').value;
    url = url + "&stname=" + stname;
     
    url = url + "&invdate=" + document.getElementById('invdate').value;
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
        var str = "Reg List On ";
        res = str.concat(document.getElementById('sdate').value);
        document.getElementById('textt').innerHTML = res;


    }
}




