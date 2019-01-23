<?php
  //connect database 
  require 'server/server.php';

  // check online
  if($_SESSION['status'] != 1){
    // $_SESSION['online'] = 0;
    $_SESSION['alert'] = 2;
    header("Location: index.php");
    exit();
  }

    // old check alert
    // if(isset($_SESSION['alert'])){
    //   if($_SESSION['alert'] == 0 ){

    //     echo '<script>alert("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง.");</script>';

    //   }
    //   elseif ($_SESSION['alert'] == 1) {

    //     echo '<script>alert("เพิ่มวารสารเรียบร้อย.");</script>';

    //   }
    //   elseif ($_SESSION['alert'] == 2) {

    //     echo '<script>alert("แก้ไขวารสารเรียบร้อย.");</script>';

    //   }
    //   elseif ($_SESSION['alert'] == 3) {

    //     echo '<script>alert("ได้เฉพาะ ไฟล์ PDF.");</script>';

    //   }
    //   unset($_SESSION['alert']);
    // }

    // $id = $_SESSION['id'];
    // $_SESSION['id'] = 'singha';

    $id = $_SESSION['id'];
    $q = "SELECT paper.paper_id,paper.name_th,status_tb.status FROM paper,user_paper,user,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = '$id' AND user_paper.username = user.username AND paper.status = status_tb.id group by paper.paper_id";
    $result = mysqli_query($con, $q);
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

  <title>Auther</title>

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
  <!-- <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">  -->

</head>

<body id="page-top" style="font-family: 'Mitr', sans-serif;">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav" style="font-family: 'Mitr', sans-serif;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top" style="font-family: 'Mitr', sans-serif;">สมาชิก</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button"
        data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse twxt-center" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#paper">เอกสาร</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#submitpaper">เพิ่มเอกสาร</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="server/logout.php">ออกจากระบบ</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <img src="../backend/banner/<?php echo $r_3['tmp_name'] ?>" class="img-fluid" alt="Responsive image" style="heigth:auto ">

  <!-- paper Section -->
  <section class="portfolio" id="paper" style="font-family: 'Mitr', sans-serif;">
    <div class="col-lg-8 mx-auto">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0" style="font-family: 'Mitr', sans-serif;">เอกสาร</h2>
        <hr class="star-dark mb-5">
        <div class="table-responsive-lg">
          <table id="table_id" class="table table-bordered">
            <thead>
              <tr>
                <th>รหัสเอกสาร</th>
                <th>ชื่อเอกสาร</th>
                <th>สถานะ</th>
                <th>แก้ไข</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = mysqli_fetch_array($result)) {
                   $id_paper = $row["paper_id"];
                    
                  ?>
              <tr>
                <td>
                  <?php echo $row['paper_id'] ?>
                </td>
                <td>
                  <?php echo $row['name_th'] ?>
                </td>
                <td>
                  <?php echo $row['status'] ?>
                </td>
                <td>

                  <?php 
                        if($row['status']=="ผ่าน"||$row['status']=="ไม่ผ่าน"){
                            require 'modal/modal.php';
                        }
                          elseif($row['status']=="แก้ไข"){
                            require 'modal/modal2.php';
                          }
                          else{
                            
                          }
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



  <!-- submit Section -->
  <section id="submitpaper" style="font-family: 'Mitr', sans-serif;">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-center text-uppercase text-secondary mb-0" style="font-family: 'Mitr', sans-serif;">เพิ่มเอกสาร</h2>
          <hr class="star-dark mb-5">
          <form action="server/insert_paper.php" method="POST" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <label for="pa-per">ไฟล์เอกสาร(pdf)</label>
                    <input id="pa-per" class="form-control btn btn-sm" name="paper" type="file" accept=".pdf"
                      placeholder="ไฟล์เอกสาร" required="required">
                  </div>
                  <div class="col-lg-4"></div>
                </div>

              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label for="pa-th">ชื่อเอกสารภาษาไทย</label>
                <input id="pa-th" class="form-control" name="paper_th" type="text" pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกชื่อภาษาไทย"
                  placeholder="ชื่อเอกสารภาษาไทย" required="required" data-validation-required-message="Please enter your Paper name thai.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label for="pa-eng">ชื่อเอกสารภาษาอังกฤษ</label>
                <input id="pa-eng" class="form-control" name="paper_eng" type="text" placeholder="ชื่อเอกสารภาษาอังกฤษ"
                  pattern="^[!-~\s]+$" title="กรุณากรอกชื่อภาษาอังกฤษ" required="required"
                  data-validation-required-message="Please enter your Paper name english.">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label for="abs">ข้อความ</label>
                <textarea for="abs" class="form-control" name="abstract" rows="5" placeholder="ข้อความ" required="required"
                  data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label for="key">คำเฉพาะ</label>
                <input id="key" class="form-control" name="keyword" type="text" placeholder="คำเฉพาะ" required="required"
                  data-validation-required-message="Please enter your Keyword.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary btn-md" id="sendMessageButton">ส่ง</button>
            </div>
          </form>
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
  <!-- modal -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script>
    $(document).ready(function () {
      $('#table_id').DataTable();
    });
  </script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

  <!-- php check alert -->
  <?php require '../alert.php';?>

</body>

</html>