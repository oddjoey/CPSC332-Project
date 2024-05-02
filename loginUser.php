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
        header("Location:login.html?login=failed");
        exit('Please fill both the username and password fields!');
    }

    $USERNAME = $_POST["username"];
    $PASSWORD = $_POST["password"];

    $result = $conn->query("SELECT id, password FROM users WHERE username = '$USERNAME'");

    if ($result->num_rows < 0) {
        header("Location:login.html?login=failed");
        exit("Username or password does not exist.");
    }
    
    $LOGGED_IN = false;
    while($row = $result->fetch_assoc()) {
        if ($row["password"] == $PASSWORD) {
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["username"] = $USERNAME;
            $_SESSION["id"] = $row["id"];
            
            $LOGGED_IN = true;
            echo "Sucessfully logged into '$USERNAME'!";
        }
    }

    if (!$LOGGED_IN) {
        header("Location:login.html?login=failed");
        exit("Username or password does not exist.");
    }

    mysqli_close($conn);
    header("Location:home.php?login=success");
