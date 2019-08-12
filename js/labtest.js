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





function add_tmp()
{

    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }



    var url = "lab_test_mast_data.php";
    url = url + "?Command=" + "add_tmp";
    url = url + "&code=" + document.getElementById('code').value;

    url = url + "&test_desc=" + document.getElementById('test_desc').value;
    url = url + "&unit=" + document.getElementById('unit').value;
    url = url + "&range_from=" + document.getElementById('range_from').value;
    url = url + "&range_to=" + document.getElementById('range_to').value;
    url = url + "&under_range=" + document.getElementById('under_range').value;
    url = url + "&exceed_range=" + document.getElementById('exceed_range').value;
    url = url + "&normal_range=" + document.getElementById('normal_range').value;
    url = url + "&female_from=" + document.getElementById('female_from').value;
    url = url + "&female_to=" + document.getElementById('female_to').value;
    url = url + "&range_seprater=" + document.getElementById('range_seprater').value;
    url = url + "&mtype=" + document.getElementById('mtype').value;
    url = url + "&underline=" + document.getElementById('underline').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;




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
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("coun");

        document.getElementById('count').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('test_desc').value = "";
        document.getElementById('unit').value = "";
        document.getElementById('range_from').value = "";
        document.getElementById('range_to').value = "";
        document.getElementById('under_range').value = "";
        document.getElementById('exceed_range').value = "";
        document.getElementById('normal_range').value = "";
        document.getElementById('female_from').value = "";
        document.getElementById('female_to').value = "";
        document.getElementById('range_seprater').value = "";
        document.getElementById('mtype').value = "";
        document.getElementById('underline').value = "";
        document.getElementById('test_desc').focus();
    }
}




function shownavyresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {



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
    //alert(inv_status);


    if (document.getElementById('code').value != "") {
        var url = "lab_test_mast_data.php";
        
        var params = "Command=" + "save_item";

        params = params + "&code=" + document.getElementById('code').value;
        params = params + "&name=" + document.getElementById('name').value;
        params = params + "&price=" + document.getElementById('price').value;
        params = params + "&count=" + document.getElementById('count').value;
        params = params + "&tmpno=" + document.getElementById('tmpno').value;
        params = params + "&test_grp=" + document.getElementById('test_grp').value;

        var i = 1;
        while (i < document.getElementById('count').value) {
            test_desc = "test_desc" + i;
            unit = "unit" + i;
            range_from = "range_from" + i;
            range_to = "range_to" + i;
            under_range = "under_range" + i;
            exceed_range = "exceed_range" + i;
            normal_range = "normal_range" + i;
            female_from = "female_from" + i;
            female_to = "female_to" + i;
            range_seprater = "range_seprater" + i;
            mtype = "mtype" + i;
            underline = "underline" + i;


            params = params + "&" + test_desc + "=" + document.getElementById(test_desc).value;
            params = params + "&" + unit + "=" + document.getElementById(unit).value;
            params = params + "&" + range_from + "=" + document.getElementById(range_from).value;
            params = params + "&" + range_to + "=" + document.getElementById(range_to).value;
            params = params + "&" + under_range + "=" + document.getElementById(under_range).value;
            params = params + "&" + exceed_range + "=" + document.getElementById(exceed_range).value;
            params = params + "&" + normal_range + "=" + document.getElementById(normal_range).value;
            params = params + "&" + female_from + "=" + document.getElementById(female_from).value;
            params = params + "&" + female_to + "=" + document.getElementById(female_to).value;
            params = params + "&" + range_seprater + "=" + document.getElementById(range_seprater).value;
            params = params + "&" + mtype + "=" + document.getElementById(mtype).value;
            params = params + "&" + underline + "=" + document.getElementById(underline).value;

            i = i + 1;
        }
        xmlHttp.open("POST", url, true);
        //alert(url);
        
        xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttp.setRequestHeader("Content-length", params.length);
        xmlHttp.setRequestHeader("Connection", "close");       
        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.send(params);
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

function arnno_gin(arno)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "lab_test_mast_data.php";
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
        alert(xmlHttp.responseText);


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("code");
        opener.document.form1.code.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("name");
        opener.document.form1.name.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("price");
        opener.document.form1.price.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("coun");
        opener.document.form1.count.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        opener.document.form1.tmpno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("test_grp");
        opener.document.form1.test_grp.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        window.opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;
        // document.getElementById('itemdetails').innerHTML =XMLAddress1[0].childNodes[0].nodeValue;



        self.close();
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


    document.getElementById('code').value = "";
    document.getElementById('name').value = "";
    document.getElementById('price').value = "";
    document.getElementById('test_desc').value = "";
    document.getElementById('unit').value = "";
    document.getElementById('range_from').value = "";
    document.getElementById('range_to').value = "";
    document.getElementById('under_range').value = "";
    document.getElementById('under_range').value = "";
    document.getElementById('itemdetails').innerHTML = "";


    var url = "lab_test_mast_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function assign_invno() {
    //alert(xmlHttp.responseText);




    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("labtest");
        document.getElementById('code').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('name').focus();



    }


}

function update_list(stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_labtest_data.php";
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
        var url = "lab_test_mast_data.php";
        url = url + "?Command=" + "cancel_inv";
        url = url + "&arnno=" + document.getElementById('code').value;
        xmlHttp.onreadystatechange = assign_canell;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    }
}

function assign_canell() {
    //alert(xmlHttp.responseText);




    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        new_inv();


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

    var url = "result_list.php";
     
    window.open(url, '_blank');


    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);



}