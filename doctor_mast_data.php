<?php session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
 
////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

include 'connection_i.php';


if ($_GET["Command"] == "new_inv") {


    $sql = "SELECT * FROM docmas order by code desc";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    $tmpinvno = ($row["code"] + 1);


    echo $tmpinvno;
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

    $invno = $_GET["code"];
    $name = $_GET["name"];
    $address = $_GET["address"];
    $tele = $_GET["tele"];
    $fax = $_GET["fax"];
    $com_rate = $_GET["com_rate"];

    $sql = "delete from docmas where code = '" . $invno . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql = "insert into docmas (code,name,address,charges,tele,fax,doccharge,hoscharge) values ('" . $invno . "','" . $name . "','" . $address . "','" . $com_rate . "','" . $tele . "','" . $fax . "','" . $_GET['doccharge'] . "','" . $_GET['hoscharge'] . "') ";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
            . " ('" . $invno . "','" . $_SESSION['CURRENT_USER'] . "','5','','SAVE','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    
    

    if ($result) {
        echo "Saved";
    } else {
        echo "no";
    }
}


if ($_GET["Command"] == "pass_docno") {
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $sql = "select * from docmas where code = '" . $_GET['code'] . "' order by id desc";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<code><![CDATA[" . $row["code"] . "]]></code>";
        $ResponseXML .= "<name><![CDATA[" . $row["name"] . "]]></name>";
        $ResponseXML .= "<address><![CDATA[" . $row["address"] . "]]></address>";
        $ResponseXML .= "<charges><![CDATA[" . $row["charges"] . "]]></charges>";
        $ResponseXML .= "<tele><![CDATA[" . $row["tele"] . "]]></tele>";
        $ResponseXML .= "<fax><![CDATA[" . $row["fax"] . "]]></fax>";
        $ResponseXML .= "<doccharge><![CDATA[" . $row["doccharge"] . "]]></doccharge>";
        $ResponseXML .= "<hoscharge><![CDATA[" . $row["hoscharge"] . "]]></hoscharge>";
        
    }
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "cancel_inv") {



    echo "Canceled!";
    //}
}
?>