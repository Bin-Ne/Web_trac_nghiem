<?php

// $file = 'file1.txt';
// $myfile = fopen($file,'r');

// if($myfile){
//     $line_number = 0;
//     $lines_array = array();

//     while(($line = fgets($myfile)) !== false){
//         // Gán dữ liệu của dòng cho biến tương ứng
//         $var_name = "line_" . $line_number;
//         ${$var_name} = $line;

//         // Thêm dòng vào mảng
//         $lines_array[] = $line;

//         $line_number++;
//     }
//     fclose($myfile);

//     // Hiển thị biến cho từng dòng - Cách 1
//     // foreach($lines_array as $line){
//     //     echo $line . "<br>";
//     // }

    
//     // Hiển thị các biến cho từng dòng - Cách 2
//     $question_array[] = array(); // mảng chứa ds câu hỏi
//     // $question = array(); // mảng chứa nội dung câu hỏi, các option và đáp án

//     for($i = 0; $i <= $line_number; $i++){
//         // echo "Câu hỏi " . $i+1 . ": ";
//         echo $lines_array[$i] . "<br>";
//         // $question[$i] = $lines_array[$i];  
//     }

//     // echo $question_array[6][1];

// }

// else{
//     echo "Không thể mở tệp";
// }


for($i = 0; $i <= 10; $i++){
    echo $i . " ";
    $i++;
    echo $i . " ";
}

?>