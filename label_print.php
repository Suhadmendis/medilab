<?php
////////////////////////////////////////////// Write XML ////////////////////////////////////////////////////////////////////
include_once 'connection_i.php';
date_default_timezone_set('Asia/Colombo');


$sql = "select * from pa_app where sdate ='" . $_GET['txtdate'] . "' and serino='" . $_GET['txtserino'] . "'";

$result = mysqli_query($GLOBALS['dbinv'], $sql);
if ($row = mysqli_fetch_array($result)) {
    $codeContents = "0000" . $row['refno'];
}
$codeContents = substr($codeContents, -5)
?>      <style>
    table
    {
        border-collapse:collapse;
    }
    table, td, th
    {

        font-family:Arial, Helvetica, sans-serif;
        padding:2px;
    }
    th
    {
        font-weight:bold;
        font-size:12x;

    }
    td
    {
        font-size:10px;

    }

    .bb {
        font-size: 14px;
        border-bottom: 1px solid;
        border-top: 1px solid;
        border-left: 1px solid;
        border-right: 1px solid;


    }
    .logo {
        font-size:7px;
    }

</style>

<table width='150'>


    <?php
    $sql = "select * from pa_app where sdate ='" . $_GET['txtdate'] . "' and serino='" . $_GET['txtserino'] . "'";

    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    if ($row = mysqli_fetch_array($result)) {
        echo "<tr><td>";
        echo "<img src='barcode/barcode.php?text=" . $codeContents . "'/>";
        echo "<td class='bb' align='right'><b>" . $row['serino'] . "<b></td>";
        echo "</td></tr><tr><td colspan='2'>" . $row["initial"] . $row["paname"] . "</td></tr>";
        echo "<tr><td colspan='2'>" . date('Y-m-d') . " - " . date("g.i a", time()) . "</td>";
        echo "</tr>";
    }

    $sql = "select * from tmpitem";
    $result = mysqli_query($GLOBALS['dbinv'], $sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr><td colspan='2'>" . $row['name'];
        echo "</td></tr>";
    }
    ?>
    <tr><td  class='logo'>Accuralabs (Pvt) Ltd</td></tr>

</table>



<script>
    window.print();
    // close();
</script>