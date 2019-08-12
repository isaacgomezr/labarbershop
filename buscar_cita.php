<?php
include 'db_connection.php';
$conn = OpenCon();
$consulta = "select * from citas";
$result = mysqli_query($conn, $consulta);
$row = mysqli_fetch_row($result);
echo $row[0];
echo $row[1];
CloseCon($conn);
?>