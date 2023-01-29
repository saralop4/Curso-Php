<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dblogin';


$conexion = mysqli_connect($host, $username, $password, $dbname);
// Check connection
if (! $conexion) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<script>console.log('Connected successfully')</script>";

//mysqli_close( $conexion);

 /*
 $mysqli = new mysqli("127.0.0.1", "root", "", "badblogin", 80);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n";*/
 ?>
