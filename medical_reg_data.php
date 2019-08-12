<?php

session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
require_once("config.inc.php");
require_once("DBConnector.php");
$db = new DBConnector();

////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
date_default_timezone_set('Asia/Colombo');

include('./connection_i.php');
/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////	



if ($_GET["Command"] == "new_inv") {

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $ResponseXML .= "<treatment><![CDATA[";
    $sql_rst = "select * from tremas order by TDESCRIPT";
    $result_rst = mysqli_query($GLOBALS['dbinv'], $sql_rst);
    while ($row_rst = mysqli_fetch_array($result_rst)) {
        $ResponseXML .= "<input type=\"checkbox\" name=\"" . $row_rst["TCODE"] . "\" id=\"" . $row_rst["TCODE"] . "\" onclick=\"treat_tmp_save('" . $row_rst["TCODE"] . "');\" />&nbsp;&nbsp;&nbsp;" . $row_rst["TDESCRIPT"] . "</br>";
    }
    $ResponseXML .= "]]></treatment>";


    $sql = "select seri_no from rege where sdate='" . date("Y-m-d") . "'   order by seri_no desc ";

    $results = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($results);
    if ($rows) {
        $ResponseXML .= "<serino><![CDATA[" . ($rows['seri_no'] + 1) . "]]></serino>";
    } else {
        $ResponseXML .= "<serino><![CDATA[" . 1 . "]]></serino>";
    }
    $ResponseXML .= "<txtdate><![CDATA[" . date("Y-m-d") . "]]></txtdate>";


    $sql = "select D_REFNO from para  ";
    $results = mysqli_query($GLOBALS['dbinv'], $sql);
    $rows = mysqli_fetch_array($results);
    $ResponseXML .= "<D_REFNO><![CDATA[" . ($rows['D_REFNO']) . "]]></D_REFNO>";



    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "set_treatment") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $list = "";
    $TAMOUNT = 0;

    $sql_per = " delete  from  tmp_treatment where user_id='" . $_SESSION["CURRENT_USER"] . "'";
    $result_per = mysqli_query($GLOBALS['dbinv'], $sql_per);

    $sql_treat = " select * from  tremas order by TDESCRIPT";
    $result_treat = mysqli_query($GLOBALS['dbinv'], $sql_treat);
    while ($row_treat = mysqli_fetch_array($result_treat)) {
        $sql_pkg = " select * from  package_mas where package_no='" . $_GET["cmbpackage"] . "' and code='" . $row_treat["TCODE"] . "'";
        $result_pkg = mysqli_query($GLOBALS['dbinv'], $sql_pkg);
        if ($row_pkg = mysqli_fetch_array($result_pkg)) {
            $list .= "<input type=\"checkbox\" name=\"" . $row_treat["TCODE"] . "\" id=\"" . $row_treat["TCODE"] . "\" checked=\"checked\" onclick=\"treat_tmp_save('" . $row_treat["TCODE"] . "');\" />&nbsp;&nbsp;&nbsp;" . $row_treat["TDESCRIPT"] . "</br>";
            $sql_per = " insert into tmp_treatment(code, name, amount, user_id) values ('" . $row_treat["TCODE"] . "', '" . $row_treat["TDESCRIPT"] . "', " . $row_treat["TAMOUNT"] . ", '" . $_SESSION["CURRENT_USER"] . "')";
            $result_per = mysqli_query($GLOBALS['dbinv'], $sql_per);
            $TAMOUNT = $TAMOUNT + $row_treat["TAMOUNT"];
        } else {
            $list .= "<input type=\"checkbox\" name=\"" . $row_treat["TCODE"] . "\" id=\"" . $row_treat["TCODE"] . "\" onclick=\"treat_tmp_save('" . $row_treat["TCODE"] . "');\" />&nbsp;&nbsp;&nbsp;" . $row_treat["TDESCRIPT"] . "</br>";
        }
    }

    $ResponseXML .= "<list><![CDATA[" . $list . "]]></list>";
    $ResponseXML .= "<TAMOUNT><![CDATA[" . number_format($TAMOUNT, 2, ".", "") . "]]></TAMOUNT>";

    $ResponseXML .= " </salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "treat_tmp_save") {



    $sql_per = " delete  from  tmp_treatment where code='" . $_GET["TCODE"] . "' and user_id='" . $_SESSION["CURRENT_USER"] . "'";
    $result_per = mysqli_query($GLOBALS['dbinv'], $sql_per);
    if ($_GET["chk_val"] == "1") {
        $sql_treat = " select * from  tremas where TCODE='" . $_GET["TCODE"] . "'";
        $result_treat = mysqli_query($GLOBALS['dbinv'], $sql_treat);
        if ($row_treat = mysqli_fetch_array($result_treat)) {
            $sql_per = " insert into tmp_treatment(code, name, amount, user_id) values ('" . $row_treat["TCODE"] . "', '" . $row_treat["TDESCRIPT"] . "', " . $row_treat["TAMOUNT"] . ", '" . $_SESSION["CURRENT_USER"] . "')";
            $result_per = mysqli_query($GLOBALS['dbinv'], $sql_per);
        }
    }

    $sql_treat = " select sum(amount) as amou from  tmp_treatment where user_id='" . $_SESSION["CURRENT_USER"] . "'";
    $result_treat = mysqli_query($GLOBALS['dbinv'], $sql_treat);
    $row_treat = mysqli_fetch_array($result_treat);

    echo $row_treat["amou"];
}

