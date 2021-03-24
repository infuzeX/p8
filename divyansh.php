<!DOCTYPE html>
    <html lang="en">

    
<!-- Mirrored from www.shreethemes.in/landrick/layouts/page-invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 25 Apr 2020 12:22:01 GMT -->
<head>
        <meta charset="utf-8" />
        <title>PadhHigh</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 4 Landing Page Template" />
        <meta name="keywords" content="bootstrap 4, premium, marketing, multipurpose" />
        <meta name="author" content="Shreethemes" />
        <meta name="Version" content="2.1" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Magnific -->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">

    </head>

    <body>
        <!-- Loader -->
        <!--<div id="preloader">-->
        <!--    <div id="status">-->
        <!--        <div class="spinner">-->
        <!--            <div class="double-bounce1"></div>-->
        <!--            <div class="double-bounce2"></div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!-- Loader -->

        
        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="index.html">Padhhigh<span class="text-primary">.</span></a>
                </div>                 
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
        
                <div id="navigation">
                    <!-- Navigation Menu-->   
                    <ul class="navigation-menu">
                        <li><a href="index.html">Home</a></li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <!-- Invoice Start -->
        <section class="bg-invoice bg-light">
            <div class="container">
                <div class="row mt-5 pt-4 pt-sm-0 justify-content-center">
                    <div class="col-lg-12">
                        <div class="card shadow rounded border-0">
                            <div class="card-body">
                                <div class="invoice-table pb-4">
                                    <div class="table-responsive bg-white shadow rounded">
                                        <table class="table mb-0 table-center invoice-tb" id="tblData">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th scope="col" class="text-left">Name</th>
                                                    <th scope="col" class="text-left">Email</th>
                                                    <th scope="col" class="text-left">Contact No</th>
                                                    <th scope="col" class="text-left">City</th>
                                                    <th scope="col" class="text-left">Education</th>
                                                    <th scope="col" class="text-left">College</th>
                                                    <th scope="col" class="text-left">Code Used</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $conn = new mysqli('localhost','padhhigh_padhhigh','padhhigh','padhhigh_padhhigh');
                                                    if ($conn->connect_error) {
                                                        die("Connection Failed: " . $conn->connect_error);
                                                    }else{
                                                        $sql = "SELECT id, name, email, contactno, city, education, college, code_used FROM payment";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            // output data of each row
                                                            while($row = $result->fetch_assoc()) {
                                                                ?>
                                                                <tr>
                                                                    <td class="text-left"><?php echo $row["name"]; ?></td>
                                                                    <td><?php echo $row["email"]; ?></td>
                                                                    <td><?php echo $row["contactno"]; ?></td>
                                                                    <td><?php echo $row["city"]; ?></td>
                                                                    <td><?php echo $row["education"]; ?></td>
                                                                    <td><?php echo $row["college"]; ?></td>
                                                                    <td><?php echo $row["code_used"]; ?></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                        } else {
                                                            echo "0 results";
                                                        }
                                                        $conn->close();
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <button onclick="exportTableToExcel('tblData')">Export Table Data To Excel File</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- Invoice End -->

        <!-- Footer Start -->
        <footer class="footer footer-bar">
            <div class="container text-center">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-left">
                            <p class="mb-0">© 2019-20 PadhHigh. Design with <i class="mdi mdi-heart text-danger"></i> by <a href="http://www.padhhigh.com/" target="_blank" class="text-success">PadhHigh</a>.</p>
                        </div>
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->
        
        <!-- Back to top -->
        <a href="#" class="back-to-top rounded text-center" id="back-to-top"> 
            <i class="mdi mdi-chevron-up d-block"> </i> 
        </a>
        <!-- Back to top -->
        <script>
            function exportTableToExcel(tableID, filename = 'data'){
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
                
                // Specify file name
                filename = filename?filename+'.xls':'excel_data.xls';
                
                // Create download link element
                downloadLink = document.createElement("a");
                
                document.body.appendChild(downloadLink);
                
                if(navigator.msSaveOrOpenBlob){
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob( blob, filename);
                }else{
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
                
                    // Setting the file name
                    downloadLink.download = filename;
                    
                    //triggering the function
                    downloadLink.click();
                }
            }
        </script>

        <!-- javascript -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific.init.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script src="js/unicons-monochrome.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>

</html>