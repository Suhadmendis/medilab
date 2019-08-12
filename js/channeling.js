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







function getcode()
{

    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('refno').value != "") {

        var url = "channeling_entry_data.php";
        url = url + "?Command=" + "add_tmp";
        url = url + "&refno=" + document.getElementById('refno').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        url = url + "&doccode=" + document.getElementById('doccode').value;
        url = url + "&doctor=" + document.getElementById('doctor').value;

        url = url + "&appdate=" + document.getElementById('appdate').value;
        xmlHttp.onreadystatechange = showarmyresult_addtmp;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }
}

function showarmyresult_addtmp()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doccode");
        document.getElementById('doccode').value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("serino");
        document.getElementById('tot').value = 0;
        document.getElementById('hoscharge').value = 0;
        document.getElementById('doccharge').value = 0;

        if (XMLAddress1[0].childNodes[0].nodeValue != "-") {
            document.getElementById('serino').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("hoscharge");
            document.getElementById('hoscharge').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doccharge");
            document.getElementById('doccharge').value = XMLAddress1[0].childNodes[0].nodeValue;

            var tot = 0;
            tot = parseFloat(document.getElementById('hoscharge').value) + parseFloat(document.getElementById("doccharge").value);
            document.getElementById('tot').value = tot;


        }
    }
}







function save_inv(inv_status)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('cash').value == "") {
        alert("Please Enter Paid Amount");
        return;
    }


    if (document.getElementById('refno').value != "") {
        var url = "channeling_entry_data.php";
        url = url + "?Command=" + "save_item";

        url = url + "&entdate=" + document.getElementById('entdate').value;
        url = url + "&refno=" + document.getElementById('refno').value;
        url = url + "&serino=" + document.getElementById('serino').value;
        url = url + "&doctor=" + document.getElementById('doctor').value;
        url = url + "&ini=" + document.getElementById('ini').value;
        url = url + "&name=" + document.getElementById('name').value;
        url = url + "&add=" + document.getElementById('add').value;
        url = url + "&remark=" + document.getElementById('remark').value;
        url = url + "&age=" + document.getElementById('age').value;
        url = url + "&sex=" + document.getElementById('sex').value;
        url = url + "&paytype=" + document.getElementById('paytype').value;
        url = url + "&cash=" + document.getElementById('cash').value;
        url = url + "&tele=" + document.getElementById('tele').value;


        url = url + "&doccharge=" + document.getElementById('doccharge').value;
        url = url + "&hoscharge=" + document.getElementById('hoscharge').value;




        url = url + "&appdate=" + document.getElementById('appdate').value;
        url = url + "&doccode=" + document.getElementById('doccode').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        url = url + "&time=" + document.getElementById('time').value;
        url = url + "&fileno=" + document.getElementById('fileno').value;


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
            print_inv();

            new_inv();
        }

    }
}





function del_item(no)
{
    var url = "channeling_entry_data.php";
    url = url + "?Command=" + "del_item";
    url = url + "&id=" + no;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;
    xmlHttp.onreadystatechange = showarmyresult_addtmp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}





function arnno_gin(arno)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "channeling_entry_data.php";
    url = url + "?Command=" + "pass_arnno_gin";
    url = url + "&arnno=" + arno;
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("serino");
        opener.document.form1.serino.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("entdate");
        opener.document.form1.entdate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
        opener.document.form1.refno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        opener.document.form1.name.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doctor");
        opener.document.form1.doctor.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doc_code");
        opener.document.form1.doccode.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tele");
        opener.document.form1.tele.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("remark");
        opener.document.form1.remark.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paadd");
        opener.document.form1.add.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("initial");
        opener.document.form1.ini.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("initial");
        opener.document.form1.ini.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sex");
        opener.document.form1.sex.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("age");
        opener.document.form1.age.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cash");
        opener.document.form1.cash.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        window.opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doccharge");
        opener.document.form1.doccharge.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("hoscha");
        opener.document.form1.hoscharge.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        opener.document.form1.tmpno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("fileno");
        opener.document.form1.fileno.value = XMLAddress1[0].childNodes[0].nodeValue;

        var tot = 0;
        tot = parseFloat(opener.document.form1.hoscharge.value) + parseFloat(opener.document.form1.doccharge.value);
        opener.document.form1.tot.value = tot;



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

        var url = "channeling_entry_data.php";
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
    document.getElementById('serino').value = "";

    document.getElementById('ini').value = "";
    document.getElementById('name').value = "";
    document.getElementById('add').value = "";
    document.getElementById('tele').value = "";

    document.getElementById('remark').value = "";
    document.getElementById('age').value = "";
    document.getElementById('sex').value = "";
    document.getElementById('paytype').value = "";
    document.getElementById('cash').value = "";

    document.getElementById('doccharge').value = "";
    document.getElementById('hoscharge').value = "";

    document.getElementById('remark').value = "";

    var objbrand = document.getElementById("doctor");
    objbrand.options[0].selected = true;

    var objbrand = document.getElementById("ini");
    objbrand.options[0].selected = true;

    document.getElementById('itemdetails').innerHTML = "";


    var url = "channeling_entry_data.php";
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdate");
        document.getElementById('appdate').value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("serino");
        document.getElementById('serino').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txttime");
        document.getElementById('time').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;

        getcode();
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

    var url = "channel_print.php";
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


    var url = "search_channel_data.php";
    url = url + "?Command=" + "search_inv";

    if (document.getElementById('invno').value != "") {
        url = url + "&mstatus=invno";
    } else if (document.getElementById('customername').value != "") {
        url = url + "&mstatus=customername";
    }

    url = url + "&invno=" + document.getElementById('invno').value;
    url = url + "&customername=" + document.getElementById('customername').value;
    url = url + "&stname=" + stname;
    url = url + "&sdate=" + document.getElementById('sdate').value;
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
        var str = "Channel List On ";
        res = str.concat(document.getElementById('sdate').value);
        document.getElementById('textt').innerHTML = res;


    }
}




