<?php

session_start();


include_once("connection_i.php");




if ($_GET["Command"] == "pass_itno") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";


    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";



    $sql = mysqli_query($GLOBALS['dbinv'],"Select * from s_mas where STK_NO='" . $_GET['itno'] . "'") or die(mysqli_error());

    if ($row = mysqli_fetch_array($sql)) {


        $ResponseXML .= "<str_code><![CDATA[" . $row['STK_NO'] . "]]></str_code>";
        $ResponseXML .= "<str_description><![CDATA[" . $row['DESCRIPT'] . "]]></str_description>";
        $ResponseXML .= "<actual_selling><![CDATA[" . $row['SELLING'] . "]]></actual_selling>";


        $SELLING = $row['SELLING'];

        $ResponseXML .= "<str_selpri><![CDATA[" . number_format($SELLING, 2, ".", "") . "]]></str_selpri>";

        $ResponseXML .= "<group><![CDATA[" . $row['GROUP1'] . "]]></group>";
        $ResponseXML .= "<unit><![CDATA[" . $row['UNIT'] . "]]></unit>";
       

        $department = trim(substr($_GET["department"], 0, 2));


        $sql = mysqli_query($GLOBALS['dbinv'],"select QTYINHAND from s_submas where STK_NO='" . $_GET['itno'] . "' AND STO_CODE='" . $department . "'") or die(mysqli_error());
        
        if ($row = mysqli_fetch_array($sql)) {
            if (is_null($row["QTYINHAND"]) == false) {
                $ResponseXML .= "<qtyinhand><![CDATA[" . $row["QTYINHAND"] . "]]></qtyinhand>";
            } else {
                $ResponseXML .= "<qtyinhand><![CDATA[]]></qtyinhand>";
            }
        } else {
            $ResponseXML .= "<qtyinhand><![CDATA[]]></qtyinhand>";
        }

        $ResponseXML .= "<str_status><![CDATA[yes]]></str_status>";
    } else {
        $ResponseXML .= "<str_status><![CDATA[no]]></str_status>";
    }




    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>
