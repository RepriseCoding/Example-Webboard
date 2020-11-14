<?php
    include('include/connect_db.php');
    include('include/session.php');

    $create = "INSERT INTO topic (topic_name,topic_detail,topic_date,user_id) VALUES ('".$_POST['topname']."','".$_POST['detail']."',NOW(),'".$_SESSION['user_id']."')";
    $cretop = mysqli_query($conn,$create);

    if($cretop){
        echo "<script>alert('Your topic is post now.');window.location='index.php';</script>";
    }
    else
    {
        echo "Error </br>".mysqli_error($conn)."</br>".$create;
    }

?>