<?php
   include("citas/conn.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         
         header("location: citas/index.php");
      }else {
          echo "Usuario o contraseña incorrectos";
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../assets/images/prosepago-icon.jpeg"/>
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link href="assets/login.css" rel="stylesheet" />

</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="../assets/images/prosepago-logo.jpg" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="" id="form1">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="username" type="text" name="" class="form-control input_user" value="" placeholder="Usuario" />
                            <div style="color: red;">
                                <span id="userwrong"></span>
                            </div>
                            
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input name="password" type="password" name="" class="form-control input_pass" value="" placeholder="Contraseña" />
                            
                            
                        </div>
                        <div style="color: red;">
                                <span id="passwrong"></span>
                            </div>
                       <div class="form-group">
                                        <div class="col-xs-12">
                                         
                                            <div class="checkbox checkbox-success">
                                                <input id="checkRemember" type="checkbox" name="checkRemember" />
                                                <label for="checkbox-signup">
                                                    Recordarme
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <input type="submit"  value=" Submit " id="btnLogin" name="button" class="btn login_btn" />
                            
                        </div>
                        <div class="mt-4">
                            <div class="d-flex justify-content-center links">
                                ¿No tienes una cuenta? <a href="#" class="ml-2">Registrarme</a>
                            </div>
                            <div class="d-flex justify-content-center links">
                                <a id="recover" class="text-muted" href="recuperacionContrase%c3%b1a.aspx"><a>¿Olvidaste tu contraseña?</a></a>
                            </div>
                        </div>
                      
                    </form>
                </div>

                
            </div>
        </div>
    </div>
</body>
</html>

