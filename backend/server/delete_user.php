<?php
    //connect database
    require '../server.php';
    if($_SESSION['status'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: ../index.php");
      }

    //get id from url
    $id = $_GET['id'];
    echo $id;

    $a = "DELETE FROM `user` WHERE `order` = '$id' ";
    $r_a = mysqli_query($con,$a);
    if($r_a){
        $_SESSION['alert'] = 2 ;
       
    }else{
        $_SESSION['alert'] = 0 ;
    }
    header("Location: ../user.php");
?>