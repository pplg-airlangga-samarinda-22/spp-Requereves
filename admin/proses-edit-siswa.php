<?php

$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$id_kelas = $_POST['id_kelas'];
$alamat = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$id_spp = $_POST['id_spp'];

include '../Koneksi.php';
$sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_tel',id_spp='$id_spp' WHERE nisn='$nisn'";
$query = mysqli_query($koneksi, $sql);
if ($query) {
    header("Location:?url=siswa");
}else{
    echo "<script>alert('Maaf Data Tidak Tersimpan'); window.location.assign('?url=siswa');</script>";
}   