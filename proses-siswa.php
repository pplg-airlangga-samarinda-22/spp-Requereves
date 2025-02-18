<?php
$nisn = $_POST['nisn'];
$password = $_POST['password'];
include 'koneksi.php';
$sql = "SELECT * FROM siswa WHERE nisn='$nisn' AND password='$password'";
$query = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($query) > 0) {
    session_start();
    $data = mysqli_fetch_array($query);
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['password'] = $data['password'];
    header('Location:siswa/siswa.php');
} else {
    echo "<script> alert('Maaf Anda Gagal Login, Silakan Ulangi Lagi');
                window.Location.assign('index.php')</script>";
}

?>