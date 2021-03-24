<?php
    $Mname = $_POST['name'];
    $Memail = $_POST['email'];
    $Subject = $_POST['subject'];
    $con_det = $_POST['contactdetails'];
    $comments = $_POST['comments'];

    $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
    if ($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contactus(name, email, subject, contact_details, comment)
            values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$Mname, $Memail, $Subject, $con_det, $comments);
        $stmt->execute();
        ?>
        <script>
            alert("Registered Successfully");
            window.location.replace('../index.html')
        </script>
        <?php
        $stmt->close();
        $conn->close();
    }
?>