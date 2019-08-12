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

function got_focus(key)
{
    document.getElementById(key).style.backgroundColor = "#000066";

}

function lost_focus(key)
{
    document.getElementById(key).style.backgroundColor = "#000000";

}

function new_inv()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    document.getElementById('invno').value = "";
    document.getElementById('firstname_hidden').value = "";
    document.getElementById('firstname').value = "";
    document.getElementById('cus_address').value = "";
    document.getElementById('salesrep').value = "";
    var objdepartment = document.getElementById("department");
    objdepartment.options[0].selected = true;


    document.getElementById('discount_org1').value = "";
    document.getElementById('itemdetails').innerHTML = "";
    document.getElementById('subtot').value = "";
    document.getElementById('totdiscount').value = "";
    document.getElementById('invtot').value = "";

    document.getElementById('itemd_hidden').value = "";
    document.getElementById('itemd').value = "";
    document.getElementById('rate').value = "";
    document.getElementById('qty').value = "";
    document.getElementById('discountper').value = "";
    document.getElementById('subtotal').value = "";
    document.getElementById('stklevel').value = "";
    var url = "purch_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_invno() {



    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("invno");
        document.getElementById('invno').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sdate");
        document.getElementById('invdate').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmpno");
        document.getElementById('tmpno').value = XMLAddress1[0].childNodes[0].nodeValue;


        document.getElementById('paymethod_1').checked = true;

    }


}


function itno_undeliver(itno, stname)
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "search_item_data.php";
    url = url + "?Command=" + "pass_itno";
    url = url + "&itno=" + itno;
    url = url + "&stname=" + stname;
    url = url + "&department=" + opener.document.form1.department.value;

    //alert(url);
    xmlHttp.onreadystatechange = itno_undeliver_result;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);



}

function itno_undeliver_result()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_code");
        opener.document.form1.itemd_hidden.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_description");
        opener.document.form1.itemd.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_selpri");
        opener.document.form1.rate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("qtyinhand");
        opener.document.form1.stklevel.value = XMLAddress1[0].childNodes[0].nodeValue;


        self.close();
        opener.document.form1.qty.focus();



    }
}

function add_tmp()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if ((document.getElementById('invno').value != "") && (document.getElementById('firstname_hidden').value != "")) {
        var url = "purch_data.php";
        url = url + "?Command=" + "add_tmp";
        url = url + "&invno=" + document.getElementById('invno').value;
        url = url + "&itemcode=" + document.getElementById('itemd_hidden').value;
        url = url + "&item=" + document.getElementById('itemd').value;
        url = url + "&rate=" + document.getElementById('rate').value;
        url = url + "&qty=" + document.getElementById('qty').value;
        url = url + "&discount=" + document.getElementById('discount').value;
        url = url + "&discountper=" + document.getElementById('discountper').value;
        url = url + "&subtotal=" + document.getElementById('subtotal').value;
        url = url + "&department=" + document.getElementById('department').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        xmlHttp.onreadystatechange = showarmyresultdel;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    } else if (document.getElementById('firstname_hidden').value == "") {
        alert("Please Select Customer");
    }

}


function showarmyresultdel()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("item_count");
        document.getElementById('item_count').value = XMLAddress1[0].childNodes[0].nodeValue;





        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('subtot').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tot_dis");
        document.getElementById('totdiscount').value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("invtot");
        document.getElementById('invtot').value = XMLAddress1[0].childNodes[0].nodeValue;



        document.getElementById('itemd_hidden').value = "";
        document.getElementById('itemd').value = "";
        document.getElementById('rate').value = "";
        document.getElementById('qty').value = "";
        document.getElementById('discount').value = "";
        document.getElementById('discountper').value = "";
        document.getElementById('subtotal').value = "";

        document.getElementById('itemd_hidden').focus();
    }
}



function custno(custno, stname)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "search_custom_data.php";
    url = url + "?Command=" + "pass_quot";
    url = url + "&custno=" + custno;

    xmlHttp.onreadystatechange = passcusresult_quot;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}


function passcusresult_quot()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("id");
        opener.document.form1.firstname_hidden.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername");
        opener.document.form1.firstname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_address");
        opener.document.form1.cus_address.value = XMLAddress1[0].childNodes[0].nodeValue;



        self.close();
    }
}

