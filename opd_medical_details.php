<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php 
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="OPD Medical";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	

date_default_timezone_set('Asia/Colombo');
include 'connection_i.php';
?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	

 <script language="JavaScript" src="js/opd_medical.js"></script>

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
    calcc();
// -->
</script>

 
<section id="main" class="column" >  
<div id="maindiv" >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
                                                        <li><a class="d2" onClick="new_inv();" ><span style="margin-left:-10px;">New</span></a></li>

                                                        <li><a class="d4" onClick="save_inv();"><span style="margin-left:-10px;">Save</span></a></li>

                                                        <?php
                                                        $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='OPD Medical' and grp='Data Capture' and admin=1";
                                                        $result = mysqli_query($GLOBALS['dbinv'], $sql);
                                                        if ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <li><a class="d5" onClick="cancel_inv();" ><span style="margin-left:-10px;">Cancel</span></a></li>
                                                            <?php
                                                        }
                                                        ?>
                                                        <li><a class="d6" onClick="print_inv();"><span style="margin-left:-10px;">Print</span></a></li>
                                                        <!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
                                                        <li><a class="d8" onclick="close_form();"><span style="margin-left:-10px;">Close</span></a></li>


                                                    </ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
           

    <form name="form1" id="form1">            
        <table width="92%" border="0"  class=\"form-matrix-table\">
            <tr>
                <td width="13%"><input type="text"  class="label_purchase" value="Entry date" disabled/></td>
                <td width="13%"><input type="text" name="entdate" id="entdate" disabled value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  />
                    <a href="search_opd.php" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onFocus="this.blur()"></a>                </td>
                <td width="6%"><a href="search_opd.php" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                  <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" />
                </a></td>
              <input type="hidden" id="count" name ="count" value="0"/>

            <input type="hidden" id="tmpno" name ="tmpno" value="0"/>

            <input type="hidden" id="fileno" name ="fileno" value="0"/>

            <td width="17%"><input type="text"  class="label_purchase" value="Ref No" disabled="disabled"/></td>
            <td width="38%"><input type="text" name="refno" id="refno" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td width="15%" colspan="5">


                <select name="test_grp" onclick="getdata();" id="test_grp" class="text_purchase3">
                    <?php
                    $sql = "select bgroup from lab_test group by bgroup";
                    echo "<option value='All'>All</option>";
                    
                    $result = mysqli_query($GLOBALS['dbinv'], $sql);
                    while ($rowa = mysqli_fetch_array($result)) {
                        echo "<option value='" . $rowa['bgroup'] . "'>" . $rowa['bgroup'] . "</option>";
                    }
                    ?>
                </select>            </td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Time" disabled="disabled"/></td>
                <td colspan="2"><input type="text" name="time" id="time" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
                <td><input type="text"  class="label_purchase" value="Serial No" disabled="disabled"/></td>
                <td><input id="serino" name="serino" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td width="15%" colspan="5" rowspan="16" valign="top">
                    <div class="CSSTableGenerator" id="itemdetails1">
                        <?php
                        echo "<select multiple=\"multiple\" name=\"selectedit\"  onKeyPress=\"add_me(this,event);\"  id=\"selectedit\" size=\"5\"   >";


                        $sql = "select distinct code, testname from lab_test ";
                         
                        $sql .= " order by testname";

                        $result = mysqli_query($GLOBALS['dbinv'], $sql);
                        while ($row = mysqli_fetch_array($result)) {
                             echo "<option id=" . $row["code"] . " value=" . $row["code"] . " ondblclick=\"add_tmp('" . $row['code'] . "');\">" . $row["testname"] . "</option>";
                        }
                        echo "</select>";
                        
                       ?>
                    </div>
                    
                    <div class="CSSTableGenerator" id="itemdetails">
                        <table>
                            <tr>
                                <td width="10%" >Test Name</td>
                                <td width="10%" >Amount</td>
                                <td width="10%" >Discount</td>
                                <td width="10%" >Net</td>
                            </tr>
                        </table>
                    </div>    </td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Doctor" disabled="disabled"/></td>
                <td colspan="4">
                	<select name="doctor" id="doctor" name="doctor"   class="text_purchase3">
                        <?php
                        $sql = "select code, name from docmas group by code, name";
                        
                         
                        $result = mysqli_query($GLOBALS['dbinv'], $sql);
                        while ($rowa = mysqli_fetch_array($result)) {
                            echo "<option value = '". $rowa['name'] .  "'>" .  $rowa['name'] .  "</option>";  
                        }
                        ?>


                    </select>                </td>
            </tr>

            <tr>
                <td><input type="text"  class="label_purchase" value="Patient Name" disabled="disabled"/></td>
                <td colspan="2">
                    <select name="ini" id="ini" onclick="genderc();" class="text_purchase3">
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
                    </select>                </td>
                <td colspan="2"><input id="name" name="name" type="text"  value="" class="text_purchase2" /> 
                    <a href="search_pareg.php?stname=opd" onClick="NewWindow(this . href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onFocus="this.blur()">
                        <input type="button" name="searchinv1" id="searchinv1" value="..." class="btn_purchase1" >
                    </a>                </td>
            </tr>
            <tr>
                <td height="24"><input type="text"  class="label_purchase" value="Address" disabled="disabled"/></td>
                <td colspan="4"><input id="add" name="add" type="text"  value="" class="text_purchase3" /></td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Tele No" disabled="disabled"/></td>
                <td colspan="3"><input id="tele" name="tele" type="text"  value="" class="text_purchase3" /></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Remark" disabled="disabled"/></td>
                <td colspan="4"><input id="remark" name="remark" type="text"  value="" class="text_purchase3" /></td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Age" disabled="disabled"/></td>
                <td colspan="2"><input id="age" name="age" type="text"  value="" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Sex" disabled="disabled"/></td>
                <td> 
                    <select name="sex" id="sex" class="text_purchase3">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>                </td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Pay Type" disabled="disabled"/>                </td>
                <td colspan="2">
                    <select name="paytype" id="paytype" class="text_purchase3">
                        <option value="CASH">CASH</option>
                        <option value="CARD">CARD</option> 
                    </select>                </td>
                <td><input type="text"  class="label_purchase" value="Paid" disabled="disabled"/></td>
                <td><input id="cash" name="cash" type="text"  value="" class="text_purchase3" /></td>
            </tr>
             
             
            <tr>
                <td><input type="text"  class="label_purchase" value="Delivery Time" disabled="disabled"/></td>
                <td colspan="2"><input id="deltime" name="deltime" type="text"  value="" class="text_purchase3" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Collected Time" disabled="disabled"/></td>
                <td colspan="2"><input id="coltime" name="coltime" type="text"  value="" class="text_purchase3" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Collected by" disabled="disabled"/></td>
                <td colspan="2"><input id="colby" name="colby" type="text"  value="" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Discount" disabled="disabled"/></td>
                <td><input id="disc" name="disc" type="text" disabled value="" class="text_purchase3" /></td>
            </tr>
        </table>






  </form>        
    <script>
        new_inv();
    </script>
</div>
                        </section>          
