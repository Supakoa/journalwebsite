<?php
  require 'server/server.php';

  //alert all
  if (isset($_SESSION['index_alert'])) {
    $alert;
    if ($_SESSION['index_alert'] == 1) {

      // $alert = 'password is not match.';
      $_SESSION['alert'] = 8;

    } elseif ($_SESSION['index_alert'] == 2) {

      // $alert = 'email is not match.';
      $_SESSION['alert'] = 7;

    } elseif ($_SESSION['index_alert'] == 3) {

      // $alert = 'password & email are not match.';
      $_SESSION['alert'] = 6;

    }
    if ($_SESSION['index_alert'] != 0) {

      // echo '<script>alert("' . $alert . '");</script>';

    }
    $_SESSION['index_alert'] = 0;
  }

  if (isset($_SESSION['user_match'])) {
    if ($_SESSION['user_match'] == 1) {

      // echo '<script>alert("Your username are used.");</script>';
      $_SESSION['alert'] = 9;

    } elseif ($_SESSION['user_match'] == 2) {

      // echo '<script>alert("Insert user sucessful.");</script>';
      $_SESSION['alert'] = 3;

    } elseif ($_SESSION['user_match'] == 3) {

      // echo '<script>alert("Insert error.");</script>';
      $_SESSION['alert'] = 4;

    }
    $_SESSION['user_match'] = 0;
  }
  if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 0) {
      // echo '<script>alert("Username หรือ Password ไม่ถูกต้อง.");</script>';
      $_SESSION['alert'] = 9;
    }
  }
  if (isset($_SESSION['online'])) {
    // echo '<script>alert("กรุณาเข้าสู่ระบบ.");</script>';
  }
  session_destroy();

  $a1 = "SELECT * FROM show_url WHERE hide = '0' && group_url = '1'";
  $a2 = "SELECT * FROM show_url WHERE hide = '0' && group_url = '2'";
  $q1 = mysqli_query($con, $a1);
  $q2 = mysqli_query($con, $a2);

  $a3 = "SELECT * FROM banner ";
  $q3 = mysqli_query($con, $a3);
  $r_3 = mysqli_fetch_array($q3);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Journal Website</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- login -->
    <link rel="stylesheet" href="login/login.css">

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../backend/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css"> 

  </head>

  <body id="page-top">

    <!-- Navigation -->
   
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">JOURNAL GE SSRU</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#login">เข้าสู่ระบบ</a>
            </li>
            <!-- <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
            </li> -->
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#register">สมัครสมาชิก</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>  
   

    <!-- Header -->
    <header class="text-white text-center responsive" >
      
      <img   src="../backend/banner/<?php echo $r_3['tmp_name'] ?>" alt="" style="width:100%;heigth:auto ;margin-top:105px" srcset="">
          
    </header>

    <!-- Login Section -->
    <section class="portfolio" id="login">
        <div class="col-lg-4 mx-auto">
            <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">เข้าสู่ระบบ</h2>
            <hr class="star-dark mb-5">
            <form  action = "server/login.php" method = "POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="Username" placeholder="Username">
                    
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="text-center">
                <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                </div>
            </form>
            </div>
        </div>
        
    </section>

    

    <!-- Register Section -->
    <section id="register">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">สมัครสมาชิก</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            
            <form action="server/register.php" method="POST">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        
                        <div class="col-lg-6 mx-auto">
                            <label>Username *</label>
                            <input class="form-control" name="username" type="text" placeholder="Username **" required="required" pattern="([!-~]{6,})" title="ขั้นต่ำ 6 ตัวอักษร เฉพาะภาษาอังกฤษ ตัวเลขหรือสัญญาลักษณ์พิเศษ" data-validation-required-message="Please enter your username.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>Password *</label>
                            <input class="form-control" name="password" type="password" placeholder="Password **" required="required" pattern="(.{6,})" title="ขั้นต่ำ 6 ตัวอักษร" data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto"></div>
                        <div class="col-lg-6 mx-auto">
                            <label>Confirm password *</label>
                            <input class="form-control" name="conpassword" type="password" placeholder="ยืนยัน password **" required="required" pattern="(.{6,})" title="ขั้นต่ำ 6 ตัวอักษร" data-validation-required-message="Please enter your Confirm password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                  
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <label>ชื่อ ** </label>
                            <input class="form-control" name="fname" type="text" placeholder="ชื่อ **" required="required" pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกเฉพาะภาษาไทย" data-validation-required-message="Please enter your firstname.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>นามสกุล ** </label>
                            <input class="form-control" name="lname" type="text" placeholder="นามสกุล **" required="required" pattern="^[ก-๛!-@[-`{-~\s]+$" title="กรุณากรอกเฉพาะภาษาไทย" data-validation-required-message="Please enter your lastname.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <div class="row">
                        <div class="col-lg-4 mx-auto">
                        <label>เพศ **</label><br>
                        <select class="form-control" name="gender" required>
                            <option hidden selected  value=""> เพศ **</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                        </div>
                        <div class="col-lg-2 mx-auto"></div>
                        <div class="col-lg-6 mx-auto">
                            <label>บริษัทในเครือ (You Institute, e.g. "Suan Sunandha Rajabhat University")</label>
                            <input class="form-control" name="address" type="text" placeholder="บริษัทในเครือ(สังกัด)"  data-validation-required-message="Please enter your affiliate.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
              </div>
              
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <label>Email ** </label>
                            <input class="form-control" name="email" type="text" placeholder="Email **"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง examble@email.com" required="required" data-validation-required-message="Please enter your Email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>ยืนนัน email ** </label>
                            <input class="form-control" name="conemail" type="text" placeholder="ยืนยัน email **" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ตัวอย่าง examble@email.com" required="required"  data-validation-required-message="Please enter your Confirm email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>เบอร์โทรศัพท์มือถือ **</label>
                            <input class="form-control" name="tel" type="text" pattern="[0-9]{10}" title="ตัวอย่าง 0888888888" placeholder="เบอร์โทรศัพท์มือถือ **" required="required" data-validation-required-message="Please enter your Phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                     
                        <div class="col-lg-6 mx-auto"></div>
                        <div class="col col-lg-12 mx-auto">
                        <hr>
                            <label>สมาชิก</label>
                            <textarea class="form-control" placeholder="สมาชิก(ถ้ามี)" name="member" rows="3"></textarea>
                        </div>
                    </div>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">ตกลง</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
      <h4 class="text-uppercase mb-4">เอกสารที่เกี่ยวข้อง</h4>
        <div class="row">
          <div class="col-md-6 mb-5 mb-lg-0">
          <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <?php while ($r1 = mysqli_fetch_array($q1)) { ?>
                  <a class=" text-center" target="_blank" href="<?php echo $r1['url']; ?>"><?php echo $r1['text']; ?></a><br>
                <?php 
              } ?>
              </li>
            </ul>
          </div>
          <div class="col-md-6 mb-5 mb-lg-0">
          <ul class="list-inline mb-0">
              <li class="list-inline-item">
              <?php while ($r2 = mysqli_fetch_array($q2)) { ?>
                  <a class=" text-center" target="_blank" href="../backend/uploads/<?php echo $r2['url']; ?>"><?php echo $r2['text']; ?></a><br>
                <?php 
              } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-white">
      <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <?php 
              //htis site is show footer.
            
            echo $r_3['footer'];
            ?>
          </div><!-- content -->
          <div class="col-lg-4"></div>
        </div>
      <div class="container">
        <small>Copyright &copy; Your Website 2018</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
    </div>

    <!-- php check alert -->
    <?php require '../alert.php';?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

    <!-- login -->
    <script src="login/login.js"></script>

  </body>

</html>
