<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];

    $stmt = $conn->prepare("INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk) VALUES (?, ?)");
    $stmt->bind_param("ss", $npm, $kodemk);
    $stmt->execute();
    header("Location: index.php");
    exit;
}

$mahasiswa = $conn->query("SELECT npm, nama FROM mahasiswa");
$matakuliah = $conn->query("SELECT kodemk, nama FROM matakuliah");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah KRS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah KRS</h1>
        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1">Mahasiswa</label>
                <select name="mahasiswa_npm" required class="w-full border rounded p-2">
                    <?php while ($row = $mahasiswa->fetch_assoc()) { ?>
                        <option value="<?= $row['npm'] ?>"><?= $row['nama'] ?> (<?= $row['npm'] ?>)</option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <label class="block mb-1">Mata Kuliah</label>
                <select name="matakuliah_kodemk" required class="w-full border rounded p-2">
                    <?php while ($row = $matakuliah->fetch_assoc()) { ?>
                        <option value="<?= $row['kodemk'] ?>"><?= $row['nama'] ?> (<?= $row['kodemk'] ?>)</option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="index.php" class="ml-2 text-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
