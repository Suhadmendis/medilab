<?php

session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
require_once("config.inc.php");
require_once("DBConnector.php");
$db = new DBConnector();

////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');
include("connection_i.php");

/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////



if ($_GET["Command"] == "setitem") {
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sqlt = "SELECT * from s_mas where  STK_NO='" . $_GET["itemd_hidden"] . "'";
    $resultt = mysqli_query($GLOBALS['dbinv'], $sqlt);
    if ($row = mysqli_fetch_array($resultt)) {
        $ResponseXML .= "<STK_NO><![CDATA[" . $row['STK_NO'] . "]]></STK_NO>";
        $ResponseXML .= "<DESCRIPT><![CDATA[" . $row['DESCRIPT'] . "]]></DESCRIPT>";
        $SELLING = $row['SELLING'];
        $ResponseXML .= "<SELLING><![CDATA[" . number_format($SELLING, 2, ".", ",") . "]]></SELLING>";
        $sql_qty = "select QTYINHAND from s_submas where STK_NO='" . $_GET['itemd_hidden'] . "' AND STO_CODE='" . $_GET["department"] . "'";
        $result_qty = mysqli_query($GLOBALS['dbinv'], $sql_qty);
        if ($row_qty = mysqli_fetch_array($result_qty)) {
            if (is_null($row_qty["QTYINHAND"]) == false) {
                $ResponseXML .= "<qtyinhand><![CDATA[" . $row_qty["QTYINHAND"] . "]]></qtyinhand>";
            } else {
                $ResponseXML .= "<qtyinhand><![CDATA[]]></qtyinhand>";
            }
        } else {
            $ResponseXML .= "<qtyinhand><![CDATA[]]></qtyinhand>";
        }
    }
    $ResponseXML .= " </salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "new_inv") {
    $sql = "Select * from invpara";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);

    $tmpinvno = "00000" . ($row["SPINV"] + 1);
    $lenth = strlen($tmpinvno);
    $invno = trim("INV") . substr($tmpinvno, $lenth - 5);
    header('Content-Type: text/xml');
    $ResponseXML = "<?xml version='1.0' encoding='utf-8'?>";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<invno><![CDATA[" . $invno . "]]></invno>";
    $ResponseXML .= "<sdate><![CDATA[" . date("Y-m-d") . "]]></sdate>";
    $ResponseXML .= "<tmpno><![CDATA[" . $row["tmpinvno"] . "]]></tmpno>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;

    $sql = "update invpara tmpinvno set tmpinvno=tmpinvno+1";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
}


 
if ($_GET["Command"] == "add_tmp") {

    $department = $_GET["department"];
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $rate = str_replace(",", "", $_GET["rate"]);
    $actual_selling = str_replace(",", "", $_GET["actual_selling"]);
    $qty = str_replace(",", "", $_GET["qty"]);
    $discount = str_replace(",", "", $_GET["discount"]);
    $subtotal = str_replace(",", "", $_GET["subtotal"]);

    $sql = "Insert into tmp_inv_data (str_invno, str_code, str_description, cur_rate, actual_selling,cur_qty, dis_per, cur_discount, cur_subtot,  brand, tmp_no)values 
			('" . $_GET['invno'] . "', '" . $_GET['itemcode'] . "', '" . $_GET['item'] . "', " . $rate . "," . $rate . ", " . $qty . ", " . $_GET["discountper"] . ", " . $discount . ", " . $subtotal . ", '" . $_GET['brand'] . "', '" . $_GET["tmpno"] . "') ";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                    <td width=\"0\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\"></font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Code</font></td>
                    <td width=\"300\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Description</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Rate</font></td>
                     
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Qty</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Discount</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Sub Total</font></td>
                     
                    </tr>";
    $i = 1;


    $sql = "Select * from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {

        $id = "id" . $i;
        $code = "code" . $i;
        $itemd = "itemd" . $i;
        $rate = "rate" . $i;
        $actual_selling = "actual_selling" . $i;
        $qty = "qty" . $i;
        $discountper = "discountper" . $i;
        $subtotal = "subtotal" . $i;
        $discount = "discount" . $i;


        $ResponseXML .= "<tr>                              
        <td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $id . "'>" . $row['id'] . "</div></td>
        <td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $code . "'>" . $row['str_code'] . "</div></td>
        <td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $itemd . "'>" . $row['str_description'] . "</div></td>
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $rate . "\" id=\"" . $rate . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"  onblur=\"calc1_table('" . $i . "');\" disabled  onkeypress=\"keyset('credper',event);\" /></td>
        
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $qty . "\" id=\"" . $qty . "\" size=\"15\"  value=\"" . number_format($row['cur_qty'], 0, ".", ",") . "\"  onblur=\"calc1_table('" . $i . "');\"  onkeypress=\"keyset('credper',event);\" />    </td>
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $discountper . "'>" . $_GET["discountper"] . "</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"" . $discount . "\" id=\"" . $discount . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"    /></td>
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $subtotal . "'>" . number_format($row['cur_subtot'], 2, ".", ",") . "</div></td>
        <td><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=" . $row['str_code'] . "  name=" . $row['str_code'] . " onClick=\"del_item('" . $row['id'] . "');\"></td>";

        $sqlqt = ("select QTYINHAND from s_submas where STK_NO='" . $row['str_code'] . "' AND STO_CODE='" . $_GET["department"] . "'");
        $sqlqty = mysqli_query($GLOBALS['dbinv'], $sqlqt);
        if ($rowqty = mysqli_fetch_array($sqlqty)) {
            $qty = number_format($rowqty['QTYINHAND'], 0, ".", ",");
        } else {
            $qty = 0;
        }
        $ResponseXML .= "<td >" . $qty . "</td>
			</tr>";
        $i = $i + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";

    $sql = "Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $ResponseXML .= "<subtot><![CDATA[" . number_format($row['tot_sub'], 2, ".", ",") . "]]></subtot>";
    $ResponseXML .= "<tot_dis><![CDATA[" . number_format($row['tot_dis'], 2, ".", ",") . "]]></tot_dis>";
    $invtot = number_format($row['tot_sub'], 2, ".", ",");
    $ResponseXML .= "<invtot><![CDATA[" . $invtot . "]]></invtot>";
    $ResponseXML .= " </salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "add_tmp_edit_rate") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $department = $_GET["department"];
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $rate = str_replace(",", "", $_GET["rate"]);
    $qty = str_replace(",", "", $_GET["qty"]);
    $discount = str_replace(",", "", $_GET["discount"]);
    $subtotal = str_replace(",", "", $_GET["subtotal"]);

    $sql = "update tmp_inv_data set cur_rate=" . $rate . ", cur_qty=" . $qty . ", dis_per=" . $_GET["discountper"] . ", cur_discount=" . $discount . ", cur_subtot=" . $subtotal . " where id='" . $_GET['id'] . "'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                    <td width=\"50\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">ID</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Code</font></td>
                    <td width=\"300\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Description</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Rate</font></td>
                    
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Qty</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Discount</font></td>
                    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Sub Total</font></td>
                    <td></td>
                    
                    <td width=\"70\">Qty In Hand</td>
                    </tr>";

    $i = 1;
    $sql = "Select * from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "' order by id";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {

        $id = "id" . $i;
        $code = "code" . $i;
        $itemd = "itemd" . $i;
        $rate = "rate" . $i;
        $actual_selling = "actual_selling" . $i;
        $qty = "qty" . $i;
        $discountper = "discountper" . $i;
        $subtotal = "subtotal" . $i;
        $discount = "discount" . $i;


        $ResponseXML .= "<tr>                              
        <td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $id . "'>" . $row['id'] . "</div></td>
        <td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $code . "'>" . $row['str_code'] . "</div></td>
        <td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $itemd . "'>" . $row['str_description'] . "</div></td>
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $rate . "\" id=\"" . $rate . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\" disabled onblur=\"calc1_table('" . $i . "');\"  onkeypress=\"keyset('credper',event);\" /></td>
        
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $qty . "\" id=\"" . $qty . "\" size=\"15\"  value=\"" . number_format($row['cur_qty'], 0, ".", ",") . "\"  onblur=\"calc1_table('" . $i . "');\"  onkeypress=\"keyset('credper',event);\" />    </td>
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $discountper . "'>" . number_format($_GET["discountper"], 6, ".", ",") . "</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"" . $discount . "\" id=\"" . $discount . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"    /></td>
        <td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $subtotal . "'>" . number_format($row['cur_subtot'], 2, ".", ",") . "</div></td>";
        $ResponseXML .= " <td><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=" . $row['str_code'] . "  name=" . $row['str_code'] . " onClick=\"del_item('" . $row['id'] . "');\"></td>";



        $sqlqty = mysqli_query($GLOBALS['dbinv'], "select QTYINHAND from s_submas where STK_NO='" . $row['str_code'] . "' AND STO_CODE='" . $_GET["department"] . "'") or die(mysqli_error());
        if ($rowqty = mysqli_fetch_array($sqlqty)) {
            $qty = number_format($rowqty['QTYINHAND'], 0, ".", ",");
        } else {
            $qty = 0;
        }

        $ResponseXML .= "<td  >" . $qty . "</td>
			</tr>";
        $i = $i + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";

    $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";

    $sql = "Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $ResponseXML .= "<subtot><![CDATA[" . number_format($row['tot_sub'], 2, ".", ",") . "]]></subtot>";
    $ResponseXML .= "<tot_dis><![CDATA[" . number_format($row['tot_dis'], 2, ".", ",") . "]]></tot_dis>";
    $ResponseXML .= "<tax><![CDATA[0.00]]></tax>";
    $ResponseXML .= "<taxname><![CDATA[Tax]]></taxname>";
    $invtot = number_format($row['tot_sub'], 2, ".", ",");
    $ResponseXML .= "<invtot><![CDATA[" . $invtot . "]]></invtot>";
    $ResponseXML .= " </salesdetails>";

    //	}	


    echo $ResponseXML;
}

