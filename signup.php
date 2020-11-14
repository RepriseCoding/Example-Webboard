<?php 
    include("include/connect_db.php");
    include("include/session.php");
?>

<!-- <!doctype> <html> <head> <body> -->
<?php 
    include("include/head.php"); 
?>

<!-- Header banner -->
<?php 
    // include("include/headbanner.php"); 
?>

<!-- Content -->
<!-- Sign up form -->
<div class="container">
    <div class="row justify-content-center">
    <div class="col-10 col-lg-4 mt-5 mb-4">
            <h1><a href="index.php">Reprise Webboard</a></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10 col-lg-4 mt-4 mb-5" id="signup">
            <h3 class="text-center"><i class="fa fa-registered" aria-hidden="true"></i><b> REGISTER</b> </h3>
            <form action="signup-data.php" class="" method="POST" id="signUp">
                <div class="form-group ">
                    <label for="username"><b>Username</b></label>
                    <!-- ใส่แพทเทิล ห้าม ใส่ อักขระพิเศษ และต้องมี อักขระ 4 ตัวขึ้นไป แต่ยังใช้ได้ไม่ตามต้องการ-->
                    <input type="text" class="form-control form-control-sm"
                        title="Atleast 4 character and use a-z or 0-9 only" name="username"
                        pattern="(?=.*[a-zA-Z\d]).{4,}" id="username" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Use character a-z or number 0-9 only</small>
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <!-- ใส่แพทเทิล ห้าม ใส่ อักขระพิเศษ และต้องมี อักขระ 6 ตัวขึ้นไป แต่ยังใช้ได้ไม่ตามต้องการ-->
                    <input type="password" class="form-control" name="password" id="password"
                        title="Atleast 6 character and use a-z or 0-9 only" placeholder="" pattern="[a-zA-Z0-9]{6,}"
                        required>
                    <small id="helpId" class="form-text text-muted">Use character a-z or number 0-9 only</small>
                </div>
                <div class="form-group ">
                    <label for="fname"><b>Firstname</b></label>
                    <!-- ใส่แพทเทิล ห้าม ใส่ อักขระพิเศษ แต่ยังใช้ได้ไม่ตามต้องการ-->
                    <input type="text" class="form-control form-control-sm" title="Use a-z or A-Z only" name="fname"
                        pattern="[a-zA-Z]+" id="fname" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Use character a-z only</small>
                </div>
                <div class="form-group ">
                    <label for="lname"><b>Lastname</b></label>
                    <!-- ใส่แพทเทิล ห้าม ใส่ อักขระพิเศษ แต่ยังใช้ได้ไม่ตามต้องการ-->
                    <input type="text" class="form-control form-control-sm" title="Use a-z or A-Z only" name="lname"
                        pattern="[a-zA-Z]+" id="lname" aria-describedby="helpId" placeholder="" required>
                    <small id="helpId" class="form-text text-muted">Use character a-z only</small>
                </div>
                <button class="btn btn-success mb-3" type="submit" data-type="success" action="submit">Sign in</button>
            </form>
        </div>


    </div>
</div>



<!-- Footer and JavaScript & </body> </html> -->
<?php include("include/footer.php"); ?>