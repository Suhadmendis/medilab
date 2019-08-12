<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Medical Entry";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	

?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>



<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>

<script type="text/javascript" language="javascript" src="js/medical_entry.js"></script>


<script language="javascript" type="text/javascript">
<!--
/****************************************************
     Author: Eric King
     Url: http://redrival.com/eak/index.shtml
     This script is free to use as long as this info is left in
     Featured on Dynamic Drive script library (http://www.dynamicdrive.com)
****************************************************/
var win=null;
function NewWindow(mypage,myname,w,h,scroll,pos){
if(pos=="random"){LeftPosition=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;TopPosition=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){LeftPosition=(screen.width)?(screen.width-w)/2:100;TopPosition=(screen.height)?(screen.height-h)/2:100;}
else if((pos!="center" && pos!="random") || pos==null){LeftPosition=0;TopPosition=20}
settings='width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
win=window.open(mypage,myname,settings);}
// -->
</script>

<script type="text/javascript">
function openWin()
{
myWindow=window.open('serach_inv.php','','width=200,height=100');
myWindow.focus();

}
</script>



<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"dte_shedule",
			dateFormat:"%Y-%m-%d"
			/*selectedDate:{				This is an example of what the full configuration offers.
				day:5,						For full documentation about these settings please see the full version of the code.
				month:9,
				year:2006
			},
			yearsRange:[1978,2020],
			limitToToday:false,
			cellColorScheme:"beige",
			dateFormat:"%m-%d-%Y",
			imgPath:"img/",
			weekStartDay:1*/
		});
	};
</script>
<style type="text/css">
<!--
.style1 {font-weight: bold}
.style2 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.txtdate { width:30%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}

