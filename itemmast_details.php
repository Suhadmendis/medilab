<link media="screen" rel="stylesheet" type="text/css" href="css/admin_min.css"  />
<?php  session_start();
/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

$_SESSION["page_name1"]="Data Capture";
$_SESSION["page_name2"]="Item Master File";


/*if($_SESSION["login"]!="True")
{
	header('Location:./index.php');
}*/

	
include('header_footer.php');



//require_once("config.inc.php");
//require_once("DBConnector.php");

include_once 'connection_i.php';

date_default_timezone_set('Asia/Colombo');
?>		






<link rel="stylesheet" href="css/table.css" type="text/css"/>	
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>

<script type="text/javascript" language="javascript" src="js/get_cat_description.js"></script>

<script language="JavaScript" src="js/search_item.js"></script>
<script language="JavaScript" src="js/item_data.js"></script>

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

<!-- End of Dynamic list area -->
</label>

<style type="text/css">
    <!--
    .style1 {font-weight: bold}
    -->
</style>
<section id="main" class="column" >  
<div id="maindiv" style="padding-left:10px; padding-top:10px;" >       
<div class="sct_right"><!--<button type=button style="background: #555 url(images/icn_alert_warning.png) no-repeat center; padding: 0.5em 1em; color:#FFFFFF" onclick="">Save</button>-->
												<!--[if !IE]>start dashboard menu<![endif]-->
												<ul class="dashboard_menu">
													<li><a class="d2" onClick="new_item();" ><span>New</span></a></li>
													<li><a class="d4" onClick="save_item();"><span>Save</span></a></li>
													<li><a class="d5" onClick="delete_item();" ><span>Cancel</span></a></li>
												
													<!--<li><a href="#" class="d7"><span>Delete</span></a></li>-->
													<li><a class="d8" onclick="close_form();"><span>Close</span></a></li>
													
													
												</ul>
											  <!--[if !IE]>end dashboard menu<![endif]-->
											</div>
      <hr />
</br>        

    <form name="form1" id="form1">

        <table border="0">
            <tr>
                <td><input type="text"  class="label_purchase" value="Stock No (Code)" disabled/></td>
                <td><input type="text" name="txtSTK_NO" id="txtSTK_NO" value="" class="text_purchase3" onKeyPress="keyset('txtDESCRIPTION', event);" disabled /></td>
                <td><a href="search_stock.php" onClick="NewWindow(this.href, 'mywin', '800', '700', 'yes', 'center');
                        return false" onFocus="this.blur()">
                        <input type="button" name="searchinv2" id="searchinv2" value="..." class="btn_purchase1" >
                    </a></td>
            </tr>


            <tr>
                <td ><input type="text"  class="label_purchase" value="Description" disabled/></td>
                <td colspan="2"><input type="text" name="txtDESCRIPTION" id="txtDESCRIPTION" value="" class="text_purchase3" onkeypress="keyset('txtBRAND_NAME', event);"    /></td>

            </tr>
            
            
            
            
            <tr>
                <td ><input type="text"  class="label_purchase" value="Group" disabled/></td>
                <td colspan="2">
                    <select id="txtgroup" name='txtgroup'  class="text_purchase3">
                        <option value='Medical'>Medical</option>
                        <option value='Consumer'>Consumer</option>

                    </select>



                </td>

            </tr>




            <tr>
                <td ><input type="text"  class="label_purchase" value="Unit" disabled/></td>
                <td colspan="2"><input type="text" name="txtunit" id="txtunit" value="" class="text_purchase3" onkeypress="keyset('txtCOST', event);"    /></td>

            </tr>

            <tr>
                <td ><input type="text"  class="label_purchase" value="Cost" disabled="disabled"/></td>
                <td><input type="text" class="text_purchase3"  id="txtCOST" name="txtCOST" onkeypress="keyset('txtMARGIN', event);"/></td>
                <td><input type="text"  class="label_purchase" value="Selling" disabled="disabled"/></td>
                <td><input type="text" class="text_purchase3"  id="txtSELLING" name="txtSELLING" onkeypress="keyset('TXTSELLING_DISPLAY', event);"/></td>

            </tr>


        </table>



        <fieldset>               


    </form>        


    <script>
        new_item();
    </script>    
</div>
                        </section>