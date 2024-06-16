<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
include "../configs.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data=json_decode(file_get_contents('php://input'));
    $contentId=$data->contentId;
    $userId=$data->userId;
    $isDone=$data->isDone;
    $year = date("Y");
    $month = date("m");
    $date = date("d");
    $targetDate = "$year-$month-$date";
    $query=mysqli_query($conn,"UPDATE todolist SET isDone='$isDone' WHERE userId='$userId' AND id ='$contentId' AND date ='$targetDate'");
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