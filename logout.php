<?php

session_start();
session_unset();
session_destroy();
setcookie("username", '', time() - 2592001);
setcookie("password", '', time() - 2592001);

header("Location: index.php");
exit();


 ?>
