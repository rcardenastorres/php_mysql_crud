<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>



   
            
        

<main class="container p-4">



  


  <div class="row">

     <div class="col-md-3">
      <div class="card card-body"> 
        <a class="btn btn-primary btn-block" href="index.php">CRUD</a>
        <a class="btn btn-primary btn-block" href="personas.php">PERSONAS</a>
      </div>
            
      </div>



    <div class="col-md-3">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_personas.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre"  required>
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Ingresar Apellido"  required>
          </div>
          <div class="form-group">
            <input type="text" name="rut" class="form-control" placeholder="Ingresar Rut"  required>
          </div>
          <input type="submit" name="save_persona" class="btn btn-primary btn-block" value="Save Persona">
        </form>
      </div>
    </div>



   

    
    <div class="col-md-6">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>nombre</th>
            <th>apellido</th>
            <th>rut</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM personas";
          $result_personas = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_personas)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['rut']; ?></td>
            <td>
              <a href="edit_personas.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_personas.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>




        </tbody>
      </table>
    </div>
  </div>





</main>

<?php include('includes/footer.php'); ?>
