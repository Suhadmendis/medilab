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
    $sql = "delete from pa_disapp where id = '". $_GET['id'] . "'";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    
    $sql ="select * from pa_disapp where fileno = '". $_GET['txtrefno'] ."' order by id desc";
    $result1 = mysqli_query($GLOBALS['dbinv'], $sql);
    
    $tb = "<table>";
    $tb .= "<tr><td>Date</td>";
            $tb .= "<td>Percentage</td>";
            $tb .= "<td>User</td><td>Remove</td></tr>";
    while ($row= mysqli_fetch_array($result1)) 
    {    
        $tb .= "<tr><td>" . $row['sdate'] . "</td>";
        $tb .= "<td>" . $row['appp'] . "</td>";
        $tb .= "<td>" . $row['user_nm'] . "</td>";
        $tb .= "<td><img width=\"20\" height=\"20\" onclick=\"del_item('" . $row['id'] . "');\" name=\'" . $id . "'\" id=\'" . $id . "'\" src=\"images/delete_01.png\"></td>";
        $tb .= "</tr>";
        
    }
    
    $tb .= "</table>";
    
    echo $tb;
    
    
}

