<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OPD Summery</title>

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

            echo "<center><b>OPD Summery From " . $_GET['dte_from'] . " To " . $_GET['dte_to'] . "</b><br><br>";

            if ($_GET['typed'] == "dswise") {
                echo "<center><table width='650' border=1>
            <tr>
		<th width='80'>S.No</th>
                <th width='80'>Reg.Date</th>
                <th width='250'>Patient Name</th>
                <th width='80'>Amount</th>
                <th width='80'>Cash</th>
                <th width='80'>Card</th>
                </tr>";

                $sql = "select * from pa_app where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' order by sdate,serino";
                $mtot = 0;
                $mtot1 = 0;
                $mtot2 = 0;
                $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                while ($row_head = mysql_fetch_array($result_head)) {
                    echo "<tr>";
                    echo "<td>" . $row_head['serino'] . "</td>";
                    echo "<td>" . $row_head['sdate'] . "</td>";


                    echo "<td>";
                    echo $row_head['inital'] . $row_head['paname'];
                    if ($row_head['cancell'] == "1") {
                        echo " -CANCELLD";
                    }
                    echo "</td>";

                    if ($row_head['cancell'] == "0") {
                        echo "<td  align='right'>" . number_format($row_head['totalamount'], "2", ".", ",") . "</td>";
                        if ($row_head['type'] == "CASH") {
                            echo "<td  align='right'>" . number_format($row_head['cash'], "2", ".", ",") . "</td>";
                            echo "<td align='right'>0</td>";
                            $mtot1 = $mtot1 + $row_head['cash'];
                        } else {
                            echo "<td align='right'>0</td>";
                            echo "<td align='right'>" . number_format($row_head['cash'], "2", ".", ",") . "</td>";
                            $mtot2 = $mtot2 + $row_head['cash'];
                        }
                        $mtot = $mtot + $row_head['totalamount'];
                    } ELSE {
                        echo "<td align='right'>0</td>";
                        echo "<td align='right'>0</td>";
                        echo "<td align='right'>0</td>";
                    }


                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td colspan='3'></td>";
                echo "<th  align='right'>" . number_format($mtot, "2", ".", ",") . "</th>";
                echo "<th  align='right'>" . number_format($mtot1, "2", ".", ",") . "</th>";
                echo "<th align='right'>" . number_format($mtot2, "2", ".", ",") . "</th>";
                echo "</tr>";
            }


            if ($_GET['typed'] == "ddwise") {
                echo "<center><table width='750' border=1>
            <tr>
		<th width='80'>S.No</th>
                <th width='80'>Reg.Date</th>
                <th width='150'>Patient Name</th>
                <th width='150' colspan='2'>Test</th>
                <th width='100'>Test Amount</th>
                <th width='80'>Paid</th>
                </tr>";

                $sql = "select * from pa_app where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' order by sdate,serino";

                $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                while ($row_head = mysql_fetch_array($result_head)) {
                    echo "<tr>";
                    echo "<td>" . $row_head['serino'] . "</td>";
                    echo "<td>" . $row_head['sdate'] . "</td>";

                    echo "<td colspan='4'>";
                    echo $row_head['inital'] . $row_head['paname'];
                    if ($row_head['cancell'] == "1") {
                        echo " -CANCELLD";
                    }
                    echo "</td>";

                    if ($row_head['cancell'] == "0") {
                        echo "<td align='right'>" . number_format($row_head['cash'], "2", ".", ",") . "</td>";
                        $mcash = $mcash + $row_head['cash'];
                    } else {
                        echo "<td align='right'>0</td>";
                    }

                    echo "</tr>";
                    


                    $sql = "select * from lab_test_pa_app_mas where  refno ='" . $row_head["refno"] . "'";
                    $result_det = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                    while ($row_det = mysql_fetch_array($result_det)) {
                        echo "<tr>";
                        echo "<td colspan='3'></td>";
                        echo "<td colspan='2'>" . $row_det['testdes'] . "</td>";

                        if ($row_head['cancell'] == "0") {
                            $mtot = 0;
                            $mftot = 0;
                            $mtot = $mtot + $row_det['rate'];
                            $mftot = $mftot + ($row_det['rate'] * ($row_det['discount'] / 100));
                            $mtotf = $mtotf + ($mtot - $mftot);
                            echo "<td align='right'>" . number_format(($mtot - $mftot), "2", ".", ",") . "</td>";
                        } else {
                            echo "<td align='right'>0</td>";
                        }
                        echo "<td></td>";
                        echo "</tr>";
                    }
                    echo "<tr>";
                    echo "<td colspan='7'></td>";
                    echo "</tr>";
                }

                echo "<tr>";
                echo "<td align='right' colspan='5'></td>";
                echo "<td align='right'>" . number_format($mtotf, "2", ".", ",") . "</td>";
                echo "<td align='right'>" . number_format($mcash, "2", ".", ",") . "</td>";
                echo "</tr>";
            }
        }

        if ($_GET['type'] == "summery") {
            echo "<center><span class=\"style1\"><b>" . $row_head["COMPANY"] . "</b></center><br>";

            if ($_GET['typeg'] == "twise") {
                $head = "Test Wise";
            }
            if ($_GET['typeg'] == "date") {
                $head = "Date Wise";
            }
            if ($_GET['typeg'] == "dwise") {
                $head = "Doctor Wise";
            }


            echo "<center><b>OPD Summery - " . $head . " From " . $_GET['dte_from'] . " To " . $_GET['dte_to'] . "</b><br><br>";

            echo "<center><table width='650' border=1>
                    <thead>
                        <tr> 
                            <th>Date</th>";

            if ($_GET['typeg'] == "twise") {
                echo "<th colspan='2'>Tests</th>";
            } else {
                echo "<th>Patients</th>";
                echo "<th>Tests</th>";
            }






            echo "</tr> 
                    </thead>
                    <tbody>";

            if ($_GET['typeg'] == "date") {
                $sql = "select sdate from pa_app where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0' group by sdate order by sdate";
            }
            if ($_GET['typeg'] == "twise") {
                $sql = "select testdes from view_pa_app_lab_mas where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0' group by testdes order by testdes";
            }
            if ($_GET['typeg'] == "dwise") {
                $sql = "select docnname from view_pa_app_lab_mas where sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0' group by docnname order by docnname";
            }

            $result_head = mysqli_query($GLOBALS['dbinv'],$sql) ; 
            while ($row_head = mysql_fetch_array($result_head)) {

                if ($_GET['typeg'] == "date") {
                    $sql = "select DISTINCT count(refno)as count from pa_app where sdate ='" . $row_head['sdate'] . "' and cancell='0'";
                }
                if ($_GET['typeg'] == "twise") {
                    $sql = "select DISTINCT count(refno)as count from view_pa_app_lab_mas where testdes ='" . $row_head['testdes'] . "' and sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0' ";
                }
                if ($_GET['typeg'] == "dwise") {
                    $sql = "select DISTINCT count(refno)as count from pa_app where docnname ='" . $row_head['docnname'] . "' and sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0'";
                }



                $result_row = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                $row_row = mysql_fetch_array($result_row);
                $tot = $row_row['count'];

                if ($_GET['typeg'] == "date") {
                    $sql = "select DISTINCT count(sdate)as count from view_pa_app_lab_mas where sdate ='" . $row_head['sdate'] . "' and cancell='0' ";
                }
                if ($_GET['typeg'] == "twise") {
                    $sql = "select DISTINCT count(testdes)as count from view_pa_app_lab_mas where testdes ='" . $row_head['testdes'] . "' and sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0'";
                }
                if ($_GET['typeg'] == "dwise") {
                    $sql = "select DISTINCT count(docnname)as count from view_pa_app_lab_mas where docnname ='" . $row_head['docnname'] . "' and sdate >='" . $_GET['dte_from'] . "'  and sdate <= '" . $_GET['dte_to'] . "' and cancell='0'";
                }


                $result_row = mysqli_query($GLOBALS['dbinv'],$sql) ; 
                $row_row = mysql_fetch_array($result_row);
                $tot1 = $row_row['count'];
                echo "<tr>";

                if ($_GET['typeg'] == "date") {
                    echo "<td>" . $row_head['sdate'] . "</td>";
                }
                if ($_GET['typeg'] == "twise") {
                    echo "<td>" . $row_head['testdes'] . "</td>";
                }
                if ($_GET['typeg'] == "dwise") {
                    echo "<td>" . $row_head['docnname'] . "</td>";
                }

                if ($_GET['typeg'] == "twise") {
                    echo "<td colspan='2'>" . $tot1 . "</td>";
                } else {
                    echo "<td>" . $tot . "</td>";
                    echo "<td>" . $tot1 . "</td>";
                }



                echo "</tr>";
                $ftot = $ftot + $tot;
                $ftot1 = $ftot1 + $tot1;
            }

            echo "<tr><td></td>";


            if ($_GET['typeg'] == "twise") {
                echo "<td colspan='2'>" . $ftot1 . "</td></tr>";
            } else {
                echo "<td>" . $ftot . "</td>";
                echo "<td>" . $ftot1 . "</td></tr>";
            }
            ?>


            </tbody>
            </table>


            <?php
        }
        ?>

    </body>
</html>    

