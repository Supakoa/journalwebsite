<?php
require '../server/server.php';

if($_SESSION['status_admin'] != 1){
    // $_SESSION['online'] = 0 ;
    $_SESSION['alert'] = 2;
    header("Location: ../index.php");
    exit();
  }
?>