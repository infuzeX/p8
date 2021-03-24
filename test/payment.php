<?php
    if(isset($_GET['code'])){
        if($_GET['code'] == null){
            $amount = 3500;
        }else {
            $code = $_GET['code'];
            $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
            if ($conn->connect_error) {
                die("Connection Failed: " . $conn->connect_error);
            }else{
                $sql = "SELECT code,discount,actual_amount FROM coupon where code = '$code' LIMIT 1";
                $result = $conn->query($sql);
                
                if ($result->num_rows == 0) {
                    ?>
                    <script>
                        alert("Incorrect Coupon Code");
                        window.location.replace('payment.php');
                    </script>
                    <?php
                }else{
                    while($row = $result->fetch_assoc()) {
                        $discount = $row['discount'];
                        $actual_amount = $row['actual_amount'];
                    }
                    $amount = $actual_amount - $discount;
                }
                
                $conn->close();
            }
        }
    }else{
        $amount = 3500;
    }
?>


<!doctype html>
<html lang="en">
   
<!-- Mirrored from iqonic.design/themes/bizbag-html/contact-us-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jun 2020 18:52:26 GMT -->
<head>


   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165126546-1"></script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());
   
     gtag('config', 'UA-165126546-1');
   </script>

      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PADH HIGH</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="images/favicon.ico" />
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- REVOLUTION STYLE SHEETS -->
      <link rel="stylesheet" type="text/css" href="revsilder/css/settings.css">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="css/typography.css">
      <!-- Style CSS -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="css/responsive.css">
