<?php
    require 'server.php';
    if(!isset($_SESSION['status_admin'])){
        // $_SESSION['online'] = 0 ;
        $_SESSION['alert'] = 2 ;
        header("Location: index.php");
        exit();
    }

    // ไม่ใช้ counter_up แล้ว
    // $_SESSION['counter_up'] = 0;

    //set page
    $_SESSION['set_page'] = 1;
    $q = "SELECT paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.status";
    $result = mysqli_query($con, $q);
    $q2 = "SELECT paper.paper_id, paper.name_th, paper.name_eng, paper.abstract, paper.key_word,user.first_name,user.last_name,status_tb.status FROM paper,user,user_paper,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = user_paper.username AND status_tb.id = paper.status";
    $result2 = mysqli_query($con, $q2);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
    
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin GE-รายงาน</title>

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
            <h3 style="text-align:center">รายงาน</h3><hr><br>
              
                <div class="row">
                    <div class=" col-lg-12 table-responsive">
                    <table id="tablepaper" class="display table" >
                            <thead>
                                <tr>
                                    <th>Paper-id</th>
                                    <th>ชื่อ Paper(Eng)</th>
                                    <th>ชื่อ Paper(Th)</th>
                                    <th>ชื่อผู้ส่ง</th>                                   
                                    <th>สถานะหลัก</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                
                                <?php while ($row = mysqli_fetch_array($result)) {
                                    $id_paper = $row['paper_id'];
                                    $status_paper = $row['status'];
                                    $q_status = "SELECT * FROM status_tb WHERE `status` = '$status_paper'";
                                    $result_status = mysqli_query($con,$q_status);
                                    $row_status = mysqli_fetch_array($result_status);
                                    ?>
                                <tr>
                                
                                    <td><?php echo $row['paper_id'] ?></td>
                                    <td><?php echo $row['name_eng'] ?></td>
                                    <td><?php echo $row['name_th'] ?></td>
                                    <td><?php echo $row['first_name'] . " " . $row['last_name'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php require 'setup/modal2.php' ?></td>
                                   
                                </tr>
                                <?php 
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="text-center">
                            <a href="" class="btn btn-info btn-md " data-toggle="modal" data-target="#submit_modal">ดาวโหลดไฟล์</a>
                        </div>
                       
        <div class="modal fade" id="submit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="text-align:center" >
                        <h3 class="modal-title" id="exampleModalLabel">ยืนยัน</h3>
                    </div>
                        <div class="modal-body" style="text-align:center" >
                                                <?php
                                                $filName = "server/report.csv";
                                                $objWrite = fopen("server/report.csv", "w");
                                                fwrite($objWrite, "\"Paper-id\",\"ชื่อ Paper(Eng)\",\"ชื่อ Paper(Th)\",\"ชื่อผู้ส่ง\",\"สถานะหลัก\" \n\n");
                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                    fwrite($objWrite, "\"{$row2['paper_id']}\",\"{$row2['name_eng']}\",\"{$row2['name_th']}\",\"{$row2['first_name']} {$row2['last_name']}\",\" {$row2['status']}\",\n\n");

                                                }
                                                fclose($objWrite);
                                                echo "ยืนยันการดาวโหลด";
                                                ?>
                        </div>
                            <div class="modal-footer" style="text-align:center">
                                <a href="<?php echo $filName ?>"> <button type="button" class="btn btn-success"  > ยืนยัน</button></a>
                                <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
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

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
    <!-- Jquerytable-->
    <script type="text/javascript"  src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    

    <script>
        $(document).ready( function () {
            $('#tablepaper').DataTable();
        } );

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