function calc1()
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    //alert (document.getElementById('stklevel').value);
    //alert(document.getElementById('qty').value);
     
        var str = document.getElementById('rate').value;
        var n = str.replace(/,/gi, "");

        var subtotal = parseFloat(n) * parseFloat(document.getElementById('qty').value);
        var dis = 0;
        var dis1 = 0;
        var dis2 = 0;
        var dis3 = 0;
        var disper = 0;
        var dis1f = 0;
        var dis2f = 0;
        var dis3f = 0;


        if ((document.getElementById('discount_org1').value != '') && (document.getElementById('discount_org1').value != "0") && (document.getElementById('discount_org1').value != "0.00")) {
            dis1 = subtotal * document.getElementById('discount_org1').value / 100;
            disper = document.getElementById('discount_org1').value;
            disper1 = document.getElementById('discount_org1').value;

        }
        dis1f = dis1.toFixed(2);
        subtotal = subtotal - dis1f;






        dis = parseFloat(dis1f) + parseFloat(dis2f) + parseFloat(dis3f);

        document.getElementById('discount').value = dis;
        document.getElementById('discountper').value = disper;
        document.getElementById('subtotal').value = subtotal.toFixed(2);

    


}


function del_item(code)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "purch_data.php";
    url = url + "?Command=" + "del_item";
    url = url + "&invno=" + document.getElementById('invno').value;
    url = url + "&code=" + code;
    url = url + "&department=" + document.getElementById('department').value;
    url = url + "&discountper=" + document.getElementById('discountper').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;


    xmlHttp.onreadystatechange = itemresultdel;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);


}


function itemresultdel()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("subtot");
        document.getElementById('subtot').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tot_dis");
        document.getElementById('totdiscount').value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("invtot");
        document.getElementById('invtot').value = XMLAddress1[0].childNodes[0].nodeValue;
    }
}

function disp_qty(it_code)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "purch_data.php";
    url = url + "?Command=" + "disp_qty";
    url = url + "&it_code=" + it_code;
    url = url + "&department=" + document.getElementById('department').value;
    url = url + "&tmpno=" + document.getElementById('tmpno').value;

    xmlHttp.onreadystatechange = show_disp_qty;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function show_disp_qty()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        document.getElementById('stklevel').value = xmlHttp.responseText;
    }
}


