<?php
session_start();
require "../koneksi.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    $nisn = $_POST['nisn'];
    $sql = "SELECT * FROM siswa where nisn=?";
    $row = $koneksi->execute_query($sql, [$nisn])->fetch_assoc();

    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];


} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nisn = $_POST['nisn'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $id_kelas = $_POST['id_kelas'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $id_spp = $_POST['id_spp'];

    
    $sql = "UPDATE siswa SET nis='$nis',nama='$nama',id_kelas='$id_kelas',alamat='$alamat',no_telp='$no_tel',id_spp='$id_spp' WHERE nisn='$nisn'";
    $query = mysqli_query($koneksi, $sql);


    if ($row) {
        header("Location:siswa.php");
    }
}





?>

<!DOCTYPE html>
<html lang="en">

<h5>Halaman Tambah Data Siswa</h5>
<a href="siswa.php" class="btn btn-primary"> KEMBALI</a>
<hr>
<form method="post" action="">
    <div class="form-group mb-2">
        <label>NISN</label>
        <input type="number" name="nisn" class="form-control"  required>
    </div>
    <div class="form-group mb-2">
        <label>NIS</label>
        <input type="number" name="nis" class="form-control"  required>
    </div>
    <div class="form-group mb-2">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Password</label>
        <input type="text" name="password" class="form-control" required>
    </div>
    <div class="form-group mb-2">
        <label>Kelas</label>
        <select name="id_kelas" class="form-control" required>
            <option value="">Pilih Kelas</option>
            <?php
            $kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
            foreach ($kelas as $data_kelas) {
                ?>
                <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas']; ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group mb-2">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group mb-2">
        <label>No Telepon</label>
        <input type="number" name="no_telp" class="form-control"  required>
    </div>
    <div class="form-group mb-2">
        <label>SPP</label>
        <select name="id_spp" class="form-control" required>
            <option value="">Pilih SPP</option>
            <?php
            $spp = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY id_spp ASC");
            foreach ($spp as $data_spp) {
                ?>
                <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> |
                    <?= number_format($data_spp['nominal'], 2, ',', ','); ?> </option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">SIMPAN</button>
        <button type="reset" class="btn btn-warning">RESET</button>
    </div>
</form>

</html>