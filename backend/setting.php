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

    //set page
    $_SESSION['set_page']=7;

    //setting footer
    if(isset($_POST['gogogo'])){
        $a = $_POST['commentf'];
        $b = "UPDATE `banner` SET `footer`= '$a' WHERE `order`= '1' ";
        $q_b = mysqli_query($con,$b);
        if($q_b){
            $_SESSION['alert'] = 3 ;
           
        }else{
            $_SESSION['alert'] = 4 ;
        }
    }
    // if(isset($_SESSION['alert'])){
    //     if($_SESSION['alert'] == 0 ){
    //       echo '<script>alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.");</script>';
    //     }
    //     elseif ($_SESSION['alert'] == 1) {
    //       echo '<script>alert("อัพเดท Banner เรียบร้อย.");</script>';
    //     }
    //     elseif ($_SESSION['alert'] == 2) {
    //       echo '<script>alert("อัพเดท Footer เรียบร้อย.");</script>';
    //     }
    //     unset($_SESSION['alert']);
    // }

    $q_banner = "SELECT * FROM `banner` ";
    $result_banner = mysqli_query($con,$q_banner);
    $row_banner = mysqli_fetch_array($result_banner);

    if(!isset($_SESSION['check_banner'])){
        $_SESSION['tmp_banner'] = $row_banner['tmp_name'];
        
    }
    
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Admin GE-ตั้งค่า banner/footer</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet" />


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">

</head>

<body>

    <div class="wrapper">
        <div class="sidebar" data-color="#cccccc">
            <div class="sidebar-wrapper">
                <?php require 'setup/menu.php' ?>

                <div class="main-panel">

                    <?php require 'setup/main.php' ?>

                    <div class="content">
                        <h3 style="text-align:center">ตั้งค่า website</h3>

                        <div class="container-fluid">
                            <hr>
                            <h5 class="text-center">Banner</h5><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="server/insert_banner.php" method="POST" enctype="multipart/form-data">
                                        <div class="control-group">
                                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                                <div class="row">
                                                    <div class="col-lg-4"></div>
                                                    <div class="col-lg-4">
                                                        <input class="form-control" name="banner" type="file"
                                                            placeholder="File" required="required">
                                                            <h4 class = "text-center" style="color:red" >ขนาด 1900*800 px</h4>
                                                            
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <button type="submit" class="btn btn-success">อัพโหลด</button>
                                                    </div>
                                                </div>
                                    </form>

                                </div>
                            </div>
                            <div class="modal fade" id="submit_modal_banner" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">

                                    <div class="modal-content">
                                        <div class="modal-header" style="text-align:center">
                                            
                                        </div>
                                        <div class="modal-body" style="text-align:center">
                                            <h3 class="modal-title" id="exampleModalLabel">ยืนยัน</h3>
                                        </div>
                                        <div class="modal-footer" style="text-align:center">
                                            <a href="server/insert_banner.php?id=1"><button type="submit" class="btn btn-success">ยืนยัน</button></a>
                                            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="container-fluid">
                                <div class="jumbotron">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div style="text-align:center">
                                                <img src="banner/<?php echo $_SESSION['tmp_banner']?>" style="width:100%;heigth:auto "
                                                    alt="banner">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:center">
                                    <a href="" class="btn btn-info btn-md " data-toggle="modal" data-target="#submit_modal_banner">อัพเดต
                                        Banner</a>
                                </div>
                            </div>
                            <div class="container-fluid">
                                <hr>

                                <br>
                                <h5 class="text-center">footer</h5>
                                <form action="setting.php" method="POST">
                                    <div class="row">
                                        <div class="col-lg-12" style="text-align:center">
                                            <textarea name="commentf" cols="110" rows="10"><?php echo $row_banner['footer']  ?></textarea>
                                            <br><br>
                                        </div>
                                        <div class="col-lg-12" style="text-align:center">
                                            <button class="btn btn-success btn-md " type="submit" name="gogogo">อัพโหลด</button>
                                        </div>
                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

    <!-- php check alert -->
    <?php require '../alert.php'; ?>

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
    <script src="assets/js/demo.js"></script>



</html>