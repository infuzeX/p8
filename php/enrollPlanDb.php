<?php
header('Content-Type: application/json');

require './response.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data)){

   $res = new Response;

   //store object data in variable
   $name = $data ->name;
   $email = $data ->email;
   $contact = $data ->contact;
   $code = $data ->coupon;
   $plan = $data ->plan;

   if($plan == "high")
     $links = array("link1", "link2");
   if($plan == "mystery")
     $links = array("link1", "link2");
   if($plan == "expert")
     $links = array("link1", "link2");
   
   //$conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
   $conn = new mysqli('localhost','root','','test');

   if ($conn->connect_error) {
     die("Connection Failed: " . $conn->connect_error);
     $res->success = "fail";
     $res->message = $conn->connect_error;
     echo json_encode($res);
   }else{

    if(!$code){  
      $res->success = "fail";
      $res->message = "Invalid coupon";
      echo json_encode($res);
    }
      
    $discount = ($code == "PADHHIGH500") ? 1 : 0;
    $link = $links[$discount];
    /*insert data*/
    $insert_student = "INSERT INTO data (`name`,`email`, `contact`, `code`, `plan`) VALUES ('$name', '$email', $contact, '$code', '$plan')";
    $inserted = $conn->query($insert_student);

    if($inserted) {
      header("Location:".$link);
      return;
    }

    $res->success = "fail";
    $res->message = "Failed to submit";
    echo json_encode($res);
   }
}
?>