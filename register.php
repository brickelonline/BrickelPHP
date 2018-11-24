<?php

if (isset($_POST['register'])) {

    include_once 'core/includes/dbh.inc.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (empty($first) || empty($last) || empty($username) || empty($password) || empty($email) || empty($_POST['agree'])) {
        $error = "Required fields seem to be empty!";
    } else {
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            $error = "Characters in your name are invalid!";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = "You have entered an invalid email!";
            } else {
                $sql = "SELECT * FROM users WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);

                if ($row > 0) {
                    $error = "Username is already in use!";
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (first, last, username, password, email) VALUES ('$first', '$last', '$username', '$hashedPassword', '$email');";
                    $result = mysqli_query($conn, $sql);

                    $error = "Registration Successful.";
                }
            }
        }
    }
}

?>
<html lang="en">
<?php require 'core/modules/head.php'; ?>
<body>
    <div class="login">
        <div class="container">
            <img class="homepage" src="img/banner.png">
            <div class="header">
                <center>Registration</center>
            </div>
            <div class="content">
                <center>
                    <?php if (!empty($error)) {echo $error;} ?>
                    <form method="post">
                        First Name:<br>
                        <input type="text" name="first"><br>
                        Last Name:<br>
                        <input type="text" name="last"><br>
                        Username:<br>
                        <input type="text" name="username"><br>
                        Password:<br>
                        <input type="password" name="password"><br>
                        Email:<br>
                        <input type="text" name="email"><br>
                        Terms & Conditions:<br>
                        <input type="checkbox" name="agree"><br><br>
                        <button class="index" type="submit" name="register">Register</button>
                        <a href="login.php">Login?</a>
                    </form>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
