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

    document.getElementById('txt_passno').value = "";
    document.getElementById('txt_serino').value = "";
    document.getElementById('TXTREFNO').value = "";
    document.getElementById('txt_countna').value = "";
    document.getElementById('cmbmr').value = "MR.";
    document.getElementById('txt_frname').value = "";
    document.getElementById('txt_lastname').value = "";
    document.getElementById('txtPOS_APP').value = "";
    document.getElementById('txtPLA_OF_IS').value = "";
    document.getElementById('cmbnat').value = "Sri Lankan";

    document.getElementById('txtCcode').value = "";
    document.getElementById('txt_agname').value = "";
    document.getElementById('txt_xrayno').value = "";
    document.getElementById('txt_ag_ye').value = "";
    document.getElementById('cmbdi').value = "";
    document.getElementById('cmbsex').value = "MALE";
    document.getElementById('txt_gccno').value = "";
    
    document.getElementById('txtadd').value = "";
    document.getElementById('cmdbreligon').value = "Buddhist";
    document.getElementById('txttel').value = "";

    document.getElementById('cmbpaytype').value = "";
    document.getElementById('txtamu').value = "";
    document.getElementById('txt_paid').value = "";
    document.getElementById('txtbal').value = "";
    document.getElementById('txt_cheno').value = "";
    document.getElementById('txt_chdate').value = "";
    document.getElementById('txt_cas').value = "";
    document.getElementById('txtbank').value = "";
    document.getElementById('txt_cheamo').value = "";


    var url = "medical_reg_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function assign_invno() {



    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("treatment");
        document.getElementById('treat_list').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("serino");
        document.getElementById('txt_serino').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtdate");
        document.getElementById('DTPicker1').value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("D_REFNO");
        document.getElementById('TXTREFNO').value = XMLAddress1[0].childNodes[0].nodeValue;



        document.getElementById("med_photo").innerHTML = "<img width='160' height='120' src='' />";


    }


}











