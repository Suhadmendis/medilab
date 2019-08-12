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

    document.getElementById('txtDREFNO').value = "";
    document.getElementById('txtSERINO').value = "";
    document.getElementById('txtCMB_NO').value = "";
    document.getElementById('txtDATE').value = "";
    document.getElementById('txtCODE').value = "";
    document.getElementById('txtNAME').value = "";
    document.getElementById('txtLASTNAME').value = "";
    document.getElementById('lbladd').value = "";
    document.getElementById('txtSEX').value = "";
    document.getElementById('txtAGE').value = "";
    document.getElementById('txtSTATUS').value = "";
    document.getElementById('txtNATIONL').value = "";
    document.getElementById('txtHI_FT').value = "";
    document.getElementById('txtHI_in').value = "";
    document.getElementById('txtWE').value = "";
    document.getElementById('txtPAS_NO').value = "";
    document.getElementById('txtPLA_OF_IS').value = "COLOMBO";
    document.getElementById('txtPOS_APP').value = "";
    document.getElementById('txtREC_AG').value = "";
    document.getElementById('txtP_N_D_RE').value = "";
    document.getElementById('txtALLERGY_RE').value = "";
    document.getElementById('txtOTHERS_RE').value = "";
    document.getElementById('txtEYE_VISON').value = "";
    document.getElementById('txtEYE_NE_R').value = "";
    document.getElementById('txtEYE_NE_L').value = "";
    document.getElementById('txtEYE_NE_RE').value = "";
    document.getElementById('txtEYE_FA_R').value = "";
    document.getElementById('txtEYE_FA_L').value = "";
    document.getElementById('txtEYE_FA_RE').value = "";
    document.getElementById('txtEYE_CO').value = "";
    document.getElementById('txtEYE_CO_R').value = "";
    document.getElementById('txtEYE_CO_L').value = "";
    document.getElementById('txtYEAR_R').value = "";
    document.getElementById('txtYEAR_L').value = "";
    document.getElementById('txtYEAR_RRE').value = "";
    document.getElementById('txtYEAR_LRE').value = "";
    document.getElementById('txtCH_XRA_NO').value = "";
    document.getElementById('txtCH_XRA_RE').value = "";
    document.getElementById('txtLORD_NO').value = "";
    document.getElementById('txtLORD_RE').value = "";
    document.getElementById('txtBL_PRES').value = "";
    document.getElementById('txtBL_PR_RE').value = "";
    document.getElementById('txtHEAR_RE').value = "";
    document.getElementById('txtLUN_RE').value = "";
    document.getElementById('txtABD_RE').value = "";
    document.getElementById('txtHER_RE').value = "";
    document.getElementById('txtVARI_RE').value = "";
    document.getElementById('txtEXTR_RE').value = "";
    document.getElementById('txtSKIN_RE').value = "";
    document.getElementById('txtCLINICAL').value = "";
    document.getElementById('txtLAB_RE').value = "";
    document.getElementById('txtVDRL_RE').value = "";
    document.getElementById('txtTPHA_RE').value = "";
    document.getElementById('txtQUA_EL_HIV').value = "";
    document.getElementById('txtSUG_RE').value = "";
    document.getElementById('txtALB_RE').value = "";
    document.getElementById('txtBIL_RE').value = "";
    document.getElementById('txtOTH_RE').value = "";
    document.getElementById('txtHEL_RE').value = "";
    document.getElementById('txtS_BIL_RE').value = "";
    document.getElementById('txtSAL_RE').value = "";
    document.getElementById('txtV_CH_RE').value = "";
    document.getElementById('txtOTHER0').value = "";
    document.getElementById('txtAOC').value = "";
    document.getElementById('txtHEM').value = "";
    document.getElementById('txtHEM_RE').value = "";
    document.getElementById('txtMAL').value = "";
    document.getElementById('txtMAL_RE').value = "";
    document.getElementById('txtbg').value = "";
    document.getElementById('txtSERO_RE').value = "";
    document.getElementById('txtHIV_RE').value = "";
    document.getElementById('txtF_B_S').value = "";
    document.getElementById('txtF_B_S_RE').value = "";
    document.getElementById('txtHBSA').value = "";
    document.getElementById('txtHBSA_RE').value = "";
    document.getElementById('txtANTI').value = "";
    document.getElementById('txtANTI_RE').value = "";
    document.getElementById('txtL_F_T').value = "";
    document.getElementById('txtL_F_T_RE').value = "";
    document.getElementById('txtCREA').value = "";
    document.getElementById('txtCREA_RE').value = "";
    document.getElementById('txtUREA').value = "";
    document.getElementById('txtUREA_RE').value = "";
    document.getElementById('txtPREG_TEST').value = "";
    document.getElementById('txtPSYCHOLGI').value = "";
    document.getElementById('txtE_C_G_RE1').value = "";
    document.getElementById('txtOTH_1').value = "";
    document.getElementById('cmbresult').value = "N/A";
    document.getElementById('CMBuNFITrE').value = "";
    document.getElementById('txtdarem1').value = "";
    document.getElementById('txtdarem2').value = "";
    document.getElementById('txtdarem3').value = "";
    document.getElementById('txtrem1np').value = "";
    document.getElementById('txtrem2np').value = "";
    document.getElementById('txtlarem1').value = "";
    document.getElementById('txtlarnp1').value = "";
    document.getElementById('txtlabrem').value = "";
    document.getElementById('txtxarem1').value = "";
    document.getElementById('txtaremnp').value = "";
    document.getElementById('CMBUAI').value = "";
    document.getElementById('cmbxres').value = "N/A";
    document.getElementById('cmbxrea').value = "";
    document.getElementById('CMBlbrEC').value = "N/A";
    document.getElementById('CMBlbRES').value = "";
    document.getElementById('cmbfres').value = "N/A";
    document.getElementById('cmbpres').value = "N/A";
    document.getElementById('txtini').value = "";
    document.getElementById('txtmedcode').value = "";
    document.getElementById('txtGCC_NO').value = "";


    /*  var url = "medical_entry_data.php";
     url = url + "?Command=" + "new_inv";
     
     xmlHttp.onreadystatechange = assign_invno;
     xmlHttp.open("GET", url, true);
     xmlHttp.send(null);*/
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














