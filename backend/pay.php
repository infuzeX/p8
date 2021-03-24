<?php
    $Mname = $_POST['name'];
    $Memail = $_POST['email'];
    $contactno = $_POST['contactno'];
    $city = $_POST['city'];
    $education = $_POST['education'];
    $college = $_POST['college'];
    $link = $_POST['link'];
    $code_value = $_POST['code_value'];
    if($link == 3500){
        $linke = 'https://imjo.in/famrT6';
    }else {
        $linke = 'https://imjo.in/HNsxgM';
    }

    $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into payment(name, email, contactno, city, education, college, code_used)
            values(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss",$Mname, $Memail, $contactno, $city, $education, $college, $code_value);
        $stmt->execute();
        
        //External code for creating a payment request
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:3e0929d8b4adb404547c560edf207c2f",
                          "X-Auth-Token:d9cb94508d50f6292518fa4ae32a98f9"));
        $payload = Array(
            'purpose' => 'INTURN',
            'amount' => $link,
            'phone' => $contactno,
            'buyer_name' => $Mname,
            'redirect_url' => '',
            'send_email' => true,
            'webhook' => 'https://padhhigh.com/webhook_receiver.php',
            'send_sms' => true,
            'email' => $Memail,
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        
        // echo $response;
        
        //Payment create request end
        
        
        ?>
        <script>
            window.location.replace('<?php echo $linke ?>')
        </script>
        <?php
        $stmt->close();
        $conn->close();
    }
?>