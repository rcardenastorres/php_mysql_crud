<?php
include('db.php');

$usuario=$_POST['usuario'];
$contrasena=$_POST['contraseña'];
session_start();
$_SESSION['usuario']=$usuario;
$conexion=mysqli_connect("localhost","root","","php_mysql_crud");

$consulta="SELECT * FROM usuarios where usuario='$usuario' and contrasena='$contrasena'"; 

// esto es una descripción


// $consultar="SELECT * FROM usuarios";



$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas){
	$usuario=mysqli_fetch_assoc($resultado);
    $_SESSION['usuario_id']=$usuario['id'];
   exit();
    header("location:index.php");

}else{
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);


?>