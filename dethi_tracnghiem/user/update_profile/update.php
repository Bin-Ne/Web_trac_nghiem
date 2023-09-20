<?php 
    try {
        include('connect.php');

        // lấy các giá trị đã được truyền từ view
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        // echo $id;
        $sql = "update user_inf ";
        $sql = $sql."set name = '".$name."',";
        $sql = $sql."email = '".$email."',";
        $sql = $sql."role = '".$role."'";
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