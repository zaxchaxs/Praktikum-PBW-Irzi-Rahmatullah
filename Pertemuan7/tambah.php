<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Tambah Mahasiswa</h2>
        <form method="POST" action="">
            <input type="text" name="npm" placeholder="NPM" class="w-full border p-2 mb-2" required>
            <input type="text" name="nama" placeholder="Nama" class="w-full border p-2 mb-2" required>
            <select name="jurusan" class="w-full border p-2 mb-2">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Operasi">Sistem Operasi</option>
            </select>
            <textarea name="alamat" placeholder="Alamat" class="w-full border p-2 mb-2"></textarea>
            <button type="submit" name="simpan" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
        <?php
        if (isset($_POST['simpan'])) {

            $result = $conn->query("SELECT * FROM mahasiswa WHERE npm =  '{$_POST['npm']}' ");
            if ($result) {
                $message = urlencode("NPM sudah terdaftar");
                header("Location:index.php?message={$message}");
            }

            $conn->query("INSERT INTO mahasiswa VALUES ('{$_POST['npm']}', '{$_POST['nama']}', '{$_POST['jurusan']}', '{$_POST['alamat']}')");
            header("Location: index.php");
        }
        ?>
    </div>
</body>
</html>