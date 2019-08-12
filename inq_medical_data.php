<?php

session_start();

////////////////////////////////////////////// Database Connector /////////////////////////////////////////////////////////////
////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
header('Content-Type: text/xml');
include_once 'connection_i.php';
date_default_timezone_set('Asia/Colombo');

/////////////////////////////////////// GetValue //////////////////////////////////////////////////////////////////////////
///////////////////////////////////// Registration /////////////////////////////////////////////////////////////////////////







if ($_GET["Command"] == "del_item") {
    $sql = "delete from pa_disapp where id = '" . $_GET['id'] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $sql = "select * from pa_disapp where fileno = '" . $_GET['txtrefno'] . "' order by id desc";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);

    $tb = "<table>";
    $tb .= "<tr><td>Date</td>";
    $tb .= "<td>Percentage</td>";
    $tb .= "<td>User</td><td>Remove</td></tr>";
    while ($row = mysqli_fetch_array($result1)) {
        $tb .= "<tr><td>" . $row['sdate'] . "</td>";
        $tb .= "<td>" . $row['appp'] . "</td>";
        $tb .= "<td>" . $row['user_nm'] . "</td>";
        $tb .= "<td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row['id'] . "');\" name=\'" . $id . "'\" id=\'" . $id . "'\" src=\"images/delete_01.png\"></td>";
        $tb .= "</tr>";
    }

    $tb .= "</table>";

    echo $tb;
}


