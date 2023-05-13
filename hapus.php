<?php

include "koneksi.php";

$nim = $_GET['nim'];
$sql = mysqli_query($koneksi, "delete from tb_mhs where nim='$nim'");
if ($sql) {
    echo "<script> alert('Data Berhasil Di hapus')</script>";
    header("refresh:0,index.php");
} else {
    echo "<script> alert('Data Tidak Berhasil Di hapus')</script>";
    header("refresh:0,index.php");
}