function calc1_table(i)
{
    //////////////////////////////////////////////////////////////////////////////
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    id = "id" + i;
    code = "code" + i;
    itemd = "itemd" + i;
    rate = "rate" + i;
    actual_selling = "actual_selling" + i;
    qty = "qty" + i;
    discount = "discount" + i;
    total = "total" + i;
    discountper = "discountper" + i;
    subtotal_name = "subtotal" + i;



    var str = document.getElementById(rate).value;
    var n = str.replace(/,/gi, "");
    var SELLING = 0;

    var actual_rate = n;

    SELLING = n;

    //alert(SELLING);
    var subtotal = parseFloat(SELLING) * parseFloat(document.getElementById(qty).value);


    var dis = 0;
    var dis1 = 0;

    var disper = 0;
    var dis1f = 0;
    var dis2f = 0;
    var dis3f = 0;


    if ((document.getElementById('discount_org1').value != '') && (document.getElementById('discount_org1').value != "0") && (document.getElementById('discount_org1').value != "0.00")) {
        dis1 = subtotal * document.getElementById('discount_org1').value / 100;
        disper = document.getElementById('discount_org1').value;
    }
    dis1f = dis1.toFixed(2);
    subtotal = subtotal - dis1f;



    dis = parseFloat(dis1f) + parseFloat(dis2f) + parseFloat(dis3f);

    document.getElementById(discount).value = dis;
    document.getElementById(discountper).innerHTML = disper;

    document.getElementById(subtotal_name).innerHTML = subtotal.toFixed(2);





    if ((document.getElementById('invno').value != "") && (document.getElementById('firstname_hidden').value != "")) {

        var url = "purch_data.php";
        url = url + "?Command=" + "add_tmp_edit_rate";
        url = url + "&invno=" + document.getElementById('invno').value;
        url = url + "&id=" + document.getElementById(id).innerHTML;
        url = url + "&itemcode=" + document.getElementById(code).innerHTML;
        url = url + "&item=" + document.getElementById(itemd).innerHTML;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        url = url + "&rate=" + SELLING;
        url = url + "&qty=" + document.getElementById(qty).value;
        url = url + "&discount=" + document.getElementById(discount).value;
        url = url + "&discountper=" + document.getElementById(discountper).innerHTML;
        url = url + "&subtotal=" + document.getElementById(subtotal_name).innerHTML;
        url = url + "&department=" + document.getElementById('department').value;


        xmlHttp.onreadystatechange = showarmyresultdel;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    } else if (document.getElementById('firstname_hidden').value == "") {
        alert("Please Select Customer");
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

    if (parseFloat(document.getElementById('item_count').value) > 0) {
        var invtot = document.getElementById('invtot').value;
        i = 0;
        while (i < 4) {
            invtot = invtot.replace(",", "");
            i = i + 1;
        }

        var paymethod;

        var url = "purch_data.php";
        url = url + "?Command=" + "save_item";
        if (document.getElementById('paymethod_0').checked == true) {
            paymethod = "CR";
        } else if (document.getElementById('paymethod_1').checked == true) {
            paymethod = "CA";
        }
        url = url + "&paymethod=" + paymethod;

        url = url + "&invno=" + document.getElementById('invno').value;
        url = url + "&invdate=" + document.getElementById('invdate').value;
        url = url + "&customercode=" + document.getElementById('firstname_hidden').value;
        myString = document.getElementById('firstname').value;
        myString = myString.replace(/&/g, "~");
        url = url + "&customername=" + myString;
        myString = document.getElementById('cus_address').value;
        myString = myString.replace(/&/g, "~");
        url = url + "&cus_address=" + myString;
        url = url + "&salesrep=" + document.getElementById('salesrep').value;
        url = url + "&department=" + document.getElementById('department').value;
        url = url + "&discount_org1=" + document.getElementById('discount_org1').value;
        url = url + "&tmpno=" + document.getElementById('tmpno').value;
        url = url + "&subtot=" + document.getElementById('subtot').value;
        url = url + "&totdiscount=" + document.getElementById('totdiscount').value;
        url = url + "&invtot=" + document.getElementById('invtot').value;

        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else {
        alert("Please insert items");
    }
}


function salessaveresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert(xmlHttp.responseText);

        if (xmlHttp.responseText == "no") {
            alert("Please Login Again !!!");
        } else {



            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Saved");
            var res = XMLAddress1[0].childNodes[0].nodeValue;
            //alert(res);
            if (res != "no") {
                alert(res);
            }

            if (res == "Saved") {
                XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("invno");
                document.getElementById('invno').value = XMLAddress1[0].childNodes[0].nodeValue;
            } else {
                if (res == "no") {
                    alert("Can't Save !!!");
                } else {
                    if (res == "insuficent") {
                        alert("Insufficient Stock");
                    } else {
                        alert(res);
                        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("msg_crelimi");
                        if (XMLAddress1[0].childNodes[0].nodeValue != 'no') {
                            alert(XMLAddress1[0].childNodes[0].nodeValue);
                        }

                        location.reload(true);
                    }

                }


            }
        }
    }
}

