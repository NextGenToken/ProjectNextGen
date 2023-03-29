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
    // Attempt to insert user's information into database
    $sql = "INSERT INTO user1 (username, password) VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New user created successfully";
        header("location: index-2.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close MySQL connection
    $conn->close();
}

?>