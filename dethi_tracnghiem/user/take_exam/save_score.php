<?php
session_start();

try {
    include('connect.php');
    // echo '1';
    // $name = $_POST['name'];
    $mark = $_POST['mark'];
    $time_exam = $_POST['time_exam'];
    $email_user = $_POST['email_user'];

    $sql = "insert into exam (mark, time_exam, email_user)";
    $sql = $sql."value('".$mark."','".$time_exam."','".$email_user."')";
    if ($conn->query($sql) == TRUE) {
        // header("Location: http://localhost:81/dethi_tracnghiem/user/take_exam/fix_countdown.php");

        echo "Lưu điểm thành công";
    } 
    else {
        echo "Lưu điểm thất bại";
    }
} catch (Exception $e) {
    echo "Lỗi" .$e;
}
