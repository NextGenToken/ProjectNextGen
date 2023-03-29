    <?php
// Start the session to get the username of the currently logged-in user
session_start();
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: signin.php");
    exit();
} else {
    $username = $_SESSION['username'];
}

// Establish a connection to the database
$servername = "localhost";
$dbusername = "NextGenToken";
$dbpassword = "Vijay@123";
$dbname = "userdetailtable";
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve user data from the database
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
$mobile = $row['mobile'];
$email = $row['email'];
// Display the user data on the profile page
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>NextGen</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
                        <div id="username-container">"
                            <div class="image-container" style="padding-bottom: 20px">
                                <img style='width:70px; height:70px; background:transparent;' src="assets/img/profile-user.png">
                            </div>
                            <p style='color: white; font-size: 30px;'>Your Name : <?php echo $username; ?></p>
                            <p style='color: white; font-size: 30px;'>Email : <?php echo $email; ?></p>
                            <p style='color: white; font-size: 30px;'>Mobile Number : <?php echo $mobile; ?></p>
                        </div>
                        <div style="text-align:center">
                            <a href="update_profile.php"><button type="button" class="btn btn-primary">UPDATE</button></a>
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