<?php 
    include("include/connect_db.php");
    include("include/session.php")
?>

<!-- <!doctype> <html> <head> <body> -->
<?php 
    include("include/head.php"); 
?>

<!-- Header banner -->
<?php 
    // include("include/headbanner.php"); 
?>
<?php
if(!empty($_SESSION['username'])){
    echo "<script>alert('You still logged in !!!');window.location='index.php';</script>";
}
else
{


?>
<!-- Content -->
<!-- Sign up form -->
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-10 col-lg-4 mt-5 mb-4">
            <h1><a href="index.php">Reprise Webboard</a></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-lg-4 mt-4 mb-4" id="signin">
            <h3 class="text-center"> <i class="fa fa-sign-in" aria-hidden="true"></i> <b> Sign in </b> </h3>
            <form action="signin.php" class="" method="POST" id="signIn">
                <div class="form-group ">
                    <label for="username"><b>Username</b></label>
                    <!-- ใส่แพทเทิล ห้าม ใส่ อักขระพิเศษ และต้องมี อักขระ 4 ตัวขึ้นไป แต่ยังใช้ได้ไม่ตามต้องการ-->
                    <input type="text" class="form-control form-control-sm"
                        title="Atleast 4 character and use a-z or 0-9 only" name="username" id="username"
                        aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Use character a-z or number 0-9 only</small>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <!-- ใส่แพทเทิล ห้าม ใส่ อักขระพิเศษ และต้องมี อักขระ 6 ตัวขึ้นไป แต่ยังใช้ได้ไม่ตามต้องการ-->
                    <input type="password" class="form-control" name="password" id="password"
                        title="Atleast 6 character and use a-z or 0-9 only" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Use character a-z or number 0-9 only</small>
                </div>
                <button class="btn btn-success" type="submit" data-type="success" action="submit">Sign in</button>
                <a class="btn btn-info" href="signup.php">Sign up</a>
            </form>
        </div>


    </div>
</div>



<!-- Footer and JavaScript & </body> </html> -->
<?php include("include/footer.php"); ?>
<?php
}
?>