<?php

$data = $_POST;
$mac_provided = $data['mac'];  // Get the MAC from the POST data
unset($data['mac']);  // Remove the MAC key from the data.

$ver = explode('.', phpversion());
$major = (int) $ver[0];
$minor = (int) $ver[1];

if($major >= 5 and $minor >= 4){
     ksort($data, SORT_STRING | SORT_FLAG_CASE);
}
else{
     uksort($data, 'strcasecmp');
}

//Salt Value
$mac_calculated = hash_hmac("sha1", implode("|", $data), "b7f79246fd054e83ab0fb91832ff835d");

if($mac_provided == $mac_calculated){
    echo "MAC is fine";

    if($data['status'] == "Credit"){
       // Payment was successful, mark it as completed in your database  
            $Mname = $data['buyer_name'];
            $Memail = $data['buyer'];
            $contactno = $data['buyer_phone'];
            $status = $data['status'];
            $amount = $data['amount'];
            $payment_id = $data['payment_id'];
            $code_value = 0;

        if($amount < 3500){
            $code_value = 3500 - $amount;
        }
        
        $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }else{
            $stmt = $conn->prepare("insert into payments(name, email, contactno, amount, code_value, payment_status, payment_id)
                values('$Mname', '$Memail','$contactno', '$amount', '$code_value', '$payment_status', '$payment_id')");
            // 
            $stmt->execute();
            $stmt->close();
            $conn->close();
            
            //Mail to Buyer
            // $to      = $Memail;
            // $subject = 'PadhHigh Payment Successfull';
            // $message = 'Hey ' + $name + '! Thank you for purchasing from us :) Your payment was successfull.';
            // $headers = 'From: padhhigh@gmail.com' . "\r\n" .
            //     'Reply-To: padhhigh@gmail.com';

            // mail($to, $subject, $message, $headers);
        }

    }
    else{
       // Payment was unsuccessful, mark it as failed in your database
           $Mname = $data['buyer_name'];
            $Memail = $data['buyer'];
            $contactno = $data['buyer_phone'];
            $status = $data['status'];
            $amount = $data['amount'];
            $payment_id = $data['payment_id'];
            $code_value = 0;
            
       if($amount < 3500){
            $code_value = 3500 - $amount;
        }
        
        $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }else{
             $stmt = $conn->prepare("insert into payments(name, email, contactno, amount, code_value, payment_status, payment_id)
                values('$Mname', '$Memail','$contactno', '$amount', '$code_value', '$payment_status', '$payment_id')");
            // $stmt->bind_param("sssssss",$Mname, $Memail, $contactno, $amount, $code_value, $payment_status, $payment_id);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            //Mail to Buyer
            // $to      = $Memail;
            // $subject = 'Payment Failed!';
            // $message = 'Hey ' + $name + '! The payment for PadhHigh was unsuccessfull! Please try again or contact us.';
            // $headers = 'From: padhhigh@gmail.com' . "\r\n" .
            //     'Reply-To: padhhigh@gmail.com';

            // mail($to, $subject, $message, $headers);
        }
    }
}
else{
    echo "Invalid MAC passed";
}
?>