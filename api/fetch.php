<?php
include "../configs.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data=json_decode(file_get_contents('php://input'));
    $userId=$data->userId;
    $year = date("Y");
    $month = date("m");
    $date = date("d");
    $targetDate = "$year-$month-$date";
    $query=mysqli_query($conn,"SELECT id,content,isDone FROM todolist WHERE userId='$userId' AND date ='$targetDate' AND isDeleted=0");
    $data=[];
    while($row=mysqli_fetch_assoc($query)){
        $data[]=$row;
    }
    if($query){
        echo json_encode($data);
    }
    else{
        echo json_encode(['error' => 'Some error has occurred']);
    }
}
else{
    echo json_encode(['error' => 'Invalid request method']);
}
?>