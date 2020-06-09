<?php require_once '../config/config.php';?>
<?php
if (!isset($_SESSION['user-login'])) {
    header("location: login.php");
}
$email = $_SESSION['user-login'];
$getUsername = mysqli_query($db,"SELECT * FROM users WHERE email='$email'");
$username = mysqli_fetch_array($getUsername);
?>
    <!doctype html>
    <html lang=" ">
    <head>
        <meta charset="UTF-8">
        <title>User profile</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>
    <div id="main">
        <h1>User profile</h1>
        <hr>
        <div class="nav">
            <ul>
                <li><a href="#">Your profile</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="../config/do-logout.php">Exit</a></li>
            </ul>
            <hr>
            <div class="admin-main">
                <ul>
                    <li>Your name: <?php echo $username['display_name'] ?></li>
                    <br>
                    </li>Youe email: <?php echo $username['email'] ?></ul>
                </ul>
            </div>
        </div>
    </div>
    </body>
    </html>
