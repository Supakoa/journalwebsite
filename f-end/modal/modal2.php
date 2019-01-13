<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#myModal<?php echo $row['paper_id'] ?>">
ส่งไฟล์แก้ไข
</button>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal<?php echo $row['paper_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">รายละเอียดและแก้ไข</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
      <div class="card">
                           
                            <div class="content">
                               
                                <?php
                                $q_p = "SELECT * FROM paper WHERE paper_id = '$id_paper'";
                                $r_q_p = mysqli_query($con,$q_p);
                                $row_q_p = mysqli_fetch_assoc($r_q_p);
                                $status_paper = $row_q_p['status'];
                                $q_status = "SELECT * FROM status_tb WHERE id = '$status_paper'";
                                $result_status = mysqli_query($con, $q_status);
                                $row_status = mysqli_fetch_array($result_status);
                                ?>
            <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px">รหัสเอกสาร : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['paper_id'] ?></span></div>
            </div>
            <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> คำนำ : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['name_th'] ?></span></div>
            </div>
            <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> สถานะ : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_status['status'] ?></span></div>
            </div>
            <div class="row">
            <div class="col col-6-lg ms-auto">
            <h5 style="margin-left:20px"> บทความ : </h5>
            </div>
            <div class="col col-6-lg ms-auto"><span><?php echo $row_q_p['abstract'] ?></span></div>
            </div>
            <div class="row">
                            <?php
                                $i = 1;
                                $q_RA = "SELECT user.first_name,user.last_name,reviewer_answer.status,reviewer_answer.score,reviewer_answer.comment,status_tb.status
                                FROM user,reviewer_answer,status_tb WHERE reviewer_answer.paper_id =$id_paper AND reviewer_answer.reviewer_id = user.username AND status_tb.id = reviewer_answer.status";
                                $result_RA = mysqli_query($con, $q_RA);
                                while ($row_RA = mysqli_fetch_array($result_RA)) { ?>
                                <div class="col col-12-lg ms-auto">
                                <h4 style="margin-left:20px"> สถานะผู้ตรวจคนที่ <?php echo $i++ ?> </h4>
                                <p style="margin-left:20px"> ชื่อ : <?php echo $row_RA['first_name'] . " " . $row_RA['last_name'] ?> </p>
                                    <p style="margin-left:20px"> คะแนน : <?php echo $row_RA['score'] ?></p>
                                    <p style="margin-left:20px"> ผลตรวจ : <?php echo $row_RA['status'] ?></p>
                                    <p style="margin-left:20px"> คอมเมนต์ : <?php echo $row_RA['comment'] ?></p>
                                    </div>
                                <?php 
                            } ?><br>
                            
           
                           
           
                    
                              
                            </div>
                            <div class="container">
                            <form action="server/update_paper.php?id=<?php echo $row['paper_id'] ?>" method="post" enctype="multipart/form-data" ><hr>
                            <h4>ส่งไฟล์แก้ไข</h4>
                            <input type="file" name="paper" accept=".pdf" required="required" >
                            <br>
                            
                            
                            </div>
                            <div style="text-align:right;margin-right:15px">
                            <button type="submit" class="btn btn-primary"> ส่ง </button>
                            <button type="button" class="btn btn-default"  data-dismiss="modal">ปิด</button>
                            </form>
                          </div> <br>  
                        </div>
                    </div>
                </div> 
      </div>
     
    </div>
  </div>
</div>