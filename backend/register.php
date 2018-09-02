<?php
    require 'server.php';
    if($_SESSION['status'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: index.php");
      }
    //alert all
    if (isset($_SESSION['register_alert'])) {
        $alert;
        if ($_SESSION['register_alert']==1) {
            $alert = 'password is not match.';
        }elseif ($_SESSION['register_alert']==2) {
            $alert = 'email is not match.';
        }elseif ($_SESSION['register_alert']==3) {
            $alert = 'password & email are not match.';
        }
        if ($_SESSION['register_alert']!=0) {
            echo '<script>alert("'.$alert.'");</script>';
        }
        $_SESSION['register_alert']=0;
    }
    if (isset($_SESSION['username_match'])) {
        if ($_SESSION['username_match']==1) {
            echo '<script>alert("Your username are used.");</script>';
        }elseif ($_SESSION['username_match']==2) {
            echo '<script>alert("Insert user sucessful.");</script>';
        }elseif ($_SESSION['username_match']==3) {
            echo '<script>alert("Insert error.");</script>';
        }
        $_SESSION['username_match']=0;
    }

    //set page
    $_SESSION['set_page']=5;

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin GE-สมัคร Reviewer</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/> 

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#cccccc" >

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <?php require 'setup/menu.php' ?>

    <div class="main-panel">
       
		<?php require 'setup/main.php' ?>

        <div class="content">
            <div class="container-fluid">
             <h3 style="text-align:center">สมัคร reviewer </h3><hr><br>

                <form action="input_register.php" method="POST">
                    <div class="form-group">
                        <label >Username **</label>
                        <input type="text" class="form-control" name="username" placeholder="ชื่อผู้ใช้" >

                        <label for="password">Password **</label>
                        <input type="text" class="form-control" name="password" placeholder="รหัสผ่าน" >

                        <label for="conpassword">Confirm Password </label>
                        <input type="text" class="form-control" name="conpassword" placeholder="ยืนยันรหัสผ่าน" >

                        <label for="fname">First name **</label>
                        <input type="text" class="form-control" name="fname" placeholder="ชื่อจริง" >

                        <label for="lname">Last name **</label>
                        <input type="text" class="form-control" name="lname" placeholder="นามสกุล" >

                        <label for="gender">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option disabled selected value="">เพศ</option>
                            <option value="male">male</option>
                            <option value="female">female</option>
                        </select>

                        <label for="address">Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="ที่อยู่"></textarea>
                    
                        <label for="username">Email *</label>
                        <input type="text" class="form-control" name="email" placeholder="อีเมล์" >
                        
                        <label for="password">Confirm Email *</label>
                        <input type="text" class="form-control" name="conemail" placeholder="ยืนยันอีเมล์" >
                        <br>
                        </div>
                        <button class="btn btn-info btn-fill pull-center" name="submit" type="submit">Submit</button>
                </form>
            	  
            </div>
        </div>
      

        <footer class="footer">
            <div class="container-fluid">
               
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#">Creative Tim</a>,CEFstyle
                </p>
            </div>
        </footer>
    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<!-- <script src="assets/js/demo.js"></script> -->

	// <script type="text/javascript">
    // 	$(document).ready(function(){

    //     	demo.initChartist();

    //     	$.notify({
    //         	icon: 'pe-7s-bell',
    //         	message: "Wellcom to Websize"

    //         },{
    //             type: 'info',
    //             timer: 4000
    //         });

    // 	});
	// </script>
    
</html>
