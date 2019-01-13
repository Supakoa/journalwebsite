<?php
    // connect database and open session to start
    require 'server.php';

    // check online with check have start with index
    if(!isset($_SESSION['status_admin'])){
        // $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2 ;
        header("Location: index.php");
        exit();
    }

    //FORM POST 
    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $conpassword = base64_encode($_POST['conpassword']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $email = $_POST['email'];  
    $conemail = $_POST['conemail'];
    $tel = $_POST['tel'];

    //Check user from databse is match or not match
    $a = "SELECT * FROM `user` WHERE `username` = '$username' ";
    $r_a = mysqli_query($con,$a);

    //check username password email
    if ($password!=$conpassword||$email!=$conemail) {
        $_SESSION['alert'] = 6;
        if ($email==$conemail&&$password!=$conpassword) {
            $_SESSION['alert'] = 7;
        }elseif ($email!=$conemail&&$password==$conpassword) {
            $_SESSION['alert'] = 8;
        }
        header("Location: register.php");
        exit();
    }

    if (mysqli_num_rows($r_a)>0) {
        $_SESSION['alert'] = 9;
        header("Location: register.php");
        exit();
    }

    $b = "INSERT INTO user (username,password,gender,first_name,last_name,address,email,Tel,role) 
    VALUE ('$username','$password','$gender','$fname','$lname','$address','$email','$tel','2')";
    $r_b = mysqli_query($con,$b);

    if ($r_b) {

        $_SESSION['alert'] = 3;

    }else{

        $_SESSION['alert'] = 4;

    }
    header("Location: register.php");
    exit();

?>