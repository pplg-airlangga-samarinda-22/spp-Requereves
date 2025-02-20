<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Admin / Petugas - APLIKASI PEMBAYARAN SPP</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Aplikasi Pembayaran SPP</h3>
        <div class="alert alert-info">
            Anda Login Sebagai <b>ADMINISTRATOR</b> Aplikasi Pembayaran SPP. 
        </div>
        <a href="spp.php" class="btn btn-primary"> SPP</a>
        <a href="kelas.php" class="btn btn-primary"> Kelas</a>
        <a href="siswa.php" class="btn btn-primary"> Siswa</a>
        <a href="petugas.php" class="btn btn-primary"> Petugas</a>
        <a href="admin.php?url=pembayaran" class="btn btn-primary"> Pembayaran</a>
        <a href="admin.php?url=laporan" class="btn btn-primary"> laporan</a>
        <a href="../logout.php" class="btn btn-primary"> logout</a>

        
        

    </div>
    
<script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>