<?php
    //connect databse
    require '../server.php';
    if($_SESSION['status'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: ../index.php");
      }

    $username = $_POST['username'];
    $password = base64_encode($_POST['password']);
    $gender = $_POST['gender'];
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $member = $_POST['member'];
    $id = $_GET['id'];

    $a = "UPDATE `user` SET `username`='$username',`password`='$password',`gender`='$gender',`first_name`='$firstname',
            `last_name`='$lastname',`address`='$address',`email`='$email',`member`='$member' WHERE `order` = '$id' ";
    $r_a = mysqli_query($con,$a);
    if($r_a){
        $_SESSION['alert_user'] = 1;
    }else{
        $_SESSION['alert_user'] = 2;
    }
    header("Location: ../user.php");

    // echo "<br>".$username."<br>".$password."<br>".$gender."<br>".$firstname."<br>".$lastname."<br>".$address."<br>".$email."<br>".$member."<br>".$id;
?>