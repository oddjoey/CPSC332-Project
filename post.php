<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <?php
        session_start();

        if (!isset($_SESSION["loggedin"])) {
            header("Location:home.html?login=none");
        }
    ?>
</head>
<body>
    <div class="menu">
        <a class="menu-item" href="home.html">Home</a>
        <a class="menu-item" href="index.php">Cars</a>
        <div class="main">Post</div>
        <a class="menu-item" href="login.html">Log In</a>
        <a class="menu-item" href="signup.html">Sign Up</a>
    </div>
    <h1 class="title">CAR SPOTTER !</h1>
    <div class="log-in">
        <h1>Post your car</h1>
        <div class="im">+</div>
        <form class="post" action="postUpload.php" id="post" method="post">
            <h2>year</h2>
            <input name="year" type="text" placeholder="year" id="year">
            <h2>make</h2>
            <input name="make" type="text" placeholder="make" id="make">
            <h2>model</h2>
            <input name="model" type="text" placeholder="model" id="model">
            <button id="get" for="post" type="submit">Post</button>
        </form>
    </div>
    <div id="posts" class="posts"></div>
</body>
</html>