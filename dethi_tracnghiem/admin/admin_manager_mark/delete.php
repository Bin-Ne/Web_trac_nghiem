<?php
    include('connect.php');

    try {
        $id = $_POST['id'];
        $sql = "delete from exam where id_exam = '".$id."'";

        if ($conn->query($sql) == TRUE) {
            echo "Xóa lịch sử thi thành công!";
        } 
        else {
            echo "Xóa lịch sử thi thất bại!";
        }
    } catch (Exception $e) {
         echo "Lỗi xóa câu hỏi" .$e;
    }
?>