if ($_GET["Command"] == "assn_med_entry") {

    include('connection.php');

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";



    $sql_rst = "select * from rege where PA_NO='" . trim($_GET["txt_pano"]) . "' order by SDATE desc";
    $result_rst = mysql_query($sql_rst, $dbinv);
    if ($row_rst = mysql_fetch_array($result_rst)) {
        $i = 1;


        $result_rst = mysql_query($sql_rst, $dbinv);

        if ($row_rst = mysql_fetch_array($result_rst)) {





            $sql_rsemas = "select sum(GRAND_TOT) as tot, sum(TOTPAY) pay from s_salma where C_CODE = '" . trim($row_rst["CODE"]) . "'";
            //echo $sql_rsemas;
            $result_rsemas = mysql_query($sql_rsemas, $dbinv);
            if ($row_rsemas = mysql_fetch_array($result_rsemas)) {
                $ResponseXML .= "<txttotam><![CDATA[" . $row_rsemas["tot"] . "]]></txttotam>";
                $ResponseXML .= "<txtpaid><![CDATA[" . $row_rsemas["pay"] . "]]></txtpaid>";

                $txtbal = $row_rsemas["tot"] - $row_rsemas["pay"];
                $ResponseXML .= "<txtbal><![CDATA[" . $txtbal . "]]></txtbal>";
            } else {
                $ResponseXML .= "<txttotam><![CDATA[]]></txttotam>";
                $ResponseXML .= "<txtpaid><![CDATA[]]></txtpaid>";
                $ResponseXML .= "<txtbal><![CDATA[]]></txtbal>";
            }

            if (is_null($row_rst["PA_NO"]) == false) {
                $ResponseXML .= "<lblppno><![CDATA[" . $row_rst["PA_NO"] . "]]></lblppno>";
            }
            if (is_null($row_rst["PA_NO"]) == false) {
                $ResponseXML .= "<txt_pano><![CDATA[" . $row_rst["PA_NO"] . "]]></txt_pano>";
            }
            if (is_null($row_rst["CMB_NO"]) == false) {
                $ResponseXML .= "<lblcmb><![CDATA[" . $row_rst["CMB_NO"] . "]]></lblcmb>";
            }

            /* $sql_rsp = "select * from phtooo where drefno = '" & Trim(rst!Drefno) & "'";
              $result_rsp=mysql_query($sql_rsp, $dbinv);
              if($row_rsp = mysql_fetch_array($result_rsp)){
              if (is_null($row_rsp!pic) Then
              Kill app.Path & "\*.jpg"
              Set mstream = New ADODB.Stream
              mstream.Type = adTypeBinary
              mstream.Open
              mstream.Write = rsp.Fields("pic").Value
              mstream.SaveToFile (app.Path & "\0Preview.jpg")
              Picture1.Picture = LoadPicture(app.Path & "\0Preview.jpg")

              mstream.Close
              Else
              Set Picture1.Picture = Nothing
              End If
              End If
              lblerr:
              If Err Then
              MsgBox Err.Description
              End If */

            if (is_null($row_rst["SDATE"]) == false) {
                $ResponseXML .= "<lbldate><![CDATA[" . $row_rst["SDATE"] . "]]></lbldate>";
            }

            $lblname = trim($row_rst["initial"]) . $row_rst["NAME"];
            $ResponseXML .= "<lblname><![CDATA[" . $lblname . "]]></lblname>";

            if (is_null($row_rst["CUS_REMARK"]) == false) {
                $ResponseXML .= "<lblcus_remark><![CDATA[" . $row_rst["CUS_REMARK"] . "]]></lblcus_remark>";
            }
            if (is_null($row_rst["SERI_NO"]) == false) {
                $ResponseXML .= "<lblserino><![CDATA[" . $row_rst["SERI_NO"] . "]]></lblserino>";
            }
            if (is_null($row_rst["GCC_NO"]) == false) {
                $ResponseXML .= "<lblGAMCANo><![CDATA[" . $row_rst["GCC_NO"] . "]]></lblGAMCANo>";
            }
            if (is_null($row_rst["AGE_Y"]) == false) {
                $lblage = $row_rst["AGE_Y"] . " Yrs";
                $ResponseXML .= "<lblage><![CDATA[" . $lblage . "]]></lblage>";
            }
            if (is_null($row_rst["AGNAME"]) == false) {
                $ResponseXML .= "<lblagen><![CDATA[" . $row_rst["AGNAME"] . "]]></lblagen>";
            }
            if (is_null($row_rst["XRAYNO"]) == false) {
                $ResponseXML .= "<lblxrayno><![CDATA[" . $row_rst["XRAYNO"] . "]]></lblxrayno>";
            }
            if (is_null($row_rst["CMB_NO"]) == false) {
                if ($row_rst["reject"] == "P") {
                    $lblreg = "  Pending";
                }
            }
            if (is_null($row_rst["AMOUNT"]) == false) {
                $ResponseXML .= "<LblAmount><![CDATA[" . $row_rst["AMOUNT"] . "]]></LblAmount>";
            }
            if (is_null($row_rst["religon"]) == false) {
                $ResponseXML .= "<cmdbreligon><![CDATA[" . $row_rst["religon"] . "]]></cmdbreligon>";
            }
            if (is_null($row_rst["POS_APP"]) == false) {
                $ResponseXML .= "<txtPOS_APP><![CDATA[" . $row_rst["POS_APP"] . "]]></txtPOS_APP>";
            }
            if (is_null($row_rst["tel"]) == false) {
                $ResponseXML .= "<txttel><![CDATA[" . $row_rst["tel"] . "]]></txttel>";
            }
            if (is_null($row_rst["CMB_NO"]) == false) {
                $ResponseXML .= "<lblcmb><![CDATA[" . $row_rst["CMB_NO"] . "]]></lblcmb>";
            }

            if (($row_rst["COUNTRY"] != 7) and ( $row_rst["COUNTRY"] != 8)) {
                $sql_sumedi = "select * from sumedi where DREFNO='" . trim($row_rst["DREFNO"]) . "'";
                $result_sumedi = mysql_query($sql_sumedi, $dbinv);
                if ($row_sumedi = mysql_fetch_array($result_sumedi)) {

                   
                        $ResponseXML .= "<Text1><![CDATA[" . $row_sumedi["darem1"] . "]]></Text1>";
                    
                        $ResponseXML .= "<Text2><![CDATA[" . $row_sumedi["darem2"] . "]]></Text2>";
                   
                        $ResponseXML .= "<Text3><![CDATA[" . $row_sumedi["darem3"] . "]]></Text3>";
                    
                        $ResponseXML .= "<Text4><![CDATA[" . $row_sumedi["rem1np"] . "]]></Text4>";
                    
                        $ResponseXML .= "<Text5><![CDATA[" . $row_sumedi["rem2np"] . "]]></Text5>";
                    
                        $ResponseXML .= "<Text6><![CDATA[" . $row_sumedi["larem1"] . "]]></Text6>";
                   
                        $ResponseXML .= "<Text7><![CDATA[" . $row_sumedi["larnp1"] . "]]></Text7>";
                    
                        $ResponseXML .= "<Text8><![CDATA[" . $row_sumedi["labrem"] . "]]></Text8>";
                    
                        $ResponseXML .= "<Text9><![CDATA[" . $row_sumedi["xarem1"] . "]]></Text9>";
                   
                        $ResponseXML .= "<Text10><![CDATA[" . $row_sumedi["xaremnp"] . "]]></Text10>";
                    
                        $lblreg = $row_sumedi["fres"];
                    
                }
            }

            $ResponseXML .= "<lblreg><![CDATA[" . $lblreg . "]]></lblreg>";
            $ResponseXML .= "<pic><![CDATA[" . $row_rst["picture"] . "]]></pic>";

            //}
            //$Drefno = trim($row_rst["DREFNO"]);
            $i = $i + 1;
        }

        /* $sql_rst = "select * from delmas where drefno='" . trim(cmbdrefno) & "'", DN.CON
          If Not rst.EOF Then
          Label19.Caption = "Issued " + Trim(rst!remarks)
          Label19.Visible = True
          Else
          Label19.Caption = "NT. Issued"
          End If
          rst.Close
          Label19.Refresh */

        $ResponseXML .= " </salesdetails>";
        echo $ResponseXML;
    } else {
        exit("Sorry Passport Not Found");
    }
}

