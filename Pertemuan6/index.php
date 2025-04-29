<?php
// index.php - Halaman Utama
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Rute Penerbangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Pendaftaran Rute Penerbangan</h1>
    
    <form action="process.php" method="post">
        <div class="form-group">
            <label for="maskapai">Nama Maskapai:</label>
            <input type="text" id="maskapai" name="maskapai" required>
        </div>
        
        <div class="form-group">
            <label for="bandara_asal">Bandara Asal:</label>
            <select id="bandara_asal" name="bandara_asal" required>
                <option value="">Pilih Bandara Asal</option>
                <option value="CGK">Soekarno-Hatta (CGK)</option>
                <option value="DPS">Ngurah Rai (DPS)</option>
                <option value="SUB">Juanda (SUB)</option>
                <option value="UPG">Hasanuddin (UPG)</option>
                <option value="MES">Kualanamu (MES)</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="bandara_tujuan">Bandara Tujuan:</label>
            <select id="bandara_tujuan" name="bandara_tujuan" required>
                <option value="">Pilih Bandara Tujuan</option>
                <option value="CGK">Soekarno-Hatta (CGK)</option>
                <option value="DPS">Ngurah Rai (DPS)</option>
                <option value="SUB">Juanda (SUB)</option>
                <option value="UPG">Hasanuddin (UPG)</option>
                <option value="MES">Kualanamu (MES)</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="harga_tiket">Harga Tiket (Rp):</label>
            <input type="number" id="harga_tiket" name="harga_tiket" min="0" required>
        </div>
        
        <button type="submit">Proses Pendaftaran</button>
    </form>
</body>
</html>