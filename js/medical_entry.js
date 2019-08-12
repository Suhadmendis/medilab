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

     document.getElementById('txtDREFNO').value="";
	 document.getElementById('txtSERINO').value="";
	 document.getElementById('txtCMB_NO').value="";
	 document.getElementById('txtDATE').value="";
	 document.getElementById('txtCODE').value="";
	 document.getElementById('txtPAS_NO').value="";
	 document.getElementById('txtLASTNAME').value="";
	 document.getElementById('lbladd').value="";
	 document.getElementById('txtSEX').value="";
	
	 document.getElementById('txtAGE').value="";
	 document.getElementById('txtSTATUS').value="";
	 document.getElementById('txtNATIONL').value="";
	 document.getElementById('txtHI_FT').value="";
	 
	 document.getElementById('txtHI_in').value="";
	 document.getElementById('txtWE').value="";
	  document.getElementById('txtPLA_OF_IS').value="COLOMBO";
	  
	 document.getElementById('txtPOS_APP').value="";
	 document.getElementById('txtREC_AG').value="";
	 document.getElementById('txtP_N_D_RE').value="";
	 
	 document.getElementById('txtALLERGY_RE').value="";
	 document.getElementById('txtOTHERS_RE').value="";
	 document.getElementById('txtEYE_VISON').value="1";
	 document.getElementById('txtEYE_NE_R').value="NORMAL";
	 document.getElementById('txtEYE_NE_L').value="NORMAL";
	  
	 document.getElementById('txtEYE_NE_RE').value="1";
	 document.getElementById('txtEYE_FA_R').value="NORMAL";
	 document.getElementById('txtEYE_FA_L').value="NORMAL";
	 document.getElementById('txtEYE_FA_RE').value="1";
	 document.getElementById('txtEYE_CO').value="1";
	 
	 document.getElementById('txtEYE_CO_R').value="NORMAL";
	 document.getElementById('txtEYE_CO_L').value="NORMAL";
	 document.getElementById('txtYEAR_R').value="NORMAL";
	 document.getElementById('txtYEAR_L').value="NORMAL";
	 document.getElementById('txtYEAR_RRE').value="1";
	 document.getElementById('txtYEAR_LRE').value="1";
	 document.getElementById('txtCH_XRA_NO').value="";
	 document.getElementById('txtCH_XRA_RE').value="";
	 document.getElementById('txtLORD_NO').value="";
	 document.getElementById('txtLORD_RE').value="";
	 document.getElementById('txtBL_PRES').value="";
	 document.getElementById('txtBL_PR_RE').value="1";
	 document.getElementById('txtHEAR_RE').value="1";
	 document.getElementById('txtLUN_RE').value="1";
	 document.getElementById('txtABD_RE').value="1";
	 document.getElementById('txtHER_RE').value="1";
	 document.getElementById('txtVARI_RE').value="1";
	 document.getElementById('txtEXTR_RE').value="1";
	 document.getElementById('txtSKIN_RE').value="1";
	 document.getElementById('txtCLINICAL').value="NIL";
	 document.getElementById('txtLAB_RE').value="1";
	 document.getElementById('txtVDRL_RE').value="1";
	 document.getElementById('txtTPHA_RE').value="1";
	 document.getElementById('txtQUA_EL_HIV').value="NIL";
	 
	 document.getElementById('txtSUG_RE').value="1";
	 document.getElementById('txtALB_RE').value="1";
	 document.getElementById('txtBIL_RE').value="1";
	 document.getElementById('txtOTH_RE').value="1";
	 document.getElementById('txtHEL_RE').value="1";
	 document.getElementById('txtS_BIL_RE').value="1";
	 document.getElementById('txtSAL_RE').value="1";
	 document.getElementById('txtV_CH_RE').value="1";
	 document.getElementById('txtOTHER0').value="-";
	 document.getElementById('txtAOC').value="";
	 document.getElementById('txtHEM').value="";
	 document.getElementById('txtHEM_RE').value="1";
	 document.getElementById('txtMAL').value="NEGATIVE";
	 document.getElementById('txtMAL_RE').value="1";
	 document.getElementById('txtbg').value="";
	 document.getElementById('txtSERO_RE').value="";
	 document.getElementById('txtHIV_RE').value="1";
	 document.getElementById('txtF_B_S').value="110 mg/dl";
	 document.getElementById('txtF_B_S_RE').value="1";
	 document.getElementById('txtHBSA').value="NEGATIVE";
	 document.getElementById('txtHBSA_RE').value="1";
	 document.getElementById('txtANTI').value="NEGATIVE";
	 document.getElementById('txtANTI_RE').value="1";
	 document.getElementById('txtL_F_T').value="NORMAL";
	 document.getElementById('txtL_F_T_RE').value="1";
	 document.getElementById('txtCREA').value="1.1 mg/dl";
	 document.getElementById('txtCREA_RE').value="1";
	 document.getElementById('txtUREA').value="30 mg/dl";
	 document.getElementById('txtUREA_RE').value="1";
	 document.getElementById('txtPREG_TEST').value="NEGATIVE";
	 document.getElementById('txtPSYCHOLGI').value="";
	 document.getElementById('txtE_C_G_RE').value="";
	 document.getElementById('txtOTH_1').value="NIL";
	 document.getElementById('cmbresult').value="N/A";
	 document.getElementById('CMBuNFITrE').value="NONE";
	 document.getElementById('txtdarem1').value="";
	 document.getElementById('txtdarem2').value="";
	 document.getElementById('txtdarem3').value="";
	 document.getElementById('txtrem1np').value="";
	document.getElementById('txtrem2np').value="";
	document.getElementById('txtlarem1').value="";
	document.getElementById('txtlarnp1').value="";
	document.getElementById('txtlabrem').value="";
	document.getElementById('txtxarem1').value="";
	document.getElementById('txtaremnp').value="";
	document.getElementById('CMBUAI').value="";
	document.getElementById('cmbxres').value="N/A";
	document.getElementById('cmbxrea').value="";
	document.getElementById('CMBlbrEC').value="N/A";
	document.getElementById('CMBlbRES').value="";
	document.getElementById('cmbfres').value="N/A";
	document.getElementById('cmbpres').value="N/A";
	document.getElementById('txtini').value="";
	document.getElementById('txtmedcode').value="";
	document.getElementById('txtGCC_NO').value="";
	
	document.getElementById('txtHEAR').value="NORMAL";
	document.getElementById('txtLUN').value="CLEAR";
	document.getElementById('txtABD').value="SOFT";
	document.getElementById('txtCLINICAL_RE').value="1";
	document.getElementById('txtQUA_EL_HIV_RE').value="1";
	document.getElementById('cmbres').value="";
	document.getElementById('txtltime').value="";
	document.getElementById('cmbresx').value="";
	document.getElementById('txtxtime').value="";
	document.getElementById('txtCH_XRA_RE').value="1";
	document.getElementById('txtLORD_RE').value="1";
	document.getElementById('txtLORD_RE').value="1";
	document.getElementById('txtB_OTH').value="-";
	document.getElementById('txtB_OTH_RE').value="1";
	document.getElementById('txtHEL').value="NIL";
	document.getElementById('txtS_BIL').value="-";
	document.getElementById('txtSAL').value="NIL";
	document.getElementById('txtV_CH').value="NIL";
	document.getElementById('txtOTHER0_RE').value="1";
	document.getElementById('txtAOC_RE').value="1";
	document.getElementById('txtPREG_TEST_RE').value="1";
	document.getElementById('txtPSYCHOLGI_RE').value="1";
	document.getElementById('txtE_C_G').value="";
	document.getElementById('txtOTH_1_RE').value="1";
	document.getElementById('txtSUG').value="NIL";
	document.getElementById('txtALB').value="NIL";
	document.getElementById('txtBIL').value="NIL";
	document.getElementById('txtOTH').value="NIL";
	document.getElementById('CMBUAI_RE').value="1";
	document.getElementById('txtHIV').value="NEGATIVE";
	document.getElementById('txtLAB').value="";
	document.getElementById('txtVDRL').value="NON-REACTIVE";
	document.getElementById('txtTPHA').value="NEGATIVE";
	document.getElementById('txtHER').value="NIL";
	document.getElementById('txtVARI').value="NIL";
	document.getElementById('cmbhead').value="";

		
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

