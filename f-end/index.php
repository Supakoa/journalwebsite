<?php
  require 'server/server.php';

  //alert all
  if (isset($_SESSION['index_alert'])) {
    $alert;
    if ($_SESSION['index_alert']==1) {
        $alert = 'password is not match.';
    }elseif ($_SESSION['index_alert']==2) {
        $alert = 'email is not match.';
    }elseif ($_SESSION['index_alert']==3) {
        $alert = 'password & email are not match.';
    }
    if ($_SESSION['index_alert']!=0) {
        echo '<script>alert("'.$alert.'");</script>';
    }
    $_SESSION['index_alert']=0;
  }
  if (isset($_SESSION['user_match'])) {
    if ($_SESSION['user_match']==1) {
        echo '<script>alert("Your username are used.");</script>';
    }elseif ($_SESSION['user_match']==2) {
        echo '<script>alert("Insert user sucessful.");</script>';
    }elseif ($_SESSION['user_match']==3) {
        echo '<script>alert("Insert error.");</script>';
    }
    $_SESSION['user_match']=0;
  }
  if(isset($_SESSION['status'])){
    if($_SESSION['status']==0){
    echo '<script>alert("Username หรือ Password ไม่ถูกต้อง.");</script>';
    }
  }
  if(isset($_SESSION['online'])){
    echo '<script>alert("กรุณาเข้าสู่ระบบ.");</script>';
  }
  session_destroy();

  $a1 = "SELECT * FROM show_url WHERE hide = '0' && group_url = '1'";
  $a2 = "SELECT * FROM show_url WHERE hide = '0' && group_url = '2'";
  $q1 = mysqli_query($con,$a1);
  $q2 = mysqli_query($con,$a2);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>One stop service</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- login -->
    <link rel="stylesheet" href="login/login.css">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Journal Website</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#login">Log-in</a>
            </li>
            <!-- <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">About</a>
            </li> -->
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#register">Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>  

    <!-- Header -->
    <header class="masthead text-white text-center" style="background-color : #f06eaa">
      <div class="container">
          <br>
        <h1 class="text-uppercase mb-0">Wellcom to Website</h1>
        <br><br><br><br>
        <hr>
        
        <br><br><br>
       
      </div>
    </header>

    <!-- Login Section -->
    <section class="portfolio" id="login">
        <div class="col-lg-6 mx-auto">
            <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Log-in</h2>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
        
    </section>

    

    <!-- Register Section -->
    <section id="register">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Register</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            
            <form action="server/register.php" method="POST">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        
                        <div class="col-lg-6 mx-auto">
                            <label>Username *</label>
                            <input class="form-control" name="username" type="text" placeholder="Username" required="required" data-validation-required-message="Please enter your username.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>Password *</label>
                            <input class="form-control" name="password" type="text" placeholder="Password" required="required" data-validation-required-message="Please enter your password.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto"></div>
                        <div class="col-lg-6 mx-auto">
                            <label>Confirm password</label>
                            <input class="form-control" name="conpassword" type="text" placeholder="Confirm password" required="required" data-validation-required-message="Please enter your Confirm password.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                  
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <label>Firstname ** </label>
                            <input class="form-control" name="fname" type="text" placeholder="firstname" required="required" data-validation-required-message="Please enter your firstname.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>Lastname ** </label>
                            <input class="form-control" name="lname" type="text" placeholder="lastname" required="required" data-validation-required-message="Please enter your lastname.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <div class="row">
                        <div class="col-lg-4 mx-auto">
                        <label>Gender</label>
                        <select class="form-control" name="gender" required>
                            <option disabled selected > Gender </option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        </div>
                        <div class="col-lg-8 mx-auto">
                            <label>Affiliate (You Institute, e.g. "Suan Sunandha Rajabhat University")</label>
                            <input class="form-control" name="address" type="text" placeholder="Address" required="required" data-validation-required-message="Please enter your affiliate.">
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
                            <input class="form-control" name="email" type="text" placeholder="Email" required="required" data-validation-required-message="Please enter your Email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col-lg-6 mx-auto">
                            <label>Confirm email ** </label>
                            <input class="form-control" name="conemail" type="text" placeholder="Confirm email" required="required" data-validation-required-message="Please enter your Confirm email.">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="col col-lg-12 mx-auto">
                            <label>Example textarea</label>
                            <textarea class="form-control" placeholder="Member" name="member" rows="3"></textarea>
                        </div>
                    </div>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
      <h4 class="text-uppercase mb-4">Location</h4>
        <div class="row">
          <div class="col-md-6 mb-5 mb-lg-0">
          <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <?php while($r1 = mysqli_fetch_array($q1)){ ?>
                  <a class=" text-center" target="_blank" href="<?php echo $r1['url']; ?>"><?php echo $r1['text']; ?></a><br>
                <?php } ?>
              </li>
            </ul>
          </div>
          <div class="col-md-6 mb-5 mb-lg-0">
          <ul class="list-inline mb-0">
              <li class="list-inline-item">
              <?php while($r2 = mysqli_fetch_array($q2)){ ?>
                  <a class=" text-center" target="_blank" href="../backend/uploads/<?php echo $r2['url']; ?>"><?php echo $r2['text']; ?></a><br>
                <?php } ?>
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
            ใส่ตรงนี้
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
