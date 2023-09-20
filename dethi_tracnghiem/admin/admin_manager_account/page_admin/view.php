<?php 
    include('connect.php');

    $search = $_GET['search']; 
    $page = $_GET['page'];   
    $sql = $conn->prepare("SELECT * FROM user_inf where name like '%".$search."%' limit 5 offset ".($page-1)*5);
    $sql->execute();
    $index = 1;
    $data = '';
    $tmp = '';
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        $data.= '<tr id='.$result['id'].'>';
        $data.= '<th scope="row">'.($index++).'</th>';
        $data.= '<td>' .$result['role']. '</td>';
        $data.= '<td>' .$result['name']. '</td>';
        $data.= '<td>' .$result['email']. '</td>';
        $data.= '<td>' .$result['password']. '</td>';

        $data.= '<td>';
        $data.= '<input type="button" class="btn btn-link" value="Xem điểm" name="views" href="# "> &nbsp';
        $data.= '</td>';

        $data.= '<td>';
        $data.= '<input type="button" class="btn btn-md btn-info" value="Xem" name="view"> &nbsp';
        $data.= '<input type="button" class="btn btn-md btn-warning" value="Sửa" name="update"> &nbsp';
        $data.= '<input type="button" class="btn btn-md btn-danger" value="Xóa" name="delete"> &nbsp'; 
        $data.= '</td>';
        $data.= '</tr>';
    }
    echo $data;
?>