<?php
include("./model/user_model.php");
$db = new user;

$user = $_POST['username'];

$data_user = $db->login($user);

if ($data_user) {


    if (password_verify($_POST['password'], $data_user['password'])) {

        if ($data_user['role'] == '1') {
            session_start();
            $_SESSION['id_user'] = $data_user['id_user'];
            $_SESSION['username'] = $data_user['username'];
            $_SESSION['profile'] = $data_user['profile'];
            $_SESSION['fullname'] = $data_user['fullname'];
            $_SESSION['role'] = $data_user['role'];
            header("Location: ./admin");
        } elseif ($data_user['role'] == '2') {
            session_start();
            $_SESSION['id_user'] = $data_user['id_user'];
            $_SESSION['username'] = $data_user['username'];
            $_SESSION['profile'] = $data_user['profile'];
            $_SESSION['fullname'] = $data_user['fullname'];
            $_SESSION['role'] = $data_user['role'];
            header("Location: ./user");
        }
    } else {
        $pesan = urlencode("Password salah!");
        header("location: ./index.php?pesan=$pesan");
    }
} else {
    $pesan = urlencode("Akun anda tidak ditemukan!");
    header("location: ./index.php?pesan=$pesan");
}
