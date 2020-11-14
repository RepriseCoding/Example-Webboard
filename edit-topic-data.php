<?php
    include('include/connect_db.php');
    include('include/session.php');

    $edittop = "UPDATE topic SET topic_name='{$_POST['topname']}',topic_detail='{$_POST['detail']}',update_date=NOW() WHERE topic_id ='{$_GET['id']}'";
    $edit = mysqli_query($conn,$edittop);

    if($edit){
        echo "<script>alert('Your topic is edited already. You can go to check it.');window.location='viewpost.php?id=".$_GET['id']."';</script>";
    }
    else
    {
        echo "Error </br>".mysqli_error($conn)."</br>".$edit;
    }

?>