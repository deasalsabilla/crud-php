<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        #tambah{
            margin: 10px;
        }

        h3{
            text-align: center;
        }
        table{
            text-align: center;
        }

        a{
            color: white;
            text-decoration: none;
        }
        .edit{
            color: black;
        }
    </style>
</head>
<body>
    <h3>Data Mahasiswa</h3>
    <button class="btn btn-primary" id="tambah"><a href="tambah.php">+ Tambah Data</a></button>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Jurusan</th>
                <th>Semester</th>
                <th colspan="2">Aksi</th>
            </tr>
        </thead>
        <?php
        include "koneksi.php";
        $no = 1;
        $query = mysqli_query($koneksi, "select * from tb_mhs");
        while($hasil = mysqli_fetch_array($query)){
        ?>
        <tbody>
            <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $hasil['nim'];?></td>
                <td><?php echo $hasil['nama'];?></td>
                <td><?php echo $hasil['alamat'];?></td>
                <td><?php echo $hasil['telepon'];?></td>
                <td><?php echo $hasil['jurusan'];?></td>
                <td><?php echo $hasil['semester'];?></td>
                <td>
                    <button class="btn btn-warning"><a href="edit.php?nim=<?php echo $hasil['nim'];?>" class="edit">Edit</a></button>
                    <button class="btn btn-danger"><a href="hapus.php?nim=<?php echo $hasil['nim'];?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?')">Hapus</a></button>
                </td>
            </tr>
        </tbody>
        <?php }?>
    </table>
</body>
</html>