<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Patient Registration";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	
//include('header_footer.php');
include_once 'connection_i.php';
date_default_timezone_set('Asia/Colombo');
 
?>	


<link rel="stylesheet" href="css/table_min.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>
<script language="JavaScript" src="js/pateint_reg.js"></script>


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
                                                        <li><a class="d2" onClick="new_inv();" ><span style="margin-left:-10px;">New</span></a></li>

                                                        <li><a class="d4" onClick="save_inv();"><span style="margin-left:-10px;">Save</span></a></li>
                                                        <?php
                                                        $sql = "select * from view_userpermission where username='" . $_SESSION['UserName'] . "' and docname='Patient Registry' and grp='Data Capture' and admin=1";

                                                         
                                                        $result = mysqli_query($GLOBALS['dbinv'], $sql);
                                                        if ($row = mysqli_fetch_array($result)) {
                                                            
                                                            echo "<li><a class=\"d5\" onClick=\"cancel_inv();\" ><span style=\"margin-left:-10px;\">Cancel</span></a></li>";
                                                            
                                                        }
                                                         
                                                        ?>
                                                        <li><a class="d8" onclick="close_form();"><span style="margin-left:-10px;">Close</span></a></li>


                                                    </ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr color="#000000" />
     

    <form name="form1" id="form1">            
        <table width="92%" border="0"  class=\"form-matrix-table\">
            <tr>
                <td width="14%"><input type="text"  class="label_purchase" value="Entry date" disabled/></td>
                <td width="16%"><input type="text" name="entdate" id="entdate" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  />
                    <a href="search_pareg.php?stname=reg" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onFocus="this.blur()"></a>                </td>
                <td width="8%"><a href="search_pareg.php?stname=reg" onclick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                            return false" onfocus="this.blur()">
                <input type="button" name="searchinv" id="searchinv" value="..." class="btn_purchase1" />
                </a></td>
              <input type="hidden" id="count" name ="count" value="0"/>

            <input type="hidden" id="tmpno" name ="tmpno" value="0"/>

            <td width="14%"><input type="text"  class="label_purchase" value="Ref No" disabled="disabled"/></td>
            <td width="13%"><input type="text" name="refno" id="refno" value="" class="text_purchase3" onkeypress="keyset('searchcust', event);"  /></td>
            <td width="35%" colspan="5">            </td>
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
                <td colspan="2"><input id="name" name="name" type="text"  value="" class="text_purchase3" /></td>
            </tr>

            <tr>
                <td height="24"><input type="text"  class="label_purchase" value="Address" disabled="disabled"/></td>
                <td colspan="4"><input id="add" name="add" type="text"  value="" class="text_purchase3" /></td>
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Tele No" disabled="disabled"/></td>
                <td colspan="3"><input id="tele" name="tele" type="text"  value="" class="text_purchase3" /></td>
                <td> </td>
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
        </table>






  </form>        
    <script>
        new_inv();
    </script>
 </div>
                        </section>          
           
