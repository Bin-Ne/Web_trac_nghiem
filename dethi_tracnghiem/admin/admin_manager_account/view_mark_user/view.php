<?php 
    include('connect.php');
    session_start();
    
    $search = $_GET['search']; 
    $page = $_GET['page'];   
    $email_session = $_SESSION['email'];
    $sql = $conn->prepare("SELECT * FROM exam where email_user = '".$email_session."' and mark like '%".$search."%' limit 5 offset ".($page-1)*5);
    $sql->execute();
    $index = 1;
    $data = '';
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        $data.= '<tr id='.$result['id_exam'].'>';
        $data.= '<th scope="row">'.($index++).'</th>';
        $data.= '<td>' .$result['mark']. '</td>';
        $data.= '<td>'.$result['time_exam']. '</td>';
        // $data.= '</td>';
        $data.= '</tr>';

        // $data.= '<button type="" class="btn btn-sm btn-info">Thêm</button>&nbsp';
        // $data.= '<input type="button" class="btn btn-sm btn-info" value="Xem" name="view"> &nbsp';
        // $data.= '<input type="button" class="btn btn-sm btn-warning" value="Sửa" name="update"> &nbsp';
        // $data.= '<input type="button" class="btn btn-sm btn-danger" value="Xóa" name="delete"> &nbsp'; 
        
        
    }
    echo $data;
?>