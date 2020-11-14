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
<?php include("include/carousel.php"); ?>

<!-- Breadcumbs -->
<ol class="breadcrumb bg-dark">
    <li class="breadcrumb-item active">Home</li>
</ol>

<!-- ปุุ่มเพิ่มกระทู้ -->
<div class="container">
    <div id="top-button">
        <a class="btn btn-info float-right" id="add-top-btn" href="create-topic.php">Create Topic</a>
    </div>
</div>

<!-- List topic table -->
<div class="section">
    <div class="container">
        <div class="table-responsive">
            <table class="table table-borderless table-striped table-hover" id="topic-list" width="100%">
                <thead class="thead-inverse">
                    <tr>
                        <th class=""></th>
                        <th class="text-center w-auto">Topic</th>
                        <th class="text-center">View</th>
                        <th class="text-center">Reply</th>
                        <th class="w-auto">Lastest Reply</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $countid = mysqli_num_rows(mysqli_query($conn, "SELECT topic_id FROM topic"));

                    $limitshow = 5;
                    $numpage = ceil($countid / $limitshow);

                    if ($_GET['page'] == "") {
                        $page = "1";
                    } else {
                        $page = $_GET['page'];
                    }
                    $start    = ($page - 1) * $limitshow;
                    $sql      =  "$start,$limitshow";

                    // เช็คการดึงหน้าเพจ
                    // echo "SELECT * FROM topic INNER JOIN user ON topic.user_id = user.user_id ORDER BY topic_id DESC LIMIT $sql ";    
                    // ดึงข้อมูลแสดงบนตาราง

                    $listpost = mysqli_query($conn, "SELECT * FROM topic INNER JOIN user ON topic.user_id = user.user_id ORDER BY topic_id DESC LIMIT $sql ");
                    $i = 1;
                    while ($row = mysqli_fetch_array($listpost)) {

                    ?>
                        <tr>
                            <td scope="row"> <?= $i; ?> </td>
                            <td><a href="viewpost.php?id=<?= $row['topic_id']; ?>"><b><?= $row['topic_name']; ?></b></a> </br>
                                Post by <a href="#"><?= $row['username']; ?></a> since
                                <a href="#"><?php $date = strtotime($row['topic_date']);
                                            echo date("d-m-Y h:i a", $date); ?></a>
                            </td>
                            <td class="text-center"><?= $row['topic_view']; ?></td>






                            <?php
                            // เช็คจำนวนคนที่ คอมเม้นใน โพสต์นั้นๆ ด้วย ฟังก์ชั่น COUNT
                            $countment = mysqli_query($conn, "SELECT COUNT(comm_id) AS cment FROM comment WHERE topic_id = {$row['topic_id']}");
                            $cment = mysqli_fetch_assoc($countment);
                            ?>
                            <td class="text-center"><?= $cment['cment']; ?></td>
                            <?php


                            // Query หาคนตอบกระทู้ล่าสุด โดยนนำ รหัส reply_id จากการ fetch ของ query ด้านบนมาเป็น เงื่อนไขในการหา
                            // โดยจะเช็คก่อนว่า ถ้า reply_id != null เท่ากับว่า มีคนคอมเม้นท์ล่าสุดแล้ว ให้เข้าเงื่อนไขด้านล่าง
                            if (!empty($row['reply_id'])) {
                                $lastreply = mysqli_query($conn, "SELECT * FROM user INNER JOIN topic ON user.user_id = topic.reply_id WHERE user.user_id ={$row['reply_id']}");
                                $resreply = mysqli_fetch_array($lastreply);
                            ?>
                                <td><a href="#">By <?= $resreply['username']; ?></a> </br>
                                    <?php $date2 = strtotime($row['reply_date']);
                                    echo date("d-m-Y h:i a", $date2); ?></td>
                            <?php
                                // ถ้าเท่ากับ null ให้ แสดงค่าว่างเปล่าไม่ต้อง query 
                            } else {
                            ?>
                                <td><a href="#"> </a></br></td>
                            <?php
                            }
                            ?>
                        </tr>
                    <?php

                        $i++;
                    }

                    ?>
                </tbody>
            </table>
        </div>
        <?php

        ?>

        <!-- paganitation -->
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-lg justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link bg-dark" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only text-dark">Previous</span>
                    </a>
                </li>
                <?php
                for ($i = 1; $i <= $numpage; $i++) {

                ?>
                    <li class="page-item <?php if ($page == $i) {
                                                echo "active";
                                            } ?>">
                        <a class="text-dark page-link" href="index.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php
                }
                ?>

                <!-- <li class="page-item active">
                    <a class="page-link text-dark" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="text-dark page-link" href="#"></a>
                </li> -->
                <li class="page-item">
                    <a class="page-link bg-dark" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="text-dark sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Content -->
<!-- Footer and JavaScript & </body> </html> -->
<?php include("include/footer.php"); ?>