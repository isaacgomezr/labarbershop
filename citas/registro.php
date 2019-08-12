<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    </head>
    <body>
       <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="" target="_blank">Sistemas Web</a>
                   
                   
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$nombre	= mysqli_real_escape_string($conn,(strip_tags($_POST['nombre'], ENT_QUOTES)));
				$telefono  	= mysqli_real_escape_string($conn,(strip_tags($_POST['telefono'], ENT_QUOTES)));
                $email 		= mysqli_real_escape_string($conn,(strip_tags($_POST['correo'], ENT_QUOTES)));
                $fecha_cita 		= mysqli_real_escape_string($conn,(strip_tags($_POST['fecha_cita'], ENT_QUOTES)));
                $hora_cita 		= mysqli_real_escape_string($conn,(strip_tags($_POST['hora_cita'], ENT_QUOTES)));
				$barbero  = mysqli_real_escape_string($conn,(strip_tags($_POST['barbero'], ENT_QUOTES)));
                $registrado=date("Y-m-d H:i:s");
                
                $result = mysqli_query($conn, "select count(id_cita) as total from citas where fecha_cita = '".date("Y-m-d")."' and hora_cita = '".$hora_cita."'") or die(mysqli_error());
                $row = mysqli_fetch_array($result);
                $name = $row['total'];
                if($name > 0){
                    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ya existe una cita a esa hora, intente cambiando la hora de su cita (30 mins más). </div>';
                }
                else{
                    $insert = mysqli_query($conn, "INSERT INTO citas(nombre,telefono,correo,fecha_cita,hora_cita,fecha_registro,barbero)
                    VALUES('$nombre','$telefono','$email','$fecha_cita','$hora_cita','$registrado','$barbero')") or die(mysqli_error());
                        if($insert){
                            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho, los datos han sido agregados correctamente.</div>';
                            // $headers .= "Organization: Sender Organization\r\n";
                            // $headers .= "MIME-Version: 1.0\r\n";
                            // $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
                            // $headers .= "X-Priority: 3\r\n";
                            // $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
                            // $headers .= "Reply-To: The Sender <sender@sender.com>\r\n"; 
                            // $headers .= "Return-Path: The Sender <sender@sender.com>\r\n";
                            // $headers .= "From: The Sender <senter@sender.com>\r\n"; 
                            // mail("isaacgomezr06@gmail.com", "Message", "A simple message.", $headers); 
                            // echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>En breve recibirás un correo con los datos de tu cita.</div>';
                        }else{
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo registrar los datos.</div>';
                            }
                }
				
				
			}
			?>
            
            <blockquote>
            Agregar cita
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="registro.php" method="POST" >
										<div class="control-group">
											<label class="control-label" for="nombres">Nombre</label>
											<div class="controls">
												<input type="text" name="nombre" id="nombres" placeholder="Nombre del cliente" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="telefono">Teléfono</label>
											<div class="controls">
												<input type="text" name="telefono" id="telefono" placeholder="Teléfono del cliente" class="form-control span8 tip" required>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="email">Email</label>
											<div class="controls">
												<input name="correo" id="correo" class="form-control span8 tip" type="email" placeholder="Correo electrónico"  required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="direccion">Fecha de la cita</label>
											<div class="controls">
												<input name="fecha_cita" id="fecha_cita" class=" form-control span8 tip" type="text" placeholder="" required />
											</div>
                                        </div>
                                        
                                        <div class="control-group">
											<label class="control-label" for="direccion">Hora de la cita</label>
											<div class="controls">
												<input name="hora_cita" id="hora_cita" class=" form-control span8 tip" type="text" placeholder="" required />
											</div>
                                        </div>

                                        <div class="control-group">
											<label class="control-label" for="direccion">Barbero</label>
											<div class="controls">
												<input name="barbero" id="barbero" class=" form-control span8 tip" type="text" placeholder="Barbero"/>
											</div>
										</div>
                                        
                                      
                                        <br>
										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Registrar</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
											</div>
										</div>
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        <div class="footer span-12">
            <div class="container">
              <center> <b class="copyright"><a href=""> Sistemas Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b></center>
            </div>
        </div>

        <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/stylish-portfolio.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>   
      
    </body>