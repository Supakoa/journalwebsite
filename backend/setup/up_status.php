<?php
     require '../server.php';
     if($_SESSION['status'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: ../index.php");
      }
    $id = $_GET["id"];                               
    $status = $_POST['done'];
     $up = "UPDATE `paper` SET `status`= $status WHERE paper_id = $id";
     $result_up = mysqli_query($con,$up);
     
     if($result_up){
        $_SESSION['counter_up'] = 1;

       
     }
     else{
        $_SESSION['counter_up'] = 2;
     }
    
     header("Location: ../table3.php");



?>