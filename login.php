<?php require_once '../config/config.php';?>
<?php
if (isset($_SESSION['user-login'])) {
    header("location: profile.php");
}
?>
    <!doctype html>
    <html lang=" ">
    <head>
        <meta charset="UTF-8">
        <title>User login</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>
    <div id="main">
        <div id="register">
            <form action="login.php" method="post">
                <input type="text" name="email" placeholder="email"><br>
                <input type="password" name="password" placeholder="password"><br>
                <input type="submit" name="login" value="log in">
            </form>
        </div>
    </div>
    </body>
    </html>
<?php
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $loginCheck = mysqli_query($db,"SELECT * FROM users WHERE email='$email' AND password='$password'");
    if(mysqli_num_rows($loginCheck)>0){
        $_SESSION['user-login'] = $email;
        echo 'You have successfully entered'."<a href='profile.php'>Profile view</a>";
    }else{
        echo 'Your password or email is incorresct, or you have not registered';
    }
}
