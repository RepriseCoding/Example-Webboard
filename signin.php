<?php
    include("include/connect_db.php");
    include("include/session.php");
    // ประกาศตัวแปรจะได้เขียนสั้นลง
    $uname = $_POST['username'];
    $pass = $_POST['password'];

        $checkid = "SELECT * FROM user WHERE username = '$uname' AND userpass = '$pass'";
        $querycheck = mysqli_query($conn,$checkid);
        $fetchcheck = mysqli_fetch_array($querycheck);
        // เช็คหา username ที่มีอยู่ในระบบว่า ตรงหรือไม่
        $get_rows = mysqli_affected_rows($conn);

        // ถ้าพบ username ตรงกัน จะทำการ updaet log เวลาที่ login
        if($get_rows >=1){
            $uplog = "UPDATE user SET log_date = NOW() WHERE user_id = {$fetchcheck['user_id']}";
            $uplogquery = mysqli_query($conn,$uplog);
            // เขียนเงื่อนไขเช็คว่า ถ้า Query สำเร็จ
            if($uplogquery){
                $_SESSION['username'] = $fetchcheck['username'];
                $_SESSION['user_id'] = $fetchcheck['user_id'];

                // redirect ไปหน้า index.php
                echo "<script>alert('Login success');window.location='index.php'</script>";
            exit;  
            }
            // ถ้า  Query ข้อมูลไม่ผ่าน
            else
            {
                echo mysqli_error($conn);
            }
            
        }
        // ถ้าไม่พบ
        else
        {
            echo "<script>alert('Username or Password are valid');window.location='login-page.php'</script>";
        }
























?>