<?php

include('../model/login_model.php');
$db = new database();

$aksi = $_GET['aksi'];
if ($aksi == "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // die(var_dump($_POST));
    $login = $db->login_user($username, $password);
} else if ($aksi == "logout") {
    session_start();
    session_unset();
    session_destroy();

    echo "<script> window.location = '../login.php'</script>";
} else {
    echo "<script> alert('Ada yang salah!')</script>";
    echo "<script> window.location = '../login.php'</script>";
}
