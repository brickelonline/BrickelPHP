<?php

require 'dbh.inc.php';

$id = $_SESSION['id'];

$sql = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$u_id = $row['id'];
$u_first = $row['first'];
$u_last = $row['last'];
$u_username = $row['username'];
$u_email = $row['email'];
$u_staff = $row['staff'];






?>
