<?php
    include('include/connect_db.php');
    include('include/session.php');

    $editcom = "UPDATE comment SET comm_detail='{$_POST['comment']}',commup_date=NOW() WHERE comm_id ='{$_GET['id']}'";
    $editc = mysqli_query($conn,$editcom);

    if($editc){
        echo "<script>alert('Your comment is edited already. You can go to check it.');window.location='viewpost.php?id=".$_SESSION['topic_id']."';</script>";
        // echo "</br>".$editcom;
    }
    else
    {
        echo "Error </br>".mysqli_error($conn)."</br>".$editcom;
    }

?>