if ($_GET["Command"] == "add_tmp_edit_discount") {

    $department = $_GET["department"];

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $i = 1;
    while ($_GET["item_count"] > $i) {


        $id = "id" . $i;
        $code = "code" . $i;
        $itemd = "itemd" . $i;
        $discountper = "discountper" . $i;
        $srate = "rate" . $i;
        $rate = str_replace(",", "", $_GET[$srate]);

        $sactual_selling = "actual_selling" . $i;
        $actual_selling = str_replace(",", "", $_GET[$sactual_selling]);

        $sqty = "qty" . $i;
        $qty = str_replace(",", "", $_GET[$sqty]);
        $sdiscount = "discount" . $i;
        $discount = str_replace(",", "", $_GET[$sdiscount]);
        $ssubtotal = "subtotal" . $i;
        $subtotal = str_replace(",", "", $_GET[$ssubtotal]);





        $sql = "update tmp_inv_data set cur_rate=" . $rate . ", cur_qty=" . $qty . ", dis_per=" . $_GET[$discountper] . ", cur_discount=" . $discount . ", cur_subtot=" . $subtotal . ", actual_selling='" . $actual_selling . "', ad='" . $ad_val . "' where id=" . $_GET[$id];
        //echo $sql;
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
        $i = $i + 1;
    }

    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
    <td width=\"50\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">ID</font></td>
    <td width=\"100\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Code</font></td>
    <td width=\"300\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Description</font></td>
    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Rate</font></td>
   
    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Qty</font></td>
    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Discount</font></td>
    <td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Sub Total</font></td>
    <td></td>
    <td width=\"50\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">AD</font></td>
    <td width=\"70\">Qty In Hand</td>
							  
                            </tr>";

    $i = 1;
    $sql = "Select * from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "' order by id";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {

        $id = "id" . $i;
        $code = "code" . $i;
        $itemd = "itemd" . $i;
        $rate = "rate" . $i;
        $actual_selling = "actual_selling" . $i;
        $qty = "qty" . $i;
        $discountper = "discountper" . $i;
        $subtotal = "subtotal" . $i;
        $discount = "discount" . $i;


        $ResponseXML .= "<tr>                              
<td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $id . "'>" . $row['id'] . "</div></td>
<td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $code . "'>" . $row['str_code'] . "</div></td>
<td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $itemd . "'>" . $row['str_description'] . "</div></td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $rate . "\" id=\"" . $rate . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"  disabled onkeypress=\"keyset('credper',event);\" /></td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $qty . "\" id=\"" . $qty . "\" size=\"15\"  value=\"" . number_format($row['cur_qty'], 0, ".", ",") . "\"  onblur=\"calc1_table('" . $i . "');\"  onkeypress=\"keyset('credper',event);\" />    </td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $discountper . "'>" . number_format($row["dis_per"], 6, ".", ",") . "</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"" . $discount . "\" id=\"" . $discount . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"    /></td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $subtotal . "'>" . number_format($row['cur_subtot'], 2, ".", ",") . "</div></td>";
        $ResponseXML .= " <td ><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=" . $row['str_code'] . "  name=" . $row['str_code'] . " onClick=\"del_item('" . $row['id'] . "');\"></td>";



        $sqlqty = mysqli_query($GLOBALS['dbinv'], "select QTYINHAND from s_submas where STK_NO='" . $row['str_code'] . "' AND STO_CODE='" . $_GET["department"] . "'") or die(mysqli_error());
        if ($rowqty = mysql_fetch_array($sqlqty)) {
            $qty = number_format($rowqty['QTYINHAND'], 0, ".", ",");
        } else {
            $qty = 0;
        }




        $ResponseXML .= "<td  >" . $qty . "</td>
							
							 
                            </tr>";
        $i = $i + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";

    $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";

    $sql = "Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $ResponseXML .= "<subtot><![CDATA[" . number_format($row['tot_sub'], 2, ".", ",") . "]]></subtot>";
    $ResponseXML .= "<tot_dis><![CDATA[" . number_format($row['tot_dis'], 2, ".", ",") . "]]></tot_dis>";


    $ResponseXML .= "<tax><![CDATA[0.00]]></tax>";
    $ResponseXML .= "<taxname><![CDATA[Tax]]></taxname>";

    $invtot = number_format($row['tot_sub'], 2, ".", ",");
    $ResponseXML .= "<invtot><![CDATA[" . $invtot . "]]></invtot>";

    $ResponseXML .= " </salesdetails>";




    echo $ResponseXML;
}

