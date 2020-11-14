<?php
session_name("webboard");

session_start();

session_destroy();
echo "<script>alert('Logout is success');window.location='index.php';</script>"
?>