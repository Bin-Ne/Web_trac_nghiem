<?php 
    include('connect.php');
    session_start();

    $search = $_GET['search']; 
    $page = $_GET['page']; 
    $email_session = $_SESSION['email'];  
    $sql = $conn->prepare("SELECT * FROM user_inf where email = '".$email_session."' and name like '%".$search."%' limit 5 offset ".($page-1)*5);
    $sql->execute();
    $index = 1;
    $data = '';
    while ($result = $sql->fetch(PDO::FETCH_ASSOC)) {
        $data.= '<tr id='.$result['id'].'>';
        $data.= '<th scope="row">'.($index++).'</th>';
        $data.= '<td>' .$result['name']. '</td>';
        $data.= '<td>' .$result['email']. '</td>';
        $data.= '<td>'.$result['role']. '</td>';
        $data.= '<td>';
        $data.= '<input type="button" class="btn btn-md btn-warning" value="Sửa" name="update" style="width:100px;font-size:16px;"> &nbsp';
        $data.= '</td>';
        $data.= '</tr>';
    }
    echo $data;
?>