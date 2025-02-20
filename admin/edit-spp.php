<?php
    session_start();
    require "../koneksi.php";


    if ( $_SERVER['REQUEST_METHOD'] === 'GET') {
          $id_spp = $_GET['id_spp'];
          $sql = "SELECT * FROM spp where id_spp=?"; 
          $row = $koneksi->execute_query($sql, [$id_spp])->fetch_assoc();

          $tahun = $row['tahun'];
          $nominal = $row['nominal'];

        }elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $id_spp = $_GET['id_spp'];
            $tahun = $_POST['tahun'];
            $nominal = $_POST['nominal'];
            

            $sql = "UPDATE spp SET tahun=?, nominal=? WHERE id_spp=?";
            $row = $koneksi->execute_query($sql, [$tahun, $nominal, $id_spp,]);

            if ($row) {
                header("Location:spp.php");
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
        <h1 class="text-2xl font-bold text-center mb-6">Edit SPP</h1>
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="tahun" class="block text-gray-700 font-medium mb-2">Tahun</label>
                <input type="date" name="tahun" id="tahun" value="<?= $tahun ?>" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="nominal" class="block text-gray-700 font-medium mb-2">Nominal</label>
                <input type="number" name="nominal" id="nominal" value="<?= $nominal ?>" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="spp.php" class="text-red-500 hover:text-red-700 font-medium">Batal</a>
                <button type="submit" class="bg-blue-500 text-white font-medium px-6 py-2 rounded-lg hover:bg-blue-600 transition">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
