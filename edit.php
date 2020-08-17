<?php
     require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Edit new</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
     <?php
          if($_POST) {
               $title = $_POST['title'];
               $desc = $_POST['description'];      
     
               $stm = $pdo->prepare(      
                    "UPDATE todo
                    SET title= :title, description = :description      
                    WHERE id = :id"
               );

               $stm->bindParam(":title", $title);
               $stm->bindParam(":description", $desc);
               $stm->bindParam(":id", $_POST['id']);

               if($stm->execute()) {
                    header("location: index.php");
               }
     
          } else {
               $pdostm = $pdo->prepare("SELECT * FROM todo WHERE id= :id");

               $pdostm->bindParam(":id", $_GET['id']);

               if($pdostm->execute()) {
                    $todo = $pdostm->fetch(PDO::FETCH_OBJ);
               }
          }
     ?>
     <div class="card">
          <div class="card-body">
               <h2>Edit New ToDo</h2>
               <form action="" method="POST">
               <input type="hidden" name="id" value="<?php echo $todo->id; ?>">
                    <div class="form-group">
                         <label>Title</label>
                         <input type="text" name="title" value="<?php echo $todo->title; ?>" class="form-control" required>
                    </div>

                    <div class="form-group">
                         <label>Description</label>
                         <textarea name="description" cols="80" rows="8" class="form-control">
                              <?php echo $todo->description;?>
                         </textarea>
                    </div>


                    <button class="btn btn-primary">EDIT</button>
                    <a href="index.php" class="btn btn-warning">Back</a>
               </form>
          </div>
     </div>
</body>
</html>