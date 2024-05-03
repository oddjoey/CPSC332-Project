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
?>              <a class="menu-item" href="login.php">Log In</a>
                <div class="main">Sign Up</div>
<?php       }
            else { 
?>              <a class="menu-item" href="post.php">Post</a>
                <a class="menu-item" href="logoutUser.php">Logout</a>
<?php       } 
?>      </div>
        <div class="log-in">
            <form id="log-in" action="/createUser.php" method="post">
                <h1 class="log-in-element">Sign Up</h1>
                <h2 class="log-in-element">Username</h2>
                <input class="log-in-element" type="text" id="username" placeholder="Username" name="username" required>
                <h2 class="log-in-element">Password</h2>
                <input class="log-in-element" type="password" id="password" placeholder="Password" name="password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
    </body>
</html>