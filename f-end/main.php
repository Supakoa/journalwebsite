<?php
require 'server/server.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>journalwebsite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Mitr:400,500" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">




    <!-- Plugin CSS -->
    <!-- <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"> -->

    <!-- Custom styles for this template -->
    <!-- <link href="css/freelancer.min.css" rel="stylesheet"> -->

    <!-- google font kanit -->
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    <script src="../backend/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <!-- banner -->
    <div class="">
        <img src="..\backend\banner\banner_5c3af4c83bc2c.png" style="width:100%;height:300px" alt="">
    </div>
    <!-- banner -->

    <!-- navbar -->
    <div class="container-fluid" style="background-color: #2C3E50;">
        <div class="container" >
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #2C3E50;">
                <a class="navbar-brand" href="#" style="color:#fff;">GE Conference</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                    <ul class="navbar-nav mr-auto" role="tablist">

                        <li class="nav-item dropdown" style="color:#fff;">
                            <a style="color:#fff;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ข้อมูลทั่วไป
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color:#2C3E50">
                                <a class="dropdown-item" href="#" onclick="content(10017)" style="color:#fff; background-color: #2C3E50;">หลักการและเหตุผล</a>
                                <a class="dropdown-item" href="#" onclick="content(10018)" style="color:#fff;background-color: #2C3E50;">วัตถุประสงค์</a>
                                <a class="dropdown-item" href="#" onclick="content(10019)" style="color:#fff;background-color: #2C3E50;">รูปแบบการในเสนอ</a>
                            </div>
                        </li>
                        <li class="nav-item" style="color:#fff;">
                            <a class="nav-link" href="#" onclick="content(10020)" style="color:#fff;">ผู้ทรงคุณวุฒิ</a>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0" >
                        <a href="index.php" class="btn btn-info my-2 my-sm-0" style="color:#fff;">ส่งบทความ</a>
                    </div>
                </div>
            </nav>
        </div>
    </div><br>

    <!-- nav col4 && content col8 -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-2" >
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-pills flex-column myTab" id="myTab" role="tablist" style="background-color: #2C3E50;">
                        <li class="nav-item">
                            <a style="color:#fff;" class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <?php
                        $sql = "SELECT * FROM `news` WHERE status = 1";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) { ?>
                        <li class="nav-item">
                            <a style="color:#fff;" class="nav-link" id="settings-tab" data-toggle="tab" href="#<?php echo $row['news_id']; ?>" role="tab" aria-controls="settings" aria-selected="false">
                                <?php echo $row['name']; ?></a>
                        </li>
                        <?php 
                    } ?>
                    </ul>


                </div>
                <div class="col-lg-10">
                    <!-- Tab panes -->
                    <div class="" style="font-family: 'Kanit', sans-serif;" id="qry_content"></div>

                    <div class="tab-content" id="main_content">


                        <?php 
                        $result2 = mysqli_query($con, $sql);
                        while ($row_content = mysqli_fetch_array($result2)) { ?>
                        <div class="tab-pane fade " style="font-family: 'Kanit', sans-serif;" id="<?php echo $row_content['news_id']; ?>" role="tabpanel" aria-labelledby="profile-tab">
                            <?php
                            echo $row_content['content'];
                            ?>
                        </div>
                        <?php 
                    } ?>

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="container">
                                <img src="http://www.gen-ed.ssru.ac.th/useruploads/images/20190212/e351519d4139d4016dec7fd8b96d2903d69a20ee.png" class="fr-fic fr-dib img-responsive" style="height: 302.47px; width: 100%;">
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><strong><span style="font-size: 18px;">&nbsp; &nbsp; &nbsp;
                                            เปิดรับสมัครบทความจำนวนจำกัด (100 บทความ)
                                            เพื่อนำเสนองานประชุมวิชาการการศึกษาทั่วไปฯ มหาวิทยาลัยราชภัฏสวนสุนันทา
                                            ปี พ.ศ.2562 ตั้งแต่วันนี้ – 12 มีนาคม พ.ศ.2562&nbsp;</span></strong></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><strong><span style="font-size: 18px;">โดยนักวิจัยสามารถสมัครเข้าร่วมโครงการฯ
                                            เพื่อส่งบทความและชำระเงินค่าลงทะเบียนได้ที่&nbsp;</span></strong></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><span style="color: rgb(0, 0, 0);"><strong><span style="font-size: 18px;">ค่าลงทะเบียน 3,000 บาท&nbsp;</span></strong></span><span style="color: rgb(147, 101, 184);"><strong><span style="font-size: 18px;"><strong><u><a href="http://www.geconference.ssru.ac.th/font/index.php" rel="noopener noreferrer" target="_blank" style="color: rgb(0, 0, 0); text-shadow: none;">&gt;&gt;
                                                            คลิกเข้าระบบ</a>&nbsp;&lt;&lt;</u></strong>&nbsp;</span></strong></span></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><strong><span style="font-size: 18px;">&nbsp; หัวข้อการเสนอผลงาน ได้แก่<br>&nbsp;
                                            &nbsp; 1.กลุ่มวิชาด้านมนุษยศาสตร์และสังคมศาสตร์<br>&nbsp; &nbsp;
                                            2.กลุ่มวิชาด้านการศึกษา<br>&nbsp; &nbsp;
                                            3.กลุ่มวิชาด้านวิทยาศาสตร์และเทคโนโลยี<br>&nbsp; &nbsp;
                                            4.กลุ่มวิชาด้านภาษา<br>ผู้วิจัยที่ชำระเงินหลังวันที่ 12 มีนาคม พ.ศ.2562
                                            เป็นต้นไป ทางผู้จัดขอสงวนสิทธิ์ไม่คืนเงินค่าลงทะเบียนในทุกกรณี</span></strong></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><br></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><span style="font-size: 18px;"><strong><span style="color: rgb(41, 105, 176);">ติดต่อสอบถามรายละเอียดได้ที่
                                                นางสาวภัททิยา ตรัยที่พึ่ง</span></strong></span></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><span style="color: rgb(41, 105, 176);"><strong><span style="font-size: 18px;">หัวหน้าฝ่ายวิจัยและพัฒนานวัตกรรมการจัดการเรียนรู้</span></strong></span></p>
                                <p style="color: rgb(51, 51, 51); font-family: Kanit, sans-serif;"><span style="color: rgb(41, 105, 176);"><span style="font-size: 18px;"><strong>เบอร์ติดต่อ 02-160-1265 ต่อ 301&nbsp;<strong>หรือโทร
                                                    086-0826655</strong></strong></span></span></p>
                                <div><span style="color: rgb(41, 105, 176);"><span style="font-size: 18px;"><strong><strong><br></strong></strong></span></span></div>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>
