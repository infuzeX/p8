<?php
    $code = $_POST['code'];
    $discount = $_POST['discount'];
    $actual_amt = $_POST['actual_amt'];

    $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into coupon(code, discount, actual_amount)
            values(?, ?, ?)");
        $stmt->bind_param("sii",$code, $discount, $actual_amt);
        $stmt->execute();
        ?>
        <script>
            alert("Coupon Added Successfully")
            window.location.replace('../add_coupon.html')
        </script>
        <?php
        $stmt->close();
        $conn->close();
    }
?>