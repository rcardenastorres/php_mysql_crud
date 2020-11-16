<?php

include('db.php');


if (isset($_POST['save_persona'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $rut = $_POST['rut'];

  $query = "INSERT INTO personas(nombre, apellido, rut) VALUES ('$nombre', '$apellido' , '$rut')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['message'] = 'Persona Guardada Correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: personas.php');
}

?>
