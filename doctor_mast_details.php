<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Doctor Master File";


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

<script language="JavaScript" src="js/doctormast.js"></script>

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
    };</script>

<section id="main" class="column" >  
<div id="maindiv">       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
                                                        <li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>

                                                        <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>

                                                        <li><a class="d8" onclick="close_form();"><span>Close</span></a></li>


                                                    </ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
         
    <form name="form1" id="form1">            
        <table width="100%" border="0"  class=\"form-matrix-table\">
            <tr>
                <td width="14%"><input type="text"  class="label_purchase" value="Code" disabled/></td>
                <td width="15%"><input type="text" name="code" id="code" value="" class="text_purchase2" onkeypress="keyset('searchcust', event);"  /></td>
                <td width="14%">&nbsp;</td>
                <td width="14%">&nbsp;</td>
                <td width="14%"><input type="text"  class="label_purchase" value="Tele" disabled="disabled"/></td>
                <td width="13%"><input id="tele" name="tele" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td width="12%">&nbsp;</td>
                <td width="3%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Name" disabled="disabled"/></td>
                <td colspan="3"><input id="name" name="name" type="text" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Fax" disabled="disabled"/></td>
                <td><input id="fax" name="fax" type="text" onkeypress="keyset('department', event);" class="text_purchase3" /></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Address" disabled="disabled"/></td>
                <td colspan="3"><input id="address" name="address" type="text"  value="" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Commission Rate" disabled="disabled"/></td>
                <td width="13%"><input id="com_rate" name="com_rate" type="text" onkeypress="keyset('department', event);" class="text_purchase3" />      </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td> </td>
                <td colspan="3"> </td>
                <td><input type="text"  class="label_purchase" value="Inst. Charge" disabled="disabled"/></td>
                <td width="13%"><input id="hoscharge" name="hoscharge" type="text" onkeypress="keyset('department', event);" class="text_purchase3" />      </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>            
            <tr>
                <td> </td>
                <td colspan="3"> </td>
                <td><input type="text"  class="label_purchase" value="Doctor Charge" disabled="disabled"/></td>
                <td width="13%"><input id="doccharge" name="doccharge" type="text" onkeypress="keyset('department', event);" class="text_purchase3" />      </td>
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


        <legend><div class="text_forheader">Doctor List</div></legend>            

        <table width="84%" border="0">




            <tr>
                <td colspan="5">
                    <div class="CSSTableGenerator" id="itemdetails" style="overflow: scroll; width:1100px;" >
                        <table>
                            <tr>
                                <td width="50"><font color="#FFFFFF">Code</font></td>
                                <td width="200"><font color="#FFFFFF">Name</font></td>
                                <td width="100"><font color="#FFFFFF">Commision</font></td>
                                <td width="100"><font color="#FFFFFF">Doc Charge</font></td>
                                <td width="100"><font color="#FFFFFF">Hos Charge</font></td>
                            </tr>



                            <?php
                            $sql = "select * from docmas order by id desc";

                            $result = mysqli_query($GLOBALS['dbinv'], $sql);
                            while ($row = mysqli_fetch_array($result)) {

                                echo "<tr>               
                              <td onclick=\"docno('" . $row['code'] . "');\">" . $row['code'] . "</a></td>";


                                echo "<td onclick=\"docno('" . $row['code'] . "');\">" . $row["name"] . "</a></td>";

                                echo "<td onclick=\"docno('" . $row['code'] . "');\">" . $row['charges'] . "</a></td>
                                     <td onclick=\"docno('" . $row['code'] . "');\">" . $row['doccharge'] . "</a></td>
                                     <td onclick=\"docno('" . $row['code'] . "');\">" . $row['hoscharge'] . "</a></td>    
                            </tr>";
                            }
                            mysqli_close($GLOBALS['dbinv']);
                            ?>







                        </table>   </div>   </tr>
        </table>


    </form>        

</fieldset>    

</body>
</html>


<script>
    new_inv();
</script>
</div>
                        </section>