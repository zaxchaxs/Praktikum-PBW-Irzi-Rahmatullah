<?php include 'db.php';
$npm = $_GET['npm'];
$data = $conn->query("SELECT * FROM mahasiswa WHERE npm='$npm'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Mahasiswa</h2>
        <form method="POST" action="">
            <input type="text" name="npm" value="<?= $data['npm'] ?>" readonly class="w-full border p-2 mb-2">
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="w-full border p-2 mb-2">
            <select name="jurusan" class="w-full border p-2 mb-2">
                <option <?= $data['jurusan']=='Teknik Informatika'?'selected':'' ?>>Teknik Informatika</option>
                <option <?= $data['jurusan']=='Sistem Operasi'?'selected':'' ?>>Sistem Operasi</option>
            </select>
            <textarea name="alamat" class="w-full border p-2 mb-2"><?= $data['alamat'] ?></textarea>
            <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
        <?php
        if (isset($_POST['update'])) {
            $conn->query("UPDATE mahasiswa SET nama='{$_POST['nama']}', jurusan='{$_POST['jurusan']}', alamat='{$_POST['alamat']}' WHERE npm='$npm'");
            header("Location: index.php");
        }
        ?>
    </div>
</body>
</html>