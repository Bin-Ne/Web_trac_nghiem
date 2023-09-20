<?php 
    include('connect.php');

    $search = $_GET['search']; 
    $page = $_GET['page'];   
    $sql = $conn->prepare("SELECT * FROM exam where email_user like '%".$search."%' limit 5 offset ".($page-1)*5);
    $sql->execute();

    $index = 1;
    $data = '';
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        $data.= '<tr id='.$result['id_exam'].'>';
        $data.= '<th scope="row">'.($index++).'</th>';
        $data.= '<td>' .$result['email_user']. '</td>';
        $data.= '<td>' .$result['mark']. '</td>';
        $data.= '<td>' .$result['time_exam']. '</td>';

        $data.= '<td>';
        $data.= '<input type="button" class="btn btn-md btn-danger" value="Xóa" name="delete"> &nbsp'; 
        $data.= '</td>';
        $data.= '</tr>';
    }

    
    echo $data;
?>