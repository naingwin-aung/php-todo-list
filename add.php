<?php
     require_once('config.php');
     if($_POST) {
          $title = $_POST['title'];
          $desc = $_POST['description'];

          $sql = "INSERT INTO todo(title,description) VALUE (:title,:description)";
          $stm = $pdo->prepare($sql);

          $stm->bindParam(':title', $title);
          $stm->bindParam(':description', $desc);

          if($stm->execute()) {
               echo "<script>alert('New ToDo is added');window.location.href='index.php';</script>";
          }

     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Create new</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
     <div class="card">
          <div class="card-body">
               <h2>Create New ToDo</h2>
               <form action="add.php" method="POST">
                    <div class="form-group">
                         <label>Title</label>
                         <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                         <label>Description</label>
                         <textarea name="description" rows="8" class="form-control"></textarea>
                    </div>

                    <button class="btn btn-primary">SUBMIT</button>
                    <a href="index.php" class="btn btn-warning">Back</a>
               </form>
          </div>
     </div>
</body>
</html>