<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Spotter!</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="menu">
            <a class="menu-item" href="home.html">Home</a>
            <div class="main">Cars</div>
            <a class="menu-item" href="post.php">Post</a>
            <a class="menu-item" href="login.html">Log In</a>
            <a class="menu-item" href="signup.html">Sign Up</a>
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
                $OUTPUT = "Post ID: " . $row["id"] . ", Upload Date: " . $row["uploadDate"] . ", User ID: " . $row["uploadedByUserID"] . ", Year: " . $row["carYear"] . ", Make: " . $row["carMake"] . ", Model: " . $row["carModel"];  
?>
            <p><?php echo $OUTPUT; ?></p>
<?php   
        }
    }
?>
    <script>
        let posts = document.getElementById('posts');

        let year = "<?php echo $_POST["year"]; ?> ";
        console.log(year);
        let make = "<?php echo $_POST["make"]; ?> ";
        let model = "<?php echo $_POST["model"]; ?> ";
        let engine = "<?php echo $_POST["engine"]; ?> ";
        
         if(true) {
            let newPost = document.createElement('p');
            newPost.textContent = year + make + model + " with a " + engine + " engine.";
            posts.appendChild(newPost);
        }
    </script>
</body>
</html>
