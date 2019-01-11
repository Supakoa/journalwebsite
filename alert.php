<?php
    if(isset($_SESSION['alert'])){
        switch ($_SESSION['alert']) {
            // กรอกข้อมูลไม่ถูกต้อง
            case '1':
                echo "  <script>
                            Swal({
                                type: 'error',
                                title: 'กรอกข้อมูลผิดพลาด',
                                text: 'กรอกข้อมูลใหม่อีกครั้ง',
                                // footer: '<a href>Why do I have this issue?</a>'
                            });
                        </script>";
                break;

            case '2':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'กรุณาเข้าสู่ระบบ',
                            text: 'แสดงตัวตนทุกครั้งก่อนเข้าสู่ระบบ',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            
            // = 0 or null
            default:
                # code...
                break;
        }
    }
    unset($_SESSION['alert']);
?>