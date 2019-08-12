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

function kick(no)
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "test_result_entry_data.php";
    url = url + "?Command=" + "pass_ptes";
    url = url + "&refno=" + no;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;


    xmlHttp.onreadystatechange = passtest_ind;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}



function passtest_ind()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails1').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("serino");
        document.getElementById('serino').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("initial");
        document.getElementById('ini').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        document.getElementById('pname').value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("age");
        document.getElementById('age').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sex");
        document.getElementById('sex').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("docnname");
        document.getElementById('docctor').value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
        document.getElementById('mrefno').value = XMLAddress1[0].childNodes[0].nodeValue;

    }
}



function add_tmp(no)
{

    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }



    var url = "test_result_entry_data.php";
    url = url + "?Command=" + "add_tmp";
    url = url + "&test_code=" + no;
    url = url + "&refno=" + document.getElementById('refno').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;
    url = url + "&mrefno=" + document.getElementById('mrefno').value;

    url = url + "&entdate=" + document.getElementById('entdate').value;
    url = url + "&serino=" + document.getElementById('serino').value;

    xmlHttp.onreadystatechange = showarmyresult_addtmp;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}

function showarmyresult_addtmp()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails2').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("count");
        document.getElementById('count').value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}




function shownavyresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);
        //setTimeout("location.reload(true);",500);
        //if (xmlHttp.responseText=="exist"){
        //	alert("Already Exists");	
        //}
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("navy_table");
        document.getElementById('tblnavy').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

function itemresultdel()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);
        //setTimeout("location.reload(true);",500);
        //if (xmlHttp.responseText=="exist"){
        //	alert("Already Exists");	
        //}
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;


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

    if (document.getElementById('refno').value != "") {
        var url = "test_result_entry_data.php";
        url = url + "?Command=" + "save_item";

        url = url + "&refno=" + document.getElementById('refno').value;
        url = url + "&entdate=" + document.getElementById('entdate').value;
        url = url + "&stime=" + document.getElementById('stime').value;
        url = url + "&serino=" + document.getElementById('serino').value;
        url = url + "&sdate=" + document.getElementById('sdate').value;
        url = url + "&docctor=" + document.getElementById('docctor').value;
        url = url + "&pname=" + document.getElementById('pname').value;
        url = url + "&ini=" + document.getElementById('ini').value;
        url = url + "&age=" + document.getElementById('age').value;

        url = url + "&sex=" + document.getElementById('sex').value;
        url = url + "&remar=" + document.getElementById('remar').value;
        url = url + "&count=" + document.getElementById('count').value;
        url = url + "&mrefno=" + document.getElementById('mrefno').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;


        var j = 1;
        var i = parseInt(document.getElementById('count').value);
        while (i >= j) {
            test_desc = "test_desc" + j;
            result = "result" + j;
            msg = "msg" + j;
            mid = "mid" + j;
            url = url + "&" + test_desc + "=" + document.getElementById(test_desc).value;
            url = url + "&" + result + "=" + document.getElementById(result).value;
            url = url + "&" + msg + "=" + document.getElementById(msg).value;
            url = url + "&" + mid + "=" + document.getElementById(mid).value;
            j = j + 1;
        }


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

function arnno_gin(arno)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "test_result_entry_data.php";
    url = url + "?Command=" + "pass_arnno_gin";
    url = url + "&refno=" + arno;
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("initial");
        opener.document.form1.ini.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("age");
        opener.document.form1.age.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sex");
        opener.document.form1.sex.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("entdate");
        opener.document.form1.entdate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
        opener.document.form1.mrefno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        opener.document.form1.pname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        opener.document.form1.pname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("paname");
        opener.document.form1.pname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("recdet");
        opener.document.form1.refno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("docnname");
        opener.document.form1.docctor.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("labdate");
        opener.document.form1.sdate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("remark");
        opener.document.form1.remar.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        opener.document.form1.tmpno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("count");
        opener.document.form1.count.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        window.opener.document.getElementById('itemdetails2').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table1");
        window.opener.document.getElementById('itemdetails1').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;


        window.opener.document.getElementById('itemdetails').innerHTML = "";



        self.close();
    }
}




function close_form()
{
    self.close();
}


function print_inv()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "result_print.php";
    url = url + "?refno=" + document.getElementById('tmpno').value;
    window.open(url, '_blank');



    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
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
    document.getElementById('stime').value = "";
    document.getElementById('serino').value = "";
    document.getElementById('sdate').value = "";
    document.getElementById('docctor').value = "";
    document.getElementById('pname').value = "";
    document.getElementById('ini').value = "";
    document.getElementById('pname').value = "";
    document.getElementById('age').value = "";
    document.getElementById('mrefno').value = "";
    document.getElementById('sex').value = "";
    document.getElementById('remar').value = "";

    document.getElementById('itemdetails').innerHTML = "";
    document.getElementById('itemdetails1').innerHTML = "";
    document.getElementById('itemdetails2').innerHTML = "";

    var url = "test_result_entry_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_invno() {

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
        document.getElementById('refno').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sdate");
        document.getElementById('entdate').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sdate");
        document.getElementById('sdate').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txttime");
        document.getElementById('stime').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;
        load_medis();
    }
}

function load_medis() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "test_result_entry_data.php";
    url = url + "?Command=" + "load_medis";
    url = url + "&sdate=" + document.getElementById('entdate').value;

    xmlHttp.onreadystatechange = assign_medis;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);



}


function assign_medis() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
    }
}


function updt_tmp(no)
{





    var url = "test_result_entry_data.php";
    url = url + "?Command=" + "updt_tmp";
    url = url + "&refno=" + document.getElementById('refno').value;
    url = url + "&count=" + document.getElementById('count').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;
    url = url + "&mid=" + no;

    var j = 1;
    var res = 0;
    var resh = 0;
    var resl = 0;


    var i = parseInt(document.getElementById('count').value);
    while (i >= j) {


        test_desc = "test_desc" + j;
        result = "result" + j;
        msg = "msg" + j;
        mid = "mid" + j;
        rfrom = "rfrom" + j;
        rto = "rto" + j;
        if (document.getElementById(result).value !== '') {
            res = parseFloat(document.getElementById(result).value);
            resl = parseFloat(document.getElementById(rfrom).value);
            resh = parseFloat(document.getElementById(rto).value);


            if (res < resl) {
                document.getElementById(msg).value = "LOW";
            }
            if (res > resh) {
                document.getElementById(msg).value = "HIGH";
            }


            if ((res <= resh) & (res >= resl)) {
                document.getElementById(msg).value = "NORMAL";
            }
        }





        url = url + "&" + test_desc + "=" + document.getElementById(test_desc).value;
        var str = document.getElementById(result).value;
        var res = str;

        if (document.getElementById(result).value == "+") {
            str = document.getElementById(result).value;
            res = str.replace(/\+/g, "|");
        } else if (document.getElementById(result).value == "++") {
            str = document.getElementById(result).value;
            res = str.replace(/\++/g, "||");
        } else if (document.getElementById(result).value == "+++") {
            str = document.getElementById(result).value;
            res = str.replace('+++', "|||");
        }
        url = url + "&" + result + "=" + res;
        url = url + "&" + msg + "=" + document.getElementById(msg).value;
        url = url + "&" + mid + "=" + document.getElementById(mid).value;
        j = j + 1;
    }

    xmlHttp.onreadystatechange = "";
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


    var url = "test_result_entry_data.php";
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
        var str = "Results List On ";
        res = str.concat(document.getElementById('sdate').value);
        document.getElementById('textt').innerHTML = res;


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

        var url = "test_result_entry_data.php";
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



