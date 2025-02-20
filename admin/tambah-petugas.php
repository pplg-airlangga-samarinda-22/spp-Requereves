<?php

require "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nama = $_POST['nama_petugas'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];

    $sql = "INSERT INTO petugas (nama_petugas, username, password , level) VALUES (?,?,?,?)";
    $row = $koneksi->execute_query($sql,[$nama, $username, $password, $level]);

    if ($row){
        header('location:petugas.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Registrasi Petugas Baru</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="nama_petugas" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama_petugas" id="nama_petugas" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="level" class="w-full p-2 border rounded" required>
                    <option value="">Pilih Level Petugas</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai  ">Pegawai</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah</button>
                <a href="petugas.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
