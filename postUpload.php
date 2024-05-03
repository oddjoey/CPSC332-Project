<?php
    // Enables association between client/server
    session_start();

    if (!isset($_SESSION["loggedin"])) {
        exit("Need to be logged in to post!");
    }

    $USERID = $_SESSION["id"];
    $USERNAME = $_SESSION["username"];
    
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

    $CARYEAR = 0;
    $CARMAKE = "";
    $CARMODEL = "";
    $PHOTOURL = "";

    if (isset($_POST["year"])) {
        $CARYEAR = $_POST["year"];
    }
    if (isset($_POST["make"])) {
        $CARMAKE = $_POST["make"];
    }
    if (isset($_POST["model"])) {
        $CARMODEL = $_POST["model"];
    }
    if (isset($_POST["img"])) {
        $PHOTOURL = $_POST["img"];
    }

    $DATE = date('Y-m-d H:i');

    $result = $conn->query("INSERT INTO posts (uploadedByUserID, uploadedByUsername, uploadDate, photoURL, carYear, carMake, carModel) 
    VALUES ('$USERID', '$USERNAME', '$DATE', '$PHOTOURL', '$CARYEAR', '$CARMAKE', '$CARMODEL')");

    mysqli_close($conn);
    header("Location:index.php?status=success");
