<?php 
    include("include/connect_db.php");
    include("include/session.php");
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
        $showname = mysqli_query($conn,"SELECT * FROM topic INNER JOIN user ON topic.user_id = user.user_id WHERE topic.topic_id ={$_SESSION['topic_id']}");
        $showres = mysqli_fetch_array($showname);
    ?>
    <li class="breadcrumb-item active"><?=$showres['topic_name'];?></li>
</ol>
    <?php
    // เช็ค session ว่า มีการ login เข้ามาหรือยัง  ถ้าล็อกอินแล้ว ให้เข้าเงื่อนไขนี้
        if(!empty($_SESSION['username'])){
    ?>
<!-- Content -->
<div class="container">
    <div class="row justify-content-center">
        <!-- -------------------------------------------ส่วนของ หัวข้อกระทู้ --------------------------------- -->
        <!-- การ์ดหัวข้อ -->
        <div class="col-11" id="title-topic">
            <div class="card mt-5" id="topic-head">
                <div class="card-body">
                    <h3 class="card-title text-primary"><b><?=$showres['topic_name'];?></b></h3>
                    <p class="card-text">
                        Since <?php $date = strtotime($showres['topic_date']); echo date("d-m-Y H:s ",$date) ;
                        echo "View ";
                        echo "Reply ";
                        echo "Post by ".$showres['username'];
                        
                        ?>
                        <small id="updatetop" class="float-right text-muted mt-4">
                            Lastest Update asdasdadsasdsaDsadd By asdasdsad
                        </small>
                    </p>
                </div>
            </div>
        </div>
        <!-- การ์ดเนื้อหากระทู้ -->

        <div class="col-11">
            <!-- ใช้ class scrollable ทำให้ card เล็กลงแต่จะมี scroll bar ด้านข้างเผื่อจะได้ไม่ต้องเลื่อนเมาส์เยอะ -->
            <div class="card mt-5 mb-3 scrollable" id="topic-content">
                <div class="card-body table">
                    <p class="card-text">
                        <small id="ownertop" class="float-right text-muted">
                            Message from topic author
                        </small>

                        <?php echo $showres['topic_detail']; ?>

                    </p>
                </div>
            </div>
        </div>
        <!--  สิ้นสุดของเนื้อหากระทู้ ----------------------------------- -->
        <!-- ช่องกรอกและแก้ไข comment -->
        
        <?php 
            // เก็บค่า topic_id ไว้ $_SESSION เพื่อจะส่งไป action Query หน้า comment-edit-data.php
            // $_SESSION['topic_id'] = $showres['topic_id'];

            // Query ข้อมูลของ Comment ออกมาแสดงเพื่อแก้ไข

        $showcom = mysqli_query($conn,"SELECT * FROM comment WHERE comm_id ={$_GET['id']}");
        $comm = mysqli_fetch_array($showcom);
        
        ?>
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-body" id="comment-box">
                    <form action="edit-comment-data.php?id=<?=$comm['comm_id'];?>" method="POST" name="addCom"
                        id="addCom">
                        <div class="form-group">
                            <label for="detail">Comment :</label>
                            <textarea class="form-control" name="comment" id="comment"><?php echo $comm['comm_detail'];?></textarea>
                        </div>
                        <a class="btn btn-warning replybut mt-4 text-light"
                            href="javascript:history.back()">
                            <i class="fa fa-undo" aria-hidden="true"></i>
                            back
                            
                        </a>
                        <button type="submit" action="submit" data-type="succes"
                            class="btn btn-success replybut mt-4 mr-2">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            Edit this topic
                            
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer and JavaScript & </body> </html> -->
<?php include("include/footer.php"); ?>

<?php
        }
        // ถ้ายังไม่ได้ login ส่งกลับไปหน้า index
        else
        {
            include("include/kickback.php");
        }
        ?>