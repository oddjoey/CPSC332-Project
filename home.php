<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>cars</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="styles.css">
        <?php session_start(); ?>
    </head>
    <body>
        <div class="menu">
            <div class="main">Home</div>
            <a class="menu-item" href="index.php">Cars</a>
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
        <h2 class="head">Upoad Pictures</h2>
        <p>this website allows you to upload pictures of nice cars that you see on the street.</p>
        <h2 class="head">Add Specifications</h2>
        <p>
            When adding a car, you can add all of its specifications, like the year, make, model, 
            and others. 
        </p>
        <h2 class="head">Add to Your Favorites</h2>
        <p>
            See a car that you really like? Add it to your favorites so that you can revisit it
            whenever you feel like it. 
        </p>
    </body>
</html>