.txtop { width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.style2 {font-weight: bold}
.txtop1 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtdate1 {width:30%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop2 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop11 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop111 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop112 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop1111 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop113 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop1121 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}
.txtop114 {width:100%; height:20px;
	font-family: "Trebuchet MS";
color:#000;
font-size:12px;
	background: none;  padding: 2px 1px;  border: 1px solid #3d4e5a; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; -ms-box-sizing: border-box; box-sizing: border-box;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border-radius:4px;
}

-->
</style>


<section id="main" class="column" >  
<div id="maindiv" >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
													<li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>
													<li><a class="d5" onClick="cancel_inv();" ><span>Cancel</span></a></li>
										            <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>
													<li><a class="d6" onClick="print_inv1();"><span>Print</span></a></li>
                                                    <li><a class="d6" onClick="print_inv();"><span>Print Rec</span></a></li>
                                                   
													<!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
													<li><a class="d8" onclick="close_form();"><span>Close</span></a></li>
												</ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />

<form name="form1" id="form1">            
  <table width="100%" border="0"  class=\"form-matrix-table\">
  <tr>
    <td width="15%"><input type="text"  class="label_purchase" value="Reference No" disabled/></td>
    <td width="14%"><input type="text" name="txtDREFNO" id="txtDREFNO" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  />
      <a href="search_labtest.php" onClick="NewWindow(this.href,'mywin','800','700','yes','center');return false" onFocus="this.blur()"></a></td>
    <td width="7%"><a href="search_med_entry.php?mstatus=med_entry" onclick="NewWindow(this.href,'mywin','800','700','yes','center');return false" onfocus="this.blur()">
      <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" />
    </a></td>
    <td width="15%"><a href="search_labtest.php" onclick="NewWindow(this.href,'mywin','800','700','yes','center');return false" onfocus="this.blur()">
      <input type="text"  class="label_purchase" value="Passport No" disabled="disabled"/>
    </a></td>
    <td width="12%"><input id="txtPAS_NO" name="txtPAS_NO" type="text" onkeypress="keyset('price_asiri',event);" class="text_purchase3" /></td>
    <td width="4%"><a href="search_med_entry.php?mstatus=med_entry" onclick="NewWindow(this.href,'mywin','800','700','yes','center');return false" onfocus="this.blur()">
      <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" />
    </a></td>
    <td width="15%"><input type="text"  class="label_purchase" value="Date" disabled="disabled"/></td>
    <td width="16%"><input id="txtDATE" name="txtDATE" type="text" onkeypress="keyset('price_asiri',event);" class="text_purchase3" /></td>
    <td width="4%">&nbsp;</td>
    <td width="0%">&nbsp;</td>
    <td width="0%">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text"  class="label_purchase" value="Serial No" disabled="disabled"/></td>
    <td><input id="txtSERINO" name="txtSERINO" type="text" onkeypress="keyset('price_asiri',event);" class="text_purchase3" /></td>
    <td colspan="2"><input type="text"  class="label_purchase" value="GAMCA No" disabled="disabled"/></td>
    <td colspan="2"><input id="txtGCC_NO" name="txtGCC_NO" type="text" onkeypress="keyset('price_asiri',event);" class="text_purchase3" /></td>
    <td><input type="text"  class="label_purchase" value="Code" disabled="disabled"/></td>
    <td>
      <input id="txtCODE" name="txtCODE" type="text" onkeypress="keyset('price_asiri',event);" class="text_purchase3" />
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
    <td colspan="2" rowspan="3">
      <fieldset > 
       
        <table width="200" border="0">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
      </fieldset></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text"  class="label_purchase" value="CMB No" disabled="disabled"/></td>
    <td><input id="txtCMB_NO" name="txtCMB_NO" type="text"  value="" class="text_purchase3" onkeypress="keyset('price_durdance',event);"/></td>
    <td colspan="4"><input id="cmbhead" name="cmbhead" type="text"  value="" class="text_purchase3" onkeypress="keyset('price_durdance',event);"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

  
 
<fieldset style="background:#ddd">               
    
      <!-- Tab -->
<link rel="stylesheet" type="text/css" href="css/tabcontent.css" />
	
<script type="text/javascript" src="js/tabcontent.js">

/***********************************************
* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
            
 <ul id="countrytabs" class="shadetabs">	
	<li><a href="#" rel="country1" class="selected">Patient Details</a></li>
	<li><a href="#" rel="country2">Doctor</a></li>
	<li><a href="#" rel="country3">X-Ray</a></li>
	<li><a href="#" rel="country4">Lab</a></li>
  </ul>
    
    
    <div style="border:1px solid gray; width:1000px; margin-bottom: 1em; padding: 10px">

<div id="country1" class="tabcontent">
	<!-- Tab 1  -->
    <table width="980" border="0">
  <tr>
    <td width="812" rowspan="4">
   
    <table width="804" border="0">
      <tr>
        <td width="135"><input type="text"  class="label_purchase" value="Name" disabled="disabled"/></td>
        <td width="128"><input type="text" name="txtini" id="txtini" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td width="128"><input type="text" name="txtName" id="txtName" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td width="135"><input type="text"  class="label_purchase" value="Nationality" disabled="disabled"/></td>
        <td colspan="2">
        <select name="txtNATIONL" id="txtNATIONL" class="text_purchase3" onchange="keyset('dfrom',event);">
       <option value="SRI LANKAN">SRI LANKAN</option>
    </select>        </td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Last Name" disabled="disabled"/></td>
        <td colspan="2"><input type="text" name="txtLASTNAME" id="txtLASTNAME" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><input type="text"  class="label_purchase" value="Height (Ft.)" disabled="disabled"/></td>
        <td width="128"><input type="text" name="txtHI_FT" id="txtHI_FT" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td width="124"><input type="text" name="txtHI_in" id="txtHI_in" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Address" disabled="disabled"/></td>
        <td colspan="2"><input type="text" name="lbladd" id="lbladd" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><input type="text"  class="label_purchase" value="Weight" disabled="disabled"/></td>
        <td><input type="text" name="txtWE" id="txtWE" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Sex" disabled="disabled"/></td>
        <td><input type="text" name="txtSEX" id="txtSEX" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td>&nbsp;</td>
        <td><input type="text"  class="label_purchase" value="Place of Issue" disabled="disabled"/></td>
        <td colspan="2"><input type="text" name="txtPLA_OF_IS" id="txtPLA_OF_IS" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Age" disabled="disabled"/></td>
        <td><input type="text" name="txtAGE" id="txtAGE" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td>&nbsp;</td>
        <td><input type="text"  class="label_purchase" value="Applied Position" disabled="disabled"/></td>
        <td colspan="2">
        <select name="txtPOS_APP" id="txtPOS_APP" class="text_purchase3" onchange="keyset('dfrom',event);">
       		<option value=""></option>
            <option value="HOUSE MMAID">HOUSE MMAID</option>
            <option value="NAVY OFFICER">NAVY OFFICER</option>
            <option value="MECHANICAL ENGINEER">MECHANICAL ENGINEER</option>
            <option value="ACCOUNTS ASSISTANT">ACCOUNTS ASSISTANT</option>
    	</select></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Status" disabled="disabled"/></td>
        <td colspan="2"><input type="text" name="txtSTATUS" id="txtSTATUS" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><input type="text"  class="label_purchase" value="Agency" disabled="disabled"/></td>
        <td colspan="2"><input type="text" name="txtREC_AG" id="txtREC_AG" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
       </td>
    <td width="158">
   
    	<input type="text"  class="label_purchase" value="Final Result" disabled="disabled"/><br />
   	  <font color="#FFFFFF">
   	  <select name="cmbfres" id="cmbfres" class="text_purchase3" onchange="keyset('dfrom',event);">
        <option value="N/A">N/A</option>
        <option value="FIT">FIT</option>
        <option value="UNFIT">UNFIT</option>
        <option value="TEMP.UNFIT">TEMP.UNFIT</option>
      </select>
   	  </font>       </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td> 
   	<input type="text"  class="label_purchase" value="Printing Result" disabled="disabled"/><br />
   	<font color="#FFFFFF">
   	<select name="cmbpres" id="cmbpres" class="text_purchase3" onchange="keyset('dfrom',event);">
      <option value="N/A">N/A</option>
      <option value="FIT">FIT</option>
      <option value="UNFIT">UNFIT</option>
      <option value="TEMP.UNFIT">TEMP.UNFIT</option>
    </select>
   	</font>    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>
   
    <table width="810" border="0">
      <tr>
        <td colspan="2"><input type="text"  class="label_purchase" value="Psychiatric and neurological disorders (Epilepsy, Depression)" disabled="disabled"/></td>
        <td width="296"><input type="text" name="txtP_N_D_RE" id="txtP_N_D_RE" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td colspan="2"><input type="text"  class="label_purchase" value="Last Name" disabled="disabled"/></td>
        <td><input type="text" name="txtALLERGY_RE" id="txtALLERGY_RE" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td colspan="2"><input type="text"  class="label_purchase" value="Address" disabled="disabled"/></td>
        <td><input type="text" name="txtOTHERS_RE" id="txtOTHERS_RE" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>


<div id="country2" class="tabcontent">
	<!-- Tab 2  -->
    <table width="928" border="0">
  <tr>
    <td width="375" valign="top">
    
    <b>Eye Vision</b>
    <table width="330" border="0">
      <tr>
        <td width="132"><input type="text"  class="label_purchase" value="Near R" disabled="disabled"/></td>
        <td width="124"><input type="text" name="txtEYE_NE_R" id="txtEYE_NE_R" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td width="66"><select name="txtEYE_VISON" id="txtEYE_VISON" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Near L" disabled="disabled"/></td>
        <td><input type="text" name="txtEYE_NE_L" id="txtEYE_NE_L" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtEYE_NE_RE" id="txtEYE_NE_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Far R" disabled="disabled"/></td>
        <td><input type="text" name="txtEYE_FA_R" id="txtEYE_FA_R" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtEYE_FA_RE" id="txtEYE_FA_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Far L" disabled="disabled"/></td>
        <td><input type="text" name="txtEYE_FA_L" id="txtEYE_FA_L" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Correct R" disabled="disabled"/></td>
        <td><input type="text" name="txtEYE_CO_R" id="txtEYE_CO_R" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtEYE_CO" id="txtEYE_CO" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Correct L" disabled="disabled"/></td>
        <td><input type="text" name="txtEYE_CO_L" id="txtEYE_CO_L" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
     </td>
    <td width="317">
    
    <b>Systemic Examination</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Blood Pressure" disabled="disabled"/></td>
        <td>
        <select name="txtBL_PRES" id="txtBL_PRES" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value=""></option>
          <option value="110/60 mmHg">110/60 mmHg</option>
          <option value="110/65 mmHg">110/65 mmHg</option>
          <option value="110/70 mmHg">110/70 mmHg</option>
          <option value="110/75 mmHg">110/75 mmHg</option>
          <option value="110/80 mmHg">110/80 mmHg</option>
          <option value="110/85 mmHg">110/85 mmHg</option>
          <option value="110/90 mmHg">110/90 mmHg</option>
          <option value="120/60 mmHg">120/60 mmHg</option>
          <option value="120/65 mmHg">120/65 mmHg</option>
          <option value="120/70 mmHg">120/70 mmHg</option>
          <option value="120/75 mmHg">120/75 mmHg</option>
          <option value="120/80 mmHg">120/80 mmHg</option>
          <option value="120/85 mmHg">120/85 mmHg</option>
          <option value="120/90 mmHg">120/90 mmHg</option>
          <option value="130/65 mmHg">130/65 mmHg</option>
          <option value="130/70 mmHg">130/70 mmHg</option>
          <option value="130/75 mmHg">130/75 mmHg</option>
          <option value="130/80 mmHg">130/80 mmHg</option>
          <option value="130/85 mmHg">130/85 mmHg</option>
          <option value="130/90 mmHg">130/90 mmHg</option>
          <option value="140/60 mmHg">140/60 mmHg</option>
          <option value="140/65 mmHg">140/65 mmHg</option>
          <option value="140/70 mmHg">140/70 mmHg</option>
          <option value="140/75 mmHg">140/75 mmHg</option>
          <option value="140/80 mmHg">140/80 mmHg</option>
          <option value="140/85 mmHg">140/85 mmHg</option>
          <option value="140/90 mmHg">140/90 mmHg</option>
        </select>        </td>
        <td><select name="txtBL_PR_RE" id="txtBL_PR_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Heart" disabled="disabled"/></td>
        <td><input type="text" name="txtHEAR" id="txtHEAR" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtHEAR_RE" id="txtHEAR_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Lungs" disabled="disabled"/></td>
        <td><input type="text" name="txtLUN" id="txtLUN" value="CLEAR" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtLUN_RE" id="txtLUN_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Abdomen" disabled="disabled"/></td>
        <td><input type="text" name="txtABD" id="txtABD" value="SOFT" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtABD_RE" id="txtABD_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
   
    <b>Verneral Diseases</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Clinical" disabled="disabled"/></td>
        <td><input type="text" name="txtCLINICAL" id="txtCLINICAL" value="NIL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtCLINICAL_RE" id="txtCLINICAL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
   
    <b>Quantum 11 Elisa</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="HIV - 1+2" disabled="disabled"/></td>
        <td><input type="text" name="txtQUA_EL_HIV" id="txtQUA_EL_HIV" value="NIL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtQUA_EL_HIV_RE" id="txtQUA_EL_HIV_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
     </td>
    <td width="222" valign="top">
     
    <b>Lab Result</b>
    <table width="200" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Result" disabled="disabled"/></td>
        <td><select name="cmbres" id="cmbres" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value=""></option>
          <option value="OK">OK</option>
          <option value="DOUBT">DOUBT</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txtltime" id="txtltime" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
   
    <b>XRay Result</b>
    <table width="200" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Result" disabled="disabled"/></td>
        <td><select name="cmbresx" id="cmbresx" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value=""></option>
          <option value="OK">OK</option>
          <option value="DOUBT">DOUBT</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="2"><input type="text" name="txtxtime" id="txtxtime" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
      </td>
  </tr>
  <tr>
    <td valign="top">
    
    <b>Ear</b>
    <table width="330" border="0">
      <tr>
        <td width="132"><input type="text"  class="label_purchase" value="Right" disabled="disabled"/></td>
        <td width="129"><input type="text" name="txtYEAR_R" id="txtYEAR_R" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td width="75"><select name="txtYEAR_RRE" id="txtYEAR_RRE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Left" disabled="disabled"/></td>
        <td><input type="text" name="txtYEAR_L" id="txtYEAR_L" value="NORMAL" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtYEAR_LRE" id="txtYEAR_LRE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td colspan="3"><input type="hidden" name="code7" id="code7" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
     </td>
    <td colspan="2">
    
   
    <table width="484" border="0">
      <tr>
        <td width="145"><input type="text"  class="label_purchase" value="Result" disabled="disabled"/></td>
        <td width="109"><font color="#FFFFFF">
          <select name="cmbresult" id="cmbresult" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="N/A">N/A</option>
            <option value="FIT">FIT</option>
            <option value="UNFIT">UNFIT</option>
            <option value="TEMP.UNFIT">TEMP.UNFIT</option>
          </select>
        </font></td>
        <td width="137"><input type="text"  class="label_purchase" value="Reason" disabled="disabled"/></td>
        <td width="75"><select name="CMBuNFITrE" id="CMBuNFITrE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="NONE">NONE</option>
          <option value="ALUHANG">0</option>
        </select></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Add.Remark 1" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtdarem1" id="txtdarem1" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Add.Remark 2" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtdarem2" id="txtdarem2" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Add.Remark 3" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtdarem3" id="txtdarem3" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Remark 1(NP)" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtrem1np" id="txtrem1np" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Remark 2(NP)" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtrem2np" id="txtrem2np" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="3"><input type="text" name="txtmedcode" id="txtmedcode" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
       </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
    
 </div>   
 
 
 <div id="country3" class="tabcontent">
	<!-- Tab 3  -->
    
    <table width="640" border="0">
  <tr>
    <td width="634" valign="top">
   
    <b>X-Ray</b>
    <table width="400" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Che.X-Ray No" disabled="disabled"/></td>
        <td><input type="text" name="txtCH_XRA_NO" id="txtCH_XRA_NO" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtCH_XRA_RE" id="txtCH_XRA_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Lordoic No" disabled="disabled"/></td>
        <td><input type="text" name="txtLORD_NO" id="txtLORD_NO" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        <td><select name="txtLORD_RE" id="txtLORD_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
      </td>
  </tr>
  <tr>
    <td>
   
   
    <table width="623" border="0">
      <tr>
        <td width="167"><input type="text"  class="label_purchase" value="Result" disabled="disabled"/></td>
        <td width="118"><font color="#FFFFFF">
          <select name="cmbxres" id="cmbxres" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="N/A">N/A</option>
            <option value="FIT">FIT</option>
            <option value="UNFIT">UNFIT</option>
            <option value="TEMP.UNFIT">TEMP.UNFIT</option>
          </select>
        </font></td>
        <td width="167"><input type="text"  class="label_purchase" value="Reason" disabled="disabled"/></td>
        <td width="153"><input type="text" name="cmbxrea" id="cmbxrea" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Add.Remark" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtxarem1" id="txtxarem1" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Remarks Add.Rem(Not Print)" disabled="disabled"/></td>
        <td colspan="3"><input type="text" name="txtaremnp" id="txtaremnp" value="" class="text_purchase3" onkeypress="keyset('searchcust',event);"  /></td>
        </tr>
    </table>
    </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
    
 </div> 
 
 
  <div id="country4" class="tabcontent">
	<!-- Tab 4  -->
    <table width="950" border="0">
  <tr>
    <td width="351">
   
    <b>Blood</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Blood Group" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtbg" name="txtbg" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        <td><select name="txtbg_RE" id="txtbg_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Hemoglobin" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtHEM" name="txtHEM" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        <td><select name="txtHEM_RE" id="txtHEM_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Malaria" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtMAL" name="txtMAL" onkeypress="keyset('class', event);" value="NEGATIVE"  onblur="setbrand();"/></td>
        <td><select name="txtMAL_RE" id="txtMAL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Others" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtB_OTH" name="txtB_OTH" onkeypress="keyset('class', event);"  value="-" onblur="setbrand();"/></td>
        <td><select name="txtB_OTH_RE" id="txtB_OTH_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
       </td>
    <td width="370">
     <b>Pregnancy Test</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Pregnancy Test" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtPREG_TEST" name="txtPREG_TEST" onkeypress="keyset('class', event);"  value="NEGATIVE"/></td>
        <td><select name="txtPREG_TEST_RE" id="txtPREG_TEST_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Psychological Test" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtPSYCHOLGI" name="txtPSYCHOLGI" onkeypress="keyset('class', event);" /></td>
        <td><select name="txtPSYCHOLGI_RE" id="txtPSYCHOLGI_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="ECG" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtE_C_G" name="txtE_C_G" onkeypress="keyset('class', event);" /></td>
        <td><select name="txtE_C_G_RE" id="txtE_C_G_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Others" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtOTH_1" name="txtOTH_1" onkeypress="keyset('class', event);"  value="NIL"/></td>
        <td><select name="txtOTH_1_RE" id="txtOTH_1_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table></td>
    <td width="300" rowspan="2" >
   
   <b> Serology</b>
    <table width="280" border="0">
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><select name="txtSERO_RE" id="txtSERO_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="HIV Test" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtHIV" name="txtHIV" onkeypress="keyset('class', event);" value="NEGATIVE"/></td>
        <td><select name="txtHIV_RE" id="txtHIV_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="F.B.S" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtF_B_S" name="txtF_B_S" onkeypress="keyset('class', event);"  value="110 mg/dl" onblur="setbrand();"/></td>
        <td><select name="txtF_B_S_RE" id="txtF_B_S_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="HBsAg" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtHBSA" name="txtHBSA" onkeypress="keyset('class', event);"  value="NEGATIVE"/></td>
        <td><select name="txtHBSA_RE" id="txtHBSA_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="AntiHCV" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtANTI" name="txtANTI" onkeypress="keyset('class', event);"  value="NEGATIVE"/></td>
        <td><select name="txtANTI_RE" id="txtANTI_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="L.F.T" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtL_F_T" name="txtL_F_T" onkeypress="keyset('class', event);"  value="NORMAL"/></td>
        <td><select name="txtL_F_T_RE" id="txtL_F_T_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Creatine" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtCREA" name="txtCREA" onkeypress="keyset('class', event);"  value="1.1 mg/dl"/></td>
        <td><select name="txtCREA_RE" id="txtCREA_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Urea" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtUREA" name="txtUREA" onkeypress="keyset('class', event);"  value="30 mg/dl"/></td>
        <td><select name="txtUREA_RE" id="txtUREA_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Lab" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtLAB" name="txtLAB" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        <td><select name="txtLAB_RE" id="txtLAB_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="VDRL" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtVDRL" name="txtVDRL" onkeypress="keyset('class', event);"  value="NON-REACTIVE" onblur="setbrand();"/></td>
        <td><select name="txtVDRL_RE" id="txtVDRL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="TPHA" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtTPHA" name="txtTPHA" onkeypress="keyset('class', event);"  value="NEGATIVE" onblur="setbrand();"/></td>
        <td><select name="txtTPHA_RE" id="txtTPHA_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
   
    </td>
  </tr>
  <tr>
    <td>
   
   <b>Stool</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Helminths" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtHEL" name="txtHEL" onkeypress="keyset('class', event);" value="NIL"  onblur="setbrand();"/></td>
        <td><select name="txtHEL_RE" id="txtHEL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Bilharzasis" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtS_BIL" name="txtS_BIL" onkeypress="keyset('class', event);" value="-"  onblur="setbrand();"/></td>
        <td><select name="txtS_BIL_RE" id="txtS_BIL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Salmonella/Shiella" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtSAL" name="txtSAL" onkeypress="keyset('class', event);" value="NIL"  onblur="setbrand();"/></td>
        <td><select name="txtSAL_RE" id="txtSAL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="V.Cholear" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtV_CH" name="txtV_CH" onkeypress="keyset('class', event);" value="NIL"  onblur="setbrand();"/></td>
        <td><select name="txtV_CH_RE" id="txtV_CH_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Others" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtOTHER0" name="txtOTHER0" onkeypress="keyset('class', event);" value="-"  onblur="setbrand();"/></td>
        <td><select name="txtOTHER0_RE" id="txtOTHER0_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="A.O.C" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtAOC" name="txtAOC" onkeypress="keyset('class', event);"  onblur="setbrand();"/></td>
        <td><select name="txtAOC_RE" id="txtAOC_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
    </table>
     </td>
    <td valign="top">
     <b>Urine</b>
    <table width="300" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Sugar" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtSUG" name="txtSUG" onkeypress="keyset('class', event);"  value="NIL" onblur="setbrand();"/></td>
        <td><select name="txtSUG_RE" id="txtSUG_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Albumin" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtALB" name="txtALB" onkeypress="keyset('class', event);"  value="NIL" onblur="setbrand();"/></td>
        <td><select name="txtALB_RE" id="txtALB_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Bili" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtBIL" name="txtBIL" onkeypress="keyset('class', event);"  value="NIL" onblur="setbrand();"/></td>
        <td><select name="txtBIL_RE" id="txtBIL_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="1">1</option>
            <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Others" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtOTH" name="txtOTH" onkeypress="keyset('class', event);"  value="NIL" onblur="setbrand();"/></td>
        <td><select name="txtOTH_RE" id="txtOTH_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Urine A/I" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="CMBUAI" name="CMBUAI" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        <td><select name="CMBUAI_RE" id="CMBUAI_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      
    </table></td>
  </tr>
  <tr>
    <td colspan="2"><table width="692" border="0">
      <tr>
        <td width="144"><input type="text"  class="label_purchase" value="Result" disabled="disabled"/></td>
        <td width="144"><font color="#FFFFFF">
          <select name="CMBlbrEC" id="CMBlbrEC" class="text_purchase3" onchange="keyset('dfrom',event);">
            <option value="N/A">N/A</option>
            <option value="FIT">FIT</option>
            <option value="UNFIT">UNFIT</option>
            <option value="TEMP.UNFIT">TEMP.UNFIT</option>
          </select>
        </font></td>
        <td width="194"><input type="text"  class="label_purchase" value="Reason" disabled="disabled"/></td>
        <td width="150"><input type="text" class="text_purchase3"  id="CMBlbRES" name="CMBlbRES" onkeypress="keyset('class', event);" /></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Add. Remark" disabled="disabled"/></td>
        <td colspan="3"><input type="text" class="text_purchase3"  id="txtlarem1" name="txtlarem1" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Remarks Add.Rem(N.P)" disabled="disabled"/></td>
        <td colspan="3"><input type="text" class="text_purchase3"  id="txtlarnp1" name="txtlarnp1" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Lab Remark" disabled="disabled"/></td>
        <td colspan="3"><input type="text" class="text_purchase3"  id="txtlabrem" name="txtlabrem" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
        </tr>
    </table></td>
    <td>
   
   <b>Others</b>
    <table width="280" border="0">
      <tr>
        <td><input type="text"  class="label_purchase" value="Hernia" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtHER" name="txtHER" onkeypress="keyset('class', event);" value="NIL"  onblur="setbrand();"/></td>
        <td><select name="txtHER_RE" id="txtHER_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Varicoseveins" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtVARI" name="txtVARI" onkeypress="keyset('class', event);"  value="NIL" onblur="setbrand();"/></td>
        <td><select name="txtVARI_RE" id="txtVARI_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Extremities" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtEXTR" name="txtEXTR" onkeypress="keyset('class', event);" value="NORMAL"  onblur="setbrand();"/></td>
        <td><select name="txtEXTR_RE" id="txtEXTR_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
        </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Skin" disabled="disabled"/></td>
        <td><input type="text" class="text_purchase3"  id="txtSKIN" name="txtSKIN" onkeypress="keyset('class', event);"  value="NORMAL" onblur="setbrand();"/></td>
        <td><select name="txtSKIN_RE" id="txtSKIN_RE" class="text_purchase3" onchange="keyset('dfrom',event);">
          <option value="1">1</option>
          <option value="0">0</option>
        </select></td>
        </tr>
    </table>
    
    </td>
  </tr>
</table>
    
  </div>       
    	<script type="text/javascript">

		var countries=new ddtabcontent("countrytabs1")
		countries.setpersist(true)
		countries.setselectedClassTarget("link") //"link" or "linkparent"
		countries.init()

		</script>

<br />
</div>



<script type="text/javascript">

var countries=new ddtabcontent("countrytabs")
countries.setpersist(true)
countries.setselectedClassTarget("link") //"link" or "linkparent"
countries.init()

</script>       
            
  
          

</form>        


          </div>
                        </section>
                        