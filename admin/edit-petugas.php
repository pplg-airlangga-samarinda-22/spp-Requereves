<?php
    session_start();
    require "../koneksi.php";


    if ( $_SERVER['REQUEST_METHOD'] === 'GET') {
          $id = $_GET['id'];
          $sql = "SELECT * FROM petugas where id_petugas=?"; 
          $row = $koneksi->execute_query($sql, [$id])->fetch_assoc();

          $nama_petugas = $row['nama_petugas'];
          $username = $row['username'];
          $level = $row['level'];

        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id = $_GET['id'];
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $level = $_POST['level'];

            $sql = "UPDATE petugas SET nama_petugas=?, username=?, password=?, level=? WHERE id_petugas=?";
            $row = $koneksi->execute_query($sql, [$nama, $username, $password, $level, $id,]);

            if ($row) {
                header("Location:petugas.php");
            }
        }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Edit Pegawai</h1>
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $nama_petugas ?>" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                <input type="teks" name="username" id="username" value="<?= $username ?>" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div class="mb-4">
                <label for="level" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="level" class="w-full p-2 border rounded" required>
                    <option value="">Pilih Level Petugas</option>
                    <option value="admin">Admin</option>
                    <option value="pegawai  ">Pegawai</option>
                </select>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="petugas.php" class="text-red-500 hover:text-red-700 font-medium">Batal</a>
                <button type="submit" class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
