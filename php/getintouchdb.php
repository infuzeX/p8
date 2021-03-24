<?php
header('Content-Type: application/json');

require './response.php';

$res = new Response;
$conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');

if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
    $res ->success = false;
    $res ->message = "failed to submit";
    echo encode($res);
}else{

   $json = file_get_contents('php://input');
   $data = json_decode($json);

   if(isset($data)){

    //store object data in variable
    $name = $data ->name;
    $email = $data ->email;
    $contact = $data ->contact;
    $subject = $data ->subject;
    $message = $data ->message;

    /*insert data*/
    $query = "INSERT INTO getInTouch (`name`,`email`, `contact`, `subject`, `message`) VALUES ('$name','$email', $contact, '$subject','$message')";
    $inserted = $conn->query($query);

    if($inserted){
     $res ->success = true;
     $res ->message = "submitted successfully";
    }else{
     $res ->success = false;
     $res ->message = "failed to submit";
    }
    echo json_encode($res);
   }
 
}

?>