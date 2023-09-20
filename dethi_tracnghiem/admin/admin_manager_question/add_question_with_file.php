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


try {
    include('connect.php');

    $file = 'files_upload/file_question_'. $fileCount . '.txt';
    $myfile = fopen($file,'r');
    if($myfile){
        $line_number = 0;
        $lines_array = array();

        while(($line = fgets($myfile)) !== false){
            // Gán dữ liệu của dòng cho biến tương ứng
            $var_name = "line_" . $line_number;
            ${$var_name} = $line;
            // Thêm dòng vào mảng
            $lines_array[] = $line;
            $line_number++;
        }
        fclose($myfile);

        $dem = 0;
        for($i = 0; $i < $line_number; $i++){
            $question = $lines_array[$i];
            $i++;
            $option_a = $lines_array[$i];
            $i++;
            $option_b = $lines_array[$i];
            $i++;
            $option_c = $lines_array[$i];
            $i++;
            $option_d = $lines_array[$i];
            $i++;
            $answer = $lines_array[$i];
    
            $sql = "insert into ds_cau_hoi(question,option_a,option_b,option_c,option_d,answer)";
            $sql = $sql."value('".$question."','".$option_a."','".$option_b."','".$option_c."','".$option_d."','".$answer."')";

            $conn->query($sql);
            
            $dem += 6;
        }

        if($dem == $line_number){
            echo '<script>
            showSuccessAlert("Thêm câu hỏi thành công!");
            </script>';

            echo '<script>
            setTimeout(function() {
                window.history.back(); // Chuyển về trang trước
            }, 2000); // 2000 milliseconds = 2 seconds
            </script>';
            // echo "Thêm câu hỏi thành công!";
        }
        else{
            echo '<script>
            showErrorAlert("Lỗi thêm câu hỏi!");
            </script>';

            echo '<script>
            setTimeout(function() {
                window.history.back(); // Chuyển về trang trước
            }, 2000); // 2000 milliseconds = 2 seconds
            </script>';
        }
        
    }
    else {
        // echo "Không thể mở tệp";
    }
    
    // if ($conn->query($sql) == TRUE) {
    //     echo "Thêm câu hỏi thành công";
    // } 
    // else {
    //     echo "Không thêm được câu hỏi";
    // }
} catch (Exception $e) {
    echo "Lỗi" .$e;
}

?>
