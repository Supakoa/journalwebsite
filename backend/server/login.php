<?php
    //connect server
    require '../server.php';

    //recieve data
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = base64_encode(mysqli_real_escape_string($con,$_POST['password']));
    
    //check data correct in database
    $sql = "SELECT * FROM admin WHERE id='$username' AND password='$password' ";
    $result = mysqli_query($con,$sql);
    $r_a = mysqli_fetch_array($result);
    if($r_a){
        $_SESSION['status_admin'] = 1 ;
        header("Location: ../report.php");
    } else{
        // status admin ไม่ใช้ในหน้า index นอกแล้ว
        // $_SESSION['status_admin'] = 0 ;
        $_SESSION['alert'] = 1;
        header("Location: ../index.php");
    }

    // echo $username."<br>".$password;
?>