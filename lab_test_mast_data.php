<?php

session_start();

////////////////////////////////////////////// Database Connector ////////////////////////////////////////////////////////////


////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

include_once("connection_i.php");



if ($_GET["Command"] == "new_inv") {
$sql = "Select * from invpara";

$result = mysqli_query($GLOBALS['dbinv'], $sql);
$row = mysqli_fetch_array($result);

$ResponseXML = "";
$ResponseXML .= "<salesdetails>";
$ResponseXML .= "<labtest><![CDATA[" . $row["labtest"] . "]]></labtest>";
$ResponseXML .= "<txtdate><![CDATA[" . date("Y-m-d") . "]]></txtdate>";
$ResponseXML .= "<tmpno><![CDATA[" . $row["tmplabtest"] . "]]></tmpno>";
$sql = "delete from tmp_lab_test_data where code = '" . $row["labtest"] . "' ";
$result1 = mysqli_query($GLOBALS['dbinv'], $sql);

$sql = "update invpara set tmplabtest=tmplabtest+1";
$result = mysqli_query($GLOBALS['dbinv'], $sql);

$ResponseXML .= "</salesdetails>";
echo $ResponseXML;
}


if ($_GET["Command"] == "add_tmp") {

$sql = "insert into tmp_lab_test_data(code, test_desc, munit, range_from, range_to, under_range, exceed_range, normal_range, female_range_from, female_range_to, range_sep, mtype, under, user_id,tmpno) values "
. "('" . $_GET["code"] . "', '" . $_GET["test_desc"] . "', '" . $_GET["unit"] . "', '" . $_GET["range_from"] . "', '" . $_GET["range_to"] . "', '" . $_GET["under_range"] . "', '" . $_GET["exceed_range"] . "', '" . $_GET["normal_range"] . "', '" . $_GET["female_from"] . "', '" . $_GET["female_to"] . "', '" . $_GET["range_seprater"] . "', '" . $_GET["mtype"] . "', '" . $_GET["underline"] . "', '" . $_SESSION["CURRENT_USER"] . "','" . $_GET["tmpno"] . "')";
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";


$ResponseXML = "";
$ResponseXML .= "<salesdetails>";
$result = mysqli_query($GLOBALS['dbinv'], $sql);

$ResponseXML .= "<sales_table><![CDATA[<table>
                               <tr>
                              	<td width=\"200\"><font color=\"#FFFFFF\">Test Description</font></td>
                              	<td width=\"50\"><font color=\"#FFFFFF\">Unit</font></td>
                              	<td width=\"100\"><font color=\"#FFFFFF\">Range From</font></td>
                              	<td width=\"100\"><font color=\"#FFFFFF\">Range To</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Under The Range Message</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Exceed the Range Message</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Normal Range</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Female Range From</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Female Range To</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Range Seperator</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Type</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Underline</font></td>
                           	  </tr> ";



$mcou = 0;
$sql = "Select count(*) as mcou from tmp_lab_test_data where tmpno='" . $_GET['tmpno'] . "'";
$result = mysqli_query($GLOBALS['dbinv'], $sql);
$row = mysqli_fetch_array($result);
$mcou = ($row["mcou"] + 1);

$i = 1;
$tot = 0;
$sql = "Select * from tmp_lab_test_data where  tmpno='" . $_GET['tmpno'] . "' order by id";
$result = mysqli_query($GLOBALS['dbinv'], $sql);

while ($row = mysqli_fetch_array($result)) {

$test_desc = "test_desc" . $i;
$unit = "unit" . $i;
$range_from = "range_from" . $i;
$range_to = "range_to" . $i;
$under_range = "under_range" . $i;
$exceed_range = "exceed_range" . $i;
$normal_range = "normal_range" . $i;
$female_from = "female_from" . $i;
$female_to = "female_to" . $i;
$range_seprater = "range_seprater" . $i;
$mtype = "mtype" . $i;
$underline = "underline" . $i;

$ResponseXML .= "<tr>                              
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $test_desc . "\" id=\"" . $test_desc . "\" value='" . $row['test_desc'] . "' class=\"text_purchase3\" /></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $unit . "\" id=\"" . $unit . "\"  value='" . $row['munit'] . "' class=\"text_purchase3\" /></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $range_from . "\" id=\"" . $range_from . "\"  value='" . $row['range_from'] . "' class=\"text_purchase3\" /></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $range_to . "\" id=\"" . $range_to . "\" value='" . $row['range_to'] . "'  class=\"text_purchase3\"/></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $under_range . "\" id=\"" . $under_range . "\" value='" . $row['under_range'] . "'  class=\"text_purchase3\" onBlur=\"cal_subtot('" . $i . "', '" . $mcou . "');\"/></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $exceed_range . "\" id=\"" . $exceed_range . "\" value='" . $row['exceed_range'] . "'  class=\"text_purchase3\" onBlur=\"cal_subtot('" . $i . "', '" . $mcou . "');\"/></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $normal_range . "\" id=\"" . $normal_range . "\" value='" . $row['normal_range'] . "'  class=\"text_purchase3\"/></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $female_from . "\" id=\"" . $female_from . "\" value='" . $row['female_range_from'] . "'  class=\"text_purchase3\" /></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $female_to . "\" id=\"" . $female_to . "\" value='" . $row['female_range_to'] . "'  class=\"text_purchase3\" /></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $range_seprater . "\" id=\"" . $range_seprater . "\" value='" . $row['range_sep'] . "'  class=\"text_purchase3\" /></td>
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $mtype . "\" id=\"" . $mtype . "\" value='" . $row['mtype'] . "'  class=\"text_purchase3\" /></td>							
                             <td  ><input type=\"text\" size=\"15\" name=\"" . $underline . "\" id=\"" . $underline . "\" value='" . $row['under'] . "'  class=\"text_purchase3\"/></td>							     
</tr>";


$i = $i + 1;
}

$ResponseXML .= "</table>]]></sales_table>";
$ResponseXML .= "<coun><![CDATA[" . $mcou . "]]></coun>";
$ResponseXML .= "</salesdetails>";
echo $ResponseXML;
}



