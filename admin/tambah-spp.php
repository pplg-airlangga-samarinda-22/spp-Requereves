<?php

require "../koneksi.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $tahun = $_POST['tahun'];
    $nominal = $_POST['nominal'];

    $sql = "INSERT INTO spp (tahun, nominal) VALUES (?,?)";
    $row = $koneksi->execute_query($sql,[$tahun, $nominal]);

    if ($row){
        header('location:spp.php');
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spp</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-6 rounded-lg shadow-md w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Tambah SPP</h1>
        <form action="" method="post">
            <div class="mb-4">
                <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="date" name="tahun" id="tahun" required class="w-full p-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal</label>
                <input type="number" name="nominal" id="nominal" required class="w-full p-2 border rounded">
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah</button>
                <a href="spp.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Batal</a>
            </div>
        </form>
    </div>
</body>

</html>
