<?php

session_start();
session_destroy();

$pesan = "Anda telah keluar!";

header("location: ./index.php?pesan=$pesan");
