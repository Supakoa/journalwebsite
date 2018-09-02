<?php
require 'server/server.php';
if($_SESSION['status'] != 1){
  $_SESSION['online'] = 0 ;
  header("Location: index.php");
}
//$id = $_SESSION['id'];
$_SESSION['id'] = 'singha';
$id = $_SESSION['id'];
$q = "SELECT paper.paper_id,paper.name_th,status_tb.status FROM paper,user_paper,user,status_tb WHERE paper.paper_id = user_paper.paper_id AND user.username = '$id' AND paper.status = status_tb.id";
$result = mysqli_query($con, $q);
$q_name = "SELECT `first_name`,`last_name` FROM `user` WHERE `username`= '$id' ";
$result_name = mysqli_query($con, $q_name);
$r_name = mysqli_fetch_assoc($result_name);




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
    <form action="" method="post"></form>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
  


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
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Auther</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#paper">Paper</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#submitpaper">Submit paper</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="server/logout.php">Log-out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>  

    <!-- Header -->
    <header class="masthead text-white text-center" style="background-color : #f06eaa">
      <div class="container">
          <br>
        <h1 class="text-uppercase mb-0"><?php echo $r_name['first_name']." ".$r_name['last_name'] ?></h1>
        <br><br><br><br>
        <hr>
        
        <br><br><br>
       
      </div>
    </header>

    <!-- paper Section -->
    <section class="portfolio" id="paper">
        <div class="col-lg-8 mx-auto">
            <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Paper</h2>
            <hr class="star-dark mb-5">
            <table id="table_id" class="table responsive display">
                <thead>
                    <tr>
                        <th>Paper id</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_array($result)) {
                   $id_paper = $row["paper_id"];
                    
                  ?>
                  <tr>
                       <td><?php echo $row['paper_id'] ?></td>
                        <td><?php echo $row['name_th'] ?></td>
                        <td><?php echo $row['status'] ?></td>
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
        
    </section>

    

    <!-- submit Section -->
    <section id="submitpaper">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Submit manuscript</h2>
        <hr class="star-dark mb-5">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            
            <form action = "server/insert_paper.php" method ="POST" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                        <label>Paper File</label>
                        <input class="form-control" name="paper" type="file" placeholder="File" required="required">
                    </div>
                </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Paper name Thai</label>
                  <input class="form-control" name="paper_th" type="text" placeholder="Paper name thai" required="required" data-validation-required-message="Please enter your Paper name thai.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Paper name English</label>
                  <input class="form-control" name="paper_eng" type="text" placeholder="Paper name English " required="required" data-validation-required-message="Please enter your Paper name english.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Abstract</label>
                  <textarea class="form-control" name="abstract" rows="5" placeholder="Abtract" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Keyword</label>
                  <input class="form-control" name="keyword" type="text" placeholder="Keyword" required="required" data-validation-required-message="Please enter your Keyword.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-md" id="sendMessageButton">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    

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
    <!-- modal -->
   
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready( function () {
    $('#table_id').DataTable();
    } );
    </script>

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
