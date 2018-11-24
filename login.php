<?php

session_start();

if (isset($_POST['login'])) {

    include_once 'core/includes/dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $remember = $_POST['remember'];

    if (empty($username) || empty($password)) {
        $error = "Required fields are empty!";
    } else {
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        if ($row < 1) {
            $error = "User doesn't exist!";
        } else {
            if ($row = mysqli_fetch_assoc($result)) {
                $match = password_verify($password, $row['password']);
                if ($match == false) {
                    $error = "Password doesn't match out records!";
                } elseif ($match == true) {
                    $_SESSION['id'] = $row['id'];

                    if (isset($remember)) {
                        setcookie("username", $_SESSION['username'], time() + 2592000);
                        setcookie("password", $row['password'], time() + 2592000);
                    }

                    header("Location: home.php");
                    exit();
                }
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">
<?php require 'core/modules/head.php'; ?>
<body>
    <div class="login">
        <div class="container">
            <img class="homepage" src="img/banner.png">
            <div class="header">
                <center>Login/Register</center>
            </div>
            <div class="content">
                <center>
                    <form method="post">
                        Username:<br>
                        <input type="text" name="username" value="<?php if(!empty($_COOKIE['username'])) {echo "" . $_COOKIE['username'] . "";} ?>"><br>
                        Password:<br>
                        <input type="password" name="password"><br>
                        <input type="checkbox" name="remember">  Remember me?<br><br>
                        <button class="index" type="submit" name="login">Login</button>
                        <a href="register.php">Register?</a>
                    </form>
                    <br><h4><?php if (!empty($error)) {echo $error;} ?></h4>
                </center>
            </div>
        </div>
    </div>
</body>
</html>
