<?php
    session_start();
    require "../koneksi.php";


    if ( $_SERVER['REQUEST_METHOD'] === 'GET') {
          $id_kelas = $_GET['id_kelas'];
          $sql = "SELECT * FROM kelas where id_kelas=?"; 
          $row = $koneksi->execute_query($sql, [$id_kelas])->fetch_assoc();

          $nama_kelas = $row['nama_kelas'];
          $kompetensi_keahlian = $row['kompetensi_keahlian'];

        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id_kelas = $_GET['id_kelas'];
            $nama_kelas = $_POST['nama_kelas'];
            $kompetensi_keahlian = $_POST['kompetensi_keahlian'];
            

            $sql = "UPDATE kelas SET nama_kelas=?, kompetensi_keahlian=? WHERE id_kelas=?";
            $row = $koneksi->execute_query($sql, [$nama_kelas, $kompetensi_keahlian, $id_kelas,]);

            if ($row) {
                header("Location:kelas.php");
            }
        }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-lg">
        <h1 class="text-2xl font-bold text-center mb-6">Edit Kelas</h1>
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="nama" class="block text-gray-700 font-medium mb-2">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" value="<?= $nama_kelas ?>" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="kompetensi" class="block text-gray-700 font-medium mb-2">kompetensi_keahlian</label>
                <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" value="<?= $kompetensi_keahlian ?>" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="kelas.php" class="text-red-500 hover:text-red-700 font-medium">Batal</a>
                <button type="submit" class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
