<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to MySQL database
    $servername = "localhost";
    $dbusername = "NextGenToken";
    $dbpassword = "Vijay@123";
    $dbname = "userdetailtable";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['psw']);

    // Check if user exists in database
    $sql = "SELECT * FROM user1 WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // User exists in database, redirect to a page
    session_start(); // start the session
    $_SESSION['username'] = $username; // store the username in a session variable
    header('Location: profile.php'); // redirect to the profile page
    exit();
    } else {
        // User doesn't exist or password is incorrect, display error message
        $error = "Incorrect username or password, please try again";
    }

    // Close MySQL connection
    $conn->close();
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Log In</title>
		<link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/NXGT_Logo_transparent_blue_cropped.png">
        <link rel="stylesheet" href="assets/css/signupstyle.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/mCustomScrollbar.min.css">
        <link rel="stylesheet" href="assets/css/odometer.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/default.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>
        <header class="header1" id="header">
            <div id="header-fixed-height"></div>
            <div id="sticky-header" class="menu-area">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                            <div class="menu-wrap">
                                <nav class="menu-nav">
                                    <div class="logo">
                                        <a href="index.html"><img src="assets/img/logo/NXGT_Logo_transparent_blue (1).png" alt=""></a>
                                    </div>
                                    <div class="navbar-wrap main-menu d-none d-lg-flex">
                                        <ul class="navigation">
                                            <li class="active menu-item-has-children"><a href="index.html#header" class="section-link">Home</a>
                                            </li>
                                            <li><a href="index.html#about" class="section-link">About us</a></li>
                                            <li><a href="index.html#sales" class="section-link">Sales</a></li>
                                            <li><a href="index.html#roadmap" class="section-link">Roadmap</a></li>                                            
                                            <li><a href="index.html#contact" class="section-link">Contact us</a></li>
                                            <li><a href="feedback.html" class="section-link">Feedback</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-action d-none d-md-block">
                                        <ul>
                                            <li class="header-lang"><span class="selected-lang">Sign In</span>
                                                <ul class="lang-list">
                                                    <li><a href="signin.html">Sign In</a></li>
                                                    <li><a href="signup.html">Sign Up</a></li>
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
                                    <div class="nav-logo"><a href="index.html"><img src="assets/img/logo/logo.png" alt="" title=""></a>
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
        <div class="back1">
<!-- HTML login form goes here -->

            <form method="post" action="" style=" align-items: center; ">
                <div class="container">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <div style="color: red;"><?php echo $error; ?></div>
                    <label> 
                        <a href="signup.html" class="signinred" rel="noopener noreferrer">Don't have an account?</a>
                    </label>
                </div>
            </form>
        </div>
    </body>
</html>