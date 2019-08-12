<?php

session_start();
date_default_timezone_set('Asia/Colombo');

include_once("connection_i.php");

if ($_GET["Command"] == "search_inv") {

    $ResponseXML = "";
    //$ResponseXML .= "<invdetails>";



    $ResponseXML .= "<table width=\"735\" border=\"0\" class=\"form-matrix-table\">
                            <tr>
                              <td width=\"121\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Ref No</font></td>
                              <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Name</font></td>
                             <td width=\"176\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Amount</font></td>
   							</tr>";
    $sdate = $_GET['sdate'];
    if ($_GET["mstatus"] == "invno") {
        $letters = $_GET['invno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        //$letters="/".$letters;
        //$a="SELECT * from s_salma where REF_NO like  '$letters%'";
        //echo $a;
        $sql = mysqli_query($GLOBALS['dbinv'],"SELECT * from pa_app where  serino like  '$letters%' and sdate = '" . $sdate . "' order by serino desc") or die(mysqli_error());
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysqli_query($GLOBALS['dbinv'],"SELECT * from pa_app where paname like  '$letters%' and sdate = '" . $sdate . "' order by serino desc") or die(mysqli_error()) or die(mysqli_error());
    } else {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysqli_query($GLOBALS['dbinv'],"SELECT * from pa_app where paname like   '$letters%' and sdate = '" . $sdate . "' order by serino desc") or die(mysqli_error()) or die(mysqli_error());
    }



    while ($row = mysqli_fetch_array($sql)) {
        $REF_NO = $row['refno'];
        $stname = "inv_mast";
        $ResponseXML .= "<tr>
                           	  <td onclick=\"arnno_gin('" . $row['refno'] . "');\">" . $row['serino'] . "</a></td>
                              <td onclick=\"arnno_gin('" . $row['refno'] . "');\">" . $row['paname'] . "</a></td>
                              <td onclick=\"arnno_gin('" . $row['refno'] . "');\">" . $row['totalamount'] . "</a></td>
                                                        	
                            </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}



mysqli_close($GLOBALS['dbinv']);

?>
