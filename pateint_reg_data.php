<?php

session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
include_once 'connection_i.php';
date_default_timezone_set('Asia/Colombo');

/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////









if ($_GET["Command"] == "new_inv") {

    $sql = "Select * from invpara";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);

    $pano = "0000" . $row["pareg"];
    $codeContents = substr($pano, -4);

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $ResponseXML .= "<refno><![CDATA[" . $codeContents . "]]></refno>";
    $ResponseXML .= "<txtdate><![CDATA[" . date("Y-m-d") . "]]></txtdate>";
    $ResponseXML .= "<txttime><![CDATA[" . date("g.i a", time()) . "]]></txttime>";
    $ResponseXML .= "<tmpno><![CDATA[" . $row["tmppareg"] . "]]></tmpno>";

    $sql = "update invpara set tmppareg=tmppareg+1 ";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);


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


    $sql = "select * from invpara";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($result1);
    $newno = $rows['pareg'];

    $pano = "0000" . $rows["pareg"];
    $newno = substr($pano, -4);



    $sql = "select * from pa_reg where tmpno = '" . $_GET["tmpno"] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql1 = "update invpara set pareg=pareg+1";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
    } else {
        $rows = mysqli_fetch_array($result);

        $newno = $rows['refno'];
    }

    $sql = "delete from pa_reg where tmpno = '" . $_GET["tmpno"] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql1 = "insert into pa_reg (refno,   paname, tele, remark, paadd, sdate, age, sex,  initial,tmpno) values "
            . "('" . $newno . "', '" . strtoupper($_GET["name"]) . "', '" . $_GET["tele"] . "', '" . $_GET["remark"] . "', '" . $_GET["add"] . "', '" . $_GET["entdate"] . "', '" . $_GET["age"] . "', '" . $_GET["sex"] . "',  '" . $_GET["ini"] . "','" . $_GET["tmpno"] . "' )";

    $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);

    echo "Saved";
}



if ($_GET["Command"] == "pass_arnno_gin") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $sql = "Select * from pa_reg where refno='" . $_GET['arnno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {


        $ResponseXML .= "<refno><![CDATA[" . $row["refno"] . "]]></refno>";


        if ($_GET['stname'] == "reg") {
            $ResponseXML .= "<entdate><![CDATA[" . $row["sdate"] . "]]></entdate>";
        } else {
            $ResponseXML .= "<entdate><![CDATA[-]]></entdate>";
        }

        $tmpno = "-";

        if ($_GET['stname'] == "reg") {
            $tmpno = $row["tmpno"];
        }
        $ResponseXML .= "<tmpno><![CDATA[" . $tmpno . "]]></tmpno>";

        if ($_GET['stname'] == "dapp") {
            $sql = "select * from pa_disapp where fileno = '" . $row["refno"] . "' order by id desc";
            $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

            $tb = "<table>";
            $tb .= "<tr><td>Date</td>";
            $tb .= "<td>Percentage</td>";
            $tb .= "<td>User</td><td>Remove</td></tr>";

            while ($row1 = mysqli_fetch_array($result1)) {
                $tb .= "<tr><td>" . $row1['sdate'] . "</td>";

                $tb .= "<td>" . $row1['appp'] . "</td>";
                $tb .= "<td>" . $row1['user_nm'] . "</td>";
                $tb .= "<td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row1['id'] . "');\"  src=\"images/delete_01.png\"></td>";

                $tb .= "</tr>";
            }
            $tb .= "</table>";
            $ResponseXML .= "<tb><![CDATA[" . $tb . "]]></tb>";
        }

        if ($_GET['stname'] == "his") {
            $sql = "select * from pa_app where fileno = '" . $row["refno"] . "'  and cancell='0' order by id desc";
            $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

            $tb = "<table>";
            $tb .= "<tr><td>Date</td>";
            $tb .= "<td>Department</td>";
            $tb .= "<td>Test/Doctor</td><td>Amount</td></tr>";

            while ($row1 = mysqli_fetch_array($result1)) {
                $tb .= "<tr><td>" . $row1['sdate'] . "</td>";
                $tb .= "<td>" . $row1['appp'] . "</td>";
                $tb .= "<td>Channeling</td>";
                
                $sql = "select * from lab_test_pa_app_mas where refno = '" . $row1["refno"] . "'  and cancell='0' order by id desc";
                $result2 = mysqli_query($GLOBALS['dbinv'], $sql);
                while ($row2= mysqli_fetch_array($result1)) {
                    $mtest = $row2['testdes'] . "," . $mtest ;
                }
                
                $tb .= "<td>". $mtest."</td>";

                $tb .= "</tr>";
            }
            $tb .= "</table>";
            $ResponseXML .= "<tb><![CDATA[" . $tb . "]]></tb>";
        }

        
        
        
        $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";



        $ResponseXML .= "<paname><![CDATA[" . $row["paname"] . "]]></paname>";
        $ResponseXML .= "<tele><![CDATA[" . $row["tele"] . "]]></tele>";
        $ResponseXML .= "<remark><![CDATA[" . $row["remark"] . "]]></remark>";
        $ResponseXML .= "<paadd><![CDATA[" . $row["paadd"] . "]]></paadd>";
        $ResponseXML .= "<initial><![CDATA[" . $row["initial"] . "]]></initial>";
        $ResponseXML .= "<sex><![CDATA[" . $row["sex"] . "]]></sex>";
        $ResponseXML .= "<age><![CDATA[" . $row["age"] . "]]></age>";


        $sql = "select * from pa_disapp where fileno = '" . $row["refno"] . "' and sdate = '" . date('Y-m-d') . "' and uss =0 order by id desc";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

        if ($row1 = mysqli_fetch_array($result1)) {
            $ResponseXML .= "<discount><![CDATA[" . $row1["appp"] . "]]></discount>";
        } else {
            $ResponseXML .= "<discount><![CDATA[0]]></discount>";
        }
    }




    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
if ($_GET["Command"] == "cancel_inv") {

    $sql = "select * from pa_reg where refno = '" . $_GET['invno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $mcou = mysqli_num_rows($result);


    $sql = "delete from pa_reg where refno = '" . $_GET['invno'] . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);


    echo "Record Deleted";
}

mysqli_close($GLOBALS['dbinv']);
?>