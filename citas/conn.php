<?php
$db_host = "fdb18.biz.nf";
$db_user = "3071866_albatros";
$db_pass = "Isaac95*";
$db_name = "3071866_albatros";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
    echo 'Error, no se pudo conectar a la base de datos'.mysqli_connect_error();
}
?>