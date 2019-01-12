<?php
    // connect database and open session to start
    require 'server/server.php';

    // check online with check have start with index
    if(!isset($_SESSION['status_admin'])){
        // $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2 ;
        header("Location: index.php");
        exit();
    }

    // if(isset($_SESSION['alert'])){
    //     if($_SESSION['alert'] == 0 ){
    //       echo '<script>alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.");</script>';
    //     }
    //     elseif ($_SESSION['alert'] == 2) {
    //       echo '<script>alert("ลบข้อมูลเรียบร้อย.");</script>';
    //     }
    //     unset($_SESSION['alert']);
    // }
      
    //set page
    $_SESSION['set_page']=1;

    $a = "SELECT * FROM `user` ";
    $r_a = mysqli_query($con,$a);

    if(isset($_SESSION['alsert_user'])){
        if ($_SESSION['alsert_user']==1) {
            echo '<script>alert("แก้ไขข้อมูลสำเร็จ.");</script>';
        }elseif ($_SESSION['alsert_user']==2) {
            echo '<script>alert("แก้ไขข้อมูลไม่สำเร็จ.");</script>';
        }
    }
    $_SESSION['alsert_user']=0;

    //set page
    $_SESSION['set_page']=6;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin GE-จัดการสมาชิค</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Jquerytable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

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

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css"> 

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
             <h3 style="text-align:center">ตาราง User</h3><hr><br>
            	<div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table class="table display" id="tableuser">
                            <thead>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>E-mail</th>
                                <th>Tel</th>
                                <th>Member</th>
                                <th>Role</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <?php while($ro_a = mysqli_fetch_array($r_a)){ ?>
                                <tr>
                                            <td><?php echo $ro_a['username'] ?></td>
                                            <td><?php echo base64_decode($ro_a['password']) ?></td>
                                            <td><?php echo $ro_a['first_name'] ?></td>
                                            <td><?php echo $ro_a['last_name'] ?></td>
                                            <td><?php echo $ro_a['gender'] ?></td>
                                            <td><?php echo $ro_a['address'] ?></td>
                                            <td><?php echo $ro_a['email'] ?></td>
                                            <td><?php echo $ro_a['Tel'] ?></td>
                                            <td><?php echo $ro_a['member'] ?></td>
                                            <td>
                                            <?php
                                            if($ro_a['role']=='1'){
                                                echo "ผู้ใช้";
                                            } 
                                            else{
                                                echo "ผู้ทรงคุณวุฒิ";
                                            }
                                            
                                            ?>
                                            </td>


                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_modal<?php echo $ro_a['order'] ?>">
                                        แก้
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="edit_modal<?php echo $ro_a['order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <form action="server/edit_user.php?id=<?php echo $ro_a['order'] ?>" method="POST">
                                            <div class="modal-content">
                                            <div class="modal-header" style="text-align:center" >
                                                <h3 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสมาชิก</h3>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="user_name">Username  </label>
                                                        <input id="user_name" class="form-control" type="text" name="username" value="<?php echo $ro_a['username'] ?>" placeholder="username">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="pass_word">Password  </label>
                                                        <input id="pass_word" class="form-control" type="text" name="password" value="<?php echo base64_decode($ro_a['password']) ?>" placeholder="password">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="f_name">Firstname  </label>
                                                        <input id="f_name" class="form-control" type="text" name="first_name" value="<?php echo $ro_a['first_name'] ?>" placeholder="firstname">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="l_name">Lastname  </label>
                                                        <input id="l_name" class="form-control" type="text" name="last_name" value="<?php echo $ro_a['last_name'] ?>" placeholder="lastname">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="gen_der">Gender  </label>
                                                        <select id="gen_der" class="form-control" name="gender" required> 
                                                            <option hidden  selected value="<?php echo $ro_a['gender'] ?>"><?php echo $ro_a['gender'] ?></option>
                                                            <option value="male">male</option>
                                                            <option value="female" required>female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6"> </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="e_mail">E-mail  </label>
                                                        <input id="e_mail" class="form-control" type="text" name="email" value="<?php echo $ro_a['email'] ?>" placeholder="email">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="addre">Address  </label>
                                                        <input id="addre" class="form-control" type="text" name="address" value="<?php echo $ro_a['address'] ?>" placeholder="address">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="mem">Member  </label>
                                                        <textarea id="mem" class="form-control" name="member" value="<?php echo $ro_a['member'] ?>" cols="30" rows="10" placeholder="member"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                    <button type="submit" class="btn btn-success">ยืนยัน</button>
                                                    <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                            </div>
                                            </div>
                                        </form>    
                                        </div>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#submit_modal<?php echo $ro_a['order'] ?>">
                                        ลบ
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="submit_modal<?php echo $ro_a['order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <form action="server/delete_user.php?id=<?php echo $ro_a['order'] ?> " method="POST">
                                                    <div class="modal-content">
                                                    <div class="modal-header" style="text-align:center" >
                                                        <h3 class="modal-title" id="exampleModalLabel">ยืนยัน</h3>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="text-align:center" >
                                                        <h5>ยืนยันการลบข้อมูลสมาชิค</h5>
                                                    </div>
                                                    <div class="modal-footer" style="text-align:center">
                                                            <button type="submit" class="btn btn-success">ยืนยัน</button>
                                                            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                                                    </div>
                                                    </div>
                                                </form>    
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
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

    <!-- php check alert -->
    <?php require '../alert.php'; ?>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Jquerytable-->
    <script type="text/javascript"  src="node_modules/datatables.net/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#tableuser').DataTable();
        } );
        </script>
        <script>
        $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
    </script>

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
