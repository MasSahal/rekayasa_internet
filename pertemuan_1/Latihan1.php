<?php

class Mobil
{
    // property 
    public $no_plat, $merk, $warna, $kecepatan;

    // method
    public function setGetPlat(string $no_plat)
    {
        return $this->no_plat = $no_plat;
    }

    public function setGetMerk(string $merk)
    {
        return $this->merk = $merk;
    }

    public function setGetWarna(string $warna)
    {
        return $this->warna = $warna;
    }

    public function setGetKecepatan(int $kecepatan)
    {
        return $this->kecepatan = $kecepatan . " Km/h";
    }
}

$Mobil_A = new Mobil;
echo "Mobil merk " . $Mobil_A->setGetMerk("Daihatsu") . " warna " . $Mobil_A->setGetWarna("Merah") .  " dengan Nomor Plat " . $Mobil_A->setGetPlat("E 1234 CN") . " melaju dengan kecepatan " . $Mobil_A->setGetKecepatan(150) . "<br>";

echo "<br>";

$Mobil_B = new Mobil;
echo "Mobil merk " . $Mobil_B->setGetMerk("Toyota") . " warna " . $Mobil_B->setGetWarna("Hitam") .  " dengan Nomor Plat " . $Mobil_B->setGetPlat("T 7645 BN") . " melaju dengan kecepatan " . $Mobil_B->setGetKecepatan(200) . "<br>";

die(var_dump([
    "Mobil A" => $Mobil_A,
    "Mobil B" => $Mobil_B
]));
