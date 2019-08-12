<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/
date_default_timezone_set('Asia/Colombo');


$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Test Results Entry";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	
//include('header_footer.php');



//require_once("config.inc.php");
//require_once("DBConnector.php");

include_once 'connection_i.php';

?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>
<script type="text/javascript" language="javascript" src="js/test_result.js"></script>



<script language="javascript" type="text/javascript">
<!--
    /****************************************************
     Author: Eric King
     Url: http://redrival.com/eak/index.shtml
     This script is free to use as long as this info is left in
     Featured on Dynamic Drive script library (http://www.dynamicdrive.com)
     ****************************************************/
    var win = null;
    function NewWindow(mypage, myname, w, h, scroll, pos) {
        if (pos == "random") {
            LeftPosition = (screen.width) ? Math.floor(Math.random() * (screen.width - w)) : 100;
            TopPosition = (screen.height) ? Math.floor(Math.random() * ((screen.height - h) - 75)) : 100;
        }
        if (pos == "center") {
            LeftPosition = (screen.width) ? (screen.width - w) / 2 : 100;
            TopPosition = (screen.height) ? (screen.height - h) / 2 : 100;
        }
        else if ((pos != "center" && pos != "random") || pos == null) {
            LeftPosition = 0;
            TopPosition = 20
        }
        settings = 'width=' + w + ',height=' + h + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',location=no,directories=no,status=no,menubar=no,toolbar=no,resizable=no';
        win = window.open(mypage, myname, settings);
    }
// -->
</script>

<script type="text/javascript">
    function openWin()
    {
        myWindow = window.open('serach_inv.php', '', 'width=200,height=100');
        myWindow.focus();

    }
</script>

<script type="text/javascript">
    window.onload = function () {
        new JsDatePick({
            useMode: 2,
            target: "dte_shedule",
            dateFormat: "%Y-%m-%d"
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


<style>

    .over {

        
        overflow: scroll;
        height: 230px;
    } 
    
    
    
    
    .ls1 {
         width:80px;
    }
    

</style>
<script type="text/javascript">
    function load_calader(tar) {
        new JsDatePick({
            useMode: 2,
            target: tar,
            dateFormat: "%Y-%m-%d"

        });
     load_medis();
    }
     load_medis();
</script>
<section id="main" class="column" >  
<div id="maindiv">       
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
            <input id="tmpno" type='hidden'  name="tmpno" value="" />
                <td width="12%"><input type='hidden'  id='count' value='' /><input type="text"  class="label_purchase" value="Medical Date" disabled/></td>
                <td width="12%"><input id="entdate" onfocus="load_calader('entdate');"  name="entdate" onblur="load_medis();" onclick="load_medis();" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td width="12%"> <a href="search_testent.php" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onFocus="this.blur()">
                        <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" >
                    </a><input type="text" class="label_purchase ls1" value="M .Ref No" disabled="disabled"/></td>
                <td width="12%"><input id="mrefno" name="mrefno" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td  width="26%" rowspan="15" valign="top">
                    <div class="CSSTableGenerator over" id="itemdetails">
                        <table>
                            <tr>
                                <td width="10%" >No</td>
                                <td width="80%" >Name</td>
                            </tr>
                           
                        </table>
                    </div>
                </td>
                <td  rowspan="10" valign="top">
                    <div class="CSSTableGenerator over" id="itemdetails1" name="itemdetails1">
                        <table>
                            <tr>
                                <td width="100%" >Test</td>
                            </tr>
                        </table>
                    </div></td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Time" disabled="disabled"/></td>
                <td><input id="stime" name="stime" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Serial No" disabled="disabled"/></td>
                <td><input id="serino" name="serino" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Entry Date" disabled="disabled"/></td>
                <td><input id="sdate" name="sdate" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Ref No" disabled="disabled"/></td>
                <td><input id="refno" name="refno" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Doctor" disabled="disabled"/></td>
                <td colspan="3"><input id="docctor" name="docctor" type="text"  value="" class="text_purchase3" /></td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>

            <tr>
                <td><input type="text"  class="label_purchase" value="Patient Name" disabled="disabled"/></td>
                <td><input id="ini" name="ini" type="text"  value="" class="text_purchase3" /></td>
                <td colspan="2"><input id="pname" name="pname" type="text"  value="" class="text_purchase3" /></td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td height="24"><input type="text"  class="label_purchase" value="Age" disabled="disabled"/></td>
                <td colspan="3"><input id="age" name="age" type="text"  value="" class="text_purchase1" />
                     
                     </td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Sex" disabled="disabled"/></td>
                <td colspan="2"><input id="sex" name="sex" type="text"  value="" class="text_purchase3" /></td>
                <td>&nbsp;</td>

            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Remark" disabled="disabled"/></td>
                <td colspan="3"><input id="remar" name="remar" type="text"  value="" class="text_purchase3" /></td>
            </tr>
            <tr>
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
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="9">
                    <div class="CSSTableGenerator" id="itemdetails2">
                        <table>
                            <tr>
                                <td width="30%" >Test Description</td>
                                <td width="20%" >Results</td>
                                <td width="10%" >Range From</td>
                                <td width="10%" >Range To</td>
                                <td width="20%" >Message</td>
                                <td width="10%" >Unit</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td width="40%" colspan="5" valign="top">&nbsp;</td>
            </tr>
        </table>






    </form>        


    <script>
    new_inv();
    </script>
    
    </div>
                        </section>          
