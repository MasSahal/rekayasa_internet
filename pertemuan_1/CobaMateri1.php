<?php

class Manusia
{

    //property
    public $mata = "Hitam";

    //method
    public function Berjalan()
    {
        return "Berjalan";
    }
}

//Instance
$Amir  = new Manusia;
$Hasan = new Manusia;

echo "<p>Hai nama saya Amir, Saya bermata " .  $Amir->mata . ", Saya dapat " .  $Amir->Berjalan() . "</p>";
echo "<p>Hai nama saya Hasan, Saya bermata " .  $Hasan->mata . ", Saya dapat " .  $Hasan->Berjalan() . "</p>";


//Copyright Sahl - 20210120016
