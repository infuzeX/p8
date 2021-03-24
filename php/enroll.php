<?php
header('Content-Type: application/json');

require './response.php';
require './cookie.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data)){

   $res = new Response;
   $cookie_data = new Cookie;

   //store object data in variable
   $name = $data ->name;
   $email = $data ->email;
   $contact = $data ->contact;
   $code = $data ->coupon;
   
   $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');

   if ($conn->connect_error) {
     die("Connection Failed: " . $conn->connect_error);
   }else{
     
     if($code){
      $get_coupon = "SELECT link, discount, amount FROM coupons where code = '$code' LIMIT 1";
      $result = $conn->query($get_coupon);
      //check coupon is valid or not
      if($result->num_rows > 0) {
       while($row = $result->fetch_assoc()){
        $cookie_data->link = $row["link"];
        $cookie_data->code = $code;
        $cookie_data->discount = $row["discount"];
        $cookie_data->amount = $row["amount"];
       }  
      }else{
        $res->success = "fail";
        $res->message = "Invalid coupon";
        echo json_encode($res);
        return;
      }
     }else{
       $cookie_data->link = "https://rzp.io/l/E2xIYdo";
       $cookie_data->code = null;
       $cookie_data->discount = 0;
       $cookie_data->amount = 4999;
     }
      
     /*cookie data*/
     $cookie_data->name = $name;
     $cookie_data->email = $email;
     $cookie_data->contact = $contact;

     /*insert data*/
     $insert_student = "INSERT INTO enroll (`name`,`email`, `contact`, `code`) VALUES ('$name','$email', $contact, '$code')";
     $inserted = $conn->query($insert_student);

     $res->success = $inserted ? "success": "fail";
     $res->message = $inserted ? "successfully submitted":"Failed to submit";

     if($inserted) {
        $stringify = json_encode($cookie_data);
        setcookie("order", $stringify, time()+3600,  "/", "", 0);
     }
     echo json_encode($res);  
   }
}
?>