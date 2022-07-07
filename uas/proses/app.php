<?php include('../model/database.php');
$db = new database();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $db->login($username, $password);
    var_dump($login);
    if ($login) {

        //lihat akses/role login
        if ($login['role'] == 1) {
            echo "<script> alert('Anda Berhasil Login! - Halo " . $login['fullname'] . "')</script>";
            echo "<script> window.location = '../admin'</script>";
        } else if ($login['role'] == 2) {
            echo "<script> alert('Anda Berhasil Login! - Halo " . $login['fullname'] . "')</script>";
            echo "<script> window.location = '../user'</script>";
        }
    }
}
