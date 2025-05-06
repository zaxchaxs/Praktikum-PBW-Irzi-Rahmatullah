<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Daftar Mahasiswa & Mata Kuliah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100 space-y-10">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
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

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Daftar Mata Kuliah</h1>
            <a href="tambah_matakuliah.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
        </div>
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Kode MK</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">SKS</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM matakuliah");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td class='border p-2'>{$row['kodemk']}</td>
                        <td class='border p-2'>{$row['nama']}</td>
                        <td class='border p-2'>{$row['jumlah_sks']}</td>
                        <td class='border p-2'>
                            <a href='edit_matakuliah.php?kodemk={$row['kodemk']}' class='text-blue-500'>Edit</a> |
                            <a href='hapus_matakuliah.php?kodemk={$row['kodemk']}' class='text-red-500' onclick=\"return confirm('Yakin?')\">Hapus</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <div class="flex justify-between mb-4">
            <h1 class="text-2xl font-bold">Kartu Rencana Studi (KRS)</h1>
            <a href="tambah_krs.php" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</a>
        </div>
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Mahasiswa</th>
                    <th class="p-2 border">Mata Kuliah</th>
                    <th class="p-2 border">Keterangan</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT krs.id, mhs.nama AS nama_mhs, mk.nama AS nama_mk
                          FROM krs
                          JOIN mahasiswa mhs ON krs.mahasiswa_npm = mhs.npm
                          JOIN matakuliah mk ON krs.matakuliah_kodemk = mk.kodemk";
                $result = $conn->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td class='border p-2'>{$row['nama_mhs']}</td>
                        <td class='border p-2'>{$row['nama_mk']}</td>
                        <td class='border p-2'>{$row['nama_mhs']} Mengambil mata kuliah {$row['nama_mk']}</td>
                        <td class='border p-2'>
                            <a href='hapus_krs.php?id={$row['id']}' class='text-red-500' onclick=\"return confirm('Yakin?')\">Hapus</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>