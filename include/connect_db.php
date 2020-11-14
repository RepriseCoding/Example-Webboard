<?php 
// ตั้งค่า timezone ของดาต้าเบสของเรา
date_default_timezone_set("Asia/Bangkok");
// ประกาศตัวแปรของตัว connect server 
$servername = "localhost";
$username = "nakarink_repriseboard";
$password = "123456";
$dbname = "nakarink_webboard";
// ใช้ฟังก์ชั่น connect
$conn = mysqli_connect($servername,$username,$password,$dbname);
// ประกาศตั้งค่า Character set เป็น UTF8
mysqli_set_charset($conn,"utf8");
// เงื่อนไขตรวจสอบ ถ้าไม่ connect ให้แสดงเหตุผลที่ไม่สามารถ connect ได้
    if(!$conn){
        echo mysqli_connect_error();
// ถ้า connect สำเร็จ
    }else{
        // ให้แสดง character set ที่ใช้งานปัจจุบัน
        // echo "Charset use is : ".mysqli_character_set_name($conn)."</br>";
        // ให้แสดง timezone ที่ตั้งไว้ปัจจุบัน
        // echo "Datetime default use is : ".date_default_timezone_get()."</br>";
    }
