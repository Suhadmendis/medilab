<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Invoice";


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

<script language="JavaScript" src="js/inv.js"></script>

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
            target: "dte_dor",
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
													<li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>
										                        <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>
                                                                                                        <li><a onClick="cancel_inv();" class="d7"><span>Delete</span></a></li>
                                                                                                        <li><a class="d6" onclick="print_inv();"><span>Print</span></a></li>
													<li><a class="d8" onclick="close_form();"><span>Close</span></a></li>
													
													
												</ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
          
                  
       

    <form name="form1" id="form1"> 


        <input type="hidden" name="tmpno" id="tmpno" value="0"/>

        <table width="100%" border="0"  class=\"form-matrix-table\">
            <tr>
                <td width="10%" bgcolor="#00CCCC"><label>
                        <input type="radio" name="paymethod" value="credit" id="paymethod_0" />
                        Credit</label></td>
                <td width="10%"  bgcolor="#00CCCC"><label>
                        <input type="radio" name="paymethod" value="cash" id="paymethod_1" />
                        Cash</label></td>
                <td width="10%">&nbsp;</td>
                <td width="10%"></td>
                <td width="10%"></td>
                <td width="10%"><input type="text"  class="label_purchase" value="Date" disabled="disabled"/>
                </td>
                <td width="10%"><input type="text" size="20" name="invdate" id="invdate" value="<?php echo date("Y-m-d"); ?>"  onfocus="load_calader('invdate');" class="text_purchase3"/></td>
                <td width="10%"></td>
                <td width="10%">&nbsp;</td>
            </tr>
            <tr>
                <td><input id="dte_dor" name="dte_dor" type="hidden"  value="" class="text_purchase3" /></td>
                <td colspan="3"><input type="hidden" name="hiddencount" id="hiddencount" /></td>
                <td> </td>
                <td><input type="text"  class="label_purchase" value="Department" disabled/></td>
                <td><select name="department" id="department" onkeypress="keyset('brand', event);" class="text_purchase3" >
                        <?php
                        $sql = "select * from s_stomas order by CODE";
                        $result = mysqli_query($GLOBALS['dbinv'], $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row["CODE"] . "'>" . $row["CODE"] . " " . $row["DESCRIPTION"] . "</option>";
                        }
                        ?>
                    </select></td>
                <td></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Invoice No" disabled/></td>
                <td colspan="3"><input type="text"  class="text_purchase3" name="invno" id="invno"/>
                    <a href="serach_inv.php?stname=inv_mast" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onFocus="this.blur()">
                    <input type="hidden" name="txtdono" id="txtdono" />
                    </a></td>
                <td><a href="serach_inv.php?stname=inv_mast" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                  <input type="button" name="searchcust2" id="searchcust2" value="..."  class="btn_purchase" />
                </a> </td>
              <td> </td>
                <td> </td>
                <td> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Customer" disabled/></td>
                <td colspan="3"><input type="text"  class="text_purchase3" disabled="disabled" name="firstname_hidden" id="firstname_hidden" onblur="custno_ind('')" onkeypress="keyset('department', event);"/>
                    <input type="text" class="text_purchase3" id="firstname" name="firstname" />
                    <a href="" onClick="NewWindow('serach_customer.php', 'mywin', '800', '700', 'yes', 'center');
                            return false" onFocus="this.blur()"></a></td>
                <td><a href="" onclick="NewWindow('serach_customer.php', 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                  <input type="button" name="searchcust" id="searchcust" value="..."  class="btn_purchase" />
                </a> </td>
              <td> </td>
                <td> </td>
                <td> </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Address" disabled/></td>
                <td colspan="2"><input type="text"  class="text_purchase3"  id="cus_address" name="cus_address" /></td>
                <td>&nbsp;</td>
                <td></td>
                <td></td>
                <td> </td>
                <td> </td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td height="41"><input type="text"  class="label_purchase" value="Rep." disabled="disabled"/></td>
                <td><select name="salesrep" id="salesrep" onkeypress="keyset('dte_dor', event);" onblur="setord();" class="text_purchase3">
                        <?php
                        $sql = "select * from s_salrep where cancel='0' order by REPCODE";

                        $result = mysqli_query($GLOBALS['dbinv'], $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row["REPCODE"] . "'>" . $row["REPCODE"] . " " . $row["Name"] . "</option>";
                        }
                        ?>
                    </select></td>
                <td><input type="text"  class="label_purchase" value="Discount 1" disabled="disabled"/></td>
                <td><input type="text" size="5" name="discount_org1" id="discount_org1" value="0" onkeypress="keyset('discount_org2', event);" onblur="calc1_table_discount1();" class="text_purchase3"/></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>&nbsp;</td>
            </tr>
        </table>



        <fieldset>               

            <legend><div class="text_forheader">Item Details</div></legend>            

            <input type="hidden" name="item_count" id="item_count" value="0" />
            <table width="84%" border="0">
                <tr>
                    <td width="14%"><span class="style1">
                            <input type="text"  class="label_purchase" value="Code" disabled/>
                        </span></td>
                    <td  width="1%">&nbsp;</td>
                    <td  width="25%"><span class="style1">
                            <input type="text"  class="label_purchase" value="Description" disabled/>
                        </span></td>
                    <td  width="14%"><span class="style1">
                            <input type="text"  class="label_purchase" value="Rate" disabled/>
                        </span></td>
                    <td  width="14%"><span class="style1">
                            <input type="text"  class="label_purchase" value="Qty" disabled/>
                        </span></td>
                    <td  width="14%"><span class="style1">
                            <input type="text"  class="label_purchase" value="Discount" disabled="disabled"/>
                        </span></td>
                    <td  width="14%"><span class="style1">
                            <input type="text"  class="label_purchase" value="Sub Total" disabled="disabled"/>
                        </span></td>
                    <td  width="4%">&nbsp;</td>
                </tr>
                <tr>
                    <td><font color="#FFFFFF">
                        <div id="test"><font color="#FFFFFF">
                            <input type="text"  class="text_purchase3" name="itemd_hidden" id="itemd_hidden" size="10" onblur='itno_ind();' onkeypress="keyset('qty', event);"    />
                            </font></div>  </font></td>
                    <td><a href="serach_item.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                            <input type="button" name="searchitem" id="searchitem" value="..." class="btn_purchase" />
                        </a></td>
                    <td><font color="#FFFFFF">
                        <input type="text"  class="text_purchase3" id="itemd" name="itemd" disabled="disabled" onkeypress="keyset('rate', event);" />
                        </font><a href="serach_item.php" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                                return false" onFocus="this.blur()"></a></td>
                    <td><font color="#FFFFFF">
                        <input type="text" size="15" name="rate" id="rate" value="" disabled="disabled" class="text_purchase3" onkeypress="keyset('qty', event);"/>
                        <input type="hidden" name="part_no" id="part_no" /> <input type="hidden" name="actual_selling" id="actual_selling" />
                        </font></td>
                    <td><font color="#FFFFFF">
                        <input type="text" size="15" name="qty" id="qty" value="" onblur="calc1();" class="text_purchase3" onkeypress="keyset('additem_tmp', event);"/>
                        </font></td>
                    <td><font color="#FFFFFF">
                        <input type="text" size="15" name="discountper" id="discountper" value="" disabled="disabled" class="text_purchase3" onkeypress="keyset('subtotal', event);"/><input type="hidden" size="15" name="discount" id="discount" value="" disabled class="txtbox" />
                        </font></td>
                    <td><font color="#FFFFFF">
                        <input type="text" size="15" name="subtotal" id="subtotal" value="" class="text_purchase3" disabled="disabled" onkeypress="keyset('additem_tmp', event);"/>
                        </font></td>
                    <td><input type="button" name="additem_tmp" id="additem_tmp" value="Add" onClick="add_tmp();" class="btn_purchase1"></td>
                </tr>
                <tr>
                    <td colspan="7">
                        <div class="CSSTableGenerator" id="itemdetails" >
                            <table>
                                <tr>
                                    <td width="10%"   background="images/headingbg.gif" ><font color="#FFFFFF">Code</font></td>
                                    <td width="40%"  background="images/headingbg.gif"><font color="#FFFFFF">Description</font></td>
                                    <td width="10%"  background="images/headingbg.gif"><font color="#FFFFFF">Rate</font></td>
                                    <td width="10%"  background="images/headingbg.gif"><font color="#FFFFFF">Qty</font></td>
                                    <td width="10%"  background="images/headingbg.gif"><font color="#FFFFFF">Discount</font></td>
                                    <td width="10%"  background="images/headingbg.gif"><font color="#FFFFFF">Sub Total</font></td>
                                </tr>
                            </table>   </div>                                                 		</td>
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
                </tr>
                <tr>
                    <td><span class="style1">
                            <input type="text"  class="label_purchase" value="Stock Level" disabled="disabled"/>
                        </span></td>
                    <td>&nbsp;</td>
                    <td><input type="text" size="5" name="stklevel" id="stklevel" value="" class="text_purchase1"/></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><span class="style1">
                            <input type="text"  class="label_purchase" value="Sub Total" disabled="disabled"/>
                        </span></td>
                    <td><input type="text" size="15" name="subtot" id="subtot" value="0" disabled="disabled" class="text_purchase3"/></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td> </td>
                    <td>&nbsp;</td>
                    <td> </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><span class="style1">
                            <input type="text"  class="label_purchase" value="Discount" disabled="disabled"/>
                        </span></td>
                    <td><input type="text" size="15" name="totdiscount" id="totdiscount" value="0" disabled="disabled"  class="text_purchase3" /></td>
                    <td>&nbsp;</td>
                </tr>

                <tr>
                    <td colspan="3" rowspan="5"><div id="storgrid"></div></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><span class="style1">
                            <input type="text"  class="label_purchase" value="Invoice Total" disabled="disabled"/>
                        </span></td>
                    <td><input type="text" size="15" name="invtot"  id="invtot" value="0" disabled="disabled" class="text_purchase3"/></td>
                    <td>&nbsp;</td>
                </tr>


            </table>


    </form>        

</fieldset>    

<script>
    new_inv();
</script>

  </div>
                        </section>          