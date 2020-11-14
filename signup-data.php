<?php
    include("include/connect_db.php");

    // ประกาศตัวแปรจะได้เขียนสั้นลง
    $uname = $_POST['username'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

        $checkid = "SELECT username FROM user WHERE username = '$uname'";
        $querycheck = mysqli_query($conn,$checkid);
        $fetchcheck = mysqli_fetch_array($querycheck);
        // เช็คหา username ที่มีอยู่ในระบบว่า ตรงกับที่สมัครไหม 
        $get_rows = mysqli_affected_rows($conn);

        
        // ถ้าพบ username ซ้ำ
        if($get_rows >=1){
            echo "<script>alert('Username : ".$uname." already Exist.');window.location='signup.php';</script>";
            
            die();
        }
        // ถ้าไม่ซ้ำ ให้ทำการ Query ข้อมูล
        else
        {
            
            // Query mysqli insert ข้อมูลเข้าไป
             $regis = "INSERT INTO user (username,userpass,firstname,lastname,cre_date) 
             VALUES ('$uname','$pass','$fname','$lname',NOW())";
             $queryregis = mysqli_query($conn,$regis);
             
             // เขียนเงื่อนไขเช็คว่า ถ้า Query สำเร็จ
             if($queryregis){
                 echo "<script>alert('Sign up success');window.location='index.php';</script>";
                //  echo $regis;
             }
             // ถ้า  Query ข้อมูลไม่ผ่าน
             else{
                 echo mysqli_error($conn);
             }
        }
























?>