if ($_POST["Command"] == "save_item") {

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


$sql = "select * from lab_test where tmpno= '" . $_POST["tmpno"] . "'";
$result1 = mysqli_query($GLOBALS['dbinv'], $sql);
$mrows = mysqli_num_rows($result1);



if ($mrows ==0) {
$sql1 = "update invpara set labtest=labtest+1";
$result1 = mysqli_query($GLOBALS['dbinv'], $sql);
}

$sql = "delete from lab_test where tmpno='" . $_POST["tmpno"] . "'";
$result1 = mysqli_query($GLOBALS['dbinv'], $sql);



$sql = "select * from tmp_lab_test_data where tmpno='" . $_POST['tmpno'] . "' order by id";

$result = mysqli_query($GLOBALS['dbinv'], $sql);
$mocu = (mysqli_num_rows($result) + 1);



$i = 1;
 
while ($i < $mocu) {

$test_desc = "test_desc" . $i;
$unit = "unit" . $i;
$range_from = "range_from" . $i;
$range_to = "range_to" . $i;
$under_range = "under_range" . $i;
$exceed_range = "exceed_range" . $i;
$normal_range = "normal_range" . $i;
$female_from = "female_from" . $i;
$female_to = "female_to" . $i;
$range_seprater = "range_seprater" . $i;
$mtype = "mtype" . $i;
$underline = "underline" . $i;



$sql = "insert into lab_test (testname,code,des,unit,rfrom,rto,rfrom_msg,rto_msg,rnorm,price,rfromfe,rtofe,rangesep,tmpno,bgroup) values"
. " ('" . $_POST["name"] . "','" . $_POST["code"] . "','" . $_POST[$test_desc] . "','" . $_POST[$unit] . "','" . $_POST[$range_from] . "','" . $_POST[$range_to] . "','" . $_POST[$under_range] . "'"
. ",'" . $_POST[$exceed_range] . "','" . $_POST[$normal_range] . "','" . $_POST["price"] . "','" . $_POST[$female_from] . "','" . $_POST[$female_to] . "','" . $_POST[$range_seprater] . "','" . $_POST["tmpno"] . "','" . $_POST["test_grp"] . "') ";

$result1 = mysqli_query($GLOBALS['dbinv'], $sql);



$i = $i + 1;
}









echo "Saved";
}




