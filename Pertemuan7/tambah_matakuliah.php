<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Tambah Mata Kuliah</h2>
        <form method="POST" action="">
            <input type="text" name="kodemk" placeholder="Kode MK" class="w-full border p-2 mb-2" required>
            <input type="text" name="nama" placeholder="Nama Mata Kuliah" class="w-full border p-2 mb-2" required>
            <input type="number" name="jumlah_sks" placeholder="Jumlah SKS" class="w-full border p-2 mb-2" required>
            <button type="submit" name="simpan" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {
            $conn->query("INSERT INTO matakuliah VALUES ('{$_POST['kodemk']}', '{$_POST['nama']}', '{$_POST['jumlah_sks']}')");
            header("Location: index.php");
        }
        ?>
    </div>
</body>
</html>