function med_reg(serino)
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }



    var url = "medical_reg_data.php";
    url = url + "?Command=" + "med_reg";

    url = url + "&serino=" + serino;

    xmlHttp.onreadystatechange = result_med_reg;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function result_med_reg()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
       // alert(xmlHttp.responseText);

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("TXTREFNO");
        opener.document.form1.TXTREFNO.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCcode");
        opener.document.form1.txtCcode.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_agname");
        opener.document.form1.txt_agname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("DTPicker1");
        opener.document.form1.DTPicker1.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_gccno");
        opener.document.form1.txt_gccno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_frname");
        opener.document.form1.txt_frname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtamu");
        opener.document.form1.txtamu.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_paid");
        opener.document.form1.txt_paid.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbpaytype");
        opener.document.form1.cmbpaytype.value = XMLAddress1[0].childNodes[0].nodeValue;

        //	XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("dtdel_date");
        //    opener.document.form1.dtdel_date.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_count");
        opener.document.form1.txt_count.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_countna");
        opener.document.form1.txt_countna.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_rema");
        opener.document.form1.txt_rema.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_ag_ye");
        opener.document.form1.txt_ag_ye.value = XMLAddress1[0].childNodes[0].nodeValue;

        //XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_ag_mon");
        //  opener.document.form1.txt_ag_mon.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbdi");
        opener.document.form1.cmbdi.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_passno");
        opener.document.form1.txt_passno.value = XMLAddress1[0].childNodes[0].nodeValue;

        

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_serino");
        opener.document.form1.txt_serino.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_xrayno");
        opener.document.form1.txt_xrayno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbsex");
        opener.document.form1.cmbsex.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbstatus");
        opener.document.form1.cmbstatus.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbnat");
        opener.document.form1.cmbnat.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPLA_OF_IS");
        opener.document.form1.txtPLA_OF_IS.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtPOS_APP");
        opener.document.form1.txtPOS_APP.value = XMLAddress1[0].childNodes[0].nodeValue;

        //	XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtnoch");
        //   opener.document.form1.txtnoch.value = XMLAddress1[0].childNodes[0].nodeValue;

        //	XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtchage");
        //    opener.document.form1.txtchage.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_gccno");
        opener.document.form1.txt_gccno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtadd");
        opener.document.form1.txtadd.value = XMLAddress1[0].childNodes[0].nodeValue;

        /*	XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("chkLRMP");
         if (XMLAddress1[0].childNodes[0].nodeValue=="1"){
         opener.document.form1.chkLRMP.checked = true;
         } else {
         opener.document.form1.chkLRMP.checked = false;	
         }*/

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_lastname");
        opener.document.form1.txt_lastname.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("TXTLAB_NO");
        opener.document.form1.TXTLAB_NO.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmbmr");
        opener.document.form1.cmbmr.value = XMLAddress1[0].childNodes[0].nodeValue;


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_chdate");
        opener.document.form1.txt_chdate.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_cheamo");
        opener.document.form1.txt_cheamo.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtbank");
        opener.document.form1.txtbank.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_cheno");
        opener.document.form1.txt_cheno.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txt_cas");
        opener.document.form1.txt_cas.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("cmdbreligon");
        opener.document.form1.cmdbreligon.value = XMLAddress1[0].childNodes[0].nodeValue;

 
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txttel");
        opener.document.form1.txttel.value = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("chk_list");
        window.opener.document.getElementById('treat_list').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("pic");
        window.opener.document.getElementById("med_photo").innerHTML = "<img width='160' height='120' src='" + XMLAddress1[0].childNodes[0].nodeValue + "' />";



        self.close();
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

    var url = "medical_reg_data.php";
    url = url + "?Command=" + "save_medical";



    url = url + "&txt_count=" + document.getElementById('txt_count').value;
    url = url + "&txt_countna=" + document.getElementById('txt_countna').value;
    url = url + "&DTPicker1=" + document.getElementById('DTPicker1').value;
    url = url + "&TXTREFNO=" + document.getElementById('TXTREFNO').value;
    url = url + "&txtCcode=" + document.getElementById('txtCcode').value;
    url = url + "&txt_agname=" + document.getElementById('txt_agname').value;
    url = url + "&txt_gccno=" + document.getElementById('txt_gccno').value;
    url = url + "&txt_frname=" + document.getElementById('txt_frname').value;
    url = url + "&txtamu=" + document.getElementById('txtamu').value;
    url = url + "&txt_paid=" + document.getElementById('txt_paid').value;
    url = url + "&cmbpaytype=" + document.getElementById('cmbpaytype').value;
    //	url = url + "&dtdel_date=" + document.getElementById('dtdel_date').value;
    url = url + "&txt_rema=" + document.getElementById('txt_rema').value;
    url = url + "&txt_ag_ye=" + document.getElementById('txt_ag_ye').value;
    //	url = url + "&txt_ag_mon=" + document.getElementById('txt_ag_mon').value;
    url = url + "&cmbdi=" + document.getElementById('cmbdi').value;
    url = url + "&txt_passno=" + document.getElementById('txt_passno').value;
    
    url = url + "&txt_serino=" + document.getElementById('txt_serino').value;
    url = url + "&txt_xrayno=" + document.getElementById('txt_xrayno').value;
    url = url + "&cmbsex=" + document.getElementById('cmbsex').value;
    url = url + "&cmbstatus=" + document.getElementById('cmbstatus').value;
    url = url + "&cmbnat=" + document.getElementById('cmbnat').value;
    url = url + "&txtPLA_OF_IS=" + document.getElementById('txtPLA_OF_IS').value;
    url = url + "&txtPOS_APP=" + document.getElementById('txtPOS_APP').value;
    url = url + "&txtPLA_OF_IS=" + document.getElementById('txtPLA_OF_IS').value;
    //	url = url + "&txtnoch=" + document.getElementById('txtnoch').value;
    //	url = url + "&txtchage=" + document.getElementById('txtchage').value;
    url = url + "&txtadd=" + document.getElementById('txtadd').value;
    url = url + "&txt_cheno=" + document.getElementById('txt_cheno').value;
    url = url + "&txt_cas=" + document.getElementById('txt_cas').value;
    url = url + "&cmdbreligon=" + document.getElementById('cmdbreligon').value;
    url = url + "&txttel=" + document.getElementById('txttel').value;


    /*if (document.getElementById('chkLRMP').checked==true){
     chkLRMP=1;
     } else {
     chkLRMP=0;	
     }*/

    //url = url + "&chkLRMP=" + chkLRMP;
    url = url + "&txt_lastname=" + document.getElementById('txt_lastname').value;
    url = url + "&TXTLAB_NO=" + document.getElementById('TXTLAB_NO').value;
    url = url + "&cmbmr=" + document.getElementById('cmbmr').value;
    url = url + "&txt_chdate=" + document.getElementById('txt_chdate').value;
    url = url + "&txt_cheamo=" + document.getElementById('txt_cheamo').value;
    url = url + "&txtbank=" + document.getElementById('txtbank').value;
    url = url + "&pic=" + document.getElementById('pic').value;

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


function set_treatment()
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }


    var url = "medical_reg_data.php";
    url = url + "?Command=" + "set_treatment";

    url = url + "&cmbpackage=" + document.getElementById("cmbpackage").value;

    xmlHttp.onreadystatechange = result_set_treatment;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

function result_set_treatment()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        //alert(xmlHttp.responseText);


        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("list");
        document.getElementById('treat_list').innerHTML = XMLAddress1[0].childNodes[0].nodeValue;

        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("TAMOUNT");
        document.getElementById('txtamu').value = XMLAddress1[0].childNodes[0].nodeValue;
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
        //alert(xmlHttp.responseText);
        document.getElementById("txtamu").value = xmlHttp.responseText;

    }
}





function close_form() {
    self.close();
}


function print_inv_rec()
{
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "report_medical_reg_rec.php";
    url = url + "?TXTREFNO=" + document.getElementById('TXTREFNO').value;
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

function saveimage1(image_name)
//function saveimage1()
{
    //alert("ok");



    //alert(image_name);
    window.opener.document.getElementById("med_photo").innerHTML = "<img width='160' height='120' src='" + image_name + "' />";
    window.opener.document.getElementById("pic").value = image_name;
    //alert("ok");
    //setTimeout("self.close();",500);
}