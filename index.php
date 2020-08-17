<?php
     require_once('config.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
     <?php
          $i = 1;
          $pdostm = $pdo->prepare("SELECT * FROM todo ORDER BY ID DESC");

          if($pdostm->execute()) {
               $todo = $pdostm->fetchAll(PDO::FETCH_OBJ);
          }
     ?>
     <div class="card">
          <div class="card-body">
               <h2>Todo Home Page</h2>
               <a href="add.php" class="btn btn-success my-4">Create New</a>
               <table class="table table-striped">
                    <thead>
                         <tr>
                              <th>ID</th>
                              <th>Title</th>
                              <th>Description</th>
                              <th>Created</th>
                              <th>Action</th>
                         </tr>
                         <tbody>
                              <?php if($todo): ?>
                                   <?php foreach($todo as $todos): ?>
                                        <tr>
                                             <td><?php echo $i; ?></td>
                                             <td><?php echo $todos->title; ?></td>
                                             <td><?php echo $todos->description; ?></td>
                                             <td><?php echo date('Y-m-d',strtotime($todos->created_at)); ?></td>
                                             <td>
                                             <a href="edit.php?id=<?php echo $todos->id; ?>" class="btn btn-warning">Edit</a>
                                             <a href="delete.php?id=<?php echo $todos->id; ?>" class="btn btn-danger">Delete</a>
                                             </td>
                                        </tr>
                                        <?php
                                             $i++;
                                        ?>
                                   <?php endforeach ?>
                              <?php else: ?>
                                   <p>Today have no work!</p>
                              <?php endif; ?>
                         </tbody>
                    </thead>
               </table>
          </div>
     </div>
</body>
</html>