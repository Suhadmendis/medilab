<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php
/* if($_SESSION["login"]!="True")
  {
  header('Location:./index.php');
  } */

$_SESSION["page_name1"] = "Data Capture";
$_SESSION["page_name2"] = "Medical Register";


/* if($_SESSION["login"]!="True")
  {
  header('Location:./index.php');
  } */

include('connection.php');

$sql_per = " delete  from  tmp_treatment where user_id='" . $_SESSION["CURRENT_USER"] . "'";
$result_per = mysql_query($sql_per, $dbinv);
?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>
<script type="text/javascript" language="javascript" src="js/medical_reg.js"></script>

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
    function load_calader(tar) {
        new JsDatePick({
            useMode: 2,
            target: tar,
            dateFormat: "%Y-%m-%d"

        });

    }

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
    
    
    .hiddend {
        visibility: hidden; 
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
    .txtop115 {width:100%; height:20px;
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
                <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>
                <li><a class="d5" onClick="cancel_inv();" ><span>Edit</span></a></li>

                <li><a class="d6" onClick="print_inv1();"><span>Print</span></a></li>
                <li><a class="d6" onClick="print_inv_rec();"><span>Print R</span></a></li>

                                                     <!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
                <li><a class="d8" onclick="close_form();"><span>Close</span></a></li>
            </ul>
            <!--[if !IE]>end dashboard menu<![endif]-->
        </div>
        <hr/>

        <form name="form1" id="form1">            
            <table width="100%" border="0"  class=\"form-matrix-table\">
                <tr>
                    <td width="14%"><input type="text"  class="label_purchase" value="Passport No" disabled="disabled"/></td>
                    <td width="15%">
                        <input id="txt_passno" name="txt_passno" type="text" onkeypress="keyset('txt_serino', event);" class="text_purchase3" />
                    </td>
                    <td width="7%"><a href="search_med_reg.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                            <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" />
                        </a></td>
                    <td width="7%"></td>
                    <td width="14%"></td>
                    <td width="14%"><input id="TXTLAB_NO" name="TXTLAB_NO" type="hidden" onkeypress="keyset('price_asiri', event);" class="text_purchase3" />
                        <input type="text"  class="label_purchase" value="Ref. No" disabled="disabled"/></td>
                    <td width="13%"><input id="TXTREFNO" name="TXTREFNO" type="text" onkeypress="keyset('txt_countna', event);" class="text_purchase3" /></td>
                    <td width="8%"><input type="text"  class="label_purchase" value="Photograph" disabled="disabled"/></td>
                    <td width="1%">&nbsp;</td>
                </tr>

                <tr>
                    <td><input type="text"  class="label_purchase" value="Country" disabled="disabled"/></td>
                    <td>
                        <select name="txt_countna" id="txt_countna" class="text_purchase3" onkeypress="keyset('cmbmr', event);">
                            <option value=""></option>
                            <?php
                            $sql_rst = "select * from country order by CODE";
                            $result_rst = mysql_query($sql_rst, $dbinv);
                            while ($row_rst = mysql_fetch_array($result_rst)) {
                                echo "<option value=" . $row_rst["CODE"] . ">" . $row_rst["COUNTRY"] . "</option>";
                            }
                            ?>
                        </select>   </td>
                    <td colspan="2"><input id="txt_count" name="txt_count" type="hidden" onkeypress="keyset('price_asiri', event);" class="text_purchase3" /></td>
                    <td>&nbsp;</td>
                    <td><input type="text"  class="label_purchase" value="Date" disabled="disabled"/></td>
                    <td><input type="text" name="DTPicker1" id="DTPicker1" value="<?php echo date("Y-m-d"); ?>" class="text_purchase3" onkeypress="keyset('searchcust', event);" onfocus="load_calader('DTPicker1');"  /></td>
                    <td rowspan="5" valign="top"><div id="med_photo" style="border:thick; border:#000000; height:150px; background-color:#CCCCCC "> </div></td>
                    <td><input type="hidden"  name="pic" id="pic"     /></td>
                </tr>
                <tr>
                    <td><input type="text"  class="label_purchase" value="First Name" disabled="disabled"/></td>
                    <td><font color="#FFFFFF">
                        <select name="cmbmr" id="cmbmr" class="text_purchase3" onchange="keyset('txt_frname', event);">
                            <option value="MR.">MR.</option>
                            <option value="MS.">MS.</option>
                            <option value="MRS.">MRS.</option>
                            <option value="MISS.">MISS.</option>
                            <option value="MASTER.">MASTER.</option>
                            <option value="BABY.">BABY.</option>
                            <option value="SIS.">SIS.</option>
                            <option value="DR.">DR.</option>
                            <option value="REV.">REV.</option>
                            <option value="MOULAVI.">MOULAVI.</option>
                        </select>
                        </font></td>
                    <td colspan="3"><input id="txt_frname" name="txt_frname" type="text"  value="" class="text_purchase3" onkeypress="keyset('txt_lastname', event);"/></td>
                    <td><input type="text"  class="label_purchase" value="Serial No" disabled="disabled"/></td>
                    <td width="13%" ><input id="txt_serino" name="txt_serino" type="text" onkeypress="keyset('TXTREFNO', event);" class="text_purchase3" /></td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td><input type="text"  class="label_purchase" value="Last Name" disabled="disabled"/></td>
                    <td colspan="4"><input id="txt_lastname" name="txt_lastname" type="text"  value="" class="text_purchase3" onkeypress="keyset('txtPOS_APP', event);"/></td>

                    <td>&nbsp;</td>
                    <td width="13%" >&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><input type="text"  class="label_purchase" value="Position Applied" disabled="disabled"/></td>
                    <td><input id="txtPOS_APP" name="txtPOS_APP" type="text"  value="" class="text_purchase3" onkeypress="keyset('txtPLA_OF_IS', event);"/></td>
                    <td colspan="2">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td></td>
                    <td width="13%" >&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td height="31"><input type="text"  class="label_purchase" value="Place Of Issue" disabled="disabled"/></td>
                    <td><input id="txtPLA_OF_IS" name="txtPLA_OF_IS" type="text"  value="" class="text_purchase3" onkeypress="keyset('cmbnat', event);"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td width="13%" >&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><input type="text"  class="label_purchase" value="Nationality" disabled="disabled"/></td>
                    <td><font color="#FFFFFF">
                        <select name="cmbnat" id="cmbnat" class="text_purchase3" onchange="keyset('txt_rema', event);">
                            <option value="Sri Lankan">Sri Lankan</option>
                        </select>
                        </font></td>
                    <td colspan="2"><input type="text"  class="label_purchase" value="Remark" disabled="disabled"/></td>
                    <td colspan="3"><input id="txt_rema" name="txt_rema" type="text"  value="" class="text_purchase3" onkeypress="keyset('cmbstatus', event);"/></td>
                    <td><input type="button" style="cursor:pointer"  class="sell_search1" name="button" id="button" value="Upload Picture" onclick="NewWindow('upload_image.php?cou=1', 'mywin', '700', '200', 'yes', 'center');
                            return false" /></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><input type="text"  class="label_purchase" value="Status" disabled="disabled"/></td>
                    <td><font color="#FFFFFF">
                        <select name="cmbstatus" id="cmbstatus" class="text_purchase3" onchange="keyset('txtCcode', event);">
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="WIDOWED">WIDOWED</option>
                        </select>
                        </font></td>
                    <td colspan="2">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td colspan="2"><a href = "jn.exe">Thumb Print</a></td>
                    
                </tr>
                <tr>
                    <td><input type="text"  class="label_purchase" value="Agency" disabled="disabled"/></td>
                    <td><input id="txtCcode" name="txtCcode" type="text"  value="" class="text_purchase3" onkeypress="keyset('price_durdance', event);"/></td>
                    <td colspan="3"><input id="txt_agname" name="txt_agname" type="text"  value="" class="text_purchase3" onkeypress="keyset('price_durdance', event);"/></td>
                    <td><a href="search_agent.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                            <input type="button" name="searchinv2" id="searchinv2" value="..." class="btn_purchase1" />
                        </a></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td><input type="text"  class="label_purchase" value="X-Ray No" disabled="disabled"/></td>
                    <td><input id="txt_xrayno" name="txt_xrayno" type="text"  value="" class="text_purchase3" onkeypress="keyset('txt_ag_ye', event);"/></td>
                    <td colspan="2">&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>


            <br/>   
            <fieldset >               

                <table width="100%" border="0">
                    <tr>
                        <td colspan="11"><table width="1000" border="0">
                                <tr>
                                    <td>
                                        <input type="text"  class="label_purchase" value="Age" disabled="disabled"/>                                                        </td>
                                    <td>
                                        <input type="text"  class="text_purchase3" name="txt_ag_ye" id="txt_ag_ye"  onkeypress="keyset('cmbdi', event);"   />
                                    </td>
                                    <td>
                                        <input type="text"  class="label_purchase" value="District" disabled="disabled"/>
                                    </td>
                                    <td>
                                        <select name="cmbdi" id="cmbdi" class="text_purchase3" onchange="keyset('cmbsex', event);">
                                            <option value=""></option>
                                              <option value="COLOMBO">COLOMBO</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"  class="label_purchase" value="Sex" disabled="disabled"/>
                                    </td>
                                    <td>
                                        <select name="cmbsex" id="cmbsex" class="text_purchase3" onchange="keyset('txt_gccno', event);">
                                            <option value="MALE">MALE</option>
                                            <option value="FEMALE">FEMALE</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"  class="label_purchase" value="G.C.C No" disabled="disabled"/>
                                    </td>
                                    <td>
                                        <input type="text"  class="text_purchase3" name="txt_gccno" id="txt_gccno"  onkeypress="keyset('txt_cmbno', event);" />
                                    </td>
                                  
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text"  class="label_purchase" value="Address" disabled="disabled"/>
                                    </td>
                                    <td colspan="9">
                                        <input type="text"  class="text_purchase3" name="txtadd" id="txtadd" size="10" onkeypress="keyset('cmdbreligon', event);"   />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text"  class="label_purchase" value="Religon" disabled="disabled"/>
                                    </td>
                                    <td colspan="2">
                                        <select name="cmdbreligon" id="cmdbreligon" class="text_purchase3" onchange="keyset('txttel', event);">
                                            <option value="Buddhist">Buddhist</option>
                                            <option value="Muslim">Muslim</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Others">Others</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text"  class="label_purchase" value="Telephone" disabled="disabled"/>
                                    </td>
                                    <td>
                                        <input type="text"  class="text_purchase3" name="txttel" id="txttel" size="10" onkeypress="keyset('cmbpackage', event);" />
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7"><fieldset>   <table class="hiddend" width="1000" border="0">

                                    <tr>
                                        <td colspan="4" align="center"><span class="style2">
                                                <input type="text"  class="label_purchase" value="Treatment" disabled="disabled"/>
                                            </span></td>
                                        <td width="83" align="center"></td>
                                        <td width="228"><span class="style1">
                                                <input type="text"  class="label_purchase" value="Payment Type" disabled="disabled"/>
                                            </span></td>
                                        <td width="103"><font color="#FFFFFF">



                                            <select name="cmbpaytype" id="cmbpaytype" class="text_purchase3" onchange="keyset('dfrom', event);">
                                                <option value="CASH">CASH</option>
                                                <option value="CHEQUE">CHEQUE</option>
                                                <option value="CASH/CHEQUE">CASH/CHEQUE</option>
                                                <option value="FOC">FOC</option>
                                            </select>
                                            </font></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4">
                                            <div id="treat_list" style="overflow:scroll;  height:50px" >

<?php
$sql_rst = "select * from tremas order by TDESCRIPT";
$result_rst = mysql_query($sql_rst, $dbinv);
while ($row_rst = mysql_fetch_array($result_rst)) {
    echo "<input type=\"checkbox\" name=\"" . $row_rst["TCODE"] . "\" id=\"" . $row_rst["TCODE"] . "\" onclick=\"treat_tmp_save('" . $row_rst["TCODE"] . "');\" />&nbsp;&nbsp;&nbsp;" . $row_rst["TDESCRIPT"] . "</br>";
}
?>	
                                            </div>        </td>
                                        <td>&nbsp;</td>
                                        <td colspan="2"><table width="342" border="0">
                                                <tr>
                                                    <td width="95"><span class="style2">
                                                            <input type="text"  class="label_purchase" value="Amount" disabled="disabled"/>
                                                        </span></td>
                                                    <td width="237"><font color="#FFFFFF"><font color="#FFFFFF">
                                                        <input type="text"  class="text_purchase3" name="txtamu" id="txtamu" size="10" onkeypress="keyset('range_from', event);"   />
                                                        </font></font></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="style2">
                                                            <input type="text"  class="label_purchase" value="Paid Amount" disabled="disabled"/>
                                                        </span></td>
                                                    <td><font color="#FFFFFF"><font color="#FFFFFF">
                                                        <input type="text"  class="text_purchase3" name="txt_paid" id="txt_paid" size="10" onkeypress="keyset('range_from', event);"   />
                                                        </font></font></td>
                                                </tr>
                                                <tr>
                                                    <td><span class="style2">
                                                            <input type="text"  class="label_purchase" value="Balance" disabled="disabled"/>
                                                        </span></td>
                                                    <td><font color="#FFFFFF"><font color="#FFFFFF">
                                                        <input type="text"  class="text_purchase3" name="txtbal" id="txtbal" size="10" onkeypress="keyset('range_from', event);"   />
                                                        </font></font></td>
                                                </tr>
                                            </table></td>
                                    </tr>
                                    <tr>
                                        <td width="45">&nbsp;</td>
                                        <td width="90">&nbsp;</td>
                                        <td width="12">&nbsp;</td>
                                        <td width="409">&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </fieldset></td>
                    </tr>
                    <tr class="hiddend">
                        <td><span class="style1">
                                <input type="text"  class="label_purchase" value="Cheque No" disabled="disabled"/>
                            </span></td>
                        <td><font color="#FFFFFF"><font color="#FFFFFF">
                            <input type="text"  class="text_purchase3" name="txt_cheno" id="txt_cheno" size="10" onkeypress="keyset('range_from', event);"   />
                            </font></font></td>
                        <td>&nbsp;</td>
                        <td><span class="style1">
                                <input type="text"  class="label_purchase" value="Bank" disabled="disabled"/>
                            </span></td>
                        <td><font color="#FFFFFF"><font color="#FFFFFF">
                            <input type="text"  class="text_purchase3" name="txtbank" id="txtbank"  onkeypress="keyset('range_from', event);"   />
                            </font></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr class="hiddend">
                        <td><span class="style1">
                                <input type="text"  class="label_purchase" value="Cheque Date" disabled="disabled"/>
                            </span></td>
                        <td><font color="#FFFFFF"><font color="#FFFFFF">
                            <input type="text"  class="text_purchase3" name="txt_chdate" id="txt_chdate" size="10" onkeypress="keyset('range_from', event);"   />
                            </font></font></td>
                        <td>&nbsp;</td>
                        <td><span class="style1">
                                <input type="text"  class="label_purchase" value="Chqeque Amount" disabled="disabled"/>
                            </span></td>
                        <td><font color="#FFFFFF"><font color="#FFFFFF">
                            <input type="text"  class="text_purchase3" name="txt_cheamo" id="txt_cheamo" onkeypress="keyset('range_from', event);"   />
                            </font></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                   
                    <tr class="hiddend">
                        <td><span class="style1">
                                <input type="text"  class="label_purchase" value="Cash" disabled="disabled"/>
                            </span></td>
                        <td><font color="#FFFFFF"><font color="#FFFFFF">
                            <input type="text"  class="text_purchase3" name="txt_cas" id="txt_cas" size="10" onkeypress="keyset('range_from', event);"   />
                            </font></font></td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    
                   
                </table>


        </form>        


    </div>
</section>





<script>

    new_inv();

</script>
