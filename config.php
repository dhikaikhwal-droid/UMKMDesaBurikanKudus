<?php
// Konfigurasi Database
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'umkm_burikan';

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Set charset UTF-8
$conn->set_charset("utf8mb4");

// Fungsi untuk mendapatkan base URL
function getBaseUrl() {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $folder = dirname($_SERVER['SCRIPT_NAME']);
    return $protocol . "://" . $host . $folder;
}

// Fungsi untuk format harga
function formatHarga($harga) {
    if ($harga === null || $harga == 0) {
        return 'Hubungi Penjual';
    }
    return 'Rp ' . number_format($harga, 0, ',', '.');
}
?>