function assn_med_entry(PA_NO)
{



    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var paymethod;

    var url = "inq_medical_data.php";
    url = url + "?Command=" + "assn_med_entry";
    url = url + "&txt_pano=" + PA_NO;

    xmlHttp.onreadystatechange = assn_med_entry_result;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assn_med_entry_result()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);

        // XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txttotam");
        // opener.document.form1.txttotam.value = XMLAddress1[0].childNodes[0].nodeValue;

        //XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtpaid");
        //opener.document.form1.txtpaid.value = XMLAddress1[0].childNodes[0].nodeValue;

        //XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtbal");
        //opener.document.form1.txtbal.value = XMLAddress1[0].childNodes[0].nodeValue;

        //XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblppno");
        // opener.document.form1.lblppno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_pano");
        opener.document.form1.txt_pano.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lbldate");
        opener.document.form1.lbldate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblname");
        opener.document.form1.lblname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblcus_remark");
        opener.document.form1.lblcus_remark.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblserino");
        opener.document.form1.lblserino.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblGAMCANo");
        opener.document.form1.lblGAMCANo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblage");
        opener.document.form1.lblage.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblagen");
        opener.document.form1.lblagen.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblxrayno");
        opener.document.form1.lblxrayno.value = XMLAddress1[0].childNodes[0].nodeValue;

        //XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("LblAmount");
        //opener.document.form1.LblAmount.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmdbreligon");
        opener.document.form1.cmdbreligon.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPOS_APP");
        opener.document.form1.txtPOS_APP.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txttel");
        opener.document.form1.txttel.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("pic");
        window.opener.document.getElementById("med_photo").innerHTML = "<img width='160' height='120' src='" + XMLAddress1[0].childNodes[0].nodeValue + "' />";


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text1");
        opener.document.form1.Text1.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text2");
        opener.document.form1.Text2.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text3");
        opener.document.form1.Text3.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text4");
        opener.document.form1.Text4.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text5");
        opener.document.form1.Text5.value = XMLAddress1[0].childNodes[0].nodeValue;

        /*XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text6");
         opener.document.form1.Text6.value = XMLAddress1[0].childNodes[0].nodeValue;
         
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text7");
         opener.document.form1.Text7.value = XMLAddress1[0].childNodes[0].nodeValue;
         
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text8");
         opener.document.form1.Text8.value = XMLAddress1[0].childNodes[0].nodeValue;
         
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text9");
         opener.document.form1.Text9.value = XMLAddress1[0].childNodes[0].nodeValue;
         
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Text10");
         opener.document.form1.Text10.value = XMLAddress1[0].childNodes[0].nodeValue;
         
         XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblreg");
         opener.document.form1.lblreg.value = XMLAddress1[0].childNodes[0].nodeValue;*/


        self.close();
    }
}


