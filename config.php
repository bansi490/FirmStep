<?php 
session_start();

$sqlservername = "localhost";
$sqldbname  = "firmstep";
$sqlusername = "root";	
$sqlpwd = "";

$conn = mysql_connect($sqlservername,$sqlusername,$sqlpwd);
$dbconn=mysql_select_db($sqldbname);
?>