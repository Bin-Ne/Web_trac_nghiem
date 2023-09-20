<?php 
    try {
        include('connect.php');

        // lấy các giá trị đã được truyền từ view
        $id = $_POST['id'];
        $role = $_POST['role'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "update user_inf ";
        $sql = $sql."set role = '".$role."',";
        $sql = $sql."name = '".$name."',";
        $sql = $sql."email = '".$email."',";
        $sql = $sql."password = '".$password."'";
        $sql = $sql." where id = '".$id."'";

        if ($conn->query($sql) == TRUE) {
            echo "Cập nhật tài khoảng thành công!";
        } 
        else {
            echo "Cập nhật tài khoảng thất bại!";
        }
    } catch (Exception $e) {
        echo "Lỗi cập nhật tài khoảng: ".$e;
    }
?>