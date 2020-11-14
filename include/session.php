<?php
session_name("webboard");
session_start();
error_reporting(~E_NOTICE );
//  เช็ค session การ login ว่า ทำการ login หรือยัง
// if($_SESSION['username']=="") {  
//     echo "<script>alert('If you want to use this content on webboard you must sign in first.');window.location='login-page.php';</script>";  
//  }else
?> 