    <?php
    $servername = "localhost";
    $dbusername = "NextGenToken";
    $dbpassword = "Vijay@123";
    $dbname = "userdetailtable";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    session_start();
    // Get current user's username
   $username = $_SESSION['username'];

    // Get mobile number and email from form submission
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Prepare and execute SQL statement to update user's mobile number and email
    $sql = "UPDATE user1 SET mobile='$mobile', email='$email' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        // Success message
        $update = "Record updated successfully";
    } else {
        // Error message
        $update = "Error updating record: " . $conn->error;
    }

    // Close database connection
    $conn->close();
?>

<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>NextGen</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .maillabel
            {
                font-family:'Outfit', sans-serif;font-size:50px;
                font-size:20px;
                position:absolute;
                left:620px;
                color:white;
            }
            .mailfield
        {
                position:absolute;
                font-size:20px;
                top:330px;
                left:710px;
                border: 2px solid #2af1f8;
                border-radius:4%;
                background:black;
                color:white;
            }
            .namelabel
            {
                position:absolute;
                left:560px;
                font-family:'Outfit', sans-serif;
                color:white;
                font-size:20px;
            }
            .namefield
            {
                position:absolute;
                left:710px;
                border: 2px solid #2af1f8;
                border-radius:4%;
                background:black;
                color:white;
                font-size:20px;
            }
            .subbut
            {
                position:absolute;
                left:710px;
                border: 2px solid #2af1f8;
                border-radius:4%;
                background:black;
                color:white;
            }
        </style>
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/NXGT_Logo_transparent_blue_cropped.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/mCustomScrollbar.min.css">
        <link rel="stylesheet" href="assets/css/odometer.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <style>
        #username-container
        {
            text-align: center;
            font-family: 'Outfit', sans-serif;
        }
        </style>

    </head>
    <body class="home-01">

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
        <!-- Preloader -->

        <!-- header-area -->
        <header id="header">
            <div id="header-fixed-height"></div>
            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo">
                                        <a href="index-2.html"><img src="assets/img/logo/NXGT_Logo_transparent_blue (1).png" alt=""></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item-has-children"><a href="#header" class="section-link">Home</a>
                                            </li>
                                            <li><a href="#about" class="section-link">About us</a></li>
                                            <li><a href="#sales" class="section-link">Sales</a></li>
                                            <li><a href="#roadmap" class="section-link">Roadmap</a></li>
                                            <li><a href="#contact" class="section-link">Contact us</a></li>
                                            <li>
                                            <a class="section-link"><button onclick="connectToMetaMask()">Connect to MetaMask</button></a>
                                            </li>
                                            <script>
                                                async function connectToMetaMask() {
                                                    if (window.ethereum) {
                                                        try {
                                                            // Request account access
                                                            const accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
                                                            console.log('Connected to MetaMask:', accounts[0]);
                                                            // Do something with the connected account
                                                            } catch (error)
                                                            {
                                                            console.error(error);
                                                            }
                                                            } else {
                                                            console.error('MetaMask not found');
                                                            }
                                                            }
                                            </script>
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul>
                                            <li class="header-lang"><span class="selected-lang"><img class="profimg" src="assets/img/profile-user.png"></span>
                                                <ul class="lang-list">
                                                    <li><a href="profile.php">My Account</a></li>
                                                    <li><a href="index.html">Log Out</a></li>
                                                </ul>
                                            </li>
                                            <li class="header-btn"><a href="https://pancakeswap.finance/swap?outputCurrency=0xfd953785527e0834E81371264E29d0489D36722a&chainId=56" class="btn">Buy Now</a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Mobile Menu  -->
                            <div class="mobile-menu">
                                <nav class="menu-box">
                                    <div class="close-btn"><i class="fas fa-times"></i></div>
                                    <div class="nav-logo"><a href="index.html"><img src="assets/img/logo/NXGT_Logo_transparent_blue (1).png" alt="" title=""></a>
                                    </div>
                                    <div class="menu-outer">
                                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                    </div>
                                    <div class="social-links">
                                        <ul class="clearfix">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <div class="menu-backdrop"></div>
                            <!-- End Mobile Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header-area-end -->


        <!-- main-area -->
        <main class="fix">

            <!-- banner-area -->
            <section class="banner-area banner-bg">
                <div class="banner-shape-wrap">
                    <img src="assets/img/banner/banner_shape02.png" alt="" class="img-two">
                    <img src="assets/img/banner/banner_shape03.png" alt="" class="img-three">
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div id="username-container">
                            <div class="image-container" style="padding-bottom: 20px">
                                <img style='width:70px; height:70px; background:transparent;' src="assets/img/profile-user.png">
                            </div>
                            <p style='color: white; font-size: 30px;'>Your Name : <?php echo $username; ?></p>
                            <form action="update_profile.php" method="post">
                              <label class="namelabel" for="mobile">Mobile Number :</label>
                              <input class="namefield" type="text" id="mobile" name="mobile" placeholder="  Enter your mobile number">
                            <br><br>
                              <label class="maillabel" for="email">Email ID :</label>
                              <input class="mailfield" type="email" id="email" name="email" placeholder="   Enter your email address">
                            <br>
                            </form>
                            <div style="color: #0dcaf0 ;"><?php echo $update; ?></div>
                            <div style="text-align:center; padding-top: 30px;" >
                                <a href="profile.php"><button type="button" class="btn btn-primary">SAVE</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.odometer.min.js"></script>
        <script src="assets/js/jquery.countdown.min.js"></script>
        <script src="assets/js/jquery.knob.min.js"></script>
        <script src="assets/js/jquery-countdowngampang.min.js"></script>
        <script src="assets/js/jquery.ba-throttle-debounce.min.js"></script>
        <script src="assets/js/jquery.mCustomScrollbar.min.js"></script>
        <script src="assets/js/jarallax.min.js"></script>
        <script src="assets/js/jquery.appear.js"></script>
        <script src="assets/js/jquery.easing.js"></script>
        <script src="assets/js/slick.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/main.js"></script>
        </main>
    </body>
</html> 