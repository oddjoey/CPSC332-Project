<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Spotter!</title>
    <link rel="stylesheet" href="styles.css">
    <?php session_start(); ?>
</head>
<body>
    <div class="menu">
            <a class="menu-item" href="home.php">Home</a>
            <div class="main">Cars</div>
            <a class="menu-item" href="post.php">Post</a>
<?php
            if (!isset($_SESSION["loggedin"])) { ?>
                <a class="menu-item" href="login.html">Log In</a>
                <a class="menu-item" href="signup.html">Sign Up</a>
<?php       }
            else { ?>
                <a class="menu-item" href="logoutUser.php">Logout</a>
<?php
            } ?>
        </div>
        <h1 class="title">CAR SPOTTER !</h1>
        <div class="search">
            <h2>Search by Year, Make, or Model</h2>
            <input type="text" placeholder="search">
            <button class="search-button">&rarr;</button>
        </div>
    <div id="posts">

    </div> 
    <?php
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

        $results = $conn->query("SELECT * FROM posts");

        if ($results->num_rows > 0) {
            while($row = $results->fetch_assoc()) {
               // $OUTPUT = "Post ID: " . $row["id"] . ", Upload Date: " . $row["uploadDate"] . ", User ID: " . $row["uploadedByUserID"] . ", Year: " . $row["carYear"] . ", Make: " . $row["carMake"] . ", Model: " . $row["carModel"]; 
                $id = $row['id'];
                $date = $row['uploadDate'];
                $uid = $row['uploadedByUserID'];
                $year = $row['carYear'];
                $make = $row['carMake'];
                $model = $row['carModel'];
                
                
?>
            <div class="newPost">
                <h2 class="postName"><?php echo $uid . " spotted a " . $year . " " . $make . " " . $model . "!"; ?></h2>
                <img>
            </div>
<?php   
        }
    }
?>
</body>
</html>