function treat_tmp_save(TCODE)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "medical_reg_data.php";
    url = url + "?Command=" + "treat_tmp_save";

    url = url + "&TCODE=" + TCODE;

    if (document.getElementById(TCODE).checked == true) {
        chk_val = 1;
    } else {
        chk_val = 0;
    }
    url = url + "&chk_val=" + chk_val;

    xmlHttp.onreadystatechange = result_treat_tmp_save;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function result_treat_tmp_save()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert(xmlHttp.responseText);

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
        var url = "search_inv_data.php";
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
        //alert(xmlHttp.responseText);

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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("tmp_no");
        opener.document.form1.tmpno.value = XMLAddress1[0].childNodes[0].nodeValue;

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


function update_item_list(stname)
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "inq_medical_data.php";
    url = url + "?Command=" + "search_inv";

    if (document.getElementById('txtppno').value != "") {
        url = url + "&mstatus=txtppno";
    } else if (document.getElementById('txtpano').value != "") {
        url = url + "&mstatus=txtpano";
    } else if (document.getElementById('cmbno').value != "") {
        url = url + "&mstatus=cmbno";
    } else if (document.getElementById('name').value != "") {
        url = url + "&mstatus=name";
    }

    url = url + "&txtppno=" + document.getElementById('txtppno').value;
    url = url + "&txtpano=" + document.getElementById('txtpano').value;
    url = url + "&cmbno=" + document.getElementById('cmbno').value;
    url = url + "&name=" + document.getElementById('name').value;
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
        document.getElementById('filt_table').innerHTML = xmlHttp.responseText;
    }
}


function close_form() {
    self.close();
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
    url = url + "?Command=" + "search_item1";
    if (document.getElementById('itemname').value != "") {
        url = url + "&mstatus=name";
    } else if (document.getElementById('itno').value != "") {
        url = url + "&mstatus=itemno";
    } else if (document.getElementById('model').value != "") {
        url = url + "&mstatus=model";
    }

    url = url + "&item_name=" + document.getElementById('itemname').value;
    url = url + "&itemno=" + document.getElementById('itno').value;

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


function print_inv1()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "report_medical_ent.php";
    url = url + "?txtDREFNO=" + document.getElementById('txtDREFNO').value;
    window.open(url, '_blank');


    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function cancel_inv()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "inv_data.php";

    url = url + "?refno=" + document.getElementById('invno').value;
    url = url + "&Command=cancel_inv";
    url = url + "&tmpno=" + document.getElementById('tmpno').value;

    xmlHttp.onreadystatechange = showcancell;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}


function showcancell()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {


        alert(xmlHttp.responseText);
        location.reload();



    }
}