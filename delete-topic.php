<?php 
    include("include/connect_db.php");
    include("include/session.php");
    $sql1 = "DELETE FROM comment WHERE topic_id ='{$_GET['id']}'";
    $query = mysqli_query($conn,$sql1);

    $deltop = "DELETE FROM topic WHERE topic_id ={$_GET['id']}";
    $del = mysqli_query($conn,$deltop);
    if($query&&$del){
        echo "<script>alert('Delete Sucess.');window.location='index.php';</script>";
    }else{
        echo "ERROR </br>".mysqli_error($conn)."</br>"."$sql1"."</br>".$deltop;
    }

?>