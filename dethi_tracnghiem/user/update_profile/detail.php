<?php 
    include('connect.php');
    $id = $_GET['id'];
    // echo 'id là: ' .$id;
    $sql = "select * from user_inf where id = '".$id."'";
    $rs = $conn->prepare($sql);
    $rs->execute();

    $result = $rs->fetch();
    // $q->question = $result;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>