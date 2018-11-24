<?php

session_start();

if (!empty($_COOKIE['password'])) {
    $cookie_user = $_COOKIE['username'];
    $cookie_pass = $_COOKIE['password'];

    include_once 'core/includes/dbh.inc.php';

    $sql = "SELECT * FROM users WHERE username='$cookie_user'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($cookie_pass == $row['password']) {
        $_SESSION['id'] = $row['id'];
        $_SESSION['first'] = $row['first'];
        $_SESSION['last'] = $row['last'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['email'] = $row['email'];

        header("Location: home.php");
        exit();
    }
} else {
	header("Location: login.php");
	exit();
}

?>
