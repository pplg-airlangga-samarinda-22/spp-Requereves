<?php 
session_start();
require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4">Data Petugas</h1>
        <div class="mb-4">
            <a href="admin.php" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Kembali</a>
            <a href="tambah-spp.php" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 ml-2">Tambah</a>
        </div>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">No</th>
                    <th class="border border-gray-300 px-4 py-2">Tahun SPP</th>
                    <th class="border border-gray-300 px-4 py-2">Nominal</th>
                    <th class="border border-gray-300 px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 0;
                $sql = "SELECT * FROM spp";
                $rows = $koneksi->execute_query($sql)->fetch_all(MYSQLI_ASSOC);
                foreach($rows as $row) {
                    ?>
                    <tr class="bg-white border border-gray-300">
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= ++$no ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= $row['tahun'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center"><?= $row['nominal'] ?></td>
                        <td class="px-4 py-2 border border-gray-300 text-center">
                            <a href="edit-spp.php?id_spp=<?=$row['id_spp']?>" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <a href="hapus-spp.php?id_spp=<?= $row['id_spp'] ?>" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Hapus</a>
                           
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
