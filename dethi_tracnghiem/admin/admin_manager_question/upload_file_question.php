<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    
</body>

<script>
    function showSuccessAlert(title_alert) {
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: title_alert,
        showConfirmButton: false,
        timer: 2000
        })
    }
    function showErrorAlert(title_alert) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: title_alert,
            showConfirmButton: false,
            timer: 2000
        })
    }
</script>

</html>





<?php
// var_dump($_FILES);
// move_uploaded_file($_FILES['upload_file']['tmp_name'],'files_upload/' . $_FILES['upload_file']['name'])

$folder_path = 'files_upload/'; // Đường dẫn tới folder mình muốn lưu file tải lên
$original_file_name = $_FILES['upload_file']['name']; // File và tên gốc
$file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION); // Để lấy loại file (txt, doc, ...)
$file_path = $folder_path . $original_file_name;

// Đếm số lượng file trong 1 folder
$folder = 'files_upload';
$files = scandir($folder);
$fileCount = 0;
foreach ($files as $file) {
    if (is_file($folder . '/' . $file)) {
        $fileCount++;
    }
}
// echo "Số lượng file trong thư mục là: " . $fileCount;

$new_file_name = 'file_question_'. $fileCount + 1 . '.' . $file_extension; // Biến lưu tên mới
$file_path = $folder_path . $new_file_name; 

$flag_ok = true;

//Check file trùng tên
if(file_exists($file_path)){
    echo 'Tên file đã tồn tại!';
    $flag_ok = false;
}
else{
    // Check loại file (txt, doc)
    $ex = array('txt', 'docx');
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
    if(!in_array($file_type, $ex)){
        $flag_ok = false;
        echo '<script>
            showErrorAlert("Loại file không hợp lệ!");
          </script>';

        echo '<script>
        setTimeout(function() {
            window.history.back(); // Chuyển về trang trước
        }, 2000); // 2000 milliseconds = 2 seconds
        </script>';

        // header("Location: " . $_SERVER['HTTP_REFERER']);
        // exit;
    }
    else{
        // Check dung lượng
        if($_FILES['upload_file']['size'] > 500000){
            $flag_ok = false;

            echo '<script>
            showErrorAlert("Dung lượng quá lớn!");
            </script>';

            echo '<script>
            setTimeout(function() {
                window.history.back(); // Chuyển về trang trước
            }, 2000); // 2000 milliseconds = 2 seconds
            </script>';
        }
    }  
}

if($flag_ok){
    // echo 'Upload file thành công!';        
    move_uploaded_file($_FILES['upload_file']['tmp_name'], $file_path);
    header("Location: add_question_with_file.php");
    exit;
    // header("Location: " . $_SERVER['HTTP_REFERER']);
    // exit;
}
else{
    // echo 'Không thể upload file!';
}
?>