<?php
$id_kelas = $_GET['id_kelas'];

include '../koneksi.php';
$sql = "DELETE FROM kelas WHERE id_kelas='$id_kelas'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    header("Location:kelas.php");
}else{
    echo"<script>alert('Maaf Data Tidak Terhapus'); window.locatin.assign('kelas.php'); </script>";
}