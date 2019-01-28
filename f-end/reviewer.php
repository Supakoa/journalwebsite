<?php

  require 'server/server.php';

  // check online
  if($_SESSION['status'] != 1){
    // $_SESSION['online'] = 0;
    $_SESSION['alert'] = 2;
    header("Location: index.php");
    exit();
  }

  if(isset($_SESSION['alert'])){
    if($_SESSION['alert'] == 0 ){
      echo '<script>alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.");</script>';
    }
    elseif ($_SESSION['alert'] == 1) {
      echo '<script>alert("ส่งคำตอบเรียบร้อย.");</script>';
    }
    unset($_SESSION['alert']);
  }

  $id = $_SESSION['id'];
    
  if($_SESSION['status'] != 1){
    $_SESSION['online'] = 0 ;
    header("Location: index.php");
  }
  
  $q1 = "SELECT paper.paper_id,paper.name_th,status_tb.status 
    FROM paper,reviewer_paper,user,status_tb,reviewer_answer
    WHERE paper.paper_id = reviewer_paper.paper_id 
      AND user.username = '$id' 
      AND paper.status = status_tb.id 
      AND paper.status = 1 
      And reviewer_paper.reviewer = '$id' 
      
      AND (reviewer_answer.reviewer_id = '$id' 
      AND reviewer_answer.paper_id = paper.paper_id 
      AND reviewer_answer.status IS NULL)  ";
  $result1 = mysqli_query($con, $q1); 

  $q2 = "SELECT paper.paper_id,paper.name_th,status_tb.status 
    FROM paper,reviewer_paper,user,status_tb 
    WHERE paper.paper_id = reviewer_paper.paper_id 
      AND user.username = '$id' 
      AND paper.status = status_tb.id 
      AND paper.status != 1  
      And reviewer_paper.reviewer = '$id'";
  $result2 = mysqli_query($con, $q2);

  $q_name = "SELECT `first_name`,`last_name` FROM `user` WHERE `username`= '$id' ";
  $result_name = mysqli_query($con, $q_name);
  $r_name = mysqli_fetch_assoc($result_name);

  $a3 = "SELECT * FROM banner ";
  $q3 = mysqli_query($con,$a3);
  $r_3 = mysqli_fetch_array($q3);
  

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Reviewer</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">


  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="../backend/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>


</head>

<body id="page-top" style="font-family: 'Mitr', sans-serif">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-md bg-secondary  text-uppercase" id="mainNav" style="font-family: 'Mitr', sans-serif">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">ผู้ทรงคุณวุฒิ</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button"
        data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse text-center" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#uncheck">รอการตรวจสอบ</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#checked">ตรวจแล้ว</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="server/logout.php">ออกจากระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <img src="../backend/banner/<?php echo $r_3['tmp_name'] ?>" class="img-fluid" alt="Responsive image" style="heigth:auto">

  <!-- uncheck Section -->
  <section class="portfolio" id="uncheck" style="font-family: 'Mitr', sans-serif;">
    <div class="col-lg-9 mx-auto">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0" style="font-family: 'Mitr', sans-serif;">รอการตรวจสอบ</h2>
        <hr class="star-dark mb-5">
        <div class="table-responsive">
          <table id="table1" class="table table-bordered">
            <thead>
              <tr>
                <th>รหัสเอกสาร</th>
                <th>ชื่อเอกสาร</th>
                <th>สถานะบทความ</th>
                <th>แก้ไข</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row1 = mysqli_fetch_array($result1)) {
                   $id_paper = $row1["paper_id"];
                    
                  ?>
              <tr>
                <td>
                  <?php echo $row1['paper_id'] ?>
                </td>
                <td>
                  <?php echo $row1['name_th'] ?>
                </td>
                <td>
                  <?php echo $row1['status'] ?>
                </td>
                <td>

                  <?php 
                        require 'modal/modal3.php';
                        ?>


                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>



  <!-- checked Section -->
  <section class="portfolio" id="checked" style="font-family: 'Mitr', sans-serif;">
    <div class="col-lg-9 mx-auto">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0" style="font-family: 'Mitr', sans-serif;">ตรวจแล้ว</h2>
        <hr class="star-dark mb-5">
        <div class="table-responsive">
          <table id="table2" class="table table-bordered">
            <thead>
              <tr>
                <th>รหัสเอกสาร</th>
                <th>ชื่อเอกสาร</th>
                <th>สถานะบทความ</th>
                <th>แก้ไข</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row2 = mysqli_fetch_array($result2)) {
                   $id_paper = $row2["paper_id"];
                    
                  ?>
              <tr>
                <td>
                  <?php echo $row2['paper_id'] ?>
                </td>
                <td>
                  <?php echo $row2['name_th'] ?>
                </td>
                <td>
                  <?php echo $row2['status'] ?>
                </td>
                <td>
                  <?php 
                     require 'modal/modal4.php';
                        ?>

                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  <footer class="copyright py-4 text-center text-white container-fluid" style="font-family: 'Mitr', sans-serif;">
    <div class="row">
      <div class="col-md-12">
        <?php 
              //htis site is show footer.
              // $r_3 = mysqli_fetch_array($q3);
              echo $r_3['footer'];
            ?>
      </div><!-- content -->
    </div>
  </footer>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function () {
      $('#table1').DataTable();
    });
    $(document).ready(function () {
      $('#table2').DataTable();
    });
  </script>

  <!-- php check alert -->
  <?php require '../alert.php';?>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>


</body>

</html>