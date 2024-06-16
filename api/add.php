<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
include "../configs.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data=json_decode(file_get_contents('php://input'));
    $content=$data->content;
    $userId=$data->userId;
    $date=date('Y-m-d');
    $query=mysqli_query($conn,"INSERT INTO todolist(userId,content,date) VALUES ('$userId','$content','$date') ");
    if($query){
        echo json_encode(['success' => 'true']);
    }
    else{
        echo json_encode(['error' => 'Some error has occurred']);
    }
}
else{
    echo json_encode(['error' => 'Invalid request method']);
}
?>