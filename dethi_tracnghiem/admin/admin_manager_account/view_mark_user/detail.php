<?php 
    include('connect.php');
    session_start();

    $id_exam = $_GET['id_exam'];
    // $email_session = $_SESSION["email"];
    // echo $email_sesstion;
    // echo 'id_exam là: ' .$email_sesstion;
    $sql = "select * from exam where id_exam = '".$id_exam."'";
    $rs = $conn->prepare($sql);
    $rs->execute();

    $result = $rs->fetch();
    // $q->question = $result;
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>