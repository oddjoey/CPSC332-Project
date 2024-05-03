<?php
    // Enables association between client/server
    session_start();
    
    // Database information
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASS = "";
    $DB_NAME = "db";

    // Connect to database
    $conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    // Check for error
    if ($conn->connect_error) {
        exit('Failed to connect to MySQL: ' . $conn->connect_error);
    }

    // Check if data exists
    if (!isset($_POST["username"], $_POST["password"])) {
        exit('Please fill both the username and password fields!');
    }

    $USERNAME = $_POST["username"];
    $PASSWORD = $_POST["password"];

    $result = $conn->query("SELECT id, password FROM users WHERE username = '$USERNAME'");

    if ($result->num_rows > 0) {
        exit("Username already exists, try another.");
    }

    $DATE = date('Y-m-d H:i:s');

    $result = $conn->query("INSERT INTO users (username, password, dateCreated) VALUES ('$USERNAME', '$PASSWORD', '$DATE')");

    echo "Account '$USERNAME' created!";

    mysqli_close($conn);
    //header("location:index.php");
?>
