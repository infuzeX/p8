<?php
  if(isset($_COOKIE["order"])) {
    $data = json_decode($_COOKIE["order"]);
  }else{
   header("Location:https://padhhigh.com/higher/index.html");
  }
?>
<!doctype html>
<html lang="en">
   
<head>

</head>

<body>
  
<ul>  
   <li>Name: <?php echo $data->name ?><li>
   <li>Email: <?php echo $data->email ?><li>
   <li>Contact: <?php echo $data->contact ?><li>
   <li>Coupon applied: <?php echo $data->code ?><li>
   <li> Amount: <?php echo ($data->amount - $data->discount) ?><li>
<ul>
   
<button>
      <a href="<?php echo $data->link?>">pay</a>  
</button>

</body>


</html>