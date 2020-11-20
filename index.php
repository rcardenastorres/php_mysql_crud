


<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<?php
if(!isset($_SESSION['usuario'])){
  header('Location: index.html');
exit();
}
?>
   
            
        

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
      <?php unset($_SESSION['message']); 
          } 
        ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <div class="form-group">

         
          
                                              

              <select name="persona_id">
                <option value="0">Seleccione:</option>
                <?php
                  $query2 = "SELECT * FROM personas";
                  
                    $result_personas = mysqli_query($conn, $query2); 
                     while($valores = mysqli_fetch_assoc($result_personas)) { 

                    echo '<option value="'.$valores[id].'">'.$valores[nombre].'</option>';
                  }
                ?>
              </select>
              
            </p>
          </div>







      







          <input type="submit" name="save_task" class="btn btn-primary btn-block" value="Save Task">
        </form>
      </div>
    </div>



    
    <div class="col-md-6">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Persona ID</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM task,personas where task.persona_id=personas.id";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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
