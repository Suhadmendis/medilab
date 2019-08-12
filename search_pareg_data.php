<?php

session_start();
date_default_timezone_set('Asia/Colombo');

include_once("connection.php");

if ($_GET["Command"] == "search_inv") {

    $ResponseXML = "";
    //$ResponseXML .= "<invdetails>";



    $ResponseXML .= "<table width=\"735\" border=\"0\" class=\"form-matrix-table\">
                            <tr>
                              <td width=\"121\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Ref No</font></td>
                              <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Name</font></td>
                             <td width=\"176\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Tele</font></td>
   							</tr>";
    $sdate = $_GET['sdate'];
    if ($_GET["mstatus"] == "invno") {
        $letters = $_GET['invno'];
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT * from pa_reg where  refno like  '$letters%'  order by id desc") or die(mysqli_error());
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT * from pa_reg where paname like  '$letters%'  order by id desc") or die(mysqli_error()) or die(mysqli_error());
    } else {
        $letters = $_GET['invdate'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT * from pa_reg where tele like   '$letters%'   order by id desc") or die(mysqli_error()) or die(mysqli_error());
    }



    while ($row = mysqli_fetch_array($sql)) {
        $REF_NO = $row['refno'];
        $stname = "inv_mast";
        $ResponseXML .= "<tr>
                           	  <td onclick=\"arnno_gin('" . $row['refno'] . "','" . $_GET['stname'] ."');\">" . $row['refno'] . "</a></td>
                              <td onclick=\"arnno_gin('" . $row['refno'] . "','" . $_GET['stname'] ."');\">" . $row['paname'] . "</a></td>
                              <td onclick=\"arnno_gin('" . $row['refno'] . "','" . $_GET['stname'] ."');\">" . $row['tele'] . "</a></td>
                                                        	
                            </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
mysqli_close($GLOBALS['dbinv']);
?>
