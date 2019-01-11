<?php
    if(isset($_SESSION['alert'])){
        switch ($_SESSION['alert']) {
            // กรอกข้อมูลไม่ถูกต้อง
            case '1':
                echo "  <script>
                            Swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                footer: '<a href>Why do I have this issue?</a>'
                            });
                        </script>";
                break;
            
            // = 0 or null
            default:
                # code...
                break;
        }
    }
    unset($_SESSION['alert']);
?>