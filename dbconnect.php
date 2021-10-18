<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "super_hostel";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 return $conn;
 }
 // !@#$%databaseserveradmin2020
function CloseCon($conn)
 {
 $conn -> close();
 }

?>
