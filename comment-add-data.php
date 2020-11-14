<?php 

    include("include/connect_db.php");
    include("include/session.php");

    $addcom = mysqli_query($conn,"INSERT INTO comment (comm_detail,comm_date,topic_id,user_id) VALUES  
    ('".$_POST['comment']."',NOW(),'".$_GET['id']."','".$_SESSION['user_id']."')");

    $updatetop = mysqli_query($conn,"UPDATE topic SET reply_id = {$_SESSION['user_id']},reply_date = NOW() WHERE topic_id = {$_GET['id']}");

    if($addcom&&$updatetop){
        echo "<script>alert('Your reply has success');window.location='viewpost.php?id=".$_GET['id']."';</script>";
    }
    else
    {
        echo "Error"."</br>".mysqli_error($conn)."</br>".$addcom."</br>".$updatetop;
    }

?>