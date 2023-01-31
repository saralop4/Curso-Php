<?php
    $conexion = new mysqli("127.0.0.1", "root", "", "dblogin");
    session_start();
    $iduser = $_SESSION['id_usuario'];
    $sql_user = $conexion->query("SELECT id,nombre FROM usuarios WHERE usuario= '$iduser'");
    $fila = $sql_user->fetch_assoc();
    if(isset($_SESSION["id_usuario"])){

    }

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <h1> ¡BIENDENIVODO!</h1>
</body>
</html>