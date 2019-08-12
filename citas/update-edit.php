<?php
include "conn.php";
if(isset($_POST['update'])){
				$id			= intval($_POST['id_cita']);
				$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				// $telefono  	= mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
				// $email 		= mysqli_real_escape_string($conn,(strip_tags($_POST['email'], ENT_QUOTES)));
				// $direccion  = mysqli_real_escape_string($conn,(strip_tags($_POST['direccion'], ENT_QUOTES)));
               
				
				$update = mysqli_query($conn, "UPDATE citas SET nombre='$nombre' WHERE id_cita='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Los datos han sido actualizados!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Error, no se pudo actualizar los datos'); window.location = 'index.php'</script>";
				}
			}
  ?>