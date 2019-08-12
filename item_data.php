<?php

session_start();
date_default_timezone_set('Asia/Colombo');

require_once("config.inc.php");
require_once("DBConnector.php");
$db = new DBConnector();


include_once("connection_i.php");





if ($_GET["Command"] == "new_item") {
    $sql = "Select itemno from invpara";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    $row = mysqli_fetch_array($result);
    echo $row["itemno"];
}


if ($_GET["Command"] == "chk_number") {
    $sql = "Select * from s_mas where stk_no = '" . trim($_GET["txtSTK_NO"]) . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        echo "included";
    } else {
        echo "no";
    }
}


if ($_GET["Command"] == "item_data_save") {
    $m_ok = "";
    if ($_GET["txtDESCRIPTION"] == "") {
        $m_ok = "Item Description Not Entered";
    }

    if ($m_ok == "") {

        $sql = "Select * from s_stomas";
        mysqli_autocommit($GLOBALS['dbinv'], FALSE);
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
        while ($row = mysqli_fetch_array($result)) {
            $M_STOCODE = $row["CODE"];
            $sql1 = "select * from s_submas where sto_code= '" . trim($M_STOCODE) . "' and stk_no= '" . trim($_GET["txtSTK_NO"]) . "'";
            $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
            if ($row1 = mysqli_fetch_array($result1)) {
                $sql2 = "update s_submas set STO_CODE='" . trim($M_STOCODE) . "', STK_NO='" . $_GET["txtSTK_NO"] . "', DESCRIPt='" . $_GET["txtDESCRIPTION"] . "' where  sto_code= '" . trim($M_STOCODE) . "' and stk_no= '" . trim($_GET["txtSTK_NO"]) . "'";
                $result1 = mysqli_query($GLOBALS['dbinv'], $sql2);
                echo "Records are saved";
            } else {
                $sql2 = "Insert into s_submas (STO_CODE, STK_NO, DESCRIPt) values ('" . trim($M_STOCODE) . "', '" . $_GET["txtSTK_NO"] . "', '" . $_GET["txtDESCRIPTION"] . "')";
                $result1 = mysqli_query($GLOBALS['dbinv'], $sql2);
            }
        }


        $sql = "SELECT * FROM s_mas WHERE stk_no = '" . trim($_GET["txtSTK_NO"]) . "'";
        $result = mysqli_query($GLOBALS['dbinv'], $sql);
        if ($row = mysqli_fetch_array($result)) {
            $sql2 = "update s_mas set SDATE='" . date("Y-m-d") . "', DESCRIPT='" . $_GET["txtDESCRIPTION"] . "', COST='" . $_GET["txtCOST"] . "', SELLING='" . $_GET["txtSELLING"] . "',group1='" . $_GET["txtgroup"] . "',unit='" . $_GET["txtunit"] . "' WHERE stk_no = '" . trim($_GET["txtSTK_NO"]) . "'";
            $result2 = mysqli_query($GLOBALS['dbinv'], $sql2);
            echo "Records are saved";
            $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
                    . " ('" . $_GET["txtSTK_NO"] . "','" . $_SESSION['CURRENT_USER'] . "','10','','EDIT','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
            $result = mysqli_query($GLOBALS['dbinv'], $sql);
        } else {
            $sql2 = "Insert into s_mas (SDATE, stk_no, DESCRIPT,COST, SELLING,group1,unit) values ('" . date("Y-m-d") . "', '" . $_GET["txtSTK_NO"] . "', '" . $_GET["txtDESCRIPTION"] . "', '" . $_GET["txtCOST"] . "', '" . $_GET["txtSELLING"] . "', '" . $_GET["txtgroup"] . "', '" . $_GET["txtunit"] . "')";
            $result2 = mysqli_query($GLOBALS['dbinv'], $sql2);
            $sql2 = "update invpara set itemno=itemno+1";
            $result3 = mysqli_query($GLOBALS['dbinv'], $sql2);
            echo "Records are saved";

            $sql = "insert into entry_log (refno,username,docid,docname,trnType,sdate,stime) values"
                    . " ('" . $_GET["txtSTK_NO"] . "','" . $_SESSION['CURRENT_USER'] . "','10','','SAVE','" . date('Y-m-d') . "','" . date('Y-m-d H-m-s') . "') ";
            $result = mysqli_query($GLOBALS['dbinv'], $sql);
        }
    }

    if ($result1 and $result2) {
        mysqli_commit($GLOBALS['dbinv']);
    } else {
        mysqli_rollback($GLOBALS['dbinv']);
    }
}


if ($_GET["Command"] == "delete_item") {
    $sql = "Select * from s_stomas";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysql_fetch_array($result)) {
        $M_STOCODE = $row["CODE"];
        $sql1 = "delete from s_submas where sto_code= '" . trim($M_STOCODE) . "' and stk_no= '" . trim($_GET["txtSTK_NO"]) . "'";
        $result1 = mysqli_query($GLOBALS['dbinv'], $sql1);
    }

    $sql = "Delete FROM s_mas WHERE stk_no = '" . trim($_GET["txtSTK_NO"]) . "'";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    echo "Records are Deleted";
}

mysqli_close($GLOBALS['dbinv']);
?>