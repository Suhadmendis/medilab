<?php

session_start();


////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
include_once './connection.php';
date_default_timezone_set('Asia/Colombo');



if ($_GET["Command"] == "search_inv") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "select * from pa_app where sdate = '" . $_GET['txtdate'] . "' and serino= '" . $_GET['txtserino'] . "' and cancell=0";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<refno><![CDATA[" . $row["refno"] . "]]></refno>";
        $ResponseXML .= "<paname><![CDATA[" . $row["paname"] . "]]></paname>";
        $ResponseXML .= "<initial><![CDATA[" . $row["initial"] . "]]></initial>";
        $ResponseXML .= "<sex><![CDATA[" . $row["sex"] . "]]></sex>";
        $ResponseXML .= "<age><![CDATA[" . $row["age"] . "]]></age>";
    }

$sqltmp = "delete from tmpitem ";
 $result1 = mysqli_query($GLOBALS['dbinv'], $sqltmp);
    $sql = "select * from lab_test_pa_app_mas where refno = '" . $row['refno'] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    $ResponseXML .= "<itemdetal><![CDATA[<select multiple=\"multiple\" name=\"available\" id=\"available\" size=10>";

    while ($row1 = mysqli_fetch_array($result1)) {

        $ResponseXML .= "<option id=" . $row1["id"] . " value=" . $row1["testdes"] . " ondblclick=\"sel_one('" . $row1['id'] . "');\">" . $row1["STK_NO"] . " " . $row1["testdes"] . "</option>";
    }

    $ResponseXML .= "</select>]]></itemdetal>";
    $ResponseXML .= "</salesdetails>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "sel_one") {

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $sqltmp = "delete from tmpitem where itemcode='" . $_GET["cdata"] . "'";

    $resulttmp = mysqli_query($GLOBALS['dbinv'], $sqltmp);

    $sql = "select * from lab_test_pa_app_mas where id='" . $_GET["cdata"] . "'";
     
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        $sqltmp = "insert into tmpitem(itemcode, name) values ('" . $_GET["cdata"] . "', '" . $row["testdes"] . "')";
         
        $resulttmp = mysqli_query($GLOBALS['dbinv'], $sqltmp);
    }

    $ResponseXML = "";
    $ResponseXML .= "<mapdetails>";

    $ResponseXML .= "<rep_sel><![CDATA[<select multiple=\"multiple\" name=\"selectedit\" id=\"selectedit\" size=\"10\">";
    $sql = "select itemcode, name from tmpitem";
     
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {
        $ResponseXML .= "<option id=" . $row["itemcode"] . " value=" . $row["itemcode"] . " ondblclick=\"desel_one('" . $row['itemcode'] . "');\">" .  $row["name"] . "</option>";
    }

    $ResponseXML .= "</select>]]></rep_sel>";
    $ResponseXML .= "</mapdetails>";

    echo $ResponseXML;
}

if ($_GET["Command"]=="desel_one"){
	
	header('Content-Type: text/xml'); 
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
	
	$sqltmp="delete from tmpitem where itemcode='".$_GET["cdata"]."'";
	 
	$result = mysqli_query($GLOBALS['dbinv'], $sqltmp);
	
	
	$ResponseXML = "";
	$ResponseXML .= "<mapdetails>";

	$ResponseXML .= "<rep_sel><![CDATA[<br><select multiple=\"multiple\" name=\"selectedit\" id=\"selectedit\" size=\"10\">";
 $sql="select itemcode, name from tmpitem";
 
   $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {
        
    
			$ResponseXML .= "<option id=".$row["itemcode"]." value=".$row["itemcode"]." ondblclick=\"desel_one('".$row['itemcode']."');\">".$row["name"]."</option>";
		}		
	
	$ResponseXML .= "</select>]]></rep_sel>";
	$ResponseXML .= "</mapdetails>";
	
	echo $ResponseXML;
	
}

mysqli_close($GLOBALS['dbinv']);

