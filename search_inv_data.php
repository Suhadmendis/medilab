<?php

session_start();







include_once("connection.php");

if ($_GET["Command"] == "search_inv") {

    $ResponseXML = "";
    //$ResponseXML .= "<invdetails>";



    $ResponseXML .= "<table width=\"735\" border=\"0\" class=\"form-matrix-table\">
                            <tr>
                              <td width=\"220\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Invoice No</font></td>
                              <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Customer</font></td>
							  <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Invoice Date</font></td>
							  <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Invoice Value</font></td>
                             
   							</tr>";

    if ($_GET["mstatus"] == "invno") {
        $letters = $_GET['invno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        //$letters="/".$letters;
        //$a="SELECT * from s_salma where REF_NO like  '$letters%'";
        //echo $a;
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT * from s_salma where CANCELL='0'  and REF_NO like  '$letters%' limit 50") or die(mysqli_error());
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysql_query($GLOBALS['dbinv'], "SELECT * from s_salma where CANCELL='0'  and CUS_NAME like  '$letters%' limit 50") or die(mysqli_error()) or die(mysql_error());
    } else {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysql_query($GLOBALS['dbinv'], "SELECT * from s_salma where CANCELL='0' and CUS_NAME like  '$letters%' limit 50") or die(mysqli_error()) or die(mysql_error());
    }



    while ($row = mysqli_fetch_array($sql)) {
        $REF_NO = $row['REF_NO'];
        $stname = "inv_mast";

        if ($_GET["stname"] == "grn") {

            $ResponseXML .= "<tr>               
                              	<td onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['REF_NO'] . "</a></td>
                              	<td onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row["CUS_NAME"] . "</a></td>
                              	<td onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['SDATE'] . "</a></td>
                                <td onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['GRAND_TOT'] . "</a></td>
                            	</tr>";
        } else {
            $ResponseXML .= "<tr>
                           	  	<td  onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['REF_NO'] . "</a></td>
                              	<td  onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['CUS_NAME'] . "</a></td>
                              	<td  onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['SDATE'] . "</a></td>
                                <td onclick=\"invno('" . $row['REF_NO'] . "', '" . $_GET['stname'] . "');\">" . $row['GRAND_TOT'] . "</a></td>                        	
                            	</tr>";
        }
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}






if ($_GET["Command"] == "pass_invno") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $brand = "";
    $salrep = "";
    $cuscode = "";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $inv = $_GET['invno'];



    $sql = mysqli_query($GLOBALS['dbinv'], "SELECT * from invpara") or die(mysqli_error());
    $row_invpara = mysqli_fetch_array($sql);



    $sql = mysqli_query($GLOBALS['dbinv'], "Select * from s_salma where REF_NO='" . $inv . "'") or die(mysqli_error());

    if ($row = mysqli_fetch_array($sql)) {

        $sdate = $row['SDATE'];
        $ResponseXML .= "<str_invoiceno><![CDATA[" . $row['REF_NO'] . "]]></str_invoiceno>";
        $ResponseXML .= "<tmp_no><![CDATA[" . $row['tmp_no'] . "]]></tmp_no>";
        $ResponseXML .= "<SDATE><![CDATA[" . $row['SDATE'] . "]]></SDATE>";
        $ResponseXML .= "<str_crecash><![CDATA[" . $row['TYPE'] . "]]></str_crecash>";
        $cuscode = $row['C_CODE'];
        $ResponseXML .= "<str_customecode><![CDATA[" . $row['C_CODE'] . "]]></str_customecode>";
        $_SESSION["tmp_no_salinv"] = $row['tmp_no'];

        $ResponseXML .= "<str_customername><![CDATA[" . $row['CUS_NAME'] . "]]></str_customername>";

        $sql_mas = mysqli_query($GLOBALS['dbinv'], "Select * from vendor where CODE='" . $row['C_CODE'] . "'") or die(mysqli_error());
        $row_mas = mysqli_fetch_array($sql_mas);


        $ResponseXML .= "<str_address><![CDATA[" . $row_mas['ADD1'] . "]]></str_address>";
        $ResponseXML .= "<str_address2><![CDATA[" . $row_mas['ADD2'] . "]]></str_address2>";



        $ResponseXML .= "<str_salesrep><![CDATA[" . $row['SAL_EX'] . "]]></str_salesrep>";
        $salrep = $row['SAL_EX'];



        $ResponseXML .= "<str_department><![CDATA[" . $row['DEPARTMENT'] . "]]></str_department>";

        $ResponseXML .= "<cur_subtotal><![CDATA[" . number_format($row['AMOUNT'], 2, ".", ",") . "]]></cur_subtotal>";
        $ResponseXML .= "<cur_discount><![CDATA[" . number_format($row['DISCOU'], 2, ".", ",") . "]]></cur_discount>";

        $grand_tot = $row['AMOUNT'];


        $ResponseXML .= "<cur_invoiceval><![CDATA[" . number_format($row['GRAND_TOT'], 2, ".", ",") . "]]></cur_invoiceval>";
    }


    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              <td width=\"100\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Code</font></td>
                              <td width=\"300\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Description</font></td>
                              <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Rate</font></td>
                              <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Qty</font></td>
                              <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Discount</font></td>
                              <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Sub Total</font></td>
							 
                            </tr>";

    $i = 1;
    $sql_data = mysqli_query($GLOBALS['dbinv'], "delete from tmp_inv_data where tmp_no='" . $_SESSION["tmp_no_salinv"] . "'") or die(mysqli_error());
    
    $sql_data = mysqli_query($GLOBALS['dbinv'], "Select * from s_invo where REF_NO='" . $inv . "'") or die(mysqli_error());
    while ($row = mysqli_fetch_array($sql_data)) {
        $sql_itdata = mysqli_query($GLOBALS['dbinv'], "Select * from s_mas where STK_NO='" . $row['STK_NO'] . "'") or die(mysqli_error());
        $rowit = mysqli_fetch_array($sql_itdata);



        $PRICE = $row['PRICE'];


        $subtot_wo_disc = (floatval($PRICE) * floatval($row['QTY']));
        $disco = $subtot_wo_disc * floatval($row['DIS_per']) / 100;
        $subtot = $subtot_wo_disc - $disco;





        $sql_tmp = mysqli_query($GLOBALS['dbinv'], "Insert into tmp_inv_data(str_invno, str_code, str_description, cur_rate, actual_selling,cur_qty, dis_per,cur_discount, cur_subtot, brand, ad, tmp_no) values ( '" . $inv . "', '" . $row['STK_NO'] . "', '" . $row['DESCRIPT'] . "', " . $PRICE . ", " . $PRICE . ", " . $row['QTY'] . ", " . $row['DIS_per'] . ", " . $row['DIS_rs'] . ", " . $subtot . ", '" . $row['BRAND'] . "', '" . $row['ad'] . "', '" . $_SESSION["tmp_no_salinv"] . "')") or die(mysqli_error());




        $ResponseXML .= "<tr>
                           	
						    <td onClick=\"disp_qty('" . $row['STK_NO'] . "');\">" . $row['STK_NO'] . "</a></td>
  							 <td onClick=\"disp_qty('" . $row['STK_NO'] . "');\">" . $row['DESCRIPT'] . "</a></td>
							 <td onClick=\"disp_qty('" . $row['STK_NO'] . "');\">" . number_format($PRICE, 2, ".", ",") . "</a></td>
							 <td onClick=\"disp_qty('" . $row['STK_NO'] . "');\">" . $row['QTY'] . "</a></td>
							 <td onClick=\"disp_qty('" . $row['STK_NO'] . "');\">" . $row['DIS_per'] . "</td>
							 <td onClick=\"disp_qty('" . $row['STK_NO'] . "');\">" . number_format($subtot, 2, ".", ",") . "</a></td>";


        $ResponseXML .= "</tr>";

        $i = $i + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";

    $ResponseXML .= "<dis><![CDATA[" . $dis_per1 . "]]></dis>";
    $ResponseXML .= "</salesdetails>";


    echo $ResponseXML;
}
?>
