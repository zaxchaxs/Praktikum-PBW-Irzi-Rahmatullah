<?php
// process.php - Pemrosesan Data
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $_SESSION['maskapai'] = $_POST['maskapai'];
    $_SESSION['bandara_asal'] = $_POST['bandara_asal'];
    $_SESSION['bandara_tujuan'] = $_POST['bandara_tujuan'];
    $_SESSION['harga_tiket'] = $_POST['harga_tiket'];
    
    // Data pajak untuk setiap bandara
    $pajak_bandara = [
        'CGK' => 50000,
        'DPS' => 80000,
        'SUB' => 40000,
        'UPG' => 45000,
        'MES' => 35000
    ];
    
    // Hitung pajak berdasarkan bandara asal dan tujuan
    $_SESSION['pajak_asal'] = $pajak_bandara[$_SESSION['bandara_asal']];
    $_SESSION['pajak_tujuan'] = $pajak_bandara[$_SESSION['bandara_tujuan']];
    $_SESSION['total_pajak'] = $_SESSION['pajak_asal'] + $_SESSION['pajak_tujuan'];
    
    // Hitung total harga tiket (harga + pajak)
    $_SESSION['total_harga'] = $_SESSION['harga_tiket'] + $_SESSION['total_pajak'];
    
    // Simpan tanggal pendaftaran
    $_SESSION['tanggal'] = date('d-m-Y H:i:s');
    
    // Redirect ke halaman hasil
    header("Location: result.php");
    exit();
} else {
    // Jika akses langsung ke file ini tanpa submit form
    header("Location: index.php");
    exit();
}
?>