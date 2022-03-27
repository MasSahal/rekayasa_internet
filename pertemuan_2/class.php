<?php

//membuat class hewan
class Hewan
{

    //property
    public $warna, $kulit, $kaki, $mulut;

    //properti tambahan
    public $nama;

    public function ukuran($ukuran)
    {
        return "Hewan ini memiliki ukuran " . $ukuran . ". ";
    }

    public function kecepatan($kecepatan)
    {
        return "Memiliki kecepatan " . $kecepatan . "mph. ";
    }

    public function jenisMakanan($jenis)
    {
        return "Jenis makanan hewan ini adalah " . $jenis . ". ";
    }

    //__destruct
    public function getData()
    {
        echo "<strong>Identitas Hewan " . $this->nama . "</strong> <br>";
        echo "<hr>";
        echo "Nama  : " . $this->nama  . "<br>";
        echo "Warna : " . $this->warna . "<br>";
        echo "Kulit : " . $this->kulit . "<br>";
        echo "Kaki  : " . $this->kaki  . "<br>";
        echo "Mulut : " . $this->mulut . "<br>";
    }
};


$kuda = new Hewan;
$kuda->nama = "Kuda";
$kuda->warna = "Hitam";
$kuda->kulit = "Berambut";
$kuda->kaki = "4 Kaki";
$kuda->mulut = "Monyong";
$kuda->getData();
echo $kuda->ukuran("Besar");
echo $kuda->kecepatan(90);
echo $kuda->jenisMakanan("Biji bijian");

echo "<br><br>";

$harimau = new Hewan;
$harimau->nama = "Harimau";
$harimau->warna = "Oranye Hitam";
$harimau->kulit = "Berambut";
$harimau->kaki = "4 Kaki";
$harimau->mulut = "Berbentuk setengah piring";
$harimau->getData();
echo $harimau->ukuran("Sangat Besar");
echo $harimau->kecepatan(200);
echo $harimau->jenisMakanan("Daging");

echo "<br><br>";

$kambing = new Hewan;
$kambing->nama = "Kambing";
$kambing->warna = "Putih Hitam";
$kambing->kulit = "Berambut";
$kambing->kaki = "4 Kaki";
$kambing->mulut = "Moncong kebawah";
$kambing->getData();
echo $kambing->ukuran("Sedang");
echo $kambing->kecepatan(50);
echo $kambing->jenisMakanan("Rumput");

# Copyright by Sahl 