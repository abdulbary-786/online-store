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
        <title>User registration</title>
        <link rel="stylesheet" href="../styles/styles.css">
    </head>
    <body>
    <div id="main">
        <div id="register">
            <form action="register.php" method="post">
                <input type="text" name="display-name" placeholder="youe name ..."><br>
                <input type="text" name="email" placeholder="email"><br>
                <input type="password" name="password" placeholder="password"><br>
                <input type="password" name="password-conf" placeholder="Repeat password"><br>
                <input type="submit" name="register" value="Register">
            </form>
        </div>
    </div>
    </body>
    </html>
<?php
if (isset($_POST['register'])){
    $name = $_POST['display-name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $passwordConf = md5($_POST['password-conf']);
    if ($password != $passwordConf) {
        echo 'The password and its repetition are not the same';
    }else{
        mysqli_query($db,"INSERT INTO users (display_name,email,password) VALUES ('$name','$email','$password')");
        echo 'Your registration was successful';
    }
}
?>