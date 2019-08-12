<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Label Print";


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



<link rel="stylesheet" href="css/table.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>

<script language="JavaScript" src="js/inq.js"></script>

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
<script type="text/javascript">
    function load_calader(tar) {
        new JsDatePick({
            useMode: 2,
            target: tar,
            dateFormat: "%Y-%m-%d"

        });

    }

</script>

<!-- End of Dynamic list area -->
</label>

<style type="text/css">
    <!--
    .style1 {font-weight: bold}
    -->
</style>
<section id="main" class="column" >  
<div id="maindiv"  >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
                                                        <li><a class="d2" onClick="new_inv();" ><span>New</span></a></li>

                                                        
                        
                                                        <li><a class="d8" onclick="close_form();"><span>Close</span></a></li>


                                                    </ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
                  

    <form name="form1" id="form1">

        <table border="0">


            <tr>
                <td ><input type="text"  class="label_purchase" value="Date" disabled="disabled"/></td>
                <td><input type="text" class="text_purchase3"  onclick="load_calader('txtdate');" id="txtdate" value="<?php echo date('Y-m-d'); ?>" name="txtdate" onkeypress="keyset('txtMARGIN', event);"/></td> 
            </tr>
            <tr>
                <td><input type="text"  class="label_purchase" value="Serial No" disabled/></td>
                <td><input type="text" name="txtserino" id="txtserino" onkeydown="update_list();" onkeyup="update_list();" value="" class="text_purchase3" onKeyPress="update_list();"  /></td>
                <td></td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>

            <tr>
                <td><input type="text"  class="label_purchase" value="Patient Name" disabled="disabled"/></td>
                <td>
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
                    </select>

                </td>
                <td colspan="2"><input id="name" name="name" type="text"  value="" class="text_purchase3" /></td>
            </tr>


            <tr>
                <td><input type="text"  class="label_purchase" value="Age" disabled="disabled"/></td>
                <td><input id="age" name="age" type="text"  value="" class="text_purchase3" /></td>
                <td><input type="text"  class="label_purchase" value="Sex" disabled="disabled"/></td>
                <td> 
                    <select name="sex" id="sex" class="text_purchase3">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </td>
            </tr>




            <tr>
                <td colspan='2'><div id='itemdetal' name='itemdetal'></div></td>
                <td colspan='2'><div id='availab' name='availab'></div></td>
            </tr>

            <tr>
                <td colspan='2'></td>
                <td colspan='2'><a onclick='print_me();'class="btn_purchase1" />Print</a></td>
            </tr>

        </table>








        <fieldset>               


    </form>        


    <script>
        new_item();
    </script>    
 </div>
                        </section>          