<?php

session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
 
////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');
include_once 'connection_i.php';


if ($_GET["Command"] == "new_inv") {

    $sql = "Select testno,tmptestno from invpara";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $tmpinvno = $row["testno"];
    $tmpno = $row["tmptestno"];



    $sql = "update invpara set tmptestno=tmptestno+1 ";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);



    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<refno><![CDATA[" . $tmpinvno . "]]></refno>";
    $ResponseXML .= "<sdate><![CDATA[" . date("Y-m-d") . "]]></sdate>";
    $ResponseXML .= "<txttime><![CDATA[" . date("g.i a", time()) . "]]></txttime>";
    $ResponseXML .= "<tmpno><![CDATA[" . $tmpno . "]]></tmpno>";

    $ResponseXML .= " </salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "cancel_inv") {

    $sql = "delete from lab_test_pa_app_trn where recdet='" . $_GET['invno'] . "'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    echo "Record Deleted";
}





if ($_GET["Command"] == "add_tmp") {
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              
                              <td width=\"30%\"  background=\"\"><font color=\"#FFFFFF\">Test Description</font></td>
		              <td width=\"20%\"  background=\"\" ><font color=\"#FFFFFF\">Results</font></td>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">Range From</font></td>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">Range To</font></td>
                              <td width=\"20%\"  background=\"\"><font color=\"#FFFFFF\">Message</font></td>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">Unit</font></td>
                            </tr>";

    $sql = "Select * from lab_test_pa_app_trn where refno= '" . $_GET['mrefno'] . "' and test_code = '" . $_GET['test_code'] . "' order by id";

    $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($resulta);
    if ($mcou > 0) {
        exit();
    }



    $sql = "Select * from tmp_lab_test_pa_app_trn where tmpno='" . $_GET['tmpno'] . "'  and test_code = '" . $_GET['test_code'] . "'";
    $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
    if (mysqli_num_rows($resulta) == 0) {
        $sql = "Select * from lab_test where code='" . $_GET['test_code'] . "' order by id";
        $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
        while ($rowa = mysqli_fetch_array($resulta)) {
            $userData1[] = "('" . $_GET['refno'] . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa['testname']) . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa['des']) . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa["unit"]) . "','" . $rowa["rfrom"] . "','" . $rowa["rto"] . "','" . $rowa["code"] . "','" . $_SESSION["CURRENT_USER"] . "' ,'" . $_GET['tmpno'] . "') ";
        }

        $sql = "Insert into tmp_lab_test_pa_app_trn (refno,testname, des, unit ,rangef,rangeto,test_code,user_id,tmpno) values " . implode(',', $userData1);

        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    }
    $i = 1;

    $sql = "Select * from tmp_lab_test_pa_app_trn where tmpno='" . $_GET['tmpno'] . "' order by id";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result1);
    while ($row = mysqli_fetch_array($result1)) {

        $test_desc = "test_desc" . $i;
        $result = "result" . $i;
        $rfrom = "rfrom" . $i;
        $rto = "rto" . $i;
        $msg = "msg" . $i;
        $unit = "unit" . $i;
        $mid = "mid" . $i;
        $resn = "result" . ($i + 1);

        $ResponseXML .= "<tr> 
                      <td><input type='hidden' id=\"" . $mid . "\"  value=\"" . $row['id'] . "\" > <input id=\"" . $test_desc . "\" type=\"text\" value=\"" . $row['des'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\" /></td>
                      <td><input id=\"" . $result . "\" type=\"text\" value=\"" . $row['result'] . "\" onkeypress=\"keyset('" . $resn . "', event);\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\" /></td>
                      <td><input id=\"" . $rfrom . "\" type=\"text\" value=\"" . $row['rangef'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\"/></td>
                      <td><input id=\"" . $rto . "\" type=\"text\" value=\"" . $row['rangeto'] . "\"  class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\"/></td>
                      <td><input id=\"" . $msg . "\" type=\"text\" value=\"\" class=\"text_purchase3\"  onkeypress=\"keyset('brand', event);\"  onkeyup=\"updt_tmp('" . $row['id'] . "');\" /></td>
                      <td><input id=\"" . $unit . "\" type=\"text\" value=\"" . $row['unit'] . "\"      class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\"/></td>        
</tr>";



        $i = $i + 1;
    }

    $ResponseXML .= "   </table>]]></sales_table>";
    $ResponseXML .= "<count><![CDATA[" . $mcou . "]]></count>";
    $ResponseXML .= " </salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "updt_tmp") {

    $j = 1;
    $i = $_GET['count'];
    while ($i >= $j) {
        $test_desc = "test_desc" . $j;
        $result = "result" . $j;
        $msg = "msg" . $j;
        $mid = "mid" . $j;

        $mrs = $_GET[$result];
        
        if ($mrs == "|") {
            $mrs = "+";
        }
        if ($mrs == "||") {
            $mrs = "++";
        }
        if ($mrs == "|||") {
            $mrs = "+++";
        }

        $sql = "update tmp_lab_test_pa_app_trn set des = '" . $_GET[$test_desc] . "',result ='" . $mrs . "',msg ='" . $_GET[$msg] . "'  where id ='" . $_GET[$mid] . "'";
        echo $sql;
        $result = mysqli_query($GLOBALS['dbinv'], $sql);

        $j = $j + 1;
    }
}

if ($_GET["Command"] == "pass_ptes") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "delete from tmp_lab_test_pa_app_trn where tmpno = '" . $_GET['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);


    $sql = "Select * from pa_app where refno='" . $_GET['refno'] . "'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<serino><![CDATA[" . $row["serino"] . "]]></serino>";
        $ResponseXML .= "<initial><![CDATA[" . $row["initial"] . "]]></initial>";
        $ResponseXML .= "<paname><![CDATA[" . $row["paname"] . "]]></paname>";
        $ResponseXML .= "<age><![CDATA[" . $row["age"] . "]]></age>";
        $ResponseXML .= "<sex><![CDATA[" . $row["sex"] . "]]></sex>";
        $ResponseXML .= "<docnname><![CDATA[" . $row["docnname"] . "]]></docnname>";
        $ResponseXML .= "<refno><![CDATA[" . $row["refno"] . "]]></refno>";
    }



    $ResponseXML .= "<sales_table><![CDATA[ <table><tr>
                              
                              <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Tests</font></td>
			 
                            </tr>";


    $i = 1;

    $sql = "Select * from lab_test_pa_app_mas where refno='" . $_GET['refno'] . "'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result);
    while ($row = mysqli_fetch_array($result)) {

        $test_name = "test_name" . $i;
        $num = 0;

        $sql = "Select * from lab_test_pa_app_trn where refno= '" . $_GET['refno'] . "' and test_code = '" . $row['testcode'] . "'";

        $resulta = mysqli_query($GLOBALS['dbinv'], $sql);
        $mcou = mysqli_num_rows($resulta);

        if ($mcou>0) {
            $ResponseXML .= "<tr>                              
                             <td bgcolor=\"#FF0000\" onclick ='add_tmp(\"" . $row['testcode'] . "\");'>" . $row['testdes'] . "</td>
							</tr>";
        } else {
            $ResponseXML .= "<tr>                              
                             <td  onclick ='add_tmp(\"" . $row['testcode'] . "\");'>" . $row['testdes'] . "</td>
							</tr>";
        }



        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "load_medis") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<sales_table><![CDATA[<table><tr>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">No</font></td>
			 <td width=\"80%\"  background=\"\"><font color=\"#FFFFFF\">Name</font></td>
                            </tr>";



    $sql = "Select * from pa_app where sdate='" . $_GET['sdate'] . "' and cancell='0'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    while ($row = mysqli_fetch_array($result)) {


        $ResponseXML .= "<tr>                              
                             <td onclick ='kick(" . $row['refno'] . ");'>" . $row['serino'] . "</td>
                             <td onclick ='kick(" . $row['refno'] . ");'>" . $row['paname'] . "</td>    
							</tr>";
    }

    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "</salesdetails>";
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



    $sql = "select * from lab_test_pa_app_trn where tmpno = '" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql1 = "update invpara set testno=testno+1";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
        $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
                . " ('" . $_GET["tmpno"] . "','" . $_SESSION['CURRENT_USER'] . "','7','','SAVE','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    } else {
        $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
                . " ('" . $_GET["tmpno"] . "','" . $_SESSION['CURRENT_USER'] . "','7','','EDIT','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    }


    $sql = "delete from lab_test_pa_app_trn where recdet = '" . $_GET["refno"] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql = "Select * from tmp_lab_test_pa_app_trn where tmpno='" . $_GET['tmpno'] . "' order by id ";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    while ($row = mysqli_fetch_array($result1)) {

        $sql = "Insert into lab_test_pa_app_trn (refno,testname, des, unit ,rangef,rangeto,test_code,user_id,doctr,paname,labdate,recdet,result,msg,rem1,timee,tmpno) values 
('" . $_GET['mrefno'] . "','" . $row['testname'] . "','" . $row['des'] . "','" . $row['unit'] . "','" . $row['rangef'] . "'"
                . ",'" . $row['rangeto'] . "','" . $row['test_code'] . "','" . $row['user_id'] . "','" . $_GET['docctor'] . "'"
                . ",'" . $_GET['pname'] . "','" . $_GET['sdate'] . "','" . $_GET['refno'] . "','" . $row['result'] . "','" . $row['msg'] . "','" . $_GET['remar'] . "','" . $_GET['stime'] . "','" . $_GET['tmpno'] . "')";

        $result = mysqli_query($GLOBALS['dbinv'], $sql);
    }



    echo "Saved";
}



if ($_GET["Command"] == "pass_arnno_gin") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $sql = "Select * from lab_test_pa_app_trn where recdet='" . $_GET['refno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<remark><![CDATA[" . $row["rem1"] . "]]></remark>";
        $ResponseXML .= "<labdate><![CDATA[" . $row["labdate"] . "]]></labdate>";
        $ResponseXML .= "<docnname><![CDATA[" . $row["doctr"] . "]]></docnname>";
        $ResponseXML .= "<recdet><![CDATA[" . $row["recdet"] . "]]></recdet>";
        $ResponseXML .= "<tmpno><![CDATA[" . $row["tmpno"] . "]]></tmpno>";
        $sql = "Select * from pa_app where refno='" . $row['refno'] . "'";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($row1 = mysqli_fetch_array($result1)) {
            $ResponseXML .= "<serino><![CDATA[" . $row1["serino"] . "]]></serino>";
            $ResponseXML .= "<initial><![CDATA[" . $row1["initial"] . "]]></initial>";
            $ResponseXML .= "<paname><![CDATA[" . $row1["paname"] . "]]></paname>";
            $ResponseXML .= "<age><![CDATA[" . $row1["age"] . "]]></age>";
            $ResponseXML .= "<sex><![CDATA[" . $row1["sex"] . "]]></sex>";
            $ResponseXML .= "<refno><![CDATA[" . $row1["refno"] . "]]></refno>";
            $ResponseXML .= "<entdate><![CDATA[" . $row1["sdate"] . "]]></entdate>";
        }
    }



    $i = 1;


    $ResponseXML .= "<sales_table1><![CDATA[ 
                     <table><tr>
                     <td width=\"300\"  background=\"\"><font color=\"#FFFFFF\">Tests</font></td></tr>";



    $sql = "delete from tmp_lab_test_pa_app_trn where tmpno='" . $row['tmpno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);


    $sql = "Select * from lab_test_pa_app_mas where refno='" . $row['refno'] . "'";
    $result2 = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result2);
    while ($row2 = mysqli_fetch_array($result2)) {
        $test_name = "test_name" . $i;
        $ResponseXML .= "<tr>                              
                         <td onclick ='add_tmp(" . $row2['testcode'] . ");'><div id=\"" . $row2['testcode'] . "\">" . $row2['testdes'] . "</div></td>
                         </tr>";
        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table1>";
    $ResponseXML .= "<sales_table><![CDATA[<table><tr>   
                              <td width=\"30%\"  background=\"\"><font color=\"#FFFFFF\">Test Description</font></td>
		              <td width=\"20%\"  background=\"\" ><font color=\"#FFFFFF\">Results</font></td>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">Range From</font></td>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">Range To</font></td>
                              <td width=\"20%\"  background=\"\"><font color=\"#FFFFFF\">Message</font></td>
                              <td width=\"10%\"  background=\"\"><font color=\"#FFFFFF\">Unit</font></td>
                            </tr>";

    $sql = "Select * from lab_test_pa_app_trn where recdet='" . $row['recdet'] . "' order by id";

    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result1);
    while ($rowa = mysqli_fetch_array($result1)) {
        $userData1[] = "('" . $rowa['refno'] . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa['paname']) . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa['testname']) . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa['des']) . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa["unit"]) . "', '" . mysqli_escape_string($GLOBALS['dbinv'], $rowa["result"]) . "','" . mysqli_escape_string($GLOBALS['dbinv'], $rowa["msg"]) . "','" . ($rowa["labdate"]) . "','" . ($rowa["recdet"]) . "','" . mysqli_escape_string($GLOBALS['dbinv'], $rowa["rem1"]) . "','" . $rowa["rangef"] . "','" . $rowa["rangeto"] . "','" . $rowa["timee"] . "','" . $rowa["doctr"] . "','" . $rowa["test_code"] . "','" . $_SESSION["CURRENT_USER"] . "' ,'" . $rowa['tmpno'] . "') ";
    }

    $sql = "Insert into tmp_lab_test_pa_app_trn (refno,paname,testname, des, unit ,result,msg,labdate,recdet,rem1,rangef,rangeto,timee,doctr,test_code,user_id,tmpno) values " . implode(',', $userData1);

    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $i = 1;
    $sql = "Select * from tmp_lab_test_pa_app_trn where recdet='" . $row['recdet'] . "' order by id";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $mcou = mysqli_num_rows($result1);
    while ($row = mysqli_fetch_array($result1)) {
        $test_desc = "test_desc" . $i;
        $result = "result" . $i;
        $rfrom = "rfrom" . $i;
        $rto = "rto" . $i;
        $msg = "msg" . $i;
        $unit = "unit" . $i;
        $mid = "mid" . $i;
        $resn = "result" . ($i + 1);

        $ResponseXML .= "<tr> 
                      <td><input type='hidden' id=\"" . $mid . "\"  value=\"" . $row['id'] . "\" > <input id=\"" . $test_desc . "\" type=\"text\" value=\"" . $row['des'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\" /></td>
                      <td><input id=\"" . $result . "\" type=\"text\" value=\"" . $row['result'] . "\" onkeypress=\"keyset('" . $resn . "', event);\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\" /></td>
                      <td><input id=\"" . $rfrom . "\" type=\"text\" value=\"" . $row['rangef'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\"/></td>
                      <td><input id=\"" . $rto . "\" type=\"text\" value=\"" . $row['rangeto'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\"/></td>
                      <td><input id=\"" . $msg . "\" type=\"text\" value=\"" . $row['msg'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\" /></td>
                      <td><input id=\"" . $unit . "\" type=\"text\" value=\"" . $row['unit'] . "\" class=\"text_purchase3\" onkeyup=\"updt_tmp('" . $row['id'] . "');\"/></td>        
</tr>";
        $i = $i + 1;
    }
    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "<count><![CDATA[" . $mcou . "]]></count>";



    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "search_inv") {

    $ResponseXML = "";
    $ResponseXML .= "<table width=\"735\" border=\"0\" class=\"form-matrix-table\">
                            <tr>
                              <td width=\"121\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">M. Ref No</font></td>
                              <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Name</font></td>
                             <td width=\"176\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Test Name</font></td>
                              <td width=\"121\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Ref No</font></td>
   							</tr>";
    $sdate = $_GET['sdate'];
    if ($_GET["mstatus"] == "invno") {
        $letters = $_GET['invno'];
        $sql = ("SELECT refno,paname,testname,recdet  from lab_test_pa_app_trn where  refno like  '$letters%' and labdate = '" . $sdate . "' group by refno,paname,testname,recdet   order by recdet  desc");
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = ("SELECT refno,paname,testname,recdet  from lab_test_pa_app_trn where paname like  '$letters%' and labdate = '" . $sdate . "' group by refno,paname,testname,recdet   order by recdet  desc");
    } else {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = ("SELECT refno,paname,testname,recdet  from lab_test_pa_app_trn where testname like   '$letters%' and labdate = '" . $sdate . "' group by refno,paname,testname,recdet   order by recdet  desc");
    }

    $sql1 = mysqli_query($GLOBALS['dbinv'], $sql);


    while ($row = mysqli_fetch_array($sql1)) {
        $REF_NO = $row['refno'];
        $stname = "inv_mast";
        $ResponseXML .= "<tr><td onclick=\"arnno_gin('" . $row['recdet'] . "');\">" . $row['refno'] . "</a></td>
                    <td onclick=\"arnno_gin('" . $row['recdet'] . "');\">" . $row["paname"] . "</a></td>
                    <td onclick=\"arnno_gin('" . $row['recdet'] . "');\">" . $row['testname'] . "</a></td>
                    <td onclick=\"arnno_gin('" . $row['recdet'] . "');\">" . $row['recdet'] . "</a></td>          
                            </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}


mysqli_close($GLOBALS['dbinv']);
?>