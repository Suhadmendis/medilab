<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Master Files";
$_SESSION["page_name2"]="Doctor Master File";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	
include './connection.php';
?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>
<script type="text/javascript" language="javascript" src="js/countrymast.js"></script>

<script language="javascript" src="cal2.js">
/*
Xin's Popup calendar script-  Xin Yang (http://www.yxscripts.com/)
Script featured on/available at http://www.dynamicdrive.com/
This notice must stay intact for use
*/
</script>
<script language="javascript" src="cal_conf2.js"></script>
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

<!-- Dynamic List area -->
    
    <script type="text/javascript" src="ajax-dynamic-list.js"></script>
<script type="text/javascript" language="JavaScript1.2" src="ajax.js"></script>





  	
    <style type="text/css">
 	/* Big box with list of options */
	#ajax_listOfOptions{
		position:absolute;	/* Never change this one */
		width:175px;	/* Width of box */
		height:250px;	/* Height of box */
		overflow:auto;	/* Scrolling features */
		border:1px solid #317082;	/* Dark green border */
		background-color:#FFF;	/* White background color */
		text-align:left;
		font-size:0.9em;
		z-index:100;
	}
	#ajax_listOfOptions div{	/* General rule for both .optionDiv and .optionDivSelected */
		margin:1px;		
		padding:1px;
		cursor:pointer;
		font-size:0.9em;
	}
	#ajax_listOfOptions .optionDiv{	/* Div for each item in list */
		
	}
	#ajax_listOfOptions .optionDivSelected{ /* Selected item in the list */
		background-color:#317082;
		color:#FFF;
	}
	#ajax_listOfOptions_iframe{
		background-color:#F00;
		position:absolute;
		z-index:5;
	}
	
	form{
		display:inline;
	}

	#article {font: 12pt Verdana, geneva, arial, sans-serif;  background: white; color: black; padding: 10pt 15pt 0 5pt}
    .style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
    </style>   

<!-- End of Dynamic list area -->
<section id="main" class="column" >  
<div id="maindiv" >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
													<li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>
													
										            <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>
													<li><a class="d5" onClick="cancel_inv();" ><span>Cancel</span></a></li>
													<li><a class="d6" onClick="print_inv();"><span>Print</span></a></li>
													<!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
													<li><a class="d8" onclick="close_form();"><span>Close</span></a></li>
												</ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />

         

<form name="form1" id="form1">            
  <table width="100%" border="0"  class=\"form-matrix-table\">
  <tr>
    <td width="18%"><input type="text"  class="label_purchase" value="Code" disabled/></td>
    <td width="0%"><input type="text"  class="label_purchase" value="Country" disabled="disabled"/></td>
    <td width="18%"><input type="text"  class="label_purchase" value="Country Head" disabled="disabled"/></td>
    <td width="17%"><input type="text"  class="label_purchase" value="Short" disabled="disabled"/></td>
    <td width="29%"><input type="text"  class="label_purchase" value="Reference" disabled="disabled"/></td>
  </tr>
  <tr>
    <td><input type="text" class="text_purchase3"  id="code" name="code" onkeypress="keyset('class', event);" onKeyUp="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
    <td width="0%"><input type="text" class="text_purchase3"  id="country" name="country" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
    <td width="18%"><input type="text" class="text_purchase3"  id="country_head" name="country_head" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
    <td><input type="text" class="text_purchase3"  id="short" name="short" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
    <td><input type="text" class="text_purchase3"  id="reference" name="reference" onkeypress="keyset('class', event);" onkeyup="ajax_showOptionsfname(this,'getCountriesByLetters',event,'ajax-list-brand.php');" onblur="setbrand();"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="18%">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="3">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  </table>

  
  <br/>   
<fieldset>               
            
       
            
  <table width="84%" border="0">
    
  
  <tr>
	<td width="30%" colspan="9">
    <div class="CSSTableGenerator" id="itemdetails" >
<div id="bank_table">
                                    
                                        <table border="1" cellspacing="0">
                                        <?php
										include_once("connection.php");
										
										echo "<tr>
                              <td width=\"100\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Code</font></td>
                              <td width=\"200\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Country</font></td>
							   <td width=\"200\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Country Head</font></td>
							   <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Short</font></td>
                             <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Reference</font></td>
   							</tr>";
                           
										
										$sql="select * from country ORDER BY CODE";
										$result=mysql_query($sql, $dbinv);
										while ($row = mysql_fetch_array($result)){
											
											echo "<tr>
                                            	<td onclick=\"med_mast_ass('".$row['CODE']."', '".$row['COUNTRY']."', '".$row['Head']."', '".$row['SH_CODE']."', '".$row['REF_NO_C']."');\">".$row["CODE"]."</td>
                                            	<td onclick=\"med_mast_ass('".$row['CODE']."', '".$row['COUNTRY']."', '".$row['Head']."', '".$row['SH_CODE']."', '".$row['REF_NO_C']."');\">".$row["COUNTRY"]."</td>
                                           		<td onclick=\"med_mast_ass('".$row['CODE']."', '".$row['COUNTRY']."', '".$row['Head']."', '".$row['SH_CODE']."', '".$row['REF_NO_C']."');\">".$row["Head"]."</td>
												<td onclick=\"med_mast_ass('".$row['CODE']."', '".$row['COUNTRY']."', '".$row['Head']."', '".$row['SH_CODE']."', '".$row['REF_NO_C']."');\">".$row["SH_CODE"]."</td>
												<td onclick=\"med_mast_ass('".$row['CODE']."', '".$row['COUNTRY']."', '".$row['Head']."', '".$row['SH_CODE']."', '".$row['REF_NO_C']."');\">".$row["REF_NO_C"]."</td>";
											
												echo "</tr>";
												
										}
										
										?>
										
                                          
                                        </table>
                                      
                                      </div>   </div>                                                 		</td>
                                                		</tr>
  
  <tr>
    <td width="10%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    </tr>
</table>
          

</form>        


          </div>
                        </section>