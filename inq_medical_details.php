<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Patient History";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	
//include('header_footer.php');



//require_once("config.inc.php");
//require_once("DBConnector.php");

include_once 'connection_i.php';

date_default_timezone_set('Asia/Colombo');
?>


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>


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
<script type="text/javascript">
    function load_calader(tar) {
        new JsDatePick({
            useMode: 2,
            target: tar,
            dateFormat: "%Y-%m-%d"

        });

    }

</script>
<section id="main" class="column" >  
<div id="maindiv" >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
                                                    

                                                        <li><a class="d8" onclick="close_form();"><span>Close</span></a></li>


                                                    </ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />

<form name="form1" id="form1">
  <table width="1033" border="0">
          <tr>
            <td width="132"><input type="text"  class="label_purchase" value="Passport No" disabled="disabled"/></td>
            <td width="50"><a href="search_med_inq.php?stname=inq_med" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="button" name="searchinv2" id="searchinv2" value="..." class="btn_purchase1" />
            </a></td>
            <td width="120">
              <input type="text" name="txt_pano" id="txt_pano" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  />
            </td>
            <td width="132"><input type="text"  class="label_purchase" value="C.M.B.No" disabled="disabled"/></td>
            <td width="129"><input type="text" name="lblcmb" id="lblcmb" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td width="132"><input type="text"  class="label_purchase" value="E No" disabled="disabled"/></td>
            <td width="129"><input type="text" name="txteno" id="txteno" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td width="122"><input type="text"  class="label_purchase" value="Sub Name" disabled="disabled"/></td>
            <td width="67"><input type="text" name="txtsubno" id="txtsubno" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
          </tr>
          <tr>
            <td><input type="text"  class="label_purchase" value="Date" disabled="disabled"/></td>
            <td>&nbsp;</td>
            <td><input type="text" name="lbldate" id="lbldate" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><input type="text"  class="label_purchase" value="S No" disabled="disabled"/></td>
            <td><input type="text" name="lblserino" id="lblserino" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><input type="text"  class="label_purchase" value="XRay No" disabled="disabled"/></td>
            <td><input type="text" name="lblxrayno" id="lblxrayno" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
      </tr>
          <tr>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="text"  class="label_purchase" value="Name" disabled="disabled"/>
            </a></td>
            <td colspan="8"><input type="text" name="lblname" id="lblname" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
          </tr>
          <tr>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="text"  class="label_purchase" value="Status" disabled="disabled"/>
            </a></td>
            <td colspan="2"><input type="text" name="txtstat" id="txtstat" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><input type="text"  class="label_purchase" value="Sex" disabled="disabled"/></td>
            <td><input type="text" name="txtsex" id="txtsex" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><input type="text"  class="label_purchase" value="GAMCA No" disabled="disabled"/></td>
            <td colspan="2"><input type="text" name="lblGAMCANo" id="lblGAMCANo" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="text"  class="label_purchase" value="Agency" disabled="disabled"/>
            </a></td>
            <td colspan="8"><input type="text" name="lblagen" id="lblagen" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
          </tr>
          <tr>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="text"  class="label_purchase" value="Age" disabled="disabled"/>
            </a></td>
            <td colspan="2"><input type="text" name="lblage" id="lblage" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="text"  class="label_purchase" value="Cust Remark" disabled="disabled"/>
            </a></td>
            <td colspan="5"><input type="text" name="lblcus_remark" id="lblcus_remark" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
          </tr>
          <tr>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
              <input type="text"  class="label_purchase" value="Doctor" disabled="disabled"/>
            </a></td>
            <td colspan="5"><input type="text" name="Text1" id="Text1" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
            <input type="text"  class="label_purchase" value="Religon" disabled="disabled"/>
            </a></td>
            <td colspan="2"><select name="cmdbreligon" id="cmdbreligon" class="text_purchase3">
              <option value="Male">Buddhist</option>
              <option value="Muslim">Muslim</option>
              <option value="Hindu">Hindu</option>
              <option value="Christian">Christian</option>
              <option value="Others">Others</option>
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5"><input type="text" name="Text2" id="Text2" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
            <input type="text"  class="label_purchase" value="Position Applied" disabled="disabled"/>
            </a></td>
            <td colspan="2"><select name="txtPOS_APP" id="txtPOS_APP" class="text_purchase3">
              <option value=""></option>
            
            </select></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5"><input type="text" name="Text3" id="Text3" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td><a href="search_pareg.php?stname=his" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
            <input type="text"  class="label_purchase" value="Telephone" disabled="disabled"/>
            </a></td>
            <td colspan="2"><input type="text" name="txttel" id="txttel" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5"><input type="text" name="Text4" id="Text4" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td colspan="5"><input type="text" name="Text5" id="Text5" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
  <hr />
  <table width="1000" border="0">
  
 
     
  </table>
  <table width="150" border="0">
      <TR>
           <td rowspan="5" valign="top"><div id="med_photo" style="border:thick; border:#000000; height:150px; background-color:#CCCCCC "> </div></td> 
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
      </TR>
   
  </table>
  <p>&nbsp;</p>
</form>        
    <script>
        new_inv();
    </script>
 </div>
                        </section>          
