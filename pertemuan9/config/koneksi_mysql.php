<?php
$conn = new mysqli("localhost", "root", "", "praktikumpemweb");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>

$host = 'localhost';       // Host default adalah 'localhost'
$username = 'root';        // Username default biasanya 'root' jika belum diubah
$password = '';            // Kosongkan jika tidak ada password untuk root
$database = 'praktikumpemweb';  // Nama database Anda, pastikan sudah benar
$port = 3306;              // Port default MySQL adalah 3306

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
