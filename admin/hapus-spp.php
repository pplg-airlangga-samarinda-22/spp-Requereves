<?php
$id_spp = $_GET['id_spp'];

include '../koneksi.php';
$sql = "DELETE FROM spp WHERE id_spp='$id_spp'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    header("Location:spp.php");
}else{
    echo"<script>alert('Maaf Data Tidak Terhapus'); window.locatin.assign('spp.php'); </script>";
}