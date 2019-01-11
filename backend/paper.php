<?php
    require 'server.php';
    if($_SESSION['status_admin'] != 1){
        $_SESSION['online'] = 0 ;
        header("Location: index.php");
      }
    $_SESSION['counter_up'] = 0 ;

    $a = "SELECT * FROM show_url WHERE group_url = 1";
    $b = "SELECT * FROM show_url WHERE group_url = 2";

    $q1 = mysqli_query($con,$a);
    $q2 = mysqli_query($con,$b);

    $re = mysqli_query($con, $a);
    $re2 = mysqli_query($con, $b);
    if (isset($_POST['update'])) {
    $id = 1;//web
    $count = 1;
    $plus1 = "text";
    $plus2 = "link";
    $plus3 = "cb";
    while ($rowrow = mysqli_fetch_array($re)) {
        $sum1 = $plus1 . $id;
        $sum2 = $plus2 . $id;
        $sum3 = $plus3 . $id;
        if (isset($_POST[$sum3])) {
            $ed3 = 1;
        } else {
            $ed3 = 0;
        }
        $ed1 = $_POST[$sum1];
        $ed2 = $_POST[$sum2];
        $lin = $rowrow['id'];
        $qinq = "UPDATE `show_url` SET `id`='$id',`url`='$ed2',`text`='$ed1',`hide`='$ed3' WHERE `id`='$lin' ";//,`hide`='$ed3'
        $que = mysqli_query($con, $qinq);
        if ($que) {
            $count++;
        }
        $id = $id + 1;
    }//end web
    while ($rowrow = mysqli_fetch_array($re2)) {//paper
        $sum1 = $plus1 . $id;
        $sum2 = $plus2 . $id;
        $sum3 = $plus3 . $id;
        if (isset($_POST[$sum3])) {
            $ed3 = 1;
        } else {
            $ed3 = 0;
        }
        $ed1 = $_POST[$sum1];
        $ed2 = $_FILES[$sum2]['name'];

        $ext = pathinfo(basename($_FILES[$sum2]["name"]), PATHINFO_EXTENSION);
        $new_taget_name = 'pdf_' . uniqid() . "." . $ext;
        $target_path = "uploads/";
        $upload_path = $target_path . $new_taget_name;
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

        if ($_FILES[$sum2]["name"] != "") {

            if ($_FILES[$sum2]["size"] > 8000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
       // Allow certain file formats
            if ($imageFileType != "pdf") {
                echo "Sorry, only PDF files are allowed.";
                $uploadOk = 0;
            }
       // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
       // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$sum2]["tmp_name"], $upload_path)) {
                    //echo "The file " . basename($_FILES[$sum2]["name"]) . " has been uploaded.";
                    $real_name = basename($_FILES[$sum2]["name"]);
                    //echo $real_name;
                    //$q = "INSERT INTO `testpdf`(`url`,`real_name`) VALUES ('$new_taget_name','$real_name')";
                    $q = "UPDATE `show_url` SET `url`='$new_taget_name',`real_name`='$real_name' WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $q);
                    if ($result) {
                        $count++;
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

        } else {


            $count++;
        }

        $q_text = "UPDATE `show_url` SET `text`='$ed1' WHERE `id` = '$id' ";
        $result = mysqli_query($con, $q_text);

        $q = "UPDATE `show_url` SET `hide`='$ed3' WHERE `id` = '$id' ";
        $result = mysqli_query($con, $q);
        $id = $id + 1;
    }//end paper

    if ($count == $id) {
        echo '<script type="text/javascript">alert("แก้ไขข้อมูลสมบูรณ์.");</script>';
    } else {
        echo '<script type="text/javascript">alert("แก้ไขข้อมูลไม่สมบูรณ์.");</script>';
    }
    }

    $i = "SELECT * FROM show_url WHERE group_url = 1";
    $j = "SELECT * FROM show_url WHERE group_url = 2";

    $q1 = mysqli_query($con,$i);
    $q2 = mysqli_query($con,$j);

    //set menu page
    $_SESSION['set_page']=8;
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin GE-เอกสารที่เกี่ยวข้อง</title>

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
        <div class="sidebar-wrapper">
            <?php require 'setup/menu.php' ?>

            <div class="main-panel">
       
		        <?php require 'setup/main.php' ?>
                <div class="container">
                    <h4 style="margin-left: 5px;text-align:center">ตั้งค่าเว็บไซต์ที่เกี่ยวข้อง</h4><br>
                    <form method="POST" action="paper.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12 table-responsive">
                            <table class="table ">
                                <thead class="thead-drak">
                                    <th scope="col" colp="2">ข้อที่</th>
                                    <th scope="col" colp="2">ข้อความ</th>
                                    <th scope="col" colp="2"></th>
                                    <th scope="col" colp="2">ที่อยู่</th>
                                    <th scope="col" colp="2" style="text-align:center">ซ่อน</th>
                                </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php while ($row1 = mysqli_fetch_array($q1)) { ?>
                                <tr>
                                    <th scope="row"><?php echo $i . " )." ?></th>
                                    <td><input type="text" name="text<?php echo $i ?>" value="<?php echo $row1['text'] ?>" required></td>
                                    <th scope="row"></th>
                                    <td><input type="text" name="link<?php echo $i ?>" value="<?php echo $row1['url'] ?>" required></td>
                                    <?php if ($row1['hide'] == 0) { ?>
                                        <td style="text-align:center"><input type="checkbox" name="cb<?php echo $i ?>" ></td>
                                    <?php 
                                    } else { ?>
                                        <td style="text-align:center"><input type="checkbox" name="cb<?php echo $i ?>" checked></td>
                                    <?php 
                                    } ?>
                                </tr>
                                <?php $i = $i + 1;
                            } ?>
                            </tbody>
                        </table>
                        </div>
                        <div class="col-lg-12">
                        <table class="table table responsive">
                            <h4 style="margin-left: 5px;text-align:center">ตั้งค่าเอกสารเผยแพร่</h4><br>
                            <thead class="thead-drak">
                                <th scope="col" colp="2">ข้อที่</th>
                                <th scope="col" colp="2">ข้อความ</th>
                                <th scope="col" colp="2">ชื่อไฟล์ปัจจุบัน</th>
                                <th scope="col" colp="2">ไฟล์ข้อมูลPDF</th>
                                <th scope="col" colp="2" style="text-align:center">ซ่อน</th>
                            </thead>
                            <tbody>
                                <?php while ($row2 = mysqli_fetch_array($q2)) {
                                    $a = $i - 4; ?>
                                <tr>
                                    <th scope="row"><?php echo $a . " )." ?></th>
                                    <td><input type="text" name="text<?php echo $i ?>" value="<?php echo $row2['text'] ?>" ></td>
                                    <th scope="row"><?php echo $row2['real_name'] ?></th>
                                    <!-- <td><input type="text" name="link<? php// echo $i ?>" value="<? php// echo $row2['url'] ?>" required></td> -->
                                    <td style="text-align:center"><input type="file" name="link<?php echo $i ?>" ></td>
                                    <?php if ($row2['hide'] == 0) { ?>
                                        <td style="text-align:center"><input type="checkbox" name="cb<?php echo $i ?>"></td>
                                    <?php 
                                    } else { ?>
                                        <td style="text-align:center"><input type="checkbox" name="cb<?php echo $i ?>" checked></td>
                                    <?php 
                                    } ?>
                                </tr>
                                <?php $i = $i + 1;
                            } ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <div class="text-center">
                    <input type="submit" class="btn btn-info btn-active" value="อัพเดต" name="update"><br>
                    </div>
                </div>
                </form>
            </div>
        </div>
    
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
	<script src="assets/js/demo.js"></script>

	

</html>