function add_tmp()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    if ((document.getElementById('invno').value != "") && (document.getElementById('firstname_hidden').value != "")) {
        var url = "inv_data.php";
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
    if (parseFloat(document.getElementById('qty').value) <= parseFloat(document.getElementById('stklevel').value)) {
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

    } else {
        alert("Insufficient Quantity in this Department");
    }


}


function del_item(code)
{


    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "inv_data.php";
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

    var url = "inv_data.php";
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

        var url = "inv_data.php";
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






function save_inv()
{

    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

   
        var paymethod;

        var url = "medical_entry_data.php";
        url = url + "?Command=" + "save_medical";
       

        url = url + "&txtDREFNO=" + document.getElementById('txtDREFNO').value;
		url = url + "&txtSERINO=" + document.getElementById('txtSERINO').value;
		url = url + "&txtCMB_NO=" + document.getElementById('txtCMB_NO').value;
		url = url + "&txtDATE=" + document.getElementById('txtDATE').value;
		//url = url + "&txtDO_ACC_NO=" + document.getElementById('txtDO_ACC_NO').value;
		url = url + "&txtCODE=" + document.getElementById('txtCODE').value;
		url = url + "&txtNAME=" + document.getElementById('txtName').value;
		url = url + "&txtLASTNAME=" + document.getElementById('txtLASTNAME').value;
		url = url + "&lbladd=" + document.getElementById('lbladd').value;
		//url = url + "&txtM=" + document.getElementById('txtM').value;
		url = url + "&txtSEX=" + document.getElementById('txtSEX').value;
		url = url + "&txtAGE=" + document.getElementById('txtAGE').value;
		url = url + "&txtSTATUS=" + document.getElementById('txtSTATUS').value;
		url = url + "&txtNATIONL=" + document.getElementById('txtNATIONL').value;
		url = url + "&txtHI_FT=" + document.getElementById('txtHI_FT').value;
		url = url + "&txtHI_in=" + document.getElementById('txtHI_in').value;
		url = url + "&txtWE=" + document.getElementById('txtWE').value;
		url = url + "&txtPAS_NO=" + document.getElementById('txtPAS_NO').value;
		url = url + "&txtPLA_OF_IS=" + document.getElementById('txtPLA_OF_IS').value;
		url = url + "&txtPOS_APP=" + document.getElementById('txtPOS_APP').value;
		url = url + "&txtREC_AG=" + document.getElementById('txtREC_AG').value;
		url = url + "&txtP_N_D_RE=" + document.getElementById('txtP_N_D_RE').value;
		url = url + "&txtALLERGY_RE=" + document.getElementById('txtALLERGY_RE').value;
		url = url + "&txtOTHERS_RE=" + document.getElementById('txtOTHERS_RE').value;
		url = url + "&txtEYE_VISON=" + document.getElementById('txtEYE_VISON').value;
		url = url + "&txtEYE_NE_R=" + document.getElementById('txtEYE_NE_R').value;
		url = url + "&txtEYE_NE_L=" + document.getElementById('txtEYE_NE_L').value;
		url = url + "&txtEYE_NE_RE=" + document.getElementById('txtEYE_NE_RE').value;
		url = url + "&txtEYE_FA_R=" + document.getElementById('txtEYE_FA_R').value;
		url = url + "&txtEYE_FA_L=" + document.getElementById('txtEYE_FA_L').value;
		url = url + "&txtEYE_FA_RE=" + document.getElementById('txtEYE_FA_RE').value;
		url = url + "&txtEYE_CO=" + document.getElementById('txtEYE_CO').value;
		url = url + "&txtEYE_CO_R=" + document.getElementById('txtEYE_CO_R').value;
		url = url + "&txtEYE_CO_L=" + document.getElementById('txtEYE_CO_L').value;
		url = url + "&txtYEAR_R=" + document.getElementById('txtYEAR_R').value;
		url = url + "&txtYEAR_L=" + document.getElementById('txtYEAR_L').value;
		url = url + "&txtYEAR_RRE=" + document.getElementById('txtYEAR_RRE').value;
		url = url + "&txtYEAR_LRE=" + document.getElementById('txtYEAR_LRE').value;
		url = url + "&txtCH_XRA_NO=" + document.getElementById('txtCH_XRA_NO').value;
		url = url + "&txtCH_XRA_RE=" + document.getElementById('txtCH_XRA_RE').value;
		url = url + "&txtLORD_NO=" + document.getElementById('txtLORD_NO').value;
		url = url + "&txtLORD_RE=" + document.getElementById('txtLORD_RE').value;
		url = url + "&txtBL_PRES=" + document.getElementById('txtBL_PRES').value;
		url = url + "&txtBL_PR_RE=" + document.getElementById('txtBL_PR_RE').value;
		url = url + "&txtHEAR_RE=" + document.getElementById('txtHEAR_RE').value;
		url = url + "&txtLUN_RE=" + document.getElementById('txtLUN_RE').value;
		url = url + "&txtABD_RE=" + document.getElementById('txtABD_RE').value;
		url = url + "&txtHER_RE=" + document.getElementById('txtHER_RE').value;
		url = url + "&txtVARI_RE=" + document.getElementById('txtVARI_RE').value;
		url = url + "&txtEXTR_RE=" + document.getElementById('txtEXTR_RE').value;
		url = url + "&txtSKIN_RE=" + document.getElementById('txtSKIN_RE').value;
		url = url + "&txtCLINICAL=" + document.getElementById('txtCLINICAL').value;
		url = url + "&txtLAB_RE=" + document.getElementById('txtLAB_RE').value;
		url = url + "&txtVDRL_RE=" + document.getElementById('txtVDRL_RE').value;
		url = url + "&txtTPHA_RE=" + document.getElementById('txtTPHA_RE').value;
	//	url = url + "&txtTcns_re=" + document.getElementById('txtTcns_re').value;
		//url = url + "&txtPSYCHIATRY_re=" + document.getElementById('txtPSYCHIATRY_re').value;
		//url = url + "&txtMICROFILARIA_re=" + document.getElementById('txtMICROFILARIA_re').value;
		url = url + "&txtQUA_EL_HIV=" + document.getElementById('txtQUA_EL_HIV').value;
		url = url + "&txtSUG_RE=" + document.getElementById('txtSUG_RE').value;
		url = url + "&txtALB_RE=" + document.getElementById('txtALB_RE').value;
		url = url + "&txtBIL_RE=" + document.getElementById('txtBIL_RE').value;
		url = url + "&txtOTH_RE=" + document.getElementById('txtOTH_RE').value;
		url = url + "&txtHEL_RE=" + document.getElementById('txtHEL_RE').value;
		url = url + "&txtS_BIL_RE=" + document.getElementById('txtS_BIL_RE').value;
		url = url + "&txtSAL_RE=" + document.getElementById('txtSAL_RE').value;
		url = url + "&txtV_CH_RE=" + document.getElementById('txtV_CH_RE').value;
		url = url + "&txtOTHER0=" + document.getElementById('txtOTHER0').value;
		url = url + "&txtAOC=" + document.getElementById('txtAOC').value;
		url = url + "&txtHEM=" + document.getElementById('txtHEM').value;
		url = url + "&txtHEM_RE=" + document.getElementById('txtHEM_RE').value;
		url = url + "&txtMAL=" + document.getElementById('txtMAL').value;
		url = url + "&txtMAL_RE=" + document.getElementById('txtMAL_RE').value;
		url = url + "&txtbg=" + document.getElementById('txtbg').value;
		url = url + "&txtbg_RE=" + document.getElementById('txtbg_RE').value;
		url = url + "&txtSERO_RE=" + document.getElementById('txtSERO_RE').value;
		url = url + "&txtHIV_RE=" + document.getElementById('txtHIV_RE').value;
		url = url + "&txtF_B_S=" + document.getElementById('txtF_B_S').value;
		url = url + "&txtF_B_S_RE=" + document.getElementById('txtF_B_S_RE').value;
		url = url + "&txtHBSA=" + document.getElementById('txtHBSA').value;
		url = url + "&txtHBSA_RE=" + document.getElementById('txtHBSA_RE').value;
		url = url + "&txtANTI=" + document.getElementById('txtANTI').value;
		url = url + "&txtANTI_RE=" + document.getElementById('txtANTI_RE').value;
		
		//url = url + "&txtALP=" + document.getElementById('txtALP').value;
		//url = url + "&txtBILI=" + document.getElementById('txtBILI').value;
		//url = url + "&txtSGPT=" + document.getElementById('txtSGPT').value;
		url = url + "&txtL_F_T=" + document.getElementById('txtL_F_T').value;
		url = url + "&txtL_F_T_RE=" + document.getElementById('txtL_F_T_RE').value;
		url = url + "&txtCREA=" + document.getElementById('txtCREA').value;
		url = url + "&txtCREA_RE=" + document.getElementById('txtCREA_RE').value;
		url = url + "&txtUREA=" + document.getElementById('txtUREA').value;
		url = url + "&txtUREA_RE=" + document.getElementById('txtUREA_RE').value;
		url = url + "&txtPREG_TEST=" + document.getElementById('txtPREG_TEST').value;
		
		//url = url + "&txtpRE_NOT_RE=" + document.getElementById('txtpRE_NOT_RE').value;
		//url = url + "&txtPRE_NOT_DO=" + document.getElementById('txtPRE_NOT_DO').value;
		//url = url + "&txtPRE_RECO=" + document.getElementById('txtPRE_RECO').value;
		url = url + "&txtPSYCHOLGI=" + document.getElementById('txtPSYCHOLGI').value;
		
		url = url + "&txtE_C_G_RE=" + document.getElementById('txtE_C_G_RE').value;
		
		//url = url + "&txtE_C_G_RE2=" + document.getElementById('txtE_C_G_RE2').value;
		url = url + "&txtOTH_1=" + document.getElementById('txtOTH_1').value;
		//url = url + "&txtOTH_2=" + document.getElementById('txtOTH_2').value;
		//url = url + "&txtREMARK6=" + document.getElementById('txtREMARK6').value;
		//url = url + "&txtDIG1=" + document.getElementById('txtDIG1').value;
		//url = url + "&txtDIG2=" + document.getElementById('txtDIG2').value;
		//url = url + "&txtDIG3=" + document.getElementById('txtDIG3').value;
		url = url + "&cmbresult=" + document.getElementById('cmbresult').value;
		url = url + "&CMBuNFITrE=" + document.getElementById('CMBuNFITrE').value;
		url = url + "&txtdarem1=" + document.getElementById('txtdarem1').value;
		url = url + "&txtdarem2=" + document.getElementById('txtdarem2').value;
		url = url + "&txtdarem3=" + document.getElementById('txtdarem3').value;
		url = url + "&txtrem1np=" + document.getElementById('txtrem1np').value;
		url = url + "&txtrem2np=" + document.getElementById('txtrem2np').value;
		url = url + "&txtlarem1=" + document.getElementById('txtlarem1').value;
		url = url + "&txtlarnp1=" + document.getElementById('txtlarnp1').value;
		url = url + "&txtlabrem=" + document.getElementById('txtlabrem').value;
		url = url + "&txtxarem1=" + document.getElementById('txtxarem1').value;
		url = url + "&txtaremnp=" + document.getElementById('txtaremnp').value;
		url = url + "&CMBUAI=" + document.getElementById('CMBUAI').value;
		url = url + "&cmbxres=" + document.getElementById('cmbxres').value;
		url = url + "&cmbxrea=" + document.getElementById('cmbxrea').value;
		url = url + "&CMBlbrEC=" + document.getElementById('CMBlbrEC').value;
		url = url + "&CMBlbRES=" + document.getElementById('CMBlbRES').value;
		url = url + "&cmbfres=" + document.getElementById('cmbfres').value;
		url = url + "&cmbpres=" + document.getElementById('cmbpres').value;
		url = url + "&txtini=" + document.getElementById('txtini').value;
		url = url + "&txtmedcode=" + document.getElementById('txtmedcode').value;
		url = url + "&txtGCC_NO=" + document.getElementById('txtGCC_NO').value;
		
		url = url + "&txtHEAR=" + document.getElementById('txtHEAR').value;
		url = url + "&txtLUN=" + document.getElementById('txtLUN').value;
		url = url + "&txtABD=" + document.getElementById('txtABD').value;
		url = url + "&txtCLINICAL_RE=" + document.getElementById('txtCLINICAL_RE').value;
		url = url + "&txtQUA_EL_HIV_RE=" + document.getElementById('txtQUA_EL_HIV_RE').value;
		url = url + "&cmbres=" + document.getElementById('cmbres').value;
		url = url + "&txtltime=" + document.getElementById('txtltime').value;
		url = url + "&cmbresx=" + document.getElementById('cmbresx').value;
		url = url + "&txtxtime=" + document.getElementById('txtxtime').value;
		url = url + "&txtCH_XRA_RE=" + document.getElementById('txtCH_XRA_RE').value;
		url = url + "&txtLORD_RE=" + document.getElementById('txtLORD_RE').value;
		url = url + "&txtB_OTH=" + document.getElementById('txtB_OTH').value;
		url = url + "&txtB_OTH_RE=" + document.getElementById('txtB_OTH_RE').value;
		url = url + "&txtHEL=" + document.getElementById('txtHEL').value;
		url = url + "&txtS_BIL=" + document.getElementById('txtS_BIL').value;
		url = url + "&txtSAL=" + document.getElementById('txtSAL').value;
		url = url + "&txtV_CH=" + document.getElementById('txtV_CH').value;
		url = url + "&txtOTHER0_RE=" + document.getElementById('txtOTHER0_RE').value;
		url = url + "&txtAOC_RE=" + document.getElementById('txtAOC_RE').value;
		url = url + "&txtPREG_TEST_RE=" + document.getElementById('txtPREG_TEST_RE').value;
		url = url + "&txtPSYCHOLGI_RE=" + document.getElementById('txtPSYCHOLGI_RE').value;
		url = url + "&txtE_C_G=" + document.getElementById('txtE_C_G').value;
		url = url + "&txtOTH_1_RE=" + document.getElementById('txtOTH_1_RE').value;
		url = url + "&txtSUG=" + document.getElementById('txtSUG').value;
		url = url + "&txtALB=" + document.getElementById('txtALB').value;
		url = url + "&txtBIL=" + document.getElementById('txtBIL').value;
		url = url + "&txtOTH=" + document.getElementById('txtOTH').value;
		url = url + "&CMBUAI_RE=" + document.getElementById('CMBUAI_RE').value;
		url = url + "&txtHIV=" + document.getElementById('txtHIV').value;
		url = url + "&txtLAB=" + document.getElementById('txtLAB').value;
		url = url + "&txtVDRL=" + document.getElementById('txtVDRL').value;
		url = url + "&txtTPHA=" + document.getElementById('txtTPHA').value;
		url = url + "&txtHER=" + document.getElementById('txtHER').value;
		url = url + "&txtVARI=" + document.getElementById('txtVARI').value;
		url = url + "&cmbhead=" + document.getElementById('cmbhead').value;
		
		//alert(url);
	/*	if (document.getElementById('chks').checked==true){
			chks=1;
		} else {
			chks=0;	
		}
		
		url = url + "&chks=" + chks;*/
	
		
       // myStrcmbnating = document.getElementById('firstname').value;
      //  myString = myString.replace(/&/g, "~");
      //  url = url + "&customername=" + myString;
     
	 	xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
   
}


function salessaveresult()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        alert(xmlHttp.responseText);

	}
}

