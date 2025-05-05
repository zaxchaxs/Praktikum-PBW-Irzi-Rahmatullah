<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100 flex flex-col gap-2">
<?php 
        if(isset($_GET['message'])) {
            $message = $_GET['message']
    ?>
        <div class="max-w-4xl mx-auto bg-red-500 p-4 rounded shadow flex justify-center w-full">
        <h3 class="font-bold text-white">
            <?=$message ?></div>
        </h3>    
     <?php
    }
     ?>
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow w-full">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Daftar Mahasiswa</h1>
            <a href="tambah.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
        </div>
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">NPM</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Jurusan</th>
                    <th class="p-2 border">Alamat</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM mahasiswa");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td class='border p-2'>{$row['npm']}</td>
                        <td class='border p-2'>{$row['nama']}</td>
                        <td class='border p-2'>{$row['jurusan']}</td>
                        <td class='border p-2'>{$row['alamat']}</td>
                        <td class='border p-2'>
                            <a href='edit.php?npm={$row['npm']}' class='text-blue-500'>Edit</a> |
                            <a href='hapus.php?npm={$row['npm']}' class='text-red-500' onclick=\"return confirm('Yakin?')\">Hapus</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>