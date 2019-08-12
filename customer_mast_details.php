<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Master Files";
$_SESSION["page_name2"]="Customer Master File";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	

?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>

<script language="JavaScript" src="js/cust_mast.js"></script>

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

<section id="main" class="column" >  
<div id="maindiv">       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
													<li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>
													
										            <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>
													<li><a class="d5" onClick="cancel_inv();" ><span>Cancel</span></a></li>
													<!--<li><a class="d6" onClick="print_inv();"><span>Print</span></a></li>-->
													<!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
													<li><a class="d8" onclick="close_form();"><span>Close</span></a></li>
												</ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
           

                                                	
  <b>Agent Details</b>
         

<form name="form1" id="form1">            
  <table width="100%" border="0"  class=\"form-matrix-table\">
  <tr>
    <td width="14%"><input type="text"  class="label_purchase" value="Code" disabled/></td>
    <td width="15%"><input type="text" name="txtCODE" id="txtCODE" value="" class="text_purchase3" onkeypress="keyset('txtNAME',event);"  />
      <a href="search_customer.php?mstatus=cus_mast" onClick="NewWindow(this.href,'mywin','800','700','yes','center');return false" onFocus="this.blur()"></a></td>
    <td width="14%"><a href="search_customer.php?mstatus=cus_mast" onclick="NewWindow(this.href,'mywin','800','700','yes','center');return false" onfocus="this.blur()">
      <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" />
    </a></td>
    <td width="12%"><select name="cus_letter" id="cus_letter" onchange="getcode();" class="text_purchase3" style="visibility:hidden;">
      <option value=""></option>
      <option value="A">A</option>
      <option value="B">B</option>
      <option value="C">C</option>
      <option value="D">D</option>
      <option value="E">E</option>
      <option value="F">F</option>
      <option value="G">G</option>
      <option value="H">H</option>
      <option value="I">I</option>
      <option value="J">J</option>
      <option value="K">K</option>
      <option value="L">L</option>
      <option value="M">M</option>
      <option value="N">N</option>
      <option value="O">O</option>
      <option value="P">P</option>
      <option value="Q">Q</option>
      <option value="R">R</option>
      <option value="S">S</option>
      <option value="T">T</option>
      <option value="U">U</option>
      <option value="V">V</option>
      <option value="W">W</option>
      <option value="X">X</option>
      <option value="Y">Y</option>
      <option value="Z">Z</option>
    </select></td>
    <td width="16%"><input type="text"  class="label_purchase" value="Contact Person" disabled="disabled"/></td>
    <td width="13%"><input id="txtCONT" name="txtCONT" type="text" onkeypress="keyset('txtLABLI',event);" class="text_purchase3" /></td>
    <td width="12%">&nbsp;</td>
    <td width="3%">&nbsp;</td>
    <td width="1%">&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text"  class="label_purchase" value="Name" disabled="disabled"/></td>
    <td colspan="3"><input id="txtNAME" name="txtNAME" type="text" class="text_purchase3"  onkeypress="keyset('txtADD1',event);"/></td>
    <td><input type="text"  class="label_purchase" value="Labour Li. No" disabled="disabled"/></td>
    <td><input id="txtLABLI" name="txtLABLI" type="text" onkeypress="keyset('txtOPBAL',event);" class="text_purchase3" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><input type="text"  class="label_purchase" value="Address" disabled="disabled"/></td>
    <td colspan="3"><input id="txtADD1" name="txtADD1" type="text"  value="" class="text_purchase3" onkeypress="keyset('txtCONT',event);"/></td>
    <td><input type="text"  class="label_purchase" value="Check Med Limit" disabled="disabled"/></td>
    <td width="13%"><input type="checkbox" name="Check1" id="Check1" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

  
  <br/>   
<b>Financial Infomation</b>
   	<table width="100%" border="0"  class="\&quot;form-matrix-table\&quot;">
      <tr>
        <td width="14%"><input type="text"  class="label_purchase" value="Opening Balance" disabled="disabled"/></td>
        <td width="15%"><input type="text" name="txtOPBAL" id="txtOPBAL" value="" class="text_purchase3" onkeypress="keyset('txtOPDATE',event);"  /></td>
        <td width="14%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="14%"><input type="text"  class="label_purchase" value="Current Balance" disabled="disabled"/></td>
        <td width="13%"><input id="txTCUR_BAL" name="txTCUR_BAL" type="text" onkeypress="keyset('txtLIMIT',event);" class="text_purchase3" /></td>
        <td width="12%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Opening Date" disabled="disabled"/></td>
        <td><input id="txtOPDATE" name="txtOPDATE" type="text" class="text_purchase3" onkeypress="keyset('txTCUR_BAL',event);"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><input type="text"  class="label_purchase" value="Credit Limit" disabled="disabled"/></td>
        <td><input id="txtLIMIT" name="txtLIMIT" type="text" onkeypress="keyset('txtTELE',event);" class="text_purchase3" /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>

  
           <br> 
            
           <b>Contact Details</b>
   	<table width="100%" border="0"  class="\&quot;form-matrix-table\&quot;">
      <tr>
        <td width="14%"><input type="text"  class="label_purchase" value="Telephone" disabled="disabled"/></td>
        <td width="15%"><input type="text" name="txtTELE" id="txtTELE" value="" class="text_purchase3" onkeypress="keyset('txtFAX',event);"  /></td>
        <td width="14%">&nbsp;</td>
        <td width="14%">&nbsp;</td>
        <td width="14%"><input type="text"  class="label_purchase" value="E-Mail" disabled="disabled"/></td>
        <td width="13%"><input id="TXTEMAIL" name="TXTEMAIL" type="text" onkeypress="keyset('department',event);" class="text_purchase3" /></td>
        <td width="12%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="1%">&nbsp;</td>
      </tr>
      <tr>
        <td><input type="text"  class="label_purchase" value="Fax" disabled="disabled"/></td>
        <td><input id="txtFAX" name="txtFAX" type="text" class="text_purchase3" onkeypress="keyset('TXTEMAIL',event);"/></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
</form>        

    

   </div>
                        </section>
                        