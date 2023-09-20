<?php
    include('connect.php');

    $sql = $conn->prepare("SELECT * FROM ds_cau_hoi ORDER BY RAND() LIMIT 5");
    $sql->execute();
    // $index = 1;
    // $data = '';
    // while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
    //     $data.= '<div class="row" style="margin-left: 10px">';
    //     $data.= '<h5 style="font-weight: bold;"> <span class="text-success">Câu '.$index.': </span> '.$result['question'].'</h5>';
    //     $data.= '<fieldset id="group'.$index.'">';
    //         $data.= '<div class="radio col-sm-12">';
        
    //     $data.= '<label><input type="radio" name="group'.$index.'" class="rdOptionA"> <span style="font-weight:bold;">A. </span> '.$result['option_a'].'</label>';
    //     $data.= '</div>';

    //     $data.= '<div class="radio col-sm-12">';
    //     $data.= '    <label><input type="radio" name="group'.$index.'" class="rdOptionB"><span style="font-weight:bold;">B. </span> '.$result['option_b'].'</label>';
    //     $data.= '</div>';

    //     $data.= '<div class="radio col-sm-12">';
    //     $data.= '    <label><input type="radio" name="group'.$index.'" class="rdOptionC"><span style="font-weight:bold;">C. </span> '.$result['option_c'].'</label>';
    //     $data.= '</div>';

    //     $data.= '<div class="radio col-sm-12">';
    //     $data.= '    <label><input type="radio" name="group'.$index.'" class="rdOptionD"><span style="font-weight:bold;">D. </span> '.$result['option_d'].'</label>';
    //     $data.= '</div>';
    //     $data.= '</fieldset>';
    //     $data.= '<input type="hidden" name="answer" value="'.$result['answer'].'">';
    //     $data.= '</div>'; 

    //     $index++;
    // }
    // echo $data;
 
    echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
?>