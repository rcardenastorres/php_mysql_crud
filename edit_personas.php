<?php
include("db.php");
$nombre = '';
$apellido= '';
$rut= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM personas WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $rut = $row['rut'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $rut = $_POST['rut'];

  $query = "UPDATE personas set nombre = '$nombre', apellido = '$apellido', rut = '$rut' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Persona Agregada Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: personas.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_personas.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Update Apellido">
        </div>
        <div class="form-group">
          <input name="rut" type="text" class="form-control" value="<?php echo $rut; ?>" placeholder="Update Rut">
        </div>

        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
