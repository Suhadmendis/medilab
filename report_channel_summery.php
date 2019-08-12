<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Daily Summery</title>

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

        if ($_GET['type'] == "detail") {
            echo "<center><span class=\"style1\"><b>" . $row_head["COMPANY"] . "</b></center><br>";

            echo "<center><b>Daily Summery - From " . $_GET['dte_from'] . " To " . $_GET['dte_to'] . "</b><br><br>";

            echo "<center><table width='650' border=1>
            <tr>
		<th width='80'>S.No</th>
                <th width='80'>Ref No</th>
                <th width='80'>Passport No</th>
                <th width='250'>Name</th>
                <th width='80'>Sex</th>
                <th width='80'>Date</th>
                  <th width='80'>Country</th>
                </tr>";

            $sql = "select * from rege where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "'   order by sdate,seri_no";

            $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
            while ($row_head = mysql_fetch_array($result_head)) {
                echo "<tr>";
                echo "<td>" . $row_head['SERI_NO'] . "</td>";
                echo "<td>" . $row_head['DREFNO'] . "</td>";
                echo "<td>" . $row_head['PA_NO'] . "</td>";

                echo "<td>";
                echo $row_head['inital'] . $row_head['NAME'] . " " . $row_head['	Lastname'];
                echo "</td>";
                echo "<td>" . $row_head['SEX'] . "</td>";
                echo "<td>" . $row_head['SDATE'] . "</td>";
                echo "<td>" . $row_head['cou_NAME'] . "</td>";
                echo "</tr>";
            }
        }


        if ($_GET['type'] == "summery") {
            echo "<center><span class=\"style1\"><b>" . $row_head["COMPANY"] . "</b></center><br>";

            if ($_GET['typeg'] == "date") {
                $head = "Date Wise";
            }
            if ($_GET['typeg'] == "dwise") {
                $head = "Doctor Wise";
            }


            echo "<center><b>Channel Summery - " . $head . " From " . $_GET['dte_from'] . " To " . $_GET['dte_to'] . "</b><br><br>";

            echo "<center><table width='650' border=1>
                    <thead>
                        <tr>";

            if ($_GET['typeg'] == "date") {
                echo "<th>Date</th>";
            } else {
                echo "<th>Doctor</th>";
            }

            echo "<th>Patients</th>";








            echo "</tr> 
                    </thead>
                    <tbody>";

            if ($_GET['typeg'] == "date") {
                $sql = "select sdate from pa_app_channel where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "'  and cancell='0' group by sdate order by sdate";
            }

            if ($_GET['typeg'] == "dwise") {
                $sql = "select docnname from pa_app_channel where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "'  and cancell='0' group by docnname order by docnname";
            }

            $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
            while ($row_head = mysql_fetch_array($result_head)) {

                if ($_GET['typeg'] == "date") {
                    $sql = "select DISTINCT count(refno)as count from pa_app_channel where sdate ='" . $row_head['sdate'] . "'  and cancell='0'";
                }

                if ($_GET['typeg'] == "dwise") {
                    $sql = "select DISTINCT count(refno)as count from pa_app_channel where docnname ='" . $row_head['docnname'] . "' and sdate >='" . $_GET['dte_from'] . "'  and cancell='0'  and sdate <= '" . $_GET['dte_to'] . "' ";
                }



                $result_row = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                $row_row = mysql_fetch_array($result_row);
                $tot = $row_row['count'];

                if ($_GET['typeg'] == "date") {
                    $sql = "select DISTINCT count(sdate)as count from pa_app_channel where sdate ='" . $row_head['sdate'] . "'  and cancell='0'  ";
                }

                if ($_GET['typeg'] == "dwise") {
                    $sql = "select DISTINCT count(docnname)as count from pa_app_channel where docnname ='" . $row_head['docnname'] . "' and sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "'  and cancell='0' ";
                }


                $result_row = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                $row_row = mysql_fetch_array($result_row);
                $tot1 = $row_row['count'];
                echo "<tr>";

                if ($_GET['typeg'] == "date") {
                    echo "<td>" . $row_head['sdate'] . "</td>";
                }

                if ($_GET['typeg'] == "dwise") {
                    echo "<td>" . $row_head['docnname'] . "</td>";
                }


                echo "<td>" . $tot . "</td>";





                echo "</tr>";
                $ftot = $ftot + $tot;
            }

            echo "<tr><td></td>";



            echo "<td>" . $ftot . "</td>";
            ?>


            </tbody>
            </table>


            <?php
        }
        ?>

    </body>
</html>    

