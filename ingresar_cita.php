<?php
include 'db_connection.php';
$nombre = $_POST['nombre'];
$conn = OpenCon();
$sql = "insert into citas (nombre) values('$nombre')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
CloseCon($conn);
?>