if ($_GET["Command"] == "disp_qty") {


    $sqlqty = mysqli_query($GLOBALS['dbinv'], "select QTYINHAND from s_submas where STK_NO='" . $_GET["it_code"] . "' AND STO_CODE='" . $_GET["department"] . "'") or die(mysqli_error());
    if ($rowqty = mysqli_fetch_array($sqlqty)) {
        $qty = $rowqty['QTYINHAND'];
    } else {
        $qty = 0;
    }
    echo $qty;
}

if ($_GET["Command"] == "del_item") {


    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    $sql = "delete from tmp_inv_data where id='" . $_GET['code'] . "' and tmp_no='" . $_GET["tmpno"] . "'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
<td width=\"50\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">ID</font></td>
<td width=\"100\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Code</font></td>
<td width=\"300\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Description</font></td>
<td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Rate</font></td>

<td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Qty</font></td>
<td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Discount</font></td>
<td width=\"100\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Sub Total</font></td>
<td></td>

<td width=\"70\">Qty In Hand</td>
                            </tr>";

    $i = 1;
    $sql = "Select * from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {

        $id = "id" . $i;
        $code = "code" . $i;
        $itemd = "itemd" . $i;
        $rate = "rate" . $i;
        $actual_selling = "actual_selling" . $i;
        $qty = "qty" . $i;
        $discountper = "discountper" . $i;
        $subtotal = "subtotal" . $i;
        $discount = "discount" . $i;


        $ResponseXML .= "<tr>
<td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $id . "'>" . $row['id'] . "</div></td>
<td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $code . "'>" . $row['str_code'] . "</div></td>
<td onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $itemd . "'>" . $row['str_description'] . "</div></td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $rate . "\" id=\"" . $rate . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"  onblur=\"calc1_table('" . $i . "');\"  onkeypress=\"keyset('credper',event);\" /></td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><input type=\"text\"  class=\"text_purchase3\" name=\"" . $qty . "\" id=\"" . $qty . "\" size=\"15\"  value=\"" . number_format($row['cur_qty'], 0, ".", ",") . "\"  onblur=\"calc1_table('" . $i . "');\"  onkeypress=\"keyset('credper',event);\" />    </td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $discountper . "'>" . $row["dis_per"] . "</div><input type=\"hidden\"  class=\"text_purchase3\" name=\"" . $discount . "\" id=\"" . $discount . "\" size=\"15\"  value=\"" . number_format($row['cur_rate'], 2, ".", ",") . "\"    /></td>
<td align=right onClick=\"disp_qty('" . $row['str_code'] . "');\"><div id='" . $subtotal . "'>" . number_format($row['cur_subtot'], 2, ".", ",") . "</div></td>
<td ><img src=\"images/delete_01.png\" width=\"20\" height=\"20\" id=" . $row['str_code'] . "  name=" . $row['str_code'] . " onClick=\"del_item('" . $row['id'] . "');\"></td>";



        $sqlqty = mysqli_query($GLOBALS['dbinv'], "select QTYINHAND from s_submas where STK_NO='" . $row['str_code'] . "' AND STO_CODE='" . $_GET["department"] . "'") or die(mysqli_error());
        if ($rowqty = mysql_fetch_array($sqlqty)) {
            $qty = number_format($rowqty['QTYINHAND'], 0, ".", ",");
        } else {
            $qty = 0;
        }




        $ResponseXML .= "<td  >" . $qty . "</td>
							 
						
                    </tr>";

        $i = $i + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";

    $sql = "Select sum(cur_subtot) as tot_sub, sum(cur_discount) as tot_dis from tmp_inv_data where str_invno='" . $_GET['invno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $ResponseXML .= "<subtot><![CDATA[" . number_format($row['tot_sub'], 2, ".", ",") . "]]></subtot>";
    $ResponseXML .= "<tot_dis><![CDATA[" . number_format($row['tot_dis'], 2, ".", ",") . "]]></tot_dis>";




    $invtot = number_format($row['tot_sub'], 2, ".", ",");
    $ResponseXML .= "<invtot><![CDATA[" . $invtot . "]]></invtot>";


    $ResponseXML .= " </salesdetails>";


    //	}	


    echo $ResponseXML;
}

if ($_GET["Command"] == "save_item") {




    $insuf_qty = "";
    $sqltmp1 = "select * from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
    $resulttmp1 = mysqli_query($GLOBALS['dbinv'], $sqltmp1);
    while ($rowtmp1 = mysqli_fetch_array($resulttmp1)) {
        $sqlqty1 = "select QTYINHAND from s_submas where STK_NO='" . $rowtmp1['str_code'] . "' AND STO_CODE='" . $_GET["department"] . "'";
        $resultqty1 = mysqli_query($GLOBALS['dbinv'], $sqlqty1);

        if ($rowqty1 = mysqli_fetch_array($resultqty1)) {
            if ($rowqty1["QTYINHAND"] < $rowtmp1["cur_qty"]) {
                $insuf_qty = $rowtmp1['str_code'];
            }
        }
    }

    $cuscode = "";
    if (trim($_GET["customercode"]) == "") {
        $cuscode = "Select Cust";
    }


    if ($insuf_qty == "" and $cuscode == "") {


        $sql = "select * from invpara";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
        $rows = mysqli_fetch_array($result1);

        $tmpinvno = "00000" . ($rows["SPINV"] + 1);
        $lenth = strlen($tmpinvno);
        $invno = trim("INV") . substr($tmpinvno, $lenth - 5);

        $sqlpara = "update invpara set SPINV=SPINV+1";
        $resultpara = mysqli_query($GLOBALS['dbinv'], $sqlpara);

        $ResponseXML = "";
        $ResponseXML .= "<salesdetails>";
        $cre_balance = str_replace(",", "", $_GET["balance"]);
        $totdiscount = str_replace(",", "", $_GET["totdiscount"]);
        $subtot = str_replace(",", "", $_GET["subtot"]);
        $invtot = str_replace(",", "", $_GET["invtot"]);
        $tax = str_replace(",", "", $_GET["tax"]);
        $d1 = str_replace(",", "", $_GET["discount_org1"]);

        if ($d1 == "") {
            $d1 = 0;
        }

        $d = 100 - (100 - $d1) / 100;
        //===============================================


        $totdiscount = str_replace(",", "", $_GET["totdiscount"]);
        $subtot = str_replace(",", "", $_GET["subtot"]);
        $invtot = str_replace(",", "", $_GET["invtot"]);


        $customername = str_replace("~", "&", $_GET["customername"]);
        $cus_address = str_replace("~", "&", $_GET["cus_address"]);

        $sqlisalma = "Insert into s_salma  (REF_NO, TRN_TYPE, SDATE, C_CODE,  CUS_NAME,  TYPE, DISCOU, AMOUNT, GRAND_TOT,  TOTPAY,   DEPARTMENT, SAL_EX,  DIS,   CANCELL,  tmp_no) values"
                . "('" . $invno . "', 'INV', '" . $_GET["invdate"] . "', '" . trim($_GET["customercode"]) . "',  '" . trim($customername) . "', '" . $_GET["paymethod"] . "'," . $totdiscount . ", " . $subtot . " , " . $invtot . ", 0,  '" . trim($_GET["department"]) . "', '" . trim($_GET["salesrep"]) . "', " . $d1 . ", '0','" . $_GET["tmpno"] . "')";

        $resultsalma = mysqli_query($GLOBALS['dbinv'], $sqlisalma);


        $sqltmp = "select * from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";

        $resulttmp = mysqli_query($GLOBALS['dbinv'], $sqltmp);
        while ($rowtmp = mysqli_fetch_array($resulttmp)) {
            $dis_per = $rowtmp["cur_rate"] * $rowtmp["cur_qty"] * $rowtmp["dis_per"] * 0.01;

            $sqlmas = "select * from s_mas where STK_NO='" . trim($rowtmp["str_code"]) . "'";
            $resultmas = mysqli_query($GLOBALS['dbinv'], $sqlmas);
            $rowmas = mysqli_fetch_array($resultmas);

            $sql_invo = "Insert into s_invo  (REF_NO, SDATE, STK_NO, DESCRIPT, PART_NO, COST, PRICE, QTY, DEPARTMENT, DIS_per, DIS_rs, REP, TAX_PER,  vatrate,  subtot) values "
                    . "('" . $invno . "', '" . $_GET["invdate"] . "', '" . trim($rowtmp["str_code"]) . "', '" . trim($rowtmp["str_description"]) . "', '" . $rowmas["PART_NO"] . "', " . $rowmas["COST"] . ", " . $rowtmp["actual_selling"] . ", " . $rowtmp["cur_qty"] . ", '" . $department . "', '" . $rowtmp["dis_per"] . "', " . $dis_per . ", '" . $_GET["salesrep"] . "', '12',  " . $d1 . ", " . $rowtmp["cur_subtot"] . ")";

            $result_invo = mysqli_query($GLOBALS['dbinv'], $sql_invo);

            $sqls_trn = "Insert into s_trn (STK_NO, SDATE, REFNO, QTY, LEDINDI, DEPARTMENT, Dev, seri_no, SAL_EX, ACTIVE, DONO) values"
                    . "('" . trim($rowtmp["str_code"]) . "','" . $_GET["invdate"] . "','" . trim($_GET["invno"]) . "', " . $rowtmp["cur_qty"] . ", 'INV', '" . trim($_GET["department"]) . "', '" . $_SESSION['dev'] . "', '', '', '1', '')";
            $results_trn = mysqli_query($GLOBALS['dbinv'], $sqls_trn);

            $sqls_trn = "update s_mas set QTYINHAND= QTYINHAND-" . $rowtmp["cur_qty"] . " where STK_NO='" . trim($rowtmp["str_code"]) . "'";
            $results_trn = mysqli_query($GLOBALS['dbinv'], $sqls_trn);



            $sqls_submas = "update s_submas set QTYINHAND=QTYINHAND- " . $rowtmp["cur_qty"] . " where stk_no= '" . trim($rowtmp["str_code"]) . "' and sto_code= '" . $_GET["department"] . "'";
            $results_submas = mysqli_query($GLOBALS['dbinv'], $sqls_submas);
        }


        $sqlpara = "delete from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
        $resultpara = mysqli_query($GLOBALS['dbinv'], $sqlpara);





        $ResponseXML .= "<Saved><![CDATA[Saved]]></Saved>";
        $ResponseXML .= "<invno><![CDATA[" . $invno . "]]></invno>";


        //echo "Saved";
    } else {
        $ResponseXML .= "";
        $ResponseXML .= "<salesdetails>";
        $ResponseXML .= "<Saved><![CDATA[insuficent]]></Saved>";
        $ResponseXML .= "<msg_crelimi><![CDATA[no]]></msg_crelimi>";

        //echo "insuficent";
    }



    $ResponseXML .= " </salesdetails>";
    echo $ResponseXML;
}



if ($_GET["Command"] == "cancel_inv") {


    if ($_GET['refno'] != "") {


        $sql = "delete from s_salma where ref_no = '" . $_GET['refno'] . "'";
        $resultsalma = mysqli_query($GLOBALS['dbinv'], $sql);
            

        $sqltmp = "select * from s_invo where ref_no='" . $_GET["refno"] . "'";
        $resulttmp = mysqli_query($GLOBALS['dbinv'], $sqltmp);
        while ($rowtmp = mysqli_fetch_array($resulttmp)) {

            $sqls_trn = "update s_mas set QTYINHAND= QTYINHAND+" . $rowtmp["QTY"] . " where STK_NO='" . trim($rowtmp["STK_NO"]) . "'";
            $results_trn = mysqli_query($GLOBALS['dbinv'], $sqls_trn);

            $sqls_submas = "update s_submas set QTYINHAND=QTYINHAND+" . $rowtmp["QTY"] . " where stk_no= '" . trim($rowtmp["STK_NO"]) . "' and sto_code= '" . $rowtmp["DEPARTMENT"] . "'";
            $results_submas = mysqli_query($GLOBALS['dbinv'], $sqls_submas);
        }


        $sqlpara = "delete from s_invo where ref_no='" . $_GET["refno"] . "'";
        $resultpara = mysqli_query($GLOBALS['dbinv'], $sqlpara);

        $sqlpara = "delete from s_trn where refno='" . $_GET["refno"] . "'";
        $resultpara = mysqli_query($GLOBALS['dbinv'], $sqlpara);

        $sqlpara = "delete from tmp_inv_data where tmp_no='" . $_GET["tmpno"] . "'";
        $resultpara = mysqli_query($GLOBALS['dbinv'], $sqlpara);
        echo "Cancelled";
 
    } else {
        echo "Not Cancelled";
 
    }


 
}
?>