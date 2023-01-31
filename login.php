<?php
     $conexion = new mysqli("127.0.0.1", "root", "", "dblogin");
     if(isset($_POST["btn-login"])){
         $user = mysqli_escape_string($conexion, $_POST['usuario']);
         $password = mysqli_escape_string($conexion,$_POST['contraseña']);
         $encrip_contraseña = sha1($password); //con este metodo encriptamos la contraseña
         $sqlquery = $conexion->query("SELECT id FROM usuarios WHERE usuario= '$user' AND contraseña ='$encrip_contraseña'");
         $fila = $sqlquery->num_rows;
         if($fila > 0){
            $row = $sqlquery->fetch_assoc();
            $_SESSION['id_usuario'] = $row['id'];
            header("Location: index.php");
         }else{
            echo "<script>
            window.addEventListener('DOMContentLoaded', (event) => {
                Swal.fire({icon: 'error',
                    title: 'Error al Ingresar!',}).then((result) => {
                    if (result.isConfirmed) {
                        window.location = 'login.php';
                    } else if (result.isDenied) {
                      Swal.fire('Changes are not saved', '', 'info')
                    }
                  })
            });
            </script>";
            
         }

     }

     /*if(isset($_POST["btn-registrarse"])){

     header('Location: '.$registrar.php);
      echo " <script>
                window.location = 'registrar.php';
      </script>"
      } ;*/


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/login.css?v=3" media="all" >
    <title>Login</title>
</head>
<body>
    <header></header>
    <main>
    <center>
         <div class= "div-registrar">
                 <div class="encabezado"> 
            <h3>Iniciar Sesion</h3>
            <hr>
            <p>Ingresa los datos solicitados a continuacion:</p>
                 </div>
                <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">

                    <input class="campos-registrar" type= "text" name= "usuario"  placeholder="Usuario" required></td>
                    <input class="campos-registrar" type= "password" name= "contraseña"  placeholder="Password" required></td>
                    <button id="btnregistrar" name="btn-login" type="submit">Login</button>
                    <button id="btnlimpiar"  type="reset">Reset</button>
                    <button id="btregresar" name="btn-registrarse" type="submit">Regristrarse</button>
                </form>
               
         </div>
     </center>
    </main>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/scripts.js"></script>
</body>
</html>

