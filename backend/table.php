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

    $q = "SELECT * FROM paper WHERE status = 5 ";
    $result = mysqli_query($con, $q);

    //set page
    $_SESSION['set_page']=2;

    
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    <!-- Jquerytable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin GE-ยังไม่ได้เลือกผู้ตรวจ</title>

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

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css"> 


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#cccccc" >
    	<div class="sidebar-wrapper">
            <?php require 'setup/menu.php' ?>

    <div class="main-panel">
       
		<?php require 'setup/main.php' ?>

        <div class="content">
            <div class="container-fluid">
                <h3 style="text-align: center">ยังไม่ได้เลือกผู้ตรวจ</h3>
                <hr>
                <div class="row">
                    <div class="col-lg-12 table-responsive">
                        <table id="table" class="display table">
                            <thead>
                                <tr>
                                    <th>รหัสเอกสาร</th>
                                    <th>ชื่อ เอกสาร</th>
                                    <th>ชื่อผู้ส่ง</th>
                                    <th>ผู้ตรวจ 1</th>
                                    <th>ผู้ตรวจ 2</th>
                                    <th>สถานะหลัก</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                    <?php
                                        $id_paper = $row["paper_id"];
                                        $q_reviewer = "SELECT * FROM reviewer_paper WHERE paper_id =$id_paper ";
                                        $result_reviewer = mysqli_query($con, $q_reviewer);
                                        $row_reviewer = mysqli_fetch_array($result_reviewer);
                                        $q_answer = "SELECT * FROM reviewer_answer WHERE paper_id = $id_paper ";
                                        $result_answer = mysqli_query($con, $q_answer);
                                        $row_answer = mysqli_fetch_array($result_answer);
                                        $q_user = "SELECT user.first_name,user.last_name FROM user,user_paper WHERE user_paper.paper_id = $id_paper AND user_paper.username = user.username ";
                                        $result_user = mysqli_query($con, $q_user);
                                        $row_user = mysqli_fetch_array($result_user);
                                        $status_paper = $row['status'];
                                        $q_status = "SELECT * FROM status_tb WHERE id = $status_paper";
                                        $result_status = mysqli_query($con, $q_status);
                                        $row_status = mysqli_fetch_array($result_status);
                                    ?>
                                      
                                        <td style="text-align:left" ><p style="font-size: 5 "><?php echo $row['paper_id'] ?></p></td>
                                        <td><p style="font-size: 5"><?php echo $row['name_th'] ?></p></td>
                                        <td><p style="font-size: 5"><?php echo $row_user['first_name']." ".$row_user['last_name'] ?></p></td>
                                        <td><p style="font-size: 5">ยังไม่ได้ระบุ</p> </td>
                                        <td><p style="font-size: 5">ยังไม่ได้ระบุ</p></td>
                                        <td><p style="font-size: 5"><?php echo $row_status['status'] ?></p></td>
                                        <td>
                                        <?php require 'setup/modal.php' ?>
                                        </td>
                                        </tr> 
                                      <?php } ?>
                                      
                               
                            </tbody>
                        </table>
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
    <!-- Jquerytable-->
    <script type="text/javascript"  src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin   -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
        $(document).ready( function () {
            $('#table').DataTable();
        } );

        $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
        })
	</script>

</html>
