<?php
    //
    if(isset($_POST['code'])){
        $code = $_POST['code'];
    }
    
    // $Memail = $_POST['email'];
    // $Subject = $_POST['subject'];
    // $con_det = $_POST['contactdetails'];
    // $comments = $_POST['comments'];
    if(isset($code)){
        $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }else{
            $sql = "SELECT code,discount FROM coupon where code = '$code' LIMIT 1";
            $result = $conn->query($sql);
            
            if ($result->num_rows == 0) {
                ?>
                <script>
                    alert("Incorrect Coupon Code");
                    window.location.replace('../payment.php');
                </script>
                <?php
            }else{
                while($row = $result->fetch_assoc()) {
                    $codee = $row['code'];
                }
                    ?>
                <script>
                    var code = "<?php echo $codee ?>";
                    window.location.replace('../payment.php?code='+code)
                </script>
            <?php
            }
            $conn->close();
        }
    }
?>