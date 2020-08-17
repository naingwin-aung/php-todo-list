<?php
     require_once('config.php');

     $pdostm = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);

     if($pdostm->execute()) {
          header("location: index.php");
     }