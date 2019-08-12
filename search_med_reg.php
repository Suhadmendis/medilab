<?php
session_start();
date_default_timezone_set('Asia/Colombo');
include_once("connection_i.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


        <link href="admin_min.css" rel="stylesheet" type="text/css" media="screen" />


        <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>


        <title>Search Channeling</title>

        <script language="JavaScript" src="js/medical_reg.js"></script>
        <link rel="stylesheet" href="css/table_min.css" type="text/css"/>

        <style type="text/css">

            /* START CSS NEEDED ONLY IN DEMO */
            html{
                height:100%;
            }


            #mainContainer{
                width:700px;
                margin:0 auto;
                text-align:left;
                height:100%;
                background-color:#FFF;
                border-left:3px double #000;
                border-right:3px double #000;
            }
            #formContent{
                padding:5px;
            }
            /* END CSS ONLY NEEDED IN DEMO */


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
        </style>
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

    </head>

    <body>
        <div id="textt" name="textt">
            <p>Medical Registy List <?php echo date("Y-m-d"); ?></p>
        </div>
        <table width="735" border="0">

            <tr>					
                <?php
                $stname = "";
                ?>

                <td width="122"  background="" ><input type="text" size="20" name="invno" id="invno" value="" class="txtbox"  onkeyup="<?php echo "update_list('$stname')"; ?>"/></td>
                <td width="603"  background="" ><input type="text" size="70" name="customername" id="customername" value="" class="txtbox" onkeyup="<?php echo "update_list('$stname')"; ?>"/></td>
                <td width="603"  background="" ><input type="text" size="29" name="invdate" id="invdate" value="" class="txtbox"/></td>

            </tr>  </table>   

        <input type="text" id="sdate" name="sdate" value="<?php echo date("Y-m-d"); ?>"  onfocus="load_calader('sdate');"   />
        <button onclick="update_list();">Refresh</button>

        <div class="CSSTableGenerator" id="filt_table">  <table width="735" border="0" class=\"form-matrix-table\">
                <tr>
                    <td width="121"  background="" ><font color="#FFFFFF">Seri.No</font></td>
                    <td width="176"  background=""><font color="#FFFFFF">PP. No</font></td>
                    <td width="426"  background=""><font color="#FFFFFF">Name</font></td>
                    <td width="176"  background=""><font color="#FFFFFF">Age</font></td>

                </tr>
                <?php
                $sdate = date('Y-m-d');

                $sql = "select * from rege where SDATE ='" . $sdate . "'  ORDER BY SERI_NO";


                $result = mysqli_query($GLOBALS['dbinv'], $sql);
                while ($row = mysqli_fetch_array($result)) {

                    echo "<tr><td onclick=\"med_reg('" . $row['DREFNO'] . "');\">" . $row['SERI_NO'] . "</a></td>";
                    echo "<td onclick=\"med_reg('" . $row['DREFNO'] . "');\">" . $row["PA_NO"] . "</a></td>";
                    echo "<td onclick=\"med_reg('" . $row['DREFNO'] . "');\">" . $row["initial"] . " " . $row["NAME"] . "</a></td>";
                    echo "<td onclick=\"med_reg('" . $row['DREFNO'] . "');\">" . $row['AGE_Y'] . "</a></td>
                          </tr>";
                }
                mysqli_close($GLOBALS['dbinv']);
                ?>
            </table>
        </div>

    </body>
</html>
