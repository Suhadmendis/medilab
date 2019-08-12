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

  
        var url = "customer_mast_data.php";
        url = url + "?Command=" + "getcode";
        url = url + "&cus_letter=" + document.getElementById('cus_letter').value;
       
        xmlHttp.onreadystatechange = showarmyresult_getcode;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);

}

function showarmyresult_getcode()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {

        
        document.getElementById('txtCODE').value = xmlHttp.responseText;

     //   XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("doccode");
     //   document.getElementById('doccode').value = XMLAddress1[0].childNodes[0].nodeValue;


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

   

        var url = "customer_mast_data.php";
        url = url + "?Command=" + "save_item";
		
			
        url = url + "&txtCODE=" + document.getElementById('txtCODE').value;
        url = url + "&txtNAME=" + document.getElementById('txtNAME').value;
        url = url + "&txtADD1=" + document.getElementById('txtADD1').value;
		url = url + "&txtCONT=" + document.getElementById('txtCONT').value;
        url = url + "&txtLABLI=" + document.getElementById('txtLABLI').value;
        url = url + "&Check1=" + document.getElementById('Check1').checked;
		url = url + "&txtOPBAL=" + document.getElementById('txtOPBAL').value;
		url = url + "&txtOPDATE=" + document.getElementById('txtOPDATE').value;
		url = url + "&txTCUR_BAL=" + document.getElementById('txTCUR_BAL').value;
		url = url + "&txtLIMIT=" + document.getElementById('txtLIMIT').value;
		url = url + "&txtTELE=" + document.getElementById('txtTELE').value;
		url = url + "&txtFAX=" + document.getElementById('txtFAX').value;
		url = url + "&TXTEMAIL=" + document.getElementById('TXTEMAIL').value;
		url = url + "&cus_letter=" + document.getElementById('cus_letter').value;
       
        xmlHttp.onreadystatechange = salessaveresult;
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    
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
           // print_inv();
			document.getElementById("cus_letter").style.visibility = "hidden";
           // new_inv();
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


function ass_agent(agno)
{
    //alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "customer_mast_data.php";
    url = url + "?Command=" + "pass_ass_agent";
    url = url + "&agno=" + agno;
    //alert(url);

    xmlHttp.onreadystatechange = result_ass_agent;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function result_ass_agent()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
		
	//	alert(xmlHttp.responseText);
		
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("CODE");
        opener.document.form1.txtCcode.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("NAME");
        opener.document.form1.txt_agname.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		self.close();
	}
	
}

function ass_cus(agno)
{
    alert("ok");
    xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null)
    {
        alert("Browser does not support HTTP Request");
        return;
    }

    var url = "customer_mast_data.php";
    url = url + "?Command=" + "pass_ass_cus";
    url = url + "&agno=" + agno;
    alert(url);

    xmlHttp.onreadystatechange = result_ass_cus;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}

function result_ass_cus()
{
    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
		
		alert(xmlHttp.responseText);
		
        XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCODE");
        opener.document.form1.txtCODE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtNAME");
        opener.document.form1.txtNAME.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtADD1");
        opener.document.form1.txtADD1.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOPBAL");
        opener.document.form1.txtOPBAL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtTELE");
        opener.document.form1.txtTELE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtCONT");
        opener.document.form1.txtCONT.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txTCUR_BAL");
        opener.document.form1.txTCUR_BAL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtOPDATE");
        opener.document.form1.txtOPDATE.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLIMIT");
        opener.document.form1.txtLIMIT.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtFAX");
        opener.document.form1.txtFAX.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("TXTEMAIL");
        opener.document.form1.TXTEMAIL.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("txtLABLI");
        opener.document.form1.txtLABLI.value = XMLAddress1[0].childNodes[0].nodeValue;
		
		XMLAddress1 = xmlHttp.responseXML.getElementsByTagName("Check1");
		var Check1=XMLAddress1[0].childNodes[0].nodeValue;
		
		if (Check1==1){
        	opener.document.form1.Check1.checked = true;
		} else {
			opener.document.form1.Check1.checked = false;	
		}
		
			
		self.close();
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

        var url = "customer_mast_data.php";
        url = url + "?Command=" + "cancel_inv";

        url = url + "&txtCODE=" + document.getElementById('txtCODE').value;
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
        //setTimeout("location.reload(true);", 500);

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


    document.getElementById('txtCODE').value = "";
    document.getElementById('txtNAME').value = "";
    document.getElementById('txtADD1').value = "";

    document.getElementById('txtCONT').value = "";
    document.getElementById('txtLABLI').value = "";
    document.getElementById('Check1').checked = false;
	
    document.getElementById('txtOPBAL').value = "";
	document.getElementById('txtOPDATE').value = "";
    document.getElementById('txTCUR_BAL').value = "";
    document.getElementById('txtLIMIT').value = "";
	
    document.getElementById('txtTELE').value = "";
    document.getElementById('txtFAX').value = "";
	document.getElementById('TXTEMAIL').value = "";
   
	document.getElementById("cus_letter").style.visibility = "visible";
	document.getElementById('cus_letter').value="";
	
    var url = "customer_mast_data.php";
    url = url + "?Command=" + "new_inv";

    xmlHttp.onreadystatechange = assign_invno;
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);

}




function assign_invno() {

    var XMLAddress1;

    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
    {
        

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




