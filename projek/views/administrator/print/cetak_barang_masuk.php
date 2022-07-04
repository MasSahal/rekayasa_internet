<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Barang Masuk - <?= date("D, d M Y"); ?></title>
</head>
<style>
    body {
        margin: 0 auto;
        width: 1000px;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }

    .table-data {
        border-collapse: collapse;
    }

    .thead {
        /* text-align: right; */
        background-color: darkgrey;
        color: whitesmoke;
    }

    .td-data {
        border: 1px solid gray;

    }

    tr {
        border: 1px solid gray;
    }

    .h-100 {
        min-height: 300px;
    }

    .watermark {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url(img/logo.png);
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        opacity: 0.1;
    }
</style>

<!-- <body onload="window.print()"> -->

<body>
    <label class="watermark"></label>
    <table width="100%">
        <tr>
            <td>
                <center>
                    <img src="img/logo.png" alt="" width="200px">
                    <font size="7">CV MAJU MUNDUR SEJAHTERA</font>
                    <br>
                    <span>Jln. Ciremai Raya No.43 Harjamukti, Kota Cirebon, Jawa Barat</span>
                </center>
            </td>
        </tr>
    </table>
    <br>
    <hr>
    <?php

    include('../../../model/database.php');
    $db = new Database();
    if (isset($_GET['dari']) && isset($_GET['sampai'])) {
        $dari = $_GET['dari'];
        $sampai = $_GET['sampai'];
        $data_barang_masuk = $db->data_barang_masuk($dari, $sampai);
    } else {
        $data_barang_masuk = $db->data_barang_masuk();
    }
    $no = 0; ?>
    <center>
        <h5>Laporan <?= $_GET['judul'] ?? "Data Barang Masuk"; ?></h5>
    </center>
    <table width="100%" cellspacing="0" cellpadding="5" class="table-data">
        <tr>
            <th class="thead">No</th>
            <th class="thead">No Ref</th>
            <th class="thead">Tanggal Masuk</th>
            <th class="thead">Produk</th>
            <th class="thead">Distributor</th>
            <th class="thead">Harga</th>
            <th class="thead">Jumlah Beli</th>
            <th class="thead">Total</th>
            <th class="thead">Penerima</th>
        </tr>
        <?php

        if ($data_barang_masuk) :
            foreach ($data_barang_masuk as $row) {;
                #var_dump($row) 
        ?>
                <tr class="td-data">
                    <td class="td-data"><?= $no += 1; ?></td>
                    <td class="td-data"><?= $row['no_ref']; ?></td>
                    <td class="td-data"><?= $row['tgl_masuk']; ?></td>
                    <td class="td-data"><?= $row['nm_barang']; ?></td>
                    <td class="td-data"><?= $row['nm_distributor']; ?></td>
                    <td class="td-data"><?= $db->rupiah($row['harga']); ?></td>
                    <td class="td-data"><?= $row['jumlah']; ?></td>
                    <td class="td-data"><?= $db->rupiah($row['total']); ?></td>
                    <td class="td-data"><?= $row['penerima']; ?></td>
                </tr>
        <?php
            };
        endif; ?>
    </table>
    <br><br><br>
    <div class="h-100">
        <table align="right">
            <tr>
                <td>
                    <center>
                        Cirebon, <?= date("d F Y"); ?>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                        Direktur CV. Maju Mundur
                        <p>
                            <img src="img/ttd.png" alt="" width="100px">
                        </p>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <center>
                        Mas Sahal
                    </center>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>