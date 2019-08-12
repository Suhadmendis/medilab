<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Lab Test Master File";


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


<section id="main" class="column" >  
<div id="maindiv" >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
                                                        <li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>

                                                        <li><a class="d4" onClick="save_inv();"><span>Save</span></a></li>
                                                        <li><a class="d7" onclick="cancel_inv();"><span>Delete</span></a></li>
                                                        <li><a class="d6" onclick="print_inv();"><span>Print</span></a></li>
                        
                                                        <li><a class="d8" onclick="close_form();"><span>Close</span></a></li>


                                                    </ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
              

    <form name="form1" id="form1">            
        <table width="100%" border="0"  class=\"form-matrix-table\">
            <tr><input type="hidden"  value="0" id="tmpno" name="tmpno"  disabled/>
                <td width="14%"><input type="text"  class="label_purchase" value="Code" disabled/></td>
                <td width="15%"><input type="text" name="code" id="code" value="" class="text_purchase2" onkeypress="keyset('searchcust', event);"  />
                    <a href="search_labtest.php" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onFocus="this.blur()">
                        <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" >
                    </a></td>
                <td width="14%">&nbsp;</td>
                <td width="14%">&nbsp;</td>
                <td width="14%"></td>
                <td width="13%"></td>
                <td width="12%">&nbsp;</td>
                <td width="3%">&nbsp;</td>
                <td width="1%">&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Name" disabled="disabled"/></td>
                <td colspan="3"><input id="name" name="name" type="text" class="text_purchase3" onkeypress="keyset('price', event);" /></td>
                <td><input type="hidden" name="count" value="" id="count"></td>
                <td></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Price" disabled="disabled"/></td>
                <td><input id="price" name="price" type="text"  value="" class="text_purchase3" onkeypress="keyset('test_desc', event);"/></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td></td>
                <td width="13%">   </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><input type="text"  class="label_purchase" value="Group" disabled="disabled"/></td>
                <td><select name="test_grp" id="test_grp" class="text_purchase3">
                    <?php 
                $sql = "select bgroup from lab_test group by bgroup";
                $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
                while ($row=  mysqli_fetch_array($result1)) {
                    echo "<option value='". $row['bgroup'] .  "'>" .  $row['bgroup'] .  "</option>";  
                }
                
                
                    ?>
                     </select>    
                </td>
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
        <fieldset>               

            <legend><div class="text_forheader">Test Details</div></legend>            

            <table   border="0">


                <tr>
                    
                                <td  width="200"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Test Description" disabled="disabled"/>
                                    </span></td>
                                <td width="50"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Unit" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Range From" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Range To" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Under The Range Message" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Exceed the Range Message" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Normal Range" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Female Range From" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Female Range To" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Range Seperator" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Type" disabled="disabled"/>
                                    </span></td>
                                <td width="100"><span class="style1">
                                        <input type="text"  class="label_purchase" value="Underline" disabled="disabled"/>
                                    </span></td>
                                <td width="100">&nbsp;</td>
                            </tr>
                            <tr>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="test_desc" id="test_desc" size="15" onkeypress="keyset('unit', event);"  />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="unit" id="unit" size="10" onkeypress="keyset('range_from', event);"   />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="range_from" id="range_from" size="15" onkeypress="keyset('range_to', event);"  />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="range_to" id="range_to" size="15" onkeypress="keyset('under_range', event);"  />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="under_range" id="under_range" size="15" onkeypress="keyset('exceed_range', event);" />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="exceed_range" id="exceed_range" size="15" onkeypress="keyset('normal_range', event);"  />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="normal_range" id="normal_range" size="15" onkeypress="keyset('female_from', event);" />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="female_from" id="female_from" size="15" onkeypress="keyset('female_to', event);" />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="female_to" id="female_to" size="15" onkeypress="keyset('range_seprater', event);"  />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="range_seprater" id="range_seprater" size="7" onkeypress="keyset('mtype', event);"  />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="mtype" id="mtype" size="7" onkeypress="keyset('underline', event);"   />
                                    </font></font></td>
                                <td><font color="#FFFFFF"><font color="#FFFFFF">
                                    <input type="text"  class="text_purchase3" name="underline" id="underline" size="7" onkeypress="keyset('additem_tmp', event);"  />
                                    </font></font></td>
                                <td><input type="button" name="additem_tmp" id="additem_tmp" value="Add" onclick="add_tmp();" class="btn_purchase1" /></td>
                        
                </tr>

                 
                 

            </table>
             <div  id="itemdetails"   class="CSSTableGenerator" name="itemdetails" style="overflow: scroll; width:1200px;" >
                            <table>
                                <tr>
                                    <td width="200"><font color="#FFFFFF">Test Description</font></td>
                                    <td width="50"><font color="#FFFFFF">Unit</font></td>
                                    <td width="100"><font color="#FFFFFF">Range From</font></td>
                                    <td width="100"><font color="#FFFFFF">Range To</font></td>
                                    <td width="100"><font color="#FFFFFF">Under The Range Message</font></td>
                                    <td width="100"><font color="#FFFFFF">Exceed the Ranger Message</font></td>
                                    <td width="100"><font color="#FFFFFF">Normal Range</font></td>
                                    <td width="100"><font color="#FFFFFF">Female Range From</font></td>
                                    <td width="100"><font color="#FFFFFF">Female Range To</font></td>
                                    <td width="100"><font color="#FFFFFF">Range Seperator</font></td>
                                    <td width="100"><font color="#FFFFFF">Type</font></td>
                                    <td width="100"><font color="#FFFFFF">Underline</font></td>
                                </tr>
                            </table>   </div>
            
            
        </fieldset>

    </form>        


</fieldset>   

</body>
</html>


<script>
    
    new_inv();
</script>
</div>
                        </section>