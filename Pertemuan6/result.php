<?php
// result.php - Halaman Hasil
session_start();

// Cek apakah session ada
if (!isset($_SESSION['maskapai']) || !isset($_SESSION['bandara_asal']) || !isset($_SESSION['bandara_tujuan'])) {
    header("Location: index.php");
    exit();
}

// Nama bandara berdasarkan kode
$nama_bandara = [
    'CGK' => 'Soekarno-Hatta (CGK)',
    'DPS' => 'Ngurah Rai (DPS)',
    'SUB' => 'Juanda (SUB)',
    'UPG' => 'Hasanuddin (UPG)',
    'MES' => 'Kualanamu (MES)'
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran Rute Penerbangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Hasil Pendaftaran Rute Penerbangan</h1>
    
    <h2>Detail Penerbangan</h2>
    <h3><?php echo $_SESSION['maskapai']; ?></h3>
    <table>
        <tr>
            <td>Asal Penerbangan</td>
            <td><?php echo $nama_bandara[$_SESSION['bandara_asal']]; ?></td>
        </tr>
        <tr>
            <td>Tujuan Penerbangan</td>
            <td><?php echo $nama_bandara[$_SESSION['bandara_tujuan']]; ?></td>
        </tr>
        <tr>
            <td>Harga Tiket</td>
            <td>Rp <?php echo number_format($_SESSION['harga_tiket'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Pajak</td>
            <td>Rp <?php echo number_format($_SESSION['total_pajak'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td>Total Harga Tiket</td>
            <td>Rp <?php echo number_format($_SESSION['total_harga'], 0, ',', '.'); ?></td>
        </tr>
    </table>
    
    <h2>Detail Pajak</h2>
    <table>
        <tr>
            <th>Bandara</th>
            <th>Pajak</th>
        </tr>
        <tr>
            <td><?php echo $nama_bandara[$_SESSION['bandara_asal']]; ?></td>
            <td>Rp <?php echo number_format($_SESSION['pajak_asal'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td><?php echo $nama_bandara[$_SESSION['bandara_tujuan']]; ?></td>
            <td>Rp <?php echo number_format($_SESSION['pajak_tujuan'], 0, ',', '.'); ?></td>
        </tr>
        <tr>
            <td><strong>Total Pajak</strong></td>
            <td><strong>Rp <?php echo number_format($_SESSION['total_pajak'], 0, ',', '.'); ?></strong></td>
        </tr>
    </table>
    
    <p>Tanggal pendaftaran: <?php echo $_SESSION['tanggal']; ?></p>
    
    <a href="index.php" class="btn">Kembali ke Form Pendaftaran</a>
    <a href="clear.php" class="btn">Bersihkan Data</a>
</body>
</html>