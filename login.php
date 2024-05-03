<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>cars</title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="menu">
            <a class="menu-item" href="home.php">Home</a>
            <a class="menu-item" href="index.php">Cars</a>
<?php       if (!isset($_SESSION["loggedin"])) { 
?>              <div class="main">Log In</div>
                <a class="menu-item" href="signup.php">Sign Up</a>
<?php       }
            else { 
?>              <a class="menu-item" href="post.php">Post</a>
                <a class="menu-item" href="logoutUser.php">Logout</a>
<?php       } 
?>      </div>
        <div class="log-in">
            <form id="log-in" action="/loginUser.php" method="post">
                <h1 class="log-in-element">Log In</h1>
                <h2 class="log-in-element">Username</h2>
                <input class="log-in-element" type="text" id="username" placeholder="Username" name="username" required>
                <h2 class="log-in-element">Password</h2>
                <input class="log-in-element" type="password" placeholder="Password" name="password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
    </body>
</html>