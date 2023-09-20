<?php
    include('connect.php');

    try {
        $id = $_POST['id'];
        $sql = "delete from user_inf where id = '".$id."'";

        if ($conn->query($sql) == TRUE) {
            echo "Xóa Xóa tài khoảng thành công!";
        } 
        else {
            echo "Xóa Xóa tài khoảng thất bại!";
        }
    } catch (Exception $e) {
         echo "Lỗi xóa Xóa tài khoảng" .$e;
    }
?>