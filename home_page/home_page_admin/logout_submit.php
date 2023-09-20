<?php
    session_start();
    // include 'config.php';
    if(isset($_SESSION["email"])){
        $tmp = 0;
        echo '<script language="javascript">
        var tmp = "<?php echo $tmp ?>";
        
        if (confirm("Bạn có muốn đăng xuất không ?") == true) {
            tmp += 1;
            window.location.href = "http://localhost:81/home_page/home_page/home_page.php";
        } 
        else {
            
            window.location = "http://localhost:81/home_page/home_page_admin/home_page.php";
        }
        </script>';
        
        if($tmp == 1){
            unset($_SESSION["email"]);
        }
    }
    else{
        echo "ko có session";
    }
?>