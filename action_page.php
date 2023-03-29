<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Connect to MySQL database
    $servername = "localhost";
    $username = "NextGenToken";
    $password = "Vijay@123";
    $dbname = "userdetailtable";

    $conn = new mysqli($servername, $username, $password, $dbname);

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
        echo "User signed in successfully";
        header("location: index-2.html");
    } else {
        echo "Invalid username or password";
    }
    

    // Close MySQL connection
    $conn->close();
}

?>