if ($_GET["Command"] == "pass_arnno_gin") {
header('Content-Type: text/xml');
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
$ResponseXML = "";
$ResponseXML .= "<salesdetails>";
$sql = "Select * from lab_test where code='" . $_GET['arnno'] . "' order by id";
$result = mysqli_query($GLOBALS['dbinv'], $sql);
while ($row = mysqli_fetch_array($result)) {
$ResponseXML .= "<code><![CDATA[" . $row["code"] . "]]></code>";
$ResponseXML .= "<name><![CDATA[" . $row["testname"] . "]]></name>";
$ResponseXML .= "<price><![CDATA[" . $row["price"] . "]]></price>";
$ResponseXML .= "<tmpno><![CDATA[" . $row["tmpno"] . "]]></tmpno>";
$ResponseXML .= "<test_grp><![CDATA[" . $row["bgroup"] . "]]></test_grp>";



$mcou = 0;
$sql = "Select count(*) as mcou from lab_test where code='" . $_GET['arnno'] . "'";
$result2 = mysqli_query($GLOBALS['dbinv'], $sql);
$row2 = mysqli_fetch_array($result2);
$mcou = $row2["mcou"] + 1;

$ResponseXML .= "<coun><![CDATA[" . $mcou . "]]></coun>";

$ResponseXML .= "<sales_table><![CDATA[<table>
          <tr>
                              	<td width=\"200\"><font color=\"#FFFFFF\">Test Description</font></td>
                              	<td width=\"50\"><font color=\"#FFFFFF\">Unit</font></td>
                              	<td width=\"100\"><font color=\"#FFFFFF\">Range From</font></td>
                              	<td width=\"100\"><font color=\"#FFFFFF\">Range To</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Under The Range Message</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Exceed the Range Message</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Normal Range</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Female Range From</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Female Range To</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Range Seperator</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Type</font></td>
                                <td width=\"100\"><font color=\"#FFFFFF\">Underline</font></td>
                           	  </tr> ";





$i = 1;
$tot = 0;



$sql = "delete  from tmp_lab_test_data where code='" . $_GET['arnno'] . "'";
$result = mysqli_query($GLOBALS['dbinv'], $sql);


$sql = "Select * from lab_test where code='" . $_GET['arnno'] . "' order by id";
$result = mysqli_query($GLOBALS['dbinv'], $sql);

while ($row = mysqli_fetch_array($result)) {
$urdt[] =  "('" . $row["code"] . "', '" . $row["des"] . "', '" . $row["unit"] . "', '" . $row["rfrom"] . "', '" . $row["rto"] . "', '" . $row["rfrom_msg"] . "', '" . $row["rto_msg"] . "', '" . $row["rnorm"] . "', '" . $row["rfromfe"] . "', '" . $row["rtofe"] . "', '" . $row["rangesep"] . "', '" . $row["h"] . "', '" . $row["u"] . "', '" . $_SESSION["CURRENT_USER"] . "','" . $row["tmpno"] . "')";
}
$sql= "insert into tmp_lab_test_data(code, test_desc, munit, range_from, range_to, under_range, exceed_range, normal_range, female_range_from, female_range_to, range_sep, mtype, under, user_id,tmpno) values " . implode(",", $urdt);

$result = mysqli_query($GLOBALS['dbinv'], $sql);



$sql = "Select * from lab_test where code='" . $_GET['arnno'] . "' order by id";
$result = mysqli_query($GLOBALS['dbinv'], $sql);

while ($row = mysqli_fetch_array($result)) {
$test_desc = "test_desc" . $i;
$unit = "unit" . $i;
$range_from = "range_from" . $i;
$range_to = "range_to" . $i;
$under_range = "under_range" . $i;
$exceed_range = "exceed_range" . $i;
$normal_range = "normal_range" . $i;
$female_from = "female_from" . $i;
$female_to = "female_to" . $i;
$range_seprater = "range_seprater" . $i;
$mtype = "mtype" . $i;
$underline = "underline" . $i;

$ResponseXML .= "<tr>                              
                             <td  ><input type=\"text\" size=\"15\" name=" . $test_desc . " id=" . $test_desc . "   value='" . $row['des'] . "' class=\"text_purchase3\" /></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $unit . " id=" . $unit . "  value='" . $row['unit'] . "' class=\"text_purchase3\" /></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $range_from . " id=" . $range_from . "  value='" . $row['rfrom'] . "' class=\"text_purchase3\" /></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $range_to . " id=" . $range_to . " value='" . $row['rto'] . "'  class=\"text_purchase3\"/></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $under_range . " id=" . $under_range . " value='" . $row['rfrom_msg'] . "'  class=\"text_purchase3\" onBlur=\"cal_subtot('" . $i . "', '" . $mcou . "');\"/></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $exceed_range . " id=" . $exceed_range . " value='" . $row['rto_msg'] . "'  class=\"text_purchase3\" onBlur=\"cal_subtot('" . $i . "', '" . $mcou . "');\"/></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $normal_range . " id=" . $normal_range . " value='" . $row['rnorm'] . "'  class=\"text_purchase3\"/></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $female_from . " id=" . $female_from . " value='" . $row['rfromfe'] . "'  class=\"text_purchase3\" /></td>
							 <td  ><input type=\"text\" size=\"15\" name=" . $female_to . " id=" . $female_to . " value='" . $row['rtofe'] . "'  class=\"text_purchase3\" /></td>
                                                         <td  ><input type=\"text\" size=\"15\" name=" . $range_seprater . " id=" . $range_seprater . " value='" . $row['rangesep'] . "'  class=\"text_purchase3\" /></td>
                                                         <td  ><input type=\"text\" size=\"15\" name=" . $mtype . " id=" . $mtype . " value='" . $row['h'] . "'  class=\"text_purchase3\" /></td>							
                                                         <td  ><input type=\"text\" size=\"15\" name=" . $underline . " id=" . $underline . " value='" . $row['u'] . "'  class=\"text_purchase3\"/></td>							     
</tr>";


$i = $i + 1;
}

$ResponseXML .= "</table>]]></sales_table>";
}

$ResponseXML .= "</salesdetails>";
echo $ResponseXML;
}


if ($_GET["Command"] == "cancel_inv") {
    
    
    
$sql = "delete  from lab_test where code='" . $_GET['arnno'] . "'";
$result = mysqli_query($GLOBALS['dbinv'], $sql);


echo "Record Deleted";
    
}

mysqli_close($GLOBALS['dbinv']);
?>