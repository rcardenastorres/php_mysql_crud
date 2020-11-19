<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $persona_id = $_POST['persona_id'];
  $usuario = $_SESSION['usuario'];
  
  $query = "INSERT INTO task(title, description, persona_id, usuario_id) VALUES ('$title', '$description', '$persona_id', '$usuario')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