function invno(invno, stname)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if (stname == "grn") {
        var url = "search_inv_data.php";
        url = url + "?Command=" + "pass_grn";
        url = url + "&invno=" + invno;

        //alert(url);
        xmlHttp.onreadystatechange = passinvresult_grn;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else if (stname == "search_grn") {
        var url = "search_inv_data.php";
        url = url + "?Command=" + "pass_search_grn";
        url = url + "&invno=" + invno;

        //alert(url);
        xmlHttp.onreadystatechange = passinvresult_search_grn;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else if (stname == "crn") {
        var url = "search_inv_data.php";
        url = url + "?Command=" + "pass_crn";
        url = url + "&invno=" + invno;

        //alert(url);
        xmlHttp.onreadystatechange = passinvresult_crn;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    } else {
        var url = "search_a_data.php";
        url = url + "?Command=" + "pass_invno";
        url = url + "&invno=" + invno;
        url = url + "&custno=" + opener.document.form1.firstname_hidden.value;
        url = url + "&department=" + opener.document.form1.department.value;


        xmlHttp.onreadystatechange = passinvresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    }
    //alert(url);




}

function passinvresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert(xmlHttp.responseText);

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_invoiceno");
//		document.getElementById('invno1').value = XMLAddress1[0].childNodes[0].nodeValue;
        //alert(XMLAddress1[0].childNodes[0].nodeValue);
        opener.document.form1.invno.value = XMLAddress1[0].childNodes[0].nodeValue;
        //opener.document.form1.invno.value = "111111111";

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("SDATE");
        opener.document.form1.invdate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_crecash");

        if (XMLAddress1[0].childNodes[0].nodeValue == 'CR')
        {
            opener.document.form1.paymethod_0.checked = true;

        } else if (XMLAddress1[0].childNodes[0].nodeValue == 'CA')
        {
            opener.document.form1.paymethod_1.checked = true;

        }

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customecode");
        opener.document.form1.firstname_hidden.value = XMLAddress1[0].childNodes[0].nodeValue;
        var txt_cuscode = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_customername");
        opener.document.form1.firstname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_address");
        opener.document.form1.cus_address.value = XMLAddress1[0].childNodes[0].nodeValue;



        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_salesrep");
        var objSalesrep = opener.document.getElementById("salesrep");

        var salesrep = XMLAddress1[0].childNodes[0].nodeValue;
        var i = 0;
        while (i < objSalesrep.length)
        {
            if (XMLAddress1[0].childNodes[0].nodeValue == objSalesrep.options[i].value)
            {
                objSalesrep.options[i].selected = true;

            }
            i = i + 1;
        }





        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_department");
        var objDepartment = opener.document.getElementById("department");

        var i = 0;
        while (i < objDepartment.length)
        {
            if (XMLAddress1[0].childNodes[0].nodeValue == objDepartment.options[i].value)
            {
                objDepartment.options[i].selected = true;

            }
            i = i + 1;
        }







        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cur_subtotal");
        opener.document.form1.subtot.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cur_discount");
        opener.document.form1.totdiscount.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cur_invoiceval");
        opener.document.form1.invtot.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("sales_table");
        window.opener.document.getElementById('itemdetails').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;






        self.close();

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


    var url = "search_inv_data.php";
    url = url + "?Command=" + "search_inv";

    if (document.getElementById('invno').value != "") {
        url = url + "&mstatus=invno";
    } else if (document.getElementById('customername').value != "") {
        url = url + "&mstatus=customername";
    }

    url = url + "&invno=" + document.getElementById('invno').value;
    url = url + "&customername=" + document.getElementById('customername').value;
    url = url + "&stname=" + stname;
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
        //alert(xmlHttp.responseText);
        //setTimeout("location.reload(true);",500);
        //if (xmlHttp.responseText=="exist"){
        //	alert("Already Exists");	
        //}

        //XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("inv_table");	
        //document.getElementById('filt_table').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;
    }
}


function close_form() {
    self.close();
}


function itno_ind()
{

    if (document.getElementById('itemd_hidden').value != "") {
        xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null)
        {
            alert("Browser does not support HTTP Request");
            return;
        }


        var url = "search_item_data.php";
        url = url + "?Command=" + "pass_itno";
        url = url + "&itno=" + document.getElementById('itemd_hidden').value;
        url = url + "&department=" + document.getElementById('department').value;
        //alert(url);
        var vatmethod = "";

        vatmethod = "non";


        url = url + "&vatmethod=" + vatmethod;

        url = url + "&discount_org1=" + document.getElementById('discount_org1').value;
 
        xmlHttp.onreadystatechange = passitresult_ind;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

    }

}

function passitresult_ind()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);
        var str = xmlHttp.responseText;
        if (str.length > 70) {
            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_code");
            document.getElementById('itemd_hidden').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_description");
            document.getElementById('itemd').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("str_selpri");
            document.getElementById('rate').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("qtyinhand");
            document.getElementById('stklevel').value = XMLAddress1[0].childNodes[0].nodeValue;

            XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("actual_selling");
            document.getElementById('actual_selling').value = XMLAddress1[0].childNodes[0].nodeValue;
            //	XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dis");	
            //	opener.document.form1.discount.value = XMLAddress1[0].childNodes[0].nodeValue;
            document.getElementById('qty').focus();
        } else {
            //self.close();
            alert("Invalid Item No");
            document.getElementById('searchitem').focus();
        }


    }
}