<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Issued Summery</title>

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
                font-size:12px;

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

        echo "<center><b>FIT - UNFIT Summery - From " . $_GET['dte_from'] . " To " . $_GET['dte_to'] . "</b><br><br>";
        echo "<center><b>Status - " . $_GET['typeg'] . " Country - " . $_GET['txt_countna'] . "</b><br><br>";
        echo "<center><table width='650' border=1>
            <tr>
		<th width='80'>S.No</th>
                <th width='80'>Ref No</th>
                <th width='80'>Passport No</th>
                <th width='250'>Name</th>
                <th width='150'>Date</th>              
                </tr>";

        $sql = "select * from rege where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' ";


        if ($_GET['txt_countna'] != "") {
            $sql .= " and cou_name='" . $_GET['txt_countna'] . "'";
        }
        $sql .= "   order by sdate,seri_no";

        $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
        while ($row_head = mysql_fetch_array($result_head)) {
            echo "<tr>";
            echo "<td>" . $row_head['SERI_NO'] . "</td>";
            echo "<td>" . $row_head['DREFNO'] . "</td>";
            echo "<td>" . $row_head['PA_NO'] . "</td>";
            echo "<td>";
            echo $row_head['inital'] . $row_head['NAME'] . " " . $row_head['	Lastname'];
            echo "</td>";
            echo "<td>" . $row_head['SDATE'] . "</td>";


            echo "</tr>";
        }
        ?>

    </body>
</html>    

