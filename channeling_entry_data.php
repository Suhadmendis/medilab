<?php

session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
 
////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
include_once 'connection_i.php';
date_default_timezone_set('Asia/Colombo');

/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////






if ($_GET["Command"] == "del_item") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "delete from tmp_opd_med_test where id = '" . $_GET['id'] . "' ";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);


    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                     <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Description</font></td>
		     <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Amount</font></td>
                     <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Discount</font></td>
                     <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Net</font></td>
                     <td></td>
                    </tr>";


    $i = 1;

    $sql = "Select * from tmp_opd_med_test where tmpno='" . $_GET['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {
        $test_name = "test_name" . $i;
        $amount = "amount" . $i;
        $discount = "discount" . $i;
        $test_code = "test_code" . $i;
        $net = "net" . $i;
        $id = "id" . $i;
        $sql = "Select * from lab_test where code='" . $row['test_name'] . "'";
        $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($rowa = mysqli_fetch_array($resulta)) {
            $amoo = $rowa['price'];
            $testnm = $rowa['testname'];
        }
        $netv = $row['amount'] - ($row['amount'] * ($row["discount"] / 100));
        $ResponseXML .= "<tr>                              
                             <td><input id=\"" . $test_code . "\" type=\"hidden\" value=\"" . $row["test_name"] . "\"/>  <input id=\"" . $test_name . "\" type=\"text\" value=\"" . $testnm . "\" class=\"text_purchase3\" disabled/></td>
                             <td><input id=\"" . $amount . "\" name=\"" . $amount . "\" type=\"text\"  value=\"" . $amoo . "\" class=\"text_purchase3\" disabled/></a></td>
                             <td><input id=\"" . $discount . "\" name=\"" . $discount . "\" type=\"text\"  value=\"" . $row["discount"] . "\" class=\"text_purchase3\" onkeyup=\"calcc();\" /></a></td>
                             <td><input id=\"" . $net . "\" name=\"" . $net . "\" type=\"text\"  value=\"" . $netv . "\" class=\"text_purchase3\"  disabled/></a></td>
                            <td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row['id'] . "');\" name=\'" . $id . "'\" id=\'" . $id . "'\" src=\"images/delete_01.png\"></td></td>"
                . "</tr>";
        $i = $i + 1;
    }
    $ResponseXML .= "<tr><td  colspan='3'><div>Total</div></td> <td ><input type='text' id='amo' name='amo'  disabled  ></td></tr>";
    $ResponseXML .= "<tr><td  colspan='3'><div>Sub Total</div></td> <td ><input type='text' id='netamo' name='netamo' disabled   ></td></tr>";
    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "<count><![CDATA[" . ($mcou) . "]]></count>";



    $ResponseXML .= " </salesdetails>";

    //	}	


    echo $ResponseXML;
}





if ($_GET["Command"] == "new_inv") {

    $sql = "Select * from invpara";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<refno><![CDATA[" . $row["chano"] . "]]></refno>";
    $ResponseXML .= "<txtdate><![CDATA[" . date("Y-m-d") . "]]></txtdate>";
    $ResponseXML .= "<txttime><![CDATA[" . date("g.i a", time()) . "]]></txttime>";
    $ResponseXML .= "<tmpno><![CDATA[" . $row["tmpchano"] . "]]></tmpno>";

    $sql = "update invpara set tmpchano=tmpchano+1 ";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql = "select serino from pa_app_channel where entdate='" . date("Y-m-d") . "' and doc_code='" . $_GET['dcode'] . "'  order by serino desc ";

    $results = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($results);
    if ($rows) {
        $ResponseXML .= "<serino><![CDATA[" . ($rows['serino'] + 1) . "]]></serino>";
    } else {
        $ResponseXML .= "<serino><![CDATA[" . 1 . "]]></serino>";
    }



    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "add_tmp") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    $sql = "Select * from docmas where name='" . $_GET['doctor'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<doccode><![CDATA[" . $row["code"] . "]]></doccode>";
        $ResponseXML .= "<hoscharge><![CDATA[" . $row["hoscharge"] . "]]></hoscharge>";
        $ResponseXML .= "<doccharge><![CDATA[" . $row["doccharge"] . "]]></doccharge>";
    }



    $ResponseXML .= "<sales_table><![CDATA[<table><tr> 
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">No</font></td>
			      <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Name</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Paid</font></td>
                            
                            </tr>";
    $i = 1;

    $sql = "Select * from pa_app_channel where doc_code='" . $row['code'] . "' and sdate='" . $_GET["appdate"] . "' order by serino";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $mser = 1;
    while ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<tr>                              
                             <td>" . $row["serino"] . "</td>
                             <td>" . $row["initial"] . $row["paname"] . "</td>
                             <td>" . $row["cash"] . "</td>        
			</tr>";
        $mser = $row["serino"] + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";

    $sql = "Select * from pa_app_channel where tmpno='" . $_GET["tmpno"] . "' ";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $mser = "-";
    }
    $ResponseXML .= "<serino><![CDATA[" . ($mser) . "]]></serino>";

    $ResponseXML .= " </salesdetails>";

    //	}	


    echo $ResponseXML;
}


