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
    <li class="breadcrumb-item active">Create Topic</li>
</ol>
    <?php
    // เช็ค session ว่า มีการ login เข้ามาหรือยัง  ถ้าล็อกอินแล้ว ให้เข้าเงื่อนไขนี้
        if(!empty($_SESSION['username'])){
    ?>
<!-- Content -->
<div class="container mt-5 mb-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10" id="createTopic">
            <form action="create-topic-data.php" method="POST" name="crtTop" id="crtTop">
                <div class="form-group mt-3">
                    <label for="topname">Topic name :</label>
                    <input type="text" class="form-control" name="topname" id="topname" maxlength="80"
                        aria-describedby="helpId" placeholder="Topic name must less than 80 characters" required>
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <div class="form-group">
                    <label for="detail">Detail :</label>
                    <textarea class="form-control" name="detail" id="tiny"></textarea>
                </div>
                <a class="btn btn-warning mb-4 mt-2 ml-1" href="javascript:history.back()"><i class="fa fa-undo p-1" aria-hidden="true"></i>Back</a>
                <!-- <button class="btn btn-danger mb-4 mt-2 ml-1" type="reset">Reset</button> -->
                <button type="submit" action="submit" data-type="success" class="btn btn-success mb-4 mt-2 ml-1"  ><i class="fa fa-podcast" aria-hidden="true"></i> Post</button>
            </form>
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