<?php
        $conexion = new mysqli("127.0.0.1", "root", "", "dblogin");
    //include("db\conexion.php");
    if(isset($_POST["btn-registrar"])){

        $nombre = mysqli_escape_string( $conexion,$_POST['nombre']);
        //el metodo mysqli funciona para no permitir que en el campo no ingresen sentencia sql
        $email = mysqli_escape_string( $conexion,$_POST['email']);
        $usuario = mysqli_escape_string( $conexion,$_POST['usuario']);
        $contraseña = mysqli_escape_string( $conexion,$_POST['contraseña']);
        $encrip_contraseña = sha1($contraseña); //con este metodo encriptamos la contraseña
        $sql_user = $conexion->query("SELECT id FROM usuarios WHERE usuario= '$usuario'");
        $fila = $sql_user->fetch_assoc();
        //$resul_user = $fila->num_rows;
        if($fila >0 ){
            echo "<script>
                window.addEventListener('DOMContentLoaded', (event) => {
                    Swal.fire({icon: 'error',
                        title: 'El usuario ya existe!',}).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'registrar.php';
                        } else if (result.isDenied) {
                          Swal.fire('Changes are not saved', '', 'info')
                        }
                      })
                });
                </script>";
        }else{
            //insertamos los datos en la db
            $sqlusuario = "INSERT INTO usuarios(nombre,correo,usuario,contraseña) VALUES('$nombre', '$email', '$usuario','$encrip_contraseña')";
            $resulusuario =  $mysqli->query($sqlusuario);
            if($resulusuario >0){
                echo "
              
                <script>
                window.addEventListener('DOMContentLoaded', (event) => {
                    Swal.fire({icon: 'success',
                        title: 'Usuario Registrado!',}).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'index.php';
                        } else if (result.isDenied) {
                          Swal.fire('Changes are not saved', '', 'info')
                        }
                      })
                });
                </script>";
            } else{
                echo "<script>
                window.addEventListener('DOMContentLoaded', (event) => {
                    Swal.fire({icon: 'error',
                        title: 'Erro al Registrarse!',}).then((result) => {
                        if (result.isConfirmed) {
                            window.location = 'registrar.php';
                        } else if (result.isDenied) {
                          Swal.fire('Changes are not saved', '', 'info')
                        }
                      })
                });
                </script>";
            }
        }

    }
    $conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/registrar.css?v=3" media="all" >
    <title>Registrar</title>
</head>
<body>
    <header></header>
    <main>
    <center>
    <div class= "div-registrar">
        <div class="encabezado"> 
            <h3>Registro de Nuevos Usuarios</h3>
            <hr>
            <p>Ingresa los datos solicitados a continuacion:</p>
        </div>
            <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
               
                <table  border= "2" style="border-color: red;">
                    <tr>
                        <td> <input  type= "text" name= "nombre" placeholder="Nombre Completo" required ></td>
                    </tr>
                    <tr>
                        <td> <input type= "email" name= "email"  placeholder="Email" required></td>
                    </tr>
                    <tr>
                        <td> <input type= "text" name= "usuario"  placeholder="Usuario" required></td>
                    </tr>
                    <tr>
                        <td> <input type= "password" name= "contraseña"  placeholder="Password" required></td>
                    </tr>
                    <tr>
                        <td> <input type= "password" name= "repetcontraseña"  placeholder="Repetir password" required></td>
                    </tr>
                    <tr>
                        <td> 
                            <input id="btnregistrar" type= "submit" name= "btn-registrar"  value="Registrarse"> 
                            <input id="btnlimpiar" type= "reset" name= "btn-limpiar"  value="Reset">
                        </td>
                    </tr>
                </table>
         
            </form>
     </div>
     </center>
    </main>
<footer> &copy; Derechos de autor reservados</footer>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/scripts.js"></script>
</body>
</html>



