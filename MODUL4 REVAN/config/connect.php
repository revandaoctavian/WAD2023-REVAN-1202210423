<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->
<?php
    $host = "localhost:3308";
    $username = "root";
    $password = "";
    $database = "modul4_wad";
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
    $koneksi = new mysqli($host, $username, $password, $database);
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }
// 
?>