if ($_GET["Command"] == "search_inv") {

    include('connection.php');

    $sql_rst = "select * from tremas order by TDESCRIPT";


    $ResponseXML .= "";
    //$ResponseXML .= "<invdetails>";



    $ResponseXML .= "<table width=\"1000\" border=\"0\" class=\"form-matrix-table\">
                            <tr>
                              <td width=\"190\" ><font color=\"#FFFFFF\">PP No</font></td>
                              <td width=\"190\"><font color=\"#FFFFFF\">PA No</font></td>
                              <td width=\"190\"><font color=\"#FFFFFF\">CMB No</font></td>
                              <td width=\"270\"><font color=\"#FFFFFF\">Name</font></td>
                              <td width=\"100\"><font color=\"#FFFFFF\">Date</font></td>
						</tr>";

    if ($_GET["mstatus"] == "txtppno") {
        $letters = $_GET['txtppno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        //$letters="/".$letters;
        //$a="SELECT * from s_salma where REF_NO like  '$letters%'";
        //echo $a;
        $sql = "select DREFNO, PA_NO, CMB_NO, NAME, SDATE  from rege where DREFNO like  '$letters%' ORDER BY PA_NO limit 50 ";
    } else if ($_GET["mstatus"] == "txtpano") {
        $letters = $_GET['txtpano'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select DREFNO, PA_NO, CMB_NO, NAME, SDATE  from rege where PA_NO like  '$letters%' ORDER BY PA_NO limit 50 ";
    } else if ($_GET["mstatus"] == "cmbno") {
        $letters = $_GET['cmbno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select DREFNO, PA_NO, CMB_NO, NAME, SDATE  from rege where CMB_NO like  '$letters%' ORDER BY PA_NO limit 50 ";
    } else if ($_GET["mstatus"] == "name") {
        $letters = $_GET['name'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select DREFNO, PA_NO, CMB_NO, NAME, SDATE  from rege where  NAME like  '$letters%' ORDER BY PA_NO limit 50 ";
    } else {
        $letters = $_GET['txtppno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        //$letters="/".$letters;
        //$a="SELECT * from s_salma where REF_NO like  '$letters%'";
        //echo $a;
        $sql = "select DREFNO, PA_NO, CMB_NO, NAME, SDATE  from rege where CMB_NO<>'0' and DREFNO like  '$letters%' ORDER BY PA_NO limit 50 ";
    }


    $result = mysql_query($sql, $dbinv);
    while ($row = mysql_fetch_array($result)) {

        $REF_NO = $row['REF_NO'];
        $stname = "inv_mast";

        if ($_GET["stname"] == "inq_med") {

            $ResponseXML .= "<tr>               
                              	<td onclick=\"assn_med_entry('" . $row['PA_NO'] . "');\">" . $row['DREFNO'] . "</a></td>
							 	 <td onclick=\"assn_med_entry('" . $row['PA_NO'] . "');\">" . $row['PA_NO'] . "</a></td>
							  	<td onclick=\"assn_med_entry('" . $row['PA_NO'] . "');\">" . $row['CMB_NO'] . "</a></td>
							  	<td onclick=\"assn_med_entry('" . $row['PA_NO'] . "');\">" . $row['NAME'] . "</a></td>
							  	<td onclick=\"assn_med_entry('" . $row['PA_NO'] . "');\">" . $row['SDATE'] . "</a></td>
                            	</tr>";
        }
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
	
	
