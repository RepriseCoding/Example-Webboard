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
include("include/carousel.php");
?>
<?php
// เช็ค session ว่า มีการ login เข้ามาหรือยัง  ถ้าล็อกอินแล้ว ให้เข้าเงื่อนไขนี้
if (!empty($_SESSION['username'])) {


    $profile = mysqli_query($conn, "SELECT * FROM user WHERE user_id ={$_SESSION['user_id']}");
    $pf = mysqli_fetch_array($profile);
?>
<!-- Breadcumbs -->
<ol class="breadcrumb bg-dark">
    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Profile</a></li>
    <li class="breadcrumb-item active"><?= $_SESSION['username']; ?></li>
</ol>

<!-- Content -->
<div class="container mt-5 mb-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="card" id="profile-card">
                <div class="card-header">
                    <ul class="nav nav-tabs " role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true">
                                <i class="fa fa-user-circle" aria-hidden="true"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#topic-manage" role="tab" aria-selected="false">
                                <i class="now-ui-icons shopping_shop"></i> Manage Topic
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#reply-manage" role="tab" aria-selected="false">
                                <i class="now-ui-icons shopping_shop"></i> Manage Reply
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">
                                <i class="now-ui-icons ui-2_settings-90"></i> Settings
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body justify-content-center">
                    <!-- Tab panes -->
                    <div class="tab-content text-center">
                        <!------------------------ profile info tab -------------------------->
                        <div class="tab-pane active" id="home" role="tabpanel">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <img class="card-img-top mx-auto mt-4 mb-2" src="images/person.png"
                                        alt="example profile image">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <form action="profile-edit.php" id="profile">
                                        <div class="form-group text-left">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" class="form-control"
                                                value="<?= $_SESSION['username']; ?>" readonly>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="first">Firstname</label>
                                            <input type="text" name="first" id="first" class="form-control"
                                                value="<?= $pf['firstname']; ?>" readonly>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="last">Lastname</label>
                                            <input type="text" name="last" id="last" class="form-control"
                                                value="<?= $pf['lastname']; ?>" readonly>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="regdate">Register since</label>
                                            <input type="text" name="regdate" id="regdate" class="form-control"
                                                value="<?php $regdate = strtotime($pf['cre_date']); echo date("d-m-Y h:i a", $regdate); ?>"
                                                readonly>
                                        </div>
                                        <div class="form-group text-left">
                                            <label for="lastlog">Lastest logged in</label>
                                            <input type="text" name="lastlog" id="lastlog" class="form-control"
                                                value="<?php $logdate = strtotime($pf['log_date']); echo date("d-m-Y h:i a", $logdate); ?>"
                                                readonly>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>



                        <!---------------------- Topic manage tab ------------------------------>
                        <div class="tab-pane" id="topic-manage" role="tabpanel">
                            <h4>Manage your topic</h4>
                            <div class="table-responsive">
                                <table id="topic-table-manage"
                                    class="table table-striped table-inverse table-striped table-hover" width="100%">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>#</th>
                                            <th class="w-auto">Topic name</th>
                                            <th class="w-auto">Post date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            // Query ดึงข้อมูลจาก ตาราง topic มา list เป็น row โดยมีเงื่อนไขต้องเป็น topic ที่ โพสต์โดยผู้ ล็อกอินหรือ = $_SESSION['user_id'];
                                            $showpost = mysqli_query($conn,"SELECT * FROM topic WHERE user_id = {$_SESSION['user_id']} ORDER BY topic_date DESC");
                                            $i=1;
                                            while($rowpost=mysqli_fetch_array($showpost)){
                                    ?>
                                        <tr>
                                            <td scope="row"><?=$i;?></td>
                                            <td><a
                                                    href="viewpost.php?id=<?=$rowpost['topic_id'];?>"><?=$rowpost['topic_name'];?></a>
                                            </td>
                                            <td><?php $postdate = strtotime($rowpost['topic_date']); echo date("d-m-Y h:i a",$postdate); ?>
                                            </td>
                                            <td><a class="btn btn-warning text-light"
                                                    href="edit-topic.php?id=<?=$rowpost['topic_id'];?>">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="btn btn-danger text-light"
                                                    href="delete-topic.php?id=<?=$rowpost['topic_id'];?>">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                            }    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <!------------------------- Reply manage ------------------------------------------------->

                        <div class="tab-pane" id="reply-manage" role="tabpanel">
                            <h4>Manage your comment</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-inverse table-striped table-hover"
                                    id="reply-table-manage" width="100%">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>#</th>
                                            <th class="w-auto">Topic name to replied</th>
                                            <th class="w-auto">Reply date</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            // Query ดึงข้อมูลจาก ตาราง topic มา list เป็น row โดยมีเงื่อนไขต้องเป็น commment ที่ โพสต์โดยผู้ ล็อกอินหรือ = $_SESSION['user_id'];
                                            $showcomm = mysqli_query($conn,"SELECT * FROM comment 
                                            INNER JOIN topic
                                            ON topic.topic_id = comment.topic_id
                                            WHERE comment.user_id = {$_SESSION['user_id']} ORDER BY comment.comm_date DESC");
                                            $x=1;
                                            while($rowcomm=mysqli_fetch_array($showcomm)){
                                    ?>
                                        <tr>
                                            <td scope="row"><?=$x;?></td>
                                            <td><a
                                                    href="viewpost.php?id=<?=$rowcomm['topic_id'];?>"><?=$rowcomm['topic_name'];?></a>
                                            </td>
                                            <td><?php $commdate = strtotime($rowcomm['comm_date']); echo date("d-m-Y h:i a",$commdate); ?>
                                            </td>
                                            <td><a class="btn btn-warning text-light"
                                                    href="edit-comment.php?id=<?=$rowcomm['comm_id'];?>"><i
                                                        class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                            <td><a class="btn btn-danger text-light"
                                                    href="delete-comment.php?id=<?=$rowcomm['comm_id'];?>"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        </tr>
                                        <?php
                                        $x++;
                                            }    
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="settings" role="tabpanel">
                            <div class="col-12 col-lg-6">
                                <form action="profile-edit.php?id=<?=$_SESSION['user_id'];?>" method="POST"
                                    id="profile">
                                    <div class="form-group text-left">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" class="form-control"
                                            value="<?= $_SESSION['username']; ?>" readonly>
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="first">Firstname</label>
                                        <input type="text" name="first" id="first" class="form-control"
                                            value="<?= $pf['firstname']; ?>">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="last">Lastname</label>
                                        <input type="text" name="last" id="last" class="form-control"
                                            value="<?= $pf['lastname']; ?>">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="pass1">Password</label>
                                        <input type="password" name="pass1" id="pass1" class="form-control">
                                    </div>
                                    <div class="form-group text-left">
                                        <label for="pass2">Confirm Password</label>
                                        <input type="password" name="pass2" id="pass2" class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="card">
                <img class="card-img-top mx-auto mt-5" src="images/person.png" alt="">
                <div class="card-body">
                    <form action="profile." id="profile"></form>
                </div>
            </div> -->
            <!-- <form action="create-topic-data.php" method="POST" name="crtTop" id="crtTop">
                <div class="form-group mt-3">
                    <label for="topname">Topic name :</label>
                    <input type="text" class="form-control" name="topname" id="topname" maxlength="80"
                        aria-describedby="helpId" placeholder="Topic name must less than 80 characters" required>
                </div>
                <div class="form-group">
                    <label for="detail">Detail :</label>
                    <textarea class="form-control" name="detail" id="tiny"></textarea>
                </div>
                <a class="btn btn-warning mb-4 mt-2 ml-1" href="javascript:history.back()"><i class="fa fa-undo p-1"
                        aria-hidden="true"></i>Back</a>
                <button type="submit" action="submit" data-type="success" class="btn btn-success mb-4 mt-2 ml-1"><i
                        class="fa fa-podcast" aria-hidden="true"></i> Post</button>
            </form> -->
        </div>
    </div>
</div>
<!-- Footer and JavaScript & </body> </html> -->
<?php include("include/footer.php"); ?>

<?php
}
// ถ้ายังไม่ได้ login ส่งกลับไปหน้า index
else {
    include("include/kickback.php");
}
?>