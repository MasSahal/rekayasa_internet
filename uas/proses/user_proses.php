<?php
include('../model/user_model.php');
$db = new user;

if (isset($_GET['mod'])) {

    $mod = $_GET['mod'];
    if ($mod == "insert") {
        $nama = $_POST['fullname'];

        $profile = $_FILES['profile']['name'];
        $tmp = $_FILES['profile']['tmp_name'];

        //get extention
        $ext = pathinfo($profile, PATHINFO_EXTENSION);

        //get size
        $size = $_FILES['profile']['size'];

        $allowed_ext = array("jpg", "jpeg", "png", "gif");

        if (in_array($ext, $allowed_ext)) {
            if ($size < 5000000) {
                $nama_profile = rand(1000, 9999) . strtolower(str_replace([' ', "-", "_"], '-', $nama)) . time() . '.' . $ext;

                //make path
                $path = "../assets/images/profile/" . $nama_profile;

                // move image
                $move = move_uploaded_file($tmp, $path);
                if (!$move) {
                    $nama_profile = "user.jpg";
                }

                $add = $db->insert_user(
                    $nama,
                    $_POST['username'],
                    $_POST['password'],
                    $nama_profile,
                    $_POST['no_hp'],
                    $_POST['alamat'],
                    $_POST['role'],
                );

                if ($add) {
                    echo json_encode(array('status' => 'success', 'message' => 'Data berhasil ditambahkan'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Data gagal ditambahkan'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Ukuran file terlalu besar'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Format file tidak sesuai - jpg, jpeg, png, gif'));
        }
    } elseif ($mod == "delete") {
        $id = $_POST['id'];
        $old_data = $db->get_user($id);

        if ($old_data['profile'] != "user.jpg") {
            if (file_exists("../assets/images/profile/" . $old_data['profile'])) {
                unlink("../assets/images/profile/" . $old_data['profile']);
            }
        }

        $delete = $db->delete_user($id);
        if ($delete) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Data gagal dihapus'));
        }
    }
}
