
<?php include 'db.php';
$kodemk = $_GET['kodemk'];
$data = $conn->query("SELECT * FROM matakuliah WHERE kodemk='$kodemk'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Mata Kuliah</h2>
        <form method="POST" action="">
            <input type="text" name="kodemk" value="<?= $data['kodemk'] ?>" readonly class="w-full border p-2 mb-2">
            <input type="text" name="nama" value="<?= $data['nama'] ?>" class="w-full border p-2 mb-2">
            <input type="number" name="jumlah_sks" value="<?= $data['jumlah_sks'] ?>" class="w-full border p-2 mb-2">
            <button type="submit" name="update" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
        <?php
        if (isset($_POST['update'])) {
            $conn->query("UPDATE matakuliah SET nama='{$_POST['nama']}', jumlah_sks='{$_POST['jumlah_sks']}' WHERE kodemk='$kodemk'");
            header("Location: index.php");
        }
        ?>
    </div>
</body>
</html>