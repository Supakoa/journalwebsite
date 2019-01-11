<?php
    if (isset($_SESSION['alert'])) {
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
                break;
            
            case '3':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'เพิ่มข้อมูลสำเร็จ',
                            text: 'ข้อมูลเข้าสู่ระบบเรียบร้อย',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
                break;

            case '4':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'เพิ่มข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการนำเข้าข้อมูล',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
                break;

            case '5':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ชื่อผู้ตรวจซ้ำกัน',
                            text: 'กรุณาใส่ชื่อผู้ตรวจใหม่อีกครั้ง',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
                break;

            // $_SESSION['alert'] = 0 or null
            default:
                # code...
                break;
        }
    }
    unset($_SESSION['alert']);
?>