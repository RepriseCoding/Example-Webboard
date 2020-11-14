<?php 
    include("include/connect_db.php");
    include("include/session.php");

$countview = mysqli_query($conn,"UPDATE topic SET topic_view=topic_view+1 WHERE topic_id = {$_GET['id']}");

?>

<!-- <!doctype> <html> <head> <body> -->
<?php 
    include("include/head.php"); 
?>

<!-- Header banner -->
<?php include("include/headbanner.php"); ?>
<!-- Carousel -->
<?php 
    // include("include/carousel.php"); 
    ?>

<!-- Breadcumbs -->
<ol class="breadcrumb bg-dark">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#">View post</a></li>
    <?php
        // ดึงข้อมูลมาโชว์ก่อน ที่ breadcumbs
        $showname = mysqli_query($conn,"SELECT * FROM topic INNER JOIN user ON topic.user_id = user.user_id WHERE topic.topic_id ={$_GET['id']}");
        $showres = mysqli_fetch_array($showname);
    ?>
    <li class="breadcrumb-item active"><?=$showres['topic_name'];?></li>
</ol>
<!-- Content -->
<div class="container">
    <div class="row justify-content-center">
        <!--  ปุ่มตอบกระทู้ -->
        <div class="col-12">
            <a class="btn btn-primary replybut mt-5" href="comment.php?id=<?=$showres['topic_id'];?>">Reply this topic
                <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
        </div>
        <!--  -->
        <!-- -------------------------------------------ส่วนของ หัวข้อกระทู้ --------------------------------- -->
        <!-- การ์ดหัวข้อ -->

        <div class="col-11" id="title-topic">
            <div class="card mt-5 mb-3" id="topic-head">
                <div class="card-body">
                    <h3 class="card-title text-primary"><b><?=$showres['topic_name'];?></b></h3>
                    <?php 
                        // เขียนเงื่อนไขตรวจสอบว่า ถ้า user_id ของผู้ login ตรงกันกับ user_id ของผู้โพสให้ ทำการแสดงปุ่มแก้ไขกระทู้
                        if($_SESSION['user_id']==$showres['user_id']){                    
                    ?>
                    <!-- ปุ่มแก้ไขกระทู้ ด้านบน -->
                    <a class="btn-sm btn-danger text-light float-right" id="edit-topic-btn-top" href="edit-topic.php?id=<?=$_GET['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </i></a>
                     <?php   
                         }
                    ?>
                    <p class="card-text">
                        Since <?php $date = strtotime($showres['topic_date']); echo date("d-m-Y h:i a ",$date) ;
                        echo "| View ";
                        echo "| Reply "; 

                    ?>
                        | Post by <a href="#">
                            <?php
                        echo "".$showres['username'];
                        
                        ?>
                        </a>
                        <small id="updatetop" class="float-right text-muted mt-4">
                            <?php
                                // เขียนเงื่อนไขถ้า update_date มีค่า != null ให้ดึงค่าออกมาแสดง โดยใช้ function empty()
                                if(!empty($showres['update_date'])){

                                    $updatedate = strtotime($showres['update_date']);

                                    echo "Lastest Update ".date("d-m-Y h:i a",$updatedate);
                                }
                                // ถ้า มีค่า = null ก็ไม่ต้องแสดงอะไร
                            ?>
                        </small>
                    </p>
                </div>
            </div>
        </div>

        <!-- การ์ดเนื้อหากระทู้ -->

        <div class="col-11" id="topic-content-scroll">
            <div class="card mt-5 mb-2" id="topic-content">
                <div class="card-body">
                    <p class="card-text">
                        <small id="ownertop" class="float-right text-muted">
                            Message from topic author
                        </small>

                        <?php echo $showres['topic_detail']; ?>

                    </p>
                    <?php 
                        // เขียนเงื่อนไขตรวจสอบว่า ถ้า user_id ของผู้ login ตรงกันกับ user_id ของผู้โพสให้ ทำการแสดงปุ่มแก้ไขกระทู้
                        if($_SESSION['user_id']==$showres['user_id']){                    
                    ?>
                    <!-- ปุ่มแก้ไขกระทู้ ด้านล่าง -->
                    <a class="btn-sm btn-danger text-light float-right" id="edit-topic-btn-bottom" href="edit-topic.php?id=<?=$_GET['id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</i></a>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>


        <!--  สิ้นสุดของเนื้อหากระทู้ ----------------------------------- -->

        <?php 
        
            $showcom = mysqli_query($conn,"SELECT * FROM comment INNER JOIN user 
            ON  user.user_id = comment.user_id WHERE topic_id ={$_GET['id']}");
            $i=1;
            while($rowcom = mysqli_fetch_assoc($showcom)){
        
        
        ?>



        <!-- ส่วนของ Comment ---------------------- -->
        <div class="col-11">
            <div class="card mt-5" id="topic-comment">
                <div class="card-header" id="com-header">
                    <h4 class="card-title"><i class="fa fa-user text-info" aria-hidden="true"></i> </fa4-user-><a
                            href="#"><?=$rowcom['username'];?></a></h4>
                    <p class="card-text">
                        <small id="comment" class="float-right text-muted">
                            Comment no.<?=$i;?>
                        </small>
                    </p>
                </div>
                <div class="card-body">
                    <p class="card-text"><?=$rowcom['comm_detail'];?></p>
                </div>
                <div class="card-footer text-muted">
                    Replied on <?php $date = strtotime($rowcom['comm_date']); echo date("d-m-Y h:i a",$date); ?>
                    <?php 
                        // เขียนเงื่อนไขตรวจสอบว่า ถ้า user_id ของผู้ login ตรงกันกับ user_id ของผู้ตอบโพสให้ ทำการแสดงปุ่มแก้ไข comment
                        if($_SESSION['user_id']==$rowcom['user_id']){    
                        // เก็บ topic_id ไว้ใน $_SESSION เพื่อไปใช้ในหน้า edit-comment.php
                        $_SESSION['topic_id'] = $showres['topic_id']; 
                    ?>
                    <!-- ปุ่มแก้ไข comment -->
                    <a class="btn-sm btn-info text-light float-right" id="edit-comm-btn" href="edit-comment.php?id=<?=$rowcom['comm_id'];?>"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </i></a>
                     <?php   
                         }
                    ?>
                </div>
            </div>
        </div>
        <?php
            $i++; 
            }
        ?>
        <!--  ปุ่มตอบกระทู้ -->
        <div class="col-12">
            <a class="btn btn-primary replybut mt-4" href="comment.php?id=<?=$showres['topic_id'];?>">Reply this topic
                <i class="fa fa-paper-plane" aria-hidden="true"></i></a>
        </div>
        <!--  -->
    </div>
</div>
<!-- Footer and JavaScript & </body> </html> -->
<?php include("include/footer.php"); ?>