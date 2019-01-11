<?php
      // connect database and open session to start
      require 'server.php';

      // check online with check have start with index
      if (!isset($_SESSION['status_admin'])) {
         // $_SESSION['online'] = 0 ;
         $_SESSION['alert'] = 2 ;
         header("Location: index.php");
         exit();
      }

      $id = $_GET["id"];
      $status = $_POST['done'];

      $up = "UPDATE `paper` SET `status`= $status WHERE paper_id = $id";
      $result_up = mysqli_query($con, $up);
     
      if ($result_up) {
         $_SESSION['alert'] = 3;
      } else {
         $_SESSION['alert'] = 4;
      }
    
      header("Location: ../table3.php");
?>