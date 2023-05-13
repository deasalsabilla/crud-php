<?php
include "koneksi.php";

$id = $_GET['nim'];
$query = mysqli_query($koneksi, "select * from tb_mhs where nim = '$id'");
$hasil = mysqli_fetch_array($query);


$nim       = $_POST['nim'];
$nama      = $_POST['nama'];
$alamat    = $_POST['alamat'];
$telp      = $_POST['telp'];
$jurusan   = $_POST['jurusan'];
$smt       = $_POST['smt'];

if (isset($_POST['simpan'])) {
    $sql = mysqli_query($koneksi, "update tb_mhs set nim = '$nim', nama = '$nama',alamat = '$alamat',telepon = '$telp',jurusan = '$jurusan',semester = '$smt' where nim = '$id'");
    if ($sql) {
        echo "<script> alert('Data Berhasil Di ubah')</script>";
        header("refresh:0,index.php");
    } else {
        echo "<script> alert('Data Tidak Berhasil Di ubah')</script>";
        header("refresh:0,index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>

<body>
    <div class="container col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Tambah Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="" method="POST" class="form-item">
                    <div class="form-group">
                        <label>NIM</label>
                        <input type="number" name="nim" class="form-control col-md-9" value="<?php echo $hasil['nim'];?>">
                    </div> <br>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control col-md-9" value="<?php echo $hasil['nama'];?>">
                    </div> <br>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="4" class="form-control col-md-9"><?php echo $hasil['alamat'];?></textarea>
                    </div> <br>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" name="telp" class="form-control col-md-9" value="<?php echo $hasil['telepon'];?>">
                    </div> <br>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <select class="form-control" name="jurusan" value="<?php echo $hasil['jurusan'];?>">
                            <option value="">--Pilih--</option>
                            <option value="informatika" <?php if ($hasil['jurusan'] == "informatika") echo "selected" ?>>Informatika</option>
                            <option value="teknikelektro" <?php if ($hasil['jurusan'] == "teknikelektro") echo "selected" ?>>Teknik Elektro</option>
                            <option value="tekniksipil" <?php if ($hasil['jurusan'] == "tekniksipil") echo "selected" ?>>Teknik Sipil</option>
                            <option value="teknikmesin" <?php if ($hasil['jurusan'] == "teknikmesin") echo "selected" ?>>Teknik Mesin</option>
                        </select>
                    </div> <br>
                    <div class="form-group">
                        <label>Semester</label>
                        <input type="number" name="smt" class="form-control col-md-9" value="<?php echo $hasil['semester'];?>">
                    </div> <br>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" onclick="return confirm('Apakah Anda Yakin Untuk Menyimpan Data')" class="btn btn-primary">
                        <input type="reset" name="batal" value="Batal" class="btn btn-danger">
                        <button name="kembali" class="btn btn-secondary"><a href="index.php" style="color: #ffff; text-decoration:none;">Kembali</a></button>
                    </div>
                </form>
            </div>
</body>

</html>