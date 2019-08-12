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
                             <td width=\"176\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Tele</font></td>
   							</tr>";
    $sdate = $_GET['sdate'];
    if ($_GET["mstatus"] == "invno") {
        $letters = $_GET['invno'];
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT code,testname,price from lab_test where  code like  '$letters%'  group by code,testname,price  order by code desc ") or die(mysqli_error());
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT code,testname,price from lab_test where testname like  '$letters%'  group by code,testname,price  order by code desc ") or die(mysqli_error()) or die(mysqli_error());
    } else {
        $letters = $_GET['invdate'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = mysqli_query($GLOBALS['dbinv'], "SELECT code,testname,price from lab_test where price like   '$letters%'  group by code,testname,price  order by code desc ") or die(mysqli_error()) or die(mysqli_error());
    }

 

    while ($row = mysqli_fetch_array($sql)) {
        
        $ResponseXML .=  "<tr>               
                              <td onclick=\"arnno_gin('" . $row['code'] . "');\">" . $row['code'] . "</a></td>";

                     $ResponseXML .= "<td onclick=\"arnno_gin('" . $row['code'] . "');\">" . $row["testname"] . "</a></td>";
                    //}	
                     $ResponseXML .= "<td onclick=\"arnno_gin('" . $row['code'] . "');\">" . $row['price'] . "</a></td>
                              
                            </tr>";                                                        	
                            
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
mysqli_close($GLOBALS['dbinv']);
?>
