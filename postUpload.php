<?php
    // Enables association between client/server
    session_start();

    if (!isset($_SESSION["loggedin"])) {
        exit("Need to be logged into a user to post");
    }

    $USERID = $_SESSION["id"];
    
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

    if (isset($_POST["year"])) {
        $CARYEAR = $_POST["year"];
    }
    if (isset($_POST["make"])) {
        $CARMAKE = $_POST["make"];
    }
    if (isset($_POST["model"])) {
        $CARMODEL = $_POST["model"];
    }

    $DATE = date('Y-m-d H:i:s');

    $result = $conn->query("INSERT INTO posts (uploadDate, uploadedByUserID, carYear, carMake, carModel) VALUES ('$DATE', '$USERID', '$CARYEAR', '$CARMAKE', '$CARMODEL')");

    mysqli_close($conn);
    header("Location:index.php?status=success");
?>
