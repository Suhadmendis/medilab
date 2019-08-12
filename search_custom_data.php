<?php

session_start();


include_once("connection_i.php");







if ($_GET["Command"] == "pass_quot") {




    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];
    $sql = mysqli_query($GLOBALS['dbinv'],"Select * from vendor where CODE='" . $cuscode . "'") or die(mysqli_error());
    if ($row = mysqli_fetch_array($sql)) {

        $ResponseXML .= "<id><![CDATA[" . $row['CODE'] . "]]></id>";
        $ResponseXML .= "<str_customername><![CDATA[" . $row['NAME'] . "]]></str_customername>";
        $address = $row['ADD1'] . ",  " . $row['ADD2'];
        $ResponseXML .= "<str_address><![CDATA[" . $address . "]]></str_address>";
        $ResponseXML .= "<str_vatno><![CDATA[" . $row["vatno"] . "]]></str_vatno>";
        $ResponseXML .= "<str_svatno><![CDATA[" . $row["svatno"] . "]]></str_svatno>";
        $ResponseXML .= "<AltMessage><![CDATA[" . $row["AltMessage"] . "]]></AltMessage>";
    }



    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>
