<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Medical Report</title>
        <style>
            .spn {
                border-bottom: 1px solid;
                border-left: 1px solid;
                border-right: 1px solid;
                width: 760px;
            }
            .lefts{
                float: right;
            }
        </style>
        <style>
            table
            {
                border-collapse:collapse;
            }
            table, td, th
            {

                font-family:Arial, Helvetica, sans-serif;
                padding:5px;
            }
            th
            {
                font-weight:bold;
                font-size:12px;

            }
            td
            {
                font-size:12px;

            }

            .headd 
            {
                font-size: 16px;
            }
            
            .th1 {
                border-top :none;
            }

            .th2 {
                border-bottom: none;
            }
            
        .style2 {font-size: 16px; font-weight: bold; }
		
		.style3 {font-size: 12px; font-weight: bold; }
		
        </style>
</head>

    <body> 
<center>
        <p>
          <?php
        include('connection.php');

		
		$sql_rege = "SELECT * from rege where DREFNO='" . trim($_GET["TXTREFNO"]) . "'  order by id";
		$result_rege=mysql_query($sql_rege, $dbinv);
		$row_rege = mysql_fetch_array($result_rege);
		
		$sql_para = "SELECT * from invpara ";
		$result_para=mysql_query($sql_para, $dbinv);
		$row_para = mysql_fetch_array($result_para);
	
	
       ?>
    </p>
        <table width="382" border="0">
          <tr>
            <td colspan="3" align="center"><span class="style2"><?php echo $row_para["COMPANY"]; ?></span></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><span class="style3"><?php echo $row_para["ADD1"]." ".$row_para["ADD2"]; ?></span></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><span class="style3"><?php echo $row_para["TELE"]; ?></span></td>
          </tr>
          <tr>
            <td colspan="3" align="center"><span class="style2">MEDICAL RECEIPT</span></td>
          </tr>
          <tr>
            <td width="135">Serial No</td>
            <td width="14">:</td>
            <td width="219"><?php  echo $row_rege["SERI_NO"]; ?></td>
          </tr>
          <tr>
            <td>Date</td>
            <td>:</td>
            <td><?php  echo $row_rege["SDATE"]; ?></td>
          </tr>
          <tr>
            <td>First Name</td>
            <td>:</td>
            <td><?php  echo trim($row_rege["initial"])." ".trim($row_rege["NAME"]); ?></td>
          </tr>
          <tr>
            <td>Passport No</td>
            <td>:</td>
            <td><?php  echo $row_rege["PA_NO"]; ?></td>
          </tr>
          <tr>
            <td>Amount</td>
            <td>:</td>
            <td><?php  echo $row_rege["AMOUNT"]; ?></td>
          </tr>
          <tr>
            <td>Paid</td>
            <td>:</td>
            <td><?php  echo ($row_rege["CASH"]+$row_rege["chkamt"]); ?></td>
          </tr>
          <tr>
            <td>Remarks</td>
            <td>:</td>
            <td><?php  echo $row_rege["CUS_REMARK"]; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">* Please Produce This Recipt To Collect Your Medical Report</td>
          </tr>
          <tr>
            <td>Agent</td>
            <td>:</td>
            <td><?php  echo $row_rege["AGNAME"]; ?></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table>
    <p>&nbsp;    </p>
</body>
</html>
