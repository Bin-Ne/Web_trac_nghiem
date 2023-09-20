<?php
    session_start();
    include 'config.php';
    
    if( isset($_POST['submit']) && $_POST["email"] != '' && $_POST["password"] != ''){
        $email = $_POST["email"];
        $password = $_POST["password"];
        // $name = $_POST["name"];
        
        // $password = md5($password); 

        $sql_admin = "SELECT * FROM user_inf WHERE email = '$email' AND password = '$password' AND role='admin'";
        $sql_user = "SELECT * FROM user_inf WHERE email = '$email' AND password = '$password' AND role='user'";
        // $sql_name_admin = "SELECT name FROM user_inf WHERE email = '$email' AND password = '$password' AND role='admin'";
        // $sql_name_user = "SELECT name FROM user_inf WHERE email = '$email' AND password = '$password' AND role='user'";

        $rs_admin = mysqli_query($conn, $sql_admin);
        $rs_user = mysqli_query($conn, $sql_user);
        // $rs_amind_name = mysqli_query($conn, $sql_name_admin);
        // $rs_amind_user = mysqli_query($conn, $sql_name_user);


        // $row_admin = mysqli_fetch_assoc($rs_amind_name);
        // $row_user = mysqli_fetch_assoc($rs_amind_user);

        if(mysqli_num_rows($rs_admin) > 0){
            // echo "Đăng nhập thành công rồi nha!";
            $_SESSION["email"] = $email;  
            // $_SESSION["name"] = $row_admin["name"];
            header("Location: http://localhost:81/home_page/home_page_admin/home_page.php");
            
        }
        if(mysqli_num_rows($rs_user) > 0){
            $_SESSION["email"] = $email; 
            // $_SESSION["name"] = $row_user["name"];
            header("Location: http://localhost:81/home_page/home_page_user/home_page.php");
        }
        else{
            echo '<script language="javascript">
                    alert("Nhập sai password hoặc user");
                    window.history.back("login.php");
                </script>';
        }
    }

    else{
        echo '<script language="javascript">
            alert("Hãy nhập đủ thông tin!");
            window.location="login.php";
        </script>';
    }
?>