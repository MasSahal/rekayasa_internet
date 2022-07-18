<?php
require('../vendor/autoload.php');
include('../model/user_model.php');

use Rakit\Validation\Validator;

$db = new user;
$validator = new Validator;

if (isset($_GET['mod'])) {

    $mod = $_GET['mod'];
    if ($mod == "insert") {
        $nama = htmlspecialchars($_POST['fullname']);

        //cek nama apakah sama
        // $db->query("SELECT * FROM data_user WHERE fullname = '$nama'", true);
        // if (count($db->data) > 0) {
        //     echo json_encode(array('status' => 'error', 'title' => 'Error!', 'message' => 'Username sudah digunakan!'));
        // }

        $profile = $_FILES['profile']['name'];
        $tmp = $_FILES['profile']['tmp_name'];

        //get extention
        $ext = pathinfo($profile, PATHINFO_EXTENSION);

        //get size
        $size = $_FILES['profile']['size'];

        $allowed_ext = array("jpg", "jpeg", "png", "gif");

        if (in_array($ext, $allowed_ext)) {
            if ($size < 5000000) {
                $nama_profile = rand(1000, 9999) . "_" . strtolower(str_replace([' ', "-", "_", '"', "'"], '_', $_POST['fullname'])) . "_" . time() . '.' . $ext;

                //make path
                $path = "../assets/images/profile/" . $nama_profile;

                // move image
                $move = move_uploaded_file($tmp, $path);
                if (!$move) {
                    $nama_profile = "user.jpg";
                }

                $add = $db->insert_user(
                    $nama,
                    htmlspecialchars($_POST['username']),
                    password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT),
                    $nama_profile,
                    htmlspecialchars($_POST['no_hp']),
                    htmlspecialchars($_POST['alamat']),
                    htmlspecialchars($_POST['role']),
                );

                if ($add) {
                    echo json_encode(array('status' => 'success', 'title' => 'Berhasil!', 'message' => 'Data berhasil ditambahkan'));
                } else {
                    echo json_encode(array('status' => 'error', 'title' => 'Error!', 'message' => 'Data gagal ditambahkan'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'title' => 'Error!', 'message' => 'Ukuran file terlalu besar'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'title' => 'Error!', 'message' => 'Format file tidak sesuai - jpg, jpeg, png, gif'));
        }
    } elseif ($mod == "update") {

        $id = $_POST['id'];
        $old_data = $db->get_user($id);
        $nama = $_POST['fullname'];
        if (is_uploaded_file($_FILES['profile']['tmp_name'])) {
            $profile = $_FILES['profile']['name'];
            $tmp = $_FILES['profile']['tmp_name'];

            //get extention
            $ext = pathinfo($profile, PATHINFO_EXTENSION);

            //get size
            $size = $_FILES['profile']['size'];

            $allowed_ext = array("jpg", "jpeg", "png", "gif");

            if (in_array($ext, $allowed_ext)) {
                if ($size < 5000000) {
                    $nama_profile = rand(1000, 9999) . "_" . strtolower(str_replace([' ', "-", "_", '"', "'"], '_', $_POST['fullname'])) . "_" . time() . '.' . $ext;

                    //make path
                    $path = "../assets/images/profile/" . $nama_profile;

                    // move image
                    $move = move_uploaded_file($tmp, $path);
                    if (!$move) {
                        $nama_profile = "user.jpg";
                    }

                    //hapus file sebelumnya
                    if ($old_data['profile'] != "user.jpg") {
                        if (file_exists("../assets/images/profile/" . $old_data['profile'])) {
                            unlink("../assets/images/profile/" . $old_data['profile']);
                        }
                    }
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Ukuran file terlalu besar'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Format file tidak sesuai - jpg, jpeg, png, gif'));
            }
        } else {
            $nama_profile = $old_data['profile'];
        }


        if (isset($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        } else {
            $password = $old_data['password'];
        }

        $upd = $db->update_user(
            $_POST['id'],
            $nama,
            $_POST['username'],
            $password,
            $nama_profile,
            $_POST['no_hp'],
            $_POST['alamat'],
            $_POST['role'],
        );

        if ($upd) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil diubah!'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Data gagal diubah!'));
        }
    } elseif ($mod == "delete") {
        $id = $_POST['id'];
        // die(var_dump($id));
        if (is_array($id)) {
            for ($i = 0; $i < count($id); $i++) {
                $old_data = $db->get_user($id[$i]);

                if ($old_data['profile'] != "user.jpg") {
                    if (file_exists("../assets/images/profile/" . $old_data['profile'])) {
                        unlink("../assets/images/profile/" . $old_data['profile']);
                    }
                }
            }
        } else {
            $old_data = $db->get_user($id);

            if ($old_data['profile'] != "user.jpg") {
                if (file_exists("../assets/images/profile/" . $old_data['profile'])) {
                    unlink("../assets/images/profile/" . $old_data['profile']);
                }
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
