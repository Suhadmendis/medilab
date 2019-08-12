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


function add_me(textarea, e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) { //Enter keycode
        alert('enter press');
    }
}


function add_tmp(cdata)
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('refno').value != "") {

        var url = "opd_medical_data.php";
        url = url + "?Command=" + "add_tmp";
        url = url + "&refno=" + document.getElementById('refno').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        url = url + "&test_det=" + cdata;
        url = url + "&disc=" + document.getElementById('disc').value;

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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("count");
        document.getElementById('count').value = XMLAddress1[0].childNodes[0].nodeValue;

        calcc();

    }
}



function getdata() {

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (document.getElementById('refno').value != "") {

        var url = "opd_medical_data.php";
        url = url + "?Command=" + "getdata";
        url = url + "&test_grp=" + document.getElementById('test_grp').value;

        xmlHttp.onreadystatechange = showarmyresult_getdata;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }
}

function showarmyresult_getdata()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails1').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;



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
        var url = "opd_medical_data.php";
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
        url = url + "&deltime=" + document.getElementById('deltime').value;
        url = url + "&coltime=" + document.getElementById('coltime').value;
        url = url + "&count=" + document.getElementById('count').value;
        url = url + "&amount=" + document.getElementById('amo').value;
        url = url + "&totamount=" + document.getElementById('netamo').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        url = url + "&time=" + document.getElementById('time').value;
        url = url + "&colby=" + document.getElementById('colby').value;
        url = url + "&fileno=" + document.getElementById('fileno').value;
        url = url + "&disc=" + document.getElementById('disc').value;
        var i = 1;

        while (i <= (parseInt(document.getElementById('count').value))) {

            test_code = "test_code" + i;

            test_name = "test_name" + i;
            amount = "amount" + i;
            discount = "discount" + i;

            url = url + "&" + test_code + "=" + document.getElementById(test_code).value;
            url = url + "&" + test_name + "=" + escape(document.getElementById(test_name).value);
            url = url + "&" + amount + "=" + document.getElementById(amount).value;
            url = url + "&" + discount + "=" + document.getElementById(discount).value;
            i = i + 1;
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
        //if (xmlHttp.responseText=="exist"){
        //	alert("Already Exists");	
        //}

    }
}

function calcc() {




    var j = 1;
    var netamo = 0;
    var tot = 0;
    var tot1 = 0;
    var i = parseInt(document.getElementById('count').value);
    while (i >= j) {
        amount = "amount" + j;
        discount = "discount" + j;
        net = "net" + j;
        amoo = document.getElementById(amount).value * (document.getElementById(discount).value / 100);
        netamo = (parseFloat(document.getElementById(amount).value - amoo));
        tot1 = tot1 + parseFloat(document.getElementById(amount).value);
        tot = tot + netamo;
        document.getElementById(net).value = netamo;

        j = j + 1;
    }

    document.getElementById("netamo").value = tot;
    document.getElementById("amo").value = tot1;

    updt_tmp();

}

function updt_tmp()
{
    var url = "opd_medical_data.php";
    url = url + "?Command=" + "updt_tmp";
    url = url + "&refno=" + document.getElementById('refno').value;
    url = url + "&count=" + document.getElementById('count').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;

    var j = 1;
    var i = parseInt(document.getElementById('count').value);
    while (i >= j) {
        amount = "amount" + j;
        discount = "discount" + j;
        net = "net" + j;
        amoo = document.getElementById(discount).value;
        test_name = "test_name" + j;
        discount = "discount" + j;

        url = url + "&" + test_name + "=" + document.getElementById(test_name).value;
        url = url + "&" + discount + "=" + document.getElementById(discount).value;

        j = j + 1;
    }
    xmlHttp.onreadystatechange = "";
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function del_item(no)
{
    var url = "opd_medical_data.php";
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

    var url = "opd_medical_data.php";
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


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("count");
        opener.document.form1.count.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("amount");
        opener.document.form1.amo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("totamount");
        opener.document.form1.netamo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        opener.document.form1.tmpno.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("colby");
        opener.document.form1.colby.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("deltime");
        opener.document.form1.deltime.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("coltime");
        opener.document.form1.coltime.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("fileno");
        opener.document.form1.fileno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("medit");
        if (XMLAddress1[0].childNodes[0].nodeValue == 0) {
            opener.document.form1.cash.disabled = true;
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

        var url = "opd_medical_data.php";
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
    document.getElementById('deltime').value = "";
    document.getElementById('coltime').value = "";
    document.getElementById('colby').value = "";
    document.getElementById('disc').value = "";
    document.getElementById('cash').disabled = "";
    var objbrand = document.getElementById("doctor");
    objbrand.options[0].selected = true;

    var objbrand = document.getElementById("ini");
    objbrand.options[0].selected = true;

    document.getElementById('itemdetails').innerHTML = "";


    var url = "opd_medical_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

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

function assign_invno() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("refno");
        document.getElementById('refno').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdate");
        document.getElementById('entdate').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("serino");
        document.getElementById('serino').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txttime");
        document.getElementById('time').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;


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


    var url = "search_opd_data.php";
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
        var str = "OPD List On ";
        res = str.concat(document.getElementById('sdate').value);
        document.getElementById('textt').innerHTML = res;


    }
}




