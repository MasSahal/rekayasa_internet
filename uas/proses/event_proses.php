<?php
include('../model/event_model.php');
$db = new event;

if (isset($_GET['mod'])) {

    $mod = $_GET['mod'];
    if ($mod == "insert") {
        $nama_event     = $_POST['nama_event'];
        $tanggal_event  = $_POST['tanggal_event'];
        $jam_event      = $_POST['jam_awal'] . " - " . $_POST['jam_akhir'];
        $lokasi_event   = $_POST['lokasi_event'];
        $gmap_event     = $_POST['gmap_event'] ?? null;
        $detail_event   = $_POST['detail_event'];

        $banner_event   = $_FILES['banner_event']['name'];
        $tmp            = $_FILES['banner_event']['tmp_name'];

        //get extention
        $ext            = pathinfo($banner_event, PATHINFO_EXTENSION);

        //get size
        $size           = $_FILES['banner_event']['size'];

        //ekstensi diperbbolehkan
        $allowed_ext    = array("jpg", "jpeg", "png", "gif");

        if (in_array($ext, $allowed_ext)) {
            if ($size < 5000000) {
                $nama_banner_event = rand(1000, 9999) . "-" . strtolower(str_replace([' ', "-", "_"], '-', substr($nama_event, 0, 80))) . "-" . time() . '.' . $ext;

                //make path
                $path = "../assets/images/banner_event/" . $nama_banner_event;

                // move image
                $move = move_uploaded_file($tmp, $path);
                if (!$move) {
                    $nama_banner_event = "default_banner.jpg";
                }

                $add = $db->insert_event(
                    $nama_event,
                    $detail_event,
                    $nama_banner_event,
                    $tanggal_event,
                    $jam_event,
                    $lokasi_event,
                    $gmap_event
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
        $old_data = $db->get_event($id);

        if (is_array($id)) {
            for ($i = 0; $i < count($id); $i++) {
                $old_data = $db->get_event($id[$i]);

                if ($old_data['banner_event'] != "event.jpg") {
                    if (file_exists("../assets/images/banner_event/" . $old_data['banner_event'])) {
                        unlink("../assets/images/banner_event/" . $old_data['banner_event']);
                    }
                }
            }
        } else {
            $old_data = $db->get_event($id);

            if ($old_data['banner_event'] != "event.jpg") {
                if (file_exists("../assets/images/banner_event/" . $old_data['banner_event'])) {
                    unlink("../assets/images/banner_event/" . $old_data['banner_event']);
                }
            }
        }

        $delete = $db->delete_event($id);
        if ($delete) {
            echo json_encode(array('status' => 'success', 'message' => 'Data berhasil dihapus'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Data gagal dihapus'));
        }
    }
}
