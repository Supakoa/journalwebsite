<?php
    require 'server.php';
    if(isset($_SESSION['status_login'])){
        
        if($_SESSION['status_login']==0){
            echo '<script>alert("Username หรือ รหัสผ่านไม่ถูกต้อง.");</script>';
        }
    
    }
    if(isset($_SESSION['status_admin'])){
        if($_SESSION['status_admin']==0){
        echo '<script>alert("Username หรือ Password ไม่ถูกต้อง.");</script>';
        }
    }
    if(isset($_SESSION['online'])){
        echo '<script>alert("กรุณาเข้าสู่ระบบ.");</script>';
    }
    session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log-in Admin journal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">
    <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css"> 
    <style>

        .login-page {
        font-family: 'Mitr', sans-serif;
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
        }
        .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        }
        .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #4CAF50;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
        background: #43A047;
        }
        .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
        }
        .form .message a {
        color: #4CAF50;
        text-decoration: none;
        }
        .form .register-form {
        display: none;
        }
        .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
        }
        .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
        }
        .container .info {
        margin: 50px auto;
        text-align: center;
        }
        .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
        }
        .container .info span {
        color: #4d4d4d;
        font-size: 12px;
        }
        .container .info span a {
        color: #000000;
        text-decoration: none;
        }
        .container .info span .fa {
        color: #EF3B3A;
        }
        
    </style>
 
<body >
    <div class="container-fluid">
    <div class="container">
    </div>
            <div class="login-page">
       		 <h2 style="text-align:center">Admin journal</h2>

                <div class="form">

            <form action="server/login.php" method="post" class="login-form">
                <input type="text" name="username" placeholder="username"/>
                <input type="password" name="password" placeholder="password"/>
                <button type="submit">เข้าสู่ระบบ</button>
            </form>

        </div>
        </div>
    
    </div>
    <script>
    Swal(
    'The Internet?',
     'That thing is still around?',
    'question'
    );
<?php echo "eieieiei" ?>
    </script>
</body>

<!-- php check alert -->
<?php

    require '../alert.php';
?>
<!-- script -->
<script>
    $('.message a').click(function(){$('form').animate({height: "toggle", opacity: "toggle"}, "slow");});
    
</script>

</html>