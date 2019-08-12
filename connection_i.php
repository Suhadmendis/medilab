<?php

 
//$GLOBALS['hostname'] = 'localhost';
//$GLOBALS['username'] = 'reedlanka_accura';
//$GLOBALS['password'] = 'acc@123';
//$GLOBALS['db'] = 'reedlanka_accura';
//
/*$GLOBALS['hostname'] = 'localhost';
$GLOBALS['username'] = 'root';
$GLOBALS['password'] = '';
$GLOBALS['db'] = 'medispot';*/

$GLOBALS['hostname'] = 'localhost';
$GLOBALS['username'] = 'root';
$GLOBALS['password'] = '';
$GLOBALS['db'] = 'medi';

//$GLOBALS['hostname'] = 'localhost';
//$GLOBALS['username'] = 'infodata_medis';
//$GLOBALS['password'] = 'info871';
//$GLOBALS['db'] = 'infodata_medispot';
	
$GLOBALS['dbinv'] = mysqli_connect($GLOBALS['hostname'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['db']);
 



?>
