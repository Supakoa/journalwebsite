<?php
    require 'server.php';

    if ($_SESSION['status'] != 1) {
        //  $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
    }

    $id = $_GET['id'];
    $ext = pathinfo(basename($_FILES["paper"]["name"]), PATHINFO_EXTENSION);
    $new_taget_name = 'document_' . uniqid() . "." . $ext;
    $target_path = "../uploads/";
    $upload_path = $target_path . $new_taget_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

    if ($_FILES["paper"]["size"] > 62914560) {
        //  echo "Sorry, your file is too large.";
        //  $uploadOk = 0;
        $_SESSION['alert'] = 15;
        header("Location: ../user.php");
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "doc"&&$imageFileType != "docx") {
        //  echo "Sorry, only PDF files are allowed.";
        //  $uploadOk = 0;
        $_SESSION['alert'] = 16;
        header("Location: ../user.php");
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    // if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    // }

    else {
        if (move_uploaded_file($_FILES["paper"]["tmp_name"], $upload_path)) {
            echo 'Move success.';
        } else {
            echo 'Move fail';
            $_SESSION['alert'] = 11 ;
            exit();

        }
    }

    $paper = $_FILES["paper"]["name"];
    $b = $new_taget_name;
    $a = "UPDATE `paper` SET `file_name`='$paper',`file_tmp_name`='$b',`status`= 1 WHERE paper_id = '$id' ";
    $r_a = mysqli_query($con, $a);

    if ($r_a) {

        $_SESSION['alert'] = 10 ;

    } else {

        $_SESSION['alert'] = 11 ;

    }

    $update_a = "UPDATE `reviewer_answer` SET `status`=NULL,`comment`=NULL,`score`=NULL WHERE paper_id = '$id' ";
    $r_u = mysqli_query($con, $update_a);

    header("Location: ../user.php");
    exit();

?>