function assn_med_entry(DREFNO)
{



    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

   
    var paymethod;

    var url = "medical_entry_data.php";
    url = url + "?Command=" + "assn_med_entry";
    url = url + "&txtDREFNO=" + DREFNO;
	
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

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtDREFNO");
        opener.document.form1.txtDREFNO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPAS_NO");
        opener.document.form1.txtPAS_NO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSERINO");
        opener.document.form1.txtSERINO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCMB_NO");
        opener.document.form1.txtCMB_NO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCODE");
        opener.document.form1.txtCODE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lbladd");
        opener.document.form1.lbladd.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSEX");
        opener.document.form1.txtSEX.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtAGE");
        opener.document.form1.txtAGE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSTATUS");
        opener.document.form1.txtSTATUS.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtREC_AG");
        opener.document.form1.txtREC_AG.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtName");
        opener.document.form1.txtName.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLASTNAME");
        opener.document.form1.txtLASTNAME.value = XMLAddress1[0].childNodes[0].nodeValue;
			
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtDATE");
        opener.document.form1.txtDATE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtDO_ACC_NO");
       // opener.document.form1.txtDO_ACC_NO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtM");
      //  opener.document.form1.txtM.value = XMLAddress1[0].childNodes[0].nodeValue;
	
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHI_FT");
        opener.document.form1.txtHI_FT.value = XMLAddress1[0].childNodes[0].nodeValue;
			
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHI_in");
        opener.document.form1.txtHI_in.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtWE");
        opener.document.form1.txtWE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPLA_OF_IS");
        opener.document.form1.txtPLA_OF_IS.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPOS_APP");
        opener.document.form1.txtPOS_APP.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtP_N_D_RE");
        opener.document.form1.txtP_N_D_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtALLERGY_RE");
        opener.document.form1.txtALLERGY_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTHERS_RE");
        opener.document.form1.txtOTHERS_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_VISON");
        opener.document.form1.txtEYE_VISON.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_NE_R");
        opener.document.form1.txtEYE_NE_R.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_NE_L");
        opener.document.form1.txtEYE_NE_L.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_NE_RE");
        opener.document.form1.txtEYE_NE_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_FA_R");
        opener.document.form1.txtEYE_FA_R.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_FA_L");
        opener.document.form1.txtEYE_FA_L.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_FA_RE");
        opener.document.form1.txtEYE_FA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_CO");
        opener.document.form1.txtEYE_CO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_CO_R");
        opener.document.form1.txtEYE_CO_R.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEYE_CO_L");
        opener.document.form1.txtEYE_CO_L.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtYEAR_R");
        opener.document.form1.txtYEAR_R.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtYEAR_L");
        opener.document.form1.txtYEAR_L.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtYEAR_RRE");
        opener.document.form1.txtYEAR_RRE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtYEAR_LRE");
        opener.document.form1.txtYEAR_LRE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCH_XRA_NO");
        opener.document.form1.txtCH_XRA_NO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCH_XRA_RE");
        opener.document.form1.txtCH_XRA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLORD_NO");
        opener.document.form1.txtLORD_NO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLORD_RE");
        opener.document.form1.txtLORD_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtBL_PRES");
        opener.document.form1.txtBL_PRES.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtBL_PR_RE");
        opener.document.form1.txtBL_PR_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHEAR_RE");
        opener.document.form1.txtHEAR_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLUN_RE");
        opener.document.form1.txtLUN_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtABD_RE");
        opener.document.form1.txtABD_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHER_RE");
        opener.document.form1.txtHER_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtVARI_RE");
        opener.document.form1.txtVARI_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtEXTR_RE");
        opener.document.form1.txtEXTR_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSKIN_RE");
        opener.document.form1.txtSKIN_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCLINICAL");
        opener.document.form1.txtCLINICAL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLAB_RE");
        opener.document.form1.txtLAB_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtVDRL_RE");
        opener.document.form1.txtVDRL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtTPHA_RE");
        opener.document.form1.txtTPHA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtcns_re");
       // opener.document.form1.txtcns_re.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPSYCHIATRY_re");
       // opener.document.form1.txtPSYCHIATRY_re.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtGIARDIA_re");
       // opener.document.form1.txtGIARDIA_re.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtMICROFILARIA_re");
      //  opener.document.form1.txtMICROFILARIA_re.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtQUA_EL_HIV");
        opener.document.form1.txtQUA_EL_HIV.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSUG_RE");
        opener.document.form1.txtSUG_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtALB_RE");
        opener.document.form1.txtALB_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtBIL_RE");
        opener.document.form1.txtBIL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTH_RE");
        opener.document.form1.txtOTH_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHEL_RE");
        opener.document.form1.txtHEL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtS_BIL_RE");
        opener.document.form1.txtS_BIL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSAL_RE");
        opener.document.form1.txtSAL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtV_CH_RE");
        opener.document.form1.txtV_CH_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTHER0");
        opener.document.form1.txtOTHER0.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtAOC");
        opener.document.form1.txtAOC.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHEM");
        opener.document.form1.txtHEM.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHEM_RE");
        opener.document.form1.txtHEM_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtMAL");
        opener.document.form1.txtMAL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtMAL_RE");
        opener.document.form1.txtMAL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtbg");
        opener.document.form1.txtbg.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtbg_RE");
        opener.document.form1.txtbg_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("CMBUAI_RE");
        opener.document.form1.CMBUAI_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtABD");
        //opener.document.form1.txtABD.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSERO_RE");
        opener.document.form1.txtSERO_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHIV_RE");
        opener.document.form1.txtHIV_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtF_B_S");
        opener.document.form1.txtF_B_S.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtF_B_S_RE");
        opener.document.form1.txtF_B_S_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHBSA");
        opener.document.form1.txtHBSA.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHBSA_RE");
        opener.document.form1.txtHBSA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtANTI");
        opener.document.form1.txtANTI.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtANTI_RE");
        opener.document.form1.txtANTI_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtALP");
        //opener.document.form1.txtALP.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtBILI");
       // opener.document.form1.txtBILI.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSGPT");
        //opener.document.form1.txtSGPT.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtL_F_T");
        opener.document.form1.txtL_F_T.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtL_F_T_RE");
        opener.document.form1.txtL_F_T_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCREA");
        opener.document.form1.txtCREA.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCREA_RE");
        opener.document.form1.txtCREA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtUREA");
        opener.document.form1.txtUREA.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtUREA_RE");
        opener.document.form1.txtUREA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPREG_TEST");
        opener.document.form1.txtPREG_TEST.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtpRE_NOT_RE");
        //opener.document.form1.txtpRE_NOT_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPRE_NOT_DO");
       // opener.document.form1.txtPRE_NOT_DO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPRE_RECO");
      //  opener.document.form1.txtPRE_RECO.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPSYCHOLGI");
        opener.document.form1.txtPSYCHOLGI.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtE_C_G_RE");
        opener.document.form1.txtE_C_G_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtE_C_G_RE2");
        //opener.document.form1.txtE_C_G_RE2.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTH_1");
        opener.document.form1.txtOTH_1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTH_2");
        //opener.document.form1.txtOTH_2.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdarem1");
        opener.document.form1.txtdarem1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdarem2");
        opener.document.form1.txtdarem2.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdarem3");
        opener.document.form1.txtdarem3.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtrem1np");
        opener.document.form1.txtrem1np.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtrem2np");
        opener.document.form1.txtrem2np.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtlarem1");
        opener.document.form1.txtlarem1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtlarnp1");
        opener.document.form1.txtlarnp1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtlabrem");
        opener.document.form1.txtlabrem.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtxarem1");
        opener.document.form1.txtxarem1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtaremnp");
        opener.document.form1.txtaremnp.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("CMBUAI");
        opener.document.form1.CMBUAI.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtDIG1");
        //opener.document.form1.txtDIG1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtDIG2");
       // opener.document.form1.txtDIG2.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtDIG3");
       // opener.document.form1.txtDIG3.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbresult");
        opener.document.form1.cmbresult.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbxres");
        opener.document.form1.cmbxres.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbxrea");
        opener.document.form1.cmbxrea.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("CMBlbrEC");
        opener.document.form1.CMBlbrEC.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("CMBlbRES");
        opener.document.form1.CMBlbRES.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbfres");
        opener.document.form1.cmbfres.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbpres");
        opener.document.form1.cmbpres.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("CMBuNFITrE");
        opener.document.form1.CMBuNFITrE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		//XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("lblprint");
        //opener.document.form1.lblprint.value = XMLAddress1[0].childNodes[0].nodeValue;
		//alert("ok");
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHEAR");
        opener.document.form1.txtHEAR.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLUN");
        opener.document.form1.txtLUN.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtABD");
        opener.document.form1.txtABD.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCLINICAL_RE");
        opener.document.form1.txtCLINICAL_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtQUA_EL_HIV_RE");
        opener.document.form1.txtQUA_EL_HIV_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbres");
        opener.document.form1.cmbres.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtltime");
        opener.document.form1.txtltime.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbresx");
        opener.document.form1.cmbresx.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtxtime");
        opener.document.form1.txtxtime.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCH_XRA_RE");
        opener.document.form1.txtCH_XRA_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLORD_RE");
        opener.document.form1.txtLORD_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLORD_RE");
        opener.document.form1.txtLORD_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtB_OTH");
        opener.document.form1.txtB_OTH.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtB_OTH_RE");
        opener.document.form1.txtB_OTH_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHEL");
        opener.document.form1.txtHEL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtS_BIL");
        opener.document.form1.txtS_BIL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSAL");
        opener.document.form1.txtSAL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtV_CH");
        opener.document.form1.txtV_CH.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTHER0_RE");
        opener.document.form1.txtOTHER0_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtAOC_RE");
        opener.document.form1.txtAOC_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPREG_TEST_RE");
        opener.document.form1.txtPREG_TEST_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPSYCHOLGI_RE");
        opener.document.form1.txtPSYCHOLGI_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtE_C_G");
        opener.document.form1.txtE_C_G.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTH_1_RE");
        opener.document.form1.txtOTH_1_RE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtSUG");
        opener.document.form1.txtSUG.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtALB");
        opener.document.form1.txtALB.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtBIL");
        opener.document.form1.txtBIL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOTH");
        opener.document.form1.txtOTH.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHIV");
        opener.document.form1.txtHIV.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLAB");
        opener.document.form1.txtLAB.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtVDRL");
        opener.document.form1.txtVDRL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtTPHA");
        opener.document.form1.txtTPHA.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtHER");
        opener.document.form1.txtHER.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtVARI");
        opener.document.form1.txtVARI.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbhead");
        opener.document.form1.cmbhead.value = XMLAddress1[0].childNodes[0].nodeValue;
		
				
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
		
		if (document.getElementById(TCODE).checked==true){
			chk_val=1;
		} else {
			chk_val=0;	
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