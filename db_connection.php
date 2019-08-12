<?php
function OpenCon()
 {
 $dbhost = "fdb18.biz.nf";
 $dbuser = "3071866_albatros";
 $dbpass = "Isaac95*";
 $db = "3071866_albatros";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>