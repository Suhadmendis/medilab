<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Channel Summery</title>

        <style>
            table
            {
                border-collapse:collapse;
            }
            table, td, th
            {
                border:1px solid black;
                font-family:Arial, Helvetica, sans-serif;
                padding:5px;
            }
            th
            {
                font-weight:bold;
                font-size:12x;

            }
            td
            {
                font-size:12px;

            }
        </style>
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/jquery-ui.js"></script>

        <script  type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
        <script  type="text/javascript" src="js/jquery-ui-1.8.14.custom.min.js"></script>

        <script src="charts/js/highcharts.js"></script>
        <script src="charts/js/modules/data.js"></script>
        <script src="charts/js/modules/exporting.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {

                $('#container').highcharts({
                    data: {
                        table: document.getElementById('datatable')
                    },
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Top 10 Customers'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Amount'
                        }
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                                    this.y + ' ' + this.x.toLowerCase();
                        }
                    }
                });

            });
        </script>

        <style>
            #summ {
                display: none;
            }
        </style>
    </head>

    <body>

        <?php
        require_once("config.inc.php");
        require_once("DBConnector.php");
        $db = new DBConnector();


        $sql_head = "select * from invpara";
        $result_head = $db->RunQuery($sql_head);
        $row_head = mysql_fetch_array($result_head);

 
            echo "<center><span class=\"style1\"><b>" . $row_head["COMPANY"] . "</b></center><br>";

            echo "<center><b>Lab Reports - " .  $_GET['doctor'] . " From " . $_GET['dte_from'] . " To " . $_GET['dte_to'] . "</b><br><br>";

            echo "<center><table width='650' border=1>
            <tr>
		<th width='50'>S.No</th>
                <th width='50'>Reg.Date</th>
                <th width='180'>Patient Name</th>
                <th width='120'>Test Name</th>
                <th width='80'>Status</th>
                 
                </tr>";

            $sql = "select * from view_pa_app_lab_mas where sdate ='" . $_GET['dte_from'] . "' and cancell='0' order by sdate,serino";
            
            $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
            while ($row_head = mysql_fetch_array($result_head)) {
                echo "<tr>";
                echo "<td>" . $row_head['serino'] . "</td>";
                echo "<td>" . $row_head['sdate'] . "</td>";
                echo "<td>" . $row_head['inital'] . $row_head['paname'] . "</td>";
                echo "<td>" . $row_head['testdes'] . "</td>";

                
                
                  $sql = "select * from lab_test_pa_app_trn where refno ='" . $row_head['refno'] . "' and test_code = '". $row_head['testcode'] . "'  ";
    
                  $result_head1 = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                 $td= "";
                 if (mysql_num_rows($result_head1) ==0) { $td = "Pending"; }
                 
                 
                    echo "<td  align='right'>" . $td . "</td>";
                 
                 

                echo "</tr>";
            }
         ?>

    </body>
</html>    

