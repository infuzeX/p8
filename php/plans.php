<?php
$plans = array("high", "expert", "mystery");
parse_str($_SERVER["QUERY_STRING"]);
if(!in_array($plan, $plans)){
   header("Location:https://padhhigh.com/higher/payment.html");
}
?>
<html>

<head>
  <script>
    const data = {};
    data["plan"] = '<?php echo $plan ?>';
  </script>
</head>

<body >
    <form class="enroll">
        <input name="name" type="text" placeholder="Enter your name">
        <input name="email" type="email" placeholder="Enter your email">
        <input name="contact" type="number" placeholder="Enter your phone number">
        <input name="coupon" placeholder="Enter your coupon code">
        <button>Enroll</button>
    </form>
</body>
<script >
    const form = document.querySelector(".enroll");

    form.addEventListener("submit", async e => {
        e.preventDefault();
        try {
          [...e.target.elements].forEach(({ name, value }) => name && (data[name] = value))
            
          const res = await fetch('/higher/php/enrollPlanDb.php', {
            method: "POST",
            headers: {
              "content-type": "application/json"
            },
            body: JSON.stringify(data)
          });
           
          if(res.redirected) {
            window.location.href = res.url;
          }else{
            const response = await res.json();
            alert(response.message);
          }
        }
        catch (err) {
            alert(err.message);
        }
    })
</script>






<style>

</style>

</html>