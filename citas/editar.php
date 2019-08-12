<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
      <?php include("head.php");?>
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
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="http://obedalvarado.pw/" target="_blank">Sistemas Web</a>
                  
                  
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />
 
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
           $id = intval($_GET['id_cita']);
$sql = mysqli_query($conn, "SELECT * FROM citas WHERE id_cita='$id'");
if(mysqli_num_rows($sql) == 0){
header("Location: index.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
?>
            
            <blockquote>
            Actualizar datos del cliente
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="update-edit.php" method="POST" >
<div class="control-group">
<label class="control-label" for="basicinput">ID</label>
<div class="controls">
<input type="text" name="id_cita" id="id" value="<?php echo $row['id_cita']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
</div>
</div>
 
<div class="control-group">
<label class="control-label" for="basicinput">Nombres</label>
<div class="controls">
<input type="text" name="nombre" id="nombres" value="<?php echo $row['nombre']; ?>" placeholder="" class="form-control span8 tip" required>
</div>
</div>
 
<!-- <div class="control-group">
<label class="control-label" for="basicinput">Teléfono</label>
<div class="controls">
<input type="text" name="telefono" id="telefono" value="<?php echo $row['telefono']; ?>" placeholder="" class="form-control span8 tip" required>
</div>
</div>
 
<div class="control-group">
<label class="control-label" for="basicinput">Email</label>
<div class="controls">
<input name="email" id="email" value="<?php echo $row['email']; ?>" class="form-control span8 tip" type="email"  required />
</div>
</div>
 
<div class="control-group">
<label class="control-label" for="basicinput">Dirección</label>
<div class="controls">
<input name="direccion" id="direccion" value="<?php echo $row['direccion']; ?>" class="form-control span8 tip" type="text"  required />
</div>
</div>
                                        
                                        <div class="control-group">
<label class="control-label" for="basicinput">Registrado</label>
<div class="controls">
<input name="notelp" id="notelp" value="<?php echo $row['registrado']; ?>" class=" form-control span8 tip" type="text" disabled  />
</div> -->
</div>
 
<div class="control-group">
<div class="controls">
<input type="submit" name="update" id="update" value="Actualizar" class="btn btn-sm btn-primary"/>
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
              <center> <b class="copyright"><a href="http://obedalvarado.pw/"> Sistemas Web</a> &copy; <?php echo date("Y")?> DataTables Bootstrap </b></center>
            </div>
        </div>
        <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/stylish-portfolio.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 
        
 
 
      
    </body>