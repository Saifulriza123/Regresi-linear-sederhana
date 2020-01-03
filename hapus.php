<?php
require('koneksi.php');

$hapus = mysqli_query($koneksi, "TRUNCATE TABLE variabel");

if($hapus){
    header('Location: index.php?pesan=berhasil_hapus');
}else {
    echo 'Data gagal dihapus<br>'.mysqli_error($koneksi);
}