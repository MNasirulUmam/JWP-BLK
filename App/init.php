<?php
    // require_once 'App/Kendaraan.php';
    // require_once 'App/Roda_dua.php';
    // require_once 'App/Roda_empat.php';
    include ('koneksi.php');
    spl_autoload_register(function ($class) {
        require_once __DIR__ . '/'. $class.'.php';
    });
?>