</body>
<br><br><br><br>
<footer class="text-center container-fluid" style="background-color:#2C3E50;">
    <div class="container " style="color:#fff;background-color:#2C3E50;padding-top:10px;padding-bottom:2px">
        <p>สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ มหาวิทยาลัยราชภัฏสวนสุนันทา <br>เลขที่ 1
            ถนนอู่ทองนอก เขตดุสิต กรุงเทพมหานคร 10300</p>
        <p>อีเมล : pattiya.tr@ssru.ac.th เบอร์โทร : (+66) 1601265 ต่อ 301 โทรสาร : (+66)2 160 1268 </p>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
    $('.myTab a').on('click', function(e) {
        $('#main_content').show();
        $('#qry_content').hide();
        e.preventDefault();
        $(this).tab('show');
    })
    $(function() {
        $('.myTab li:first-child a').tab('show')
    })

    function content(id) {
        // alert(id);
        // $("#edit_modal").append("eieieissssss");


        $.post("qry_content.php", {
                data: id
            },
            function(result) {
                $('#qry_content').show();
                $('#main_content').hide();
                $("#qry_content").html(result);
                // $("#del").modal("show");
            }

        );
    };
</script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Contact Form JavaScript -->
<!-- <script src="js/jqBootstrapValidation.js"></script> -->
<!-- <script src="js/contact_me.js"></script> -->

<!-- Custom scripts for this template -->
<!-- <script src="js/freelancer.min.js"></script> -->
</body>

</html> 