<style type="text/css">
   
   .hov a:hover{background-color:#ffb100;}
   .hov {background-color:  #24262b;}
</style>


   </head>
   <body>
      <!-- loading -->
      <div id="loading">
         <div id="loading-center">
           
            <h1><span style="color: #ffb100">PADH</span>HIGH</h1>
         </div>
      </div>
      <!-- loading End -->
      <!-- Header Start -->
      <header id="main-header" class="header-one">
   <!-- menu start -->
   <nav id="menu-1" class="mega-menu text-white" data-color="">
      <!-- menu list items container -->
      <div class="menu-list-items">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <!-- menu logo -->
                  <ul class="menu-logo">
                     <li>
                        <a href="index.html"><h1 style="font-size: 23px;font-weight: 700;    margin-top: 0px;"><span style="color: white;background-color: #ffb100;padding: 4px;font-weight: 700;">PADH</span> HIGH</h1></a>
                     </li>
                  </ul>
                  <!-- menu links -->
                  
            </div>
         </div>
      </div>
   </div>
</nav>
<!-- menu end -->
</header>
<!-- Header End -->
    
      <!-- Main-Content Start -->
      <div class="main-content">


 <!-- About-us Start -->
         <section class="iq-about overview-block-ptb">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6 text-center">
                     <img src="images/about/03.png" class="img-fluid" alt="#">
                     <div class="iq-objects-style-1">
                        <span class="iq-objects-01" data-bottom="transform:translatey(-50px)" data-top="transform:translatey(-50px);">
                        <img src="images/effect/01.jpg" alt="drive02">
                        </span>
                        <span class="iq-objects-02" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-100px);">
                        <img src="images/effect/02.jpg" alt="drive02">
                        </span>
                        <span class="iq-objects-03" data-bottom="transform:translatex(50px)" data-top="transform:translatex(-100px);">
                        <img src="images/effect/03.jpg" alt="drive02">
                        </span>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="title-box  text-left">
                        <span>Pay Now</span>
                        <h1 class="title">INTURN</h1>
                        <p class="mb-0"></div>
                    
                     
                  </div>
               </div>
            </div>
            <div class="scrolling-text top left default">
               <div data-bottom="transform:translatex(-300px)" data-top="transform:translatex(0);">Challenges</div>
            </div>
         </section>
         <!-- About-us End -->






         <!-- Contact Us Start -->
         <section class="iq-contactus">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                        <div class="card bg-light shadow rounded border-0" >
                            <div class=" p-4 text-center rounded-top" style="background-color:#ffb100">
                                <h4 class="mb-0 card-title title-dark text-light">Total Amount</h4>
                            </div>

                            <div class="d-flex justify-content-center mb-4">
                              <span class="price  font-weight-bold display-4 mb-0" style="color:#ffb100">₹ <?php
                                   if($amount == 3500){
                                      echo $amount;
                                      }else{
                                          echo "<del>3500</del> $amount";
                                      }

                                  ?></span>
                          </div>

                                <ul class="feature list-inline">
                                    <li class="h5 font-weight-normal"><i class="mdi mdi-checkbox-marked-circle text-success mdi-18px h5 mr-2"></i>One time payment</li>
                                    <li class="h5 font-weight-normal"><i class="mdi mdi-checkbox-marked-circle text-success mdi-18px h5 mr-2"></i>Internship + Training</li>
                                    <!-- <li class="h5 font-weight-normal"><i data-feather="check-circle" class="fea icon-ex-md text-primary mr-2"></i>Control payout timing</li> -->
                                    <!-- <li class="h5 font-weight-normal"><i data-feather="check-circle" class="fea icon-ex-md text-primary mr-2"></i>24×7 support</li> -->
                                </ul>
                                <form method="post" action="backend/coupon.php">
                                    <div class="input-group" style="background-color:light-blue;">
                                       <input name="code" type="text" class="form-control">
                                         <span class="input-group-btn">
                                            <button class="btn btn-default" style="background-color:#ffb100; color:white;" type="submit">Apply a Coupon Code</button>
                                       </span>
                                    </div>
                                </form>

                                <!--</button><a href="javascript:void(0)" class="btn btn-primary btn-block mt-4 pt-2">Payment Now</a>-->
                            </div>
                        </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="title-box  text-left">
                        <!-- <span>Get in Touch</span> -->
                        <h2 class="title">Proceed to payment</h2>
                        <!-- <p class="mb-0">It is a long established fact that a reader will be distracted</p> -->
                     </div>
                     <form  class="contact-us" method="POST" action="backend/pay.php" enctype="multipart/form-data">
                        <div class="row">
                           <div class="col-md-6">
                              <label>Your Name<br>
                              <span class="form-control-wrap your-name">
                              <input type="text" name="name" Placeholder="Your Name" class="form-control text" aria-required="true" aria-invalid="false"></span>
                              </label>
                           </div>
                           <div class="col-md-6">
                              <label>Your Email<br>
                              <span class="form-control-wrap your-email">
                              <input type="email" name="email" Placeholder="Email" class="form-control text email" aria-required="true" aria-invalid="false"></span>
                              </label>
                           </div>
                           <div class="col-md-6">
                              <label>Contact Number<br>
                              <span class="form-control-wrap your-number">
                              <input type="number" name="contactno" id="contactdetails" placeholder="Phone number" class="form-control text" aria-invalid="false"></span>
                              </label>
                           </div><div class="col-md-6">
                              <label>City<br>
                              <span class="form-control-wrap your-number">
                              <input type="text" name="city" id="contactdetails" placeholder="City Name" class="form-control text" aria-invalid="false"></span>
                              </label>
                           </div>
                           <div class="col-xl-12">
                              <label>Education<br>
                              <span class="form-control-wrap your-education">
                              <input type="text" name="education" Placeholder="Education" class="form-control text" aria-invalid="false"></span>
                              </label>
                           </div>
                           <div class="col-xl-12">
                              <label>College<br>
                              <span class="form-control-wrap your-subject">
                              <input type="text" name="college" Placeholder="College Name" class="form-control text" aria-invalid="false"></span>
                              </label>
                           </div>
                           <div style = "display: flex; height: 5px">
                              <input style="visibility: hidden;" type="text" name="link" value="<?php echo $amount ?>" />
                              <input style="visibility: hidden;" type="text" name="code_value" value="<?php echo $code ?>" />
                           </div>
                           <div class="col-xl-12">
                              <button id="submit" name="send" type="submit" value="Pay" class="button btn-yellow" >Pay</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </section>
         <!-- Contact Us End -->
        
      </div>
      <!-- Main-Content End -->
    
      <!-- Footer Start -->
      <footer>
        
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="footer-logo">
                     <a href="#">
                        <a ><h1 style="font-size: 23px;font-weight: 700;    margin-top: 0px;"><span style="color: white;background-color: #ffb100;padding: 4px;font-weight: 700;">PADH</span> HIGH</h1></a>
                     </a>
                  </div>
                  <div class="widget">
                     <div class="textwidget">
                        <p>Start learning with PADH HIGH that can help in making your future high.</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                  
               </div>
               <div class="col-lg-3 col-md-6 col-sm-6">
                 <div class="widget">
                     <h4 class="footer-title">Useful Link</h4>
                     <ul class="menu">
                        <li><a href="index.html" aria-current="page">HOME</a></li>
                        <li><a href="digital harsh.html">INTURN</a></li>
                        <li><a href="#iq-aboutus">ABOUT</a></li>
                        <li><a href="#faq-section">FAQ</a></li>
                        <li><a href="#our-clients">REVIEWS</a></li>
                         <li><a href="#menifesto-section">MANIFESTO</a></li>
                          <li><a href="contact-us-2.html">ENROLL NOW</a></li>
                     </ul>
                  </div>
               </div>
          
            </div>
            <div class="copyright-footer pb-3 pt-3">
               <div class="row">
                  <div class="col-lg-6 col-md-6 mb-2 mb-lg-0">
                     <span class="copyright">Copyright 2020 PADH HIGH All Rights Reserved.</span>
                  </div>
                  <div class="col-lg-6 col-md-6">
                     <div class="social-icone">
                        <ul>
                           <li class="d-inline"><a href="https://www.facebook.com/padhhigh"><i class="fab fa-facebook-f" style="    font-size: 30px;"></i></a> </li>
                           <li class="d-inline"><a href="https://www.linkedin.com/company/padhhigh"><i class="fab fa-linkedin" style="    font-size: 30px;"></i></a></li>
                           <li class="d-inline"><a href="https://www.google.com/url?sa=t&source=web&rct=j&url=https://www.quora.com/How-is-PADHHIGH-different-from-other-digital-marketing-courses&ved=2ahUKEwjn1rjphq_qAhXFZSsKHa-SAZwQFjAAegQIAhAB&usg=AOvVaw3wgSeWbgQsE5_DLp7wff9Z"><i class="fab fa-google-plus-g" style="    font-size: 30px;"></i></a></li>
                           <li class="d-inline"><a href="https://instagram.com/padhhigh?igshid=1u6axntajdnsu"><i class="fab fa-instagram" style="    font-size: 30px;"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Footer End -->
      <!-- back-to-top -->
      <div id="back-to-top">
         <a class="top" id="top" href="#top"> <i class="ion-ios-arrow-up"></i> </a>
      </div>
      <!-- back-to-top End -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-1.11.1.min.js" ></script>
<!-- popper  -->
<script src="js/popper.min.js"></script>
<!--  bootstrap -->
<script src="js/bootstrap.min.js" ></script>
<!-- Appear JavaScript -->
<script src="js/appear.js"></script>
<!-- Mega menu JavaScript -->
<script src="js/mega_menu.min.js"></script>
<!-- Count Down JavaScript -->
<script src="js/countdown.min.js"></script>
<!-- Owl Carousel JavaScript -->
<script src="js/owl.carousel.min.js"></script>
<!-- Magnific Popup JavaScript -->
<script src="js/jquery.magnific-popup.min.js"></script>
<!--  Counter -->
<script src="js/jquery.countTo.js" ></script>
<!-- Skrollr JavaScript -->
<script src="js/skrollr.js"></script>
<!-- Isotope JavaScript -->
<script src="js/isotope.pkgd.min.js"></script>
<!-- Retina JavaScript -->
<script src="js/retina.min.js"></script>
<!--  Custom -->
<script src="js/custom.js" ></script>









   </body>

<!-- Mirrored from iqonic.design/themes/bizbag-html/contact-us-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jun 2020 18:52:27 GMT -->
</html>