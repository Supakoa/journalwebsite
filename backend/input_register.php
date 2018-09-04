<?php
    require 'server.php';
    if($_SESSION['status_admin'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: index.php");
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

    //Check user from databse is match or not match
    $a = "SELECT * FROM user WHERE username = $username ";
    $r_a = mysqli_query($con,$a);

    //check username password email
    $alert = 0;
    if ($password!=$conpassword||$email!=$conemail) {
        $_SESSION['register_alert']=3;
        if ($email==$conemail&&$password!=$conpassword) {
            $_SESSION['register_alert']=1;
        }elseif ($email!=$conemail&&$password==$conpassword) {
            $_SESSION['register_alert']=2;
        }
        $alert = 1;
    }
    if (mysqli_num_rows($r_a)>0) {
        $_SESSION['username_match']=1;
        $alert = 1;
    }
    if ($alert == 1) {
        header("Location: register.php");
    }

    $b = "INSERT INTO user (username,password,gender,first_name,last_name,address,email,role) 
            VALUE ('$username','$password','$gender','$fname','$lname','$address','$email','2')";
    $r_b = mysqli_query($con,$b);
    if ($r_b) {
        $_SESSION['username_match']=2;
    }else{
        
        $_SESSION['username_match']=3;
    }
?>