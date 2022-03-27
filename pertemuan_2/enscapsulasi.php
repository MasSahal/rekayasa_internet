<?php

class Manusia
{

    //proprti
    public $nama;
    private $umur;
    protected $no_ktp;

    //public
    public function getPublicName($nama)
    {
        return $this->nama = $nama;
    }

    // private
    private function getPrivateUmur($umur)
    {
        return $this->umur = $umur;
    }

    public function getDataPrivateUmur($umur)
    {
        return $this->getPrivateUmur($umur);
    }

    //protected
    protected function getKtp($no_ktp)
    {
        return $this->no_ktp = $no_ktp;
    }

    public function getDataKtp($no_ktp)
    {
        return $this->getKtp($no_ktp);
    }
};
//instansiasi untuk public
$manusia = new Manusia;

//memanggil public method
echo "Hai!, perkenalkan nama saya " . $manusia->getPublicName("Sahal");

echo "<br>";

$manusia2 = new Manusia;
//memanggil private method
echo "Umur saya adalah " . $manusia2->getDataPrivateUmur(25) . " tahun.";

echo "<br>";

$manusia3 = new Manusia;
echo "Data NO KTP saya adalah " . $manusia3->getDataKtp(32098243724);

# Copyright by Sahl 