if ($_GET["Command"] == "save_item") {
    if ($_SESSION['dev'] == "") {
        exit("logout");
    }

    $_SESSION["CURRENT_DOC"] = 1;      //document ID
    $_SESSION["VIEW_DOC"] = false;     //view current document
    $_SESSION["FEED_DOC"] = true;       //save  current document
    $_GET["MOD_DOC"] = false;         //delete   current document
    $_GET["PRINT_DOC"] = false;       //get additional print   of  current document
    $_GET["PRICE_EDIT"] = false;       //edit selling price
    $_GET["CHECK_USER"] = false;       //check user permission again
    //$cre_balance=str_replace(",", "", $_GET["balance"]);


    $sql = "select * from invpara";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($result1);
    $newno = $rows['chano'];



    $sql = "select * from pa_app_channel where tmpno = '" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql1 = "update invpara set chano=chano+1";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
    } else {
        $rows = mysqli_fetch_array($result);

        $newno = $rows['refno'];
    }

    $sql = "delete from pa_app_channel where tmpno = '" . $_GET["tmpno"] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql1 = "insert into pa_app_channel (refno,  serino, paname, apptime, tele, remark, paadd, sdate, age, sex, cash, initial,amount,totalamount,docnname,type,tmpno,doc_code,entdate,hoscha,charges,fileno) values "
            . "('" . $newno . "', '" . $_GET["serino"] . "', '" . strtoupper($_GET["name"]) . "', '" . $_GET["time"] . "', '" . $_GET["tele"] . "', '" . $_GET["remark"] . "', '" . $_GET["add"] . "', '" . $_GET["entdate"] . "', '" . $_GET["age"] . "', '" . $_GET["sex"] . "', '" . $_GET["cash"] . "',  '" . $_GET["ini"] . "', '" . $_GET["amount"] . "', '" . $_GET["totamount"] . "', '" . $_GET["doctor"] . "', '" . $_GET["paytype"] . "', '" . $_GET["tmpno"] . "', '" . $_GET["doccode"] . "', '" . $_GET["appdate"] . "' , '" . $_GET["hoscharge"] . "' , '" . $_GET["doccharge"] . "' , '" . $_GET["fileno"] . "' )";

    $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);

    echo "Saved";
}



if ($_GET["Command"] == "pass_arnno_gin") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $sql = "Select * from pa_app_channel where refno='" . $_GET['arnno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<refno><![CDATA[" . $row["refno"] . "]]></refno>";
        $ResponseXML .= "<entdate><![CDATA[" . $row["sdate"] . "]]></entdate>";
        $ResponseXML .= "<serino><![CDATA[" . $row["serino"] . "]]></serino>";
        $ResponseXML .= "<paname><![CDATA[" . $row["paname"] . "]]></paname>";
        $ResponseXML .= "<tele><![CDATA[" . $row["tele"] . "]]></tele>";
        $ResponseXML .= "<remark><![CDATA[" . $row["remark"] . "]]></remark>";
        $ResponseXML .= "<paadd><![CDATA[" . $row["paadd"] . "]]></paadd>";
        $ResponseXML .= "<initial><![CDATA[" . $row["initial"] . "]]></initial>";
        $ResponseXML .= "<sex><![CDATA[" . $row["sex"] . "]]></sex>";
        $ResponseXML .= "<age><![CDATA[" . $row["age"] . "]]></age>";
        $ResponseXML .= "<doctor><![CDATA[" . $row["docnname"] . "]]></doctor>";
        $ResponseXML .= "<doc_code><![CDATA[" . $row["doc_code"] . "]]></doc_code>";
        $ResponseXML .= "<amount><![CDATA[" . $row["amount"] . "]]></amount>";
        $ResponseXML .= "<totamount><![CDATA[" . $row["totalamount"] . "]]></totamount>";
        $ResponseXML .= "<cash><![CDATA[" . $row["cash"] . "]]></cash>";
        $ResponseXML .= "<tmpno><![CDATA[" . $row["tmpno"] . "]]></tmpno>";
        $ResponseXML .= "<doccharge><![CDATA[" . $row["charges"] . "]]></doccharge>";
        $ResponseXML .= "<hoscha><![CDATA[" . $row["hoscha"] . "]]></hoscha>";
        $ResponseXML .= "<colby><![CDATA[" . $row["colby"] . "]]></colby>";
        $ResponseXML .= "<fileno><![CDATA[" . $row["fileno"] . "]]></fileno>";
      
        
    }

    $ResponseXML .= "<sales_table><![CDATA[<table><tr> 
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">No</font></td>
			      <td width=\"100\"  background=\"\" ><font color=\"#FFFFFF\">Name</font></td>
                              <td width=\"100\"  background=\"\"><font color=\"#FFFFFF\">Paid</font></td>
                            
                            </tr>";
    $i = 1;

    $sql = "Select * from pa_app_channel where doc_code='" . $row['doc_code'] . "' and sdate='" . $row["sdate"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    while ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<tr>                              
                             <td>" . $row["serino"] . "</td>
                             <td>" . $row["initial"] . $row["paname"] . "</td>
                             <td>" . $row["cash"] . "</td>        
			</tr>";
    }

    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
if ($_GET["Command"] == "cancel_inv") {

    $sql = "select * from pa_app_channel where refno = '" . $_GET['invno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $mcou = mysqli_num_rows($result);

    
        $sql = "update pa_app_channel set cancell='1' where refno = '" . $_GET['invno'] . "'";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
        echo "Record Cancelled";
    
}

mysqli_close($GLOBALS['dbinv']);
?>