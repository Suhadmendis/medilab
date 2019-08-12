<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php
/* if($_SESSION["login"]!="True")
  {
  header('Location:./index.php');
  } */

$_SESSION["page_name1"] = "Data Capture";
$_SESSION["page_name2"] = "Lab Report";


/* if($_SESSION["login"]!="True")
  {
  header('Location:./index.php');
  } */


//include('header_footer.php');
//require_once("config.inc.php");
//require_once("DBConnector.php");

include_once 'connection.php';

date_default_timezone_set('Asia/Colombo');
?>



<script language="JavaScript" src="js/pur_ord.js"></script>
<link rel="stylesheet" href="css/table.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>
<script type="text/javascript" language="javascript" src="js/datepickr.js"></script>
<script language="JavaScript" src="js/sel_item.js"></script>
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

</label>

<style type="text/css">
    <!--
    .style1 {font-weight: bold}
    -->
</style>
<script type="text/javascript">
    window.onload = function () {
        new JsDatePick({
            useMode: 2,
            target: "dte_from",
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
    <div id="maindiv">       
        <div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
            <!--[if !IE]>start dashboard menu<![endif]-->
            <ul class="dashboard_menu">


        <!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
                <li><a class="d8" onclick="close_form();"><span>Close</span></a></li>


            </ul>
            <!--[if !IE]>end dashboard menu<![endif]-->
        </div>
        <hr />


        <form id="form1" name="form1" action="report_fitunfit_summery.php" target="_blank" method="get">
            <table border="0">

               


                <tr>  
                    <td colspan="2">&nbsp;
                    </td>
                    <td colspan="2">&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan='2' width="200">From
                        <input type="text" size="10" name="dte_from" value="<?php echo date('Y-m-d'); ?>"   onfocus="load_calader('dte_from');"   id="dte_from" value="" class="text_purchase3"/></td>
                    <td width="200">To<input type="text" size="10" name="dte_to" value="<?php echo date('Y-m-d'); ?>" onfocus="load_calader('dte_to');"   id="dte_to" value="" class="text_purchase3"/>
                    </td>
                </tr>

                <tr>  
                    <td colspan="2"> Status
                    </td>
                    <td colspan="2"><select name="typeg" id="typeg" class="text_purchase3" >
                            <option value='FIT'>FIT</option>
                            <option value='UNFIT'>UNFIT</option>
                        </select>
                    </td>
                </tr>


                <tr>  
                    <td colspan="2"> Country
                    </td>
                    <td colspan="2"><select name="txt_countna" id="txt_countna" class="text_purchase3" onkeypress="keyset('cmbmr', event);">
                            <option value=""></option>
                            <?php
                            $sql_rst = "select * from country order by CODE";
                            $result_rst = mysql_query($sql_rst, $dbinv);
                            while ($row_rst = mysql_fetch_array($result_rst)) {
                                echo "<option value=" . $row_rst["CODE"] . ">" . $row_rst["COUNTRY"] . "</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>  
                    <td colspan="2">&nbsp;</td>
                    <td colspan="2">&nbsp;
                    </td>
                </tr>
                
                <tr>  
                    <td colspan="2"><input type="submit" name="button" id="button" value="View" class="btn_purchase1"/></td>
                    <td colspan="2">&nbsp;
                    </td>
                </tr>
            </table>
            <fieldset>               


        </form>        

    </div>
</section>          


