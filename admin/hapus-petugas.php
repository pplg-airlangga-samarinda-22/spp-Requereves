<?php 

session_start();

require "../koneksi.php";
if ($_SERVER['REQUEST_METHOD'] === 'GET'){
    $id_petugas = $_GET['id_petugas'];
    $sql = "DELETE FROM petugas WHERE id_petugas=?";
    $row = $koneksi->execute_query($sql, [$id_petugas]);

    var_dump($sql);
    if($row){
        header("Location:petugas.php");
    }else 
        header("Gagal hapus Location:petugas.php");
}