if ($_GET["Command"] == "save_medical") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";



    if ($_SESSION["mstat"] != "old") {

        //////////////////////////call com_count_Click//////////////////////
        //Load fCOUNT
        $sql_rscountry = "SELECT * FROM COUNTRY WHERE CODE='" . trim($_GET["txt_count"]) . "'";
        $result_rscountry = mysqli_query($GLOBALS['dbinv'], $sql_rscountry);
        if ($row_rscountry = mysqli_fetch_array($result_rscountry)) {
            $TXTREFNO = trim($row_rscountry["REF_NO_C"]) + trim($row_rscountry["REF_NO"]);
        } else {
            $sql_rscountry = "SELECT * FROM COUNTRY";
            $result_rscountry = mysqli_query($GLOBALS['dbinv'], $sql_rscountry);
            $row_rscountry = mysqli_fetch_array($result_rscountry);
            $TXTREFNO = trim($_GET["txt_countna"]) . trim($row_rscountry["REF_NO"]);
        }

        $ResponseXML .= "<TXTREFNO><![CDATA[" . $TXTREFNO . "]]></TXTREFNO>";

        $sql_rs = "Select * from rege where SDATE ='" . $_GET["DTPicker1"] . "' order by SERI_NO desc";
        $result_rs = mysqli_query($GLOBALS['dbinv'], $sql_rs);
        if ($row_rs = mysqli_fetch_array($result_rs)) {
            $txt_serino = $row_rs["SERI_NO"] + 1;
            $TXTLAB_NO = $row_rs["SERI_NO"] + 1;
        } else {
            $TXTLAB_NO = 1;
        }

        $ResponseXML .= "<txt_serino><![CDATA[" . $txt_serino . "]]></txt_serino>";
        $ResponseXML .= "<TXTLAB_NO><![CDATA[" . $TXTLAB_NO . "]]></TXTLAB_NO>";


        if (trim($_GET["txt_countna"]) != "OTHER") {

            $tmpinvno = "00" . $txt_serino;
            $lenth = strlen($tmpinvno);

            $txt_xrayno = substr(trim($_GET["txt_countna"]), 0, 1) . substr($tmpinvno, $lenth - 3);
            $txt_cmbno = substr(trim($_GET["txt_countna"]), 0, 1) . substr($tmpinvno, $lenth - 3);
        } else {
            $tmpinvno = "00" . $txt_serino;
            $lenth = strlen($tmpinvno);
            $txt_xrayno = substr($tmpinvno, $lenth - 3);
            $txt_cmbno = "";
        }

        $ResponseXML .= "<txt_xrayno><![CDATA[" . $txt_xrayno . "]]></txt_xrayno>";
        $ResponseXML .= "<txt_cmbno><![CDATA[" . $txt_cmbno . "]]></txt_cmbno>";



        ////////////////////Call seri_cou
        $txt_serino = "";

        $sql_rsrege = "select count(SDATE) as no from rege where SDATE = '" . $_GET["DTPicker1"] . "' ";
        $result_rsrege = mysqli_query($GLOBALS['dbinv'], $sql_rsrege);
        if ($row_rsrege = mysqli_fetch_array($result_rsrege)) {
            $txt_serino = $row_rsrege["no"] + 1;
        } else {
            $txt_serino = 1;
        }

        $txt_serino = "";
        $sql_rsrege = "select *  from rege where SDATE = '" . $_GET["DTPicker1"] . "' order by SERI_NO desc ";
        $result_rsrege = mysqli_query($GLOBALS['dbinv'], $sql_rsrege);
        if ($row_rsrege = mysqli_fetch_array($result_rsrege)) {
            $txt_serino = $row_rsrege["SERI_NO"];
        }
        $txt_serino = $txt_serino + 1;
    }



    if ($_GET["txtamu"] == "") {
        $txtamu = 0;
    } else {
        $txtamu = str_replace(",", "", $_GET["txtamu"]);
    }

    if ($_GET["txt_cas"] == "") {
        $txt_cas = 0;
    } else {
        $txt_cas = str_replace(",", "", $_GET["txt_cas"]);
    }

    if ($_GET["txt_cheamo"] == "") {
        $txt_cheamo = 0;
    } else {
        $txt_cheamo = str_replace(",", "", $_GET["txt_cheamo"]);
    }

    if ($_GET["txt_paid"] == "") {
        $txt_paid = 0;
    } else {
        $txt_paid = str_replace(",", "", $_GET["txt_paid"]);
    }

    $sql_status = 0;

    mysqli_autocommit($GLOBALS['dbinv'], FALSE);

    $sql_rst = "select * from rege where DREFNO='" . trim($_GET["TXTREFNO"]) . "'";
    
    $result_rst = mysqli_query($GLOBALS['dbinv'], $sql_rst);
    if ($row_rst = mysqli_fetch_array($result_rst)) {

        //=======================delete OLD===================================
        $sql_log = "insert into entry_log(refno, serino, username, docid, docname, trnType, stime, sdate, c_code, ppno, amount, paid) values ('" . trim($row_rst["DREFNO"]) . "', '" . trim($row_rst["SERI_NO"]) . "','" . trim($row_rst["RE_CHECHK"]) . "-" . $_SESSION["CURRENT_USER"] . "', '3', 'REGE', 'EDIT', '" . $_GET["DTPicker1"] . "', '" . date("Y-m-d H:i:s") . "', '" . trim($row_rst["CODE"]) . "', '" . trim($row_rst["PA_NO"]) . "', '" . $row_rst["AMOUNT"] . "', '" . $row_rst["AMOUNT1"] . "')";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 1;
        }

        $sql_log = "delete from rege where DREFNO='" . trim($_GET["TXTREFNO"]) . "'";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 2;
        }

        $sql_log = "delete from regtran where drefno='" . trim($_GET["TXTREFNO"]) . "'";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 3;
        }

        $sql_log = "delete from s_salma where REF_NO='" . trim($_GET["TXTREFNO"]) . "'";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 4;
        }

        $sql_log = "delete from s_invcheq where refno='" . trim($_GET["TXTREFNO"]) . "'";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 5;
        }

        $sql_log = "delete from ledge where REFNO='" . trim($_GET["TXTREFNO"]) . "'";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 6;
        }
    } else {

        $sql_log = "update country set REF_NO=REF_NO+1 where CODE='" . trim($_GET["txt_count"]) . "'";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 7;
        }

        $sql_log = "update para set D_REFNO=D_REFNO+1";
         
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 8;
        }

        $sql_log = "insert into entry_log(refno, serino, username, docid, docname, trnType, stime, sdate) values ('" . trim($_GET["TXTREFNO"]) . "', '" . trim($txt_serino) . "', '" . $_SESSION["CURRENT_USER"] . "', '3', 'REGE', 'SAVE', '" . $_GET["DTPicker1"] . "', '" . date("Y-m-d H:i:s") . "')";
        $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
        if ($result_log == false) {
            $sql_status = 9;
        }
    }

    //-------------------------Save Rege Details-------------------------------'

    $sql_reg = "insert into rege(DREFNO, CODE, AGNAME, SDATE, G_NO, NAME, AMOUNT, AMOUNT1, TYPE, DEL_DATE, COUNTRY, cou_NAME, CUS_REMARK, AGE_Y, AGE_M, DEST, PA_NO,  SERI_NO, XRAYNO, picture, mfile, sex, Status, NATIONL, PLA_OF_IS, POS_APP, No_child, last_ch_age, GCC_NO, cusadd, isLRMP, Lastname, userrefno, initial, stime, chkdt, chkamt, bank, CHKNO, cash, religon, RE_CHECHK, tel) values ('" . trim($_GET["TXTREFNO"]) . "', '" . trim($_GET["txtCcode"]) . "', '" . trim($_GET["txt_agname"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txt_gccno"]) . "', '" . trim($_GET["txt_frname"]) . "', " . $txtamu . ", " . $txt_paid . ", '" . trim($_GET["cmbpaytype"]) . "', '', '" . trim($_GET["txt_count"]) . "', '" . trim($_GET["txt_countna"]) . "', '" . trim($_GET["txt_rema"]) . "', '" . trim($_GET["txt_ag_ye"]) . "', '', '" . trim($_GET["cmbdi"]) . "', '" . trim($_GET["txt_passno"]) . "',   '" . trim($_GET["txt_serino"]) . "', '" . trim($_GET["txt_xrayno"]) . "','" . trim($_GET["pic"]) . "', 'mfile', '" . trim($_GET["cmbsex"]) . "', '" . trim($_GET["cmbstatus"]) . "', '" . trim($_GET["cmbnat"]) . "', '" . trim($_GET["txtPLA_OF_IS"]) . "', '" . trim($_GET["txtPOS_APP"]) . "', '', '', '" . trim($_GET["txt_gccno"]) . "', '" . trim($_GET["txtadd"]) . "', '', '" . trim($_GET["txt_lastname"]) . "', '" . trim($_GET["TXTLAB_NO"]) . "', '" . trim($_GET["cmbmr"]) . "', '" . date("Y-m-d H:i:s") . "', '" . trim($_GET["txt_chdate"]) . "', '" . trim($txt_cheamo) . "', '" . trim($_GET["txtbank"]) . "', '" . trim($_GET["txt_cheno"]) . "', '" . trim($txt_cas) . "', '" . trim($_GET["cmdbreligon"]) . "', '" . $_SESSION["CURRENT_USER"] . "', '" . trim($_GET["txttel"]) . "')";

    $result_reg = mysqli_query($GLOBALS['dbinv'], $sql_reg);
    if ($result_reg == false) {
        $sql_status = 10;
    }

    $sql_log = "delete from regtran where drefno = '" . trim($_GET["TXTREFNO"]) . "'";
    $result_log = mysqli_query($GLOBALS['dbinv'], $sql_log);
    if ($result_log == false) {
        $sql_status = 11;
    }

    $sql_rst = "select * from tmp_treatment where user_id='" . trim($_SESSION["CURRENT_USER"]) . "'";

    $result_rst = mysqli_query($GLOBALS['dbinv'], $sql_rst);
    while ($row_rst = mysqli_fetch_array($result_rst)) {

        $sql_regtran = "insert into regtran (drefno, tcode, tdes) values ('" . trim($_GET["TXTREFNO"]) . "', '" . trim($row_rst["code"]) . "', '" . trim($row_rst["name"]) . "')";

        $result_regtran = mysqli_query($GLOBALS['dbinv'], $sql_regtran);
        if ($result_regtran == false) {
            $sql_status = 12;
        }
    }



//-------------------------Settlments-------------------------------'

    $sql_s_salma = "insert into s_salma (REF_NO , SDATE, C_CODE, CUS_NAME, GRAND_TOT, CASH, TOTPAY, DEV, ORD_NO, Accname) values ('" . trim($_GET["TXTREFNO"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txtCcode"]) . "', '" . trim($_GET["txt_agname"]) . "', " . $txtamu . ", " . $txt_cas . ", " . ($txt_cas + $txt_cheamo) . ", '" . trim($_SESSION['dev']) . "', '" . trim($_GET["TXTLAB_NO"]) . "' , '" . trim($_GET["txt_passno"]) . "')";
    $result_s_salma = mysqli_query($GLOBALS['dbinv'], $sql_s_salma);
    if ($result_s_salma == false) {
        $sql_status = 13;
    }

    $sql_ledge = "insert into ledge (REFNO, SERI_NO, CODE, sDATE, NAME, AMOUNT, AMOUNT1, TYPE, CHNO) values ('" . trim($_GET["TXTREFNO"]) . "', '" . $_GET["txt_serino"] . "', '" . trim($_GET["txtCcode"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txt_agname"]) . "', " . $txtamu . ", " . ($txt_cas + $txt_cheamo) . ", 'REP', '" . trim($_GET["txt_cheno"]) . "')";
    $result_ledge = mysqli_query($GLOBALS['dbinv'], $sql_ledge);
    if ($result_ledge == false) {
        $sql_status = 14;
    }

    //------------------------- Cheque Details--------------------------'

    if ((trim($_GET["cmbpaytype"]) == "CHEQUE") or ( trim($_GET["cmbpaytype"]) == "CASH/CHEQUE")) {
        $sql_ledge = "insert into s_invcheq(refno, Sdate, cus_code, CUS_NAME, cheque_no, che_date, bank, che_amount, dev) values ('" . trim($_GET["TXTREFNO"]) . "', '" . $_GET["DTPicker1"] . "', '" . trim($_GET["txtCcode"]) . "', '" . trim($_GET["txt_agname"]) . "', '" . trim($_GET["txt_cheno"]) . "', '" . $_GET["txt_chdate"] . "', '" . trim($_GET["txtbank"]) . "', " . $txt_cheamo . ", '" . trim($_SESSION['dev']) . "')";
        $result_ledge = mysqli_query($GLOBALS['dbinv'], $sql_ledge);
        if ($result_ledge == false) {
            $sql_status = 15;
        }
    }

    if ($sql_status == 0) {
        mysqli_commit($GLOBALS['dbinv']);
        echo "Successfully Saved";
    } else {
        mysqli_rollback($con);
        echo $sql_status;
        echo "Error has occured";
    }
}

if ($_GET["Command"] == "med_reg") {
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql_rst = "select * from rege where DREFNO='" . trim($_GET["serino"]) . "'";
    $result_rst = mysqli_query($GLOBALS['dbinv'], $sql_rst);
    if ($row_rst = mysqli_fetch_array($result_rst)) {
        $ResponseXML .= "<TXTREFNO><![CDATA[" . $row_rst["DREFNO"] . "]]></TXTREFNO>";
        $ResponseXML .= "<txtCcode><![CDATA[" . $row_rst["CODE"] . "]]></txtCcode>";
        $ResponseXML .= "<txt_agname><![CDATA[" . $row_rst["AGNAME"] . "]]></txt_agname>";
        $ResponseXML .= "<DTPicker1><![CDATA[" . $row_rst["SDATE"] . "]]></DTPicker1>";
        $ResponseXML .= "<txt_gccno><![CDATA[" . $row_rst["G_NO"] . "]]></txt_gccno>";
        $ResponseXML .= "<txt_frname><![CDATA[" . $row_rst["NAME"] . "]]></txt_frname>";
        $ResponseXML .= "<txtamu><![CDATA[" . $row_rst["AMOUNT"] . "]]></txtamu>";
        $ResponseXML .= "<txt_paid><![CDATA[" . $row_rst["AMOUNT1"] . "]]></txt_paid>";
        $ResponseXML .= "<cmbpaytype><![CDATA[" . $row_rst["TYPE"] . "]]></cmbpaytype>";
        //	$ResponseXML .= "<dtdel_date><![CDATA[".$row_rst["DEL_DATE"]."]]></dtdel_date>";
        $ResponseXML .= "<txt_count><![CDATA[" . $row_rst["COUNTRY"] . "]]></txt_count>";
        $ResponseXML .= "<txt_countna><![CDATA[" . $row_rst["cou_NAME"] . "]]></txt_countna>";
        $ResponseXML .= "<txt_rema><![CDATA[" . $row_rst["CUS_REMARK"] . "]]></txt_rema>";
        $ResponseXML .= "<txt_ag_ye><![CDATA[" . $row_rst["AGE_Y"] . "]]></txt_ag_ye>";
        //	$ResponseXML .= "<txt_ag_mon><![CDATA[".$row_rst["AGE_M"]."]]></txt_ag_mon>";
        $ResponseXML .= "<cmbdi><![CDATA[" . $row_rst["DEST"] . "]]></cmbdi>";
        $ResponseXML .= "<txt_passno><![CDATA[" . $row_rst["PA_NO"] . "]]></txt_passno>";
         
        $ResponseXML .= "<txt_serino><![CDATA[" . $row_rst["SERI_NO"] . "]]></txt_serino>";
        $ResponseXML .= "<txt_xrayno><![CDATA[" . $row_rst["XRAYNO"] . "]]></txt_xrayno>";
        //$ResponseXML .= "<TXTREFNO><![CDATA[".$row_rst["picture"]."]]></TXTREFNO>";
        //$ResponseXML .= "<TXTREFNO><![CDATA[".$row_rst["mfile"]."]]></TXTREFNO>";
        $ResponseXML .= "<cmbsex><![CDATA[" . $row_rst["sex"] . "]]></cmbsex>";
        $ResponseXML .= "<cmbstatus><![CDATA[" . $row_rst["Status"] . "]]></cmbstatus>";
        $ResponseXML .= "<cmbnat><![CDATA[" . $row_rst["NATIONL"] . "]]></cmbnat>";
        $ResponseXML .= "<txtPLA_OF_IS><![CDATA[" . $row_rst["PLA_OF_IS"] . "]]></txtPLA_OF_IS>";
        $ResponseXML .= "<txtPOS_APP><![CDATA[" . $row_rst["POS_APP"] . "]]></txtPOS_APP>";
        //$ResponseXML .= "<txtnoch><![CDATA[".$row_rst["No_child"]."]]></txtnoch>";
        //$ResponseXML .= "<txtchage><![CDATA[".$row_rst["last_ch_age"]."]]></txtchage>";
        $ResponseXML .= "<txt_gccno><![CDATA[" . $row_rst["GCC_NO"] . "]]></txt_gccno>";
        $ResponseXML .= "<txtadd><![CDATA[" . $row_rst["cusadd"] . "]]></txtadd>";
        //	$ResponseXML .= "<chkLRMP><![CDATA[".$row_rst["isLRMP"]."]]></chkLRMP>";
        $ResponseXML .= "<txt_lastname><![CDATA[" . $row_rst["Lastname"] . "]]></txt_lastname>";
        $ResponseXML .= "<TXTLAB_NO><![CDATA[" . $row_rst["userrefno"] . "]]></TXTLAB_NO>";
        $ResponseXML .= "<cmbmr><![CDATA[" . $row_rst["initial"] . "]]></cmbmr>";
        $ResponseXML .= "<stime><![CDATA[" . $row_rst["stime"] . "]]></stime>";
        $ResponseXML .= "<txt_chdate><![CDATA[" . $row_rst["chkdt"] . "]]></txt_chdate>";
        $ResponseXML .= "<txt_cheamo><![CDATA[" . $row_rst["chkamt"] . "]]></txt_cheamo>";
        $ResponseXML .= "<txtbank><![CDATA[" . $row_rst["bank"] . "]]></txtbank>";
        $ResponseXML .= "<txt_cheno><![CDATA[" . $row_rst["CHKNO"] . "]]></txt_cheno>";
        $ResponseXML .= "<txt_cas><![CDATA[" . $row_rst["cash"] . "]]></txt_cas>";
        $ResponseXML .= "<cmdbreligon><![CDATA[" . $row_rst["religon"] . "]]></cmdbreligon>";
        $ResponseXML .= "<RE_CHECHK><![CDATA[" . $row_rst["RE_CHECHK"] . "]]></RE_CHECHK>";
        $ResponseXML .= "<txttel><![CDATA[" . $row_rst["tel"] . "]]></txttel>";
      $ResponseXML .= "<pic><![CDATA[" . $row_rst["picture"] . "]]></pic>";

        $ResponseXML .= "<chk_list><![CDATA[";

        $sql_per = " delete from tmp_treatment where user_id = '" . $_SESSION["CURRENT_USER"] . "'";
        $result_per = mysqli_query($GLOBALS['dbinv'], $sql_per);

        $sql_treat = " select * from  tremas order by TDESCRIPT";
        //echo $sql_treat;
        $result_treat = mysqli_query($GLOBALS['dbinv'], $sql_treat);
        while ($row_treat = mysqli_fetch_array($result_treat)) {

            $sql_regtrn = " select * from  regtran where drefno='" . trim($row_rst["DREFNO"]) . "' and tcode='" . $row_treat["TCODE"] . "'";

            $result_regtrn = mysqli_query($GLOBALS['dbinv'], $sql_regtrn);
            if ($row_regtrn = mysqli_fetch_array($result_regtrn)) {
                //echo $sql_regtrn;	
                $ResponseXML .= "<input type=\"checkbox\" name=\"" . $row_treat["TCODE"] . "\" id=\"" . $row_treat["TCODE"] . "\" checked=\"checked\" onclick=\"treat_tmp_save('" . $row_treat["TCODE"] . "');\" />&nbsp;&nbsp;&nbsp;" . $row_treat["TDESCRIPT"] . "</br>";

                $sql_per = " insert into tmp_treatment(code, name, amount, user_id) values ('" . $row_treat["TCODE"] . "', '" . $row_treat["TDESCRIPT"] . "', " . $row_treat["TAMOUNT"] . ", '" . $_SESSION["CURRENT_USER"] . "')";
                $result_per = mysqli_query($GLOBALS['dbinv'], $sql_per);
                $TAMOUNT = $TAMOUNT + $row_treat["TAMOUNT"];
            } else {
                $ResponseXML .= "<input type=\"checkbox\" name=\"" . $row_treat["TCODE"] . "\" id=\"" . $row_treat["TCODE"] . "\" onclick=\"treat_tmp_save('" . $row_treat["TCODE"] . "');\" />&nbsp;&nbsp;&nbsp;" . $row_treat["TDESCRIPT"] . "</br>";
            }
        }
        $ResponseXML .= "]]></chk_list>";
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>